<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

//    protected $fillable = ['category_id','title_fa','title_en'];
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getAllSubCategoryProducts()
    {
        $children = $this->children()->pluck('id');
        return product::query()->whereIn('category_id', $children)->get();
    }


}
