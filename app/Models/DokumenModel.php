<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenModel extends Model
{
    use HasFactory;

    public $table = "edd_upload_dokumen";
    protected $primaryKey  = "id_dokumen";
    protected $fillable = ['nm_dokumen', 'file_dokumen'];
}
