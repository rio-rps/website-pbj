<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengaduanModel extends Model
{
    use HasFactory;
    public $table = "cpar_kategori_pengaduan";
    protected $primarykey = "id_kategori_pengaduan";
    protected $fillable = ['nm_kategori_pengaduan', 'no_urut'];
}
