<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('products')->delete();

        \DB::table('products')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'pirmais produkts',
                'description' => 'pirmā produkta apraksts',
                'created_at' => '2022-08-02 17:42:58',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'otrais produkts',
                'description' => 'otrā produkta apraksts',
                'created_at' => '2022-08-02 17:43:16',
                'updated_at' => NULL,
            ),
        ));


    }
}