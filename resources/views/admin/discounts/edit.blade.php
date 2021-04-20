@extends('admin.layouts.app')

@section('content')
    <div class="col-6 bg-white">
        <p class="box__title">ویرایش تخفیف برای <b>{{$product->name}}</b></p>
        @include('admin.layouts.errors')
        <form action="{{route('product.discount.update',['product'=>$product,'discount'=>$discount])}}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{$discount->value}}" min="1" max="100"  name="value" type="number" placeholder="مقدار تخفیف" class="text">
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>
@endsection
