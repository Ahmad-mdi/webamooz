<div class="col-12 bg-white">
    @include('admin.layouts.notification')
    <p class="box__title">ایجاد دسته بندی جدید</p>
    @include('admin.layouts.errors')
    <form action="{{route('category.store')}}" method="post" class="padding-30">
        @csrf
        <input value="{{old('title_fa')}}"  name="title_fa" type="text" placeholder="نام دسته بندی" class="text">
        <input value="{{old('title_en')}}"   name="title_en" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
        <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
        <select name="parent_id">
            <option disabled selected value>دسته پدر ندارد</option>
            @foreach($selectCategory as $parent)
                <option value="{{$parent->id}}">{{$parent->title_fa}}</option>
            @endforeach
        </select>

        <div class="form-group">
            <p class="box__title margin-bottom-15">انتخاب  گروه مشخصات</p>
           {{-- <input type="radio" id="selectAll"> انتخاب همه
            <input type="radio" id="disableAll"> غیرفعال همه--}}
            <div class="row">
                @foreach($propertyGroup as $group)
                    <div class="padding-bottom-10" style="margin-right: 5px;">
                        <input class="checked" type="checkbox" name="propertyGroups[]" value="{{$group->id}}"> <b>{{$group->title}}</b>
                    </div>
                @endforeach
            </div>
        </div>
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
