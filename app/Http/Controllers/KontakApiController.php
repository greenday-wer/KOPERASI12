<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use Illuminate\Http\Request;
//pada penamaan class harus sesuai tidak boleh asal isi misal app harus App

class KontakApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Kontak::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kontak = new Kontak();
        $kontak->fill($request->all())->save();
        return $kontak;
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Kontak::find($id);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kontak = Kontak::find($id);
        $kontak->fill($request->all())->save();
        return $kontak;   
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kontak = Kontak::find($id);
        $kontak->delete();
        //
    }
}
