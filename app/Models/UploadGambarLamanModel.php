<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadGambarLamanModel extends Model
{
    use HasFactory;
    public $table = "edd_upload_gambar_laman";
    protected $primarykey = "id_gambar";
    protected $fillable = ['nm_gambar', 'file_gambar', 'id_laman'];
}
