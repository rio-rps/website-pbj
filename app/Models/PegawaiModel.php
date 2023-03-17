<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    public $table = "ipegawai_personal";
    protected $primarykey = "id_pegawai";
    protected $fillable = ['nip_pegawai', 'nm_pegawai'];
}
