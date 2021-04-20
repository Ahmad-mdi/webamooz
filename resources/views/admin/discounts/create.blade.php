@extends('admin.layouts.app')

@section('content')
    <div class="col-6 bg-white">
        <p class="box__title">ایجاد تخفیف جدید برای <b>{{$product->name}}</b></p>
        @include('admin.layouts.errors')
        <form action="{{route('product.discount.store',$product)}}" method="post" class="padding-30">
            @csrf
            <input value="{{old('name')}}" min="1" max="100"  name="value" type="number" placeholder="مقدار تخفیف" class="text">
            <button class="btn btn-brand">اضافه کردن</button>
        </form>
    </div>
@endsection
