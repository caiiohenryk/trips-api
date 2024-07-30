<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'date'=>'required|date',
            'local_id' => 'required|exists:locals,id'
        ]);

        $trip = Trip::create($request->all());
        return response()->json([$trip], 201);

    }

}
