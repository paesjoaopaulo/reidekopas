<?php

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
        \Illuminate\Support\Facades\DB::table('users')
            ->insert([
                'name' => 'João Paulo Paes',
                'email' => 'joaopaulopaez@gmail.com',
                'password' => bcrypt('joaopaulo@'),
                'nickname' => 'joaopaulo'
            ]);
    }
}
