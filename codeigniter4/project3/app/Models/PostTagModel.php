<?php

namespace App\Models;

use CodeIgniter\Model;

class PostTagModel extends Model
{
    protected $table            = 'post_tags';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['post_id', 'tag_id'];
    protected $useTimestamps    = false;
}
