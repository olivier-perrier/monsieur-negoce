<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function upload(Request $request)
    {

        $path = Storage::putFile('devis', $request->file('file'));
        // TODO faire les routes dynamiques pour la livraison en intégration
        // TODO créer la ligne dans la base de donné pour stocker le path du fichier. Faut il prévoir d'upload plusieurs fichiers ?
        // $path = $request->file('file')->store('devis');
        dd($path);

        // $fileName = $uploadedFile->getClientOriginalName();

        // Storage::put($fileName, $uploadedFile);

        // Storage::disk('local')->putFileAs(
        //     'files/'.$filename,
        //     $uploadedFile,
        //     $filename
        //   );

        return back(); // redirect(route('users.edit', $user));
    }
}
