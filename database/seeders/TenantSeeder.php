<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datatenants = array(
            array("id" => Str::uuid(), "nama" => "PANARONG SITANGGANG", "alamat" => "JL. BERUK ANGIS NO. 12 RT.001 RW.012", "nohp" => "081352822187"),
            array("id" => Str::uuid(), "nama" => "DONI SETIAWAN", "alamat" => "JL. TEMANGGUNG TANDANG NO.21 RT.001 RW.014", "nohp" => "081348883323"),
            array("id" => Str::uuid(), "nama" => "BAMBANG SUGIARTO", "alamat" => "JL.LAWU NO. 49 RT. 003 RW. 012", "nohp" => "085386181316"),
            array("id" => Str::uuid(), "nama" => "SUPRIYANTO", "alamat" => "JL. SANGGA BUANA I NO. 2 RT.004 RW.012", "nohp" => "081352720272"),
            array("id" => Str::uuid(), "nama" => "SUDARMAN | RUSIAN", "alamat" => "JL. ANGGREK II NO. 10 RT.006 RW.005", "nohp" => "085250921131"),
            array("id" => Str::uuid(), "nama" => "ANDIK SISMANTO", "alamat" => "JL. TAMPUNG PENYANG I BLOK E NO.12 RT.003 RW.013", "nohp" => "081349150896"),
            array("id" => Str::uuid(), "nama" => "NUR AININ", "alamat" => "JL. RAJAWALI KM. 4,5", "nohp" => "085654458337"),
            array("id" => Str::uuid(), "nama" => "M. ADAM", "alamat" => "JL. GRIYA SEJAHTERA BLOK 4 NO. 4", "nohp" => "085248572920"),
            array("id" => Str::uuid(), "nama" => "MUSTOFA", "alamat" => "JL. MUTIARA I GG. BULUH MARINDU III RT.004 RW.004", "nohp" => "082151685699"),
            array("id" => Str::uuid(), "nama" => "SARIJO", "alamat" => "JL. YOS SUDARSO XII NO.O9 B", "nohp" => "085705088952"),
            array("id" => Str::uuid(), "nama" => "AGUSTINUS REONG", "alamat" => "JL. RADEN SALEH NO. 007 RT.004 RW. 007", "nohp" => "081349709897"),
            array("id" => Str::uuid(), "nama" => "BENEDIKTUS SIGIT PRATIKNO", "alamat" => "JL. KERINCI NO. 30 RT. 003 RW. 011", "nohp" => "0811529310"),
            array("id" => Str::uuid(), "nama" => "RISKA", "alamat" => "JL. BENGARIS I RT.005 RW.003", "nohp" => "089691844834"),
            array("id" => Str::uuid(), "nama" => "SYAHRONI", "alamat" => "JL. RAJAWALI KM. 4,5 RT.003 RW.006", "nohp" => "081230972427"),
            array("id" => Str::uuid(), "nama" => "M. BURHANUDIN", "alamat" => "JL. KERINCI NO. 31 RT. 004 RW. 01", "nohp" => "081357618796"),
            array("id" => Str::uuid(), "nama" => "M. MUSLIM", "alamat" => "JL. KALINGU V NO. 96", "nohp" => "082250044434"),
            array("id" => Str::uuid(), "nama" => "SUEB", "alamat" => "JL. YOS SUDARSO V", "nohp" => "083830643097"),
            array("id" => Str::uuid(), "nama" => "MIFTAKUL ANWAR", "alamat" => "JL. PANGRANGO NO. 021 RT.004 RW.011", "nohp" => "081314822477"),
            array("id" => Str::uuid(), "nama" => "RUPETI", "alamat" => "JL. YOS SUDARSO KONTAINER 22", "nohp" => "085845864784"),
            array("id" => Str::uuid(), "nama" => "Drs. MENTENG ASMIN", "alamat" => "JL. RAJAWALI III NO. 57 RT.003 RW.003", "nohp" => "081251525368"),
            array("id" => Str::uuid(), "nama" => "NUR RAHMAH", "alamat" => "JL. SANGGA BUANA II SELATAN", "nohp" => "081251764561"),
            array("id" => Str::uuid(), "nama" => "YEHEZKIEL ALDRI PRATAMA", "alamat" => "JL. RAJAWALI III NO. 57 RT.003 RW.003", "nohp" => "085710867118"),
            array("id" => Str::uuid(), "nama" => "RIN NANSI, SPAK", "alamat" => "JL. RAJAWALI III NO. 57 RT.003 RW.004", "nohp" => "081352863200"),
            array("id" => Str::uuid(), "nama" => "SUWARNO", "alamat" => "JL. KAYU MANIS NO. 11 RT. 001 RW. 013", "nohp" => "0811560468"),
            array("id" => Str::uuid(), "nama" => "ALI IMRON", "alamat" => "JL. RAJAWALI", "nohp" => "081351343767"),
            array("id" => Str::uuid(), "nama" => "MUFADILAH", "alamat" => "Belum Diisi", "nohp" => "082156046464"),
            array("id" => Str::uuid(), "nama" => "MUJI", "alamat" => "JL. YOS SUDARSO KONTAINER 031", "nohp" => "082253585145"),
            array("id" => Str::uuid(), "nama" => "MUNDOFAR", "alamat" => "JL. PANGRANGO NO. 21 RT.002 RW.011", "nohp" => "082154993934"),
            array("id" => Str::uuid(), "nama" => "A. ZAKI", "alamat" => "JL. YOS SUDARSO NO. 351 ", "nohp" => "085392332316"),
            array("id" => Str::uuid(), "nama" => "SUPRIYONO", "alamat" => "JL. KRAKATAU NO.044", "nohp" => "081357888043"),
            array("id" => Str::uuid(), "nama" => "SUPRIYANTI", "alamat" => "JL. TINGANG RT.005 RW. 025", "nohp" => "081349290898"),
            array("id" => Str::uuid(), "nama" => "SUWANTI", "alamat" => "JL. TJILIK RIWUT KM. 7,6 NO. 02 RT.002 RW.013 ", "nohp" => "085393433500"),
            array("id" => Str::uuid(), "nama" => "ARI TRI WIBOWO", "alamat" => "JL. MANYAR III NO. 179 RT.005 RW.012", "nohp" => "082158359299"),
            array("id" => Str::uuid(), "nama" => "MASRUL HADI", "alamat" => "JL. C. BANGAS II NO. 04 RT.002 RW.002", "nohp" => "082158490063"),
            array("id" => Str::uuid(), "nama" => "BAYU WIYOKO", "alamat" => "JL. KERINCI NO.. 225 RT. 003 RW.011", "nohp" => "085249357084"),
            array("id" => Str::uuid(), "nama" => "SUWAJI", "alamat" => "JL. KINIBALU GANG DAMAI NO. 56 RT.002 RW. 010", "nohp" => "082148875098"),
            array("id" => Str::uuid(), "nama" => "IHSAN KHOSYI'IN", "alamat" => "JL. PELIKAN NO. 39 RT.003 RW.002", "nohp" => "085393645555"),
            array("id" => Str::uuid(), "nama" => "MEGA KRISTINA", "alamat" => "JL. GARUDA II NO. 10", "nohp" => "085246920359"),
            array("id" => Str::uuid(), "nama" => "MUHAMMAD ARIS", "alamat" => "JL. KECIPIR NO.23", "nohp" => "081251420941"),
            array("id" => Str::uuid(), "nama" => "RICA. S. D. NAINGGOLAN/AKBAR ", "alamat" => "JL. DAHLIA", "nohp" => "082347642159"),
            array("id" => Str::uuid(), "nama" => "IBU LILIE", "alamat" => "JL. KAKATUA NO. 33", "nohp" => "085248620306"),
            array("id" => Str::uuid(), "nama" => "NORHAINI", "alamat" => "Jl. Kerinci No. 42 Palangka Raya", "nohp" => "081250082219"),
            array("id" => Str::uuid(), "nama" => "ROJIKINOR", "alamat" => "Belum Diisi", "nohp" => "Belum Diisi"),
            array("id" => Str::uuid(), "nama" => "AGUNG", "alamat" => "JL. BANGAS PERMAI 6", "nohp" => "08115205858"),
            array("id" => Str::uuid(), "nama" => "D.W. JALADRI", "alamat" => "Belum Diisi", "nohp" => "081225661995"),
            array("id" => Str::uuid(), "nama" => "RUDI", "alamat" => "Belum Diisi", "nohp" => "082251878787"),
            array("id" => Str::uuid(), "nama" => "ELFRIDEWI, SH", "alamat" => "JL. BUKIT RAYA IV B NO.3", "nohp" => "08565162686"),
            array("id" => Str::uuid(), "nama" => "M. SYAHRI BARLIAN", "alamat" => "JL. PINGUIN III NO. 43 RT.001 RW.012", "nohp" => "082255788910"),
            array("id" => Str::uuid(), "nama" => "HERU KISWANTO", "alamat" => "JL. KINIBALU GANG DAMAI NO. 53", "nohp" => "081347311966"),
            array("id" => Str::uuid(), "nama" => "ANI NURYATI", "alamat" => "JL. KINIBALU RT.002 RW. 010", "nohp" => "081254217987"),
            array("id" => Str::uuid(), "nama" => "YESIKA MARTALIA AGRIA WARDANA", "alamat" => "JL. RAJAWALI III NO. 57 RT. 003 RW. 003", "nohp" => "081251525368"),
            array("id" => Str::uuid(), "nama" => "DEDY YUSMAN", "alamat" => "JL. GARUDA VIII NO. 14", "nohp" => "085652393800"),
            array("id" => Str::uuid(), "nama" => "REFALDI SETIAWAN", "alamat" => "JL. JATI RAYA 3 NO. 1", "nohp" => "081248682415"),
            array("id" => Str::uuid(), "nama" => "MURYANA", "alamat" => "JL. KINIBALU GANG DAMAI NO. 064 RT.002 RW.010", "nohp" => "081349179775"),
            array("id" => Str::uuid(), "nama" => "HERMAWATI LAMIN", "alamat" => "JL. PAUS BLOK B/431 RT.007 RW.009", "nohp" => "081349179775"),
            array("id" => Str::uuid(), "nama" => "SUTISNO", "alamat" => "JL. YOS SUDARSO KONTAINER 062", "nohp" => "081276206357"),
            array("id" => Str::uuid(), "nama" => "EDI KRISNA SITUMORANG", "alamat" => "JL. SANKURUN NO. 96 KUALA KURUN", "nohp" => "08235081555"),
            array("id" => Str::uuid(), "nama" => "MUHAMMAD SUHADI", "alamat" => "JL. YOS SUDARSO KONTAINER 064", "nohp" => "081310141314"),
            array("id" => Str::uuid(), "nama" => "MISNAWATI", "alamat" => "JL. GARUDA V", "nohp" => "085348452027"),
            array("id" => Str::uuid(), "nama" => "SUGENG AGUNG NUGROHO", "alamat" => "JL. SINGA RUNJAN KUALA KURUN", "nohp" => "085390390505"),
            array("id" => Str::uuid(), "nama" => "NENG MILAH NURLAELA", "alamat" => "JL. EBONNY", "nohp" => "081250281213"),
            array("id" => Str::uuid(), "nama" => "ENIK SULISTIAWATI", "alamat" => "JL. YOS SUDARSO 7", "nohp" => "085391849567"),
            array("id" => Str::uuid(), "nama" => "HARI SANTOSO", "alamat" => "JL. MADUHARA II", "nohp" => "082228057771"),
            array("id" => Str::uuid(), "nama" => "KUSMINI EDI MIHATI", "alamat" => "JL. TEMANGGUNG TILUNG", "nohp" => "Belum Diisi"),
            array("id" => Str::uuid(), "nama" => "YULIANA SIMANJUNTAK", "alamat" => "Belum Diisi", "nohp" => "082149070101"),
            array("id" => Str::uuid(), "nama" => "TRAMSIH PANGLIPUR NINGTYAS", "alamat" => "JL. BATU SULI VI NO. 01", "nohp" => "085751417204"),
            array("id" => Str::uuid(), "nama" => "TRIAS HORISA DEWI", "alamat" => "JL. ANTANG KALANG NO. 4", "nohp" => "081283381717"),
            array("id" => Str::uuid(), "nama" => "MUJIASIH", "alamat" => "JL. KINIBALU GANG DAMAI NO. 047", "nohp" => "0853466976775"),
            array("id" => Str::uuid(), "nama" => "CHRISTIANA SANTOSO", "alamat" => "JL. SETH ADJI", "nohp" => "08988758500")
        );

        DB::table('tenants')->insert($datatenants);
    }
}
