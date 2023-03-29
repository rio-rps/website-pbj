<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriCountPostModel extends Model
{
    use HasFactory;
    public $table = "ta_post_histori_view_count";
    protected $primarykey = "id";
    protected $fillable = ['post_kd', 'ip_address', 'hostname', 'user_agent', 'referer'];
}
