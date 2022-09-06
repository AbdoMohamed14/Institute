<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ar', 'desc', 'desc_ar', 'preif', 'preif_ar', 'image', 'position', 'position_ar'];

}


