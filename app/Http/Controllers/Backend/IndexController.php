<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function admin_register()
    {
        return view("admin.admin_register");
    }

    public function admin_dashboard()
    {
        return view("admin.admin");
    }

    public function admin_sign_in(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin', $admin);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.register.page');
        }
    }
}
