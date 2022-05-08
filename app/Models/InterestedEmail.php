<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class InterestedEmail extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'cake_id'
    ];

    public function cake(): BelongsTo
    {
        return $this->belongsTo(Cake::class, 'cake_id', 'id');
    }
}
