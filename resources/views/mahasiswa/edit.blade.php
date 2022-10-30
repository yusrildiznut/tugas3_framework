@extends('master')
@section('title','Mahasiswa')
@section('menu2','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: maroon;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Data Mahasiswa</h2>
                <p>Masukkan data Mahasiswa dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('mahasiswas.update', ['mahasiswa' => $mahasiswa->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" name="npm" id="npm" placeholder="Masukkan NPM" class="form-control" value="{{old('npm') ?? $mahasiswa->npm}}">
                        @error('npm')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" value="{{old('nama') ?? $mahasiswa->nama}}">
                        @error('nama')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="laki-laki" {{old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == "laki-laki" ? "selected" : ""}}>Laki-laki</option>
                            <option value="perempuan" {{old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == "perempuan" ? "selected" : ""}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat">{{old('alamat') ?? $mahasiswa->alamat}}</textarea>
                        @error('alamat')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="{{old('tempat_lahir') ?? $mahasiswa->tempat_lahir}}">
                        @error('tempat_lahir')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="{{old('tanggal_lahir') ?? $mahasiswa->tanggal_lahir}}">
                        @error('tanggal_lahir')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="hidden" name="oldPhoto" value="{{$mahasiswa->photo}}">
                        @if($mahasiswa->photo)
                        <img src="{{asset('storage/' . $mahasiswa->photo)}}" class="img-preview img-fluid mb-4 col-sm-5 d-block">
                        @else
                        <img class="img-preview img-fluid mb-4 col-sm-5 d-block">
                        @endif

                        <input type="file" name="photo" id="photo" placeholder="Masukkan Foto" class="form-control" onchange="previewImage()">
                        @error('photo')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-maroon">Edit</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImage(){
            const photo = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(photo.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection