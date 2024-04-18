<?php

// slovenian translation

return [
    'type' => [
        'INFO' => [
            'name'        => 'Informacije',
            'description' => 'Močno vam priporočamo, da rešite ta problem, vendar zloraba še ni bila zabeležena',
        ],
        'ABUSE' => [
            'name'        => 'Zloraba',
            'description' => 'Zahtevamo, da ta problem rešite hitro, sicer bomo morali posredovati',
        ],
        'ESCALATION' => [
            'name'        => 'Eskalacija',
            'description' => 'Ukrepali smo, da preprečimo nadaljnjo zlorabo. Omejitve bodo odpravljene po rešitvi problema',
        ],
    ],

    'status' => [
        'abusedesk' => [
            'OPEN' => [
                'name'        => 'Odprto',
                'description' => 'Odprte prijave',
            ],
            'CLOSED' => [
                'name'        => 'Zaprto',
                'description' => 'Zaprte prijave',
            ],
            'ESCALATED' => [
                'name'        => 'Eskalirano',
                'description' => 'Eskalirane prijave',
            ],
            'RESOLVED' => [
                'name'        => 'Rešeno',
                'description' => 'Rešene prijave',
            ],
            'IGNORED' => [
                'name'        => 'Ignorirano',
                'description' => 'Ignorirane prijave',
            ],
        ],
        'contact' => [
            'OPEN' => [
                'name'        => 'Odprto',
                'description' => 'Odprte prijave stika',
            ],
            'RESOLVED' => [
                'name'        => 'Rešeno',
                'description' => 'Rešene prijave stika',
            ],
            'IGNORED' => [
                'name'        => 'Ignorirano',
                'description' => 'Ignorirane prijave stika',
            ],
        ],
    ],

    'state' => [
        'NOTIFIED' => [
            'name'        => 'Obveščeno',
            'description' => 'Prijave, kjer je bil stik obveščen.',
        ],
        'NOT_NOTIFIED' => [
            'name'        => 'Neobveščeno',
            'description' => 'Prijave, kjer stik ni bil obveščen.',
        ],
    ],
];
