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
                'values' => json_encode([
                    'image' => null,
                    'title' => 'Damaskus Restaurant Ravensburg',
                    'description' => 'Enjoy Our Delicious Meal'
                ])
            ],
            [
                'key' => 'contact',
                'values' => json_encode([
                    'address' => '123 Street, New York, USA',
                    'phone' => '+012 345 67890',
                    'email' => 'info@example.com',
                    'whatsapp' => '+012 345 67890',
                ])
            ],
            [
                'key' => 'opening_hours',
                'values' => json_encode([])
            ],
            [
                'key' => 'opening_hours.element1',
                'values' => json_encode([
                    'date' => 'Monday - Saturday',
                    'time' => '09AM - 09PM',
                ])
            ],
            [
                'key' => 'opening_hours.element2',
                'values' => json_encode([
                    'date' => 'Sunday',
                    'time' => '10AM - 08PM',
                ])
            ],
            [
                'key' => 'footer_link',
                'values' => json_encode([
                    'title' => "Damascus-Restaurant-Ravensburg",
                    'link' => "#",
                    'link_target' => "_self",

                ])
            ]


        ];

        foreach ($frontends as $item) {
            $frontend = Frontend::create($item);


            if ($item['key'] == "hero_section") {
                $frontend->addMediaFromUrl($hero_image)->toMediaCollection('images');
            }
        }
    }
}
