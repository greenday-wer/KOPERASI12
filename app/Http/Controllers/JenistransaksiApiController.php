<?php

namespace App\Http\Controllers;

use App\Models\Jenistransaksi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JenistransaksiApiController extends Controller
{
    public function index()
    {
        $jenistransaksis = Jenistransaksi::all();
        return response()->json($jenistransaksis);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenistransaksi' => 'required|string',
            'operator' => 'required|integer',
        ]);

        $jenistransaksi = Jenistransaksi::create($request->all());

        return response()->json($jenistransaksi, Response::HTTP_CREATED);
    }
    public function show(Jenistransaksi $jenistransaksi)
    {
        return response()->json($jenistransaksi);
    }

    public function update(Request $request, Jenistransaksi $jenistransaksi)
    {
        $request->validate([
            'jenistransaksi' => 'required|string',
            'operator' => 'required|integer',
        ]);

        $jenistransaksi->update($request->all());

        return response()->json($jenistransaksi, Response::HTTP_OK);
    }

    public function destroy(Jenistransaksi $jenistransaksi)
    {
        $jenistransaksi->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}