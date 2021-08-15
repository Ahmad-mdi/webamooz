<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request,product $product)
    {
        Cart::new($product,$request);
        return response([
            'msg' => 'success',
            'cart' => Cart::getSessionCart(),
        ],200);
    }

    public function destroy(product $product)
    {
        Cart::remove($product);
        return response([
            'msg' => 'removed',
            'cart' => Cart::getSessionCart(),
        ]);
    }

}
