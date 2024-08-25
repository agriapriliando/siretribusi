<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('tenants')->insert([
                [
                    'id' => Str::uuid(),
                    'nik' => '627' . rand(11111111, 99999999),
                    'nama' => fake()->name(),
                    'alamat' => fake()->address(),
                    'nohp' => fake()->phoneNumber(),
                    'file_ktp' => 'no_file.png',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]);
        }
    }
}
