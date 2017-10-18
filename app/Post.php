<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'type', 'title', 'body'
    ];

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    //protected $guard  = []; Utilizar o fillable ou guard para especificar quais capos podem ser alterados

//    protected $table = "models";
//    protected $primaryKey = "model_id";
//    public $timestamps = false;
//    protected $connection = "sqlite";
}
