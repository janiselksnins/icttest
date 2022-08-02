<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'uid' => '123',
                'password' => '$2y$10$r5U1r04DDcVewQmUgzAwgOU5y6lacjCWF8HGBSO7I7TG.wsv7ok7C',
                'remember_token' => NULL,
                'created_at' => '2022-08-02 17:45:00',
                'updated_at' => '2022-08-02 17:45:00',
            ),
            1 =>
            array (
                'id' => 2,
                'uid' => '1234',
                'password' => '$2y$10$r5U1r04DDcVewQmUgzAwgOU5y6lacjCWF8HGBSO7I7TG.wsv7ok7C',
                'remember_token' => NULL,
                'created_at' => '2022-08-02 17:45:02',
                'updated_at' => '2022-08-02 17:45:02',
            ),
        ));


    }
}