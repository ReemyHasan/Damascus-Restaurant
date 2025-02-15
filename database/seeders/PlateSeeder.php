<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Plate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $menus = [
            [
                'category' => 'Vorspeißen',
                'items' => [
                    ['name' => 'Weinblätter', 'price' => '5.00€', 'description' => 'Petersilie, Bulgur, Tomaten, Zwiebeln, Zitronensaft und Olivenöl', 'img_src' => URL::asset('website/img/weinblatter.webp')],
                    ['name' => 'Muhammara', 'price' => '5.00€', 'description' => 'Paprikapuree, mit Bulgur, Walnuss, Sesamsauce und Olivenöl', 'img_src' => URL::asset('website/img/Muhammara-3.jpg')],
                    ['name' => 'Hummus/+ Shawarma +1€', 'price' => '5.00€', 'description' => 'Kichererbsen Püree mit Sesamsauce', 'img_src' => URL::asset('website/img/hummus.webp')],
                    ['name' => 'Käse Sambusek', 'price' => '6.00€', 'description' => 'Frittierte Teig gefüllt mit Käse und Petersilie', 'img_src' => URL::asset('website/img/Kase_sambusak.jpg')],
                    ['name' => 'Fleisch Sambusek', 'price' => '6.00€', 'description' => 'Frittierte Teig gefüllt mit Fleisch', 'img_src' => URL::asset('website/img/Fleisch_sambuak.jpg')],
                    ['name' => 'Kebbeh', 'price' => '8.00€', 'description' => 'Gefüllte Weizenschrot Bällchen, Hackfleisch, Mandeln und Zwiebeln', 'img_src' => URL::asset('website/img/Kebbeh.jpg')],
                    ['name' => 'Pommes', 'price' => '4.00€', 'description' => '', 'img_src' => URL::asset('website/img/pommes.jpeg')],
                    ['name' => 'Mutabbal', 'price' => '5.00€', 'description' => 'Auberginenpüree mit Sesamsauce, Olivenöl und Fleisch', 'img_src' => URL::asset('website/img/mutabel.jpg')],
                ],
            ],
            [
                'category' => 'Arabische Spezialitäten',
                'items' => [
                    ['name' => 'Fatte + Butter/ Fleisch +1€', 'price' => '7.00€', 'description' => 'Gekochte Kichererbsen mit gerösteten Brotstücken, Sesamsauce, Zitronensaft und Mandeln', 'img_src' => URL::asset('website/img/fatte.jpg')],
                    ['name' => 'Foul mit Sesamsoße', 'price' => '7.00€', 'description' => 'Dicke Bohnen gekocht mit Joghurt-Sesamsoße, Knoblauch dazu Brot', 'img_src' => URL::asset('website/img/R.jpeg')],
                    ['name' => 'Foul mit Olivenöl', 'price' => '7.00€', 'description' => 'Dicke Bohnen gekocht mit Olivenöl, Knoblauch dazu Brot', 'img_src' => URL::asset('website/img/Foul_olivenol.jpg')],
                ],
            ],

            [
                'category' => 'Falafel',
                'items' => [
                    ['name' => 'Falafel Sandwich', 'price' => '6.00€', 'description' => 'Kichererbsen Buletten in arabisches Fladenbrot mit Rüben, Tomaten, Petersilie und Sesam Sauce', 'img_src' => URL::asset('website/img/falafel(2).jpg')],
                    ['name' => '6 Falafel Teller (6 Stück) mit Salat und Sauce', 'price' => '6.00€', 'description' => '', 'img_src' => URL::asset('website/img/Falafel.jpg')],
                ],
            ],

            [
                'category' => 'Gerill',
                'items' => [

                    ["name" => "Kafta Libanesich", "price" => "15.00€ (1KG-50,00€)", "description" => "Hackfleischgrillspieß, Petersilie mit gegrillten Tomaten, Zwiebeln und Brot", "img_src" => URL::asset("website/img/Kafta_libanesich.webp")],
                    ["name" => "Kabab Halabi", "price" => "15.00€ (1KG-50,00€)", "description" => "Hackfleischgrillspieß mit gegrillten Tomaten, Zwiebeln und Brot", "img_src" => URL::asset("website/img/kabab_halabi.jpg")],
                    ["name" => "Hänschen Kabab", "price" => "15,00€", "description" => "Hähnchenfleischgrillspieß mit Salat, Knoblauchsoße und Brot", "img_src" => URL::asset("website/img/hahnchen_kabab.jpg")],
                    ["name" => "Kabab Shikaf", "price" => "18,00€ (1KG-60,00€)", "description" => "Lammspieß mit gegrillten Tomaten, Zwiebeln, Birwas und Brot", "img_src" => URL::asset("website/img/kabab_shikef.jpeg")],
                    ["name" => "Mix – Grill", "price" => "18,00€ (1KG-60,00€)", "description" => "Shish-Tawook, 2 Lammspieße mit gegrillten Tomaten, Zwiebeln und Brot", "img_src" => URL::asset("website/img/Grillmix.jpg")],
                    ["name" => "Lammleber", "price" => "15,00€", "description" => "Lammleber mit gegrillten Tomaten, Zwiebeln, Birwas und Brot", "img_src" => URL::asset("website/img/Lammleber.jpg")],
                    ["name" => "Shish Tawook", "price" => "15,00€", "description" => "Hähnchenbrustspieß mit Knoblauchsoße und Brot", "img_src" => URL::asset("website/img/shish_tawook.webp")],
                    ["name" => "Chicken Wings", "price" => "13,00€ (1KG-45,00€)", "description" => "Hähnchenflügel mit Knoblauchsoße und Brotscharf", "img_src" => URL::asset("website/img/chickenwings.jpg")],
                    ["name" => "Halbe Hähnchen gegrillt/Ganzes Hähnchen gegrillt", "price" => "13,00€/25,00€", "description" => "Mit Knoblauchsoße und Brot", "img_src" => URL::asset("website/img/hahnchen_gegrillt.jpg")],
                    ["name" => "Arayes-Maria", "price" => "10,00€", "description" => "Hackfleisch im Brot mit Zitrone, Hummus und Birwas", "img_src" => URL::asset("website/img/ayrayes.jpg")],
                    ["name" => "Dorade Fisch", "price" => "15,00€", "description" => "Gegrillte Dorade Fisch mit eingelegten Gurken, Rüben, Salat, Soße und Brot", "img_src" => URL::asset("website/img/dorade_Fisch.jpeg")]
                ],
            ],

            [
                'category' => 'Shawarma',
                'items' => [

                    ["name" => "Shawarma Sandwich/Douple  ", "price" => "6,00€/7,50€", "description" => "Hähnchenspieß mit Beilagen und  Knoblauchsauce", "img_src" => URL::asset("website/img/Shawarma.jpg")],
                    ["name" => "Shawarma Arabi klein/groß ", "price" => "8,00€/14,00€", "description" => "Hänschenfleisch 1 oder 2 Rollo geschnitten mit Knoblauchsauce, eingelegten Gurken, Pommes und Coleslaw ", "img_src" => URL::asset("website/img/Shawarma_teller.jpg")],
                    ["name" => "Shawarma Teller", "price" => "10,00€", "description" => "Hühnerfleisch mit Knoblauchsauce, eingelegten Gurken, Pommes und Coleslaw", "img_src" => URL::asset("website/img/doner_teller.png")],
                ],

            ],

            [
                'category' => 'Manakish',
                'items' => [

                    ["name" => "Mohamara", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/muhamara_mankish.jpeg")],
                    ["name" => "Thymian", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/satar_manakish.jpg")],
                    ["name" => "Weißkäse", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/manakish_kase.jpg")],
                    ["name" => "Hackfleisch", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/fleisch_manakish.jpg")],
                    ["name" => "Thymian & Käse", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/kase_satar_manakish.jpg")],
                ],

            ],


            [
                'category' => 'Menüs',
                'items' => [

                    ["name" => "Broasted Halbes Hähnchen Menü", "price" => "10,00€", "description" => "Frittiertes Hähnchen mit Pommes, eingelegten Gurken & Coleslaw", "img_src" => URL::asset("website/img/Brosted.jpg")],
                    ["name" => "Crispy Menü Hähnchen", "price" => "10,00€", "description" => "Knuspriges Hähnchen mit Pommes, eingelegten Gurken und Coleslaw", "img_src" => URL::asset("website/img/crispy.jpg")],
                    ["name" => "Zenger Menü Hähnchen", "price" => "10,00€", "description" => "Scharfes knuspriges Hähnchen mit Pommes, eingelegten Gurken und Coleslaw", "img_src" => URL::asset("website/img/Zenger.jpg")],
                ],

            ],

            [
                'category' => 'Pizzen Alle Pizzen mit Tomaten, Käse & Oregano ( 29cm )',
                'items' => [

                    ["name" => "Pizzen aller art ", "price" => "7.50€-10€", "img_src" => URL::asset("website/img/Pizzen.jpeg")],
                ],

            ],

            [
                'category' => 'Salate',
                'items' => [

                    ["name" => "Tabouleh Salat", "price" => "6,00€", "description" => "Petersilie, Bulgur, Tomaten, Zwiebeln, Zitronensaft und Olivenöl", "img_src" => URL::asset("website/img/tabuleh.jpg")],
                    ["name" => "Drehspieß Salat", "price" => "8,00€", "description" => "Mit Eisbergsalat, Drehspieß und Soße", "img_src" => URL::asset("website/img/drehspieBsalat.png")],
                    ["name" => "Fatoush", "price" => "6,00€", "description" => "Gurken, Tomaten, Minze, geröstetes Brot, Paprika, Radieschen, Zitronensaft und Olivenöl", "img_src" => URL::asset("website/img/Fatoush.jpg")],
                ],

            ],


            [
                'category' => 'Snack Sandwich',
                'items' => [

                    ["name" => "Crispy Sandwich", "price" => "6,00€", "description" => "Hähnchenfilet, Truthahn Stücke, Cheddar Käse, Knoblauch Dip. Pommes, Salat", "img_src" => URL::asset("website/img/crispy_sandwich.jpg")],
                    ["name" => "Zenger Sandwich", "price" => "6,00€", "description" => "Hähnchenfilet, Truthahn Stücke, scharf, Cheddar Käse, Knoblauch Dip. Pommes, Salat", "img_src" => URL::asset("website/img/crispy_sandwich.jpg")],
                    ["name" => "Hamburger (Kalb) mit Pommes", "price" => "8,00€", "description" => "", "img_src" => URL::asset("website/img/burger.jpg")],
                    ["name" => "Chicken Burger (Hähnchen) Pommes, Salat & Tomaten", "price" => "8,00€", "description" => "", "img_src" => URL::asset("website/img/chicken_burger.jpeg")],
                ],

            ],
        ];

        foreach ($menus as $menu) {
            $category = Category::firstOrCreate(['title' => $menu['category']]);

            foreach ($menu['items'] as $item) {
                $plate = Plate::create([
                    'title' => $item['name'],
                    'category_id' => $category->id,
                    'description' => isset($item['description']) ? $item['description'] :"",
                    'price' => $item['price'],
                ]);

                $plate->addMediaFromUrl($item['img_src'])->toMediaCollection('images');
            }
        }
    }
}
