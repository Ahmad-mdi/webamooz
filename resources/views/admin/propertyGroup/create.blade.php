<div class="col-4 bg-white">
    <p class="box__title">ایجاد گروه مشخصات محصول</p>
    @if (session('success'))
        <div class="text-success">{{session('success')}}</div>
    @endif
    @include('admin.layouts.errors')
    <form action="{{route('propertyGroup.store')}}" method="post" class="padding-30">
        @csrf
        <input value="{{old('title_fa')}}"  name="title" type="text" placeholder="عنوان" class="text">
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
