<div class="col-4 bg-white">
    <p class="box__title">ایجاد مشخصات محصول</p>
    @if (session('success'))
        <div class="text-success">{{session('success')}}</div>
    @endif
    @include('admin.layouts.errors')
    <form action="{{route('properties.store')}}" method="post" class="padding-30">
        @csrf
        <input value="{{old('title')}}"  name="title" type="text" placeholder="عنوان" class="text">
        <select name="property_group_id" id="">
            <option value selected disabled>گروه مشخصات را انتخاب نمایید</option>
            @foreach($propertyGroup as $group)
                <option value="{{$group->id}}">{{$group->title}}</option>
            @endforeach
        </select>
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
