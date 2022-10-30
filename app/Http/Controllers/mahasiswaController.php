<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\Storage;

class mahasiswaController extends Controller
{
    public function index(){
        $mahasiswas = mahasiswa::get();
        return view('mahasiswa.index', ['mahasiswas'=>$mahasiswas]);
    }

    public function create(){
        return view('mahasiswa.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'npm'=>'required|numeric',
            'nama'=>'required|min:5',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:10',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'photo'=>'required|file|image'
        ]);

        $validate['photo'] = $request->file('photo')->store('mahasiswa');

        mahasiswa::create($validate);

        return redirect()->route('mahasiswas.index')->with('message', "Data mahasiswa {$validate['nama']} berhasil ditambahkan");
    }

    public function edit(mahasiswa $mahasiswa){
        return view('mahasiswa.edit', ['mahasiswa'=>$mahasiswa]);
    }

    public function update(Request $request, mahasiswa $mahasiswa){
        $validate = [
            'npm'=>'required|numeric',
            'nama'=>'required|min:5',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:10',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'photo'=>'required|file|image'
        ];

        $validateData = $request->validate($validate);

        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validateData['photo'] = $request->file('photo')->store('mahasiswa');
        }

        mahasiswa::where('id', $mahasiswa->id)->update($validateData);
        return redirect()->route('mahasiswas.index')->with('message', "Data mahasiswa $mahasiswa->nama berhasil diubah");
    }

    public function destroy(mahasiswa $mahasiswa){
        if($mahasiswa->photo){
            Storage::delete($mahasiswa->photo);
        }

        $mahasiswa->destroy($mahasiswa->id);
        return redirect()->route('mahasiswas.index')->with('message', "Data mahasiswa $mahasiswa->nama berhasil dihapus");
    }
}
