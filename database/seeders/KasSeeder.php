<?php

namespace Database\Seeders;

use App\Models\Kas;
use Illuminate\Database\Seeder;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            Kas::create([
                "tanggal" => "2022-09-08",
                "uraian" => "tes" . $i,
                "kas" => 200 + $i,
                "type" => "MASUK"

            ]);

            Kas::create([
                "tanggal" => "2022-09-08",
                "uraian" => "tes" . $i,
                "kas" => 200 + $i,
                "type" => "KELUAR"

            ]);
    }
}
}