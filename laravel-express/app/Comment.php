<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    'post_id',
    'comment',
    'name',
    'email'
    ];
    public function post(){
    	// retorna o post do comentario
    	return $this->belongsTo('App\Post');
    }


}
