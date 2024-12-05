<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('admin.vue-ensemble.documents', compact('documents'));
    }

    public function store(Request $request)
    {
        // Validation du fichier et des autres champs
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx,jpg,png', // Ajoutez les extensions autorisées
            'nom' => 'required|string|max:255',
        ]);

        // Gérer le fichier uploadé
        $file = $request->file('document');
        $path = $file->store('documents'); // Stocke le fichier dans 'storage/app/documents'

        // Créer un nouvel enregistrement dans la base de données
        Document::create([
            'nom' => $request->nom,
            'chemin' => $path, // Stocker le chemin du fichier
        ]);

        return redirect()->route('documents.index')->with('success', 'Document importé avec succès.');
    }

    public function show($filename)
    {
        $path = storage_path('app/documents/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        Storage::delete($document->chemin);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document supprimé avec succès.');
    }
}
