<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatergoryImage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class CatergoryImageController extends Controller
{
    public static function destroy($id, $imgurls)
    {
        if($imgurls!=null)
        {
            foreach ($imgurls as $imgurl)
            {
                Storage::delete('public/images/catergory/'.$imgurl);
            }
            return CatergoryImage::where('catergory_id',$id)->whereIn('imgurl',$imgurls)->delete();
        }
    }

    public static function getImages($catergory_id)
    {
        $catergoryImages=CatergoryImage::where('catergory_id',$catergory_id)->get();
        return $catergoryImages;
    }
}
