<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'type', 'title', 'body'
    ];

    //protected $guard  = []; Utilizar o fillable ou guard para especificar quais capos podem ser alterados
}
