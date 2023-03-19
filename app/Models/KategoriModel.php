<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    public $table = "cpar_kategori";
    protected $primarykey = "id_kategori";
    protected $fillable = ['nm_kategori', 'ket_kategori'];
}
