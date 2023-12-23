<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TabunganApiController extends Controller
{
    public function index()
    {
        $tabungans = Tabungan::with(['jenistransaksi', 'nasabah', 'user'])->get();
        return response()->json($tabungans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nasabah_id' => 'required|exists:nasabahs,id',
            'jenistransaksi_id' => 'required|exists:jenistransaksis,id',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $tabungan = Tabungan::create($request->all());

        return response()->json($tabungan, Response::HTTP_CREATED);
    }

    public function show(Tabungan $tabungan)
    {
        $tabungan = Tabungan::with(['jenistransaksi', 'nasabah', 'user'])->findOrFail($tabungan->id);
        return response()->json($tabungan);
    }

    public function update(Request $request, Tabungan $tabungan)
    {
        $request->validate([
            'nasabah_id' => 'required|exists:nasabahs,id',
            'jenistransaksi_id' => 'required|exists:jenistransaksis,id',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $tabungan->update($request->all());

        return response()->json($tabungan, Response::HTTP_OK);
    }

    public function destroy(Tabungan $tabungan)
    {
        $tabungan->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}