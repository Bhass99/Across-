<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
class FileController extends Controller
{
    public function download($id)

    { $files = File::find($id);


        $file = $files->file;
        $TheFile = storage_path('/app/public/uploads/' . $file);
        $ext = pathinfo(storage_path().$TheFile, PATHINFO_EXTENSION);

        if($ext == 'pdf'){
            return response()->file(storage_path('/app/public/uploads/' . $file));
        }else{
            return response()->download(storage_path('/app/public/uploads/' . $file));
        }


    }
}
