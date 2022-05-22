<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function suratKeluar()
    {
        $surat = SuratKeluar::all();
        return view('laporan.v_laporan_surat_keluar', compact('surat'));
    }

    public function suratMasuk()
    {
        $surat = SuratMasuk::all();
        return view('laporan.v_laporan_surat_masuk', compact('surat'));
    }
    public function getLaporanSuratMasuk(Request $request)
    {
        $tgl_dari = $request->tgl_dari;
        $tgl_to = $request->tgl_to;
        $surat = SuratMasuk::whereBetween('tgl_diterima', [$tgl_dari, $tgl_to])->with('disposisi')->get();
        return response()->json($surat);
    }
    public function getLaporanSuratKeluar(Request $request)
    {
        $tgl_dari = $request->tgl_dari;
        $tgl_to = $request->tgl_to;
        $surat = SuratKeluar::whereBetween('tgl_dikirim', [$tgl_dari, $tgl_to])->with('disposisi')->get();
        return response()->json($surat);
    }
}
