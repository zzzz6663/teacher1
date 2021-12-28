<?php
$c='c.svg';
$uc='uc.svg';
?>

<div id="sidemenu">
    <div>


        <div id="slogo">
            <a href="{{route('login')}}">
                <img src="/home/images/logo1.png" alt="">
            </a>
            <span class="close">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </span>
        </div>
        <div class="sd">

        </div>


        <div class="login">
            @if(\Illuminate\Support\Facades\Auth::check())

            <h1 style="text-align: center">
                {{\Illuminate\Support\Facades\Auth::user()->name}}

            </h1>
            {{-- <div class="vm">--}}
            {{-- <img style="display: inline-block" src="/home/images/{{$c}}" alt="">--}}
            {{-- تکمیل شده--}}
            {{-- </div>  <div  class="vm">--}}
            {{-- <img src="/home/images/{{$uc}}" alt="">--}}
            {{-- تکمیل نشده--}}
            {{-- </div>--}}
            @else
            <div class="tab-nav">
                <ul>
                    <li class="active">
                        <a href="{{route('home.student.register.form')}}">ثبت نام</a>
                    </li>
                    <li>
                        <a href="{{route('home.student.register.form')}}">ورود</a>
                    </li>
                </ul>
            </div>
            @endif

        </div>



        <div id="smenu">
            <ul>
                <li class=" {{(Route::currentRouteName()=='home.teacher.list')?'active':''}}"><a href="{{route('home.teacher.list')}}">جست و جوی استاد</a></li>
                <li class="parent"><a href="#">زبان ها</a>

                    <ul>
                        @foreach(\App\Models\Language::whereActive(1)->get() as $language)
                        <li style="display: inline-block">
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


                @if(\Illuminate\Support\Facades\Auth::check() && auth()->user()->level!='admin')
                @php($user=auth()->user())
                <div class="drop" style="z-index: 99999999999 ">
                    <div class="drop-container">
                        <ul>
                            @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')
                            <li class=" {{(Route::currentRouteName()=='teacher.dashboard')?'active':''}}">
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

                            <li class=" {{(Route::currentRouteName()=='teacher.classes')?'active':''}}">
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
                                    <span class="text">  کلاس های آزاد</span>
                                </a>
                            </li>
                            <li class=" {{(Route::currentRouteName()=='teacher.wallet')?'active':''}}">
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

                            <li class=" {{(Route::currentRouteName()=='teacher.articles')?'active':''}}">
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
                            <li class=" {{(Route::currentRouteName()=='teacher.prices')?'active':''}}">
                                <a href="{{route('teacher.prices')}}">
                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.17038 15.3L8.70038 19.83C10.5604 21.69 13.5804 21.69 15.4504 19.83L19.8404 15.44C21.7004 13.58 21.7004 10.56 19.8404 8.69005L15.3004 4.17005C14.3504 3.22005 13.0404 2.71005 11.7004 2.78005L6.70038 3.02005C4.70038 3.11005 3.11038 4.70005 3.01038 6.69005L2.77038 11.69C2.71038 13.04 3.22038 14.35 4.17038 15.3Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path opacity="0.4" d="M9.5 12C10.8807 12 12 10.8807 12 9.5C12 8.11929 10.8807 7 9.5 7C8.11929 7 7 8.11929 7 9.5C7 10.8807 8.11929 12 9.5 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>

                                    </span>
                                    <span class="text"> تعیین دستمزد ها</span>
                                    <span class="num">
                                        {{-- <img src="/home/images/{{$user->attr('price_plan')?$c:$uc}}" alt=""> --}}
                                    </span>
                                </a>
                            </li>

                            <li class=" {{(Route::currentRouteName()=='teacher.lang')?'active':''}}">
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
                                    <span class="text"> زبان ها من</span>
                                    <span class="num">
                                        {{-- <img src="/home/images/{{$user->attr('save_lang')?$c:$uc}}" alt=""> --}}
                                    </span>
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
                            <li class=" {{(Route::currentRouteName()=='teacher.plans')?'active':''}}">
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
                                    <span class="num">
                                        {{-- <img src="/home/images/{{$user->attr('time_plan')?$c:$uc}}" alt=""> --}}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="logout" href="{{route('teacher.logout',auth()->user()->id)}}">

                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.8999 7.55999C9.2099 3.95999 11.0599 2.48999 15.1099 2.48999H15.2399C19.7099 2.48999 21.4999 4.27999 21.4999 8.74999V15.27C21.4999 19.74 19.7099 21.53 15.2399 21.53H15.1099C11.0899 21.53 9.2399 20.08 8.9099 16.54" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.0001 12H3.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.85 8.6499L2.5 11.9999L5.85 15.3499" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="text">
                                        خروج از حساب
                                    </span>
                                </a>
                            </li>

                            @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->level=='student')
                            <li class=" {{(Route::currentRouteName()=='student.dashboard')?'active':''}}">
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
                            <li class=" {{(Route::currentRouteName()=='student.wallet')?'active':''}}">
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
                            <li class=" {{(Route::currentRouteName()=='student.profile')?'active':''}}">
                                <a href="{{route('student.profile')}}">
                                    <span class="icon">
                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.81055 12.6101H19.8724" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.8724 10.28V17.43C19.8423 20.28 19.0594 21 16.0786 21H6.60432C3.57334 21 2.81055 20.2501 2.81055 17.2701V10.28C2.81055 7.58005 3.44284 6.71005 5.82146 6.57005C6.06233 6.56005 6.3233 6.55005 6.60432 6.55005H16.0786C19.1096 6.55005 19.8724 7.30005 19.8724 10.28Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path opacity="0.4" d="M22.8841 6.73V13.72C22.8841 16.42 22.2518 17.29 19.8732 17.43V10.28C19.8732 7.3 19.1104 6.55 16.0794 6.55H6.60513C6.32411 6.55 6.06314 6.56 5.82227 6.57C5.85237 3.72 6.63524 3 9.61604 3H19.0903C22.1213 3 22.8841 3.75 22.8841 6.73Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path opacity="0.4" d="M6.07324 17.8101H7.79947" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path opacity="0.4" d="M9.94727 17.8101H13.3998" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    <span class="text">پروفایل</span>
                                </a>
                            </li>
                            <li class=" {{(Route::currentRouteName()=='student.fave')?'active':''}}">
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
                                            <path d="M8.8999 7.55999C9.2099 3.95999 11.0599 2.48999 15.1099 2.48999H15.2399C19.7099 2.48999 21.4999 4.27999 21.4999 8.74999V15.27C21.4999 19.74 19.7099 21.53 15.2399 21.53H15.1099C11.0899 21.53 9.2399 20.08 8.9099 16.54" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.0001 12H3.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.85 8.6499L2.5 11.9999L5.85 15.3499" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
            </ul>
        </div>
        {{-- <div id="side-choose-lang">--}}
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

        <div class="side-support">
            <span class="icon">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.0938 7.20735C10.2597 8.67266 9.0462 9.88616 7.58089 10.7202L6.79511 9.61979C6.66875 9.44285 6.48191 9.31835 6.26995 9.26987C6.05799 9.22138 5.83561 9.25227 5.64489 9.35668C4.38771 10.0437 2.99937 10.4569 1.57111 10.5691C1.3482 10.5868 1.14013 10.6878 0.988399 10.8521C0.836665 11.0163 0.752413 11.2317 0.752441 11.4554V15.4216C0.752394 15.6417 0.833994 15.8539 0.981448 16.0173C1.1289 16.1807 1.33173 16.2836 1.55066 16.306C2.02178 16.3549 2.49644 16.3789 2.97466 16.3789C10.5836 16.3789 16.7524 10.21 16.7524 2.60113C16.7524 2.12291 16.7284 1.64824 16.6796 1.17713C16.6571 0.958193 16.5542 0.755369 16.3909 0.607914C16.2275 0.460459 16.0152 0.378859 15.7951 0.378906H11.8289C11.6053 0.378878 11.3899 0.46313 11.2256 0.614862C11.0614 0.766595 10.9603 0.974661 10.9427 1.19757C10.8305 2.62583 10.4173 4.01418 9.73022 5.27135C9.62581 5.46207 9.59492 5.68445 9.6434 5.89641C9.69189 6.10837 9.81638 6.29521 9.99333 6.42157L11.0938 7.20735ZM13.3356 6.62335L11.6467 5.41713C12.126 4.38254 12.4544 3.28454 12.6218 2.15668H14.9658C14.9711 2.30424 14.9738 2.45268 14.9738 2.60113C14.9747 9.22868 9.60222 14.6011 2.97466 14.6011C2.82622 14.6011 2.67777 14.5985 2.53022 14.5922V12.2482C3.65808 12.0808 4.75608 11.7524 5.79066 11.2731L6.99689 12.962C7.48252 12.7733 7.95421 12.5505 8.40844 12.2954L8.46 12.266C10.2035 11.2738 11.6473 9.82995 12.6396 8.08646L12.6689 8.03491C12.9241 7.58068 13.1469 7.10898 13.3356 6.62335Z" fill="#5E57BA" />
                </svg>
            </span>
            <span class="text">پشتیبانی :</span>
            <span class="number">
                021 -
                2842
                3822

            </span>
        </div>

    </div>

</div>
