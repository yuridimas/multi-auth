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
            'name' => 'Dalgona',
            'email' => 'dalgona@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => (new datetime()),
            'is_admin' => 1,
            'created_at' => (new datetime()),
            'updated_at' => (new datetime())
        ]);
    }
}
