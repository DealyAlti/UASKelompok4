<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Produk;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all()->pluck('nama_produk', 'id_produk');
        
        return view('barangkeluar.index', compact('produk'));

    }

    public function data()
    {

        $barang_keluar = BarangKeluar::leftJoin('produk', 'produk.id_produk', 'barang_keluar.id_produk')
        ->select('barang_keluar.*', 'nama_produk')
        ->get();

        return datatables()
        ->of($barang_keluar)
        ->addIndexColumn()
        ->addColumn('tanggal', function ($barang_keluar) {
            return tanggal_indonesia($barang_keluar->tanggal, false);
        })
    
        ->make(true);
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

        $productId = $request->id_produk;
        $jumlahKeluar = $request->jumlahKeluar;

        $produk = Produk::where('id_produk', $productId)->first();

        if ($produk) {
            if ($produk->stok < $jumlahKeluar) {
                return response()->json(['error' => 'Stok tidak mencukupi'], 400);
            }
            $produk->stok -= $jumlahKeluar;
            $produk->update();

            $barang_keluar = BarangKeluar::create($request->all());
            
            
        } else {
            return response()->json(['error' => 'Produk Tidak Ada'], 400);
        }   

    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang_keluar = BarangKeluar::find($id);
        return response()->json($barang_keluar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        //
    }
}
