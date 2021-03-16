@extends('admin.layouts.app')


@section('content')

    <div class="col-12 bg-white">
        <p class="box__title">ویرایش دسته  <b>{{$category->title_fa}}</b></p>
        @include('admin.layouts.errors')
        <form action="{{route('category.update',$category->id)}}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{$category->title_fa}}" name="title_fa" type="text" placeholder="نام دسته بندی" class="text">
            <input value="{{$category->title_en}}" name="title_en" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
            <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
            <select name="parent_id" >
                <option value selected>دسته پدر ندارد</option>
                @foreach($categories as $parent)
                    <option
                        @if ($parent->id == $category->parent_id) selected @endif
                        value="{{$parent->id}}">{{$parent->title_fa}}</option>
                @endforeach
            </select>
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>

@endsection
