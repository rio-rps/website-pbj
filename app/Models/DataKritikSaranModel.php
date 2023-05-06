<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKritikSaranModel extends Model
{
    use HasFactory;
    public $table = "ddh_kritik_saran";
    protected $primaryKey  = "id_kritik_saran";
    protected $fillable = ['nm_pengirim', 'no_tlp_pengirim', 'email_pengirim', 'alamat_pengirim', 'uraian_kritik_saran', 'nilai_pelayanan', 'tgl_kirim', 'validasi_kritik_saran'];
}
