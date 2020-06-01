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
            'name' => 'Aldo Ruiz',
            'email' => 'aldo.ruiz@outlook.com',
            'password' => Hash::make('laravel')
        ]);
        factory('App\User', 50)->create();
    }
}
