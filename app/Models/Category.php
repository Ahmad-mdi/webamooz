<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

//    protected $fillable = ['category_id','title_fa','title_en'];
    protected $guarded = [];

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getAllSubCategoryProducts()
    {
        $childrenIds = $this->children()->pluck('id');
        return product::query()
            ->whereIn('category_id', $childrenIds)
            ->orWhere('category_id', $this->id)
            ->get();
    }

    public function propertyGroups(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(PropertyGroup::class);
    }

    public function hasPropertyGroup($propertyGroup): bool
    {
        return $this->propertyGroups()
            ->where('property_group_id' , $propertyGroup->id)
            ->exists();
    }


}
