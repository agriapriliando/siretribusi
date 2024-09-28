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
        $datakontainers = array(
            array("nama" => "Kontainer 001", "keterangan" => "Kontainer 001", "status" => "Non Aktif"),
            array("nama" => "Kontainer 002", "keterangan" => "Kontainer 002", "status" => "Non Aktif"),
            array("nama" => "Kontainer 003", "keterangan" => "Kontainer 003", "status" => "Non Aktif"),
            array("nama" => "Kontainer 004", "keterangan" => "Kontainer 004", "status" => "Non Aktif"),
            array("nama" => "Kontainer 005", "keterangan" => "Kontainer 005", "status" => "Non Aktif"),
            array("nama" => "Kontainer 006", "keterangan" => "Kontainer 006", "status" => "Non Aktif"),
            array("nama" => "Kontainer 007", "keterangan" => "Kontainer 007", "status" => "Non Aktif"),
            array("nama" => "Kontainer 008", "keterangan" => "Kontainer 008", "status" => "Non Aktif"),
            array("nama" => "Kontainer 009", "keterangan" => "Kontainer 009", "status" => "Non Aktif"),
            array("nama" => "Kontainer 010", "keterangan" => "Kontainer 010", "status" => "Non Aktif"),
            array("nama" => "Kontainer 011", "keterangan" => "Kontainer 011", "status" => "Non Aktif"),
            array("nama" => "Kontainer 012", "keterangan" => "Kontainer 012", "status" => "Non Aktif"),
            array("nama" => "Kontainer 013", "keterangan" => "Kontainer 013", "status" => "Non Aktif"),
            array("nama" => "Kontainer 014", "keterangan" => "Kontainer 014", "status" => "Non Aktif"),
            array("nama" => "Kontainer 015", "keterangan" => "Kontainer 015", "status" => "Non Aktif"),
            array("nama" => "Kontainer 016", "keterangan" => "Kontainer 016", "status" => "Non Aktif"),
            array("nama" => "Kontainer 017", "keterangan" => "Kontainer 017", "status" => "Non Aktif"),
            array("nama" => "Kontainer 018", "keterangan" => "Kontainer 018", "status" => "Non Aktif"),
            array("nama" => "Kontainer 019", "keterangan" => "Kontainer 019", "status" => "Non Aktif"),
            array("nama" => "Kontainer 020", "keterangan" => "Kontainer 020", "status" => "Non Aktif"),
            array("nama" => "Kontainer 021", "keterangan" => "Kontainer 021", "status" => "Non Aktif"),
            array("nama" => "Kontainer 022", "keterangan" => "Kontainer 022", "status" => "Non Aktif"),
            array("nama" => "Kontainer 023", "keterangan" => "Kontainer 023", "status" => "Non Aktif"),
            array("nama" => "Kontainer 024", "keterangan" => "Kontainer 024", "status" => "Non Aktif"),
            array("nama" => "Kontainer 025", "keterangan" => "Kontainer 025", "status" => "Non Aktif"),
            array("nama" => "Kontainer 026", "keterangan" => "Kontainer 026", "status" => "Non Aktif"),
            array("nama" => "Kontainer 027", "keterangan" => "Kontainer 027", "status" => "Non Aktif"),
            array("nama" => "Kontainer 028", "keterangan" => "Kontainer 028", "status" => "Non Aktif"),
            array("nama" => "Kontainer 029", "keterangan" => "Kontainer 029", "status" => "Non Aktif"),
            array("nama" => "Kontainer 030", "keterangan" => "Kontainer 030", "status" => "Non Aktif"),
            array("nama" => "Kontainer 031", "keterangan" => "Kontainer 031", "status" => "Non Aktif"),
            array("nama" => "Kontainer 032", "keterangan" => "Kontainer 032", "status" => "Non Aktif"),
            array("nama" => "Kontainer 033", "keterangan" => "Kontainer 033", "status" => "Non Aktif"),
            array("nama" => "Kontainer 034", "keterangan" => "Kontainer 034", "status" => "Non Aktif"),
            array("nama" => "Kontainer 035", "keterangan" => "Kontainer 035", "status" => "Non Aktif"),
            array("nama" => "Kontainer 036", "keterangan" => "Kontainer 036", "status" => "Non Aktif"),
            array("nama" => "Kontainer 037", "keterangan" => "Kontainer 037", "status" => "Non Aktif"),
            array("nama" => "Kontainer 038", "keterangan" => "Kontainer 038", "status" => "Non Aktif"),
            array("nama" => "Kontainer 039", "keterangan" => "Kontainer 039", "status" => "Non Aktif"),
            array("nama" => "Kontainer 040", "keterangan" => "Kontainer 040", "status" => "Non Aktif"),
            array("nama" => "Kontainer 041", "keterangan" => "Kontainer 041", "status" => "Non Aktif"),
            array("nama" => "Kontainer 042", "keterangan" => "Kontainer 042", "status" => "Non Aktif"),
            array("nama" => "Kontainer 043", "keterangan" => "Kontainer 043", "status" => "Non Aktif"),
            array("nama" => "Kontainer 044", "keterangan" => "Kontainer 044", "status" => "Non Aktif"),
            array("nama" => "Kontainer 045", "keterangan" => "Kontainer 045", "status" => "Non Aktif"),
            array("nama" => "Kontainer 046", "keterangan" => "Kontainer 046", "status" => "Non Aktif"),
            array("nama" => "Kontainer 047", "keterangan" => "Kontainer 047", "status" => "Non Aktif"),
            array("nama" => "Kontainer 048", "keterangan" => "Kontainer 048", "status" => "Non Aktif"),
            array("nama" => "Kontainer 049", "keterangan" => "Kontainer 049", "status" => "Non Aktif"),
            array("nama" => "Kontainer 050", "keterangan" => "Kontainer 050", "status" => "Non Aktif"),
            array("nama" => "Kontainer 051", "keterangan" => "Kontainer 051", "status" => "Non Aktif"),
            array("nama" => "Kontainer 052", "keterangan" => "Kontainer 052", "status" => "Non Aktif"),
            array("nama" => "Kontainer 053", "keterangan" => "Kontainer 053", "status" => "Non Aktif"),
            array("nama" => "Kontainer 054", "keterangan" => "Kontainer 054", "status" => "Non Aktif"),
            array("nama" => "Kontainer 055", "keterangan" => "Kontainer 055", "status" => "Non Aktif"),
            array("nama" => "Kontainer 056", "keterangan" => "Kontainer 056", "status" => "Non Aktif"),
            array("nama" => "Kontainer 057", "keterangan" => "Kontainer 057", "status" => "Non Aktif"),
            array("nama" => "Kontainer 058", "keterangan" => "Kontainer 058", "status" => "Non Aktif"),
            array("nama" => "Kontainer 059", "keterangan" => "Kontainer 059", "status" => "Non Aktif"),
            array("nama" => "Kontainer 060", "keterangan" => "Kontainer 060", "status" => "Non Aktif"),
            array("nama" => "Kontainer 061", "keterangan" => "Kontainer 061", "status" => "Non Aktif"),
            array("nama" => "Kontainer 062", "keterangan" => "Kontainer 062", "status" => "Non Aktif"),
            array("nama" => "Kontainer 063", "keterangan" => "Kontainer 063", "status" => "Non Aktif"),
            array("nama" => "Kontainer 064", "keterangan" => "Kontainer 064", "status" => "Non Aktif"),
            array("nama" => "Kontainer 065", "keterangan" => "Kontainer 065", "status" => "Non Aktif"),
            array("nama" => "Kontainer 066", "keterangan" => "Kontainer 066", "status" => "Non Aktif"),
            array("nama" => "Kontainer 067", "keterangan" => "Kontainer 067", "status" => "Non Aktif"),
            array("nama" => "Kontainer 068", "keterangan" => "Kontainer 068", "status" => "Non Aktif"),
            array("nama" => "Kontainer 069", "keterangan" => "Kontainer 069", "status" => "Non Aktif"),
            array("nama" => "Kontainer 070", "keterangan" => "Kontainer 070", "status" => "Non Aktif"),
            array("nama" => "Kontainer 071", "keterangan" => "Kontainer 071", "status" => "Non Aktif"),
            array("nama" => "Kontainer 072", "keterangan" => "Kontainer 072", "status" => "Non Aktif"),
            array("nama" => "Kontainer 073", "keterangan" => "Kontainer 073", "status" => "Non Aktif"),
            array("nama" => "Kontainer 074", "keterangan" => "Kontainer 074", "status" => "Non Aktif"),
            array("nama" => "Kontainer 075", "keterangan" => "Kontainer 075", "status" => "Non Aktif"),
            array("nama" => "Kontainer 076", "keterangan" => "Kontainer 076", "status" => "Non Aktif"),
            array("nama" => "Kontainer 077", "keterangan" => "Kontainer 077", "status" => "Non Aktif")
        );
        DB::table('items')->insert($datakontainers);
        // $arr = ['Aktif', 'Non Aktif'];
        // for ($i = 1; $i < 30; $i++) {
        //     DB::table('items')->insert([
        //         [
        //             'nama' => 'Kontainer ' . $i++,
        //             'keterangan' => 'Kontainer Di Jalan Yos Sudarso',
        //             'status' => 'Non Aktif',
        //             'created_at' => Carbon::now(),
        //             'updated_at' => Carbon::now(),
        //         ],
        //     ]);
        // }
    }
}
