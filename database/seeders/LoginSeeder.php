<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;


class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logins')->insert([
            'role'  => 'admin',
            'name'  => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
            'mobile' => '999 888 1414',
            'created_at'=> date('Y-m-d H:i:s'),
        ]);
    }
}
