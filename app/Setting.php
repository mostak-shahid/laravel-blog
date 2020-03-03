<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['option_name','option_value']; 
    static function get_setting($option_name = '')
    {
    	return $option_name;
    }
}
