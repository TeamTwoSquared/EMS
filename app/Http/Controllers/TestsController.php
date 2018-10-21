<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestsController extends Controller
{
    public function ajaxRequestPost(Request $request)
    {
        $number = count($request->name);
        if ($number > 1 )
        {
            for($i=0;$i<$number;$i++)
            {
                if(trim($request->name[$i]) != '')
                {
                    $test = new Test();
                    $test->name = $request->name[$i];
                    $test->save();
                }
            }
            
            echo "Data Inserted";
        }
        else
        {
            echo "Enter name";
        }
         
    }

    public function add2(Request $request)
    {
        //$input = request()->all();
        $number = count($request->name);
        if ($number > 2 ){
        return response()->json(['success'=>$request->name[1] ]);
        }
        return response()->json(['success'=>'qqqqqq']);
    }
}
