<?php

namespace Database\Seeders;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datatenants = [
            array("item_id" => 1, "nama" => "PANARONG SITANGGANG", "merk" => "RM. TRIANAULI"),
            array("item_id" => 2, "nama" => "DONI SETIAWAN", "merk" => "RM. GUANG WEI"),
            array("item_id" => 3, "nama" => "BAMBANG SUGIARTO", "merk" => "WARUNG SATE AYAM MANUNGGAL"),
            array("item_id" => 4, "nama" => "SUPRIYANTO", "merk" => "WARUNG  SATE SUPRI BANYUWANGI"),
            array("item_id" => 5, "nama" => "SUDARMAN | RUSIAN", "merk" => "WARUNG SATE INADA"),
            array("item_id" => 6, "nama" => "SUDARMAN | RUSIAN", "merk" => "WARUNG SATE INADA"),
            array("item_id" => 7, "nama" => "ANDIK SISMANTO", "merk" => "RM. POETRI SURABAYA"),
            array("item_id" => 8, "nama" => "NUR AININ", "merk" => "SEAFOOD MEKAR SARI"),
            array("item_id" => 9, "nama" => "M. ADAM", "merk" => "SEAFOOD 031 SURABAYA"),
            array("item_id" => 10, "nama" => "M. ADAM", "merk" => "SEAFOOD 031 SURABAYA"),
            array("item_id" => 11, "nama" => "M. ADAM", "merk" => "SEAFOOD 031 SURABAYA"),
            array("item_id" => 12, "nama" => "MUSTOFA", "merk" => "SEAFOOD CIPTA RASA"),
            array("item_id" => 13, "nama" => "SARIJO", "merk" => "WARUNG JAWA TENGAH"),
            array("item_id" => 14, "nama" => "AGUSTINUS REONG", "merk" => "RM. COTO MAKASAR PARAIKATE"),
            array("item_id" => 15, "nama" => "BENEDIKTUS SIGIT PRATIKNO", "merk" => "Warung Chinese Food Pontianak"),
            array("item_id" => 16, "nama" => "RISKA", "merk" => "RM. NASI UDUK RIZKI (DONI) CAFÉ DOANG"),
            array("item_id" => 17, "nama" => "SYAHRONI", "merk" => "SEAFOOD 27 SURABAYA"),
            array("item_id" => 18, "nama" => "M. BURHANUDIN", "merk" => "SEAFOOD SEKAR JAYA"),
            array("item_id" => 19, "nama" => "M. MUSLIM", "merk" => "SEAFOOD DAN IKAN BAKAR PESONA RASA"),
            array("item_id" => 20, "nama" => "SUEB", "merk" => "SEAFOOD FAVORITE 55 SURABAYA"),
            array("item_id" => 21, "nama" => "MIFTAKUL ANWAR", "merk" => "SEAFOOD 15 SURABAYA"),
            array("item_id" => 22, "nama" => "RUPETI", "merk" => "WARCEP MEKA MEKA"),
            array("item_id" => 23, "nama" => "Drs. MENTENG ASMIN", "merk" => "ASMIN SEAFOOD & CAFÉ"),
            array("item_id" => 24, "nama" => "Drs. MENTENG ASMIN", "merk" => "ASMIN SEAFOOD & CAFÉ"),
            array("item_id" => 25, "nama" => "NUR RAHMAH", "merk" => "CAFÉ GALLERY"),
            array("item_id" => 26, "nama" => "YEHEZKIEL ALDRI PRATAMA", "merk" => "THE NOSTALGIA CAFÉ & RESTO"),
            array("item_id" => 27, "nama" => "RIN NANSI, SPAK", "merk" => "DAYAK FOOD & Seafood"),
            array("item_id" => 28, "nama" => "SUWARNO", "merk" => "CAFÉ WMN"),
            array("item_id" => 29, "nama" => "ALI IMRON", "merk" => "SEAFOOD SELERA KITA"),
            array("item_id" => 30, "nama" => "MUFADILAH", "merk" => "SEAFOOD JAYA RASA"),
            array("item_id" => 31, "nama" => "MUJI", "merk" => "SEAFOOD RIZKY JAYA SURABAYA"),
            array("item_id" => 32, "nama" => "MUNDOFAR", "merk" => "SEAFOOD VINDI JAYA"),
            array("item_id" => 33, "nama" => "A. ZAKI", "merk" => "SEAFOOD H. SUNARTO SBY"),
            array("item_id" => 34, "nama" => "SUPRIYONO", "merk" => "SEAFOOD MIRA RASA SURABAYA"),
            array("item_id" => 35, "nama" => "SUPRIYANTI", "merk" => "CAFÉ LINTANG"),
            array("item_id" => 36, "nama" => "SUWANTI", "merk" => "TANTIA CAFÉ"),
            array("item_id" => 37, "nama" => "ARI TRI WIBOWO", "merk" => "BOOM BOOM CAFÉ"),
            array("item_id" => 38, "nama" => "MASRUL HADI", "merk" => "MENTARI CAFÉ"),
            array("item_id" => 39, "nama" => "BAYU WIYOKO", "merk" => "BUNDARAN CAFÉ"),
            array("item_id" => 40, "nama" => "SUWAJI", "merk" => "GREEN CAFÉ"),
            array("item_id" => 41, "nama" => "IHSAN KHOSYI'IN", "merk" => "SEAFOOD SADULUR"),
            array("item_id" => 42, "nama" => "MEGA KRISTINA", "merk" => "WARUNG KOPI MANANG"),
            array("item_id" => 43, "nama" => "MUHAMMAD ARIS", "merk" => "STATION 031 COFFEE SEAFOOD"),
            array("item_id" => 44, "nama" => "MUHAMMAD ARIS", "merk" => "STATION 031 COFFEE SEAFOOD"),
            array("item_id" => 45, "nama" => "MUHAMMAD ARIS", "merk" => "STATION 031 COFFEE SEAFOOD"),
            array("item_id" => 46, "nama" => "RICA. S. D. NAINGGOLAN/AKBAR ", "merk" => "DE CHOCO COFFEE"),
            array("item_id" => 47, "nama" => "IBU LILIE", "merk" => "CAFÉ LITERASI GOW SAHABAT BUNDA"),
            array("item_id" => 48, "nama" => "NORHAINI", "merk" => "Nasi Kuning Medina "),
            array("item_id" => 49, "nama" => "ROJIKINOR", "merk" => "LINTANG CAFE"),
            array("item_id" => 50, "nama" => "AGUNG", "merk" => "MEAT YOU"),
            array("item_id" => 51, "nama" => "D.W. JALADRI", "merk" => "-"),
            array("item_id" => 52, "nama" => "RUDI", "merk" => "-"),
            array("item_id" => 53, "nama" => "ELFRIDEWI, SH", "merk" => "WARUNG WF"),
            array("item_id" => 54, "nama" => "M. SYAHRI BARLIAN", "merk" => "WARUNG KOPI PA CHIE MERA"),
            array("item_id" => 55, "nama" => "HERU KISWANTO", "merk" => "ENJOY CAFÉ 1"),
            array("item_id" => 56, "nama" => "ANI NURYATI", "merk" => "ENJOY CAFÉ 2"),
            array("item_id" => 57, "nama" => "YESIKA MARTALIA AGRIA WARDANA", "merk" => "EKSEKUTIF CAFÉ & RESTO"),
            array("item_id" => 58, "nama" => "DEDY YUSMAN", "merk" => "CAFÉ KING"),
            array("item_id" => 59, "nama" => "REFALDI SETIAWAN", "merk" => "KING OF GRILL"),
            array("item_id" => 60, "nama" => "MURYANA", "merk" => "CAFÉ & SEAFOOD IMEL"),
            array("item_id" => 61, "nama" => "HERMAWATI LAMIN", "merk" => "WARUNG SAQEENA COTO MAKASAR"),
            array("item_id" => 62, "nama" => "SUTISNO", "merk" => "WARUNG MAKAN & CAFÉ JAYA"),
            array("item_id" => 63, "nama" => "EDI KRISNA SITUMORANG", "merk" => "-"),
            array("item_id" => 64, "nama" => "MUHAMMAD SUHADI", "merk" => "SEAFOO 046 SURABAYA"),
            array("item_id" => 65, "nama" => "MISNAWATI", "merk" => "ABHISTA CONTAINER COFFEE"),
            array("item_id" => 66, "nama" => "SUGENG AGUNG NUGROHO", "merk" => "DI BAWAH TENDA"),
            array("item_id" => 67, "nama" => "NENG MILAH NURLAELA", "merk" => "CAFÉ ASYIQ"),
            array("item_id" => 68, "nama" => "ENIK SULISTIAWATI", "merk" => "SEAFOOD 49 SURABAYA"),
            array("item_id" => 69, "nama" => "ENIK SULISTIAWATI", "merk" => "SEAFOOD 49 SURABAYA"),
            array("item_id" => 70, "nama" => "ENIK SULISTIAWATI", "merk" => "SEAFOOD 49 SURABAYA"),
            array("item_id" => 71, "nama" => "HARI SANTOSO", "merk" => "CHICKEN ISLAND"),
            array("item_id" => 72, "nama" => "KUSMINI EDI MIHATI", "merk" => "-"),
            array("item_id" => 73, "nama" => "YULIANA SIMANJUNTAK", "merk" => "THE JAWARA BISTRO"),
            array("item_id" => 74, "nama" => "TRAMSIH PANGLIPUR NINGTYAS", "merk" => "KAMPOENG KULINER KHAS MAKASAR"),
            array("item_id" => 75, "nama" => "TRIAS HORISA DEWI", "merk" => "-"),
            array("item_id" => 76, "nama" => "MUJIASIH", "merk" => "WARUNG WIDYA'S CORNER"),
            array("item_id" => 77, "nama" => "CHRISTIANA SANTOSO", "merk" => "WARUNG CHICHIPI")
        ];
        foreach ($datatenants as $item) {
            $tenant = DB::table('tenants')->where('nama', $item['nama'])->first();
            Item::where('id', $item['item_id'])->update([
                'status' => 'Aktif'
            ]);
            $datarental = [
                'user_id' => 1,
                'sector_id' => 1,
                'item_id' => $item['item_id'],
                'tenant_id' => $tenant->id,
                'merk_usaha' => $item['merk'],
                'tgl_mulai' => Carbon::createFromDate(2024, 1, 1),
                'tgl_selesai' => Carbon::createFromDate(2024, 12, 31),
                'nominal' => $item['item_id'] < 51 ? 750000 : 650000,
                'jenis_bayar' => 'Bulanan',
                'status_rental' => 'Aktif',
                'keterangan' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            DB::table('rentals')->insert($datarental);
        }
    }
}
