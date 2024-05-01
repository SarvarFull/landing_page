<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarouselController extends Controller
{
    public function viewCarousel()
    {
        $carousel = Carousel::all();
        return view("admin.carousel.carousel_view", compact("carousel"));
    }

    public function carouselStore()
    {
        return view("admin.carousel.carousel_store");
    }

    public function addCarousel(Request $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/carousel/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        Carousel::create([
            'title' => $request->title,
            'bg_image' => $save_url_image,
            'content' => $request->content,
        ]);

        return redirect()->route('view.carousel');
    }

    public function editCarousel($id)
    {
        $carousel = Carousel::all();

        return view('admin.carousel.carousel_edit', compact('carousel'));
    }

    public function updateCarousel(Request $request, Carousel $carousel, $id)
    {
        $carousel = Carousel::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($carousel->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/carousel/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $carousel->image;
        }

        $carousel->update([
            'title' => $request->title,
            'bg_image' => $save_url_image,
            'content' => $request->content,
        ]);

        return redirect()->route('view.carousel');
    }

    public function deleteCarousel($id)
    {
        $carousel = Carousel::find($id);

        $carousel->delete();

        return redirect()->route('view.carousel');
    }
}
