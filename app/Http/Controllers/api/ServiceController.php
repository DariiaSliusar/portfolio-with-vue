<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return response()->json(
            [
                'services' => $services
            ], 200);
    }
}
