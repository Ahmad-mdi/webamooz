@extends('admin.layouts.app')

@section('content')
    <div class="col-12 bg-white">
        <p class="box__title">ویژگی های محصول <b>{{$product->name}}</b></p>
        @include('admin.layouts.errors')
        <form action="{{route('product.properties.store',$product)}}" method="post" class="padding-30">
            @csrf
            @foreach($propertyGroups as $group)
                <h3>{{$group->title}}</h3>
                <div class="row">
                    @foreach($group->properties as $property)
                        <div class="form-group col-sm-6">
                            <div class="col-sm-2">
                                <label for="title">{{$property->title}}:</label>
                            </div>
                            <div class="col-sm-10 padding-0-18">
                                <input type="text" name="properties[{{$property->id}}][value]" value="{{$property->getValueForProduct($product)}}" class="text">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <button class="btn btn-brand">اضافه کردن</button>
        </form>
    </div>

@endsection
