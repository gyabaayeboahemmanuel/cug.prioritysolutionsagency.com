<?php

namespace App\Http\Controllers;

use App\Models\AttachedDocuments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachedDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attachedDocuments = AttachedDocuments::all();
        return view('attacheddocuments.index', compact('attachedDocuments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.attacheddocuments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'ghanacard_upload_url' => 'nullable|file',
            'birthcert_upload_url' => 'nullable|file',
            'signature' => 'nullable|file',
            'wassce_upload_url' => 'required|file',
            'wassce2_upload_url' => 'nullable|file',
            'wassce3_upload_url' => 'nullable|file',
            'tertiarycert_upload_url' => 'nullable|file',
        ]);

        // Map the fields to their folder paths
        $files = [
            'ghanacard_upload_url' => 'ghanacard',
            'birthcert_upload_url' => 'birthcert',
            'signature' => 'signature',
            'wassce_upload_url' => 'wassce',
            'wassce2_upload_url' => 'wassce2',
            'wassce3_upload_url' => 'wassce3',
            'tertiarycert_upload_url' => 'tertiarycert',
        ];

        // Loop through and save each file
        foreach ($files as $field => $folder) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store($folder, 'public');
            }
        }

        // Create new attached documents
        $newAttachedDocuments = AttachedDocuments::create($data);

        if (!$newAttachedDocuments) {
            return redirect()->back()->with('error', 'Document upload was not successful.');
        }

        return redirect()->route('application.summary', $request->app_id)
                         ->with('success', 'Document uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $app_id)
    {
        $atd = AttachedDocuments::where('app_id', $app_id)->first();
        return view('user.attacheddocuments.edit', compact('atd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $app_id)
    {
        $data = $request->validate([
            'app_id' => 'required|max:255',
            'ghanacard_upload_url' => 'nullable|file',
            'birthcert_upload_url' => 'nullable|file',
            'signature' => 'nullable|file',
            'wassce_upload_url' => 'nullable|file',
            'wassce2_upload_url' => 'nullable|file',
            'wassce3_upload_url' => 'nullable|file',
            'tertiarycert_upload_url' => 'nullable|file',
        ]);

        // Retrieve existing attached documents by app_id
        $attachedDocument = AttachedDocuments::where('app_id', $app_id)->first();

        if (!$attachedDocument) {
            return redirect()->back()->with('error', 'Document not found.');
        }

        // Define all file fields and their storage folders
        $files = [
            'ghanacard_upload_url' => 'ghanacard',
            'birthcert_upload_url' => 'birthcert',
            'signature' => 'signature',
            'wassce_upload_url' => 'wassce',
            'wassce2_upload_url' => 'wassce2',
            'wassce3_upload_url' => 'wassce3',
            'tertiarycert_upload_url' => 'tertiarycert',
        ];

        foreach ($files as $field => $folder) {
            if ($request->hasFile($field)) {
                // Delete the old file if it exists
                if ($attachedDocument->$field) {
                    Storage::delete('public/' . $attachedDocument->$field);
                }
                // Store the new file and update the data array
                $data[$field] = $request->file($field)->store($folder, 'public');
            }
        }

        // Update the record
        $attachedDocument->update($data);

        return redirect()->route('attacheddocuments.edit', $attachedDocument->app_id)
                         ->with('success', 'Documents updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = AttachedDocuments::find($id);

        if (!$document) {
            return redirect()->back()->with('error', 'Document not found.');
        }

        // Delete the files
        $files = [
            $document->ghanacard_upload_url,
            $document->birthcert_upload_url,
            $document->signature,
            $document->wassce_upload_url,
            $document->wassce2_upload_url,
            $document->wassce3_upload_url,
            $document->tertiarycert_upload_url
        ];

        foreach ($files as $file) {
            if ($file) {
                Storage::delete('public/' . $file);
            }
        }

        // Delete the record
        $document->delete();

        return redirect()->route('attacheddocuments.index')
                         ->with('success', 'Document deleted successfully.');
    }
}
