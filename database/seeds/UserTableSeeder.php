<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new App\User;
        $u->name = "Anugrah Sandi";
        $u->email = "makassarnetwork06@gmail.com";
        $u->password = bcrypt('anugrahsandicC1!ytrewq@');
        $u->save();
    }
}
