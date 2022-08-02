<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('attributes')->delete();

        \DB::table('attributes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'attribute_name' => 'svars',
                'created_at' => '2022-08-02 17:42:02',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'attribute_name' => 'krāsa',
                'created_at' => '2022-08-02 17:42:09',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'attribute_name' => 'cena',
                'created_at' => '2022-08-02 17:42:13',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'attribute_name' => 'skaits',
                'created_at' => '2022-08-02 17:42:19',
                'updated_at' => NULL,
            ),
        ));


    }
}