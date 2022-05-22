<?php

namespace Database\Seeders;

use App\Models\Subbagian;
use Illuminate\Database\Seeder;

class SubbagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["PELAYANAN UMUM", "TATA PEMERINTAHAN", "PEMBERDAYAAN MASYARAKAT", "UMUM", "PEREKANAN DAN KEUANGAN", "PSDA", "TRANTIB", "UMUM"];
        foreach ($data as $dt) {
            Subbagian::create([
                'nama' => $dt,
            ]);
        }

        // Subbagian::create([
        //     "nama" => "PERENCANAAN"
        // ]);
        // Subbagian::create([
        //     "nama" => "KEUANGAN"
        // ]);
        // Subbagian::create([
        //     "nama" => "KETATA USAHAAN"
        // ]);
        // Subbagian::create([
        //     "nama" => "SARANA DAN PRASARANA"
        // ]);
        // Subbagian::create([
        //     "nama" => "KESENIAN"
        // ]);
        // Subbagian::create([
        //     "nama" => "KEPEGAWAIAN"
        // ]);
        // Subbagian::create([
        //     "nama" => "PERLENGKAPAN"
        // ]);
        // Subbagian::create([
        //     "nama" => "ORGANISASI"
        // ]);
        // Subbagian::create([
        //     "nama" => "PENDIDIKAN"
        // ]);
        // Subbagian::create([
        //     "nama" => "KURIKULUM/PENGAWASAN"
        // ]);
        // Subbagian::create([
        //     "nama" => "OLAHRAGA"
        // ]);
    }
}
