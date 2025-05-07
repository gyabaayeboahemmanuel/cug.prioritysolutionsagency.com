<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   

public function home()
{
    $testimonials = Testimonial::latest()->take(6)->get();
    $posts = Post::latest()->take(3)->get(); // Show only latest 3
    return view('welcome', compact('posts', 'testimonials')); // or your frontend blade
}

}
