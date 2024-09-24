<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeloMoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre','marca_id'
    ];


    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }
}
