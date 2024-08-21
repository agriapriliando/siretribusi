<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $arr = ['Aktif', 'Non Aktif'];
        for ($i = 1; $i < 30; $i++) {
            DB::table('items')->insert([
                [
                    'nama' => 'Kontainer ' . $i++,
                    'keterangan' => 'Kontainer Di Jalan Yos Sudarso',
                    'status' => $arr[array_rand($arr)],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
}
