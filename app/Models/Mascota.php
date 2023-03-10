<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [ 'nombre', 'tipo', 'cliente_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    const TIPOS = ['Perro', 'Gato', 'Conejo', 'Caballo'];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
