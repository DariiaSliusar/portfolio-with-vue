<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    //
    public function index()
    {
        $medias = Media::orderby('id', 'DESC')->get();

        return response()->json(
            [
                'medias' => $medias
            ], 200);
    }
}
