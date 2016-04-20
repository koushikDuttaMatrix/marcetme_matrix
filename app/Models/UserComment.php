<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserComment extends Model {

	protected $table = 'user_comments';
	protected $fillable = ['user_id', 'blog_id', 'comment','article_id'];
	

}