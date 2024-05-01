<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Main_Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainSectionController extends Controller
{
    public function viewMainSection()
    {
        $main_section = Main_Section::all();

        return view("admin.main_section.main_section_view", compact("main_section"));
    }

    public function mainSectionStore()
    {
        return view("admin.main_section.main_section_store");
    }

    public function addMainSection(Request $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/main_section/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        Main_Section::create([
            'title' => $request->title,
            'image' => $save_url_image,
            'content' => $request->content,
        ]);

        return redirect()->route('view.main.section');
    }

    public function editMainSection($id)
    {
        return view('admin.main_section.main_section_edit');
    }

    public function updateMainSection(Request $request, $id)
    {
        $main_section = Main_Section::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($main_section->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/main_section/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $main_section->image;
        }

        $main_section->update([
            'title' => $request->title,
            'image' => $save_url_image,
            'content' => $request->content,
        ]);

        return redirect()->route('view.main.section');
    }

    public function deleteMainSection($id)
    {
        $main_section = Main_Section::find($id);

        $main_section->delete();

        return redirect()->route('view.main.section');
    }
}
