@extends('admin.layouts.app')

@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">کاربران</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>نقش</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr role="row" class="">
                                <td><a href="">{{$user->id}}</a></td>
                                <td><a href="">{{$user->name}}</a></td>
                                <td><a href="">{{$user->email}}</a></td>
                                <td><a href="">{{$user->role->title}}</a></td>
                                <td>
                                    <a href="{{route('user.edit',$user)}}" class="item-edit " title="ویرایش"></a>
                                </td>
                                <td>
                                    <form action="{{route('user.destroy',$user)}}" method="post">
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
                {{--{{$users->links()}}--}}

            </div>
            @include('admin.users.create')
        </div>
    </div>

@endsection
