<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_barang = DB::table('barang')
        ->select('barang.*', 'area.area as are', 'kode_area as kodearea', 'kode_lok as lok', 'kondisi.kondisi as kon', 'kategori.nama as kat')
            ->join('kategori', 'kategori.id', '=', 'barang.idkategori')
            ->join('area', 'area.id', '=', 'barang.idarea')
            ->join('lokasi', 'lokasi.id', '=', 'barang.idlokasi')
            ->join('kondisi', 'kondisi.id', '=', 'barang.idkondisi')
            ->where('barang.idarea', 2)
            ->get();

        $ar_kategori = DB::table('kategori')->get();
        return view('masjid.index', compact('ar_barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            'kode_area As kodearea',
            'kode_lok As kolok',
            'kondisi.kondisi AS kon',
            'kategori.nama AS kat')->where('barang.id', '=', $id)->get();;

        return view('masjid.show', compact('ar_barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
