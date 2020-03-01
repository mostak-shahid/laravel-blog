<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = ['title','slug','featured','content','category_id'];
	/*public function getFeaturedAttributes($featured){
		return asset($featured);
	}*/
    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
