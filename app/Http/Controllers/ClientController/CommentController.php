<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,product $product)
    {
        $this->validate($request,[
           'comments' => 'required|string|max:500|min:10'
        ]);
        Comment::query()->create([
           'user_id' => auth()->user()->id,
           'product_id' => $product->id,
           'comments' => $request->get('comments'),
           'status' => '0',
        ]);
        return back()->with('success','نظر شما به ثبت رسید و پس از تایید نمایش داده میشود.');
    }
}
