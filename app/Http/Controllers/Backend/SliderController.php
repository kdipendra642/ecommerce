<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function ManageSlider()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    public function AddSldier()
    {
        return view('backend.slider.create');
    }

    public function SliderStore(Request $request)
    {
        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
        $save_url = 'upload/slider/' . $name_gen;
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Slider inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('manage-slider')->with($notification);
    }

    public function ActivateSlider($id)
    {
        Slider::findorFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Slider Activated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function DeactivateSlider($id)
    {
        Slider::findorFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Slider Deactivated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function EditSlider($id)
    {
        $slider = Slider::findorFail($id);

        return view('backend.slider.edit', compact('slider'));
    }

    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_img')) {
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notification);
        } else {

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notification);
        } // end else 
    }

    public function DeleteSlider($id)
    {
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;
        unlink($img);

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider with its content deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
