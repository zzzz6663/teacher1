<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/home/css/style.css">
    <link rel="stylesheet" href="/home/css/responsive.css">
    <link rel="stylesheet" href="/home/css/iziToast.min.css">
    <link rel="stylesheet" href="/home/css/croppie.css">
    <link rel="stylesheet" href="/home/css/persianDatepicker-default.css">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="google-site-verification" content="qc-1R8WG_jNsY_X86nabe6b9Bb5JoNwUdh-SnUXtI-Q" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="   آموزش زبان در تیچر وان با انتخاب زبان و استاد دلخواه، آغاز می‌شود. استاد‌های تاییدشده تیچر وان، تدریس آنلاین زبان را در کلاس زبان آنلاین انجام می‌دهند ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{@csrf_token()}}">
    <meta name="enamad" content="758266"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="/home/js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="/home/js/persianDatepicker.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JT7Q3JNZJ8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-JT7Q3JNZJ8');
    </script>
</head>
<body>
@includeWhen( empty($side),'home.section.side_menu')
<div id="site-content">
    @includeWhen( empty($header),'home.section.header_home')
    @yield('main_body')
    {{-- @includeWhen( empty($footer),'home.section.footer_home') --}}
</div>
<script type="text/javascript" src="/home/js/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="/home/js/nouislider.js"></script>
<script type="text/javascript" src="/home/js/plyr.js"></script>
<script type="text/javascript" src="/home/js/lightslider.min.js"></script>
<script type="text/javascript" src="/home/js/theia-sticky-sidebar.js"></script>
<script type="text/javascript" src="/home/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.number.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drop-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drop.live-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drag-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drag.live-2.2.js"></script>
<script type="text/javascript" src="/home/js/jQuery.countdownTimer.js"></script>
<script type="text/javascript" src="/home/js/jQuery.countdownTimer-fa.js"></script>
<script type="text/javascript" src="/home/js/select2.full.min.js"></script>
<script type="text/javascript" src="/home/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/home/js/iziToast.min.js"></script>
<script type="text/javascript" src="/home/js/apexcharts.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/home/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/home/js/croppie.js"></script>
<script type="text/javascript" src="/home/js/template.js"></script>
<script type="text/javascript" src="/home/js/fun.js"></script>
<script type="text/javascript" src="/home/js/home.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript">!function(){function t(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,localStorage.getItem("rayToken")?t.src="https://app.raychat.io/scripts/js/"+o+"?rid="+localStorage.getItem("rayToken")+"&href="+window.location.href:t.src="https://app.raychat.io/scripts/js/"+o+"?href="+window.location.href;var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}var e=document,a=window,o="40a7f110-a08e-4a9a-a60e-be2f02ec9349";"complete"==e.readyState?t():a.attachEvent?a.attachEvent("onload",t):a.addEventListener("load",t,!1)}();</script>

</body>
@include('sweet::alert')
</html>
