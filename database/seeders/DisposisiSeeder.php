<?php

namespace Database\Seeders;

use App\Models\Disposisi;
use Illuminate\Database\Seeder;

class DisposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["PELAYANAN UMUM", "TATA PEMERINTAHAN", "PEMBERDAYAAN MASYARAKAT", "PEREKANAN DAN KEUANGAN", "PSDA", "TRANTIB", "UMUM", "KEPALA CAMAT", "SEKTRETARIS CAMAT", "SELESAI"];
        foreach ($data as $dt) {
            Disposisi::create([
                'nama' => $dt,
            ]);
        }
    }
}
