<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');

        if ($request->has('tanggal_awal') && $request->tanggal_awal != "" && $request->has('tanggal_akhir') && $request->tanggal_akhir) {
            $tanggalAwal = $request->tanggal_awal;
            $tanggalAkhir = $request->tanggal_akhir;
        }

        return view('laporan.index', compact('tanggalAwal', 'tanggalAkhir'));
    }

    public function getData($awal, $akhir)
    {
        $data = BarangMasuk::with(['produk', 'supplier'])
            ->whereBetween('tanggal', [$awal, $akhir])
            ->select('id_produk', 'tanggal', 'jumlahMasuk', 'id_supplier')
            ->get()
            ->map(function ($item) {
                return [
                    'nama_produk' => $item->produk->nama_produk,
                    'tanggal' => $item->tanggal,
                    'jumlahMasuk' => $item->jumlahMasuk,
                    'nama' => $item->supplier->nama,
                ];
            });
        
        return $data;
    }

    public function data($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function exportPdf($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);

        $pdf = PDF::loadView('laporan.pdf', compact('data', 'awal', 'akhir'));

        return $pdf->download('laporan_masuk_' . $awal . '_to_' . $akhir . '.pdf');
    }
}
