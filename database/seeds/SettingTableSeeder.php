<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new App\Setting;
        $s->nama_toko = "Daeng Web";
        $s->nama_pemilik = "Anugrah Sandi";
        $s->alamat = "Jl. Sultan Hasanuddin";
        $s->provinsi_id = "12";
        $s->kabupaten_id = "1201";
        $s->sms = "085343966997";
        $s->bbm = "5A567B10";
        $s->line = "makassarnetwork";
        $s->instagram = "http://instagram.com/makassarnetwork";
        $s->email = "makassarnetwork06@gmail.com";
        $s->save();
    }
}
