@extends('client.layouts.app')

@section('content')

    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="#">حساب کاربری</a></li>
                <li><a href="wishlist.html">لیست علاقه مندی من</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">لیست علاقه مندی ها</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td class="text-center">تصویر</td>
                                <td class="text-left">نام محصول</td>
                                <td class="text-left">دسته بندی</td>
                                <td class="text-left">مدل</td>
{{--                                <td class="text-right">موجودی</td>--}}
                                <td class="text-right">قیمت واحد</td>
                                <td class="text-right">عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $wishList)
                                <tr>
                                    <td class="text-center"><a href="{{route('client.productDetails.show',$wishList)}}"><img width="50" src="{{str_replace('public','/storage',$wishList->image)}}" alt="تبلت ایسر" title="تبلت ایسر"></a></td>
                                    <td class="text-left"><a href="{{route('client.productDetails.show',$wishList)}}">{{$wishList->name}}</a></td>
                                    <td class="text-left">{{$wishList->category->title_fa}}</td>
                                    <td class="text-left">{{$wishList->brand->name}}</td>
{{--                                    <td class="text-right">موجود</td>--}}
                                    <td class="text-right"><div class="price">{{number_format($wishList->price)}}</div></td>
                                    <td class="text-right">
                                        <button class="btn btn-primary" title="" data-toggle="tooltip" onclick="cart.add('48');" type="button" data-original-title="افزودن به سبد">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <form action="{{route('client.likes.destroy',$wishList)}}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                        </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>

@endsection
