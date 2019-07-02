<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Akun extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $table = 'akun';

    protected $fillable = [
    	'username', 'password', 'email'
    ];

    protected $hidden = [
        'password',
    ];

    public function guru()
    {
    	return $this->belongsTo(Guru::class, 'id_guru');
    }
}
