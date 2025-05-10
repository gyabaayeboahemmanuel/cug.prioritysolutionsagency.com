<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the references.
     */
    public function index()
    {
        $references = Reference::all();
        return view('user.references.index', compact('references'));
    }

    /**
     * Show the form for creating a new reference.
     */
    public function create()
    {
        return view('user.references.create');
    }

    /**
     * Store a newly created reference in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'app_id' => 'required|string|exists:users,app_id',
            'ref1_name' => 'nullable|string|max:255',
            'ref1_organisation' => 'nullable|string|max:255',
            'ref1_position' => 'nullable|string|max:255',
            'ref1_phone' => 'nullable|string|max:15',
            'ref1_email' => 'nullable|email|max:255',
            'ref2_name' => 'nullable|string|max:255',
            'ref2_organisation' => 'nullable|string|max:255',
            'ref2_position' => 'nullable|string|max:255',
            'ref2_phone' => 'nullable|string|max:15',
            'ref2_email' => 'nullable|email|max:255',
        ]);

        Reference::create($validated);

         // 🔄 Redirect to the next step
    return redirect()->route('postgraduatedocuments.index')
    ->with('success', 'Reference added successfully. Proceed to upload your documents.');
}
    

    /**
     * Display the specified reference.
     */
    public function show(Reference $reference)
    {
        return view('user.references.show', compact('reference'));
    }

    /**
     * Show the form for editing the specified reference.
     */
    public function edit($app_id)
    {
        $reference = Reference::where('app_id', $app_id)->firstOrFail();
        return view('user.references.edit', compact('reference'));
    }
    

    /**
     * Update the specified reference in storage.
     */
    public function update(Request $request, Reference $reference)
    {
        $validated = $request->validate([
            'app_id' => 'required|string|exists:users,app_id',
            'ref1_name' => 'nullable|string|max:255',
            'ref1_organisation' => 'nullable|string|max:255',
            'ref1_position' => 'nullable|string|max:255',
            'ref1_phone' => 'nullable|string|max:15',
            'ref1_email' => 'nullable|email|max:255',
            'ref2_name' => 'nullable|string|max:255',
            'ref2_organisation' => 'nullable|string|max:255',
            'ref2_position' => 'nullable|string|max:255',
            'ref2_phone' => 'nullable|string|max:15',
            'ref2_email' => 'nullable|email|max:255',
        ]);

        $reference->update($validated);

        return redirect()->route('references.index')
            ->with('success', 'Reference updated successfully.');
    }

    /**
     * Remove the specified reference from storage.
     */
    public function destroy(Reference $reference)
    {
        $reference->delete();
        return redirect()->route('references.index')
            ->with('success', 'Reference deleted successfully.');
    }
}
