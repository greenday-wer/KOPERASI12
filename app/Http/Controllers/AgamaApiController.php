<?php

namespace App\Http\Controllers;

use App\Models\agama;
use Illuminate\Http\Request;

class AgamaApiController extends Controller
{
    public function index()
    {
        $agamas = Agama::all();
        return response()->json($agamas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'agama' => 'required|string',
        ]);

        $agama = Agama::create($request->all());

        return response()->json($agama, 201);
    }

    public function show(Agama $agama)
    {
        return response()->json($agama);
    }

    public function update(Request $request, Agama $agama)
    {
        $request->validate([
            'agama' => 'required|string',
        ]);

        $agama->update($request->all());

        return response()->json($agama, 200);
    }

    public function destroy(Agama $agama)
    {
        $agama->delete();

        return response()->json(null, 204);
    }
}
