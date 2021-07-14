<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(product $product)
    {
        return view('client.products.show',[
            'product' => $product,
            'propertyGroups' => $product->category->propertyGroups,
            /*'categories' => Category::query()->where('parent_id',null)->get(),
            'brands' => Brand::all(),*/
        ]);
    }
}
