<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'event_date',
        'end_date',
        'garden_id',
    ];

    public function members()
    {
        return $this->hasMany(EventMember::class);
    }
}
