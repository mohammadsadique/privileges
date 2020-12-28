<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('web_subscribers')->insert([
            'email' => 'newsubs@gmail.com',
            'created_at'=> date('Y-m-d H:i:s'),
        ]);
    }
}
