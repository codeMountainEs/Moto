<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Moto extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
