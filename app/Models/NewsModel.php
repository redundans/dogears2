<?php

namespace App\Models;

use CodeIgniter\Model;
use \Tatter\Relations\Traits\ModelTrait;

class NewsModel extends Model
{
	protected $table = 'news';
	protected $primaryKey = 'id';
	protected $users = [];
	
	protected $allowedFields = ['title','slug','body','users'];
	
	public function getNews($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
		
		return $this->where(['slug' => $slug])->first();
	}
}