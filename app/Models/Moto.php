<?php

namespace App\Models;

use App\Events\MotoCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Moto extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula','user_id','marca_id','modelo_moto_id','año','observaciones','km'
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }
    protected  $dispatchesEvents = [
        'created' => MotoCreated::class,
    ];

}
