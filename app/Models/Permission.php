<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as Model;

class Permission extends Model
{
    const TABLE_NAME  = 'permissions';

    const SINGLE_NAME = 'permission';


    const ID   = 'id';

    const NAME = 'name';
}
