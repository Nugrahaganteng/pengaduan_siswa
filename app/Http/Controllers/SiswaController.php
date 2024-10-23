<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all products
        $siswas =Siswa::all();

        //render view with products
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
          $request->validate([
            
            'pelapor'         => 'required|min:1',
            'terlapor'   => 'required|min:1',
            'kelas'   => 'required|min:1',
            'laporan'   => 'required|min:1',
            'bukti'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
                
        ]);

        // $imagePath = $request->file('bukti')->store('bukti', 'public');
        $bukti = $request->file('bukti');
        $bukti->storeAs('bukti', $bukti->hashName(), 'public');
        
    
        //create product
       $validatedData = siswa::create([
            'pelapor'  => $request->pelapor,
            'terlapor'  => $request->terlapor,
            'kelas' => $request->kelas,
            'laporan'   => $request->laporan,
            'bukti'     => $bukti->hashName(),
           'status'  => "menunggu",
        ]);

        // if ($request->hasFile('bukti')) {
        //     $image = $request->file('bukti');
        //     $name = time().'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/images');
        //     $image->move($destinationPath, $name);
        //     $validatedData['bukti'] = '/images/'.$name;
        // }


        Siswa::created($validatedData);

        return redirect('/siswa');
    } 

    /**
     * Display the specified resource.
     */
    public function show( $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $siswa)
    {
        //
    }
    public function selesai($id)
    {
        $pengaduan = Siswa::findOrFail($id);
        $pengaduan->status = 'selesai';
        $pengaduan->save();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Diubah');
    }
}
