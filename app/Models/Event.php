<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'title_ar', 'content', 'content_ar', 'image', 'auther_id', 'category_id', 'place_ar', 'place', 'start_date', 'end_date'];
 

    public function auther()
    {
        return $this->belongsTo(User::class, 'auther_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}


