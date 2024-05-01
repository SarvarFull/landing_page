<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function viewSubscribers()
    {
        $subscribers = Newsletter::all();

        return view("admin.subscribers.subscribers_view", compact("subscribers"));
    }
}
