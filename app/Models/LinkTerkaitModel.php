<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkTerkaitModel extends Model
{
    use HasFactory;
    public $table = "cpar_link_terkait";
    protected $primarykey = "id_link";
    protected $fillable = ['nm_situs', 'link_situs'];
}
