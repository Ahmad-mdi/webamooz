@extends('admin.layouts.app')

@section('content')

    <div class="col-8">
        <div class="text-info">کامنت مربوط به محصول <b>{{ $comment->product->name }}</b></div>
        <textarea readonly name="comments" id="" cols="30" rows="10">{{$comment->comments}}</textarea>
    </div>
    <a href="{{ route('products.comments.index',$comment->product) }}" class="btn btn-brand">برگشت به صفحه قبل-></a>

@endsection

