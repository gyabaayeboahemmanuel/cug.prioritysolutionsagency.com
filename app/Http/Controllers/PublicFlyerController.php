<?php

namespace App\Http\Controllers;

use App\Models\Flyer;

class PublicFlyerController extends Controller
{
    public function index()
    {
        $flyers = Flyer::latest()->where('is_featured', true)->paginate(12);
        return view('frontend.flyers.index', compact('flyers'));
    }

    public function show($slug)
    {
        $flyer = Flyer::where('slug', $slug)->firstOrFail();
        return view('frontend.flyers.show', compact('flyer'));
    }
}
