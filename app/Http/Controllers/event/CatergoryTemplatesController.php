<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Catergory;
use App\CatergoryTemplate;

class CatergoryTemplatesController extends Controller
{
    public static function getCatergories($template_id)
    {
        //Use to return a catergory name set when a template Id is provided
        $catergory_templates = CatergoryTemplate::where('template_id',$template_id)->get();
        $catergory_names = Array();
        foreach($catergory_templates as $catergory_template)
        {
            $catergory = Catergory::where('catergory_id',$catergory_template->catergory_id)->get();
            $catergory = $catergory[0];
            $catergory_names = array_prepend($catergory_names,$catergory->name);
        }
        return $catergory_names;
        

    }

}//end of class
