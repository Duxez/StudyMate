<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => 'marco',
            'email' => 'marco',
            'phone' => 123456,
            'teaches' => 0,
        ]);
    }
}
