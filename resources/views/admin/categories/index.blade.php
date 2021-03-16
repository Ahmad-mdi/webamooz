@extends('admin.layouts.app')

@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr role="row" class="">
                                <td><a href="">{{$category->id}}</a></td>
                                <td><a href="">{{$category->title_fa}}</a></td>
                                <td>{{$category->title_en}}</td>
                                @if (!optional($category->parent)->title_fa)
                                    <td><b class="text-warning">والد</b></td>
                                @else
                                    <td>{{optional($category->parent)->title_fa}}</td>
                                @endif
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('category.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="item-delete bg-white" type="submit"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                @include('admin.layouts.errors')
                <form action="{{route('category.store')}}" method="post" class="padding-30">
                    @csrf
                    <input name="title_fa" type="text" placeholder="نام دسته بندی" class="text">
                    <input name="title_en" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select name="parent_id" >
                        <option value selected>دسته پدر ندارد</option>
                        @foreach($categories as $parent)
                            <option value="{{$parent->id}}">{{$parent->title_fa}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-brand">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>

@endsection
