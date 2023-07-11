<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalBarang = Barang::count();
        $totalBarangPosSecurity = Barang::where('idarea', '1')->count();
        $totalBarangMasjid = Barang::where('idarea', '2')->count();
        $totalBarangGO = Barang::where('idarea', '3')->count();
        $totalBarangGA = Barang::where('idarea', '4')->count();
        $totalBarangFO = Barang::where('idarea', '5')->count();
        $totalBarangTaman = Barang::where('idarea', '6')->count();

        $kondisi1 = Barang::where('idkondisi', '1')->count();
        $kondisi2 = Barang::where('idkondisi', '2')->count();
        $kondisi3 = Barang::where('idkondisi', '3')->count();

        $ar_lokasi = DB::table('lokasi')->get();

        $ar_area = DB::table('area')->get();

        $ar_barang = DB::table('barang')
        ->join('kategori', 'kategori.id', '=', 'barang.idkategori') 
        ->join('kondisi', 'kondisi.id', '=', 'barang.idkondisi')
        ->select(
            'barang.*',
            'kategori.nama AS kat',)->paginate(5);

        $ar_kategori = DB::table('kategori')->get();

            return view('home', compact('totalBarang',
                                        'totalBarangMasjid',
                                        'totalBarangPosSecurity',
                                        'totalBarangGO',
                                        'totalBarangGA',
                                        'totalBarangFO',
                                        'totalBarangTaman',
                                        'kondisi1', 
                                        'kondisi2', 
                                        'kondisi3', 
                                        'ar_barang', 
                                        'ar_kategori',
                                        'ar_lokasi',
                                        'ar_area'));
    }
   
}