<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:255',
            'uf' => 'required|string|max:255',
        ]);

        $local = Local::create($request->all());

        return response()->json([$local], 201);
    }
}
