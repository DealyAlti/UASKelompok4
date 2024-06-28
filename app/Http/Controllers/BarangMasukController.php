<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $produk = Produk::all()->pluck('nama_produk', 'id_produk');
        $supplier = Supplier::all()->pluck('nama', 'id_supplier');
        
        return view('barangmasuk.index', compact('produk', 'supplier'));

    }

    public function data()
    {

        $barang_masuk = BarangMasuk::leftJoin('produk', 'barang_masuk.id_produk', '=', 'produk.id_produk')
        ->leftJoin('supplier', 'barang_masuk.id_supplier', '=', 'supplier.id_supplier')
        ->select('barang_masuk.*', 'produk.nama_produk', 'supplier.nama')
        ->get();

        return datatables()
        ->of($barang_masuk)
        ->addIndexColumn()
        ->addColumn('tanggal', function ($barang_masuk) {
            return tanggal_indonesia($barang_masuk->tanggal, false);
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
        $jumlahMasuk = $request->jumlahMasuk;

        $produk = Produk::where('id_produk', $productId)->first();

        if ($produk) {
            $produk->stok += $jumlahMasuk;
            $produk->update();

            $barang_masuk = BarangMasuk::create($request->all());
            
            
        } else {
            return response()->json(['error' => 'Product not found'], 400);
        }   

    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang_masuk = BarangMasuk::find($id);
        return response()->json($barang_masuk);
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
