@extends('admin.layouts.app')

@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">کامنت های مربوط به محصول <b>{{$product->name}}</b></p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>متن نظر</th>
                            <th>تایید کامنت</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product->comments as $comment)
                            <tr role="row" class="">
                                <td><a href="">{{$comment->id}}</a></td>
                                <td><a href="">{{$comment->user->name}}</a></td>
                                <td><a class="text-info" href="{{ route('products.comments.show',$comment) }}">نمایش کامنت</a></td>
                                <td>
                                    @if ($comment->status == 0)
                                        <form action="{{route('products.comments.update',$comment)}}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type="submit" value="تایید" class="btn btn-brand">
                                        </form>
                                    @else
                                        <p class="text-success">تایید شده</p>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('products.comments.destroy',$comment)}}" method="post">
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
                {{--{{$brands->links()}}--}}

            </div>
{{--            @include('admin.brands.create')--}}
        </div>
    </div>

@endsection
