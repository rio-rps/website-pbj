<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriLoginModel extends Model
{
    use HasFactory;
    public $table = "zzz_histori_login";
    protected $primarykey = "id";
    protected $fillable = ['ip_address', 'hostname', 'user_agent', 'referer', 'id_user'];
}
