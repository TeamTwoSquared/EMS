<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatergoryImage;

class CatergoryImageController extends Controller
{
    public static function destroy($id)
    {
        $catergoryImages=CatergoryImage::where('catergory_id',$id)->get();
        if(($catergoryImages->count())>0)
        {
            foreach($catergoryImages as $catergoryImage)
            {
                Storage::delete('public/images/catergory/'.$catergoryImage->imgurl);
            }
        }
        return CatergoryImage::where('catergory_id',$id)->delete();
    }
}
