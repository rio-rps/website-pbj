<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoDetailModel extends Model
{
    use HasFactory;
    public $table = "ddd_galeri_photo_detail";
    protected $primarykey = "id_galeri_photo_detail";
    protected $fillable = ['gambar_galeri_photo', 'id_galeri_photo'];
}
