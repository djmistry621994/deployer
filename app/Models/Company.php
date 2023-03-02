<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Base
{
    use SoftDeletes;

    const TABLE_NAME  = 'companies';

    const SINGLE_NAME = 'company';


    const ID       = 'id';

    const NAME     = 'name';

    const EMAIL    = 'email';

    const WEB      = 'web';

    const STATUS   = 'status';

    const FILLABLE = [
        'NAME'   => self::NAME,
        'EMAIL'  => self::EMAIL,
        'WEB'    => self::WEB,
        'STATUS' => self::STATUS,
    ];

    protected $fillable = self::FILLABLE;
}
