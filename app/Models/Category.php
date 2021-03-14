<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','title_fa','title_en'];

    public function parent()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
