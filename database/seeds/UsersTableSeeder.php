<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admindemo'),
            'balance' => 10000,
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('admindemo'),
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'reseller',
            'email' => 'reseller@gmail.com',
            'password' => bcrypt('reseller'),
            'role_id' => 3,
        ]);
        DB::table('users')->insert([
            'name' => 'agent',
            'email' => 'agent@gmail.com',
            'password' => bcrypt('agent'),
            'role_id' => 4,
        ]);

    }
}
