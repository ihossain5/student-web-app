<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'role_id'  => '1',
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'phone'    => '01671165460',
            'password' => bcrypt('admin'),

        ]);
        DB::table('users')->insert([
            'role_id'  => '2',
            'name'     => 'Student',
            'email'    => 'student@gmail.com',
            'phone'    => '01671165460',
            'password' => bcrypt('student'),

        ]);
    }
}
