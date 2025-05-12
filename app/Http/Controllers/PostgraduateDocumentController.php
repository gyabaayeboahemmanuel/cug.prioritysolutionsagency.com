<?php

namespace App\Http\Controllers;

use App\Models\PostgraduateDocuments;
use App\Models\TertiaryDetails;
use Illuminate\Http\Request;

class PostgraduateDocumentController extends Controller
{
    /**
     * Display a listing of the postgraduate documents.
     */
    public function index()
    {
        // Check if user has filled tertiary details
        $tertiaryDetails = TertiaryDetails::where('app_id', auth()->user()->app_id)->first();
        
        if (!$tertiaryDetails) {
            return redirect()->route('tertiarydetails.create')
                ->with('error', 'Please fill in your tertiary education details before accessing postgraduate documents.');
        }
    
        $postgraduateDocuments = PostgraduateDocuments::where('app_id', auth()->user()->app_id)->get();
        return view('user.postgraduatedocuments.index', compact('postgraduateDocuments'));
    }
    

    /**
     * Show the form for creating a new postgraduate document.
     */
    public function create()
    {
        return   redirect()->route('postgraduatedocuments.index');
    }

    /**
     * Store a newly created postgraduate document in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'document_type' => 'required|string|max:255',
            'upload_url' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048'
        ]);
    
        $filePath = $request->file('upload_url')->store('postgraduate_documents', 'public');
    
        PostgraduateDocuments::create([
            'app_id' => $request->app_id,
            'document_type' => $request->document_type,
            'upload_url' => $filePath,
        ]);
    
        return response()->json(['success' => true]);
    }
    
    /**
     * Display the specified postgraduate document.
     */
    public function show(PostgraduateDocuments $postgraduateDocument)
    {
        return view('user.postgraduatedocuments.show', compact('postgraduateDocument'));
    }

    /**
     * Show the form for editing the specified postgraduate document.
     */
    public function edit(PostgraduateDocuments $postgraduateDocument)
    {
        return view('user.postgraduatedocuments.edit', compact('postgraduateDocument'));
    }

    /**
     * Update the specified postgraduate document in storage.
     */
    public function update(Request $request, PostgraduateDocuments $postgraduateDocument)
    {
        $validated = $request->validate([
            'app_id' => 'required|string|exists:users,app_id',
            'document_type' => 'required|string|max:255',
            'upload_url' => 'required|string|max:255',
        ]);

        $postgraduateDocument->update($validated);

        return redirect()->route('postgraduatedocuments.index')
            ->with('success', 'Postgraduate Document updated successfully.');
    }

    /**
     * Remove the specified postgraduate document from storage.
     */
    public function destroy(PostgraduateDocuments $postgraduateDocument)
    {
        $postgraduateDocument->delete();
        return redirect()->route('postgraduatedocuments.index')
            ->with('success', 'Postgraduate Document deleted successfully.');
    }
}
