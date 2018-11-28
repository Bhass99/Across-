<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class FileController extends Controller
{
    public function download($id)

    { $posts = Post::find($id);


        $file = $posts->file;
        return response()->download(storage_path('/app/public/uploads/' . $file));

    }
}
