<?php namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
	protected $table = 'albums';
	protected $returnType = "App\Entities\Album";
	protected $allowedFields = ['name'];
	protected $allowedFields = ['autor'];
	protected $allowedFields = ['genre_id'];
}