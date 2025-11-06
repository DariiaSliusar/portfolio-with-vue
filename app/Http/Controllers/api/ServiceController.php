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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $service = new Service;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->save();
    }
}
