@extends('admin.layouts.app')

@section('content')

    <div class="col-12 bg-white">
        <p class="box__title">ویرایش محصول {{$product->name}}</p>
        @include('admin.layouts.errors')
        <form action="{{route('product.update',$product)}}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input value="{{$product->name}}"  name="name" type="text" placeholder="نام محصول" class="text">
            <label for="category">ویرایش دسته بندی محصول:</label>
            <select name="category_id" >
                <option value disabled selected>انتخاب کنید:</option>
                @foreach($categories as $category)
                    <option
                        @if($category->id == $product->category_id) selected @endif
                        value="{{$category->id}}">{{$category->title_fa}}</option>
                @endforeach
            </select>
            <label for="category">ویرایش برند محصول:</label>
            <select name="brand_id" >
                <option value disabled selected>انتخاب کنید:</option>
                @foreach($brands as $brand)
                    <option
                        @if($brand->id == $product->brand_id) selected @endif
                        value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            <input value="{{$product->price}}"  name="price" type="text" placeholder="قیمت محصول" class="text">
            <input value="{{$product->slug}}"  name="slug" type="text" placeholder="اسلاگ محصول" class="text">
            <textarea name="description" id="" cols="30" rows="10" placeholder="توضیحات محصول">{{$product->description}}</textarea>
            <label for="images">ویرایش تصویر محصول:</label>
            <input type="file" class="form-control" name="image"> <br>
            <img src="{{str_replace('public','/storage',$product->image)}}" width="200" alt="{{$product->name}}">
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>

@endsection
