<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

	protected $table = 'countries';
	protected $fillable = ['countryID', 'countryName', 'localName','webCode','region','continent','latitude','longitude','surfaceArea','population','order_flag'];
	

}