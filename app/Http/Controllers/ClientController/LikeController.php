<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('client.profile.index',[
           'products' => auth()->user()->likes,
        ]);
    }

    public function store(Request $request, product $product)
    {
        if (!auth()->check()) {
            return response(['msg' => 'user is not loggedIn!'],500);
        }
        auth()->user()->likeProduct($product);
        return response(['likes_count' => auth()->user()->likes->count()], 200);
    }

    public function destroy(product $product)
    {
        auth()->user()->likes()->detach($product);
        return back();
    }
}
