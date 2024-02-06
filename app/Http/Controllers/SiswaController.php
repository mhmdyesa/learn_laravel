<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use App\Models\Kelas;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Siswa.index", [
            "siswas" => Siswa::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view("Siswa.create", [
                "kelass" => Kelas::get()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
        'nama' => ['required'],
        'alamat' => ['required', 'min:10'],
        'no_tlp' => ['required', 'numeric', 'min:12',],
        'foto' => ['image']
        
        ]);
        $siswa = new Siswa;

        $foto = null;

        if ($request->hasFile('foto')){
            $foto = $request->file('foto')->store('foto');
        }



        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->no_tlp = $request->no_tlp;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->foto = $foto;


        
        $siswa->save();
        // session()->flash("sukses","Berhasil ditambahkan");
        return redirect()->route('siswa.index')->with('sukses', 'Berhasil di tambah');
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
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('Siswa.edit',[
            'siswa' => $siswa,
            'kelass' => Kelas::get()
        ]);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'nama' => ['required'],
            'alamat' => ['required', 'min:10'],
            'no_tlp' => ['required', 'numeric', 'min:12',],
            'foto' => ['image']
            
            ]);

//contoh lain dari validasiiii

    //     $this->validate($request, 
    // [
    //     'nama' => ['required'],
    //     'alamat' => ['required', 'min:10'],
    //     'no_tlp' => ['required', 'numeric', 'min:12'],
    //     'foto' => ['image'],
    // ]);

       

        $siswa = Siswa::find($id);


        $foto = null;
        if($request->hasFile('foto')){
            if(Storage::exists($siswa->foto)){
                Storage::delete($siswa->foto);
            }

            $foto = $request->file('foto')->store('foto');
        }
        // @dd($request);

        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->no_tlp = $request->no_tlp;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->foto = $foto;

        $siswa->save();
        return redirect()->route('siswa.index')->with('sukses', 'Berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        
        if ($siswa->foto){
            Storage::delete($siswa->foto);
        }
        $siswa->delete();
        return redirect()->route('siswa.index')->with('hapus', 'Berhasil menghapus');


    }
}
