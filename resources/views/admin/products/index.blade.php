@extends('admin.layouts.app')

@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">محصولات</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام </th>
                            <th>تصویر </th>
                            <th>قیمت </th>
                            <th>دسته بندی </th>
                            <th>برند </th>
                            <th>تاریخ ایجاد </th>
                            <th>گالری</th>
                            <th>ویژگی(مشخصات)</th>
                            <th>نظرات</th>
                            <th>تخفیف</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr role="row" class="">
                                <td><a href="">{{$product->id}}</a></td>
                                <td><a href="">{{$product->name}}</a></td>
                                <td><img src="{{str_replace('public','/storage',$product->image)}}" width="50" alt="brand"></td>
                                <td><a href="">{{number_format($product->price)}}</a></td>
                                <td><a href="">{{$product->category->title_fa}}</a></td>
                                <td><a href="">{{$product->brand->name}}</a></td>
                                <td><a href="">{{Verta::instance($product->created_at)->format('Y-n-j')}}</a></td>
                                <td><a href="{{route('product.gallery.index',$product)}}" class="text-warning">مشاهده</a></td>
                                <td><a href="{{route('product.properties.index',$product)}}" class="text-success">ویژگی</a></td>
                                <td><a href="{{route('products.comments.index',$product)}}" class="text-warning">نظر</a></td>
                                <td>
                                    @if (!$product->has_discount)
                                        <a href="{{route('product.discount.create',$product)}}" class="text-info">ایجاد تخفیف</a>
                                    @else
                                        {{$product->discount_value}}%
                                        <form action="{{route('product.discount.destroy',['product'=>$product,'discount'=>$product->discount])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="item-delete" style="color: red">حذف</button>
                                        </form>
                                        <a href="{{route('product.discount.edit',['product'=>$product,'discount'=>$product->discount])}}" class="item-edit text-info">ویرایش</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.edit',$product)}}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('product.destroy',$product)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="item-delete bg-white" type="submit"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--{{$products->links()}}--}}

            </div>
            @include('admin.products.create')
        </div>
    </div>

@endsection
