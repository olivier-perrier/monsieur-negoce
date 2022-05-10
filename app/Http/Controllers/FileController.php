<?php

namespace App\Http\Controllers;

use App\File;
use App\Notifications\FileUploaded;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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
            'file' => 'required|mimes:jpeg,bmp,png,pdf|file|max:2048',
        ]);

        $project_id = $request->query('project_id');

        $path = Storage::putFile('devis', $request->file('file'));

        $fileName = $request->file('file')->getClientOriginalName();

        $file = new File([
            'path' => $path,
            'original_name' => $fileName,
            'user_id' => Auth::id(),
            'project_id' => $project_id
        ]);

        $file->save();

        /*** Notifications */

        // Client, negotiator et Admin
        $client = Project::find($project_id)->client;
        $negotiator = Project::find($project_id)->negotiator;
        
        Notification::send($client, new FileUploaded($fileName, $project_id));

        if ($negotiator)
            Notification::send($negotiator, new FileUploaded($fileName, $project_id));

        Notification::send(User::get_administrators(), new FileUploaded($fileName, $project_id));

        return back()
            ->with('notification_file', 'Un mail a été envoyé avec succès pour informé du nouveau devis.');
    }
}
