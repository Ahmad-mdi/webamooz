@extends('admin.layouts.app')

@section('content')

    <div class="col-12 bg-white">
        <p class="box__title">ویرایش نقش {{$role->title}}</p>
        @include('admin.layouts.errors')
        <form action="{{route('role.update',$role)}}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input value="{{$role->title}}"  name="title" type="text" placeholder="ویرایش عنوان نقش" class="text">
            <div class="form-group">
                <label>ویرایش دسترسی:</label>
                <input type="radio" id="selectAll"> انتخاب همه
                <input type="radio" id="disableAll"> غیرفعال همه
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="padding-bottom-10" style="margin-right: 5px;">
                            <input class="checked" @if($role->hasPermission($permission)) checked @endif type="checkbox" name="permissions[]" value="{{$permission->id}}"> <b>{{$permission->label}}</b>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-brand">ویرایش نقش</button>
        </form>
    </div>

@endsection

@section('scripts')
    @include('admin.layouts.checkbox')
@endsection
