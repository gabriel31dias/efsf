<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements Authenticatable, AuthorizableContract
{
    use AuthenticableTrait;
    use HasFactory;
    use Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
        'name',
        'zip_code',
        'address',
        'type_street',
        'number',
        'complement',
        'district',
        'uf',
        'activate_date_time',
        'status',
        'cell',
        'email',
        'user_name',
        'password',
        'profile_id',
        'city',
        'type_street',
        'blocked',
        'first_acess',
        'unit_id',
        'profession_id'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'activate_date_time' => 'timestamp',
        'status' => 'boolean',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function userStations()
    {
        return $this->hasMany(UserServiceStation::class);
    }

    public function getProfilePermissionAttribute(){ 
        return $this->profile->permissions->pluck('permission')->toArray();
    }
}
