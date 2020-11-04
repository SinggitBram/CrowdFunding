<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => "0",
                'role_name' => 'user',
            ],
            [
                'id' => "1",
                'role_name' => 'admin',
            ]
        ]);
    }
}
