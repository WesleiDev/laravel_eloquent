<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $casts = ['notify' => 'boolean'];
    protected $fillable = ['notify', 'theme'];
    protected $primaryKey = 'user_id';
    public $timestamps = false;


    public function user(){
        return $this->belongsTo(User::class);
    }
}
