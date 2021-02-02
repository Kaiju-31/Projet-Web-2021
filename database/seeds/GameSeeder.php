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
                    "name" => "Last Of Us Part II",
                    "description" => "Après avoir sauvé Ellie des mains des Lucioles, Joel et sa protégée retournent à Jackson, le camp de son frère Tommy. Plusieurs années s'écoulent, l'adolescente grandit. Mais un évènement malheureux vient à apparaître au sein de la communauté, bouleversant profondément Ellie. Elle se lance dans une quête de vengeance qui la transformera à jamais. ",
                    "quantity" => 32,
                    "price" => 69.99,
                    "plateform" => "Playstation 5",
                    "code"=> "aFERFA28FTG"
                ],
                [
                    "image" => "https://store-images.s-microsoft.com/image/apps.10920.69279545232152045.f1a4a87c-fcc9-4b7c-a620-f6c56eb2d5ad.537d404f-d551-430c-8000-9a4c657bf354",
                    "name" => "Halo 5",
                    "description" => "À la fin des évènements d'Halo 4, Cortana disparait et le Didacte ainsi que ses plans sont réduits à Néant. Les restes d'anciens séparatistes Covenant, une faction appelée Covenant de Jul 'Mdama, nourrissent toujours une envie d'extermination envers l'humanité.",
                    "quantity" => 13,
                    "price" => 69.99,
                    "plateform" => "Xbox One",
                    "code"=> "kiu78hgTYU5YTRffg5"
                ],
                [
                    "image" => "https://www.rdr2.fr/images/artworks-officiels/rdr2-artwork-37-hd.jpg",
                    "name" => "Red Dead Redemption 2",
                    "description" => "En 1899, suite à un braquage qui a mal tourné dans la ville de Blackwater, la bande de Dutch van der Linde est traquée par les agents fédéraux et les chasseurs de primes. Le bras droit de Dutch, Arthur Morgan, est lui aussi tiraillé entre ses propres idéaux et sa loyauté envers la bande qui l'a élevé.",
                    "quantity" => 45,
                    "price" => 59.99,
                    "plateform" => "Steam",
                    "code"=> "aFErg68ghbsdG"
                ],
                [
                    "image" => "https://s2.gaming-cdn.com/images/products/6202/orig/horizon-zero-dawn-complete-edition-cover.jpg",
                    "name" => "Horizon Zero Dawn",
                    "description" => "LA TERRE NE NOUS APPARTIENT PLUS Suivez la quête légendaire d'Aloy et dévoilez les mystères d'un monde dominé par de redoutables machines. Rejetée par sa tribu, elle se bat pour découvrir son passé et son destin, et stopper une catastrophe.",
                    "quantity" => 1,
                    "price" => 49.99,
                    "plateform" => "Steam",
                    "code"=> "azhFG56gfGDR"
                ],
                [
                    "image" => "https://img.redbull.com/images/c_crop,x_1418,y_0,h_3574,w_2859/c_fill,w_860,h_1075/q_auto,f_auto/redbullcom/2017/10/26/c12d0d43-4943-4cd3-ab1b-3cf654452046/jeu-video-super-mario-odyssey-switch",
                    "name" => "Mario Odyssey",
                    "description" => "Embarquez pour une aventure inoubliable avec Mario à bord de son tout nouveau vaisseau, l’Odyssée, et offrez-vous votre plus grand voyage avec Super Mario Odyssey !",
                    "quantity" => 81,
                    "price" => 69.99,
                    "plateform" => "Nintendo Switch",
                    "code"=> "GEe6dlmx5d6"
                ],
                [
                    "image" => "https://s3.gaming-cdn.com/images/products/6842/orig/forza-motorsport-8-pc-xbox-one-cover.jpg",
                    "name" => "Forza Motosport 8",
                    "description" => "Forza Motorsport 8 est un jeu de course automobile développé par Turn 10. Vous pouvez y conduire des véhicules de plus en plus puissants dans le mode carrière qui se divise en six sections.",
                    "quantity" => 52,
                    "price" => 59.99,
                    "plateform" => "Xbox Serie",
                    "code"=> "aFGHJK36e5rtfG"
                ],
                [
                    "image" => "https://s1.gaming-cdn.com/images/products/3765/orig/assassins-creed-origins-deluxe-edition-cover.jpg",
                    "name" => "Assassin's Creed Origins",
                    "description" => "Layla Hassan, une employée d'Abstergo, est envoyée à la recherche d'artefacts en Égypte, aidée à distance par sa collègue et amie Deanna Geary. Elle découvre les momies de deux précurseurs des Assassins et décide, sans en avertir sa hiérarchie, de mettre de côté sa mission pour explorer leurs mémoires génétiques, espérant ainsi évoluer au sein d'Abstergo et rejoindre le programme Animus. ",
                    "quantity" => 93,
                    "price" => 19.99,
                    "plateform" => "Playstation 4",
                    "code"=> "azdvfertrd214gh"
                ],
                [
                    "image" => "https://images-na.ssl-images-amazon.com/images/I/91BXDBdIhXL._AC_SX385_.jpg",
                    "name" => "Far Cry 6",
                    "description" => "[Edition GOLD], Vivez l'expérience réaliste d'une guérilla des temps modernes, et renversez un dictateur et son fils pour libérer Yara.",
                    "quantity" => 65,
                    "price" => 79.99,
                    "plateform" => "Playstation 5",
                    "code"=> "ZRFo5GFK56fghy"
                ],
                [
                    "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.xboxpassion.fr%2Fimages%2Fjaquette%2F3-359-assassins-creed-iii.jpg&f=1&nofb=1",
                    "name" => "Assassin's creed III",
                    "description" => "Desmond Miles, Rebecca et Shaun, trouvent le Temple dans une caverne dans le Nord de l'État de New York. Desmond active une grande partie de l'équipement laissé par la Première Civilisation, ainsi qu'un compte à rebours réglé sur le 21 décembre 2012. Il retourne dans l'Animus et se retrouve à Londres en 1754 dans le souvenir de l'un de ses ancêtres anglais, un gentleman nommé Haytham Kenway. ",
                    "quantity" => 42,
                    "price" => 29.99,
                    "plateform" => "Xbox One",
                    "code"=> "A123RJmsioIG564"
                ],
            ]
        );
    }
}
