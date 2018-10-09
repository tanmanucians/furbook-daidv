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
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'is_admin' => true
            ],
            [
                'id' => 2,
                'name' => 'DaiDV',
                'email' => 'dangvandai1992@gmail.com',
                'password' => bcrypt('123456'),
                'is_admin' => false
            ]
        ]);
    }
}
