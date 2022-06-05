<?php

namespace App\Http\Controllers;

use App\Models\Subbagian;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function home()
    {
        $surat_masuk = SuratMasuk::all()->count();
        $surat_keluar = SuratKeluar::all()->count();

        // count surat masuk per bulan dan bulan menggunakan nama bulan
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $count_surat_masuk = [];
        $count_surat_keluar = [];

        for ($i = 0; $i < 12; $i++) {
            $count_surat_masuk[$i]["bulan"] = $bulan[$i];
            $count_surat_masuk[$i]["jumlah"] = SuratMasuk::whereMonth('tgl_diterima', '=', $i + 1)->count();
            $count_surat_keluar[$i]["bulan"] = $bulan[$i];
            $count_surat_keluar[$i]["jumlah"] = SuratKeluar::whereMonth('tgl_dikirim', '=', $i + 1)->count();
        }

        // return $count_surat_masuk;

        $surat_masuk_per_bulan = SuratMasuk::select(DB::raw('count(*) as jumlah, MONTH(tgl_diterima) as bulan'))
            ->where('tgl_diterima', '>=', date('Y-m-d'))
            ->groupBy('bulan')
            ->get();

        // return $surat_masuk_per_bulan;

        $surat_masuk_harian = SuratMasuk::where('tgl_diterima', date('Y-m-d'))->get()->count();
        $surat_keluar_harian = SuratKeluar::where('tgl_dikirim', date('Y-m-d'))->get()->count();
        return view('v_home', compact('surat_masuk', 'surat_keluar', 'surat_masuk_harian', 'surat_keluar_harian', 'surat_masuk_per_bulan', 'count_surat_masuk', 'count_surat_keluar'));
    }
    public function profil()
    {
        $subbagian = Subbagian::all();
        return view('v_profil', compact('subbagian'));
    }
    public function editProfil(Request $request, User $user)
    {
        if ($request->gambar) {
            $request["foto"] = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('public/foto', $request["foto"]);
        }
        $user->update($request->all());
        return back()->with('pesan', 'Berhasil mengupdate data profil');
    }
    public function gantiPasswordProfil(Request $request, User $user)
    {
        $request->validate([
            'password_lama' => 'required',
            "username" => "required|unique:users,username," . $user->id,
        ],[
            'password_lama.required' => 'Password tidak boleh kosong',
            "username.unique" => "Username sudah digunakan",
            "username.required" => "Username tidak boleh kosong",
        ]);

        // cek apakah password lama sama dengan password yang ada di database
        if (Auth::attempt(['username' => $user->username, 'password' => $request->password_lama])) {
            $user->update(['password' => bcrypt($request->password_baru), "username" => $request->username]);
        } else {
            return back()->with('error', 'Password lama tidak sama dengan password yang ada di database');
        }
        return back()->with('success', 'Berhasil mengupdate data akun');
    }


    public function dataSistem()
    {
        return view('v_datasistem');
    }
    public function backupDatabase()
    {
        /*
      Needed in SQL File:
    
      SET GLOBAL sql_mode = '';
      SET SESSION sql_mode = '';
      */
        $get_all_table_query = "SHOW TABLES";
        $result = DB::select(DB::raw($get_all_table_query));

        $tables = [
            'arsips',
            'subbagians',
            'surat_keluars',
            'surat_masuks',
            'users',
            'disposisis'
        ];

        $structure = '';
        $data = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";

            $show_table_result = DB::select(DB::raw($show_table_query));

            // foreach ($show_table_result as $show_table_row) {
            //   $show_table_row = (array)$show_table_row;
            //   $structure .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            // }

            // get collumn names from table
            $get_column_names_query = "SHOW COLUMNS FROM " . $table . "";
            $get_column_names_result = DB::select(DB::raw($get_column_names_query));

            $get_column_names = [];
            foreach ($get_column_names_result as $get_column_name) {
                if ($get_column_name->Field == "id") {
                    continue;
                }
                $get_column_names[] = $get_column_name->Field;
            }

            $column = implode(',', $get_column_names);

            $select_query = "SELECT " . $column . " FROM " . $table;
            // $select_query = "SELECT * FROM " . $table;
            $records = DB::select(DB::raw($select_query));

            foreach ($records as $record) {
                $record = (array)$record;
                $table_column_array = array_keys($record);
                foreach ($table_column_array as $key => $name) {
                    $table_column_array[$key] = '`' . $table_column_array[$key] . '`';
                }

                $table_value_array = array_values($record);
                $data .= "\nINSERT INTO $table (";

                $data .= "" . implode(", ", $table_column_array) . ") VALUES \n";

                foreach ($table_value_array as $key => $record_column)
                    $table_value_array[$key] = addslashes($record_column);

                $data .= "('" . wordwrap(implode("','", $table_value_array), 400, "\n", TRUE) . "');\n";
            }
        }

        $file_name = __DIR__ . '/../../../public/storage/backup/database_backup_on_' . date('d_m_Y') . '.sql';
        $file_handle = fopen($file_name, 'w +');


        $output = $structure . $data;
        fwrite($file_handle, $output);
        fclose($file_handle);
        return response()->json(['success' => $output]);
    }
    public function restoreDatabase(Request $request)
    {
        $request->file('file')->storeAs('public/backup', $request->file('file')->getClientOriginalName());
        $file_name = __DIR__ . '/../../../public/storage/backup/' . $request->file('file')->getClientOriginalName();
        $content = File::get($file_name);

        $queries = explode(';', $content);
        foreach ($queries as $query) {
            if (trim($query) != '') {
                try {
                    DB::statement($query);
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        return back()->with('success', $content);
    }


    public function dataUser()
    {
        $user = User::where('id', '!=', Auth::user()->id)->get();
        $subbagian = Subbagian::all();
        return view('v_user', compact('user', 'subbagian'));
    }

    public function tambahUser(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'id_subbagian' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:users',
            'role' => 'required'
        ], [
            "username.unique" => "Username telah digunakan"
        ]);
        // cek apakah password dan konfirmasi password sama
        if ($request->password != $request->kpassword) {
            return back()->with('pass_tambah', 'Password dan Konfirmasi Password tidak sama');
        }
        if ($request->file) {
            $request->file('file')->storeAs('public/foto', $request->file('file')->getClientOriginalName());
            $request["foto"] = $request->file('file')->getClientOriginalName();
        }
        $request["password"] = bcrypt($request->password);
        User::create($request->all());
        return back();
    }
    public function editUser(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'id_subbagian' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'role' => 'required'
        ]);
        // cek apakah password dan konfirmasi password sama
        if ($request->password != $request->kpassword) {
            return back()->with('pass_ubah', 'Password dan Konfirmasi Password tidak sama');
        }
        if ($request->file) {
            $request->file('file')->storeAs('public/foto', $request->file('file')->getClientOriginalName());
            $request["foto"] = $request->file('file')->getClientOriginalName();
        } else {
            $request["foto"] = $user->foto;
        }

        if ($request->password) {
            $request["password"] = bcrypt($request->password);
        } else {
            $request["password"] = $user->password;
        }

        $user->update($request->all());
        return back();
    }
    public function hapusUser(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
