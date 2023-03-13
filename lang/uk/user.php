<?php

return [

    'login' => [
        'title' => 'Вхід для користувача',
        'H1' => 'Вхід для користувача',
        'year' => \date('Y'),
        'fields' => [
            'email' => [
                'label' => 'E-mail адреса',
                'placeholder' => 'email@site.com',
            ],
            'password' => [
                'label' => 'Пароль',
                'placeholder' => 'Пароль',
            ],
            'remember_me' => [
                'label' => 'Запам\'ятай мене',
            ],
        ],
        'buttons' => [
            'submit' => 'Відправити',
        ],
        'error' => 'Надані дані не відповідають нашим записам.',
    ],

];
