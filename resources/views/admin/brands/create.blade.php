<div class="col-4 bg-white">
    <p class="box__title">ایجاد برند جدید</p>
    @include('admin.layouts.errors')
    <form action="{{route('brand.store')}}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        <input value="{{old('name')}}"  name="name" type="text" placeholder="نام برند" class="text">
        <label for="images">افزودن تصویر:</label>
        <input type="file" class="form-control" name="image"> <br><br>
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
