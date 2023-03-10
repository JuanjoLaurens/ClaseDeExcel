<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['documento_identidad', 'nombres', 'apellidos', 'numero_celular', 'email'];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}
