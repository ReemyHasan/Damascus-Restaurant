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
                    ['name' => 'Weinblätter', 'price' => '5.00€', 'description' => 'Petersilie, Bulgur, Tomaten, Zwiebeln, Zitronensaft und Olivenöl', 'img_src' => URL::asset('website/img/menu-1.jpg')],
                    ['name' => 'Muhammara', 'price' => '5.00€', 'description' => 'Paprikapuree, mit Bulgur, Walnuss, Sesamsauce und Olivenöl', 'img_src' => URL::asset('website/img/menu-2.jpg')],
                    ['name' => 'Hummus/+ Shawarma +1€', 'price' => '5.00€', 'description' => 'Kichererbsen Püree mit Sesamsauce', 'img_src' => URL::asset('website/img/menu-3.jpg')],
                    ['name' => 'Käse Sambusek', 'price' => '6.00€', 'description' => 'Frittierte Teig gefüllt mit Käse und Petersilie', 'img_src' => URL::asset('website/img/menu-4.png')],
                    ['name' => 'Fleisch Sambusek', 'price' => '6.00€', 'description' => 'Frittierte Teig gefüllt mit Fleisch', 'img_src' => URL::asset('website/img/menu-5.jpg')],
                    ['name' => 'Kebbeh', 'price' => '8.00€', 'description' => 'Gefüllte Weizenschrot Bällchen, Hackfleisch, Mandeln und Zwiebeln', 'img_src' => URL::asset('website/img/menu-6.jpg')],
                    ['name' => 'Pommes', 'price' => '4.00€', 'description' => '', 'img_src' => URL::asset('website/img/menu-7.jpg')],
                    ['name' => 'Mutabbal', 'price' => '5.00€', 'description' => 'Auberginenpüree mit Sesamsauce, Olivenöl und Fleisch', 'img_src' => URL::asset('website/img/menu-8.jpg')],
                ],
            ],
            [
                'category' => 'Arabische Spezialitäten',
                'items' => [
                    ['name' => 'Fatte + Butter/ Fleisch +1€', 'price' => '7.00€', 'description' => 'Gekochte Kichererbsen mit gerösteten Brotstücken, Sesamsauce, Zitronensaft und Mandeln', 'img_src' => URL::asset('website/img/menu-9.jpg')],
                    ['name' => 'Foul mit Sesamsoße', 'price' => '7.00€', 'description' => 'Dicke Bohnen gekocht mit Joghurt-Sesamsoße, Knoblauch dazu Brot', 'img_src' => URL::asset('website/img/menu-10.jpg')],
                    ['name' => 'Foul mit Olivenöl', 'price' => '7.00€', 'description' => 'Dicke Bohnen gekocht mit Olivenöl, Knoblauch dazu Brot', 'img_src' => URL::asset('website/img/menu-11.jpg')],
                ],
            ],

            [
                'category' => 'Falafel',
                'items' => [
                    ['name' => 'Falafel Sandwich', 'price' => '6.00€', 'description' => 'Kichererbsen Buletten in arabisches Fladenbrot mit Rüben, Tomaten, Petersilie und Sesam Sauce', 'img_src' => URL::asset('website/img/menu-12.jpg')],
                    ['name' => '6 Falafel Teller (6 Stück) mit Salat und Sauce', 'price' => '6.00€', 'description' => '', 'img_src' => URL::asset('website/img/menu-13.jpg')],
                ],
            ],

            [
                'category' => 'Gerill',
                'items' => [

                    ["name" => "Kafta Libanesich", "price" => "15.00€ (1KG-50,00€)", "description" => "Hackfleischgrillspieß, Petersilie mit gegrillten Tomaten, Zwiebeln und Brot", "img_src" => URL::asset("website/img/menu-14.jpg")],
                    ["name" => "Kabab Halabi", "price" => "15.00€ (1KG-50,00€)", "description" => "Hackfleischgrillspieß mit gegrillten Tomaten, Zwiebeln und Brot", "img_src" => URL::asset("website/img/menu-15.jpg")],
                    ["name" => "Hänschen Kabab", "price" => "15,00€", "description" => "Hähnchenfleischgrillspieß mit Salat, Knoblauchsoße und Brot", "img_src" => URL::asset("website/img/menu-16.jpg")],
                    ["name" => "Kabab Shikaf", "price" => "18,00€ (1KG-60,00€)", "description" => "Lammspieß mit gegrillten Tomaten, Zwiebeln, Birwas und Brot", "img_src" => URL::asset("website/img/menu-17.jpg")],
                    ["name" => "Mix – Grill", "price" => "18,00€ (1KG-60,00€)", "description" => "Shish-Tawook, 2 Lammspieße mit gegrillten Tomaten, Zwiebeln und Brot", "img_src" => URL::asset("website/img/menu-18.jpg")],
                    ["name" => "Lammleber", "price" => "15,00€", "description" => "Lammleber mit gegrillten Tomaten, Zwiebeln, Birwas und Brot", "img_src" => URL::asset("website/img/menu-18.jpg")],
                    ["name" => "Shish Tawook", "price" => "15,00€", "description" => "Hähnchenbrustspieß mit Knoblauchsoße und Brot", "img_src" => URL::asset("website/img/menu-18.jpg")],
                    ["name" => "Chicken Wings", "price" => "13,00€ (1KG-45,00€)", "description" => "Hähnchenflügel mit Knoblauchsoße und Brotscharf", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Halbe Hähnchen gegrillt/Ganzes Hähnchen gegrillt", "price" => "13,00€/25,00€", "description" => "Mit Knoblauchsoße und Brot", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Arayes-Maria", "price" => "10,00€", "description" => "Hackfleisch im Brot mit Zitrone, Hummus und Birwas", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Dorade Fisch", "price" => "15,00€", "description" => "Gegrillte Dorade Fisch mit eingelegten Gurken, Rüben, Salat, Soße und Brot", "img_src" => URL::asset("website/img/menu-4.png")]
                ],
            ],

            [
                'category' => 'Shawarma',
                'items' => [

                    ["name" => "Shawarma Sandwich/Douple  ", "price" => "6,00€/7,50€", "description" => "Hähnchenspieß mit Beilagen und  Knoblauchsauce", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Shawarma Arabi klein/groß ", "price" => "8,00€/14,00€", "description" => "Hänschenfleisch 1 oder 2 Rollo geschnitten mit Knoblauchsauce, eingelegten Gurken, Pommes und Coleslaw ", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Shawarma Teller", "price" => "10,00€", "description" => "Hühnerfleisch mit Knoblauchsauce, eingelegten Gurken, Pommes und Coleslaw", "img_src" => URL::asset("website/img/menu-4.png")],
                ],

            ],

            [
                'category' => 'Manakish',
                'items' => [

                    ["name" => "Mohamara", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Thymian", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Weißkäse", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Hackfleisch", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Thymian & Käse", "price" => "3,00€", "description" => "", "img_src" => URL::asset("website/img/menu-4.png")],
                ],

            ],


            [
                'category' => 'Menüs',
                'items' => [

                    ["name" => "Broasted Halbes Hähnchen Menü", "price" => "10,00€", "description" => "Frittiertes Hähnchen mit Pommes, eingelegten Gurken & Coleslaw", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Crispy Menü Hähnchen", "price" => "10,00€", "description" => "Knuspriges Hähnchen mit Pommes, eingelegten Gurken und Coleslaw", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Zenger Menü Hähnchen", "price" => "10,00€", "description" => "Scharfes knuspriges Hähnchen mit Pommes, eingelegten Gurken und Coleslaw", "img_src" => URL::asset("website/img/menu-4.png")],
                ],

            ],

            [
                'category' => 'Pizzen Alle Pizzen mit Tomaten, Käse & Oregano ( 29cm )',
                'items' => [

                    ["name" => "Pizzen aller art ", "price" => "7.50€-10€", "img_src" => URL::asset("website/img/menu-4.png")],
                ],

            ],

            [
                'category' => 'Salate',
                'items' => [

                    ["name" => "Tabouleh Salat", "price" => "6,00€", "description" => "Petersilie, Bulgur, Tomaten, Zwiebeln, Zitronensaft und Olivenöl", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Drehspieß Salat", "price" => "8,00€", "description" => "Mit Eisbergsalat, Drehspieß und Soße", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Fatoush", "price" => "6,00€", "description" => "Gurken, Tomaten, Minze, geröstetes Brot, Paprika, Radieschen, Zitronensaft und Olivenöl", "img_src" => URL::asset("website/img/menu-4.png")],
                ],

            ],


            [
                'category' => 'Snack Sandwich',
                'items' => [

                    ["name" => "Crispy Sandwich", "price" => "6,00€", "description" => "Hähnchenfilet, Truthahn Stücke, Cheddar Käse, Knoblauch Dip. Pommes, Salat", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Zenger Sandwich", "price" => "6,00€", "description" => "Hähnchenfilet, Truthahn Stücke, scharf, Cheddar Käse, Knoblauch Dip. Pommes, Salat", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Hamburger (Kalb) mit Pommes", "price" => "8,00€", "description" => "", "img_src" => URL::asset("website/img/menu-4.png")],
                    ["name" => "Chicken Burger (Hähnchen) Pommes, Salat & Tomaten", "price" => "8,00€", "description" => "", "img_src" => URL::asset("website/img/menu-4.png")],
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
