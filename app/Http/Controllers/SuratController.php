<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function suratKeluar()
    {
        $disposisi = Disposisi::all();
        $surat = SuratKeluar::all();
        return view('surat.v_surat_keluar', compact("disposisi", "surat"));
    }
    public function tambahSuratKeluar(Request $request)
    {
        $request->validate([
            'no_surat' => 'required|unique:surat_keluars,no_surat',
            'tgl_dikirim' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'id_disposisi' => 'required',
        ], [
            'no_surat.required' => 'No Surat tidak boleh kosong',
            'no_surat.unique' => 'No Surat sudah terpakai',
        ]);
        $request["lampiran"] = $request->file("file")->getClientOriginalName();
        $request->file("file")->storeAs("public/surat_keluar", $request["lampiran"]);

        SuratKeluar::create($request->all());
        return back()->with('pesan', 'Data berhasil ditambahkan');
    }
    public function editSuratKeluar(Request $request, SuratKeluar $suratkeluar)
    {
        $request->validate([
            'no_surat' => 'required',
            'tgl_dikirim' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            // 'id_disposisi' => 'required',
        ]);
        if ($request->file) {
            $request["lampiran"] = $request->file("file")->getClientOriginalName();
            $request->file("file")->storeAs("public/surat_keluar", $request["lampiran"]);
        } else {
            $request["lampiran"] = $suratkeluar->lampiran;
        }

        $suratkeluar->update($request->all());
        return back()->with('pesan', 'Data berhasil diubah');
    }
    public function hapusSuratKeluar(SuratKeluar $suratkeluar)
    {
        $suratkeluar->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }

    public function suratMasuk()
    {
        $disposisi = Disposisi::all();
        $surat = SuratMasuk::all();
        return view('surat.v_surat_masuk', compact("disposisi", "surat"));
    }
    public function apiUpdateDisposisi(Request $request, SuratMasuk $suratmasuk)
    {
        $suratmasuk->update($request->all());
        return response()->json(true);
    }
    public function apiUpdateIdArsipMasuk(Request $request, SuratMasuk $suratmasuk)
    {
        $suratmasuk->update($request->all());
        return response()->json(true);
    }
    public function apiUpdateIdArsipKeluar(Request $request, SuratKeluar $suratkeluar)
    {
        $suratkeluar->update($request->all());
        return response()->json(true);
    }
    public function tambahSuratMasuk(Request $request)
    {
        $request->validate([
            'no_surat' => 'required|unique:surat_masuks,no_surat',
            'tgl_diterima' => 'required',
            'asal' => 'required',
            'perihal' => 'required',
            'id_disposisi' => 'required',
        ], [
            'no_surat.unique' => 'No Surat sudah terpakai',
        ]);
        $request["lampiran"] = $request->file("file")->getClientOriginalName();
        $request->file("file")->storeAs("public/surat_masuk", $request["lampiran"]);

        SuratMasuk::create($request->all());
        return back()->with("pesan", "Data surat berhasil ditambahkan");
    }
    public function editSuratMasuk(Request $request, SuratMasuk $suratmasuk)
    {
        $request->validate([
            'no_surat' => 'required',
            'tgl_diterima' => 'required',
            'asal' => 'required',
            'perihal' => 'required',
            'id_disposisi' => 'required',
        ]);
        if ($request->file) {
            $request["lampiran"] = $request->file("file")->getClientOriginalName();
            $request->file("file")->storeAs("public/surat_masuk", $request["lampiran"]);
        } else {
            $request["lampiran"] = $suratmasuk->lampiran;
        }

        $suratmasuk->update($request->all());
        return back()->with("pesan", "Data surat berhasil diubah");
    }
    public function hapusSuratMasuk(SuratMasuk $suratmasuk)
    {
        $suratmasuk->delete();
        return back()->with("pesan", "Data surat berhasil dihapus");
    }
}
