@extends('layout.template')

@section('konten')
    <form action="{{ url('mahasiswa/'.$data->nim) }}" method="post">
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    {{ $data->nim }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ old('nama', $data->nama) }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $data->alamat) }}" id="alamat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal Lahir:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" id="date">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin:</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="male" value="Laki-Laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-Laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="male">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="female" value="Perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="female">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label" for="program_studi">Program Studi:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="program_studi" id="programStudi">
                        <option value="">Pilih Program Studi</option>
                        <option value="Teknologi Informasi" {{ old('program_studi', $data->program_studi) == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
                        <option value="Teknik Elektro" {{ old('program_studi', $data->program_studi) == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                        <option value="Teknik Mesin" {{ old('program_studi', $data->program_studi) == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                        <option value="Teknik Lingkungan" {{ old('program_studi', $data->program_studi) == 'Teknik Lingkungan' ? 'selected' : '' }}>Teknik Lingkungan</option>
                        <option value="Teknik Industri" {{ old('program_studi', $data->program_studi) == 'Teknik Industri' ? 'selected' : '' }}>Teknik Industri</option>
                        <option value="Teknik Sipil" {{ old('program_studi', $data->program_studi) == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
            <a href="{{ url('mahasiswa') }}" class="btn btn-secondary">kembali</a>
        </div>
    </form>
@endsection
