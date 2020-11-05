<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
// use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::insert({
        // });
            
        DB::table('roles')->insert([
            [
                'id' => Str::uuid()->toString(),
                'role_name' => 'user',
            ],
            [
                'id' => Str::uuid()->toString(),
                'role_name' => 'admin',
            ]
        ]);
    }
}
