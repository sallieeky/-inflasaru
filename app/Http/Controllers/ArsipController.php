<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function suratKeluar()
    {
        $arsip_keluar = Arsip::where('tipe', 'sk')->get();
        $surat = SuratKeluar::all();
        return view('arsip.v_arsip_surat_keluar', compact('arsip_keluar', 'surat'));
    }

    public function suratMasuk()
    {
        $arsip_masuk = Arsip::where('tipe', 'sm')->get();
        $surat = SuratMasuk::where('id_disposisi', '10')->get();
        return view('arsip.v_arsip_surat_masuk', compact('surat', 'arsip_masuk'));
    }

    public function noArsip()
    {
        $surat_masuk = Arsip::where("tipe", "sm")->get();
        $surat_keluar = Arsip::where("tipe", "sk")->get();
        $arsip = Arsip::all();
        return view('arsip.v_no_arsip', compact("surat_masuk", "surat_keluar", "arsip"));
    }
    public function tambahNoArsip(Request $request)
    {
        Arsip::create($request->all());
        return back();
    }
    public function editNoArsip(Request $request, Arsip $arsip)
    {
        $arsip->update($request->all());
        return back();
    }
    public function hapusNoArsip(Arsip $arsip)
    {
        $arsip->delete();
        SuratMasuk::where("id_arsip", $arsip->id)
            ->update(["id_arsip" => null]);
        SuratKeluar::where("id_arsip", $arsip->id)
            ->update(["id_arsip" => null]);
        return back();
    }
}
