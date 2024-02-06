@extends('layout')

@section('content')

<form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Default form</h4>
                <p class="card-description">
                    Basic form layout
                </p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="">Nama </label>
                        <input type="text" class="form-control  @error('nama')
                        is-invalid
                    @enderror" id="" placeholder="" name="nama" value="{{old('nama') ?? $siswa->nama}}">
                    @error('nama')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control  @error('alamat')
                        is-invalid
                    @enderror" id="" placeholder="" name="alamat" value="{{old('alamat') ?? $siswa->alamat}}">
                    @error('alamat')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No Telpon</label>
                        <input type="text" class="form-control  @error('no_tlp')
                        is-invalid
                    @enderror" id="" placeholder="" name="no_tlp" value="{{old('no_tlp') ?? $siswa->no_tlp}}">
                    @error('no_tlp')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                

                    <div class="form-group">
                        <label for="">Kelass</label>
                       <select name="kelas_id" id="">
                        @foreach ($kelass as $kelas)
                        <option value="{{ $kelas->id }}" @selected($kelas->id == $siswa->kelas_id)> {{ $kelas->nama }}</option>
                            
                        @endforeach
                       </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Foto</label>
                        <img src="{{ asset('storage/'. $siswa->foto) }}" alt="">
                        <input type="file" class="form-control" name="foto">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</form>

@endsection