<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];

    public function ModeloMotos(): HasMany
    {
        return $this->hasMany(ModeloMoto::class);
    }
}
