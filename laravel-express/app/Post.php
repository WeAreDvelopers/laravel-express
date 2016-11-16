<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title',
    	'content'
    ];
    public function comments(){
        //traz os comentarios dos posts
    	return $this->hasMany('App\Comment');
    }

    public function tags(){
    	//
    	return $this->belongsToMany('App\Tag','posts_tags');
    }
    public function getTagListAttribute(){ // get e Attribute são obrigatorios
        $tags = $this->tags->lists('name')->all();
        return implode(", ", $tags);
    }
}
