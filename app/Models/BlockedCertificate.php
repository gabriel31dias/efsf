<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlockedCertificate extends Model
{
    use HasFactory, SoftDeletes;

    const BOOK_NUMBERS = [1,2,3,7];
    const BOOK_LETTERS = ['A', 'B' , 'B AUX', 'E'];

    protected $guarded = [

    ];

    public function registry()
    {
        return $this->belongsTo(Registry::class);
    }
}
