@extends('layout')

@section('content')
<div class="row">
    
    <div class="container" id="img_size ms-auto ">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Daftar Siswa</h4>
               
                <p class="card-description">
                   <a href="{{ route('siswa.create') }}">+ Tambah Jurusan</a>
                </p>
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                           
                            <th>Id</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Kelas</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                        
                        
                        
                        <td>{{ $siswa->id }}</td>
                        <td>
                          <img src="{{ asset('storage/'. $siswa->foto) }}" alt="">
                        </td>
                        
                        <td> {{ $siswa->nama }} </td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->no_tlp }}</td>
                        <td>{{ $siswa->Kelas->nama }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('siswa.edit', $siswa->id ) }}"  class="btn btn-success btn-sm btn-icon-text mr-3">Edit</a>
                               
                                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete" class="btn btn-danger btn-sm btn-icon-text" >
                                </form>
                                
                            </div>
                           
                        </td>
                    </tr>
                    @endforeach
                
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection