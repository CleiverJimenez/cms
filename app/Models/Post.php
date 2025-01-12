<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; // Activar SoftDeletes

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['title', 'content', 'image_path', 'user_id'];

    // Si usas timestamps personalizados (aunque ya los tienes en la tabla) puedes habilitarlos aquí
    public $timestamps = true;
}
