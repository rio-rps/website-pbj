<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadDokumenLamanModel extends Model
{
    use HasFactory;

    public $table = "edd_upload_dokumen_laman";
    protected $primaryKey  = "id_dokumen";
    protected $fillable = ['nm_dokumen', 'file_dokumen', 'ket_dokumen', 'tahun_dokumen', 'id_laman'];
}
