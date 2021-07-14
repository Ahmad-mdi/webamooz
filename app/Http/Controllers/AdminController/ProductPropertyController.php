<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    public function index(product $product)
    {
        return view('admin.productProperty.index',[
           'product' => $product,
        ]);
    }

    public function create(product $product)
    {
        return view('admin.productProperty.create',[
            'product' => $product,
            'propertyGroups' => $product->category->propertyGroups,
        ]);
    }

    public function store(Request $request , product $product)
    {
        $properties = collect($request->get('properties'))->filter(function ($item){
           if (!empty($item['value'])) {
               return $item;
           }
        });
        $product->properties()->sync($properties);
        return back();
    }
}
