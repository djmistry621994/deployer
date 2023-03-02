<?php

namespace App\Enums;

class Role
{
    const SUPER_ADMIN = 'super admin';

    const USER        = 'user';

    const ARRAY       = [
        1 => self::SUPER_ADMIN,
        2 => self::USER,
    ];
}
