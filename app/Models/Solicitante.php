<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'domicilio',
        'monto',
        'curp',
        'rfc',
        'nss',
        'habilitado',
    ];
    public function scopeBuscar($query,$buscar){
        return $query->where('nombres','like','%'.$buscar.'%')
        ->orWhere('curp','like','%'.$buscar.'%')
        ->orWhere('apellidos','like','%'.$buscar.'%')
        ->orWhere('rfc','like','%'.$buscar.'%')
        ->orWhere('domicilio','like','%'.$buscar.'%')
        ->orWhere('nss','like','%'.$buscar.'%')
        ->orWhere('monto','like','%'.$buscar.'%');
    }
}
