@extends('client.layouts.app')

@section('titleWeb') ثبت نام کاربری@endsection

@section('content')
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li><a href="login.html">حساب کاربری</a></li>
            <li><a href="register.html">ثبت نام</a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h1 class="title">ثبت نام حساب کاربری</h1>
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>
                <form class="form-horizontal" method="post" action="{{route('client.register.sendmail')}}">
                    @csrf
                    <fieldset id="account">
                        <legend>برای ارسال کد تایید ایمیل خودرا وارد نمایید.</legend>
                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="email">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="address">
                        <div class="buttons">
                            <div class="pull-right">&nbsp;
                                <input type="submit" class="btn btn-primary" value="ارسال">
                            </div>
                        </div>
                    </fieldset>
                    @include('admin.layouts.errors')
                </form>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
@endsection
