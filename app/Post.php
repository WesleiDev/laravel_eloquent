<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'type', 'title', 'body'
    ];

    protected $dates = ['created_at', 'updated_at', 'published_at'];//Especificando estes campos para utilizar o Carbor (Data, pacote de data para trabalhar no PHP)

    //Configuro um evento padr�o onde setamos o atributo para ficar lower case. O nome da fun��o deve seguir este padr�o setNomedaPropriedadeAttribute ou get para retornar na tela para o usu�rio
    public function setTitleAttribute($value){
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value){
        return ucfirst($value);
    }

    //Scopos - o nome da fun��o deve come�ar com scope
    public function scopeOfType($query, $type){
        return $query->where('type', $type);
    }

    public function scopeText(Builder $query){
        return $query->where('type', 'text');
    }

    //M�todo de inicializa��o
    protected static function boot(){
        parent::boot();
        //Adicionando um escopo global
        static::addGlobalScope('published', function(Builder $builder){
            $builder->where('published_at', '<', Carbon::now()->format('y-m-d H:i:s'));
        });
    }

    //Configurando um cast autom�tico diretamente no model
//    protected $casts = [
//        'is_true'=> 'boolean'
//    ];

    //protected $guard  = []; Utilizar o fillable ou guard para especificar quais capos podem ser alterados

//    protected $table = "models";
//    protected $primaryKey = "model_id";
//    public $timestamps = false;
//    protected $connection = "sqlite";
}
