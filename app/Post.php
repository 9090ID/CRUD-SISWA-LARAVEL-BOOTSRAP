<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
use Sluggable;
protected $fillable = ['title','content','thumbnail','slug','user_id'];
protected $dates = ['created_at'];
   /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }





   public function user()
   {
   	return $this->belongsTo(User::class);
   } 

public function thumbnail()
{
	/*
//cara pertama
	if($this->thumbnail){
		return $this->thumbnail;
	}
	else
	{
		return asset('nothumbnail.jpg');
	}
	//cara kedua
	if(!$this->thumbnail)
	{
		return asset('nothumbnail.jpg');
	}
	return $this->thumbnail;*/
	//cara terakhir
	return !$this->thumbnail ? asset('nothumbnail.jpg') : $this->thumbnail;

}

}
