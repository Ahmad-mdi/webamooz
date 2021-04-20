<div class="col-12 bg-white">
    <p class="box__title">ایجاد محصول جدید</p>
    @include('admin.layouts.errors')
    <form action="{{route('product.store')}}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        <input value="{{old('name')}}"  name="name" type="text" placeholder="نام " class="text">
        <label for="category">افزودن دسته بندی :</label>
        <select name="category_id" >
            <option value disabled selected>انتخاب کنید:</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title_fa}}</option>
            @endforeach
        </select>
        <label for="category">افزودن برند :</label>
        <select name="brand_id" >
            <option value disabled selected>انتخاب کنید:</option>
            @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
        </select>
        <input value="{{old('price')}}"  name="price" type="text" placeholder="قیمت " class="text">
        <input value="{{old('slug')}}"  name="slug" type="text" placeholder="اسلاگ " class="text">
        <textarea name="description" id="" cols="30" rows="10" placeholder="توضیحات ">{{old('description')}}</textarea>
        <label for="images">افزودن تصویر :</label>
        <input type="file" class="form-control" name="image"> <br><br>
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
