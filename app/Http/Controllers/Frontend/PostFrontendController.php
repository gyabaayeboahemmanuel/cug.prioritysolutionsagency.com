<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostFrontendController extends Controller
{
 

public function show($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();
    $recentPosts = Post::latest()->take(5)->get();
    return view('frontend.posts.show', compact('post', 'recentPosts'));
    
}
public function index()
    {
        $posts = Post::latest()->paginate(6); // Adjust the number as needed
        return view('frontend.posts.index', compact('posts'));
    }

}
