@extends('admin.layouts.app')

@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
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
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('product.destroy',$product->id)}}" method="post">
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
