<?php

return [

    'default_form' => 'admin-bsb',

    'forms' => [
        'admin-bsb' => [
            'form' => 'admin::partials.form',
            'inputs' => [
                'text'  => 'admin::partials.fields.text',
                'date' => 'admin::partials.fields.date',
                'textarea' => 'admin::partials.fields.textarea',
                'file' => 'admin::partials.fields.file',
                'image' => 'admin::partials.fields.image',
                'number' => 'admin::partials.fields.number',
                'email' => 'admin::partials.fields.email',
                'radio' => 'admin::partials.fields.radio',
                'map' => 'admin::partials.fields.map',
                'hidden' => 'admin::partials.fields.hidden',
                'checkbox' => 'admin::partials.fields.checkbox',
                'select' => 'admin::partials.fields.select',
                'select-multiple' => 'admin::partials.fields.select-multiple',
            ]
        ]
    ]

];
