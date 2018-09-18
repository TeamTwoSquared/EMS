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
    public static function destroy($id)
    {   
        // remove all catergoies belong to a template
        return CatergoryTemplate::where('template_id',$id)->delete();
    }
    public static function getCatergoriesTemp($template_id)
    {
        $catergory_templates = CatergoryTemplate::where('template_id',$template_id)->get();
        $catergory_all = Array();
        foreach($catergory_templates as $catergory_template)
        {
            $catergory = Catergory::where('catergory_id',$catergory_template->catergory_id)->get();
            $catergory = $catergory[0];
            $catergory_all = array_prepend($catergory_all,$catergory);
        }
        return $catergory_all;
    }

}//end of class
