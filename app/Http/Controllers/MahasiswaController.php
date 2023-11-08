<?php

namespace App\Http\Controllers;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $resquest)
    {
        $katakunci = $resquest->katakunci;
        if(strlen($katakunci)){
            $data = mahasiswa::where('nim',"like", "%$katakunci%")
            ->orwhere ("nama","like", $katakunci)
            ->orwhere ("alamat","like", $katakunci)
            ->paginate(3);
        }else{

        $data = mahasiswa::orderBy('nim','desc')->paginate(3);
        }
        return view("mahasiswa.formku")->with('data', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("mahasiswa.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('program_studi', $request->program_studi);


        $request->validate([
            'nim'=>'required|numeric|unique:mahasiswas,nim',
            'nama'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required|in:Laki-Laki,Perempuan',
            'program_studi'=>'required|in:Teknologi Informasi,Teknik Elektro,Teknik Mesin,Teknik Lingkungan,Teknik Industri,Teknik Sipil',

        ],[
            'nim.required'=>'Nim wajib diisi',
            'nim.numeric'=>'Nim wajib numeric',
            'nim.unique'=>'Nim sudah ada di database',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'tanggal_lahir.required'=>'Tanggal Lahir wajib diisi',
            'jenis_kelamin.required'=>'Jenis Kelamin wajib diisi',
            'program_studi.required'=>'Program Studi wajib diisi',


        ]);
        $data = [
            "nim"=> $request->nim,
            "nama"=> $request->nama,
            "alamat"=> $request->alamat,
            "tanggal_lahir"=> $request->tanggal_lahir,
            "jenis_kelamin"=> $request->jenis_kelamin,
            "program_studi"=> $request->program_studi,
        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil Menambahkan Data');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=mahasiswa::where('nim',$id)->first();
        return view('mahasiswa.edit')->with ('data', $data);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'program_studi'=>'required',

        ],[
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'alamat wajib diisi',
            'tanggal_lahir.required'=>'tanggal lahir wajib diisi',
            'jenis_kelamin.required'=>'jenis kelamin wajib diisi',
            'program_studi.required'=>'program studi wajib diisi',
        ]);
        $data = [
            "nama"=> $request->nama,
            "alamat"=> $request->alamat,
            "tanggal_lahir"=> $request->tanggal_lahir,
            "jenis_kelamin"=> $request->jenis_kelamin,
            "program_studi"=> $request->program_studi,
        ];
        mahasiswa::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil Update Data');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mahasiswa::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('success','Berhasil Delete Data');
        //
    }
}
