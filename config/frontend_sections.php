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
        'address' =>  ['validation' => ['required', 'string']],
        'phone' =>  ['validation' => ['required', 'string']],
        'email' =>  ['validation' => ['required', 'string', 'email']],
        'whatsapp' =>  ['validation' => ['required', 'string']],
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

    // 'copyright' =>  ['validation' => ['required', 'string']],

];
