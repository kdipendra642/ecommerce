<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = Admin::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $old_img = $request->old_image;
        // dd($request->all());
        if ($request->file('profile_photo_path')) {

            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
            $save_url = 'upload/admin_images/' . $name_gen;

            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'profile_photo_path' => $save_url,
            ]);
        } else {
            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }


        $notification = array(
            'message' => 'Profile updated successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminUpdateePassword(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required',

        ]);
        $id = Auth::user()->id;
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find($id);
            $admin->password = Hash::make($request->password);
            $admin->save();

            Auth::logout();

            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }

    public function AllUsers()
    {
        $users = User::latest()->get();

        return view('backend.users.all_users', compact('users'));
    }
}
