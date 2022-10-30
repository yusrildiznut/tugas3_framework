@extends('master')
@section('title','Mata Kuliah')
@section('menu3','active')

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
                <h2>Edit Data Mata Kuliah</h2>
                <p>Masukkan data Mata Kuliah dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('matakuliahs.update', ['matakuliah' => $matakuliah->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                        <input type="text" name="kode_mk" id="kode_mk" placeholder="Masukkan Kode Mata Kuliah" class="form-control" value="{{old('kode_mk') ?? $matakuliah->kode_mk}}">
                        @error('kode_mk')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama_mk" id="nama_mk" placeholder="Masukkan Nama Mata Kuliah" class="form-control" value="{{old('nama_mk') ?? $matakuliah->nama_mk}}">
                        @error('nama_mk')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-maroon">Edit</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection