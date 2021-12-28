@component('home.student.content',['title'=>' تنظیمات '])


@slot('bread')

{{-- @include('home.student.profile.bread_left',['name'=>'داشبورد'])--}}


@endslot

<div id="tdash">

    <div class="tab-nav">
        <ul class="">

            <li class="active red_num">
                <div class="span-container">
                    <span>پیش رو</span>
                    <span class="num">{{\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15))->count()}}</span>
                </div>
            </li>
            <li class="red_num">
                <div class="span-container">
                    <span> برگزار شده</span>
                    <span class="num">
                        {{\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->whereIn('status',['down','passed'])->count() ;
                        }}
                    </span>

                </div>
            </li>
            <li class="red_num">
                <div class="span-container">
                    <span> تعیین وضعیت نشده</span>
                    <span class="num">
                        {{\App\Models\Count::where('user_id',$user->id)->where('Count','>','0')->count()}}
                    </span>

                </div>
            </li>


        </ul>

    </div>
    <div class="tab-container">
        <ul>
            <li class="active">
                <div>
                    <div class="upclasses">
                        <div>
                            <?php
                                $w=[ 'شنبه','یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه' ];
                                $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
                                ?>
                            <?php
                                $classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15));
                                $classes=$classes->orderBy('start','asc')->paginate(5);
                                ?>
                            @foreach($classes as $class)
                            @php($v=verta($class->start))
                            @php($teacher=\App\Models\User::find($class->user_id))
                            <?php
                                    $min="$v->minute";
                                    if ($v->minute==0){
                                        $min='00';
                                    }
                                    ?>
                            @php($v=verta($class->start))
                            <div class="single-cupclass">
                                <div>
                                    <div class="right">
                                        <div class="profile">
                                            <div class="avatar">
                                                <div class="img" style="background: url('{{asset('/src/avatar/'.$class->user->attr('avatar'))}} ');"></div>
                                            </div>
                                            <h4 class="name">{{$class->user->name}} </h4>
                                            <ul>
                                                <li>
                                                    <span class="icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.33301 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4.66699 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M11.958 5.30249H2.04134" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M1.75 4.95841V9.91675C1.75 11.6667 2.625 12.8334 4.66667 12.8334H9.33333C11.375 12.8334 12.25 11.6667 12.25 9.91675V4.95841C12.25 3.20841 11.375 2.04175 9.33333 2.04175H4.66667C2.625 2.04175 1.75 3.20841 1.75 4.95841Z" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M4.84435 7.99162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M4.84435 9.74162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M7.00255 7.99162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M7.00255 9.74162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M9.16173 7.99162H9.15649" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M9.16113 9.7417H9.15589" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <span class="text">
                                                        {{$w[$v->dayOfWeek]}}
                                                        {{($v->day)}}
                                                        {{($m[$v->month-1])}}
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.8337 7.00008C12.8337 10.2201 10.2203 12.8334 7.00033 12.8334C3.78033 12.8334 1.16699 10.2201 1.16699 7.00008C1.16699 3.78008 3.78033 1.16675 7.00033 1.16675C10.2203 1.16675 12.8337 3.78008 12.8337 7.00008Z" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M9.16418 8.85503L7.35585 7.77586C7.04085 7.58919 6.78418 7.14003 6.78418 6.77253V4.38086" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <span class="text">
                                                        ﺳﺎﻋﺖ:
                                                        {{\Carbon\Carbon::parse($class->start)->format('H:i:s')}}
                                                        @if(isset($class->bill->count) && $class->bill->count==0)
                                                        {{\Carbon\Carbon::parse($class->start)->addMinutes(30)->format('H:i:s')}}
                                                        @else
                                                        {{\Carbon\Carbon::parse($class->start)->addMinutes(60)->format('H:i:s')}}
                                                        @endif
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="timer">
                                            <h4>زمان باقی مانده :</h4>
                                            <div class="countdown" id="countdown_{{$class->id}}" data-time="{{$class->start}}"></div>
                                        </div>
                                    </div>
                                    <div class="left">
                                        <div class="info">
                                            <ul>
                                                <li>
                                                    <span class="title">
                                                        @if(isset($class->bill->count) && $class->bill->count==0)
                                                        آزمایشی
                                                        @else
                                                        خصوصی
                                                        @endif
                                                    </span>
                                                    <span class="icon">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18.3337 13.9501V3.89174C18.3337 2.89174 17.517 2.15008 16.5253 2.23341H16.4753C14.7253 2.38341 12.067 3.27508 10.5837 4.20841L10.442 4.30008C10.2003 4.45008 9.80033 4.45008 9.55866 4.30008L9.35033 4.17508C7.86699 3.25008 5.21699 2.36674 3.46699 2.22508C2.47533 2.14174 1.66699 2.89174 1.66699 3.88341V13.9501C1.66699 14.7501 2.31699 15.5001 3.11699 15.6001L3.35866 15.6334C5.16699 15.8751 7.95866 16.7917 9.55866 17.6667L9.59199 17.6834C9.81699 17.8084 10.1753 17.8084 10.392 17.6834C11.992 16.8001 14.792 15.8751 16.6087 15.6334L16.8837 15.6001C17.6837 15.5001 18.3337 14.7501 18.3337 13.9501Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M10 4.57495V17.075" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M6.45801 7.07495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M7.08301 9.57495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="title">
                                                        @if(isset($class->bill->count) && $class->bill->count==0)
                                                        30
                                                        @else
                                                        60
                                                        @endif
                                                        دقیقه</span>
                                                    <span class="icon">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M17.2913 11.0417C17.2913 15.0667 14.0247 18.3333 9.99967 18.3333C5.97467 18.3333 2.70801 15.0667 2.70801 11.0417C2.70801 7.01667 5.97467 3.75 9.99967 3.75C14.0247 3.75 17.2913 7.01667 17.2913 11.0417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M10 6.66675V10.8334" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M7.5 1.66675H12.5" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="buttons">
                                            <div class="options">
                                                <div class="top www">گزینه ها</div>
                                                <div class="drop">
                                                    @if( $class->model !='free')
                                                    <div class="drop-container" {{(\Illuminate\Support\Carbon::now()->gt(\Carbon\Carbon::parse($class->start)))?'hidden':''}}>
                                                        <ul>
                                                            @if( $class->type !='free')
                                                            <li data-id="{{$class->id}}" data-count="{{$class->bill->count}}" data-img="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" data-name="{{$teacher->name}}" data-date="
                                                                                 {{$w[$v->dayOfWeek]}}
                                                                                {{($v->day)}}
                                                                                {{($m[$v->month-1])}}
                                                                                {{($v->hour.':'.$min)}}
                                                                                    " class="change_class">
                                                                <a class="text option pointer">
                                                                    <span class="icon">
                                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M11.0504 3.00002L4.20878 10.2417C3.95045 10.5167 3.70045 11.0584 3.65045 11.4334L3.34211 14.1333C3.23378 15.1083 3.93378 15.775 4.90045 15.6084L7.58378 15.15C7.95878 15.0834 8.48378 14.8084 8.74211 14.525L15.5838 7.28335C16.7671 6.03335 17.3004 4.60835 15.4588 2.86668C13.6254 1.14168 12.2338 1.75002 11.0504 3.00002Z" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path opacity="0.4" d="M9.9082 4.20825C10.2665 6.50825 12.1332 8.26658 14.4499 8.49992" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path opacity="0.4" d="M2.5 18.3333H17.5" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span> ویرایش کلاس</span>
                                                                </a>
                                                            </li>
                                                            @endif

                                                            <li data-id="{{$class->id}}" data-count="{{$class->bill->count}}" data-img="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" data-name="{{$teacher->name}}" data-date="
                                                                              {{$w[$v->dayOfWeek]}}
                                                                            {{($v->day)}}
                                                                            {{($m[$v->month-1])}}
                                                                            {{($v->hour.':'.$min)}}
                                                                                " class="cancel_class">
                                                                <a class="option pointer ">
                                                                    <span class="icon">
                                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <g opacity="0.4">
                                                                                <path d="M7.6416 12.3583L12.3583 7.6416" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M12.3583 12.3583L7.6416 7.6416" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </g>
                                                                            <path d="M7.50033 18.3334H12.5003C16.667 18.3334 18.3337 16.6667 18.3337 12.5001V7.50008C18.3337 3.33341 16.667 1.66675 12.5003 1.66675H7.50033C3.33366 1.66675 1.66699 3.33341 1.66699 7.50008V12.5001C1.66699 16.6667 3.33366 18.3334 7.50033 18.3334Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="text">لغو کلاس</span>
                                                                </a>
                                                            </li>

                                                        </ul>

                                                    </div>
                                                    @endif

                                                </div>
                                            </div>



                                            <div class="enter-class">
                                                <a target="_blank" class="enter-class-bt" href="{{route('home.go.class',[$class->id])}}">
                                                    ورود به کلاس
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            {{$classes->appends(request()->all())->links('home.section.pagination')}}


                            @if($classes->count()==0)
                            <div class="upclasses">
                                <div>
                                    <div class="no-class">
                                        <div class="img">
                                            <img src="/home/images/noteacher.png" alt="">
                                        </div>
                                        <h3>هیچ کلاس درسی یافت نشد!</h3>
                                        <div class="button">
                                            <a href="{{route('home.teacher.list')}}" class="reserv">
                                                <span>همین حالا رزرو کن</span>
                                                <span class="icon">
                                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.89855 17.5C14.4145 17.5 18.0754 13.9555 18.0754 9.58329C18.0754 5.21104 14.4145 1.66663 9.89855 1.66663C5.38259 1.66663 1.72168 5.21104 1.72168 9.58329C1.72168 13.9555 5.38259 17.5 9.89855 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path opacity="0.4" d="M18.9363 18.3333L17.2148 16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <div class="upclasses">
                        <div>

                            <?php
                                $w=[ 'شنبه','یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه' ];
                                $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];

                                ?>
                            <?php
                                $classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->whereIn('status',['down','passed']) ;

                                $classes=$classes->orderBy('start','asc')->paginate(5);
                                ?>
                            @foreach($classes as $class)
                            @php($v=verta($class->start))
                            @php($teacher=\App\Models\User::find($class->user_id))
                            <?php
                                    $min="$v->minute";
                                    if ($v->minute==0){
                                        $min='00';

                                    }

                                    ?>
                            @php($v=verta($class->start))

                            <div class="single-cupclass">
                                <div>

                                    <div class="right">
                                        <div class="profile">
                                            <div class="avatar">
                                                <div class="img" style="background: url('{{asset('/src/avatar/'.$class->user->attr('avatar'))}} ');"></div>
                                            </div>
                                            <h4 class="name">{{$class->user->name}} </h4>
                                            <ul>
                                                <li>
                                                    <span class="icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.33301 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4.66699 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M11.958 5.30249H2.04134" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M1.75 4.95841V9.91675C1.75 11.6667 2.625 12.8334 4.66667 12.8334H9.33333C11.375 12.8334 12.25 11.6667 12.25 9.91675V4.95841C12.25 3.20841 11.375 2.04175 9.33333 2.04175H4.66667C2.625 2.04175 1.75 3.20841 1.75 4.95841Z" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M4.84435 7.99162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M4.84435 9.74162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M7.00255 7.99162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M7.00255 9.74162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M9.16173 7.99162H9.15649" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M9.16113 9.7417H9.15589" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <span class="text">
                                                        {{$w[$v->dayOfWeek]}}
                                                        {{($v->day)}}
                                                        {{($m[$v->month-1])}}

                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.8337 7.00008C12.8337 10.2201 10.2203 12.8334 7.00033 12.8334C3.78033 12.8334 1.16699 10.2201 1.16699 7.00008C1.16699 3.78008 3.78033 1.16675 7.00033 1.16675C10.2203 1.16675 12.8337 3.78008 12.8337 7.00008Z" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M9.16418 8.85503L7.35585 7.77586C7.04085 7.58919 6.78418 7.14003 6.78418 6.77253V4.38086" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <span class="text">
                                                        ﺳﺎﻋﺖ:
                                                        {{\Carbon\Carbon::parse($class->start)->format('H:i:s')}}

                                                        -
                                                        @if(isset($class->bill->count) && $class->bill->count==0)
                                                        {{\Carbon\Carbon::parse($class->start)->addMinutes(30)->format('H:i:s')}}
                                                        @else
                                                        {{\Carbon\Carbon::parse($class->start)->addMinutes(60)->format('H:i:s')}}

                                                        @endif

                                                    </span>
                                                </li>
                                            </ul>
                                        </div>

                                        {{-- <div class="timer">--}}
                                        {{-- <h4>زمان باقی مانده :</h4>--}}
                                        {{-- <div class="countdown" id="countdown_{{$class->id}}" data-time="{{$class->start}}">
                                    </div>--}}
                                    {{-- </div>--}}
                                </div>
                                <div class="left">
                                    <div class="info">
                                        <ul>
                                            <li>
                                                <span class="title">
                                                    @if(isset($class->bill->count) && $class->bill->count==0)
                                                    آزمایشی
                                                    @else
                                                    خصوصی
                                                    @endif

                                                </span>
                                                <span class="icon">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M18.3337 13.9501V3.89174C18.3337 2.89174 17.517 2.15008 16.5253 2.23341H16.4753C14.7253 2.38341 12.067 3.27508 10.5837 4.20841L10.442 4.30008C10.2003 4.45008 9.80033 4.45008 9.55866 4.30008L9.35033 4.17508C7.86699 3.25008 5.21699 2.36674 3.46699 2.22508C2.47533 2.14174 1.66699 2.89174 1.66699 3.88341V13.9501C1.66699 14.7501 2.31699 15.5001 3.11699 15.6001L3.35866 15.6334C5.16699 15.8751 7.95866 16.7917 9.55866 17.6667L9.59199 17.6834C9.81699 17.8084 10.1753 17.8084 10.392 17.6834C11.992 16.8001 14.792 15.8751 16.6087 15.6334L16.8837 15.6001C17.6837 15.5001 18.3337 14.7501 18.3337 13.9501Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path opacity="0.4" d="M10 4.57495V17.075" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path opacity="0.4" d="M6.45801 7.07495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path opacity="0.4" d="M7.08301 9.57495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="title">
                                                    @if(isset($class->bill->count) && $class->bill->count==0)
                                                    30
                                                    @else
                                                    60
                                                    @endif
                                                    دقیقه</span>
                                                <span class="icon">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.2913 11.0417C17.2913 15.0667 14.0247 18.3333 9.99967 18.3333C5.97467 18.3333 2.70801 15.0667 2.70801 11.0417C2.70801 7.01667 5.97467 3.75 9.99967 3.75C14.0247 3.75 17.2913 7.01667 17.2913 11.0417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path opacity="0.4" d="M10 6.66675V10.8334" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path opacity="0.4" d="M7.5 1.66675H12.5" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach


                        {{$classes->appends(request()->all())->links('home.section.pagination')}}


                        @if($classes->count()==0)
                        <div class="upclasses">
                            <div>
                                <div class="no-class">
                                    <div class="img">
                                        <img src="/home/images/noteacher.png" alt="">
                                    </div>
                                    <h3>هیچ کلاس درسی یافت نشد!</h3>
                                    <div class="button">
                                        <a href="{{route('home.teacher.list')}}" class="reserv">
                                            <span>همین حالا رزرو کن</span>
                                            <span class="icon">
                                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.89855 17.5C14.4145 17.5 18.0754 13.9555 18.0754 9.58329C18.0754 5.21104 14.4145 1.66663 9.89855 1.66663C5.38259 1.66663 1.72168 5.21104 1.72168 9.58329C1.72168 13.9555 5.38259 17.5 9.89855 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path opacity="0.4" d="M18.9363 18.3333L17.2148 16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
    </div>
    </li>
    <li>
        <div>
            <!-- Start Choose Time -->
            @if($em_Class=\App\Models\Count::where('user_id',$user->id)->where('Count','>','0')->count()>0)
            <div class="choose-time">
                <h3 class="dash-title">
                    انتخاب زمان برای کلاس های رزرو شده
                </h3>
                <div class="row">
                    @foreach(\App\Models\Count::where('user_id',$user->id)->where('Count','>','0')->get() as $count)
                    @php($teacher=\App\Models\User::find($count->teacher_id))
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div>
                            <div class="choose-time-single" style="text-align: center">
                                <div class="avatar">
                                    <div class="img" style="background: url('{{asset('/src/avatar/'.$teacher->attr('avatar'))}}');"></div>
                                </div>
                                <h4 class="name"> {{$teacher->name}}</h4>
                                <span class="remain">
                                    {{$count->count}}
                                    زمان رزرو نشده</span>
                                <a href="{{route('student.reserve',[$teacher->id,$count->id])}}" class="ch-button">

                                    <span>انتخاب زمان</span>
                                    <span class="icon">
                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.5471 5.69696H3.89307L7.66307 1.95697C7.87503 1.73943 7.99365 1.44771 7.99365 1.14398C7.99365 0.84025 7.87503 0.548478 7.66307 0.330933C7.44839 0.118902 7.15881 0 6.85707 0C6.55534 0 6.26575 0.118902 6.05107 0.330933L0.319069 6.03094C0.114039 6.24904 -0.000106812 6.53709 -0.000106812 6.83643C-0.000106812 7.13576 0.114039 7.42387 0.319069 7.64197L6.05107 13.342C6.26575 13.554 6.55534 13.6729 6.85707 13.6729C7.15881 13.6729 7.44839 13.554 7.66307 13.342C7.8702 13.1263 7.98932 12.8409 7.99707 12.5419C7.99413 12.2402 7.87442 11.9513 7.66307 11.736L3.89307 7.98096H13.5471C13.8437 7.97217 14.1252 7.84818 14.332 7.63525C14.5387 7.42233 14.6543 7.13722 14.6543 6.84045C14.6543 6.54369 14.5387 6.25858 14.332 6.04565C14.1252 5.83273 13.8437 5.70874 13.5471 5.69995V5.69696Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="clr"></div>
            </div>
            <!-- End Choose Time -->
            @endif
            @if($em_Class==0)
            <div class="upclasses">
                <div>
                    <div class="no-class">
                        <div class="img">
                            <img src="/home/images/noteacher.png" alt="">
                        </div>
                        <h3>هیچ کلاس درسی یافت نشد!</h3>
                        @if(auth()->user()->level=='student')
                        <div class="button">
                            <a href="{{route('home.teacher.list')}}" class="reserv">
                                <span>همین حالا رزرو کن</span>
                                <span class="icon">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.89855 17.5C14.4145 17.5 18.0754 13.9555 18.0754 9.58329C18.0754 5.21104 14.4145 1.66663 9.89855 1.66663C5.38259 1.66663 1.72168 5.21104 1.72168 9.58329C1.72168 13.9555 5.38259 17.5 9.89855 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M18.9363 18.3333L17.2148 16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </li>

    </ul>
</div>
</div>

<!-- Start Upcomming Class -->


{{-- <div class="upclasses">--}}
{{-- <div>--}}

{{-- <?php--}}
{{-- $w=[ 'شنبه','یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه' ];--}}
{{-- $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];--}}

{{-- ?>--}}
{{-- <?php--}}
{{-- $classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15));--}}
{{-- if(request()->get('order')=='tomorrow') {--}}
{{-- $classes->where( function($q){--}}
{{-- $q->where('start', '>',\Carbon\Carbon::now()->addDay()->startOfDay())--}}
{{-- ->where('start', '<',\Carbon\Carbon::now()->addDay()->endOfDay());--}}
{{-- });--}}
{{-- }--}}
{{-- if(request()->get('order')=='today') {--}}
{{-- $classes->where( function($q){--}}
{{-- $q->where('start', '>',\Carbon\Carbon::now()->startOfDay())--}}
{{-- ->where('start', '<',\Carbon\Carbon::now()->endOfDay());--}}
{{-- });--}}
{{-- }--}}
{{-- if(request()->get('passed')=='passed') {--}}
{{-- $classes->WhereIn('status',['down','passed']);--}}
{{-- }--}}
{{-- if(request()->get('order')=='dtomorrow') {--}}
{{-- $classes->where( function($q){--}}
{{-- $q->where('start', '>',\Carbon\Carbon::now()->addDays(2)->startOfDay())--}}
{{-- ->where('start', '<',\Carbon\Carbon::now()->addDays(2)->endOfDay());--}}
{{-- });--}}
{{-- }--}}

{{--// $classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0');--}}
{{--// if(request()->get('status')=='reserved') {--}}
{{--// $classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now());--}}
{{--// }--}}
{{-- if(request()->get('order')=='down') {--}}
{{-- $classes->where('status' ,'down' );--}}
{{-- }--}}
{{-- if(request()->get('order')=='canceled') {--}}
{{-- $classes->where('status' ,'canceled' ) ;--}}
{{-- }--}}

{{-- $classes=$classes->orderBy('start','asc')->paginate(5);--}}
{{-- ?>--}}
{{-- @foreach($classes as $class)--}}
{{-- @php($v=verta($class->start))--}}
{{-- @php($teacher=\App\Models\User::find($class->user_id))--}}
{{-- <?php--}}
{{-- $min="$v->minute";--}}
{{-- if ($v->minute==0){--}}
{{-- $min='00';--}}

{{-- }--}}

{{-- ?>--}}
{{-- @php($v=verta($class->start))--}}

{{-- <div class="single-cupclass">--}}
{{-- <div>--}}

{{-- <div class="right">--}}
{{-- <div class="profile">--}}
{{-- <div class="avatar">--}}
{{-- <div class="img" style="background: url('{{asset('/src/avatar/'.$class->user->attr('avatar'))}} ');"></div>--}}
{{-- </div>--}}
{{-- <h4 class="name">{{$class->user->name}} </h4>--}}
{{-- <ul>--}}
{{-- <li>--}}
{{-- <span class="icon">--}}
{{-- <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <path d="M9.33301 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path d="M4.66699 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M11.958 5.30249H2.04134" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path d="M1.75 4.95841V9.91675C1.75 11.6667 2.625 12.8334 4.66667 12.8334H9.33333C11.375 12.8334 12.25 11.6667 12.25 9.91675V4.95841C12.25 3.20841 11.375 2.04175 9.33333 2.04175H4.66667C2.625 2.04175 1.75 3.20841 1.75 4.95841Z" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M4.84435 7.99162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M4.84435 9.74162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M7.00255 7.99162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M7.00255 9.74162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M9.16173 7.99162H9.15649" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M9.16113 9.7417H9.15589" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- <span class="text">--}}
{{-- {{$w[$v->dayOfWeek]}}--}}
{{-- {{($v->day)}}--}}
{{-- {{($m[$v->month-1])}}--}}

{{-- </span>--}}
{{-- </li>--}}
{{-- <li>--}}
{{-- <span class="icon">--}}
{{-- <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <path d="M12.8337 7.00008C12.8337 10.2201 10.2203 12.8334 7.00033 12.8334C3.78033 12.8334 1.16699 10.2201 1.16699 7.00008C1.16699 3.78008 3.78033 1.16675 7.00033 1.16675C10.2203 1.16675 12.8337 3.78008 12.8337 7.00008Z" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M9.16418 8.85503L7.35585 7.77586C7.04085 7.58919 6.78418 7.14003 6.78418 6.77253V4.38086" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- <span class="text">--}}
{{-- ﺳﺎﻋﺖ:--}}
{{-- {{\Carbon\Carbon::parse($class->start)->format('H:i:s')}}--}}

{{-- ---}}
{{-- @if(isset($class->bill->count) && $class->bill->count==0)--}}
{{-- {{\Carbon\Carbon::parse($class->start)->addMinutes(30)->format('H:i:s')}}--}}
{{-- @else--}}
{{-- {{\Carbon\Carbon::parse($class->start)->addMinutes(60)->format('H:i:s')}}--}}

{{-- @endif--}}

{{-- </span>--}}
{{-- </li>--}}
{{-- </ul>--}}
{{-- </div>--}}

{{-- <div class="timer">--}}
{{-- <h4>زمان باقی مانده :</h4>--}}
{{-- <div class="countdown" id="countdown_{{$class->id}}" data-time="{{$class->start}}"></div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="left">--}}
{{-- <div class="info">--}}
{{-- <ul>--}}
{{-- <li>--}}
{{-- <span class="title">--}}
{{-- @if(isset($class->bill->count) && $class->bill->count==0)--}}
{{-- آزمایشی--}}
{{-- @else--}}
{{-- خصوصی--}}
{{-- @endif--}}

{{-- </span>--}}
{{-- <span class="icon">--}}
{{-- <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <path d="M18.3337 13.9501V3.89174C18.3337 2.89174 17.517 2.15008 16.5253 2.23341H16.4753C14.7253 2.38341 12.067 3.27508 10.5837 4.20841L10.442 4.30008C10.2003 4.45008 9.80033 4.45008 9.55866 4.30008L9.35033 4.17508C7.86699 3.25008 5.21699 2.36674 3.46699 2.22508C2.47533 2.14174 1.66699 2.89174 1.66699 3.88341V13.9501C1.66699 14.7501 2.31699 15.5001 3.11699 15.6001L3.35866 15.6334C5.16699 15.8751 7.95866 16.7917 9.55866 17.6667L9.59199 17.6834C9.81699 17.8084 10.1753 17.8084 10.392 17.6834C11.992 16.8001 14.792 15.8751 16.6087 15.6334L16.8837 15.6001C17.6837 15.5001 18.3337 14.7501 18.3337 13.9501Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M10 4.57495V17.075" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M6.45801 7.07495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M7.08301 9.57495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- </li>--}}
{{-- <li>--}}
{{-- <span class="title">--}}
{{-- @if(isset($class->bill->count) && $class->bill->count==0)--}}
{{-- 30--}}
{{-- @else--}}
{{-- 60--}}
{{-- @endif--}}
{{-- دقیقه</span>--}}
{{-- <span class="icon">--}}
{{-- <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <path d="M17.2913 11.0417C17.2913 15.0667 14.0247 18.3333 9.99967 18.3333C5.97467 18.3333 2.70801 15.0667 2.70801 11.0417C2.70801 7.01667 5.97467 3.75 9.99967 3.75C14.0247 3.75 17.2913 7.01667 17.2913 11.0417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M10 6.66675V10.8334" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path opacity="0.4" d="M7.5 1.66675H12.5" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- </li>--}}
{{-- </ul>--}}
{{-- </div>--}}
{{-- <div class="buttons">--}}
{{-- <div class="options">--}}
{{-- <div class="top www">گزینه ها</div>--}}
{{-- <div class="drop">--}}
{{-- @if(  $class->model !='free')--}}
{{-- <div class="drop-container" {{(\Illuminate\Support\Carbon::now()->gt(\Carbon\Carbon::parse($class->start)))?'hidden':''}}>--}}
{{-- <ul>--}}
{{-- @if(  $class->type !='free')--}}
{{-- <li data-id="{{$class->id}}" data-count="{{$class->bill->count}}" data-img="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" data-name="{{$teacher->name}}"--}}
{{-- data-date="--}}
{{-- {{$w[$v->dayOfWeek]}}--}}
{{-- {{($v->day)}}--}}
{{-- {{($m[$v->month-1])}}--}}
{{-- {{($v->hour.':'.$min)}}--}}
{{-- " class="change_class">--}}
{{-- <a   class="text option pointer">--}}
{{-- <span class="icon">--}}
{{-- <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <path d="M11.0504 3.00002L4.20878 10.2417C3.95045 10.5167 3.70045 11.0584 3.65045 11.4334L3.34211 14.1333C3.23378 15.1083 3.93378 15.775 4.90045 15.6084L7.58378 15.15C7.95878 15.0834 8.48378 14.8084 8.74211 14.525L15.5838 7.28335C16.7671 6.03335 17.3004 4.60835 15.4588 2.86668C13.6254 1.14168 12.2338 1.75002 11.0504 3.00002Z" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{-- <path opacity="0.4" d="M9.9082 4.20825C10.2665 6.50825 12.1332 8.26658 14.4499 8.49992" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{-- <path opacity="0.4" d="M2.5 18.3333H17.5" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- <span>  ویرایش کلاس</span>--}}
{{-- </a>--}}
{{-- </li>--}}
{{-- @endif--}}

{{-- <li data-id="{{$class->id}}" data-count="{{$class->bill->count}}" data-img="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" data-name="{{$teacher->name}}"--}}
{{-- data-date="--}}
{{-- {{$w[$v->dayOfWeek]}}--}}
{{-- {{($v->day)}}--}}
{{-- {{($m[$v->month-1])}}--}}
{{-- {{($v->hour.':'.$min)}}--}}
{{-- " class="cancel_class">--}}
{{-- <a  class="option pointer ">--}}
{{-- <span class="icon">--}}
{{-- <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <g opacity="0.4">--}}
{{-- <path d="M7.6416 12.3583L12.3583 7.6416" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- <path d="M12.3583 12.3583L7.6416 7.6416" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- </g>--}}
{{-- <path d="M7.50033 18.3334H12.5003C16.667 18.3334 18.3337 16.6667 18.3337 12.5001V7.50008C18.3337 3.33341 16.667 1.66675 12.5003 1.66675H7.50033C3.33366 1.66675 1.66699 3.33341 1.66699 7.50008V12.5001C1.66699 16.6667 3.33366 18.3334 7.50033 18.3334Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- <span class="text">لغو کلاس</span>--}}
{{-- </a>--}}
{{-- </li>--}}

{{-- </ul>--}}

{{-- </div>--}}
{{-- @endif--}}

{{-- </div>--}}
{{-- </div>--}}



{{-- <div class="enter-class">--}}
{{-- <a target="_blank" class="enter-class-bt" href="{{route('home.go.class',[$class->id])}}">--}}
{{-- ورود به کلاس--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- @endforeach--}}


{{-- {{$classes->appends(request()->all())->links('home.section.pagination')}}--}}


{{-- @if($classes->count()==0)--}}
{{-- <div class="upclasses">--}}
{{-- <div>--}}
{{-- <div class="no-class">--}}
{{-- <div class="img">--}}
{{-- <img src="/home/images/noteacher.png" alt="">--}}
{{-- </div>--}}
{{-- <h3>هیچ کلاس درسی یافت نشد!</h3>--}}
{{-- <div class="button">--}}
{{-- <a href="{{route('home.teacher.list')}}" class="reserv">--}}
{{-- <span>همین حالا رزرو کن</span>--}}
{{-- <span class="icon">--}}
{{-- <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <path d="M9.89855 17.5C14.4145 17.5 18.0754 13.9555 18.0754 9.58329C18.0754 5.21104 14.4145 1.66663 9.89855 1.66663C5.38259 1.66663 1.72168 5.21104 1.72168 9.58329C1.72168 13.9555 5.38259 17.5 9.89855 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{-- <path opacity="0.4" d="M18.9363 18.3333L17.2148 16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- @endif--}}
{{-- </div>--}}
{{-- </div>--}}
<!-- End Upcomming Class -->
<div class="dash-stat">
    <div class="row">
        <div class="col-lg-12">
            <div>
                <h1>
                    گزارشات
                </h1>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-2a col-md-6 col-sm-12">
            <div>
                <div class="single-dash-stat">
                    <span class="icon">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="36" height="36" rx="11" fill="#E0DEFF"></rect>
                            <path d="M26.5 22V24.5C26.5 26.43 24.93 28 23 28H13C11.07 28 9.5 26.43 9.5 24.5V23.85C9.5 22.28 10.78 21 12.35 21H25.5C26.05 21 26.5 21.45 26.5 22Z" fill="#786DFF"></path>
                            <path opacity="0.8" d="M21.5 8H14.5C10.5 8 9.5 9 9.5 13V20.58C10.26 19.91 11.26 19.5 12.35 19.5H25.5C26.05 19.5 26.5 19.05 26.5 18.5V13C26.5 9 25.5 8 21.5 8ZM19 16.75H14C13.59 16.75 13.25 16.41 13.25 16C13.25 15.59 13.59 15.25 14 15.25H19C19.41 15.25 19.75 15.59 19.75 16C19.75 16.41 19.41 16.75 19 16.75ZM22 13.25H14C13.59 13.25 13.25 12.91 13.25 12.5C13.25 12.09 13.59 11.75 14 11.75H22C22.41 11.75 22.75 12.09 22.75 12.5C22.75 12.91 22.41 13.25 22 13.25Z" fill="#786DFF"></path>
                        </svg>
                    </span>
                    <div class="left">
                        <span class="top"> کلاس‌های شرکت کرده</span>
                        <span class="bot">{{auth()->user()->smeets()->whereIn('status',['passed','down'])->count()/2}} کلاس</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2a col-md-6 col-sm-12">
            <div>
                <div class="single-dash-stat">
                    <span class="icon">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="36" height="36" rx="11" fill="#FFF2B7"></rect>
                            <path d="M22.19 8H13.81C10.17 8 8 10.17 8 13.81V22.19C8 25 9.29 26.93 11.56 27.66C12.22 27.89 12.98 28 13.81 28H22.19C23.02 28 23.78 27.89 24.44 27.66C26.71 26.93 28 25 28 22.19V13.81C28 10.17 25.83 8 22.19 8ZM26.5 22.19C26.5 24.33 25.66 25.68 23.97 26.24C23 24.33 20.7 22.97 18 22.97C15.3 22.97 13.01 24.32 12.03 26.24H12.02C10.35 25.7 9.5 24.34 9.5 22.2V13.81C9.5 10.99 10.99 9.5 13.81 9.5H22.19C25.01 9.5 26.5 10.99 26.5 13.81V22.19Z" fill="#FFCD04"></path>
                            <path opacity="0.5" d="M17.9999 14C16.0199 14 14.4199 15.6 14.4199 17.58C14.4199 19.56 16.0199 21.17 17.9999 21.17C19.9799 21.17 21.5799 19.56 21.5799 17.58C21.5799 15.6 19.9799 14 17.9999 14Z" fill="#FFCD04"></path>
                        </svg>
                    </span>
                    <div class="left">
                        <span class="top">استادهای من</span>
                        <span class="bot">{{auth()->user()->teachers()}} استاد</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2a col-md-4 col-sm-12">
            <div>
                <div class="single-dash-stat">
                    <span class="icon">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="36" height="36" rx="11" fill="#C3F0D5"></rect>
                            <path opacity="0.5" d="M22.7502 9.56V8C22.7502 7.59 22.4102 7.25 22.0002 7.25C21.5902 7.25 21.2502 7.59 21.2502 8V9.5H14.7502V8C14.7502 7.59 14.4102 7.25 14.0002 7.25C13.5902 7.25 13.2502 7.59 13.2502 8V9.56C10.5502 9.81 9.24023 11.42 9.04023 13.81C9.02023 14.1 9.26023 14.34 9.54023 14.34H26.4602C26.7502 14.34 26.9902 14.09 26.9602 13.81C26.7602 11.42 25.4502 9.81 22.7502 9.56Z" fill="#57BA7E"></path>
                            <path d="M26 15.8401H10C9.45 15.8401 9 16.2901 9 16.8401V23.0001C9 26.0001 10.5 28.0001 14 28.0001H22C25.5 28.0001 27 26.0001 27 23.0001V16.8401C27 16.2901 26.55 15.8401 26 15.8401ZM15.21 24.2101C15.11 24.3001 15 24.3701 14.88 24.4201C14.76 24.4701 14.63 24.5001 14.5 24.5001C14.37 24.5001 14.24 24.4701 14.12 24.4201C14 24.3701 13.89 24.3001 13.79 24.2101C13.61 24.0201 13.5 23.7601 13.5 23.5001C13.5 23.2401 13.61 22.9801 13.79 22.7901C13.89 22.7001 14 22.6301 14.12 22.5801C14.36 22.4801 14.64 22.4801 14.88 22.5801C15 22.6301 15.11 22.7001 15.21 22.7901C15.39 22.9801 15.5 23.2401 15.5 23.5001C15.5 23.7601 15.39 24.0201 15.21 24.2101ZM15.42 20.3801C15.37 20.5001 15.3 20.6101 15.21 20.7101C15.11 20.8001 15 20.8701 14.88 20.9201C14.76 20.9701 14.63 21.0001 14.5 21.0001C14.37 21.0001 14.24 20.9701 14.12 20.9201C14 20.8701 13.89 20.8001 13.79 20.7101C13.7 20.6101 13.63 20.5001 13.58 20.3801C13.53 20.2601 13.5 20.1301 13.5 20.0001C13.5 19.8701 13.53 19.7401 13.58 19.6201C13.63 19.5001 13.7 19.3901 13.79 19.2901C13.89 19.2001 14 19.1301 14.12 19.0801C14.36 18.9801 14.64 18.9801 14.88 19.0801C15 19.1301 15.11 19.2001 15.21 19.2901C15.3 19.3901 15.37 19.5001 15.42 19.6201C15.47 19.7401 15.5 19.8701 15.5 20.0001C15.5 20.1301 15.47 20.2601 15.42 20.3801ZM18.71 20.7101C18.61 20.8001 18.5 20.8701 18.38 20.9201C18.26 20.9701 18.13 21.0001 18 21.0001C17.87 21.0001 17.74 20.9701 17.62 20.9201C17.5 20.8701 17.39 20.8001 17.29 20.7101C17.11 20.5201 17 20.2601 17 20.0001C17 19.7401 17.11 19.4801 17.29 19.2901C17.39 19.2001 17.5 19.1301 17.62 19.0801C17.86 18.9701 18.14 18.9701 18.38 19.0801C18.5 19.1301 18.61 19.2001 18.71 19.2901C18.89 19.4801 19 19.7401 19 20.0001C19 20.2601 18.89 20.5201 18.71 20.7101Z" fill="#57BA7E"></path>
                        </svg>
                    </span>
                    <div class="left">
                        <span class="top">کلاس های پیش رو :</span>
                        <span class="bot">
                            {{auth()->user()->smeets()->where('start','>',\Carbon\Carbon::now())->count()/2}}
                            کلاس</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2a col-md-4 col-sm-12">
            <div>
                <div class="single-dash-stat">
                    <span class="icon">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="36" height="36" rx="11" fill="#BDD6FF"></rect>
                            <path d="M20.8896 9.45H15.1096C14.7096 9.45 14.3896 9.13 14.3896 8.73C14.3896 8.33 14.7096 8 15.1096 8H20.8896C21.2896 8 21.6096 8.32 21.6096 8.72C21.6096 9.12 21.2896 9.45 20.8896 9.45Z" fill="#508FF4"></path>
                            <path opacity="0.5" d="M25.97 21H23.03C21.76 21 21 21.76 21 23.03V25.97C21 27.24 21.76 28 23.03 28H25.97C27.24 28 28 27.24 28 25.97V23.03C28 21.76 27.24 21 25.97 21ZM25.69 25.46L24.51 26.14C24.27 26.28 24.03 26.35 23.81 26.35C23.64 26.35 23.49 26.31 23.35 26.23C23.03 26.04 22.85 25.67 22.85 25.18V23.82C22.85 23.33 23.03 22.96 23.35 22.77C23.67 22.58 24.08 22.62 24.51 22.86L25.69 23.54C26.11 23.79 26.35 24.13 26.35 24.5C26.35 24.87 26.12 25.21 25.69 25.46Z" fill="#508FF4"></path>
                            <path d="M20.0001 25.9699V23.0299C20.0001 21.2199 21.2201 19.9999 23.0301 19.9999H25.9701C26.2001 19.9999 26.4201 20.0199 26.6301 20.0599C26.6501 19.8199 26.6701 19.5799 26.6701 19.3299C26.6701 14.5399 22.7801 10.6499 18.0001 10.6499C13.2201 10.6499 9.33008 14.5399 9.33008 19.3299C9.33008 24.1099 13.2201 27.9999 18.0001 27.9999C18.8501 27.9999 19.6601 27.8599 20.4401 27.6399C20.1601 27.1699 20.0001 26.6099 20.0001 25.9699ZM18.7501 18.9999C18.7501 19.4099 18.4101 19.7499 18.0001 19.7499C17.5901 19.7499 17.2501 19.4099 17.2501 18.9999V13.9999C17.2501 13.5899 17.5901 13.2499 18.0001 13.2499C18.4101 13.2499 18.7501 13.5899 18.7501 13.9999V18.9999Z" fill="#508FF4"></path>
                        </svg>
                    </span>
                    <div class="left">
                        <span class="top"> کلاس های ویرایش شده</span>
                        <span class="bot">
                            {{auth()->user()->emeets()->count()}}
                            کلاس</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2a col-md-4 col-sm-12">
            <div>
                <div class="single-dash-stat">
                    <span class="icon">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="36" height="36" rx="11" fill="#FFCCCC"></rect>
                            <path d="M22.7502 9.56V8C22.7502 7.59 22.4102 7.25 22.0002 7.25C21.5902 7.25 21.2502 7.59 21.2502 8V9.5H14.7502V8C14.7502 7.59 14.4102 7.25 14.0002 7.25C13.5902 7.25 13.2502 7.59 13.2502 8V9.56C10.5502 9.81 9.24023 11.42 9.04023 13.81C9.02023 14.1 9.26023 14.34 9.54023 14.34H26.4602C26.7502 14.34 26.9902 14.09 26.9602 13.81C26.7602 11.42 25.4502 9.81 22.7502 9.56Z" fill="#FD797A"></path>
                            <path d="M26 15.8401H10C9.45 15.8401 9 16.2901 9 16.8401V23.0001C9 26.0001 10.5 28.0001 14 28.0001H18.93C19.62 28.0001 20.1 27.3301 19.88 26.6801C19.68 26.1001 19.51 25.4601 19.51 25.0001C19.51 21.9701 21.98 19.5001 25.01 19.5001C25.3 19.5001 25.59 19.5201 25.87 19.5701C26.47 19.6601 27.01 19.1901 27.01 18.5901V16.8501C27 16.2901 26.55 15.8401 26 15.8401ZM15.21 23.7101C15.02 23.8901 14.76 24.0001 14.5 24.0001C14.37 24.0001 14.24 23.9701 14.12 23.9201C14 23.8701 13.89 23.8001 13.79 23.7101C13.61 23.5201 13.5 23.2701 13.5 23.0001C13.5 22.8701 13.53 22.7401 13.58 22.6201C13.63 22.4901 13.7 22.3901 13.79 22.2901C13.89 22.2001 14 22.1301 14.12 22.0801C14.48 21.9201 14.93 22.0101 15.21 22.2901C15.3 22.3901 15.37 22.4901 15.42 22.6201C15.47 22.7401 15.5 22.8701 15.5 23.0001C15.5 23.2701 15.39 23.5201 15.21 23.7101ZM15.21 20.2101C15.02 20.3901 14.76 20.5001 14.5 20.5001C14.37 20.5001 14.24 20.4801 14.12 20.4201C14 20.3701 13.89 20.3001 13.79 20.2101C13.61 20.0201 13.5 19.7601 13.5 19.5001C13.5 19.3701 13.53 19.2401 13.58 19.1201C13.63 19.0001 13.7 18.8901 13.79 18.7901C13.89 18.7001 14 18.6301 14.12 18.5801C14.48 18.4301 14.93 18.5101 15.21 18.7901C15.3 18.8901 15.37 19.0001 15.42 19.1201C15.47 19.2401 15.5 19.3701 15.5 19.5001C15.5 19.7601 15.39 20.0201 15.21 20.2101ZM18.92 19.8801C18.87 20.0001 18.8 20.1101 18.71 20.2101C18.61 20.3001 18.5 20.3701 18.38 20.4201C18.26 20.4801 18.13 20.5001 18 20.5001C17.74 20.5001 17.48 20.3901 17.29 20.2101C17.2 20.1101 17.13 20.0001 17.08 19.8801C17.03 19.7601 17 19.6301 17 19.5001C17 19.2401 17.11 18.9801 17.29 18.7901C17.57 18.5101 18.01 18.4201 18.38 18.5801C18.5 18.6301 18.61 18.7001 18.71 18.7901C18.89 18.9801 19 19.2401 19 19.5001C19 19.6301 18.98 19.7601 18.92 19.8801Z" fill="#FD797A"></path>
                            <path opacity="0.5" d="M25 21C22.79 21 21 22.79 21 25C21 27.21 22.79 29 25 29C27.21 29 29 27.21 29 25C29 22.79 27.21 21 25 21ZM26.6 26.64C26.45 26.79 26.26 26.86 26.07 26.86C25.88 26.86 25.69 26.79 25.54 26.64L25.01 26.11L24.46 26.66C24.31 26.81 24.12 26.88 23.93 26.88C23.74 26.88 23.55 26.81 23.4 26.66C23.11 26.37 23.11 25.89 23.4 25.6L23.95 25.05L23.42 24.52C23.13 24.23 23.13 23.75 23.42 23.46C23.71 23.17 24.19 23.17 24.48 23.46L25.01 24L25.51 23.5C25.8 23.21 26.28 23.21 26.57 23.5C26.86 23.79 26.86 24.27 26.57 24.56L26.07 25.06L26.6 25.59C26.89 25.88 26.89 26.35 26.6 26.64Z" fill="#FD797A"></path>
                        </svg>
                    </span>
                    <div class="left">
                        <span class="top">تعداد کلاس های لغو شده</span>
                        <span class="bot">
                            {{auth()->user()->cmeets()->count()/2}}
                            کلاس</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="call-to-actions">
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <div>
                <div class="add-wallet">
                    <div>
                        <div class="right">
                            <div class="img">
                                <img src="/home/images/wallet.png" alt="">
                            </div>
                            <div class="info">
                                <h4>موجودی کیف پول</h4>
                                <p><span class="num">{{number_format(auth()->user()->cash)}}</span> <span class="tom">تومان</span></p>
                            </div>
                        </div>
                        <div class="left">
                            <span class="more pointer" id="wallet">
                                <span class="text" id="">افرایش موجودی</span>
                                <span class="icon">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5H9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5 9V1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12">
            <div>
                <div class="golden-chance">
                    <div>
                        <div class="right">
                            <div class="img">
                                <img src="/home/images/hero.png" alt="">
                            </div>
                            <div class="info">
                                <h4>این یک فرصت #طلایی است</h4>
                                <p>از ۱۲ مه تا ۱۲ ژوئن با ۲۰ درصد تخفیف در ثبت نام کلاس های آنلاین زبان تخفیف دریافت کنید.</p>
                            </div>
                        </div>
                        <div class="left">
                            <a href="#" class="more">
                                <span class="text">جزئیات بیشتر</span>
                                <span class="icon">
                                    <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.71502 4.93595L6.36502 8.12296C6.44283 8.18654 6.50554 8.26663 6.5486 8.35743C6.59166 8.44823 6.614 8.54746 6.614 8.64795C6.614 8.74845 6.59166 8.84768 6.5486 8.93848C6.50554 9.02928 6.44283 9.10937 6.36502 9.17296C6.19652 9.31318 5.98423 9.38995 5.76502 9.38995C5.54581 9.38995 5.33352 9.31318 5.16502 9.17296L0.914018 5.46096C0.836204 5.39737 0.773499 5.31728 0.730438 5.22648C0.687378 5.13568 0.665039 5.03645 0.665039 4.93596C0.665039 4.83546 0.687378 4.73623 0.730438 4.64543C0.773499 4.55463 0.836204 4.47454 0.914018 4.41095L5.16502 0.697955C5.33352 0.557734 5.54581 0.480957 5.76502 0.480957C5.98423 0.480957 6.19652 0.557734 6.36502 0.697955C6.44283 0.761543 6.50554 0.841633 6.5486 0.932431C6.59166 1.02323 6.614 1.12246 6.614 1.22295C6.614 1.32345 6.59166 1.42268 6.5486 1.51348C6.50554 1.60428 6.44283 1.68437 6.36502 1.74795L2.71502 4.93595Z" fill="white"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clr"></div>

<div class="dash-guide">

    <h3 class="dash-title">
        راهنمای دانشجویان
    </h3>

    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div>
                <div class="single-guide">
                    <div>
                        <div class="right">
                            <div class="img">
                                <img src="/home/images/video1.png" alt="">
                            </div>
                            <div class="info">
                                <h4>ویدئو نحوه کار با محیط کلاس</h4>
                                <p>برای مشاهده آموزش کلیک کنید</p>
                            </div>
                        </div>
                        <div class="left">
                            <a class="more" id="classtut">
                                <span class="text">جزئیات بیشتر</span>
                                <span class="icon">
                                    <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.71502 4.93595L6.36502 8.12296C6.44283 8.18654 6.50554 8.26663 6.5486 8.35743C6.59166 8.44823 6.614 8.54746 6.614 8.64795C6.614 8.74845 6.59166 8.84768 6.5486 8.93848C6.50554 9.02928 6.44283 9.10937 6.36502 9.17296C6.19652 9.31318 5.98423 9.38995 5.76502 9.38995C5.54581 9.38995 5.33352 9.31318 5.16502 9.17296L0.914018 5.46096C0.836204 5.39737 0.773499 5.31728 0.730438 5.22648C0.687378 5.13568 0.665039 5.03645 0.665039 4.93596C0.665039 4.83546 0.687378 4.73623 0.730438 4.64543C0.773499 4.55463 0.836204 4.47454 0.914018 4.41095L5.16502 0.697955C5.33352 0.557734 5.54581 0.480957 5.76502 0.480957C5.98423 0.480957 6.19652 0.557734 6.36502 0.697955C6.44283 0.761543 6.50554 0.841633 6.5486 0.932431C6.59166 1.02323 6.614 1.12246 6.614 1.22295C6.614 1.32345 6.59166 1.42268 6.5486 1.51348C6.50554 1.60428 6.44283 1.68437 6.36502 1.74795L2.71502 4.93595Z" fill="white"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div>
                <div class="single-guide">
                    <div>
                        <div class="right">
                            <div class="img">
                                <img src="/home/images/video2.png" alt="">
                            </div>
                            <div class="info">
                                <h4>کانال اطلاع رسانی دانشجویان</h4>
                                <p>اخبار، اطلاع رسانی وارائه تخفیف هفتگی</p>
                            </div>
                        </div>
                        <div class="left">
                            <a href="https://t.me/teacher1org" class="more">
                                <span class="text">جزئیات بیشتر</span>
                                <span class="icon">
                                    <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.71502 4.93595L6.36502 8.12296C6.44283 8.18654 6.50554 8.26663 6.5486 8.35743C6.59166 8.44823 6.614 8.54746 6.614 8.64795C6.614 8.74845 6.59166 8.84768 6.5486 8.93848C6.50554 9.02928 6.44283 9.10937 6.36502 9.17296C6.19652 9.31318 5.98423 9.38995 5.76502 9.38995C5.54581 9.38995 5.33352 9.31318 5.16502 9.17296L0.914018 5.46096C0.836204 5.39737 0.773499 5.31728 0.730438 5.22648C0.687378 5.13568 0.665039 5.03645 0.665039 4.93596C0.665039 4.83546 0.687378 4.73623 0.730438 4.64543C0.773499 4.55463 0.836204 4.47454 0.914018 4.41095L5.16502 0.697955C5.33352 0.557734 5.54581 0.480957 5.76502 0.480957C5.98423 0.480957 6.19652 0.557734 6.36502 0.697955C6.44283 0.761543 6.50554 0.841633 6.5486 0.932431C6.59166 1.02323 6.614 1.12246 6.614 1.22295C6.614 1.32345 6.59166 1.42268 6.5486 1.51348C6.50554 1.60428 6.44283 1.68437 6.36502 1.74795L2.71502 4.93595Z" fill="white"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fave-teachers">
    <h3 class="dash-title">
        محبوب‌ترین استادها
    </h3>

    <div class="row">
        @foreach(\App\Models\User::where('level','teacher')->whereActive('1')->whereSubmit('1')->whereHas('attributes',function ($query){
        $query->where('name','experienced')
        ->where('value','experienced');
        })->get() as $te)
        @php( $languages=$te->languages()->withPivot('level','status')->pluck('name')->toArray())

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div>

                <div class="single-fav-teacher">
                    <div class="profile">
                        <div class="avatar">
                            <div class="img" style="background: url('{{asset('/src/avatar/'.$te->attr('avatar'))}}');"></div>
                        </div>
                        <h4 class="name"> {{$te->name}}</h4>
                        {{-- <span class="expert">    و تقویت مکالمه</span>--}}
                        <div class="lang">
                            <span>مدرس زبان
                                {{implode(' , ',$languages)}}
                            </span>

                            <span class="flag">
                                <img src="{{asset('/src/img/lang/'.$te->languages()->first()->img)}}" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="stat">
                        <ul>
                            <li>
                                <span class="num">{{$te->count_student(0)}}</span>
                                <span class="title">زبان آموز</span>
                            </li>
                            <li>
                                <span class="num">{{$te->down_class()}}</span>
                                <span class="title">کلاس برگزارشده</span>
                            </li>
                            <li>
                                <span class="num">{{$te->articles()->count()}}</span>
                                <span class="title">مقاله</span>
                            </li>
                        </ul>
                    </div>
                    <div class="button">
                        <a href="{{route('home.teacher.profile',$te->id)}}" class="see-profile">
                            <span>مشاهده پروفایل</span>
                            <span class="icon">
                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5471 5.69696H3.89307L7.66307 1.95697C7.87503 1.73943 7.99365 1.44771 7.99365 1.14398C7.99365 0.84025 7.87503 0.548478 7.66307 0.330933C7.44839 0.118902 7.15881 0 6.85707 0C6.55534 0 6.26575 0.118902 6.05107 0.330933L0.319069 6.03094C0.114039 6.24904 -0.000106812 6.53709 -0.000106812 6.83643C-0.000106812 7.13576 0.114039 7.42387 0.319069 7.64197L6.05107 13.342C6.26575 13.554 6.55534 13.6729 6.85707 13.6729C7.15881 13.6729 7.44839 13.554 7.66307 13.342C7.8702 13.1263 7.98932 12.8409 7.99707 12.5419C7.99413 12.2402 7.87442 11.9513 7.66307 11.736L3.89307 7.98096H13.5471C13.8437 7.97217 14.1252 7.84818 14.332 7.63525C14.5387 7.42233 14.6543 7.13722 14.6543 6.84045C14.6543 6.54369 14.5387 6.25858 14.332 6.04565C14.1252 5.83273 13.8437 5.70874 13.5471 5.69995V5.69696Z" fill="white"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>



<div class="popup popupc" id="classtut_pop">
    <div>
        <div>
            <div>
                <div class="popup-container user-set-pop">
                    <span class="close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor" />
                        </svg>
                    </span>

                    <div class="video">
                        <video id="player" class="js-player" playsinline controls data-poster="/path/to/poster.jpg">
                            <source src="/home/images/video.mp4" type="video/mp4" />
                        </video>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup popupc" id="wallet_popup">
    <div>
        <div>
            <div>
                <div class="popup-container add-to-wallet">
                    <span class="close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <div class="pop-title">
                        <h3>افزایش موجودی کیف پول</h3>
                    </div>

                    <form action="{{route('student.charge.wallet',$user->id)}}" class=" " method="post">
                        @csrf
                        @method('post')
                        <label class="tit">مبلغ را وارد کنید</label>
                        <div class="input-container icon">
                            <span>مبلغ مورد نظر را وارد کنید</span>
                            <i class="right-bg">
                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 4.32324H19C19.2652 4.32324 19.5196 4.4286 19.7071 4.61614C19.8946 4.80367 20 5.05803 20 5.32324V17.3232C20 17.5885 19.8946 17.8428 19.7071 18.0303C19.5196 18.2179 19.2652 18.3232 19 18.3232H1C0.734784 18.3232 0.48043 18.2179 0.292893 18.0303C0.105357 17.8428 0 17.5885 0 17.3232V1.32324C0 1.05803 0.105357 0.803672 0.292893 0.616135C0.48043 0.428599 0.734784 0.323242 1 0.323242H16V4.32324ZM2 6.32324V16.3232H18V6.32324H2ZM2 2.32324V4.32324H14V2.32324H2ZM13 10.3232H16V12.3232H13V10.3232Z" fill="#92929D"></path>
                                </svg>
                            </i>
                            <input type="number" id="amount" name="amount">
                            <br>
                            <br>
                            <div style="font-size: 18px; color: #0eb582; font-weight: bold" class="amount"> </div>
                        </div>

                        <label class="tit">و یا یک گزینه را انتخاب کنید</label>

                        <div class="price-group">

                            <ul>
                                <li>
                                    <div class="label-container">
                                        <input type="radio" name="pricech" data-mo="50000" id="p50" value="p50">
                                        <label for="p50"><span class="num">50,000</span> <span class="tom">تومان</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-container">
                                        <input type="radio" name="pricech" data-mo="100000" id="p100" value="p100">
                                        <label for="p100"><span class="num">100,000</span> <span class="tom">تومان</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-container">
                                        <input type="radio" name="pricech" data-mo="200000" id="p200" value="p200">
                                        <label for="p200"><span class="num">200,000</span> <span class="tom">تومان</span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="button">
                            <button class="next">
                                <span class="text">تایید و ادامه</span>
                                <span class="icon">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5451 5.69702H3.89112L7.66112 1.95703C7.87308 1.73949 7.9917 1.44778 7.9917 1.14404C7.9917 0.840311 7.87308 0.548539 7.66112 0.330994C7.44644 0.118963 7.15685 6.10352e-05 6.85512 6.10352e-05C6.55338 6.10352e-05 6.2638 0.118963 6.04912 0.330994L0.317116 6.03101C0.112086 6.2491 -0.00205994 6.53715 -0.00205994 6.83649C-0.00205994 7.13582 0.112086 7.42394 0.317116 7.64203L6.04912 13.342C6.2638 13.5541 6.55338 13.6729 6.85512 13.6729C7.15685 13.6729 7.44644 13.5541 7.66112 13.342C7.86825 13.1263 7.98736 12.841 7.99512 12.542C7.99218 12.2402 7.87247 11.9514 7.66112 11.736L3.89112 7.98102H13.5451C13.8418 7.97223 14.1233 7.84824 14.33 7.63531C14.5367 7.42239 14.6523 7.13728 14.6523 6.84052C14.6523 6.54375 14.5367 6.25864 14.33 6.04572C14.1233 5.83279 13.8418 5.7088 13.5451 5.70001V5.69702Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup popupc" id="s_cancel_class_popup">
    <div>
        <div>
            <div>
                <div class="popup-container class-cancel-pop">
                    <span class="close close_popup">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor" />
                        </svg>
                    </span>
                    <div class="pop-title right">
                        <h3> آیا قصد لغو کلاس را دارید؟</h3>
                    </div>
                    <form id="cancel_form" action="{{route('home.cancel.class')}}" method="post">

                        <div class="result">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div>
                                        <div class="teacher">
                                            <div class="avatar">
                                                <div class="img img_avat" style="background: url('images/teacher.png');"></div>
                                            </div>
                                            <div class="left">
                                                <h5 class="s_name">پگاه علیزاده</h5>
                                                <span class="class_type">یک جلسه آزمایشی - رایگان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div>
                                        <div class="times">
                                            <h5>زمان های انتخاب شده :</h5>
                                            <div class="date-box">
                                                <span class="icon">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 16C6.41775 16 4.87103 15.5308 3.55544 14.6518C2.23985 13.7727 1.21447 12.5233 0.608967 11.0615C0.00346633 9.59966 -0.15496 7.99113 0.153721 6.43928C0.462403 4.88743 1.22433 3.46197 2.34315 2.34315C3.46197 1.22433 4.88743 0.462403 6.43928 0.153721C7.99113 -0.15496 9.59966 0.00346622 11.0615 0.608967C12.5233 1.21447 13.7727 2.23985 14.6518 3.55544C15.5308 4.87103 16 6.41775 16 8C16.0001 9.05061 15.7933 10.091 15.3913 11.0616C14.9893 12.0323 14.4 12.9142 13.6571 13.6571C12.9142 14.4 12.0323 14.9893 11.0616 15.3913C10.091 15.7933 9.05061 16.0001 8 16ZM8 6.86928L5.73763 4.60598L4.60506 5.73855L6.86835 8.00093L4.60506 10.2633L5.7367 11.3949L7.99908 9.13165L10.2615 11.3949L11.3931 10.2633L9.1298 8.00093L11.3931 5.73855L10.2624 4.60598L8 6.86928Z" fill="#D3D3D8"></path>
                                                    </svg>

                                                </span>
                                                <span class="val s_date">سه شنبه 16 شهریور 17:00-16:30</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="message">
                            <h5>هشدار :</h5>
                            <p>۲۰ درصد از مبلغ این کلاس باتوجه به نزدیک بودن زمان کلاس در صورت لغو، از کیف پول شما به کیف پول استادتان منتقل خواهد شد</p>
                        </div>

                        <div class="button">
                            <span id="s_cancel_yes" class="back close_popup">
                                بازگشت
                            </span>
                            @csrf
                            @method('post')
                            <input id="can_id" type="text" hidden name="class" value="">
                            <button class="cancel">
                                لغو کلاس
                            </button>


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup popupc" id="reason_change_class_popup">
    <div>
        <div>
            <div>
                <div class="popup-container class-cancel-pop">
                    <span class="close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor" />
                        </svg>
                    </span>
                    <div class="pop-title right">
                        <h3>دلیل لغو کلاس را بنویسید</h3>
                    </div>

                    <form id="form_change" action="{{route('student.change')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="input-container textarea">
                            <input type="text" hidden name="meet" id="meet_change">
                            <textarea name="reason" id="reason" cols="30" rows="10" placeholder="پیام شما برای   استاد نمایش داده خواهد شد."></textarea>
                        </div>

                        <div class="button">
                            <span class="back pointer close_popup">
                                بگذریم
                            </span>
                            <span id="do_change" class="send">
                                ارسال
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="popup popupc" id="change_class_popup">
    <div>
        <div>
            <div>
                <div class="popup-container class-cancel-pop">
                    <span class="close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor" />
                        </svg>
                    </span>
                    <div class="pop-title right">
                        <h3>آیا از تغییر زمان کلاس مطمئن هستید؟</h3>
                    </div>

                    <form id="form_change" action="{{route('student.change')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="result">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div>
                                        <div class="teacher">
                                            <div class="avatar">
                                                <div class="img img_avat" style="background: url('images/teacher.png');"></div>
                                            </div>
                                            <div class="left">
                                                <h5 class="s_name">پگاه علیزاده</h5>
                                                <span class="class_type">یک جلسه آزمایشی - رایگان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div>
                                        <div class="times">
                                            <h5>زمان های انتخاب شده :</h5>
                                            <div class="date-box">
                                                <span class="icon">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 16C6.41775 16 4.87103 15.5308 3.55544 14.6518C2.23985 13.7727 1.21447 12.5233 0.608967 11.0615C0.00346633 9.59966 -0.15496 7.99113 0.153721 6.43928C0.462403 4.88743 1.22433 3.46197 2.34315 2.34315C3.46197 1.22433 4.88743 0.462403 6.43928 0.153721C7.99113 -0.15496 9.59966 0.00346622 11.0615 0.608967C12.5233 1.21447 13.7727 2.23985 14.6518 3.55544C15.5308 4.87103 16 6.41775 16 8C16.0001 9.05061 15.7933 10.091 15.3913 11.0616C14.9893 12.0323 14.4 12.9142 13.6571 13.6571C12.9142 14.4 12.0323 14.9893 11.0616 15.3913C10.091 15.7933 9.05061 16.0001 8 16ZM8 6.86928L5.73763 4.60598L4.60506 5.73855L6.86835 8.00093L4.60506 10.2633L5.7367 11.3949L7.99908 9.13165L10.2615 11.3949L11.3931 10.2633L9.1298 8.00093L11.3931 5.73855L10.2624 4.60598L8 6.86928Z" fill="#D3D3D8"></path>
                                                    </svg>

                                                </span>
                                                <span class="val s_date">سه شنبه 16 شهریور 17:00-16:30</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="message">
                            <h5>هشدار :</h5>
                            <p>اگر بله، ضمن هماهنگی با زمان آموز خود، زمان توافق شده را از روی تقویم فقط در روز جاری انتخاب و تایید نمایید</p>
                        </div>

                        <div class="button">
                            <span class="back pointer close_popup">
                                بازگشت
                            </span>
                            <span class="send pointer" id="change_yes">
                                تغییر زمان
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




@endcomponent
