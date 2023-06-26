<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkHeaderModel extends Model
{
    use HasFactory;
    public $table = "cpar_link_header";
    protected $primaryKey  = "id_link_header";
    protected $fillable = ['link_header', 'gambar_link'];
}
