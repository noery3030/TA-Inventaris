<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Barang1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // email -> admininv@admin.com
    // pw-> qwerty123
    public function index()
    {
        $ar_barang = DB::table('barang')
        ->join('kategori', 'kategori.id', '=', 'barang.idkategori')
        ->join('area', 'area.id', '=', 'barang.idarea')
        ->join('lokasi', 'lokasi.id', '=', 'barang.idlokasi') 
        ->join('kondisi', 'kondisi.id', '=', 'barang.idkondisi') 
        ->select(
            'barang.*',
            'area.area AS are',
            'lokasi As lok',
            'kondisi.kondisi AS kon',
            'kategori.nama AS kat')->get();

        $ar_kategori = DB::table('kategori')->get();
        return view('barang.index', compact('ar_barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form input barang
        return view('barang.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // PROSES VALIDASI DATA
         $request->validate(
            [   
                'no_inv' => 'required',
                'nama' => 'required',
                'idarea'=> 'required',
                'idkategori'=> 'required',
                'idlokasi'=> 'required',
                'kondisi' => 'required',
            ],
            [   
                'no_inv.required' => 'Kolom No Inventaris diisi',
                'nama.required' => 'Kolom Nama Barang harus diisi',
                'idarea.required' => 'Kolom Area harus diisi',
                'idlokasi.required' => 'Kolom Lokasi harus diisi',
                'idkategori.required' => 'Kolom Kategori Barang harus diisi',
                'kondisi.required' => 'Kolom Kondisi Barang harus diisi',
            ]
        );

        if(!empty($request->foto)){
            $request->validate([
                'foto' => 'image|mimes:png,jpg,jpeg,giff|max:2048'
            ]);
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);
        }else{
            $fileName = '';
        }

        // PROSES CREATE DATA

        // 1. Tangkap Request dari Form Create
        DB::table('barang')->insert(
            [
                'no_inv' => $request->no_inv,
                'nama' => $request->nama,
                'foto' => $fileName,
                'idarea' => $request->idarea,
                'idkategori' => $request->idkategori,
                'idlokasi' => $request->idlokasi,
                'jumlah' => $request->jumlah,
                'idkondisi' => $request->kondisi,
                'spesifikasi' => $request->spesifikasi,
                'keterangan' => $request->keterangan,

            ]
        );

        // 2. Landing Page
        return redirect('/barang')->with('success','Data berhasil ditambahkan');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_barang = DB::table('barang')
        ->join('kategori', 'kategori.id', '=', 'barang.idkategori')
        ->join('lokasi', 'lokasi.id', '=', 'barang.idlokasi')
        ->join('area', 'area.id', '=', 'barang.idarea')
        ->join('kondisi', 'kondisi.id', '=', 'barang.idkondisi')  
        ->select(
            'barang.*',
            'area.area AS are',
            'lokasi As lok',
            'kode_lok As kolok',
            'kode_area As kodearea',
            'kondisi.kondisi AS kon',
            'kategori.nama AS kat')->where('barang.id', '=', $id)->get();;

        return view('barang.show', compact('ar_barang'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('barang')
        ->where('id', '=', $id)->get();
        return view('barang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          // PROSES VALIDASI DATA
          $request->validate(
            [
                'no_inv'=>'required',
                'nama' => 'required',
                'idarea'=> 'required',
                'idkategori'=> 'required',
                'kondisi' => 'required',
            ],
            [
                'no_inv'=>'Kolom No Inventaris harus diisi',
                'nama.required' => 'Kolom Nama Barang harus diisi',
                'idarea.required' => 'Kolom Area Barang harus diisi',
                'idkategori.required' => 'Kolom Kategori Barang harus diisi',
                'kondisi.required' => 'Kolom Kondisi Barang harus diisi',
            ]
        );

        if(!empty($request->foto)){
            $request->validate([
                'foto' => 'image|mimes:png,jpg,jpeg,giff|max:2048'
            ]);
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);
        }else{
            $fileName = '';
        }

        // PROSES CREATE DATA

        // 1. Tangkap Request dari Form Create
        DB::table('barang')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
                'no_inv'=> $request->no_inv,
                'foto' => $fileName,
                'idarea' => $request->idarea,
                'idkategori' => $request->idkategori,
                'idlokasi' => $request->idlokasi,
                'spesifikasi' => $request->spesifikasi,
                'jumlah' => $request->jumlah,
                'idkondisi' => $request->kondisi,
                'keterangan' => $request->keterangan,

            ]
        );

        // 2. Landing Page
        return redirect('/barang')->with('success','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus Data
        DB::table('barang')->where('id', $id)->delete();
        return redirect('barang')->with('success','Data berhasil dihapus');
    }


}
