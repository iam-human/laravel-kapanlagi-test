<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('admin');
        DB::table('admins')->insert([
            'id' => rand(1000,9000).rand(10,99).date("y"),
            'nia' => '123',
            'nama' => 'Admin',
            'password' => $password,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
