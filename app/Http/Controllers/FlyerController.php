<?php

namespace App\Http\Controllers;

use App\Models\Flyer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FlyerController extends Controller
{
    public function index()
    {
        $flyers = Flyer::latest()->paginate(10);
        return view('admin.flyers.index', compact('flyers'));
    }

    public function create()
    {
        return view('admin.flyers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'programme' => 'nullable|string|max:255',
            'mode' => 'required|string|max:50',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('flyers', 'public');

        Flyer::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'faculty' => $request->faculty,
            'programme' => $request->programme,
            'mode' => $request->mode,
            'description' => $request->description,
            'is_featured' => $request->input('is_featured', false),
            'image_path' => $path,
        ]);
        return redirect()->route('admin.flyers.index')->with('success', 'Flyer uploaded successfully.');
    }

    public function show(Flyer $flyer)
    {
        return view('admin.flyers.show', compact('flyer'));
    }

    public function edit(Flyer $flyer)
    {
        return view('admin.flyers.edit', compact('flyer'));
    }

    public function update(Request $request, Flyer $flyer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'programme' => 'nullable|string|max:255',
            'mode' => 'required|string|max:50',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($flyer->image_path);
            $flyer->image_path = $request->file('image')->store('flyers', 'public');
        }

        $flyer->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'faculty' => $request->faculty,
            'programme' => $request->programme,
            'mode' => $request->mode,
            'description' => $request->description,
           'is_featured' => $request->input('is_featured', false),

            'image_path' => $flyer->image_path,
        ]);

        return redirect()->route('admin.flyers.index')->with('success', 'Flyer updated successfully.');
    }

    public function destroy(Flyer $flyer)
    {
        Storage::disk('public')->delete($flyer->image_path);
        $flyer->delete();
        return redirect()->route('admin.flyers.index')->with('success', 'Flyer deleted successfully.');
    }
}
