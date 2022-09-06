<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_ar','disc','disc_ar','logo','num','place','place_ar','email','facebook','twitter','youtube', 'home_video'];


}
