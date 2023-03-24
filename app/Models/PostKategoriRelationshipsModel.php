<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostKategoriRelationshipsModel extends Model
{
    use HasFactory;
    public $table = "ta_post_categori_relationships";
    protected $primarykey = "relationships_kd";
    protected $fillable = ['id_kategori', 'post_kd'];

    public function JKategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id_kategori');
    }
}
