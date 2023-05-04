<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuController extends Model
{
    use HasFactory;
    public $table = "set_menu";
    protected $primarykey = "id_menu";
    protected $fillable = ['kode_menu', 'nm_menu', 'no_urut', 'status_actived', 'icon_menu', 'level_menu', 'id_laman'];

    public function JLaman()
    {
        return $this->belongsTo(LamanModel::class, 'id_laman', 'id_laman');
    }
}
