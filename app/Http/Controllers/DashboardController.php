<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $barang_masuk = BarangMasuk::count();
        $barang_keluar = BarangKeluar::count();
 
        return view('admin.dashboard', compact('kategori', 'produk', 'supplier','barang_masuk','barang_keluar'));
      
    }
}
