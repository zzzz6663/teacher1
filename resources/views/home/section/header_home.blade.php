<?php
$c='c.svg';
$uc='uc.svg';
    ?>

<!-- Start Header -->
<div id="header" class="rows mob">
    <div class="container">
        <div id="mmenu">
            <span>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1510:36155)">
                        <path d="M17 18V20H6V18H17ZM22 11V13H4V11H22ZM20 4V6H9V4H20Z" fill="white" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1510:36155">
                            <rect width="24.0643" height="24" fill="white" transform="translate(0.863281)" />
                        </clipPath>
                    </defs>
                </svg>
            </span>
        </div>

        <div id="logo">
            <a href="{{route('login')}}">
                <img style="width: 80px; position: relative; left: 80px" src="/home/images/logo.png" alt="">
            </a>
        </div>

        <div class="login">
            @if(\Illuminate\Support\Facades\Auth::check())
            @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')
            @php($route=route('teacher.dashboard'))
            @else
            @php($route=route('student.dashboard'))
            @endif
            @else
            @php($route=route('home.student.register.form'))
            @endif
            <a href="{{route('home.student.register.form')}}">
                <span class="text">
                    @if(\Illuminate\Support\Facades\Auth::check())

                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                    @else
                    ورود / ثبت نام
                    @endif
                </span>
                <span class="icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.0001 22.75H9.00014C7.68014 22.75 6.58015 22.62 5.65015 22.34C5.31015 22.24 5.09015 21.91 5.11015 21.56C5.36015 18.57 8.39015 16.22 12.0001 16.22C15.6101 16.22 18.6301 18.56 18.8901 21.56C18.9201 21.92 18.7001 22.24 18.3501 22.34C17.4201 22.62 16.3201 22.75 15.0001 22.75ZM6.72015 21.06C7.38015 21.19 8.13015 21.25 9.00014 21.25H15.0001C15.8701 21.25 16.6201 21.19 17.2801 21.06C16.7501 19.14 14.5601 17.72 12.0001 17.72C9.44015 17.72 7.25015 19.14 6.72015 21.06Z" fill="currentColor" />
                        <path d="M15 2H9C4 2 2 4 2 9V15C2 18.78 3.14 20.85 5.86 21.62C6.08 19.02 8.75 16.97 12 16.97C15.25 16.97 17.92 19.02 18.14 21.62C20.86 20.85 22 18.78 22 15V9C22 4 20 2 15 2ZM12 14.17C10.02 14.17 8.42 12.56 8.42 10.58C8.42 8.60002 10.02 7 12 7C13.98 7 15.58 8.60002 15.58 10.58C15.58 12.56 13.98 14.17 12 14.17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9999 14.92C9.60992 14.92 7.66992 12.97 7.66992 10.58C7.66992 8.19002 9.60992 6.25 11.9999 6.25C14.3899 6.25 16.3299 8.19002 16.3299 10.58C16.3299 12.97 14.3899 14.92 11.9999 14.92ZM11.9999 7.75C10.4399 7.75 9.16992 9.02002 9.16992 10.58C9.16992 12.15 10.4399 13.42 11.9999 13.42C13.5599 13.42 14.8299 12.15 14.8299 10.58C14.8299 9.02002 13.5599 7.75 11.9999 7.75Z" fill="currentColor" />
                    </svg>
                </span>

            </a>
            @if(\Illuminate\Support\Facades\Auth::check() && auth()->user()->level!='admin')
            <div class="drop" style="z-index: 99999999999 ">
                <div class="drop-container">
                    <ul>
                        @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')

                        <?php   $user=auth()->user();?>

                        @if( $user->languages()->count()==0
                        || !$user->attr('port')
                        || !$user->attr('save_expert')
                        || !$user->attr('time_plan')
                        || !$user->attr('price_plan')
                        || !$user->attr('port_vid')
                        )
                        <div class="dashmenu">
                            <ul>
                                <li class="{{((Route::currentRouteName()=='teacher.level')?'active':'')}}">
                                    <a href="{{route('teacher.level')}}">
                                        <span class="icon">
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.8654 10H19.8727C21.8799 10 22.8836 9 22.8836 7V5C22.8836 3 21.8799 2 19.8727 2H17.8654C15.8581 2 14.8545 3 14.8545 5V7C14.8545 9 15.8581 10 17.8654 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5.82145 22H7.82873C9.836 22 10.8396 21 10.8396 19V17C10.8396 15 9.836 14 7.82873 14H5.82145C3.81418 14 2.81055 15 2.81055 17V19C2.81055 21 3.81418 22 5.82145 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path opacity="0.34" d="M6.82509 10C9.04226 10 10.8396 8.20914 10.8396 6C10.8396 3.79086 9.04226 2 6.82509 2C4.60792 2 2.81055 3.79086 2.81055 6C2.81055 8.20914 4.60792 10 6.82509 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path opacity="0.34" d="M18.869 22C21.0862 22 22.8836 20.2091 22.8836 18C22.8836 15.7909 21.0862 14 18.869 14C16.6519 14 14.8545 15.7909 14.8545 18C14.8545 20.2091 16.6519 22 18.869 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                        <span class="text"> تکمیل پروفایل </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @else

                        <li class="">
                            <a href="{{route('teacher.dashboard')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.8654 10H19.8727C21.8799 10 22.8836 9 22.8836 7V5C22.8836 3 21.8799 2 19.8727 2H17.8654C15.8581 2 14.8545 3 14.8545 5V7C14.8545 9 15.8581 10 17.8654 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5.82145 22H7.82873C9.836 22 10.8396 21 10.8396 19V17C10.8396 15 9.836 14 7.82873 14H5.82145C3.81418 14 2.81055 15 2.81055 17V19C2.81055 21 3.81418 22 5.82145 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.34" d="M6.82509 10C9.04226 10 10.8396 8.20914 10.8396 6C10.8396 3.79086 9.04226 2 6.82509 2C4.60792 2 2.81055 3.79086 2.81055 6C2.81055 8.20914 4.60792 10 6.82509 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.34" d="M18.869 22C21.0862 22 22.8836 20.2091 22.8836 18C22.8836 15.7909 21.0862 14 18.869 14C16.6519 14 14.8545 15.7909 14.8545 18C14.8545 20.2091 16.6519 22 18.869 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">کلاس های من</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('teacher.classes')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.83301 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.8623 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M4.31641 9.09009H21.3782" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M22.8836 19C22.8836 19.75 22.6728 20.46 22.3015 21.06C21.609 22.22 20.3343 23 18.869 23C17.8554 23 16.932 22.63 16.2295 22C15.9183 21.74 15.6474 21.42 15.4366 21.06C15.0653 20.46 14.8545 19.75 14.8545 19C14.8545 16.79 16.651 15 18.869 15C20.0734 15 21.1473 15.53 21.8799 16.36C22.5022 17.07 22.8836 17.99 22.8836 19Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.3037 19L18.2973 19.99L20.4351 18.02" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M21.8799 8.5V16.36C21.1472 15.53 20.0734 15 18.869 15C16.651 15 14.8544 16.79 14.8544 19C14.8544 19.75 15.0652 20.46 15.4366 21.06C15.6473 21.42 15.9183 21.74 16.2294 22H8.83263C5.31991 22 3.81445 20 3.81445 17V8.5C3.81445 5.5 5.31991 3.5 8.83263 3.5H16.8617C20.3744 3.5 21.8799 5.5 21.8799 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.843 13.7H12.852" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.12814 13.7H9.13716" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.12793 16.7H9.13691" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text"> کلاس های آزاد</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('teacher.wallet')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.81055 12.6101H19.8724" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M19.8724 10.28V17.43C19.8423 20.28 19.0594 21 16.0786 21H6.60432C3.57334 21 2.81055 20.2501 2.81055 17.2701V10.28C2.81055 7.58005 3.44284 6.71005 5.82146 6.57005C6.06233 6.56005 6.3233 6.55005 6.60432 6.55005H16.0786C19.1096 6.55005 19.8724 7.30005 19.8724 10.28Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M22.8841 6.73V13.72C22.8841 16.42 22.2518 17.29 19.8732 17.43V10.28C19.8732 7.3 19.1104 6.55 16.0794 6.55H6.60513C6.32411 6.55 6.06314 6.56 5.82227 6.57C5.85237 3.72 6.63524 3 9.61604 3H19.0903C22.1213 3 22.8841 3.75 22.8841 6.73Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M6.07324 17.8101H7.79947" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.94727 17.8101H13.3998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">تراکنش ها</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('teacher.plans')}}">
                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M20.5 9.09009H3.5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M3 8.5V17C3 20 4.5 22 8 22H16C19.5 22 21 20 21 17V8.5C21 5.5 19.5 3.5 16 3.5H8C4.5 3.5 3 5.5 3 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.0055 13.7H11.9965" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M15.7047 13.7H15.6957" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M15.7051 16.7H15.6961" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">برنامه زمانی</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('teacher.articles')}}">
                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M7 13H15" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M7 17H12" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16 3.5C19.33 3.68 21 4.95 21 9.65V15.83C21 19.95 20 22.01 15 22.01H9C4 22.01 3 19.95 3 15.83V9.65C3 4.95 4.67 3.69 8 3.5H16Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">مقالات</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('teacher.prices')}}">
                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.17038 15.3L8.70038 19.83C10.5604 21.69 13.5804 21.69 15.4504 19.83L19.8404 15.44C21.7004 13.58 21.7004 10.56 19.8404 8.69005L15.3004 4.17005C14.3504 3.22005 13.0404 2.71005 11.7004 2.78005L6.70038 3.02005C4.70038 3.11005 3.11038 4.70005 3.01038 6.69005L2.77038 11.69C2.71038 13.04 3.22038 14.35 4.17038 15.3Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.5 12C10.8807 12 12 10.8807 12 9.5C12 8.11929 10.8807 7 9.5 7C8.11929 7 7 8.11929 7 9.5C7 10.8807 8.11929 12 9.5 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>

                                </span>
                                <span class="text"> تعیین دستمزد ها</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('teacher.lang')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.8833 10V13C22.8833 17 20.876 19 16.8615 19H16.3596C16.0485 19 15.7474 19.15 15.5567 19.4L14.0513 21.4C13.3889 22.28 12.3049 22.28 11.6425 21.4L10.1371 19.4C9.97651 19.18 9.60516 19 9.33418 19H8.83236C4.81782 19 2.81055 18 2.81055 13V8C2.81055 4 4.81782 2 8.83236 2H14.8542" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M20.3743 7C21.7601 7 22.8834 5.88071 22.8834 4.5C22.8834 3.11929 21.7601 2 20.3743 2C18.9886 2 17.8652 3.11929 17.8652 4.5C17.8652 5.88071 18.9886 7 20.3743 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M16.8586 11H16.8676" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.843 11H12.852" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M8.82736 11H8.83637" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text"> زبان های من</span>
                                {{-- <span class="num">3</span>--}}
                            </a>
                        </li>

                        <li class="{{((Route::currentRouteName()=='teacher.account')?'active':'')}}">
                            <a href="{{route('teacher.account')}}">
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM5 10H7C7 10.7956 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20435 13 10 13C10.7956 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7956 13 10H15C15 11.3261 14.4732 12.5979 13.5355 13.5355C12.5979 14.4732 11.3261 15 10 15C8.67392 15 7.40215 14.4732 6.46447 13.5355C5.52678 12.5979 5 11.3261 5 10Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="text"> اطلاعات حساب</span>
                                <span class="num">
                                </span>
                            </a>
                        </li>
                        <li class="{{((Route::currentRouteName()=='teacher.abilite')?'active':'')}}">
                            <a href="{{route('teacher.abilite')}}">
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 10C17.9998 8.21688 17.4039 6.48494 16.3069 5.07919C15.2099 3.67345 13.6747 2.67448 11.9451 2.24094C10.2155 1.80739 8.39064 1.96411 6.76028 2.68621C5.12992 3.40831 3.78753 4.65439 2.94629 6.22659C2.10504 7.79879 1.81316 9.60698 2.11699 11.364C2.42083 13.1211 3.30296 14.7262 4.62331 15.9246C5.94366 17.1231 7.62653 17.846 9.40471 17.9787C11.1829 18.1114 12.9544 17.6462 14.438 16.657L15.548 18.321C13.9062 19.4187 11.975 20.0032 10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10V11.5C20.0001 12.2488 19.7601 12.9778 19.3152 13.5801C18.8703 14.1823 18.244 14.626 17.5283 14.846C16.8126 15.066 16.0453 15.0507 15.3389 14.8023C14.6326 14.5539 14.0245 14.0855 13.604 13.466C12.9366 14.16 12.083 14.6465 11.1457 14.8671C10.2085 15.0877 9.22747 15.033 8.32056 14.7096C7.41366 14.3861 6.61943 13.8077 6.03331 13.0438C5.44718 12.2799 5.09408 11.363 5.01644 10.4033C4.9388 9.44358 5.13991 8.48186 5.59562 7.63367C6.05133 6.78549 6.74225 6.08692 7.58537 5.6219C8.42849 5.15688 9.38794 4.94519 10.3485 5.01227C11.309 5.07934 12.2297 5.42232 13 6H15V11.5C15 11.8978 15.158 12.2794 15.4393 12.5607C15.7206 12.842 16.1022 13 16.5 13C16.8978 13 17.2794 12.842 17.5607 12.5607C17.842 12.2794 18 11.8978 18 11.5V10ZM10 7C9.20435 7 8.44129 7.31607 7.87868 7.87868C7.31607 8.44129 7 9.20435 7 10C7 10.7956 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20435 13 10 13C10.7956 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7956 13 10C13 9.20435 12.6839 8.44129 12.1213 7.87868C11.5587 7.31607 10.7956 7 10 7Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="text"> تخصص های من</span>
                                <span class="num">
                                </span>
                            </a>
                        </li>
                        <li class="{{((Route::currentRouteName()=='teacher.introduce')?'active':'')}}">
                            <a href="{{route('teacher.introduce')}}">
                                <span class="icon">
                                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 5.2L21.213 1.55C21.288 1.49746 21.3759 1.4665 21.4672 1.4605C21.5586 1.4545 21.6498 1.4737 21.731 1.51599C21.8122 1.55829 21.8802 1.62206 21.9276 1.70035C21.9751 1.77865 22.0001 1.86846 22 1.96V14.04C22.0001 14.1315 21.9751 14.2214 21.9276 14.2996C21.8802 14.3779 21.8122 14.4417 21.731 14.484C21.6498 14.5263 21.5586 14.5455 21.4672 14.5395C21.3759 14.5335 21.288 14.5025 21.213 14.45L16 10.8V15C16 15.2652 15.8946 15.5196 15.7071 15.7071C15.5196 15.8946 15.2652 16 15 16H1C0.734784 16 0.48043 15.8946 0.292893 15.7071C0.105357 15.5196 0 15.2652 0 15V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H15C15.2652 0 15.5196 0.105357 15.7071 0.292893C15.8946 0.48043 16 0.734784 16 1V5.2ZM16 8.359L20 11.159V4.84L16 7.64V8.358V8.359ZM2 2V14H14V2H2ZM4 4H6V6H4V4Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="text"> ویدئو معرفی</span>
                                <span class="num">
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="logout" href="{{route('teacher.logout',auth()->user()->id)}}">

                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.89844 7.55999C9.20844 3.95999 11.0584 2.48999 15.1084 2.48999H15.2384C19.7084 2.48999 21.4984 4.27999 21.4984 8.74999V15.27C21.4984 19.74 19.7084 21.53 15.2384 21.53H15.1084C11.0884 21.53 9.23844 20.08 8.90844 16.54" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <g opacity="0.4">
                                            <path d="M14.9972 12H3.61719" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.85 8.65039L2.5 12.0004L5.85 15.3504" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>

                                </span>
                                <span class="text">
                                    خروج از حساب
                                </span>
                            </a>
                        </li>
                        @endif
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->level=='student')
                        <li class="">
                            <a href="{{route('student.dashboard')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.8654 10H19.8727C21.8799 10 22.8836 9 22.8836 7V5C22.8836 3 21.8799 2 19.8727 2H17.8654C15.8581 2 14.8545 3 14.8545 5V7C14.8545 9 15.8581 10 17.8654 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5.82145 22H7.82873C9.836 22 10.8396 21 10.8396 19V17C10.8396 15 9.836 14 7.82873 14H5.82145C3.81418 14 2.81055 15 2.81055 17V19C2.81055 21 3.81418 22 5.82145 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.34" d="M6.82509 10C9.04226 10 10.8396 8.20914 10.8396 6C10.8396 3.79086 9.04226 2 6.82509 2C4.60792 2 2.81055 3.79086 2.81055 6C2.81055 8.20914 4.60792 10 6.82509 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.34" d="M18.869 22C21.0862 22 22.8836 20.2091 22.8836 18C22.8836 15.7909 21.0862 14 18.869 14C16.6519 14 14.8545 15.7909 14.8545 18C14.8545 20.2091 16.6519 22 18.869 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">کلاس های من</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('student.wallet')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.83301 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.8623 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M4.31641 9.09009H21.3782" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M22.8836 19C22.8836 19.75 22.6728 20.46 22.3015 21.06C21.609 22.22 20.3343 23 18.869 23C17.8554 23 16.932 22.63 16.2295 22C15.9183 21.74 15.6474 21.42 15.4366 21.06C15.0653 20.46 14.8545 19.75 14.8545 19C14.8545 16.79 16.651 15 18.869 15C20.0734 15 21.1473 15.53 21.8799 16.36C22.5022 17.07 22.8836 17.99 22.8836 19Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.3037 19L18.2973 19.99L20.4351 18.02" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M21.8799 8.5V16.36C21.1472 15.53 20.0734 15 18.869 15C16.651 15 14.8544 16.79 14.8544 19C14.8544 19.75 15.0652 20.46 15.4366 21.06C15.6473 21.42 15.9183 21.74 16.2294 22H8.83263C5.31991 22 3.81445 20 3.81445 17V8.5C3.81445 5.5 5.31991 3.5 8.83263 3.5H16.8617C20.3744 3.5 21.8799 5.5 21.8799 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.843 13.7H12.852" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.12814 13.7H9.13716" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.12793 16.7H9.13691" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text"> حسابداری</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('student.profile')}}">
                                <span class="icon">



                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M12.1187 12.78C12.0487 12.77 11.9587 12.77 11.8787 12.78C10.1187 12.72 8.71875 11.28 8.71875 9.50998C8.71875 7.69998 10.1787 6.22998 11.9987 6.22998C13.8087 6.22998 15.2787 7.69998 15.2787 9.50998C15.2687 11.28 13.8787 12.72 12.1187 12.78Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.34" d="M18.7417 19.3801C16.9617 21.0101 14.6017 22.0001 12.0017 22.0001C9.40172 22.0001 7.04172 21.0101 5.26172 19.3801C5.36172 18.4401 5.96172 17.5201 7.03172 16.8001C9.77172 14.9801 14.2517 14.9801 16.9717 16.8001C18.0417 17.5201 18.6417 18.4401 18.7417 19.3801Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <span class="text">پروفایل</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('student.fave')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.8833 10V13C22.8833 17 20.876 19 16.8615 19H16.3596C16.0485 19 15.7474 19.15 15.5567 19.4L14.0513 21.4C13.3889 22.28 12.3049 22.28 11.6425 21.4L10.1371 19.4C9.97651 19.18 9.60516 19 9.33418 19H8.83236C4.81782 19 2.81055 18 2.81055 13V8C2.81055 4 4.81782 2 8.83236 2H14.8542" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M20.3743 7C21.7601 7 22.8834 5.88071 22.8834 4.5C22.8834 3.11929 21.7601 2 20.3743 2C18.9886 2 17.8652 3.11929 17.8652 4.5C17.8652 5.88071 18.9886 7 20.3743 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M16.8586 11H16.8676" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.843 11H12.852" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M8.82736 11H8.83637" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text"> علاقه مندی</span>
                                {{-- <span class="num">3</span>--}}
                            </a>
                        </li>
                        <li>
                            <a class="logout" href="{{route('student.logout',auth()->user()->id)}}">

                                <span class="icon">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.89844 7.55999C9.20844 3.95999 11.0584 2.48999 15.1084 2.48999H15.2384C19.7084 2.48999 21.4984 4.27999 21.4984 8.74999V15.27C21.4984 19.74 19.7084 21.53 15.2384 21.53H15.1084C11.0884 21.53 9.23844 20.08 8.90844 16.54" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <g opacity="0.4">
                                            <path d="M14.9972 12H3.61719" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.85 8.65039L2.5 12.0004L5.85 15.3504" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>

                                </span>
                                <span class="text">
                                    خروج از حساب
                                </span>
                            </a>
                        </li>
                        @endif

                    </ul>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>

