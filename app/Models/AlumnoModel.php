<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumnoModel extends Model
{
    protected $table            = 'alumnos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'dni',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'semestre',
    ];
    protected $useTimestamps    = false;
}
