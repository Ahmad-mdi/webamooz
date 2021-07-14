@extends('admin.layouts.app')

@section('links')
    <link type="text/css" rel="stylesheet" href="/admin/css/jalalidatepicker.css" />
    <script type="text/javascript" src="/admin/js/jalalidatepicker.js"></script>
@endsection

@section('content')
    <div class="col-4 bg-white">
        <p class="box__title">ویرایش کد تخفیف <b>{{$offer->code}}</b></p>
        @include('admin.layouts.errors')
        <form action="{{route('offer.update',$offer)}}" method="post" class="padding-30">
            @csrf @method('patch')
            <input value="{{$offer->code}}"  name="code" type="text" placeholder="کد تخفیف" class="text">
            <input data-jdp value="{{verta()->instance($offer->start_at)->format('Y/n/j')}}"  name="start_at" type="text" placeholder="تاریخ شروع"  autocomplete="off" class="text">
            <input data-jdp value="{{verta()->instance($offer->end_at)->format('Y/n/j')}}"  name="end_at" type="text" placeholder="تاریخ پایان"  autocomplete="off" class="text">
            <button class="btn btn-brand">ویرایش</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        jalaliDatepicker.startWatch({
            separatorChar: "/",
            minDate: "attr",
            maxDate: "attr",
            changeMonthRotateYear: true,
            showTodayBtn: true,
            showEmptyBtn: true
        });
        //flatpickr("[data-jdp]");
        document.getElementById("aaa").addEventListener("jdp:change", function (e) { console.log(e) });
    </script>
@endsection
