<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'quantity',
        'garden_id',
        'created_by',
    ];

    public function garden()
    {
        return $this->belongsTo(Garden::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
