<?php
if(!function_exists('get_settings')){
	function get_settings($option_name = ''){
		if ($option_name){
			$output = App\Setting::where("option_name",$option_name)->first()->option_value;
			return $output;
		}
		return '';
	}
}