<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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
}
