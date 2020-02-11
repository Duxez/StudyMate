<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'roleName' => 'admin',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'roleName' => 'deadline manager',
            'created_at' => Carbon::now(),
        ]);
    }
}
