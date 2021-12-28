@component('home.teacher.content',['title'=>' تنظیمات  '])

        <div id="tdash">

            <div class="tab-nav">
                <ul>

                    <li class="active">
                        <div class="span-container">
                            <span >پیش رو</span>
                        </div>
                    </li>
                    <li>
                        <div class="span-container">
                            <span >  برگزار شده</span>
                        </div>
                    </li>
                    <li>
                        <div class="span-container">
                            <span >    تعیین وضعیت نشده</span>
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
                                    $w=[ 'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
                                    $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
                                    ?>
                                    <?php
                                    $classes=\App\Models\Meet::where('user_id',$user->id)->whereNotNull('student_id')->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15)) ;
                                    $classes=$classes->orderBy('start','asc')->paginate(5);
                                    ?>
                                    @foreach($classes as $class)
                                        @php($v=verta($class->start))
                                        @php($student=\App\Models\User::find($class->student_id))
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
                                                            <div class="img" style="background: url('{{asset('/src/avatar/'.$class->student->attr('avatar'))}} ');"></div>
                                                        </div>
                                                        <h4 class="name">{{$class->student->name}}    </h4>
                                                        <ul>
                                                             <li>
                                        <span class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.33301 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M4.66699 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M11.958 5.30249H2.04134" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M1.75 4.95841V9.91675C1.75 11.6667 2.625 12.8334 4.66667 12.8334H9.33333C11.375 12.8334 12.25 11.6667 12.25 9.91675V4.95841C12.25 3.20841 11.375 2.04175 9.33333 2.04175H4.66667C2.625 2.04175 1.75 3.20841 1.75 4.95841Z" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M4.84435 7.99162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M4.84435 9.74162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M7.00255 7.99162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M7.00255 9.74162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M9.16173 7.99162H9.15649" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M9.16113 9.7417H9.15589" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
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
                                                <path d="M12.8337 7.00008C12.8337 10.2201 10.2203 12.8334 7.00033 12.8334C3.78033 12.8334 1.16699 10.2201 1.16699 7.00008C1.16699 3.78008 3.78033 1.16675 7.00033 1.16675C10.2203 1.16675 12.8337 3.78008 12.8337 7.00008Z" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M9.16418 8.85503L7.35585 7.77586C7.04085 7.58919 6.78418 7.14003 6.78418 6.77253V4.38086" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                                                <span class="text">
                                        ﺳﺎﻋﺖ:
                                         {{\Carbon\Carbon::parse($class->start)->format('H:i:s')}}
                                        -
                                        @if(isset($class->bill) && $class->bill->count==0)
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
                                                        <div class="countdown"  id="countdown_{{$class->start}}" data-time="{{$class->start}}"></div>
                                                    </div>
                                                </div>
                                                <div class="left">
                                                    <div class="info">
                                                        <ul>
                                                            <li>
                                    <span class="title">
                                          @if(isset($class->bill) && $class->bill->count==0)
                                            آزمایشی
                                        @else
                                            خصوصی
                                        @endif

                                    </span>
                                                                <span class="icon">
														<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M18.3337 13.9501V3.89174C18.3337 2.89174 17.517 2.15008 16.5253 2.23341H16.4753C14.7253 2.38341 12.067 3.27508 10.5837 4.20841L10.442 4.30008C10.2003 4.45008 9.80033 4.45008 9.55866 4.30008L9.35033 4.17508C7.86699 3.25008 5.21699 2.36674 3.46699 2.22508C2.47533 2.14174 1.66699 2.89174 1.66699 3.88341V13.9501C1.66699 14.7501 2.31699 15.5001 3.11699 15.6001L3.35866 15.6334C5.16699 15.8751 7.95866 16.7917 9.55866 17.6667L9.59199 17.6834C9.81699 17.8084 10.1753 17.8084 10.392 17.6834C11.992 16.8001 14.792 15.8751 16.6087 15.6334L16.8837 15.6001C17.6837 15.5001 18.3337 14.7501 18.3337 13.9501Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M10 4.57495V17.075" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M6.45801 7.07495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M7.08301 9.57495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</span>
                                                            </li>
                                                            <li>
                                    <span class="title">
                                          @if(isset($class->bill) && $class->bill->count==0)
                                            30
                                        @else
                                            60
                                        @endif
                                        دقیقه</span>
                                                                <span class="icon">
														<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M17.2913 11.0417C17.2913 15.0667 14.0247 18.3333 9.99967 18.3333C5.97467 18.3333 2.70801 15.0667 2.70801 11.0417C2.70801 7.01667 5.97467 3.75 9.99967 3.75C14.0247 3.75 17.2913 7.01667 17.2913 11.0417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M10 6.66675V10.8334" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M7.5 1.66675H12.5" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="buttons">
                                                        <div class="options">
                                                            <div class="top www">گزینه ها</div>
                                                            <div class="drop">
                                                                @if(  $class->model !='free')
                                                                    <div class="drop-container" {{(\Illuminate\Support\Carbon::now()->gt(\Carbon\Carbon::parse($class->start)))?'hidden':''}}>
                                                                        <ul>


                                                                            <li data-id="{{$class->id}}" data-count="{{$class->bill->count}}" data-img="{{asset('/src/avatar/'.$student->attr('avatar'))}}"  data-name="{{$student->name}}"
                                                                                data-date="
                                                 {{$w[$v->dayOfWeek]}}
                                                                                {{($v->day)}}
                                                                                {{($m[$v->month-1])}}
                                                                                {{($v->hour.':'.$min)}}
                                                                                    " class="cancel_class">
                                                                                <a  class="option pointer ">
																	<span class="icon">
																		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<g opacity="0.4">
																			<path d="M7.6416 12.3583L12.3583 7.6416" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																			<path d="M12.3583 12.3583L7.6416 7.6416" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																			</g>
																			<path d="M7.50033 18.3334H12.5003C16.667 18.3334 18.3337 16.6667 18.3337 12.5001V7.50008C18.3337 3.33341 16.667 1.66675 12.5003 1.66675H7.50033C3.33366 1.66675 1.66699 3.33341 1.66699 7.50008V12.5001C1.66699 16.6667 3.33366 18.3334 7.50033 18.3334Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
                            </div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <div class="upclasses">
                                <div>
                                    <?php
                                    $w=[ 'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
                                    $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
                                    ?>
                                    <?php
                                    $classes=\App\Models\Meet::where('user_id',$user->id)->whereNotNull('student_id')->whereNull('pair') ;
                                    $classes->whereIn('status',['down','passed']);
                                    $classes=$classes->orderBy('start','asc')->paginate(5);
                                    ?>
                                    @foreach($classes as $class)
                                        @php($v=verta($class->start))
                                        @php($student=\App\Models\User::find($class->student_id))
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
                                                            <div class="img" style="background: url('{{asset('/src/avatar/'.$class->student->attr('avatar'))}} ');"></div>
                                                        </div>
                                                        <h4 class="name">{{$class->student->name}}    </h4>
                                                        <ul>
                                                            <li>
                                        <span class="icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.33301 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M4.66699 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M11.958 5.30249H2.04134" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M1.75 4.95841V9.91675C1.75 11.6667 2.625 12.8334 4.66667 12.8334H9.33333C11.375 12.8334 12.25 11.6667 12.25 9.91675V4.95841C12.25 3.20841 11.375 2.04175 9.33333 2.04175H4.66667C2.625 2.04175 1.75 3.20841 1.75 4.95841Z" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M4.84435 7.99162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M4.84435 9.74162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M7.00255 7.99162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M7.00255 9.74162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M9.16173 7.99162H9.15649" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M9.16113 9.7417H9.15589" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
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
                                                <path d="M12.8337 7.00008C12.8337 10.2201 10.2203 12.8334 7.00033 12.8334C3.78033 12.8334 1.16699 10.2201 1.16699 7.00008C1.16699 3.78008 3.78033 1.16675 7.00033 1.16675C10.2203 1.16675 12.8337 3.78008 12.8337 7.00008Z" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M9.16418 8.85503L7.35585 7.77586C7.04085 7.58919 6.78418 7.14003 6.78418 6.77253V4.38086" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                                                <span class="text">
                                        ﺳﺎﻋﺖ:
                                         {{\Carbon\Carbon::parse($class->start)->format('H:i:s')}}
                                        -
                                        @if(isset($class->bill) && $class->bill->count==0)
                                                                        {{\Carbon\Carbon::parse($class->start)->addMinutes(30)->format('H:i:s')}}
                                                                    @else
                                                                        {{\Carbon\Carbon::parse($class->start)->addMinutes(60)->format('H:i:s')}}
                                                                    @endif
                                    </span>
                                                            </li>
                                                        </ul>
                                                    </div>

{{--                                                    <div class="timer">--}}
{{--                                                        <h4>زمان باقی مانده :</h4>--}}
{{--                                                        <div class="countdown"  id="countdown_{{$class->start}}" data-time="{{$class->start}}"></div>--}}
{{--                                                    </div>--}}
                                                </div>
                                                <div class="left">
                                                    <div class="info">
                                                        <ul>
                                                            <li>
                                    <span class="title">
                                          @if(isset($class->bill) && $class->bill->count==0)
                                            آزمایشی
                                        @else
                                            خصوصی
                                        @endif

                                    </span>
                                                                <span class="icon">
														<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M18.3337 13.9501V3.89174C18.3337 2.89174 17.517 2.15008 16.5253 2.23341H16.4753C14.7253 2.38341 12.067 3.27508 10.5837 4.20841L10.442 4.30008C10.2003 4.45008 9.80033 4.45008 9.55866 4.30008L9.35033 4.17508C7.86699 3.25008 5.21699 2.36674 3.46699 2.22508C2.47533 2.14174 1.66699 2.89174 1.66699 3.88341V13.9501C1.66699 14.7501 2.31699 15.5001 3.11699 15.6001L3.35866 15.6334C5.16699 15.8751 7.95866 16.7917 9.55866 17.6667L9.59199 17.6834C9.81699 17.8084 10.1753 17.8084 10.392 17.6834C11.992 16.8001 14.792 15.8751 16.6087 15.6334L16.8837 15.6001C17.6837 15.5001 18.3337 14.7501 18.3337 13.9501Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M10 4.57495V17.075" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M6.45801 7.07495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M7.08301 9.57495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</span>
                                                            </li>
                                                            <li>
                                    <span class="title">
                                          @if(isset($class->bill) && $class->bill->count==0)
                                            30
                                        @else
                                            60
                                        @endif
                                        دقیقه</span>
                                                                <span class="icon">
														<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M17.2913 11.0417C17.2913 15.0667 14.0247 18.3333 9.99967 18.3333C5.97467 18.3333 2.70801 15.0667 2.70801 11.0417C2.70801 7.01667 5.97467 3.75 9.99967 3.75C14.0247 3.75 17.2913 7.01667 17.2913 11.0417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M10 6.66675V10.8334" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path opacity="0.4" d="M7.5 1.66675H12.5" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
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
                            </div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <!-- Start Choose Time -->
                            @if($em_Class=\App\Models\Count::where('teacher_id',$user->id)->where('Count','>','0')->count()>0)
                                <div class="choose-time">
                                    <h3 class="dash-title">
                                        انتخاب زمان  برای کلاس های رزرو شده
                                    </h3>
                                    <div class="row">
                                        @foreach(\App\Models\Count::where('teacher_id',$user->id)->where('Count','>','0')->get() as $count)
                                            @php($teacher=\App\Models\User::find($count->teacher_id))
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div>
                                                    <div class="choose-time-single">
                                                        <div class="avatar">
                                                            <div class="img" style="background: url('{{asset('/src/avatar/'.$teacher->attr('avatar'))}}');"></div>
                                                        </div>
                                                        <h4 class="name">   {{$teacher->name}}</h4>
                                                        <span class="remain">
                                                           {{$count->count}}
                                                        زمان رزرو نشده</span>

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
{{--    <div class="upclasses">--}}
{{--        <div>--}}
{{--            <?php--}}
{{--            $w=[ 'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];--}}
{{--            $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];--}}
{{--            ?>--}}
{{--            <?php--}}
{{--            $classes=\App\Models\Meet::where('user_id',$user->id)->whereNotNull('student_id')->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15)) ;--}}

{{--            if(request()->get('order')=='tomorrow') {--}}
{{--                $classes->where( function($q){--}}
{{--                    $q->where('start', '>',\Carbon\Carbon::now()->addDay()->startOfDay())--}}
{{--                        ->where('start', '<',\Carbon\Carbon::now()->addDay()->endOfDay());--}}
{{--                });--}}
{{--            }--}}
{{--            if(request()->get('order')=='today') {--}}
{{--               $classes->where( function($q){--}}
{{--                    $q->where('start', '>',\Carbon\Carbon::now()->startOfDay())--}}
{{--                        ->where('start', '<',\Carbon\Carbon::now()->endOfDay());--}}
{{--                });--}}
{{--            }--}}
{{--            if(request()->get('passed')=='passed') {--}}
{{--                $classes->WhereIn('status',['down','passed']);--}}
{{--            }--}}
{{--            if(request()->get('order')=='dtomorrow') {--}}
{{--                 $classes->where( function($q){--}}
{{--                    $q->where('start', '>',\Carbon\Carbon::now()->addDays(2)->startOfDay())--}}
{{--                        ->where('start', '<',\Carbon\Carbon::now()->addDays(2)->endOfDay());--}}
{{--                });--}}
{{--            }--}}
{{--            if(request()->get('order')=='down') {--}}
{{--                $classes->where('status' ,'down' );--}}
{{--            }--}}
{{--            if(request()->get('order')=='canceled') {--}}
{{--                $classes->where('status' ,'canceled' ) ;--}}
{{--            }--}}
{{--            $classes=$classes->orderBy('start','asc')->paginate(5);--}}
{{--            ?>--}}
{{--            @foreach($classes as $class)--}}
{{--                @php($v=verta($class->start))--}}
{{--                @php($student=\App\Models\User::find($class->student_id))--}}
{{--                <?php--}}
{{--                $min="$v->minute";--}}
{{--                if ($v->minute==0){--}}
{{--                    $min='00';--}}
{{--                }--}}
{{--                ?>--}}
{{--                @php($v=verta($class->start))--}}
{{--                <div class="single-cupclass">--}}
{{--                    <div>--}}

{{--                        <div class="right">--}}
{{--                            <div class="profile">--}}
{{--                                <div class="avatar">--}}
{{--                                    <div class="img" style="background: url('{{asset('/src/avatar/'.$class->student->attr('avatar'))}} ');"></div>--}}
{{--                                </div>--}}
{{--                                <h4 class="name">{{$class->student->name}}    </h4>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <span class="icon">--}}
{{--                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                <path d="M9.33301 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path d="M4.66699 1.16675V2.91675" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path opacity="0.4" d="M11.958 5.30249H2.04134" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path d="M1.75 4.95841V9.91675C1.75 11.6667 2.625 12.8334 4.66667 12.8334H9.33333C11.375 12.8334 12.25 11.6667 12.25 9.91675V4.95841C12.25 3.20841 11.375 2.04175 9.33333 2.04175H4.66667C2.625 2.04175 1.75 3.20841 1.75 4.95841Z" stroke="#92929D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path opacity="0.4" d="M4.84435 7.99162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path opacity="0.4" d="M4.84435 9.74162H4.83911" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path opacity="0.4" d="M7.00255 7.99162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path opacity="0.4" d="M7.00255 9.74162H6.99731" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path opacity="0.4" d="M9.16173 7.99162H9.15649" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path opacity="0.4" d="M9.16113 9.7417H9.15589" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                            </svg>--}}
{{--                                        </span>--}}
{{--                                        <span class="text">--}}
{{--                                         {{$w[$v->dayOfWeek]}}--}}
{{--                                            {{($v->day)}}--}}
{{--                                            {{($m[$v->month-1])}}--}}

{{--                                    </span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <span class="icon">--}}
{{--                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                <path d="M12.8337 7.00008C12.8337 10.2201 10.2203 12.8334 7.00033 12.8334C3.78033 12.8334 1.16699 10.2201 1.16699 7.00008C1.16699 3.78008 3.78033 1.16675 7.00033 1.16675C10.2203 1.16675 12.8337 3.78008 12.8337 7.00008Z" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                                <path opacity="0.4" d="M9.16418 8.85503L7.35585 7.77586C7.04085 7.58919 6.78418 7.14003 6.78418 6.77253V4.38086" stroke="#92929D" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                            </svg>--}}
{{--                                        </span>--}}
{{--                                        <span class="text">--}}
{{--                                        ﺳﺎﻋﺖ:--}}
{{--                                         {{\Carbon\Carbon::parse($class->start)->format('H:i:s')}}--}}
{{--                                        ---}}
{{--                                        @if(isset($class->bill) && $class->bill->count==0)--}}
{{--                                            {{\Carbon\Carbon::parse($class->start)->addMinutes(30)->format('H:i:s')}}--}}
{{--                                        @else--}}
{{--                                            {{\Carbon\Carbon::parse($class->start)->addMinutes(60)->format('H:i:s')}}--}}
{{--                                        @endif--}}
{{--                                    </span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

{{--                            <div class="timer">--}}
{{--                                <h4>زمان باقی مانده :</h4>--}}
{{--                                <div class="countdown"  id="countdown_{{$class->start}}" data-time="{{$class->start}}"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="left">--}}
{{--                            <div class="info">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                    <span class="title">--}}
{{--                                          @if(isset($class->bill) && $class->bill->count==0)--}}
{{--                                            آزمایشی--}}
{{--                                        @else--}}
{{--                                            خصوصی--}}
{{--                                        @endif--}}

{{--                                    </span>--}}
{{--                                        <span class="icon">--}}
{{--														<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--															<path d="M18.3337 13.9501V3.89174C18.3337 2.89174 17.517 2.15008 16.5253 2.23341H16.4753C14.7253 2.38341 12.067 3.27508 10.5837 4.20841L10.442 4.30008C10.2003 4.45008 9.80033 4.45008 9.55866 4.30008L9.35033 4.17508C7.86699 3.25008 5.21699 2.36674 3.46699 2.22508C2.47533 2.14174 1.66699 2.89174 1.66699 3.88341V13.9501C1.66699 14.7501 2.31699 15.5001 3.11699 15.6001L3.35866 15.6334C5.16699 15.8751 7.95866 16.7917 9.55866 17.6667L9.59199 17.6834C9.81699 17.8084 10.1753 17.8084 10.392 17.6834C11.992 16.8001 14.792 15.8751 16.6087 15.6334L16.8837 15.6001C17.6837 15.5001 18.3337 14.7501 18.3337 13.9501Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--															<path opacity="0.4" d="M10 4.57495V17.075" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--															<path opacity="0.4" d="M6.45801 7.07495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--															<path opacity="0.4" d="M7.08301 9.57495H4.58301" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--														</svg>--}}
{{--													</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                    <span class="title">--}}
{{--                                          @if(isset($class->bill) && $class->bill->count==0)--}}
{{--                                            30--}}
{{--                                        @else--}}
{{--                                            60--}}
{{--                                        @endif--}}
{{--                                        دقیقه</span>--}}
{{--                                        <span class="icon">--}}
{{--														<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--															<path d="M17.2913 11.0417C17.2913 15.0667 14.0247 18.3333 9.99967 18.3333C5.97467 18.3333 2.70801 15.0667 2.70801 11.0417C2.70801 7.01667 5.97467 3.75 9.99967 3.75C14.0247 3.75 17.2913 7.01667 17.2913 11.0417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--															<path opacity="0.4" d="M10 6.66675V10.8334" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--															<path opacity="0.4" d="M7.5 1.66675H12.5" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--														</svg>--}}
{{--													</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="buttons">--}}
{{--                                <div class="options">--}}
{{--                                    <div class="top www">گزینه ها</div>--}}
{{--                                    <div class="drop">--}}
{{--                                        @if(  $class->model !='free')--}}
{{--                                            <div class="drop-container" {{(\Illuminate\Support\Carbon::now()->gt(\Carbon\Carbon::parse($class->start)))?'hidden':''}}>--}}
{{--                                                <ul>--}}


{{--                                                    <li data-id="{{$class->id}}" data-count="{{$class->bill->count}}" data-img="{{asset('/src/avatar/'.$student->attr('avatar'))}}"  data-name="{{$student->name}}"--}}
{{--                                                        data-date="--}}
{{--                                                 {{$w[$v->dayOfWeek]}}--}}
{{--                                                        {{($v->day)}}--}}
{{--                                                        {{($m[$v->month-1])}}--}}
{{--                                                        {{($v->hour.':'.$min)}}--}}
{{--                                                            " class="cancel_class">--}}
{{--                                                    <a  class="option pointer ">--}}
{{--																	<span class="icon">--}}
{{--																		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--																			<g opacity="0.4">--}}
{{--																			<path d="M7.6416 12.3583L12.3583 7.6416" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--																			<path d="M12.3583 12.3583L7.6416 7.6416" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--																			</g>--}}
{{--																			<path d="M7.50033 18.3334H12.5003C16.667 18.3334 18.3337 16.6667 18.3337 12.5001V7.50008C18.3337 3.33341 16.667 1.66675 12.5003 1.66675H7.50033C3.33366 1.66675 1.66699 3.33341 1.66699 7.50008V12.5001C1.66699 16.6667 3.33366 18.3334 7.50033 18.3334Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--																		</svg>--}}
{{--																	</span>--}}
{{--                                                        <span class="text">لغو کلاس</span>--}}
{{--                                                    </a>--}}
{{--                                                    </li>--}}

{{--                                                </ul>--}}

{{--                                            </div>--}}
{{--                                        @endif--}}

{{--                                    </div>--}}
{{--                                </div>--}}



{{--                                <div class="enter-class">--}}
{{--                                    <a target="_blank" class="enter-class-bt" href="{{route('home.go.class',[$class->id])}}">--}}
{{--                                        ورود به کلاس--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}

{{--            {{$classes->appends(request()->all())->links('home.section.pagination')}}--}}
{{--            @if($classes->count()==0)--}}
{{--                <div class="upclasses">--}}
{{--                    <div>--}}
{{--                        <div class="no-class">--}}
{{--                            <div class="img">--}}
{{--                                <img src="/home/images/noteacher.png" alt="">--}}
{{--                            </div>--}}
{{--                            <h3>هیچ کلاس درسی یافت نشد!</h3>--}}
{{--                            @if(auth()->user()->level=='student')--}}
{{--                            <div class="button">--}}
{{--                                <a href="{{route('home.teacher.list')}}" class="reserv">--}}
{{--                                    <span>همین حالا رزرو کن</span>--}}
{{--                                    <span class="icon">--}}
{{--											<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--												<path d="M9.89855 17.5C14.4145 17.5 18.0754 13.9555 18.0754 9.58329C18.0754 5.21104 14.4145 1.66663 9.89855 1.66663C5.38259 1.66663 1.72168 5.21104 1.72168 9.58329C1.72168 13.9555 5.38259 17.5 9.89855 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--												<path opacity="0.4" d="M18.9363 18.3333L17.2148 16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--											</svg>--}}
{{--										</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}


    <?php
    $check='<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2Z" fill="#57BA7E"></path>
                                <path d="M10.5795 15.5801C10.3795 15.5801 10.1895 15.5001 10.0495 15.3601L7.21945 12.5301C6.92945 12.2401 6.92945 11.7601 7.21945 11.4701C7.50945 11.1801 7.98945 11.1801 8.27945 11.4701L10.5795 13.7701L15.7195 8.6301C16.0095 8.3401 16.4895 8.3401 16.7795 8.6301C17.0695 8.9201 17.0695 9.4001 16.7795 9.6901L11.1095 15.3601C10.9695 15.5001 10.7795 15.5801 10.5795 15.5801Z" fill="white"></path>
                            </svg>';

    $uncheck='<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2Z" fill="#ff3737"></path>
                                <path d="M13.0604 12.0001L15.3604 9.70011C15.6504 9.41011 15.6504 8.93011 15.3604 8.64011C15.0704 8.35011 14.5904 8.35011 14.3004 8.64011L12.0004 10.9401L9.70035 8.64011C9.41035 8.35011 8.93035 8.35011 8.64035 8.64011C8.35035 8.93011 8.35035 9.41011 8.64035 9.70011L10.9404 12.0001L8.64035 14.3001C8.35035 14.5901 8.35035 15.0701 8.64035 15.3601C8.79035 15.5101 8.98035 15.5801 9.17035 15.5801C9.36035 15.5801 9.55035 15.5101 9.70035 15.3601L12.0004 13.0601L14.3004 15.3601C14.4504 15.5101 14.6404 15.5801 14.8304 15.5801C15.0204 15.5801 15.2104 15.5101 15.3604 15.3601C15.6504 15.0701 15.6504 14.5901 15.3604 14.3001L13.0604 12.0001Z" fill="#ff3737"></path>
                            </svg>';
    ?>

    <!-- Start Profile Status -->
    <div class="profile-status">
{{--        <div class="title">--}}
{{--            <h3>--}}
{{--                <span>وضعیت پروفایل</span>--}}
{{--                <span class="{{$user->submit=='1'?'green':'red'}}">: {{$user->submit=='1'?'فعال':'غیر فعال'}}</span>--}}
{{--            </h3>--}}
{{--            <p>برای فعال‌سازی پروفایل و دیده شدن آن در صفحه اساتید، موارد زیر را تکمیل کنید</p>--}}
{{--        </div>--}}
        <form id="activeprofile_form" action="{{route('teacher.active.profile',$user->id)}}" method="post">
            @csrf
            @method('post')


        <div class="title">
            <div class="check-toggle" style="display: inline-block">
                <h2>فعال / غیر فعال</h2>
                <input type="checkbox" {{$user->submit=='1'?'checked':''}} name="activeprofile" id="activeprofile" value="activeprofile">
                <label style="right: 16px" for="activeprofile"><span></span></label>
            </div>
         <p>
               فعال سازی پروفایل و اضافه شدن به لیست مدرسین
         </p>
        </div>

        </form>
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div>
                    <div class="single-prf-stat  {{$user->attr('profile_plan')?'done':''}}">
                        <div class="icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M45.8327 16.2709V33.7293C45.8327 39.5834 43.1452 43.6042 38.416 45.125C37.041 45.6042 35.4577 45.8334 33.7285 45.8334H16.2702C14.541 45.8334 12.9577 45.6042 11.5827 45.125C6.85351 43.6042 4.16602 39.5834 4.16602 33.7293V16.2709C4.16602 8.68758 8.68684 4.16675 16.2702 4.16675H33.7285C41.3119 4.16675 45.8327 8.68758 45.8327 16.2709Z" fill="currentColor"></path>
                                <path d="M38.4173 45.1248C37.0423 45.604 35.459 45.8332 33.7298 45.8332H16.2715C14.5423 45.8332 12.959 45.604 11.584 45.1248C12.3132 39.6248 18.0632 35.354 25.0007 35.354C31.9382 35.354 37.6882 39.6248 38.4173 45.1248Z" fill="currentColor"></path>
                                <path d="M32.4577 24.1251C32.4577 28.2501 29.1244 31.6042 24.9994 31.6042C20.8744 31.6042 17.541 28.2501 17.541 24.1251C17.541 20.0001 20.8744 16.6667 24.9994 16.6667C29.1244 16.6667 32.4577 20.0001 32.4577 24.1251Z" fill="currentColor"></path>
                            </svg>
                        </div>
                        <h4>
                            <a href="{{route('teacher.account')}}" class="stat">
                                <h4>     آپلود تصویر پروفایل  </h4>
                            </a>
                        </h4>
                        <div class="check">
                            {!! $user->attr('profile_plan')?$check:$uncheck  !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div>
                    <div class="single-prf-stat {{$user->attr('save_expert')?'done':''}} ">
                        <div class="icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.8" d="M26.8737 5.2501L26.8112 5.39594L20.7695 19.4168H14.832C13.4154 19.4168 12.082 19.6876 10.832 20.2293L14.4779 11.5209L14.5612 11.3334L14.6862 11.0001C14.7487 10.8543 14.7904 10.7293 14.8529 10.6251C17.582 4.3126 20.6654 2.8751 26.8737 5.2501Z" fill="currentColor"></path>
                                <path d="M38.1048 19.8333C37.1673 19.5625 36.1882 19.4167 35.1673 19.4167H20.7715L26.8132 5.39583L26.8756 5.25C27.1673 5.35417 27.4798 5.5 27.7923 5.60417L32.3965 7.54167C34.959 8.60417 36.7507 9.70833 37.8548 11.0417C38.0423 11.2917 38.209 11.5208 38.3757 11.7917C38.5632 12.0833 38.709 12.375 38.7923 12.6875C38.8757 12.875 38.9382 13.0417 38.9798 13.2292C39.5215 15 39.1882 17.1458 38.1048 19.8333Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M45.3346 29.5834V33.6459C45.3346 34.0626 45.3138 34.4792 45.293 34.8751C44.8971 42.1667 40.8346 45.8334 33.1263 45.8334H16.8763C16.3555 45.8334 15.8763 45.7918 15.3971 45.7293C8.77213 45.2918 5.23047 41.7501 4.77214 35.1251C4.70964 34.6251 4.66797 34.1459 4.66797 33.6459V29.5834C4.66797 25.3959 7.20964 21.7917 10.8346 20.2292C12.0846 19.6876 13.418 19.4167 14.8346 19.4167H35.168C36.1888 19.4167 37.168 19.5626 38.1055 19.8334C42.2721 21.1042 45.3346 24.9792 45.3346 29.5834Z" fill="currentColor"></path>
                                <path opacity="0.6" d="M14.4805 11.521L10.8346 20.2293C7.20963 21.7918 4.66797 25.396 4.66797 29.5835V23.4793C4.66797 17.5627 8.8763 12.6252 14.4805 11.521Z" fill="currentColor"></path>
                                <path opacity="0.6" d="M45.3327 23.4794V29.5836C45.3327 24.9794 42.2702 21.1044 38.1035 19.8336C39.1868 17.1461 39.5202 15.0002 38.9785 13.2294C38.9368 13.0419 38.8743 12.8752 38.791 12.6877C42.6869 14.7086 45.3327 18.8127 45.3327 23.4794Z" fill="currentColor"></path>
                            </svg>
                        </div>
                        <h4>
                            <a href="{{route('teacher.abilite')}}" class="stat">
                                <h4>  تکمیل     توانایی ها</h4>
                            </a>

                        </h4>
                        <div class="check">
                              {!! $user->attr('save_expert')?$check:$uncheck  !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div>
                    <div class="single-prf-stat {{$user->attr('time_plan')?'done':''}} ">
                        <div class="icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M34.8969 7.41674V4.16675C34.8969 3.31258 34.1886 2.60425 33.3344 2.60425C32.4803 2.60425 31.7719 3.31258 31.7719 4.16675V7.29175H18.2303V4.16675C18.2303 3.31258 17.5219 2.60425 16.6678 2.60425C15.8136 2.60425 15.1053 3.31258 15.1053 4.16675V7.41674C9.48028 7.93758 6.75113 11.2917 6.33446 16.2709C6.2928 16.8751 6.7928 17.3751 7.37613 17.3751H42.6261C43.2303 17.3751 43.7303 16.8542 43.6678 16.2709C43.2511 11.2917 40.5219 7.93758 34.8969 7.41674Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M41.6667 20.5002C42.8125 20.5002 43.75 21.4377 43.75 22.5836V35.4169C43.75 41.6669 40.625 45.8336 33.3333 45.8336H16.6667C9.375 45.8336 6.25 41.6669 6.25 35.4169V22.5836C6.25 21.4377 7.1875 20.5002 8.33333 20.5002H41.6667Z" fill="currentColor"></path>
                                <path d="M17.7083 31.2498C17.4375 31.2498 17.1667 31.1873 16.9167 31.0831C16.6667 30.979 16.4375 30.8331 16.2292 30.6456C16.0417 30.4373 15.8958 30.2081 15.7916 29.9581C15.6875 29.7081 15.625 29.4373 15.625 29.1665C15.625 28.8956 15.6875 28.6248 15.7916 28.3748C15.8958 28.1248 16.0417 27.8956 16.2292 27.6873C16.4375 27.4998 16.6667 27.3539 16.9167 27.2498C17.4167 27.0414 18 27.0414 18.5 27.2498C18.75 27.3539 18.9791 27.4998 19.1875 27.6873C19.375 27.8956 19.5209 28.1248 19.625 28.3748C19.7292 28.6248 19.7917 28.8956 19.7917 29.1665C19.7917 29.4373 19.7292 29.7081 19.625 29.9581C19.5209 30.2081 19.375 30.4373 19.1875 30.6456C18.9791 30.8331 18.75 30.979 18.5 31.0831C18.25 31.1873 17.9792 31.2498 17.7083 31.2498Z" fill="currentColor"></path>
                                <path d="M24.9993 31.25C24.7285 31.25 24.4577 31.1876 24.2077 31.0834C23.9577 30.9792 23.7285 30.8333 23.5202 30.6458C23.1452 30.25 22.916 29.7084 22.916 29.1667C22.916 28.625 23.1452 28.0834 23.5202 27.6875C23.7285 27.5 23.9577 27.3542 24.2077 27.25C24.7077 27.0208 25.291 27.0208 25.791 27.25C26.041 27.3542 26.2702 27.5 26.4785 27.6875C26.8535 28.0834 27.0827 28.625 27.0827 29.1667C27.0827 29.7084 26.8535 30.25 26.4785 30.6458C26.2702 30.8333 26.041 30.9792 25.791 31.0834C25.541 31.1876 25.2702 31.25 24.9993 31.25Z" fill="currentColor"></path>
                                <path d="M17.7083 38.5415C17.4375 38.5415 17.1667 38.4791 16.9167 38.3749C16.6667 38.2707 16.4375 38.1248 16.2292 37.9373C15.8542 37.5415 15.625 36.9999 15.625 36.4582C15.625 35.9165 15.8542 35.3749 16.2292 34.979C16.4375 34.7915 16.6667 34.6457 16.9167 34.5415C17.4167 34.3332 18 34.3332 18.5 34.5415C18.75 34.6457 18.9791 34.7915 19.1875 34.979C19.5625 35.3749 19.7917 35.9165 19.7917 36.4582C19.7917 36.9999 19.5625 37.5415 19.1875 37.9373C18.9791 38.1248 18.75 38.2707 18.5 38.3749C18.25 38.4791 17.9792 38.5415 17.7083 38.5415Z" fill="currentColor"></path>
                            </svg>
                        </div>
                        <h4>
                            <a href="{{route('teacher.plans')}}" class="stat">
                                <h4>تعین برنامه زمانی</h4>
                            </a>
                        </h4>
                        <div class="check">
                              {!! $user->attr('time_plan')?$check:$uncheck  !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div>
                    <div class="single-prf-stat  {{$user->attr('price_plan')?'done':''}}">
                        <div class="icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M20.8128 37.4584C30.0061 37.4584 37.4587 30.0058 37.4587 20.8126C37.4587 11.6193 30.0061 4.16675 20.8128 4.16675C11.6196 4.16675 4.16699 11.6193 4.16699 20.8126C4.16699 30.0058 11.6196 37.4584 20.8128 37.4584Z" fill="currentColor"></path>
                                <path d="M45.7705 33.3127C45.7705 40.1877 40.1872 45.771 33.3122 45.771C29.0622 45.771 25.333 43.646 23.083 40.4168C32.1663 39.396 39.3955 32.1668 40.4163 23.0835C43.6455 25.3335 45.7705 29.0627 45.7705 33.3127Z" fill="currentColor"></path>
                                <path d="M23.8545 20.229L18.8545 18.479C18.3545 18.3123 18.2503 18.2707 18.2503 17.5415C18.2503 16.9998 18.6253 16.5623 19.1045 16.5623H22.2295C22.8962 16.5623 23.4378 17.1665 23.4378 17.9165C23.4378 18.7707 24.1462 19.479 25.0003 19.479C25.8545 19.479 26.5628 18.7707 26.5628 17.9165C26.5628 15.5207 24.7087 13.5623 22.3962 13.4582V13.354C22.3962 12.4998 21.6878 11.7915 20.8337 11.7915C19.9795 11.7915 19.2712 12.479 19.2712 13.354V13.4582H19.0837C16.8962 13.4582 15.1045 15.2915 15.1045 17.5623C15.1045 19.5415 15.9795 20.8123 17.792 21.4373L22.8128 23.1873C23.3128 23.354 23.417 23.3957 23.417 24.1248C23.417 24.6665 23.042 25.104 22.5628 25.104H19.4378C18.7712 25.104 18.2295 24.4998 18.2295 23.7498C18.2295 22.8957 17.5212 22.1873 16.667 22.1873C15.8128 22.1873 15.1045 22.8957 15.1045 23.7498C15.1045 26.1457 16.9587 28.104 19.2712 28.2082V28.3332C19.2712 29.1873 19.9795 29.8957 20.8337 29.8957C21.6878 29.8957 22.3962 29.1873 22.3962 28.3332V28.229H22.5837C24.7712 28.229 26.5628 26.3957 26.5628 24.1248C26.5628 22.1457 25.667 20.8748 23.8545 20.229Z" fill="currentColor"></path>
                            </svg>
                        </div>
                        <h4>
                            <a href="{{route('teacher.prices')}}" class="stat">
                                <h4>تعیین قیمت جلسات  </h4>
                            </a>
                        </h4>
                        <div class="check">
                              {!! $user->attr('price_plan')?$check:$uncheck  !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div>
                    <div class="single-prf-stat {{$user->attr('port_vid')?'done':''}}">
                        <div class="icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M27.0833 6.77075H14.5833C7.45833 6.77075 4.6875 9.54158 4.6875 16.6666V33.3333C4.6875 38.1249 7.29167 43.2291 14.5833 43.2291H27.0833C34.2083 43.2291 36.9792 40.4583 36.9792 33.3333V16.6666C36.9792 9.54158 34.2083 6.77075 27.0833 6.77075Z" fill="currentColor"></path>
                                <path d="M23.9587 23.7086C26.1218 23.7086 27.8753 21.955 27.8753 19.7919C27.8753 17.6288 26.1218 15.8752 23.9587 15.8752C21.7955 15.8752 20.042 17.6288 20.042 19.7919C20.042 21.955 21.7955 23.7086 23.9587 23.7086Z" fill="currentColor"></path>
                                <path d="M45.1051 12.8544C44.251 12.4169 42.4593 11.9169 40.0218 13.6253L36.9385 15.7919C36.9593 16.0836 36.9801 16.3544 36.9801 16.6669V33.3336C36.9801 33.6461 36.9385 33.9169 36.9385 34.2086L40.0218 36.3753C41.3135 37.2919 42.4385 37.5836 43.3343 37.5836C44.1051 37.5836 44.7093 37.3753 45.1051 37.1669C45.9593 36.7294 47.3968 35.5419 47.3968 32.5628V17.4586C47.3968 14.4794 45.9593 13.2919 45.1051 12.8544Z" fill="currentColor"></path>
                            </svg>
                        </div>
                        <h4>
                            <a href="{{route('teacher.introduce')}}" class="stat">
                                <h4>آپلود ویدیو</h4>
                            </a>
                        </h4>
                        <div class="check">
                             {!! $user->attr('port_vid')?$check:$uncheck  !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div>
                    <div class="single-prf-stat {{$user->attr('save_lang')?'done':''}}">
                        <div class="icon">

                            <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M39.5209 30.5704L30.8751 39.2162C30.5417 39.5496 30.2292 40.1954 30.1459 40.6537L29.6667 43.9662C29.5001 45.1537 30.3334 46.0079 31.5209 45.8204L34.8334 45.3412C35.2917 45.2787 35.9376 44.9454 36.2709 44.612L44.9167 35.9662C46.3959 34.4871 47.1042 32.737 44.9167 30.5495C42.7501 28.3829 41.0209 29.0704 39.5209 30.5704Z" fill="#899BB0"/>
                                <path d="M38.292 31.7996C39.0212 34.4246 41.0837 36.4662 43.7087 37.2162Z" fill="currentColor"/>
                                <path d="M4.72918 30.4868C4.72918 30.5493 4.6875 30.6327 4.6875 30.6952C6.60417 34.5285 9.72919 37.6743 13.5625 39.5701C13.625 39.5701 13.7083 39.5285 13.7708 39.5285C13.0625 37.1118 12.5208 34.6326 12.125 32.1535C9.62502 31.7368 7.14584 31.1951 4.72918 30.4868Z" fill="currentColor"/>
                                <path d="M40.2292 13.4035C38.2708 9.2993 34.9583 5.98682 30.875 4.04932C31.625 6.52848 32.25 9.07016 32.6667 11.6118C35.2083 12.0285 37.75 12.6326 40.2292 13.4035Z" fill="currentColor"/>
                                <path d="M4.52051 13.4036C7.02051 12.6536 9.5622 12.0286 12.1039 11.6119C12.5205 9.13277 13.0414 6.67444 13.7497 4.25777C13.6872 4.25777 13.6038 4.21606 13.5413 4.21606C9.62468 6.15356 6.43717 9.42441 4.52051 13.4036Z" fill="currentColor"/>
                                <path d="M29.2914 11.1745C28.7914 8.46614 28.1664 5.75783 27.2705 3.13283C27.2289 2.987 27.2289 2.86202 27.208 2.69535C25.6664 2.32035 24.0414 2.07031 22.3747 2.07031C20.6872 2.07031 19.083 2.29952 17.5205 2.69535C17.4997 2.84118 17.5205 2.96617 17.4788 3.13283C16.6038 5.75783 15.958 8.46614 15.458 11.1745C20.0622 10.6745 24.6872 10.6745 29.2914 11.1745Z" fill="currentColor"/>
                                <path d="M11.6667 14.9661C8.93749 15.4661 6.24999 16.0911 3.62499 16.9869C3.47916 17.0286 3.35414 17.0286 3.18747 17.0494C2.81247 18.5911 2.5625 20.2161 2.5625 21.8827C2.5625 23.5702 2.79164 25.1744 3.18747 26.7369C3.33331 26.7577 3.45832 26.7369 3.62499 26.7786C6.24999 27.6536 8.93749 28.2994 11.6667 28.7994C11.1667 24.1953 11.1667 19.5702 11.6667 14.9661Z" fill="currentColor"/>
                                <path d="M41.5416 17.0494C41.3958 17.0494 41.2708 17.0286 41.1042 16.9869C38.4792 16.1119 35.7708 15.4661 33.0625 14.9661C33.5833 19.5702 33.5833 24.1952 33.0625 28.7786C35.7708 28.2786 38.4792 27.6536 41.1042 26.7577C41.25 26.7161 41.375 26.7369 41.5416 26.7161C41.9166 25.1536 42.1667 23.5494 42.1667 21.8619C42.1667 20.2161 41.9375 18.6119 41.5416 17.0494Z" fill="currentColor"/>
                                <path d="M15.458 32.5913C15.958 35.3205 16.583 38.0079 17.4788 40.6329C17.5205 40.7788 17.4997 40.9038 17.5205 41.0704C19.083 41.4454 20.6872 41.6955 22.3747 41.6955C24.0414 41.6955 25.6664 41.4663 27.208 41.0704C27.2289 40.9246 27.2289 40.7996 27.2705 40.6329C28.1455 38.0079 28.7914 35.3205 29.2914 32.5913C26.9997 32.8413 24.6872 33.0288 22.3747 33.0288C20.0622 33.008 17.7497 32.8413 15.458 32.5913Z" fill="currentColor"/>
                                <path d="M14.9785 14.4871C14.3535 19.4037 14.3535 24.362 14.9785 29.2995C19.8952 29.9245 24.8535 29.9245 29.791 29.2995C30.416 24.3829 30.416 19.4246 29.791 14.4871C24.8535 13.8621 19.8952 13.8621 14.9785 14.4871Z" fill="currentColor"/>
                            </svg>

                        </div>
                        <h4>
                            <a href="{{route('teacher.lang')}}" class="stat">
                                <h4>  انتخاب زبان</h4>
                            </a>
                        </h4>
                        <div class="check">
                             {!! $user->attr('save_lang')?$check:$uncheck  !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Profile Status -->
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

            <div class="col-lg-2 col-md-6 col-sm-12">
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
                            <span class="bot">{{auth()->user()->meets()->whereIn('status',['passed','down'])->count()/2}} کلاس</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12">
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
                            <span class="top">دانش آموز های من</span>
                            <span class="bot">{{auth()->user()->students()}} دانش آموز</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-12">
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
                                    {{auth()->user()->meets()->where('student_id','!=','null')->where('start','>',\Carbon\Carbon::now())->count()/2}}
                                    کلاس</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-12">
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
                            <span class="top">         کلاس های ویرایش شده</span>
                            <span class="bot">
                                    {{auth()->user()->emeets()->count()}}
                                    کلاس</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-12">
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
                            <span class="top"> کلاس های لغو شده</span>
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
            <div class="col-lg-6 col-md-12">
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
{{--                            <div class="left">--}}
{{--                                    <span   class="more pointer" id="wallet">--}}
{{--                                        <span class="text" id="">افرایش موجودی</span>--}}
{{--                                        <span class="icon" >--}}
{{--                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                <path d="M1 5H9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--                                                <path d="M5 9V1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--                                            </svg>--}}
{{--                                        </span>--}}
{{--                                    </span>--}}
{{--                            </div>--}}
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
                                    <img src="/home/images/video1.png" alt="">
                                </div>
                                <div class="info">
                                    <h4>ویدئو نحوه کار با محیط کلاس</h4>
                                    <p>برای مشاهده آموزش کلیک کنید</p>
                                </div>
                            </div>
                            <div class="left">
                                <a href="#" class="more" id="classtut">
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
{{--            <div class="col-lg-7 col-md-12">--}}
{{--                <div>--}}
{{--                    <div class="golden-chance">--}}
{{--                        <div>--}}
{{--                            <div class="right">--}}
{{--                                <div class="img">--}}
{{--                                    <img src="/home/images/hero.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="info">--}}
{{--                                    <h4>این یک فرصت #طلایی است</h4>--}}
{{--                                    <p>از ۱۲ مه تا ۱۲ ژوئن با ۲۰ درصد تخفیف در ثبت نام کلاس های آنلاین زبان تخفیف دریافت کنید.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="left">--}}
{{--                                <a href="#" class="more">--}}
{{--                                    <span class="text">جزئیات بیشتر</span>--}}
{{--                                    <span class="icon">--}}
{{--														<svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--															<path d="M2.71502 4.93595L6.36502 8.12296C6.44283 8.18654 6.50554 8.26663 6.5486 8.35743C6.59166 8.44823 6.614 8.54746 6.614 8.64795C6.614 8.74845 6.59166 8.84768 6.5486 8.93848C6.50554 9.02928 6.44283 9.10937 6.36502 9.17296C6.19652 9.31318 5.98423 9.38995 5.76502 9.38995C5.54581 9.38995 5.33352 9.31318 5.16502 9.17296L0.914018 5.46096C0.836204 5.39737 0.773499 5.31728 0.730438 5.22648C0.687378 5.13568 0.665039 5.03645 0.665039 4.93596C0.665039 4.83546 0.687378 4.73623 0.730438 4.64543C0.773499 4.55463 0.836204 4.47454 0.914018 4.41095L5.16502 0.697955C5.33352 0.557734 5.54581 0.480957 5.76502 0.480957C5.98423 0.480957 6.19652 0.557734 6.36502 0.697955C6.44283 0.761543 6.50554 0.841633 6.5486 0.932431C6.59166 1.02323 6.614 1.12246 6.614 1.22295C6.614 1.32345 6.59166 1.42268 6.5486 1.51348C6.50554 1.60428 6.44283 1.68437 6.36502 1.74795L2.71502 4.93595Z" fill="white"></path>--}}
{{--														</svg>--}}
{{--													</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

    <!-- Start Teacher Stat -->
    <div class="teacher-stat shade">

        <div class="widget-title">
            <h3>نمودار درامد</h3>
            <div class="exp"><p><span class="name">درامد این سال  :</span><span class="num">

                     {{number_format($user->income(request()->get('year'))['income_year_total'])}}
                    </span> <span class="num">تومان</span></p></div>

            <form id="year_form" action="{{route('teacher.dashboard')}}" method="get">
                @csrf
                @method('get')
                <div class="diag-filter">
                    <select name="year" id="year">
                        <option {{request()->get('year')=='0'?'selected':''}} value="0">سال جاری</option>
                        <option {{request()->get('year')=='1'?'selected':''}} value="1">سال قبل</option>
                    </select>
                </div>


            </form>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">

            <script>
                window.onload = function () {

                    var options = {
                        series: [{
                            name: "درآمد",
                            data: {{json_encode($user->income(request()->get('year'))['income_year_mony'])}}
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            zoom: {
                                enabled: false
                            }
                        },
                        colors:['#17b687', '#E91E63', '#9C27B0'],
                        fill: {
                            colors: ['#17b687', '#E91E63', '#9C27B0'],
                            type: 'gradient',
                            gradient: {
                                shadeIntensity: 1,
                                inverseColors: false,
                                opacityFrom: 0.5,
                                opacityTo: 0,
                                stops: [0, 90, 100]
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        markers: {
                            size: 8,
                            colors: ["#fff"],
                            strokeColors: "#0eb582",
                            strokeWidth: 4,
                            hover: {
                                size: 8,
                                strokeWidth: 4,
                                colors: ["#0eb582"],
                                strokeColors: "#fff",
                            }
                        },
                        title: {
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                opacity: 0.5
                            },
                        },
                        xaxis: {
                            categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#chartContainer"), options);
                    chart.render();

                }
            </script>
            <div id="chartContainer" style=""></div>
        </div>
    </div>
    <!-- End Teacher Stat -->
   <div class="classes">

       <h3 class="dash-title">
           لیست کلاس های ایجاد شده
           خصوصی
       </h3>
       <div class="sarch-button-order">
           <div class="add-new-class">
               <a style="text-align: center" href="{{route('teacher.classes')}}" class="add-new-class-bt">
								<span class="icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g opacity="0.4">
										<path d="M8 12H16" stroke="#57BA7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
										<path d="M12 16V8" stroke="#57BA7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
										</g>
										<path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#57BA7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</span>
                   <span class="text">ساخت کلاس جدید</span>
               </a>
           </div>

           <div class="search-ordering">
               <div class="row">
                   <div class="col-lg-4 col-md-12">
                       <form action="" class="search">
                           <input type="text" placeholder="جستجو در کلاس ها ...">
                           <button>
                               <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M9.58341 17.5001C13.9557 17.5001 17.5001 13.9557 17.5001 9.58341C17.5001 5.21116 13.9557 1.66675 9.58341 1.66675C5.21116 1.66675 1.66675 5.21116 1.66675 9.58341C1.66675 13.9557 5.21116 17.5001 9.58341 17.5001Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                   <path opacity="0.4" d="M18.3334 18.3334L16.6667 16.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                               </svg>
                           </button>
                       </form>
                   </div>
                   <div class="col-lg-8 col-md-12">
                       <div>
                           <div class="ordering">
                               <h4>
												<span class="icon">
													<svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M7.77333 12.9939L10.731 12.9939V11.6639L7.77333 11.6639V12.9939ZM2.59741 4.9939V6.3279L15.9069 6.3279V4.9939L2.59741 4.9939ZM4.81455 9.6629L13.6831 9.6629V8.3289L4.81455 8.3289V9.6629Z" fill="#5E57BA"></path>
													</svg>
												</span>
                                   <span class="val">مرتب سازی :</span>
                               </h4>

{{--                               <form action="">--}}
{{--                                   <ul>--}}
{{--                                       <li>--}}
{{--                                           <div class="label-container">--}}
{{--                                               <input type="radio" name="orderb" id="alls" value="alls" checked="">--}}
{{--                                               <label for="alls">همه</label>--}}
{{--                                           </div>--}}
{{--                                       </li>--}}
{{--                                       <li>--}}
{{--                                           <div class="label-container">--}}
{{--                                               <input type="radio" name="orderb" id="success" value="success">--}}
{{--                                               <label for="success">موفق</label>--}}
{{--                                           </div>--}}
{{--                                       </li>--}}
{{--                                       <li>--}}
{{--                                           <div class="label-container">--}}
{{--                                               <input type="radio" name="orderb" id="proccesing" value="proccesing">--}}
{{--                                               <label for="proccesing">درحال انجام</label>--}}
{{--                                           </div>--}}
{{--                                       </li>--}}
{{--                                       <li>--}}
{{--                                           <div class="label-container">--}}
{{--                                               <input type="radio" name="orderb" id="canceledf" value="canceledf">--}}
{{--                                               <label for="canceledf">لغو شده</label>--}}
{{--                                           </div>--}}
{{--                                       </li>--}}
{{--                                   </ul>--}}

{{--                               </form>--}}
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="table-container">
           <div class="table-box">
               <table class="data-table">
                   <thead>
                   <tr>
{{--                       <th class="check"><span></span></th>--}}
                       <th><span>id</span></th>
                       <th class="texright"><span>عنوان</span></th>
{{--                       <th><span>ظرفیت کلاس</span></th>--}}
                       <th><span>ثبت نام شده</span></th>
                       <th><span>اشترک گذاری</span></th>
{{--                       <th><span>امکانات</span></th>--}}
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($user->fclasses as $flcass)
                   <tr>
                       <td>

                           {{$loop->iteration}}
                       </td>
                       <td class="texright fw5">
                           <span>{{$flcass->name}}</span>

                       </td>
                       <td class="fw5">
                           <span>
                           @if($flcass->student_id)
                               {{\App\Models\User::find($flcass->student_id)->name}}
                               @endif
                           </span>
                       </td>

                       <td>
											<span>
												<span class="share">

													<a   data-link="{{route('go.free.class',$flcass->id)}}"   class="copy-link share-link">
														<span class="icon">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M18.0495 8.70005L17.2328 12.1834C16.5328 15.1917 15.1495 16.4084 12.5495 16.1584C12.1328 16.125 11.6828 16.05 11.1995 15.9334L9.7995 15.6C6.3245 14.775 5.2495 13.0584 6.06617 9.57505L6.88283 6.08338C7.0495 5.37505 7.2495 4.75838 7.4995 4.25005C8.4745 2.23338 10.1328 1.69171 12.9162 2.35005L14.3078 2.67505C17.7995 3.49171 18.8662 5.21671 18.0495 8.70005Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M12.5493 16.1583C12.0326 16.5083 11.3826 16.8 10.591 17.0583L9.27431 17.4917C5.96597 18.5583 4.22431 17.6667 3.14931 14.3583L2.08264 11.0667C1.01597 7.75833 1.89931 6.00833 5.20764 4.94167L6.52431 4.50833C6.86597 4.4 7.19097 4.30833 7.49931 4.25C7.24931 4.75833 7.04931 5.375 6.88264 6.08333L6.06597 9.575C5.24931 13.0583 6.32431 14.775 9.79931 15.6L11.1993 15.9333C11.6826 16.05 12.1326 16.125 12.5493 16.1583Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M10.5332 7.10828L14.5749 8.13328" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M9.7168 10.3334L12.1335 10.95" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
														</span>
														<span class="text">کپی لینک</span>
													</a>

												</span>
											</span>
                       </td>
                   </tr>
                   @endforeach
                   </tbody>
               </table>
           </div>


       </div>
   </div>
    <div class="popup popupc" id="classtut_pop">
        <div>
            <div>
                <div>
                    <div class="popup-container user-set-pop" >
						<span class="close">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
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
    <div class="popup popupc" id="s_cancel_class_popup">
        <div>
            <div>
                <div>
                    <div class="popup-container class-cancel-pop" >
						<span class="close close_popup">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
							</svg>
						</span>
                        <div class="pop-title right">
                            <h3>  آیا قصد لغو کلاس را دارید؟</h3>
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
                                                    <h5 class="s_name">پگاه  علیزاده</h5>
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
                                <p>۲۰ درصد از مبلغ این کلاس باتوجه به نزدیک بودن زمان کلاس در صورت لغو، از کیف پول شما به کیف پول زبان آموزتان منتقل خواهد شد</p>
                            </div>

                            <div class="button">
                                <span id="s_cancel_yes" class="back close_popup">
                                    بازگشت
                                </span>
                                @csrf
                                @method('post')
                                <input id="can_id" type="text" hidden name="class" value="">
                                <button  class="cancel">
                                    لغو کلاس
                                </button>


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
























<div class="popupc" id="change_class_popup">
    <div>
        <div>
            <div>

                <div class="popup-container mini shade">
						<span class="close">
							<i class="icon-cancel"></i>
						</span>

                    <div class="chclass-pop">
                        <div class="top">

                            <h3>
                                آیا از تغییر زمان کلاس مطمئن هستید؟
                            </h3>
                            <p>
                                اگر بله، ضمن هماهنگی با زمان آموز خود، زمان توافق شده را از روی تقویم فقط در روز جاری انتخاب و  تایید نمایید
                            </p>

                        </div>
                        <div class="bot">
                            <div class="right">
                                <img src="/home/images/trash.png" alt="">
                            </div>
                            <div class="left">
                                <span class="day">نسیم کد خدایان</span>
                                <span class="hour">چهار شنبه 07 خرداد 12:00:00</span>
                            </div>
                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container reight border">
                                        <span class="butt">خیر</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-container reight">
                                        <span class="butt">تغییر زمان</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>



<div class="popupc" id="s_cancel_class_popup">
    <div>
        <div>
            <div>

                <div class="popup-container mini shade">
						<span class="close close_popup">
							<i class="icon-cancel"></i>
						</span>

                    <div class="chclass-pop">
                        <div class="top">

                            <h3>
                                آیا قصد لغو کلاس را دارید ؟
                            </h3>
{{--                            <p>--}}
{{--                                با توجه به نزدیک بودن به زمان کلاس در صورت لغو،20 درصد مبلغ این کلاس از کیف پول شما در تیچر پرو به کیف پول زبان آموزتان منتقل خواهد شد--}}
{{--                            </p>--}}

                        </div>
                        <div class="bot">
                            <div class="right">
                                <img class=" " src="/home/images/trash.png" alt="">
                            </div>
                            <div class="left">
                                <span  class="day s_name">نسیم کد خدایان</span>
                                <span class="hour s_date">چهار شنبه 07 خرداد 12:00:00</span>
                            </div>
                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container close_popup reight border">
                                        <span id="s_cancel_yes" class="butt">انصراف</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-container  red reight" style="background: #fff!important;">
                                        <form id="cancel_form" action="{{route('home.cancel.class')}}" method="post">
                                            @csrf
                                            @method('post')
                                            <input id="can_id" type="text" hidden name="class" value="">
                                        <input class="butt " type="submit" value="لغو کلاس">
                                        </form>

                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
<div class="popupc" id="video_tut">
    <div>
        <div>
            <div>

                <div class="popup-container mini shade">
						<span class="close" onclick="window.location.href='{{route('teacher.dashboard')}}'">
							<i class="icon-cancel"></i>
						</span>

                    <div class="chclass-pop">
                        <div class="top">

                            <h3>
                                آموزش
                            </h3>


                        </div>
                        <div class="form">
                            <video id="player" class="js-player" playsinline controls data-poster="/src/videos/test.mp4">
                                <source src="/src/videos/test.mp4" type="video/mp4" />
                            </video>

                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container reight border">
                                        <span class="butt close_popup" onclick="window.location.href='{{route('teacher.dashboard')}}'">بستن</span>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
@endcomponent
