<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $table = 'articles';
	protected $fillable = ['title', 'description','file_type','video_type','embed_link', 'image','is_active','verify','user_id'];

}
