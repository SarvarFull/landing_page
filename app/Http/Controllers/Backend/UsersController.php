<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function viewUsers()
    {
        $users = User::all();

        return view("admin.users.users_view", compact("users"));
    }
}
