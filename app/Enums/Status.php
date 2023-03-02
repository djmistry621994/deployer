<?php

namespace App\Enums;

class Status
{
    const ACTIVE   = 1;

    const INACTIVE = 2;

    const STATUSES = [
        '1' => [
            'name'  => 'active',
            'color' => 'info',
        ],
        '2' => [
            'name'  => 'inactive',
            'color' => 'danger',
        ],
    ];

}
