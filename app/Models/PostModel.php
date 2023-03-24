<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    public $table = "ta_post";
    protected $primarykey = "post_kd";
    protected $fillable = ['post_title', 'slug_title', 'post_thumbnail', 'post_content', 'post_status'];
}
