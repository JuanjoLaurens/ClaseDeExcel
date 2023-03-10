<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = ['inicio','final', 'reserva','mascota_id',];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
