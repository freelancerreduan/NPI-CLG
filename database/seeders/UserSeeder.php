<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Reduan',
            'email' => 'reduan@gmail.com',
            'phone' => '01318533187',
            'password' => Hash::make('reduan@gmail.com'),
            'role' => 'admin',
            'created_at' => Carbon::now()
        ]);
    }
}
