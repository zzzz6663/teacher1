
@extends('master.home')
@section('main_body')
    <div id="page-404" class="rows">
        <div class="container">
            <div class="page-404">
                <div class="img">
                    <img src="/home/images/404.png" alt="">
                </div>
                <h2 style="text-align: center">نتیجه ای یافت نشد</h2>
{{--                <p>--}}
{{--                    ما هیچ مطابقی برای<b>"عرفان آماده"</b>پیدا نکردیم--}}
{{--                </p>--}}
{{--                <ul class="circle">--}}
{{--                    <li>لطفا ترکیب جدیدی از فیلترها را امتحان کنید یا از فیلترهای کمتری به صورت هم‌زمان استفاده کنید</li>--}}
{{--                    <li>سعی کنید کاراکترهای خاص را با کاراکتر قانونی جایگزین کنید یا آنها را به کلی حذف کنید</li>--}}
{{--                </ul>--}}

                <div class="link">
                    <a href="{{ url()->previous() }}" class="link">  برگشت</a>
                </div>
            </div>
        </div>
    </div>
@endsection

