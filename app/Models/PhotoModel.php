<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoModel extends Model
{
    use HasFactory;
    public $table = "ddd_galeri_photo";
    protected $primarykey = "id_galeri_photo";
    protected $fillable = ['tgl_galeri_photo', 'nm_galeri_photo', 'slug_galeri_photo'];
}
