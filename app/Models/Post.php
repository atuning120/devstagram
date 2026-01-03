<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class)->select(['name','username','id']);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}


