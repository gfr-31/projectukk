<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        DB::table('siswaas')->insert([
            'id' => '1',
            'nama' => 'Joko',
            'password' => '1234',
        ]);

        
        DB::table('siswaas')->insert([
            'id' => '2',
            'nama' => 'Saepul',
            'password' => '234',
        ]);
    }
}
