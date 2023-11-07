@extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action='{{url('mahasiswa')}}' method='post'>
    @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nim' value="{{Session::get('nim')}}" id="nim">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{Session::get('nama')}}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' value="{{Session::get('alamat')}}" id="alamat">
                </div>
            </div>
            <div class="form-group" class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="date">Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="{{Session::get('tanggal_lahir')}}" id="date">
            </div>
            <div class="form-group" class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin"id="male" value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'checked' : '' }}>
                    <label class="form-check-label" for="male">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="female" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                    <label class="form-check-label" for="female">Perempuan</label>
                </div>
            </div>
            <div class="form-group" class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="program_studi">Program Studi:</label>
                <select class="form-control" name="program_studi" id="programStudi">
                    <option value="">Pilih Program Studi</option>
                    <option value="Teknologi Informasi" {{ old('programStudi') == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
                    <option value="Teknik Elektro" {{ old('programStudi') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                    <option value="Teknik Mesin" {{ old('programStudi') == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                    <option value="Teknik Lingkungan" {{ old('programStudi') == 'Teknik Lingkungan' ? 'selected' : '' }}>Teknik Lingkungan</option>
                    <option value="Teknik Industri" {{ old('programStudi') == 'Teknik Industri' ? 'selected' : '' }}>Teknik Industri</option>
                    <option value="Teknik Sipil" {{ old('programStudi') == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                </select>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary float-end" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->
    @endsection