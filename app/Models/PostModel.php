<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    public $table = "ta_post";
    protected $primarykey = "post_kd";
    protected $fillable = ['post_title', 'slug_title', 'post_thumbnail', 'tgl_terbit', 'post_content', 'post_status'];

    public function JPostKategoriRelations()
    {
        return $this->hasMany(PostKategoriRelationshipsModel::class, 'post_kd', 'post_kd');
    }

    public function JPostHistoriCount()
    {
        return $this->belongsTo(HistoriCountPostModel::class, 'post_kd', 'post_kd');
    }
}
