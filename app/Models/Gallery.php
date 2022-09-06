<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'name_ar', 'desc', 'desc_ar'];
    
    



    public function gallery_photos()
    {
        return $this->hasMany(Gallery_photo::class, 'gallery_id', 'id');
    }
}
