@extends('admin.layouts.app')

@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title"> مشخصات</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>عنوان</th>
                            <th>گروه مشخصات</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($properties as $property)
                            <tr role="row" class="">
                                <td><a href="">{{$property->id}}</a></td>
                                <td><a href="">{{$property->title}}</a></td>
                                <td><a href="">{{$property->propertyGroup->title}}</a></td>
                                <td>
                                    <a href="{{route('properties.edit',$property)}}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('properties.destroy',$property)}}" method="post">
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
                {{--                {{$categories->links()}}--}}

            </div>
            @include('admin.properties.create')
        </div>
    </div>

@endsection
