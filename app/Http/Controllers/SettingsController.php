<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public static function getAdPrice($type)
    {
        if($type == 0 )//For bottom Ad
        {
            $value = Setting::select('value')->where('property','bottom_ad_price')->get();
            return $value[0];
        }
        else
        {
            $value = Setting::select('value')->where('property','right_ad_price')->get();
            return $value[0];
        }
    }
    
}
