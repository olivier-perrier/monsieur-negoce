<?php

namespace App\Http\Controllers;

use App\File;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function download(Request $request, File $file)
    {
        $this->authorize('ownerOrAdmin', $file->user_id);

        return Storage::download($file->path, $file->original_name);
    }


    public function upload(Request $request)
    {

        $validatedData = $request->validate([
            'file' => 'required|mimes:jpeg,bmp,png,pdf',
        ]);

        // 'file' => 'mimes:jpeg,bmp,png,pdf',

        $project_id = $request->query('project_id');

        // Project::find($project_id)->contains();
        // dd(Auth::user()->projects.contains($project_id, 'client_id'));

        // TODO Sécurité : L'utilisateur doit etre négociateur et sur un de ses projets
        // Autoriser uniquement certain type de fichier

        // TODO vérifier s'il y a vraiment un fichier


        $path = Storage::putFile('devis', $request->file('file'));
        // $path = $request->file('file')->store('devis');
        
        $fileName = $request->file('file')->getClientOriginalName();
        
        $file = new File([
            'path' => $path,
            'original_name' => $fileName,
            'user_id' => Auth::id(),
            'project_id' => $project_id
        ]);

        $file->save();


        return back(); // redirect(route('users.edit', $user));
    }
}
