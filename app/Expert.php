<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $fillable = [
        'business_name',
        'business_type',
        'first_name',
        'last_name',
        'email',
        'phone'
    ];
}
