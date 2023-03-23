<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamanDetailModel extends Model
{
    use HasFactory;
    public $table = "dhh_laman";
    protected $primarykey = "id_laman";
    protected $fillable = ['nm_laman', 'isi_laman', 'no_urut', 'slug_laman'];
}
