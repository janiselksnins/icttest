<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalAccessTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('personal_access_tokens')->delete();

        \DB::table('personal_access_tokens')->insert(array (
            0 =>
            array (
                'id' => 1,
                'tokenable_type' => 'App\\Models\\User',
                'tokenable_id' => 1,
                'name' => 'API TOKEN',
                'token' => '2aa9a399790b145fda390c00691e69aa16dd4778fc0d60053d0e48e638db045c',
                'abilities' => '["*"]',
                'last_used_at' => NULL,
                'created_at' => '2022-08-02 14:45:21',
                'updated_at' => '2022-08-02 14:45:21',
            ),
        ));


    }
}