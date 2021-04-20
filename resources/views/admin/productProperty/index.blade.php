@extends('admin.layouts.app')

@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-6 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">
                    ویژگی محصول <b>{{$product->name}}</b>
                    <a class="btn btn-brand" href="{{route('product.properties.create',$product)}}">افزودن ویژگی جدید</a>
                </p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>گروه مشخصات</th>
                            <th> مشخصات</th>
                            <th>مقدار</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product->properties as $property)
                            <tr role="row" class="">
                                <td><a href="">{{$property->id}}</a></td>
                                <td><a href="">{{$property->propertyGroup->title}}</a></td>
                                <td><a href="">{{$property->title}}</a></td>
                                <td><a href="">{{$property->pivot->value}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--{{$brands->links()}}--}}

            </div>
        </div>
    </div>

@endsection
