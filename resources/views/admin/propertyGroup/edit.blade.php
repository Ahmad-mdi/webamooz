@extends('admin.layouts.app')


@section('content')

    <div class="col-12 bg-white">
        <p class="box__title">ویرایش گروه مشخصات  <b>{{$propertyGroup->title}}</b></p>
        @include('admin.layouts.errors')
        <form action="{{route('propertyGroup.update',$propertyGroup)}}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{$propertyGroup->title}}" name="title" type="text" placeholder="عنوان" class="text">
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>

@endsection

