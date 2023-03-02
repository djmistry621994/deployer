<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    const TABLE_NAME  = 'users';

    const SINGLE_NAME = 'user';


    const ID                = 'id';

    const NAME              = 'name';

    const EMAIL             = 'email';

    const EMAIL_VERIFIED_AT = 'email_verified_at';

    const PASSWORD          = 'password';

    const REMEMBER_TOKEN    = 'remember_token';

    const STATUS            = 'status';

    protected $fillable = [
        'NAME'     => self::NAME,
        'EMAIL'    => self::EMAIL,
        'PASSWORD' => self::PASSWORD,
        'STATUS'   => self::STATUS,
    ];

    protected $hidden = [self::PASSWORD, self::REMEMBER_TOKEN];

    protected $casts = [
        self::EMAIL_VERIFIED_AT => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        if ($password != null) {
            $this->attributes[self::PASSWORD] = bcrypt($password);
        } else {
            $this->attributes[self::PASSWORD] = null;
        }
    }
}
