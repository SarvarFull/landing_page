<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Heading;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeadingController extends Controller
{
    public function viewHeading()
    {
        $heading = Heading::all();

        return view("admin.heading.heading_view", compact("heading"));
    }

    public function headingStore()
    {
        return view("admin.heading.heading_store");
    }

    public function addHeading(Request $request)
    {
        $logo = $request->file('logo');

        $logo_name = Str::random(20);
        $ext = strtolower($logo->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $logo_full_name = $logo_name . '.' . $ext;
        $upload_path = 'upload/heading/logo/';    //Creating Sub directory in Public folder to put logo
        $save_url_logo = $upload_path . $logo_full_name;
        $success = $logo->move($upload_path, $logo_full_name);

        Heading::create([
            'title' => $request->title,
            'logo' => $save_url_logo,
            'about' => $request->about,
            'in_detail' => $request->in_detail,
        ]);

        return redirect()->route('view.heading');
    }

    public function editHeading(Heading $heading)
    {
        $heading = Heading::all();

        return view('admin.heading.heading_edit', compact('heading'));
    }

    public function updateHeading(Request $request, Heading $heading, $id)
    {
        $heading = Heading::find($id);
        $logo = $request->file('logo');
        if ($logo) {
            unlink($heading->logo);
            $logo_name = Str::random(20);
            $ext = strtolower($logo->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $logo_full_name = $logo_name . '.' . $ext;
            $upload_path = 'upload/heading/logo/';    //Creating Sub directory in Public folder to put logo
            $save_url_logo = $upload_path . $logo_full_name;
            $success = $logo->move($upload_path, $logo_full_name);
        } else {
            $save_url_logo = $heading->logo;
        }

        $heading->update([
            'title' => $request->title,
            'logo' => $save_url_logo,
            'about' => $request->about,
            'in_detail' => $request->in_detail,
        ]);

        return redirect()->route('view.heading');
    }

    public function deleteHeading($id)
    {
        $heading = Heading::find($id);

        $heading->delete();

        return redirect()->route('view.heading');
    }
}
