<?php

return [

    'login' => [
        'title' => 'User Login',
        'H1' => 'User Login',
        'year' => \date('Y'),
        'fields' => [
            'email' => [
                'label' => 'E-mail address',
                'placeholder' => 'email@site.com',
            ],
            'password' => [
                'label' => 'Password',
                'placeholder' => 'Password',
            ],
            'remember_me' => [
                'label' => 'Remember me',
            ],
        ],
        'buttons' => [
            'submit' => 'Submit',
        ],
        'error' => 'The provided credentials do not match our records.',
    ],

];
