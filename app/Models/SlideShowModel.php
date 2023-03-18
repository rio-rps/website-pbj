<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideShowModel extends Model
{
    use HasFactory;
    public $table = "cpar_slide_show";
    protected $primarykey = "id_slide";
    protected $fillable = ['gambar_slide', 'status_actived'];
}
