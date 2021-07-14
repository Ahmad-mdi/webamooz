<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(product $product)
    {
        return view('admin.productComments.index', [
            'product' => $product,
        ]);
    }

    //show comments for action Admin:
    public function show(Comment $comment)
    {
        return view('admin.productComments.show',[
            'comment' => $comment,
        ]);
    }

    public function edit(Comment $comment)
    {
        return view('admin.productComments.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Comment $comment): \Illuminate\Http\RedirectResponse
    {
        $comment->update([
           'status' => '1',
        ]);
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
