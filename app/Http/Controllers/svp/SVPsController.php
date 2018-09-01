<?php

namespace App\Http\Controllers\svp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SVPsController extends Controller
{
    public function register(Request $r)
    {
        $svp=new SVP();
        $svp->name=$r->username;
        $svp->username=$r->username;
        $svp->password=$r->password;
        $svp->email=$r->email;
        $svp->save();
    }
}
