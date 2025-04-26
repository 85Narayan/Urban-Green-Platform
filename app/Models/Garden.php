<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Garden extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'state',
        'size',
        'type',
        'status',
        'created_by',
        'image',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function members(): HasMany
    {
        return $this->hasMany(GardenMember::class);
    }

    public function isMember(User $user): bool
    {
        return $this->members()->where('user_id', $user->id)->exists();
    }

    public function addMember(User $user, string $role = 'member'): void
    {
        if (!$this->isMember($user)) {
            $this->members()->create([
                'user_id' => $user->id,
                'role' => $role
            ]);
        }
    }

    public function removeMember(User $user): void
    {
        $this->members()->where('user_id', $user->id)->delete();
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
} 