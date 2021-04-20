@extends('admin.layouts.app')


@section('content')

    <div class="col-12 bg-white">
        <p class="box__title">ویرایش  مشخصات  <b>{{$property->title}}</b></p>
        @include('admin.layouts.errors')
        <form action="{{route('properties.update',$property)}}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{$property->title}}" name="title" type="text" placeholder="عنوان" class="text">
            <select name="property_group_id" id="">
                <option value selected disabled>گروه مشخصات را انتخاب نمایید</option>
                @foreach($propertyGroup as $group)
                    <option
                        @if ($group->id == $property->property_group_id) selected @endif
                        value="{{$group->id}}">{{$group->title}}</option>
                @endforeach
            </select>
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>

@endsection

