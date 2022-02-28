<?php

use App\Models\Hotel;
use App\Models\Office;
use App\Models\Trip;
use App\Models\Vacation;

return [
    'types' => [
        'office' => Office::class,
        'trip' => Trip::class,
        'hotel' => Hotel::class,
        'vacation' => Vacation::class,
    ]
];
