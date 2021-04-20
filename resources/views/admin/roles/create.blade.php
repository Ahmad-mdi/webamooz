<div class="col-12 bg-white">
    <p class="box__title">ایجاد نقش جدید</p>
    @include('admin.layouts.errors')
    <form action="{{route('role.store')}}" method="post" class="padding-30 mr-5">
        @csrf
        <input value="{{old('title')}}"  name="title" type="text" placeholder="عنوان نقش" class="text">
        <div class="form-group">
            <label>انتخاب دسترسی:</label><br><br>
            <input type="radio" id="selectAll"> انتخاب همه
            <input type="radio" id="disableAll"> غیرفعال همه
            <div class="row">
                    @foreach($permissions as $permission)
                        <div class="padding-bottom-10" style="margin-right: 5px;">
                            <input class="checked" type="checkbox" name="permissions[]" value="{{$permission->id}}"> <b>{{$permission->label}}</b>
                        </div>
                    @endforeach
            </div>
        </div>
        <button class="btn btn-brand">افزودن نقش</button>
    </form>
</div>

@section('scripts')
    @include('admin.layouts.checkbox')
@endsection
