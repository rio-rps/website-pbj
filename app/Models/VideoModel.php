<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    use HasFactory;

    public $table = "ddd_galeri_video";
    protected $primarykey = "id_galeri_video";
    protected $fillable = ['link_video',];
}
