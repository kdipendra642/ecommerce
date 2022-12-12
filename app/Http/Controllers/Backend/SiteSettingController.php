<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Seo;
use Image;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('backend.setting.site_setting', compact('setting'));
    }

    public function SiteSettingUpdate(Request $request, $id)
    {
        $old_img = $request->old_image;

        if ($request->file('logo')) {
            unlink($old_img);
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(139, 36)->save('upload/sitesetting/' . $name_gen);
            $save_url = 'upload/sitesetting/' . $name_gen;

            SiteSetting::findOrFail($id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'logo' => $save_url,
            ]);

            $notification = array(
                'message' => 'SiteSettings Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('site.setting')->with($notification);
        } else {
            SiteSetting::findOrFail($id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
            ]);

            $notification = array(
                'message' => 'SiteSettings Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('site.setting')->with($notification);
        } // end else 
    }

    public function SeoSetting()
    {
        $seo_setting = Seo::find(1);
        return view('backend.setting.seo_setting', compact('seo_setting'));
    }

    public function SeoSettingUpdate(Request $request, $id)
    {
        Seo::findOrFail($id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
        ]);

        $notification = array(
            'message' => 'SeoSettings Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('seo.setting')->with($notification);
    }
}
