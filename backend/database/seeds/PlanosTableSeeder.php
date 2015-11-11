<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;


class PlanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('plans')
            ->insert([
                [
                    'id' => 1,
                    'name' => 'FaleMais30',
                    'description' => 'Plano de dados com 30 min para falar avontade.',
                    'photography' => 'https://placeholdit.imgix.net/~text?txtsize=33&txt=FaleMais30&w=300&h=200',
                    'status' => 1
                ],
                [
                    'id' => 2,
                    'name' => 'FaleMais60',
                    'description' => 'Plano de dados com 60 min para falar avontade.',
                    'photography' => 'https://placeholdit.imgix.net/~text?txtsize=33&txt=FaleMais60&w=300&h=200',
                    'status' => 1
                ],
                [
                    'id' => 3,
                    'name' => 'FaleMais120',
                    'description' => 'Plano de dados com 120 min para falar avontade.',
                    'photography' => 'https://placeholdit.imgix.net/~text?txtsize=33&txt=FaleMais120&w=300&h=200',
                    'status' => 1
                ]
            ]);



        DB::table('areas')
            ->insert([
                [
                    'id' => 1,
                    'code' => '011',
                    'status' => 1
                ],
                [
                    'id' => 2,
                    'code' => '016',
                    'status' => 1
                ],
                [
                    'id' => 3,
                    'code' => '017',
                    'status' => 1
                ],
                [
                    'id' => 4,
                    'code' => '018',
                    'status' => 1
                ]
            ]);


        DB::table('rates')
            ->insert([
                [
                    'id' => 1,
                    'area_origin_id' => 1,
                    'area_destination_id' => 2,
                    'price_normal' => 1.90,
                    'price_reverse' => 2.90,
                    'status' => 1
                ],
                [
                    'id' => 2,
                    'area_origin_id' => 1,
                    'area_destination_id' => 3,
                    'price_normal' => 1.70,
                    'price_reverse' => 2.70,
                    'status' => 1
                ],
                [
                    'id' => 3,
                    'area_origin_id' => 1,
                    'area_destination_id' => 4,
                    'price_normal' => 0.90,
                    'price_reverse' => 1.90,
                    'status' => 1
                ]
            ]);


        DB::table('phone_calls')
            ->insert([
                [
                    'rates_id' => 1,
                    'plans_id' => 1,
                    'time' => 20,
                    'flag_cursor' => 0,
                    'rate_min_with' => 0.00,
                    'rate_min_without' => 38.00,
                    'status' => 1
                ],
                [
                    'rates_id' => 2,
                    'plans_id' => 2,
                    'time' => 80,
                    'flag_cursor' => 0,
                    'rate_min_with' => 37.40,
                    'rate_min_without' => 136.00,
                    'status' => 1
                ],
                [
                    'rates_id' => 3,
                    'plans_id' => 3,
                    'time' => 200,
                    'flag_cursor' => 1,
                    'rate_min_with' => 167.20,
                    'rate_min_without' => 380.00,
                    'status' => 1
                ]
            ]);

    }
}
