<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
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
}
