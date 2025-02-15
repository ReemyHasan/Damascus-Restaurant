<?php

namespace Database\Seeders;

use App\Models\Frontend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;

class FrontendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $hero_image = URL::asset('website/img/hero-1.webp');
        $frontends = [

            [
                'id' => 1,
                'key' => 'hero_section',
                'values' => [
                    'image' => null,
                    'title' => 'Damaskus Restaurant Ravensburg',
                    'description' => 'Enjoy Our Delicious Meal'
                ]
            ],
            [
                'key' => 'contact',
                'values' => [
                    'address' => '123 Street, New York, USA',
                    'phone' => '+012 345 67890',
                    'email' => 'info@example.com',
                    'location' => 'https://maps.app.goo.gl/pa2rG7jDp1JQfPSP7?g_st=aw',
                ]
            ],
            [
                'key' => 'opening_hours',
                'values' => []
            ],
            [
                'key' => 'opening_hours.element1',
                'values' => [
                    'date' => 'Monday - Saturday',
                    'time' => '09AM - 09PM',
                ]
            ],
            [
                'key' => 'opening_hours.element2',
                'values' => [
                    'date' => 'Sunday',
                    'time' => '10AM - 08PM',
                ]
            ],
            [
                'key' => 'footer_link',
                'values' => [
                    'title' => "Damascus-Restaurant-Ravensburg",
                    'link' => "#",
                    'link_target' => "_self",

                ]
                ],

                [
                    'key' => 'seo_data',
                    'values' => [
                        'image' => null,
                        'title' => 'Damascus Restaurant Ravensburg',
                        'description' => 'Enjoy Our Delicious Meal',
                        'keywords'  => 'restaurant, Damascus, Ravensburg, Meals'
                    ]
                ],


        ];

        foreach ($frontends as $item) {
            $frontend = Frontend::create($item);


            if ($item['key'] == "hero_section" || $item['key'] == "seo_data") {
                $frontend->addMediaFromUrl($hero_image)->toMediaCollection('images');
            }
        }
    }
}
