<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    const ROLE_STAFF = 'staff';

    protected $appends = [
        'role_name'
    ];


    public static function adminRoles()
    {
        return [
            self::ROLE_STAFF => 'Staff',
        ];
    }

    public function getRoleNameAttribute()
    {
        switch ($this->role){
            case self::ROLE_STAFF:
                return 'Staff';
            case 'superadmin':
                return 'Superadmin';
            default :
                return '???';
        }
    }
}
