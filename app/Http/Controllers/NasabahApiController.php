<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahApiController extends Controller
{
    public function index()
    {
        $nasabahs = Nasabah::with('agama')->get();
        return response()->json($nasabahs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'lahir' => 'required|date',
            'gender' => 'required|string',
            'agama_id' => 'required|exists:agamas,id',
        ]);

        $nasabah = Nasabah::create($request->all());

        return response()->json($nasabah, 201);
    }

    public function show(Nasabah $nasabah)
    {
        $nasabah = Nasabah::with('agama')->findOrFail($nasabah->id);
        return response()->json($nasabah);
    }

    public function update(Request $request, Nasabah $nasabah)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'lahir' => 'required|date',
            'gender' => 'required|string',
            'agama_id' => 'required|exists:agamas,id',
        ]);

        $nasabah->update($request->all());

        return response()->json($nasabah, 200);
    }

    public function destroy(Nasabah $nasabah)
    {
        $nasabah->delete();

        return response()->json(null, 204);
    }

}