<div id="header" class="rows desk" style="z-index: 999">
    <div class="fullcontainer">
        <div id="logo">
            <a href="{{route('login')}}">
                <img src="/home/images/logo.png" alt="">
            </a>
        </div>
        <div id="mainmenu">
            <ul>
                <li class="active"><a href="{{route('home.teacher.list')}}">جست و جوی استاد</a></li>
                <li class="parent"><a href="#">زبان ها</a>
                    <ul>
                        @foreach(\App\Models\Language::whereActive(1)->orderBy('sort')->get() as $language)
                        <li>
                            <a href="{{route('home.teacher.list',['lang'=>$language->id])}}">
                                {{$language->name}} </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('home.articles')}}"> مقالات</a></li>
                @if(!Illuminate\Support\Facades\Auth::check())
                <li><a href="{{route('home.student.register.form')}}">ثبت نام استاد</a></li>
                @endif
            </ul>
        </div>



        <div class="login">

            @if(\Illuminate\Support\Facades\Auth::check())
            @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')
            @php($route=route('teacher.dashboard'))
            @else
            @php($route=route('student.dashboard'))
            @endif
            @else
            @php($route=route('home.student.register.form'))
            @endif
            <a href="{{$route}}">
                <span class="icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.0001 22.75H9.00014C7.68014 22.75 6.58015 22.62 5.65015 22.34C5.31015 22.24 5.09015 21.91 5.11015 21.56C5.36015 18.57 8.39015 16.22 12.0001 16.22C15.6101 16.22 18.6301 18.56 18.8901 21.56C18.9201 21.92 18.7001 22.24 18.3501 22.34C17.4201 22.62 16.3201 22.75 15.0001 22.75ZM6.72015 21.06C7.38015 21.19 8.13015 21.25 9.00014 21.25H15.0001C15.8701 21.25 16.6201 21.19 17.2801 21.06C16.7501 19.14 14.5601 17.72 12.0001 17.72C9.44015 17.72 7.25015 19.14 6.72015 21.06Z" fill="currentColor" />
                        <path d="M15 2H9C4 2 2 4 2 9V15C2 18.78 3.14 20.85 5.86 21.62C6.08 19.02 8.75 16.97 12 16.97C15.25 16.97 17.92 19.02 18.14 21.62C20.86 20.85 22 18.78 22 15V9C22 4 20 2 15 2ZM12 14.17C10.02 14.17 8.42 12.56 8.42 10.58C8.42 8.60002 10.02 7 12 7C13.98 7 15.58 8.60002 15.58 10.58C15.58 12.56 13.98 14.17 12 14.17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9999 14.92C9.60992 14.92 7.66992 12.97 7.66992 10.58C7.66992 8.19002 9.60992 6.25 11.9999 6.25C14.3899 6.25 16.3299 8.19002 16.3299 10.58C16.3299 12.97 14.3899 14.92 11.9999 14.92ZM11.9999 7.75C10.4399 7.75 9.16992 9.02002 9.16992 10.58C9.16992 12.15 10.4399 13.42 11.9999 13.42C13.5599 13.42 14.8299 12.15 14.8299 10.58C14.8299 9.02002 13.5599 7.75 11.9999 7.75Z" fill="currentColor" />
                    </svg>
                </span>
                <span class="text">
                    @if(\Illuminate\Support\Facades\Auth::check())

                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                    خوش آمدید
                    @else
                    ورود / ثبت نام
                    @endif
                </span>
            </a>
            @if(\Illuminate\Support\Facades\Auth::check() && auth()->user()->level!='admin')
            <div class="drop" style="z-index: 99999999999 ">
                <div class="drop-container">
                    <ul>
                        @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')

                        <?php   $user=auth()->user();?>

                        @if( $user->languages()->count()==0
                        || !$user->attr('port')
                        || !$user->attr('save_expert')
                        || !$user->attr('time_plan')
                        || !$user->attr('price_plan')
                        || !$user->attr('port_vid')
                        )
                        <div class="dashmenu">
                            <ul>
                                <li class="{{((Route::currentRouteName()=='teacher.level')?'active':'')}}">
                                    <a href="{{route('teacher.level')}}">
                                        <span class="icon">
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.8654 10H19.8727C21.8799 10 22.8836 9 22.8836 7V5C22.8836 3 21.8799 2 19.8727 2H17.8654C15.8581 2 14.8545 3 14.8545 5V7C14.8545 9 15.8581 10 17.8654 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5.82145 22H7.82873C9.836 22 10.8396 21 10.8396 19V17C10.8396 15 9.836 14 7.82873 14H5.82145C3.81418 14 2.81055 15 2.81055 17V19C2.81055 21 3.81418 22 5.82145 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path opacity="0.34" d="M6.82509 10C9.04226 10 10.8396 8.20914 10.8396 6C10.8396 3.79086 9.04226 2 6.82509 2C4.60792 2 2.81055 3.79086 2.81055 6C2.81055 8.20914 4.60792 10 6.82509 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path opacity="0.34" d="M18.869 22C21.0862 22 22.8836 20.2091 22.8836 18C22.8836 15.7909 21.0862 14 18.869 14C16.6519 14 14.8545 15.7909 14.8545 18C14.8545 20.2091 16.6519 22 18.869 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                        <span class="text"> تکمیل پروفایل </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @else

                        <li class="">
                            <a href="{{route('teacher.dashboard')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.8654 10H19.8727C21.8799 10 22.8836 9 22.8836 7V5C22.8836 3 21.8799 2 19.8727 2H17.8654C15.8581 2 14.8545 3 14.8545 5V7C14.8545 9 15.8581 10 17.8654 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5.82145 22H7.82873C9.836 22 10.8396 21 10.8396 19V17C10.8396 15 9.836 14 7.82873 14H5.82145C3.81418 14 2.81055 15 2.81055 17V19C2.81055 21 3.81418 22 5.82145 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.34" d="M6.82509 10C9.04226 10 10.8396 8.20914 10.8396 6C10.8396 3.79086 9.04226 2 6.82509 2C4.60792 2 2.81055 3.79086 2.81055 6C2.81055 8.20914 4.60792 10 6.82509 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.34" d="M18.869 22C21.0862 22 22.8836 20.2091 22.8836 18C22.8836 15.7909 21.0862 14 18.869 14C16.6519 14 14.8545 15.7909 14.8545 18C14.8545 20.2091 16.6519 22 18.869 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">کلاس های من</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('teacher.classes')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.83301 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.8623 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M4.31641 9.09009H21.3782" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M22.8836 19C22.8836 19.75 22.6728 20.46 22.3015 21.06C21.609 22.22 20.3343 23 18.869 23C17.8554 23 16.932 22.63 16.2295 22C15.9183 21.74 15.6474 21.42 15.4366 21.06C15.0653 20.46 14.8545 19.75 14.8545 19C14.8545 16.79 16.651 15 18.869 15C20.0734 15 21.1473 15.53 21.8799 16.36C22.5022 17.07 22.8836 17.99 22.8836 19Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.3037 19L18.2973 19.99L20.4351 18.02" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M21.8799 8.5V16.36C21.1472 15.53 20.0734 15 18.869 15C16.651 15 14.8544 16.79 14.8544 19C14.8544 19.75 15.0652 20.46 15.4366 21.06C15.6473 21.42 15.9183 21.74 16.2294 22H8.83263C5.31991 22 3.81445 20 3.81445 17V8.5C3.81445 5.5 5.31991 3.5 8.83263 3.5H16.8617C20.3744 3.5 21.8799 5.5 21.8799 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.843 13.7H12.852" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.12814 13.7H9.13716" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.12793 16.7H9.13691" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text"> کلاس های آزاد</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('teacher.wallet')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.81055 12.6101H19.8724" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M19.8724 10.28V17.43C19.8423 20.28 19.0594 21 16.0786 21H6.60432C3.57334 21 2.81055 20.2501 2.81055 17.2701V10.28C2.81055 7.58005 3.44284 6.71005 5.82146 6.57005C6.06233 6.56005 6.3233 6.55005 6.60432 6.55005H16.0786C19.1096 6.55005 19.8724 7.30005 19.8724 10.28Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M22.8841 6.73V13.72C22.8841 16.42 22.2518 17.29 19.8732 17.43V10.28C19.8732 7.3 19.1104 6.55 16.0794 6.55H6.60513C6.32411 6.55 6.06314 6.56 5.82227 6.57C5.85237 3.72 6.63524 3 9.61604 3H19.0903C22.1213 3 22.8841 3.75 22.8841 6.73Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M6.07324 17.8101H7.79947" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.94727 17.8101H13.3998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">تراکنش ها</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('teacher.plans')}}">
                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M20.5 9.09009H3.5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M3 8.5V17C3 20 4.5 22 8 22H16C19.5 22 21 20 21 17V8.5C21 5.5 19.5 3.5 16 3.5H8C4.5 3.5 3 5.5 3 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.0055 13.7H11.9965" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M15.7047 13.7H15.6957" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M15.7051 16.7H15.6961" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">برنامه زمانی</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('teacher.articles')}}">
                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M7 13H15" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M7 17H12" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16 3.5C19.33 3.68 21 4.95 21 9.65V15.83C21 19.95 20 22.01 15 22.01H9C4 22.01 3 19.95 3 15.83V9.65C3 4.95 4.67 3.69 8 3.5H16Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">مقالات</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('teacher.prices')}}">
                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.17038 15.3L8.70038 19.83C10.5604 21.69 13.5804 21.69 15.4504 19.83L19.8404 15.44C21.7004 13.58 21.7004 10.56 19.8404 8.69005L15.3004 4.17005C14.3504 3.22005 13.0404 2.71005 11.7004 2.78005L6.70038 3.02005C4.70038 3.11005 3.11038 4.70005 3.01038 6.69005L2.77038 11.69C2.71038 13.04 3.22038 14.35 4.17038 15.3Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.5 12C10.8807 12 12 10.8807 12 9.5C12 8.11929 10.8807 7 9.5 7C8.11929 7 7 8.11929 7 9.5C7 10.8807 8.11929 12 9.5 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>

                                </span>
                                <span class="text"> تعیین دستمزد ها</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('teacher.lang')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.8833 10V13C22.8833 17 20.876 19 16.8615 19H16.3596C16.0485 19 15.7474 19.15 15.5567 19.4L14.0513 21.4C13.3889 22.28 12.3049 22.28 11.6425 21.4L10.1371 19.4C9.97651 19.18 9.60516 19 9.33418 19H8.83236C4.81782 19 2.81055 18 2.81055 13V8C2.81055 4 4.81782 2 8.83236 2H14.8542" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M20.3743 7C21.7601 7 22.8834 5.88071 22.8834 4.5C22.8834 3.11929 21.7601 2 20.3743 2C18.9886 2 17.8652 3.11929 17.8652 4.5C17.8652 5.88071 18.9886 7 20.3743 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M16.8586 11H16.8676" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.843 11H12.852" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M8.82736 11H8.83637" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text"> زبان های من</span>
                                {{-- <span class="num">3</span>--}}
                            </a>
                        </li>

                        <li class="{{((Route::currentRouteName()=='teacher.account')?'active':'')}}">
                            <a href="{{route('teacher.account')}}">
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM5 10H7C7 10.7956 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20435 13 10 13C10.7956 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7956 13 10H15C15 11.3261 14.4732 12.5979 13.5355 13.5355C12.5979 14.4732 11.3261 15 10 15C8.67392 15 7.40215 14.4732 6.46447 13.5355C5.52678 12.5979 5 11.3261 5 10Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="text"> اطلاعات حساب</span>
                                <span class="num">
                                </span>
                            </a>
                        </li>
                        <li class="{{((Route::currentRouteName()=='teacher.abilite')?'active':'')}}">
                            <a href="{{route('teacher.abilite')}}">
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 10C17.9998 8.21688 17.4039 6.48494 16.3069 5.07919C15.2099 3.67345 13.6747 2.67448 11.9451 2.24094C10.2155 1.80739 8.39064 1.96411 6.76028 2.68621C5.12992 3.40831 3.78753 4.65439 2.94629 6.22659C2.10504 7.79879 1.81316 9.60698 2.11699 11.364C2.42083 13.1211 3.30296 14.7262 4.62331 15.9246C5.94366 17.1231 7.62653 17.846 9.40471 17.9787C11.1829 18.1114 12.9544 17.6462 14.438 16.657L15.548 18.321C13.9062 19.4187 11.975 20.0032 10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10V11.5C20.0001 12.2488 19.7601 12.9778 19.3152 13.5801C18.8703 14.1823 18.244 14.626 17.5283 14.846C16.8126 15.066 16.0453 15.0507 15.3389 14.8023C14.6326 14.5539 14.0245 14.0855 13.604 13.466C12.9366 14.16 12.083 14.6465 11.1457 14.8671C10.2085 15.0877 9.22747 15.033 8.32056 14.7096C7.41366 14.3861 6.61943 13.8077 6.03331 13.0438C5.44718 12.2799 5.09408 11.363 5.01644 10.4033C4.9388 9.44358 5.13991 8.48186 5.59562 7.63367C6.05133 6.78549 6.74225 6.08692 7.58537 5.6219C8.42849 5.15688 9.38794 4.94519 10.3485 5.01227C11.309 5.07934 12.2297 5.42232 13 6H15V11.5C15 11.8978 15.158 12.2794 15.4393 12.5607C15.7206 12.842 16.1022 13 16.5 13C16.8978 13 17.2794 12.842 17.5607 12.5607C17.842 12.2794 18 11.8978 18 11.5V10ZM10 7C9.20435 7 8.44129 7.31607 7.87868 7.87868C7.31607 8.44129 7 9.20435 7 10C7 10.7956 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20435 13 10 13C10.7956 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7956 13 10C13 9.20435 12.6839 8.44129 12.1213 7.87868C11.5587 7.31607 10.7956 7 10 7Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="text"> تخصص های من</span>
                                <span class="num">
                                </span>
                            </a>
                        </li>
                        <li class="{{((Route::currentRouteName()=='teacher.introduce')?'active':'')}}">
                            <a href="{{route('teacher.introduce')}}">
                                <span class="icon">
                                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 5.2L21.213 1.55C21.288 1.49746 21.3759 1.4665 21.4672 1.4605C21.5586 1.4545 21.6498 1.4737 21.731 1.51599C21.8122 1.55829 21.8802 1.62206 21.9276 1.70035C21.9751 1.77865 22.0001 1.86846 22 1.96V14.04C22.0001 14.1315 21.9751 14.2214 21.9276 14.2996C21.8802 14.3779 21.8122 14.4417 21.731 14.484C21.6498 14.5263 21.5586 14.5455 21.4672 14.5395C21.3759 14.5335 21.288 14.5025 21.213 14.45L16 10.8V15C16 15.2652 15.8946 15.5196 15.7071 15.7071C15.5196 15.8946 15.2652 16 15 16H1C0.734784 16 0.48043 15.8946 0.292893 15.7071C0.105357 15.5196 0 15.2652 0 15V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H15C15.2652 0 15.5196 0.105357 15.7071 0.292893C15.8946 0.48043 16 0.734784 16 1V5.2ZM16 8.359L20 11.159V4.84L16 7.64V8.358V8.359ZM2 2V14H14V2H2ZM4 4H6V6H4V4Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="text"> ویدئو معرفی</span>
                                <span class="num">
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="logout" href="{{route('teacher.logout',auth()->user()->id)}}">

                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.89844 7.55999C9.20844 3.95999 11.0584 2.48999 15.1084 2.48999H15.2384C19.7084 2.48999 21.4984 4.27999 21.4984 8.74999V15.27C21.4984 19.74 19.7084 21.53 15.2384 21.53H15.1084C11.0884 21.53 9.23844 20.08 8.90844 16.54" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <g opacity="0.4">
                                            <path d="M14.9972 12H3.61719" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.85 8.65039L2.5 12.0004L5.85 15.3504" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>

                                </span>
                                <span class="text">
                                    خروج از حساب
                                </span>
                            </a>
                        </li>
                        @endif
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->level=='student')
                        <li class="">
                            <a href="{{route('student.dashboard')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.8654 10H19.8727C21.8799 10 22.8836 9 22.8836 7V5C22.8836 3 21.8799 2 19.8727 2H17.8654C15.8581 2 14.8545 3 14.8545 5V7C14.8545 9 15.8581 10 17.8654 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5.82145 22H7.82873C9.836 22 10.8396 21 10.8396 19V17C10.8396 15 9.836 14 7.82873 14H5.82145C3.81418 14 2.81055 15 2.81055 17V19C2.81055 21 3.81418 22 5.82145 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.34" d="M6.82509 10C9.04226 10 10.8396 8.20914 10.8396 6C10.8396 3.79086 9.04226 2 6.82509 2C4.60792 2 2.81055 3.79086 2.81055 6C2.81055 8.20914 4.60792 10 6.82509 10Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.34" d="M18.869 22C21.0862 22 22.8836 20.2091 22.8836 18C22.8836 15.7909 21.0862 14 18.869 14C16.6519 14 14.8545 15.7909 14.8545 18C14.8545 20.2091 16.6519 22 18.869 22Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text">کلاس های من</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('student.wallet')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.83301 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.8623 2V5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M4.31641 9.09009H21.3782" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M22.8836 19C22.8836 19.75 22.6728 20.46 22.3015 21.06C21.609 22.22 20.3343 23 18.869 23C17.8554 23 16.932 22.63 16.2295 22C15.9183 21.74 15.6474 21.42 15.4366 21.06C15.0653 20.46 14.8545 19.75 14.8545 19C14.8545 16.79 16.651 15 18.869 15C20.0734 15 21.1473 15.53 21.8799 16.36C22.5022 17.07 22.8836 17.99 22.8836 19Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.3037 19L18.2973 19.99L20.4351 18.02" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M21.8799 8.5V16.36C21.1472 15.53 20.0734 15 18.869 15C16.651 15 14.8544 16.79 14.8544 19C14.8544 19.75 15.0652 20.46 15.4366 21.06C15.6473 21.42 15.9183 21.74 16.2294 22H8.83263C5.31991 22 3.81445 20 3.81445 17V8.5C3.81445 5.5 5.31991 3.5 8.83263 3.5H16.8617C20.3744 3.5 21.8799 5.5 21.8799 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.843 13.7H12.852" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.12814 13.7H9.13716" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M9.12793 16.7H9.13691" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text"> حسابداری</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('student.profile')}}">
                                <span class="icon">



                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M12.1187 12.78C12.0487 12.77 11.9587 12.77 11.8787 12.78C10.1187 12.72 8.71875 11.28 8.71875 9.50998C8.71875 7.69998 10.1787 6.22998 11.9987 6.22998C13.8087 6.22998 15.2787 7.69998 15.2787 9.50998C15.2687 11.28 13.8787 12.72 12.1187 12.78Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.34" d="M18.7417 19.3801C16.9617 21.0101 14.6017 22.0001 12.0017 22.0001C9.40172 22.0001 7.04172 21.0101 5.26172 19.3801C5.36172 18.4401 5.96172 17.5201 7.03172 16.8001C9.77172 14.9801 14.2517 14.9801 16.9717 16.8001C18.0417 17.5201 18.6417 18.4401 18.7417 19.3801Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <span class="text">پروفایل</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('student.fave')}}">
                                <span class="icon">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.8833 10V13C22.8833 17 20.876 19 16.8615 19H16.3596C16.0485 19 15.7474 19.15 15.5567 19.4L14.0513 21.4C13.3889 22.28 12.3049 22.28 11.6425 21.4L10.1371 19.4C9.97651 19.18 9.60516 19 9.33418 19H8.83236C4.81782 19 2.81055 18 2.81055 13V8C2.81055 4 4.81782 2 8.83236 2H14.8542" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M20.3743 7C21.7601 7 22.8834 5.88071 22.8834 4.5C22.8834 3.11929 21.7601 2 20.3743 2C18.9886 2 17.8652 3.11929 17.8652 4.5C17.8652 5.88071 18.9886 7 20.3743 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M16.8586 11H16.8676" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M12.843 11H12.852" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M8.82736 11H8.83637" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="text"> علاقه مندی</span>
                                {{-- <span class="num">3</span>--}}
                            </a>
                        </li>
                        <li>
                            <a class="logout" href="{{route('student.logout',auth()->user()->id)}}">

                                <span class="icon">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.89844 7.55999C9.20844 3.95999 11.0584 2.48999 15.1084 2.48999H15.2384C19.7084 2.48999 21.4984 4.27999 21.4984 8.74999V15.27C21.4984 19.74 19.7084 21.53 15.2384 21.53H15.1084C11.0884 21.53 9.23844 20.08 8.90844 16.54" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <g opacity="0.4">
                                            <path d="M14.9972 12H3.61719" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.85 8.65039L2.5 12.0004L5.85 15.3504" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>

                                </span>
                                <span class="text">
                                    خروج از حساب
                                </span>
                            </a>
                        </li>
                        @endif

                    </ul>
                </div>
            </div>
            @endif
        </div>

        {{-- <div id="header-choose-lang">--}}
        {{-- <div class="top">--}}
        {{-- <span class="choosen">--}}
        {{-- <span class="flag">--}}
        {{-- <img src="/home/images/iran.png" alt="">--}}
        {{-- </span>--}}
        {{-- <span class="text">فارسی</span>--}}
        {{-- </span>--}}
        {{-- </div>--}}
        {{-- <div class="drop">--}}
        {{-- <ul>--}}
        {{-- <li>--}}
        {{-- <a href="#">--}}
        {{-- <span class="flag">--}}
        {{-- <img src="/home/images/english.png" alt="">--}}
        {{-- </span>--}}
        {{-- <span class="text">English</span>--}}
        {{-- </a>--}}
        {{-- </li>--}}
        {{-- <li>--}}
        {{-- <a href="#">--}}
        {{-- <span class="flag">--}}
        {{-- <img src="/home/images/iran.png" alt="">--}}
        {{-- </span>--}}
        {{-- <span class="text">فارسی</span>--}}
        {{-- </a>--}}
        {{-- </li>--}}
        {{-- </ul>--}}
        {{-- </div>--}}
        {{-- </div>--}}
    </div>
</div>
<!-- End Header -->
