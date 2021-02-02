<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchases')->insert(
            [
                [
                    "date_purchase" => "2021-02-02",
                    "game_id" => "1",
                    "user_id" => "1",
                ],
                [
                    "date_purchase" => "2021-02-02",
                    "game_id" => "2",
                    "user_id" => "1",
                ],
                [
                    "date_purchase" => "2021-02-02",
                    "game_id" => "3",
                    "user_id" => "1",
                ],
            ]
        );
    }
}
