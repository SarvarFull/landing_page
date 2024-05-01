<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Landing_Page;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function mainPage()
    {
        $user = Session::get('user');
        $landings = Landing_Page::all();
        return view("landing.main", compact("landings", "user"));
    }
}
