<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    public function index()
    {
        return Setting::first();
    }

    public function updateLogo(Request $request)
    {
        $this->validate($request,
            [
                'image' => 'required|image|mimes:png|max:1048',
            ]
        );

        $file = $request->file('image');

        $logo = rand() . "." . $file->getClientOriginalExtension();
        $file->move(public_path("uploads"), $logo);

        $user = Auth::user();
        $setting = Setting::where('id', 1)->first();

        if (File::exists(public_path('uploads/' . $setting->LogoPath))) {
            File::delete(public_path('uploads/' . $setting->LogoPath));
        }
        $setting->update([
            'LogoPath' => $logo,
        ]);
        return "Saved Successfully";

    }
}
