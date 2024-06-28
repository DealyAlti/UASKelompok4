<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use PDF;

class LaporanKeluarController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');

        if ($request->has('tanggal_awal') && $request->tanggal_awal != "" && $request->has('tanggal_akhir') && $request->tanggal_akhir) {
            $tanggalAwal = $request->tanggal_awal;
            $tanggalAkhir = $request->tanggal_akhir;
        }

        return view('laporankeluar.index', compact('tanggalAwal', 'tanggalAkhir'));
    }

    public function getData($awal, $akhir)
    {
        $data = BarangKeluar::with(['produk'])
            ->whereBetween('tanggal', [$awal, $akhir])
            ->select('id_produk', 'tanggal', 'jumlahKeluar','keterangan')
            ->get()
            ->map(function ($item) {
                return [
                    'nama_produk' => $item->produk->nama_produk,
                    'tanggal' => $item->tanggal,
                    'jumlahKeluar' => $item->jumlahKeluar,
                    'keterangan' => $item->keterangan,
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

        $pdf = PDF::loadView('laporankeluar.pdf', compact('data', 'awal', 'akhir'));

        return $pdf->download('laporan_keluar_' . $awal . '_to_' . $akhir . '.pdf');

    }
}
