<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        // Paginator::useBootstrap();
       

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
    public function create()
    {
        //mengarahkan ke hal form input barang
        return view('barang.form');
    }



}
