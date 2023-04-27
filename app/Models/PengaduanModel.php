<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanModel extends Model
{
    use HasFactory;
    public $table = "ddh_pengaduan";
    protected $primarykey = "id_pengaduan";
    protected $fillable = [
        'nm_pelapor', 'email', 'no_hp', 'id_kategori_pengaduan', 'tgl_kejadian',
        'lokasi_kejadian', 'oknum_yang_terlibat', 'uraian', 'upload_bukti_dukung', 'tgl_kirim'
    ];

    public function JKategoriPengaduan()
    {
        return $this->belongsTo(KategoriPengaduanModel::class, 'id_kategori_pengaduan', 'id_kategori_pengaduan');
    }
}
