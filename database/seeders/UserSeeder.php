<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name'        =>'amin',
            'email'        =>'al@gmail.com',
            'password'     =>Hash::make(12345678),
            'timestamps'   =>now(),
        ]);
    }
}
