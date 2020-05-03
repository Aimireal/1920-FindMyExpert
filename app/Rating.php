<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected$dates = ['deleted_at'];

    protected $fillable = ['userID', 'expertID', 'parentID', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Rating::class, 'parentID');
    }

}
