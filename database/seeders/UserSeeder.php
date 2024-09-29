<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [

                'name' => 'Agri Apriliando',
                'username' => 'agri',
                'email' => 'agri@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123'),
                'nohp' => '6285249441182',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Fajar',
                'username' => 'fajar',
                'email' => 'fajar@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('fajar2024'),
                'nohp' => '6281250071300',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'M. HIDAYAT',
                'username' => 'hidayat',
                'email' => 'm.hidayatstudio9@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('hidayat2024'),
                'nohp' => '6281334805691',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
