<?php

use App\Models\Hotel;
use App\Models\Office;
use App\Models\Trip;

return [
    'types' => [
        'office' => Office::class,
        'trip' => Trip::class,
        'hotel' => Hotel::class,
    ],
    'route' => 'api/v1/resource/{reviewable_model}/review',
    'route-key' => 'reviewable_model',
    'rules' => [
        'rating' => [
            'min' => 1,
            'max' => 5
        ]
    ]
];
