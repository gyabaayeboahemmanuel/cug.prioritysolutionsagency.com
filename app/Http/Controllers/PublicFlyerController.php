<?php

namespace App\Http\Controllers;

use App\Models\Flyer;

class PublicFlyerController extends Controller
{
    public function index()
    {
        $flyers = Flyer::latest()->where('is_featured', true)->paginate(12);
        return view('flyers.public.index', compact('flyers'));
    }

    public function show($slug)
    {
        $flyer = Flyer::where('slug', $slug)->firstOrFail();
        return view('flyers.public.show', compact('flyer'));
    }
}
