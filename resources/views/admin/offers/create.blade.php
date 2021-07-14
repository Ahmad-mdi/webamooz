@section('links')
    <link type="text/css" rel="stylesheet" href="/admin/css/jalalidatepicker.css" />
    <script type="text/javascript" src="/admin/js/jalalidatepicker.js"></script>
@endsection


<div class="col-4 bg-white">
    <p class="box__title">ایجاد کد تخفیف جدید</p>
    @include('admin.layouts.errors')
    <form action="{{route('offer.store')}}" method="post" class="padding-30">
        @csrf
        <input value="{{old('code')}}"  name="code" type="text" placeholder="کد تخفیف" class="text">
        <input data-jdp value="{{old('start_at')}}"  name="start_at" type="text" placeholder="تاریخ شروع"  autocomplete="off" class="text">
        <input data-jdp value="{{old('end_at')}}"  name="end_at" type="text" placeholder="تاریخ پایان"  autocomplete="off" class="text">
        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>

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
