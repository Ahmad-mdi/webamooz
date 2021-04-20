<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }


    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }


    public function galleries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function properties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Property::class)
            ->withPivot(['value'])
            ->withTimestamps();
    }

    public function addGallery(Request $request)
    {
        $path = $request->file('file')->storeAs(
          'public/productGallery' , $request->file('file')->getClientOriginalName(),
        );

        $this->galleries()->create([
           'product_id' => $this->id,
           'path' => $path,
           'mime' => $request->file('file')->getClientMimeType(),
        ]);
    }


    public function deleteGallery(Gallery $gallery)
    {
        Storage::delete($gallery->path);
        $gallery->delete();
    }

    public function addDiscount(Request $request)
    {
        if (!$this->has_discount) {
            $this->discount()->create([
               'product_id' => $this->id,
               'value' => $request->get('value'),
            ]);
        }else {
            $this->discount->update([
                'product_id' => $this->id,
                'value' => $request->get('value'),
            ]);
        }
    }

    public function deleteDiscount(Discount $discount)
    {
        $discount->delete();
    }

    public function updateDiscount(Request $request)
    {
        $this->discount->update([
            'product_id' => $this->id,
            'value' => $request->get('value'),
        ]);
    }

    public function getPriceWithDiscountAttribute()
    {
        if (!$this->has_discount) {
            return $this->price;
        }

        return $this->price - $this->price * $this->discount_value / 100;
    }

    public function getHasDiscountAttribute(): bool
    {
        return $this->discount()->exists();
    }

    public function getDiscountValueAttribute()
    {
        if ($this->has_discount) {
            return $this->discount->value;
        }
        return null;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
