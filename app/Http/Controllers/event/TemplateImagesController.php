<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TemplateImage;

class TemplateImagesController extends Controller
{
    public static function destroy($id)
    {
        $templateImages=TemplateImage::where('template_id',$id)->get();
        if(($catergoryImages->count())>0)
        {
            foreach($templateImages as $templateImage)
            {
                Storage::delete('public/images/template/'.$templateImage->imgurl);
            }
        }
        return TemplateImage::where('template_id',$id)->delete();
    }
}
