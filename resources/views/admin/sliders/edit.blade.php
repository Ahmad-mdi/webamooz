@extends('admin.layouts.app')

@section('content')

    <div class="col-12 bg-white">
        <p class="box__title">ویرایش اسلایدر </p>
        @include('admin.layouts.errors')
        <form action="{{route('slider.update',$slider)}}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input value="{{$slider->link}}"  name="link" type="text" placeholder="لینک" class="text">
            <div class="col-6">
                <img src="{{str_replace('public','/storage',$slider->image)}}" width="100" alt="{{$slider->link}}">
            </div>
            <label for="images">افزودن عکس:</label>
            <input type="file" class="form-control" name="image"> <br><br>
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>

@endsection
