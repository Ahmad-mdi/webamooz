<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function propertyGroup(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PropertyGroup::class);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(product::class)
            ->withPivot(['value'])
            ->withTimestamps();
    }

    public function getValueForProduct($product)
    {
        $productPropertyQuery = $this->products()->where('product_id',$product->id);
        if (!$productPropertyQuery->exists()) {
            return null;
        }
        return $productPropertyQuery->first()->pivot->value;
    }
}
