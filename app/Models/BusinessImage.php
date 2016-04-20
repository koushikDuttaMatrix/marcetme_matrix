<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessImage extends Model {

	protected $table = 'business_images';
	protected $fillable = ['name','business_id'];
	

}