<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    protected $appends = [
      'price_with_discount',
        'image_path'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
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

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')
            ->withTimestamps();
    }

    //***********************************************************

    public function addGallery(Request $request)
    {
        $path = $request->file('file')->storeAs(
            'public/productGallery', $request->file('file')->getClientOriginalName(),
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
        } else {
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
        if (request()->route()->getPrefix() == '/adminPanel'
            || request()->routeIs(['client.index','client.likes.wishList.index'])) {
            return 'slug';
        } else {
            $identifier = Route::current()->parameters()['product'];
            if (!ctype_digit($identifier)) {
                return 'slug';
            }
            return 'id';
        }
    }

    // for liked products:
    public function getIsLikedAttribute(): bool
    {
        return $this->likes()->where('user_id',auth()->id())->exists(); //return bool
    }

    public function getImagePathAttribute()
    {
        return str_replace('public','/storage',$this->image);
    }
}
