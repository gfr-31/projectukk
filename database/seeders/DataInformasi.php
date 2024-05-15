<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DataInformasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $gambar = "";
        $status = "Terbit";
        for($i = 0; $i < 10; $i++){
            DB::table('data_informasi')->insert([
                'judul' => $faker->title,
                'deskripsi' => Str::random(10),
                'tanggal' => now(),
                'gambar' => $gambar,
                'status' => $status,
            ]);
        }
    }
}
