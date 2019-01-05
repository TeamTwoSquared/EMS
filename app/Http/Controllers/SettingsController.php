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

    public static function getPayHereDetails()
    {
        $merchant_id = Setting::select('value')->where('property','merchant_id')->get()[0]->value;
        $merchant_secret = Setting::select('value')->where('property','merchant_secret')->get()[0]->value;
        $payhere_action = Setting::select('value_string')->where('property','payhere_action')->get()[0]->value_string;

        $payhere = Array('merchant_id' => $merchant_id,'merchant_secret' => $merchant_secret, 'payhere_action' => $payhere_action );
        return $payhere;
    }

    public static function getMaxRightAds()
    {
        $num = Setting::select('value')->where('property','max_right_ads')->get()[0]->value;
        return $num;
    }

    public static function getMaxBottomAds()
    {
        $num = Setting::select('value')->where('property','max_bottom_ads')->get()[0]->value;
        return $num;
    }
    
}
