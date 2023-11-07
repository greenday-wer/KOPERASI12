@extends('layout.template')
@section('konten')
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{url('mahasiswa')}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci berupa nim" aria-label="Search">
                      <button class="btn btn-primary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{url('mahasiswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">NIM</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">Tanggal Lahir</th>
                            <th class="col-md-2">Jenis Kelamin</th>
                            <th class="col-md-2">Program Studi</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstitem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->nim}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->tanggal_lahir}}</td>
                            <td>{{$item->jenis_kelamin}}</td>
                            <td>{{$item->program_studi}}</td>
                            <td>
                                <!--melakukan edit data-->
                                <a href='{{url('mahasiswa/'.$item->nim.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm ('Yakin Delete Data?')" class="d-inline" action="{{url('mahasiswa/'.$item->nim)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
          </div>
          <!-- AKHIR DATA -->
          @endsection