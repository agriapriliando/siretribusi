<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'nama' => 'Kontainer 01',
                'keterangan' => 'Kontainer Di Jalan Yos Sudarso',
                'status' => 'Aktif'
            ],
            [
                'nama' => 'Kontainer 02',
                'keterangan' => 'Kontainer Di Jalan Yos Sudarso',
                'status' => 'Aktif'
            ],
            [
                'nama' => 'Kontainer 03',
                'keterangan' => 'Kontainer Di Jalan Yos Sudarso',
                'status' => 'Aktif'
            ],
            [
                'nama' => 'Kontainer 04',
                'keterangan' => 'Kontainer Di Jalan Yos Sudarso',
                'status' => 'Aktif'
            ],
        ]);
    }
}
