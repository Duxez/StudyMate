<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'name' => 'Thomas',
            'email' => 'Thomas@example.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Job',
            'email' => 'Job@example.com',
            'password' => Hash::make('1234'),
            'created_at' => Carbon::now(),
        ]);
    }
}
