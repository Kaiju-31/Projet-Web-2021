<?php

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert(
            [
                [
                    "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Feditioncollector.fr%2Fwp-content%2Fuploads%2F2020%2F07%2FThe-Last-of-Us-Part-II-cd-musiques-bande-originale.jpg&f=1&nofb=1",
                    "name" => "Last Of Us",
                    "description" => "Action, Survie",
                    "quantity" => 13,
                    "price" => 69.99,
                    "plateform" => "PS5",
                    "activation_code" => "zKcxNSRMLGC4LeNuQ3Hm"
                ],
                [
                    "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Feditioncollector.fr%2Fwp-content%2Fuploads%2F2020%2F07%2FThe-Last-of-Us-Part-II-cd-musiques-bande-originale.jpg&f=1&nofb=1",
                    "name" => "Les couilles à tonton jack",
                    "description" => "Action, Survie",
                    "quantity" => 13,
                    "price" => 69.99,
                    "plateform" => "PS5",
                    "activation_code" => "8LAxboszeXq9jHj8yry9"
                ],
                [
                    "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Feditioncollector.fr%2Fwp-content%2Fuploads%2F2020%2F07%2FThe-Last-of-Us-Part-II-cd-musiques-bande-originale.jpg&f=1&nofb=1",
                    "name" => "La prune au cul",
                    "description" => "Action, Survie",
                    "quantity" => 13,
                    "price" => 69.99,
                    "plateform" => "PS5",
                    "activation_code" => "jFnwjz5AsQr2PEowroSB"
                ],
                [
                    "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Feditioncollector.fr%2Fwp-content%2Fuploads%2F2020%2F07%2FThe-Last-of-Us-Part-II-cd-musiques-bande-originale.jpg&f=1&nofb=1",
                    "name" => "Zebi suce mon oeil",
                    "description" => "Action, Survie",
                    "quantity" => 13,
                    "price" => 69.99,
                    "plateform" => "PS5",
                    "activation_code" => "uRy9jXdHQrHgwbBH2Pk5"
                ],
                [
                    "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Feditioncollector.fr%2Fwp-content%2Fuploads%2F2020%2F07%2FThe-Last-of-Us-Part-II-cd-musiques-bande-originale.jpg&f=1&nofb=1",
                    "name" => "Mes morts le cuivrasse",
                    "description" => "Action, Survie",
                    "quantity" => 13,
                    "price" => 69.99,
                    "plateform" => "PS5",
                    "activation_code" => "5tfmEm7h72b9KCY3zQNR"
                ],
                [
                    "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Feditioncollector.fr%2Fwp-content%2Fuploads%2F2020%2F07%2FThe-Last-of-Us-Part-II-cd-musiques-bande-originale.jpg&f=1&nofb=1",
                    "name" => "Ta mère aime toujours la saucisse",
                    "description" => "Action, Survie",
                    "quantity" => 13,
                    "price" => 69.99,
                    "plateform" => "PS5",
                    "activation_code" => "PCnk8rttdmCGgYKbXa8H"
                ],
            ]
        );
    }
}
