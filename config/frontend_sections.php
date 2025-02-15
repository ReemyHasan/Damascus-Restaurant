<?php

return [
    'hero_section' => [
        'content' => [
            'image' =>  ['validation' => ['required']],
            'title' =>  ['validation' => ['required', 'string']],
            'description' => ['validation' => ['nullable']],
        ],
    ],
    'contact' => [
        'address' =>  ['validation' => ['nullable', 'string']],
        'phone' =>  ['validation' => ['nullable', 'string']],
        'email' =>  ['validation' => ['nullable', 'string', 'email']],
        'location' =>  ['validation' => ['nullable', 'string']],
    ],
    'opening_hours' => [

        'elements' => [
            'date' => ['validation' => ['required', 'string', 'max:255']],
            'time' => ['validation' => ['nullable', 'string', 'max:255']],
        ],

    ],

    'footer_link' => [
        'title' => ['validation' => ['required', 'string', 'max:255']],
        'link' => ['validation' => ['nullable', 'string', 'max:255']],
        'link_target' => ['validation' => ['required', 'in:_self,_blank']],
    ],
    'seo_data' => [
        'content' => [
            'image' =>  ['validation' => ['required']],
            'title' =>  ['validation' => ['required', 'string']],
            'description' => ['validation' => ['nullable']],
            'keywords' => ['validation' => ['nullable']],

        ],
    ],
    // 'copyright' =>  ['validation' => ['required', 'string']],

];
