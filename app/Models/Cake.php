<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'value',
        'available_quantity',
    ];

    public function interestedEmails(): HasMany
    {
        return $this->hasMany(InterestedEmail::class, 'cake_id', 'id');
    }

    protected function value(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100
        );
    }
}
