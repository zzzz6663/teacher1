







@extends('master.home')
@section('main_body')

        <?php
        function searchForId($id, $array) {
      foreach ($array as $key => $val) {
          if ($val['name'] === $id) {
              return $val['value'];
          }
      }
      return null;
      }
        $attr_list=$user->attributes()->get()->toArray();
        ?>

    <!-- Start Teacher Section -->
    <div id="teacher-page" class="rows">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12" id="teacher-sidebar">
                    <div>

                        <div class="teacher-sidebar">
                            <div class="video">
                                <video id="player" class="js-player" playsinline controls  data-poster="{{asset('/src/port_img/'.searchForId('port_img', $attr_list))}}">
                                    <source src="{{asset('/src/port_vid/'.searchForId('port_vid', $attr_list))}}" type="video/mp4" />

                                </video>
                            </div>
                            <div class="price-button">
									<span class="title">
										قیمت هر جلسه (هر ساعت)
									</span>

                                <div class="price">
                                    <span class="num">{{number_format($user->com_price($user->meet1))}}  </span>
                                    <span class="tom">تومان</span>
                                </div>

{{--                                <button class="reserv">--}}
{{--                                    <span class="discount">۹%</span>--}}
{{--                                    <span class="text">رزرو کلاس</span>--}}
{{--                                </button>--}}

                            </div>

                            <div class="mid">
                                <span class="line"></span>
                            </div>

                            <div class="trial">
                                <h4>رزرو جلسه آزمایشی</h4>
                                <span class="text">
										یکبار و به مدت 30 دقیقه
                                    {{__('arr.'.searchForId('freeclass', $attr_list))}}
                                    {{searchForId('freeclass', $attr_list)=='nofree'?number_format( $usesearchForId('ee_meeting_price', $attr_list)).' تومان ':''}}
									</span>
{{--                                <button class="reserv-trial">--}}
{{--                                    رزرو رایگان--}}
{{--                                </button>--}}
{{--                                <button class="send-msg">--}}
{{--                                    ارسال پیام--}}
{{--                                </button>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-12" id="teacher-content">
                    <div>


                        <!-- Start Teacher About -->
                        <div id="teacher-about">
                            <div class="top-header" >
                                <div class="img" style="background: url('{{asset('/src/bg/'.searchForId('bg', $attr_list))}}');"></div>
                                <div class="teacher-info">
                                    <div class="avatar">
                                        <div class="teavatar" style="background: url('{{asset('/src/avatar/'.searchForId('avatar', $attr_list))}}');">
                                        </div>
                                    </div>

                                    <div class="left">

                                        <div class="top">
                                            <div class="teacher-nav">
                                                <ul>
                                                    <li><a href="#teacher-scadule"> تقویم</a></li>
                                                    <li><a href="#teacher-comment">نظرات زبان‌آموزان</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bot">

                                            <div class="name-rate">
                                                <h4> {{$user->name}}</h4>
                                                <div class="rate">
														<span class="rate">
															<span class="star">
																<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M8.77333 11.3334L5.63877 13.1374C5.25588 13.3578 4.79625 13.0096 4.90465 12.5814L5.7453 9.26008L3.02716 7.06606C2.67471 6.78156 2.85191 6.21251 3.30357 6.17841L6.90204 5.90675L8.3159 2.7032C8.49133 2.30571 9.05533 2.30571 9.23076 2.7032L10.6446 5.90675L14.2436 6.17841C14.6953 6.21251 14.8725 6.78161 14.52 7.06609L11.8014 9.26008L12.642 12.5814C12.7504 13.0096 12.2908 13.3578 11.9079 13.1374L8.77333 11.3334Z" fill="white"></path>
																</svg>
															</span>
															<span class="num">
																	{{$user->score()['av']}}
															</span>
														</span>
                                                </div>
                                                <div class="stat">
                                                    @php($comm=$user->comments()->where('active','1')->latest()->get())
                                                    ({{$comm->count()}} نظرات)
                                                </div>
                                            </div>

                                            <div class="langs-list">
                                                <ul>
                                                    @foreach($user->languages()->get() as $lang )
                                                        <li>
                                                    	<span class="lang">
														<span class="flag">
															<img src="{{asset('/src/img/lang/'.$lang->img)}}" alt="">
														</span>
														<span class="title"> {{$lang->name}}</span>
											    		</span>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="teacher-experts">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-xsm-12">
                                        <div>
                                            <div class="teacher-expert">
                                                <span class="title">تخصص :</span>
                                                <span class="text">استاد زبان
                                                   @foreach($user->languages()->get() as $lang )
                                                        {{$lang->name}}
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-xsm-12">
                                        <div>
                                            <div class="teacher-expert">
                                                <span class="title">تاريخ عضويت :</span>
                                                <span class="text"> {{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('%A, %d %B %Y')}} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-xsm-12">
                                        <div>
                                            <div class="teacher-expert">
                                                <span class="title">تعداد دانشجویان :</span>
                                                <span class="text">{{$user->students()}}  زبان آموز</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-xsm-12">
                                        <div>
                                            <div class="teacher-expert">
                                                <span class="title">تعداد کلاس ها :</span>
                                                <span class="text"> {{$user->passed_class()}} کلاس برگزار شده</span>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="col-lg-4 col-sm-6 col-xsm-12">--}}
{{--                                        <div>--}}
{{--                                            <div class="teacher-expert">--}}
{{--                                                <span class="title">شروع به موقع کلاس :</span>--}}
{{--                                                <span class="text">86%</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4 col-sm-6 col-xsm-12">--}}
{{--                                        <div>--}}
{{--                                            <div class="teacher-expert">--}}
{{--                                                <span class="title">حضور در کلاس :</span>--}}
{{--                                                <span class="text">100%</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            <div class="teacher-about">
                                <div class="title">
                                    <h3>درباره من</h3>
                                </div>
                                <div class="about-text">
                                    <div>
                                        <p>
                                            {!! $user->bio !!}
                                        </p> تغییر استاد
                                    </div>
                                </div>

                                @if(strlen($user->bio)>800)
                                    <div class="about-more">
                                        <div>
											<span class="down">
												<svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M4.01206 2.89392L6.23406 0.354919C6.27833 0.300743 6.33409 0.257085 6.3973 0.227105C6.46051 0.197125 6.5296 0.181572 6.59956 0.181572C6.66952 0.181572 6.73861 0.197125 6.80182 0.227105C6.86504 0.257085 6.92079 0.300743 6.96506 0.354919C7.06284 0.472267 7.11638 0.620177 7.11638 0.772919C7.11638 0.925661 7.06284 1.07357 6.96506 1.19092L4.38006 4.14892C4.33579 4.20309 4.28004 4.24675 4.21682 4.27673C4.15361 4.30671 4.08452 4.32227 4.01456 4.32227C3.9446 4.32227 3.87551 4.30671 3.8123 4.27673C3.74909 4.24675 3.69333 4.20309 3.64906 4.14892L1.06306 1.19192C0.965287 1.07457 0.911743 0.926661 0.911743 0.773919C0.911743 0.621176 0.965287 0.473267 1.06306 0.355919C1.10733 0.301743 1.16309 0.258085 1.2263 0.228105C1.28951 0.198125 1.3586 0.182572 1.42856 0.182572C1.49852 0.182572 1.56761 0.198125 1.63082 0.228105C1.69404 0.258085 1.74979 0.301743 1.79406 0.355919L4.01206 2.89392Z" fill="currentColor"/>
												</svg>
											</span>
                                            <span>مشاهده بیشتر</span>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                        <!-- End Teacher About -->


                        <!-- Start Teacher Scadule -->
                        <div id="teacher-scadule">


                            <div class="teacher-guide">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div>
                                            <div class="title">
													<span>
														راهنمای تقویم :
													</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div>
                                            <ul>
                                                <li>
                                                    <span class="titl">قابل رزرو</span>
                                                    <span class="color green"></span>
                                                </li>
                                                <li>
                                                    <span class="titl">رزروشده</span>
                                                    <span class="color violet"></span>
                                                </li>
                                                <li>
                                                    <span class="titl">غیرفعال</span>
                                                    <span class="color wgray"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div>
                                            <div class="time-zone">
													<span class="icon">
														<svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M10.8 10.8005C11.5583 10.0422 12.0746 9.07609 12.2838 8.02433C12.493 6.97257 12.3856 5.88239 11.9753 4.89166C11.5649 3.90093 10.8699 3.05414 9.97828 2.45838C9.08665 1.86261 8.03837 1.54462 6.966 1.54462C5.89364 1.54462 4.84536 1.86261 3.95372 2.45838C3.06208 3.05414 2.36713 3.90093 1.95675 4.89166C1.54636 5.88239 1.43898 6.97257 1.64817 8.02433C1.85737 9.07609 2.37374 10.0422 3.132 10.8005L6.966 14.6345L10.8 10.8005ZM6.971 16.8295L2.042 11.9005C1.06702 10.9256 0.403032 9.68349 0.133999 8.33123C-0.135034 6.97897 0.00297517 5.57729 0.530574 4.30347C1.05817 3.02965 1.95166 1.94089 3.09805 1.17487C4.24444 0.408859 5.59224 0 6.971 0C8.34977 0 9.69756 0.408859 10.844 1.17487C11.9903 1.94089 12.8838 3.02965 13.4114 4.30347C13.939 5.57729 14.077 6.97897 13.808 8.33123C13.539 9.68349 12.875 10.9256 11.9 11.9005L6.971 16.8295ZM7.746 6.97148H10.846V8.52048H6.2V3.10048H7.749L7.746 6.97148Z" fill="#92929D"/>
														</svg>

													</span>
                                                <span class="titled">منطقه زمانی :</span>
                                                <span class="text"> (17:47 UTC+02:00)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="today">
									<span class="prev">
										<span class="icon">
											<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5.58609 5.98771L1.29309 1.69471C1.11093 1.50611 1.01014 1.25351 1.01242 0.991311C1.0147 0.729114 1.11986 0.478301 1.30527 0.292893C1.49068 0.107485 1.74149 0.00231622 2.00369 3.78026e-05C2.26589 -0.00224062 2.51849 0.0985538 2.70709 0.280712L7.70709 5.28071C7.89456 5.46824 7.99988 5.72255 7.99988 5.98771C7.99988 6.25288 7.89456 6.50718 7.70709 6.69471L2.70709 11.6947C2.61484 11.7902 2.5045 11.8664 2.3825 11.9188C2.26049 11.9712 2.12927 11.9988 1.99649 12C1.86371 12.0011 1.73203 11.9758 1.60914 11.9255C1.48624 11.8753 1.37459 11.801 1.2807 11.7071C1.1868 11.6132 1.11255 11.5016 1.06227 11.3787C1.01199 11.2558 0.986687 11.1241 0.987841 10.9913C0.988995 10.8585 1.01658 10.7273 1.06899 10.6053C1.1214 10.4833 1.19758 10.373 1.29309 10.2807L5.58609 5.98771Z" fill="currentColor"/>
											</svg>
										</span>
										هفته قبل
									</span>
                                <span class="day">
									{{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now())->format('%B %d، %Y')}} -
                                    {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now()->addDay(7))->format('%B %d، %Y')}}

									{{-- {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now()->addDay(7))}} --}}
									</span>
                                <span class="next">
										هفته بعد
										<span class="icon">
											<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M2.41379 5.98771L6.70679 10.2807C6.8023 10.373 6.87848 10.4833 6.93089 10.6053C6.9833 10.7273 7.01088 10.8585 7.01204 10.9913C7.01319 11.1241 6.98789 11.2558 6.93761 11.3787C6.88733 11.5016 6.81307 11.6132 6.71918 11.7071C6.62529 11.801 6.51364 11.8753 6.39074 11.9255C6.26784 11.9758 6.13616 12.0011 6.00339 12C5.87061 11.9988 5.73939 11.9712 5.61738 11.9188C5.49538 11.8664 5.38503 11.7902 5.29279 11.6947L0.292786 6.69471C0.105315 6.50718 0 6.25288 0 5.98771C0 5.72255 0.105315 5.46824 0.292786 5.28071L5.29279 0.280712C5.48139 0.0985538 5.73399 -0.00224062 5.99619 3.78026e-05C6.25838 0.00231622 6.5092 0.107485 6.6946 0.292893C6.88001 0.478301 6.98518 0.729114 6.98746 0.991311C6.98974 1.25351 6.88894 1.50611 6.70679 1.69471L2.41379 5.98771Z" fill="currentColor"/>
											</svg>
										</span>
									</span>
                            </div>

                            <div id="teacher-clander" data-name="{{$user->name }} {{$user->family }}   " data-lang="سوئدی" data-flag="images/swedish.png" data-pic="images/teacher.png">
                                <div class="right">
                                    <div class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 2V5" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16 2V5" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path opacity="0.4" d="M3.5 9.09009H20.5" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path opacity="0.4" d="M15.6947 13.7H15.7037" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path opacity="0.4" d="M15.6947 16.7H15.7037" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path opacity="0.4" d="M11.9955 13.7H12.0045" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path opacity="0.4" d="M11.9955 16.7H12.0045" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path opacity="0.4" d="M8.29431 13.7H8.30329" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path opacity="0.4" d="M8.29431 16.7H8.30329" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="hours">

                                    </div>
                                </div>
                                <div class="con">
                                    <?php
                                    $w=[  'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
                                    $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
                                    ?>
                                    <ul class="">
                                        @for($i=0 ;$i<10;$i++)
                                            <li class=" " data-date=" {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now()->addDay($i))->format('%A, %d %B  ')}} ">
                                                <?php
                                                $v=verta(\Carbon\Carbon::now()->addDay($i))
                                                ?>
                                                <div class="date">
                                                    <span class="top"> {{$w[$v->dayOfWeek]}} </span>
                                                       <span class="bot" style="font-size: 15px; min-height: 30px">
                                                       {{ $v->day }}
                                                       {{ $m[$v->month-1] }}
                                                  </span>
                                                </div>
                                              <?php
                                            //   ->where('start','>',\Carbon\Carbon::now())
                                             $list= $user->meets()->where('student_id',null) ->where('start','>',\Carbon\Carbon::now())->where('start','>',\Carbon\Carbon::now()->addDays($i)->startOfDay())->where('start','<',\Carbon\Carbon::now()->addDays($i)->endOfDay()) ->orderBy('start')->get();
                                              ?>
                                                @foreach ( $list as $class_li)

                                                  @if(in_array(\Carbon\Carbon::parse($class_li->start)->addMinutes(30) , $list->pluck('start')->toArray()) )

                                                    <div data-level="student" data-id="{{$user->id}}"    class="hour bboxf open " data-cid="{{$class_li->id}}"  data-da="{{\Morilog\Jalali\Jalalian::forge( $class_li->start)->format('%A, %d %B ')}}"  data-time="{{\Carbon\Carbon::parse($class_li->start)->format('H:i')}}" >
                                                        <input type="checkbox" form="plan" class="op" name="reserve[]" value="{{$class_li->start}}" hidden  >
                                                        {{\Morilog\Jalali\Jalalian::forge( $class_li->start)->format(' H:i')}}
                                                         </div>
                                                         @else
                                                         <div data-level="student" data-id="{{$user->id}}"    class="hour bboxf open " data-cid="{{$class_li->id}}"  data-da="{{\Morilog\Jalali\Jalalian::forge( $class_li->start)->format('%A, %d %B ')}}"  data-time="{{\Carbon\Carbon::parse($class_li->start)->format('H:i')}}" >
                                                            <input type="checkbox" form="plan" class="op" name="reserve[]" value="{{$class_li->start}}" hidden  >
                                                            {{\Morilog\Jalali\Jalalian::forge( $class_li->start)->format(' H:i')}}
                                                             </div>
                                                         <div class="hour"></div>
                                                         <div class="hour"></div>


                                                    @endif


                                                @endforeach


                                                {{-- @for($p=0 ;$p<35;$p++)
                                                      <?php
                                                        // $today= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                        // $today2= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                        // $today4= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                        // $today3= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                        // $today5= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                        ?>
                                                    @if($today->addMinutes(($p*30))->greaterThan(\Carbon\Carbon::now() ))
                                                        <div data-level="student" data-id="{{$user->id}}"    class="hour {{($user->empty($today2->addMinutes(($p*30))->format('Y-m-d H:i:s')))?' open ':' '}}  {{($user->reserved($today5->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'  reserved  ':'  '}}" data-cid="{{$user->empty($today4->addMinutes(($p*30))->format('Y-m-d H:i:s'))}}"  data-da="{{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30)))->format('%A, %d %B ')}}"  data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i:s')}}" >
                                                            <input type="checkbox" form="plan" class="op" name="reserve[]" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                                        </div>
                                                    @else
                                                        <div   class="hour {{($user->empty($today3->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'   ':''}}" data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i:s')}}" >
                                                            <input type="checkbox" form="plan" class="op" name=" " value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                                        </div>
                                                    @endif
                                                @endfor --}}


                                            </li>
                                        @endfor

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Teacher Scadule -->





                        <!-- Start Teacher Comment -->
                        <div id="teacher-comment" style="padding: 0 30px; margint-bottom:0px">
                            <h3>نظرات زبان‌آموزان</h3>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="right-avrage">
                                            <div class="title">
                                                <h3>
                                                    <span class="number">%{{$user->score()['per']}}</span>
                                                    <span class="text">میزان رضایت</span>
                                                </h3>
                                            </div>
                                            {{-- <ul>
                                                <li>
                                                    <div class="left">
                                                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.2471 21.222C14.0712 21.222 15.8544 20.6811 17.3711 19.6676C18.8878 18.6542 20.0699 17.2138 20.768 15.5285C21.4661 13.8432 21.6487 11.9888 21.2928 10.1997C20.937 8.4106 20.0586 6.76722 18.7687 5.47736C17.4788 4.1875 15.8355 3.30909 14.0464 2.95322C12.2573 2.59735 10.4029 2.78 8.71757 3.47806C7.03229 4.17613 5.59185 5.35827 4.57841 6.87498C3.56498 8.3917 3.02406 10.1749 3.02406 11.999C3.02406 14.4451 3.99576 16.791 5.72541 18.5207C7.45506 20.2503 9.80097 21.222 12.2471 21.222ZM12.2471 19.377C10.7878 19.377 9.36137 18.9443 8.14806 18.1336C6.93476 17.3229 5.9891 16.1706 5.43068 14.8224C4.87225 13.4743 4.72614 11.9908 5.01082 10.5596C5.29551 9.12844 5.99819 7.8138 7.03003 6.78197C8.06186 5.75014 9.37649 5.04745 10.8077 4.76277C12.2389 4.47809 13.7223 4.6242 15.0705 5.18262C16.4186 5.74105 17.5709 6.6867 18.3816 7.90001C19.1923 9.11331 19.6251 10.5398 19.6251 11.999C19.6248 13.9556 18.8474 15.832 17.4637 17.2154C16.0801 18.5988 14.2037 19.376 12.2471 19.376V19.377ZM15.9361 12.921H8.55806C8.55806 13.8994 8.94672 14.8377 9.63854 15.5295C10.3304 16.2213 11.2687 16.61 12.2471 16.61C13.2254 16.61 14.1638 16.2213 14.8556 15.5295C15.5474 14.8377 15.9361 13.8994 15.9361 12.921Z" fill="#889AAF"/>
                                                            <path d="M13.4361 10.006L15.0711 11.643L16.7051 10.008C16.8988 9.78711 17.0012 9.50073 16.9914 9.20707C16.9815 8.9134 16.8603 8.6345 16.6522 8.42706C16.4441 8.21961 16.1648 8.09918 15.8711 8.09026C15.5774 8.08133 15.2914 8.18458 15.0711 8.379C14.8507 8.18599 14.5654 8.08381 14.2726 8.09311C13.9798 8.10242 13.7015 8.22251 13.4939 8.42911C13.2863 8.63572 13.1648 8.91344 13.1541 9.20615C13.1434 9.49887 13.2441 9.78474 13.4361 10.006Z" fill="#889AAF"/>
                                                            <path d="M7.78909 10.006L9.42409 11.643L11.0581 10.008C11.2518 9.78711 11.3542 9.50073 11.3444 9.20707C11.3346 8.9134 11.2133 8.6345 11.0052 8.42706C10.7971 8.21961 10.5178 8.09918 10.2241 8.09026C9.93046 8.08133 9.64439 8.18458 9.42409 8.379C9.20377 8.18599 8.91839 8.08381 8.62563 8.09311C8.33287 8.10242 8.05456 8.22251 7.84693 8.42911C7.63931 8.63572 7.51786 8.91344 7.50712 9.20615C7.49638 9.49887 7.59716 9.78474 7.78909 10.006Z" fill="#889AAF"/>
                                                        </svg>

                                                    </div>
                                                    <div class="right">
                                                        <div class="bar"><span style="width: {{$user->score()['pr5']}}%"></span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.24706 19.222C11.0712 19.222 12.8544 18.6811 14.3711 17.6676C15.8878 16.6542 17.0699 15.2138 17.768 13.5285C18.4661 11.8432 18.6487 9.98877 18.2928 8.19969C17.937 6.4106 17.0586 4.76722 15.7687 3.47736C14.4788 2.1875 12.8355 1.30909 11.0464 0.953222C9.25729 0.597351 7.40285 0.779997 5.71757 1.47806C4.03229 2.17613 2.59185 3.35827 1.57841 4.87498C0.56498 6.3917 0.0240593 8.17487 0.0240593 9.999C0.0240593 12.4451 0.995764 14.791 2.72541 16.5207C4.45506 18.2503 6.80097 19.222 9.24706 19.222ZM9.24706 17.377C7.78783 17.377 6.36137 16.9443 5.14806 16.1336C3.93476 15.3229 2.9891 14.1706 2.43068 12.8224C1.87225 11.4743 1.72614 9.99082 2.01082 8.55963C2.29551 7.12844 2.99819 5.8138 4.03003 4.78197C5.06186 3.75014 6.37649 3.04745 7.80768 2.76277C9.23887 2.47809 10.7223 2.6242 12.0705 3.18262C13.4186 3.74105 14.5709 4.6867 15.3816 5.90001C16.1923 7.11331 16.6251 8.53977 16.6251 9.999C16.6248 11.9556 15.8474 13.832 14.4637 15.2154C13.0801 16.5988 11.2037 17.376 9.24706 17.376V17.377ZM13.8591 10.921H12.0141C12.0141 11.6549 11.7225 12.3587 11.2036 12.8776C10.6847 13.3965 9.98091 13.688 9.24706 13.688C8.5132 13.688 7.80941 13.3965 7.29049 12.8776C6.77158 12.3587 6.48006 11.6549 6.48006 10.921H4.63506C4.63506 12.1441 5.12091 13.317 5.98574 14.1818C6.85056 15.0467 8.02351 15.5325 9.24656 15.5325C10.4696 15.5325 11.6426 15.0467 12.5074 14.1818C13.3722 13.317 13.8581 12.1441 13.8581 10.921H13.8591ZM12.9361 9.076C13.2096 9.076 13.477 8.99489 13.7044 8.84293C13.9318 8.69096 14.1091 8.47497 14.2138 8.22226C14.3185 7.96955 14.3458 7.69147 14.2925 7.4232C14.2391 7.15492 14.1074 6.90849 13.914 6.71508C13.7206 6.52166 13.4741 6.38994 13.2059 6.33658C12.9376 6.28322 12.6595 6.3106 12.4068 6.41528C12.1541 6.51996 11.9381 6.69722 11.7861 6.92465C11.6342 7.15208 11.5531 7.41947 11.5531 7.69301C11.5531 8.0598 11.6988 8.41157 11.9581 8.67093C12.2175 8.9303 12.5693 9.076 12.9361 9.076ZM5.55806 9.076C5.83138 9.07502 6.09827 8.99307 6.32504 8.8405C6.55182 8.68794 6.7283 8.4716 6.83221 8.2188C6.93612 7.96601 6.9628 7.68809 6.90887 7.42014C6.85495 7.1522 6.72283 6.90624 6.52922 6.71332C6.33561 6.52041 6.08917 6.38918 5.82103 6.33623C5.5529 6.28327 5.27508 6.31094 5.02266 6.41577C4.77024 6.52059 4.55454 6.69785 4.40279 6.92517C4.25105 7.1525 4.17006 7.41969 4.17006 7.69301C4.17006 7.87504 4.206 8.05529 4.27581 8.22341C4.34562 8.39153 4.44794 8.54422 4.5769 8.67271C4.70585 8.8012 4.8589 8.90296 5.02727 8.97217C5.19564 9.04138 5.37602 9.07666 5.55806 9.076Z" fill="#889AAF"/>
                                                        </svg>

                                                    </div>
                                                    <div class="right">
                                                        <div class="bar"><span style="width: {{$user->score()['pr4']}}%"></span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.24706 19.222C11.0712 19.222 12.8544 18.6811 14.3711 17.6676C15.8878 16.6542 17.0699 15.2138 17.768 13.5285C18.4661 11.8432 18.6487 9.98877 18.2928 8.19969C17.937 6.4106 17.0586 4.76722 15.7687 3.47736C14.4788 2.1875 12.8355 1.30909 11.0464 0.953222C9.25729 0.597351 7.40285 0.779997 5.71757 1.47806C4.03229 2.17613 2.59185 3.35827 1.57841 4.87498C0.56498 6.3917 0.0240593 8.17487 0.0240593 9.999C0.0240593 12.4451 0.995764 14.791 2.72541 16.5207C4.45506 18.2503 6.80097 19.222 9.24706 19.222ZM9.24706 17.377C7.78783 17.377 6.36137 16.9443 5.14806 16.1336C3.93476 15.3229 2.9891 14.1706 2.43068 12.8224C1.87225 11.4743 1.72614 9.99082 2.01082 8.55963C2.29551 7.12844 2.99819 5.8138 4.03003 4.78197C5.06186 3.75014 6.37649 3.04745 7.80768 2.76277C9.23887 2.47809 10.7223 2.6242 12.0705 3.18262C13.4186 3.74105 14.5709 4.6867 15.3816 5.90001C16.1923 7.11331 16.6251 8.53977 16.6251 9.999C16.6248 11.9556 15.8474 13.832 14.4637 15.2154C13.0801 16.5988 11.2037 17.376 9.24706 17.376V17.377ZM12.9361 11.843H5.55806V13.688H12.9361V11.843ZM12.9361 9.076C13.2096 9.076 13.477 8.99489 13.7044 8.84293C13.9318 8.69096 14.1091 8.47497 14.2138 8.22226C14.3185 7.96955 14.3458 7.69147 14.2925 7.4232C14.2391 7.15492 14.1074 6.90849 13.914 6.71508C13.7206 6.52166 13.4741 6.38994 13.2059 6.33658C12.9376 6.28322 12.6595 6.3106 12.4068 6.41528C12.1541 6.51996 11.9381 6.69722 11.7861 6.92465C11.6342 7.15208 11.5531 7.41947 11.5531 7.69301C11.5531 8.0598 11.6988 8.41157 11.9581 8.67093C12.2175 8.9303 12.5693 9.076 12.9361 9.076ZM5.55806 9.076C5.83138 9.07502 6.09827 8.99307 6.32504 8.8405C6.55182 8.68794 6.7283 8.4716 6.83221 8.2188C6.93612 7.96601 6.9628 7.68809 6.90887 7.42014C6.85495 7.1522 6.72283 6.90624 6.52922 6.71332C6.33561 6.52041 6.08917 6.38918 5.82103 6.33623C5.5529 6.28327 5.27508 6.31094 5.02266 6.41577C4.77024 6.52059 4.55454 6.69785 4.40279 6.92517C4.25105 7.1525 4.17006 7.41969 4.17006 7.69301C4.17006 7.87504 4.206 8.05529 4.27581 8.22341C4.34562 8.39153 4.44794 8.54422 4.5769 8.67271C4.70585 8.8012 4.8589 8.90296 5.02727 8.97217C5.19564 9.04138 5.37602 9.07666 5.55806 9.076Z" fill="#889AAF"/>
                                                        </svg>


                                                    </div>
                                                    <div class="right">
                                                        <div class="bar"><span style="width: {{$user->score()['pr3']}}%"></span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.24706 19.222C11.0712 19.222 12.8544 18.6811 14.3711 17.6676C15.8878 16.6542 17.0699 15.2138 17.768 13.5285C18.4661 11.8432 18.6487 9.98877 18.2928 8.19969C17.937 6.4106 17.0586 4.76722 15.7687 3.47736C14.4788 2.1875 12.8355 1.30909 11.0464 0.953222C9.25729 0.597351 7.40285 0.779997 5.71757 1.47806C4.03229 2.17613 2.59185 3.35827 1.57841 4.87498C0.56498 6.3917 0.0240593 8.17487 0.0240593 9.999C0.0240593 12.4451 0.995764 14.791 2.72541 16.5207C4.45506 18.2503 6.80097 19.222 9.24706 19.222ZM9.24706 17.377C7.78783 17.377 6.36137 16.9443 5.14806 16.1336C3.93476 15.3229 2.9891 14.1706 2.43068 12.8224C1.87225 11.4743 1.72614 9.99082 2.01082 8.55963C2.29551 7.12844 2.99819 5.8138 4.03003 4.78197C5.06186 3.75014 6.37649 3.04745 7.80768 2.76277C9.23887 2.47809 10.7223 2.6242 12.0705 3.18262C13.4186 3.74105 14.5709 4.6867 15.3816 5.90001C16.1923 7.11331 16.6251 8.53977 16.6251 9.999C16.6248 11.9556 15.8474 13.832 14.4637 15.2154C13.0801 16.5988 11.2037 17.376 9.24706 17.376V17.377ZM13.8591 14.61C13.8591 13.387 13.3732 12.214 12.5084 11.3492C11.6436 10.4844 10.4706 9.9985 9.24756 9.9985C8.02451 9.9985 6.85156 10.4844 5.98674 11.3492C5.12191 12.214 4.63606 13.387 4.63606 14.61H6.48006C6.48006 13.8762 6.77158 13.1724 7.29049 12.6534C7.80941 12.1345 8.5132 11.843 9.24706 11.843C9.98091 11.843 10.6847 12.1345 11.2036 12.6534C11.7225 13.1724 12.0141 13.8762 12.0141 14.61H13.8591ZM12.9361 9.076C13.2096 9.076 13.477 8.99489 13.7044 8.84293C13.9318 8.69096 14.1091 8.47497 14.2138 8.22226C14.3185 7.96955 14.3458 7.69147 14.2925 7.4232C14.2391 7.15492 14.1074 6.90849 13.914 6.71508C13.7206 6.52166 13.4741 6.38994 13.2059 6.33658C12.9376 6.28322 12.6595 6.3106 12.4068 6.41528C12.1541 6.51996 11.9381 6.69722 11.7861 6.92465C11.6342 7.15208 11.5531 7.41947 11.5531 7.69301C11.5531 8.0598 11.6988 8.41157 11.9581 8.67093C12.2175 8.9303 12.5693 9.076 12.9361 9.076ZM5.55806 9.076C5.83138 9.07502 6.09827 8.99307 6.32504 8.8405C6.55182 8.68794 6.7283 8.4716 6.83221 8.2188C6.93612 7.96601 6.9628 7.68809 6.90887 7.42014C6.85495 7.1522 6.72283 6.90624 6.52922 6.71332C6.33561 6.52041 6.08917 6.38918 5.82103 6.33623C5.5529 6.28327 5.27508 6.31094 5.02266 6.41577C4.77024 6.52059 4.55454 6.69785 4.40279 6.92517C4.25105 7.1525 4.17006 7.41969 4.17006 7.69301C4.17006 7.87504 4.206 8.05529 4.27581 8.22341C4.34562 8.39153 4.44794 8.54422 4.5769 8.67271C4.70585 8.8012 4.8589 8.90296 5.02727 8.97217C5.19564 9.04138 5.37602 9.07666 5.55806 9.076Z" fill="#889AAF"/>
                                                        </svg>

                                                    </div>
                                                    <div class="right">
                                                        <div class="bar"><span style="width: {{$user->score()['pr2']}}%"></span></div>
                                                    </div>
                                                </li>
                                            </ul> --}}
                                            <div class="avr">
                                                <span>امتیاز  :</span>
                                                <span class="num">از  {{$comm->count()}} نظر</span>
                                            </div>
{{--                                            <div class="all">--}}
{{--                                                <a href="#" class="view">مشاهده همه نظرات</a>--}}
{{--                                            </div>--}}
                                        </div>


                                        <div class="comment-list">
                                            <ul class="comment-list owl-carousel owl-theme">
                                                @foreach($comm as $com)
                                                        @php($student=\App\Models\User::find($com->user_id))
                                                        @php($v=verta($com->created_at))
                                                <li>
                                                    <div class="single-comment">
                                                        <div class="pic">
																<span class="icon">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M6.51599 1.99707H9.09799C10.4676 1.99707 11.7811 2.54113 12.7495 3.50957C13.7179 4.47801 14.262 5.79149 14.262 7.16107C14.262 8.53065 13.7179 9.84413 12.7495 10.8126C11.7811 11.781 10.4676 12.3251 9.09799 12.3251V14.5841C5.86999 13.2971 1.35199 11.3571 1.35199 7.16107C1.35199 5.79149 1.89605 4.47801 2.86449 3.50957C3.83293 2.54113 5.14641 1.99707 6.51599 1.99707Z" fill="white"/>
																	</svg>
																</span>
                                                            <div class="img" style="background: url('{{asset('/src/avatar/'.$student->attr('avatar'))}}');">

                                                            </div>
                                                        </div>
                                                        <div class="name">
                                                            <span>  {{$student->name}} </span>
                                                        </div>
                                                        <div class="date">
																<span>
																		{{$v->format('%B %d، %Y')}}
																</span>
                                                        </div>
                                                        <div class="text">
                                                            <p>
                                                                {{$com->comment}}
                                                            </p>
                                                        </div>
                                                        <div class="rate">
																<span class="rate">
																	<span class="star">
																		<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path d="M8.77333 11.3334L5.63877 13.1374C5.25588 13.3578 4.79625 13.0096 4.90465 12.5814L5.7453 9.26008L3.02716 7.06606C2.67471 6.78156 2.85191 6.21251 3.30357 6.17841L6.90204 5.90675L8.3159 2.7032C8.49133 2.30571 9.05533 2.30571 9.23076 2.7032L10.6446 5.90675L14.2436 6.17841C14.6953 6.21251 14.8725 6.78161 14.52 7.06609L11.8014 9.26008L12.642 12.5814C12.7504 13.0096 12.2908 13.3578 11.9079 13.1374L8.77333 11.3334Z" fill="white"></path>
																		</svg>
																	</span>
																	<span class="num">
																	{{$com->rate}}
																	</span>
																</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Teacher Comment -->
                        <!-- Start teacher-expert-list -->
                        <div id="teacher-expert-list" style="padding: 0 30px; margint-bottom:0px">
                            <h3>سایر مهارت ها</h3>

                            <div class="tab-nav">
                                <ul>
                                    <li class="active"><span>  اصلی</span></li>
                                    <li><span>آزمون ها</span></li>
                                </ul>
                            </div>
                            <div class="tab-container">
                                <ul>
                                    <li class="active">
                                        <div>
                                            <div class="expert-box" {{$user->education_level()?'':'hidden'}}>
                                                <label for="">سطوح تدریس</label>
                                                <ul>
                                                    <li class="{{searchForId('Starter', $attr_list)?'':'disn'}}"><span class="expert-box-single">Starter</span></li>
                                                    <li class="{{searchForId('Elementary', $attr_list)?'':'disn'}}"><span class="expert-box-single">Elementary</span></li>
                                                    <li class="{{searchForId('Intermediate', $attr_list)?'':'disn'}}"><span class="expert-box-single">Intermediate</span></li>
                                                    <li class="{{searchForId('Advanced', $attr_list)?'':'disn'}}"><span class="expert-box-single">Advanced</span></li>
                                                    <li class="{{searchForId('Mastery', $attr_list)?'':'disn'}}"><span class="expert-box-single">Mastery</span></li>
                                                    <li class="{{searchForId('Upper_intermediate', $attr_list)?'':'disn'}}"><span class="expert-box-single">Upper Intermediate</span></li>
                                                </ul>
                                            </div>
                                            <div class="expert-box" {{$user->teacher_race()?'':'hidden'}}>
                                                <label for="">لهجه مدرس</label>
                                                <ul>
                                                    <li class="{{searchForId('American_Accent', $attr_list)?'':'disn'}}"><span class="expert-box-single">American Accent</span></li>
                                                    <li class="{{searchForId('British_Accent', $attr_list)?'':'disn'}}"><span class="expert-box-single">British Accent</span></li>
                                                    <li class="{{searchForId('Australian_Accent', $attr_list)?'':'disn'}}"><span class="expert-box-single">Australian Accent</span></li>
                                                    <li class="{{searchForId('Indian_Accent', $attr_list)?'':'disn'}}"><span class="expert-box-single">Indian Accent</span></li>
                                                    <li class="{{searchForId('Irish_Accent', $attr_list)?'':'disn'}}"><span class="expert-box-single">Irish Accent</span></li>
                                                    <li class="{{searchForId('Scottish_Accent', $attr_list)?'':'disn'}}"><span class="expert-box-single">Scottish Accent</span></li>
                                                    <li class="{{searchForId('South_African_Accent', $attr_list)?'':'disn'}}"><span class="expert-box-single">South African Accent</span></li>

                                                </ul>
                                            </div>
                                            <div class="expert-box" {{$user->teacher_age_education_level()?'':'hidden'}}>
                                                <label for="">سن</label>
                                                <ul>
                                                    <li class="{{searchForId('Children', $attr_list)?'':'disn'}}"><span class="expert-box-single">Children (4-11)</span></li>
                                                    <li class="{{searchForId('Teenagers', $attr_list)?'':'disn'}}"><span class="expert-box-single">Teenagers (12-18)</span></li>
                                                    <li class="{{searchForId('Adults', $attr_list)?'':'disn'}}"><span class="expert-box-single">Adults (18+)</span></li>
                                                </ul>
                                            </div>
                                            <div class="expert-box" {{$user->teacher_class_content()?'':'hidden'}}>
                                                <label for="">کلاس شامل چه مواردی میشود</label>
                                                <ul>
                                                    <li class="{{searchForId('Curriculum', $attr_list)?'':'disn'}}"><span class="expert-box-single">Curriculum</span></li>
                                                    <li class="{{searchForId('Homework', $attr_list)?'':'disn'}}"><span class="expert-box-single">Homework</span></li>
                                                    <li class="{{searchForId('Learning_Materials', $attr_list)?'':'disn'}}"><span class="expert-box-single">Learning Materials</span></li>
                                                    <li class="{{searchForId('Writing_Exercises', $attr_list)?'':'disn'}}"><span class="expert-box-single">Writing Exercises</span></li>
                                                    <li class="{{searchForId('Lesson_Plans', $attr_list)?'':'disn'}}"><span class="expert-box-single">Lesson Plans</span></li>
                                                    <li class="{{searchForId('Proficiency_Assessment', $attr_list)?'':'disn'}}"><span class="expert-box-single">Proficiency Assessment</span></li>
                                                    <li class="{{searchForId('Quizzes_Tests', $attr_list)?'':'disn'}}"><span class="expert-box-single">Quizzes Tests</span></li>
                                                    <li class="{{searchForId('Reading_Exercises', $attr_list)?'':'disn'}}"><span class="expert-box-single">Reading Exercises</span></li>



                                                </ul>
                                            </div>
                                            <div class="expert-box" {{$user->teacher_class_subject()?'':'hidden'}}>
                                                <label for="">موضوعات</label>
                                                <ul>
                                                    <li class="{{searchForId('Business_English', $attr_list)?'':'disn'}}"><span class="expert-box-single">Business English</span></li>
                                                    <li class="{{searchForId('Interview_Preparation', $attr_list)?'':'disn'}}"><span class="expert-box-single">Interview Preparation</span></li>
                                                    <li class="{{searchForId('Reading_Comprehension', $attr_list)?'':'disn'}}"><span class="expert-box-single">Reading Comprehension</span></li>
                                                    <li class="{{searchForId('Listening_Comprehension', $attr_list)?'':'disn'}}"><span class="expert-box-single">Listening Comprehension</span></li>
                                                    <li class="{{searchForId('Speaking_Practice', $attr_list)?'':'disn'}}"><span class="expert-box-single">Speaking Practice</span></li>
                                                    <li class="{{searchForId('Writing_Correction', $attr_list)?'':'disn'}}"><span class="expert-box-single">Writing Correction</span></li>
                                                    <li class="{{searchForId('Vocabulary_Development', $attr_list)?'':'disn'}}"><span class="expert-box-single">Vocabulary Development</span></li>
                                                    <li class="{{searchForId('Grammar_Development', $attr_list)?'':'disn'}}"><span class="expert-box-single">Grammar Development</span></li>
                                                    <li class="{{searchForId('Academic_English', $attr_list)?'':'disn'}}"><span class="expert-box-single">Academic English</span></li>
                                                    <li class="{{searchForId('Accent_Reduction', $attr_list)?'':'disn'}}"><span class="expert-box-single">Accent Reduction</span></li>
                                                    <li class="{{searchForId('Phonetics', $attr_list)?'':'disn'}}"><span class="expert-box-single">Phonetics</span></li>
                                                    <li class="{{searchForId('Colloquial_English', $attr_list)?'':'disn'}}"><span class="expert-box-single">Colloquial English</span></li>
                                                    <li class="{{searchForId('Phonetics', $attr_list)?'':'disn'}}"><span class="expert-box-single">Phonetics</span></li>

                                                </ul>
                                            </div>

                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="expert-box" {{$user->teacher_class_english()?'':'hidden'}}>
                                                <label for="">  انگلیسی:
                                                </label>
                                                <ul>
                                                    <li class="{{searchForId('TOEFL', $attr_list)?'':'disn'}}"><span class="expert-box-single">TOEFL</span></li>
                                                    <li class="{{searchForId('IELTS', $attr_list)?'':'disn'}}"><span class="expert-box-single">IELTS</span></li>
                                                    <li class="{{searchForId('PTE', $attr_list)?'':'disn'}}"><span class="expert-box-single">PTE</span></li>
                                                    <li class="{{searchForId('GRE', $attr_list)?'':'disn'}}"><span class="expert-box-single">GRE</span></li>
                                                    <li class="{{searchForId('CELPIP', $attr_list)?'':'disn'}}"><span class="expert-box-single">CELPIP</span></li>
                                                    <li class="{{searchForId('Duolingo', $attr_list)?'':'disn'}}"><span class="expert-box-single">Duolingo</span></li>
                                                    <li class="{{searchForId('TOEIC', $attr_list)?'':'disn'}}"><span class="expert-box-single">TOEIC</span></li>
                                                    <li class="{{searchForId('KET', $attr_list)?'':'disn'}}"><span class="expert-box-single">KET</span></li>
                                                    <li class="{{searchForId('PET', $attr_list)?'':'disn'}}"><span class="expert-box-single">PET</span></li>
                                                    <li class="{{searchForId('CAE', $attr_list)?'':'disn'}}"><span class="expert-box-single">CAE</span></li>
                                                    <li class="{{searchForId('FCE', $attr_list)?'':'disn'}}"><span class="expert-box-single">FCE</span></li>
                                                    <li class="{{searchForId('CPE', $attr_list)?'':'disn'}}"><span class="expert-box-single">CPE</span></li>
                                                    <li class="{{searchForId('BEC', $attr_list)?'':'disn'}}"><span class="expert-box-single">BEC</span></li>
                                                    <li class="{{searchForId('TOEFLPhD', $attr_list)?'':'disn'}}"><span class="expert-box-single">TOEFLPhD</span></li>


                                                </ul>
                                            </div>
                                            <div class="expert-box" {{$user->teacher_class_french()?'':'hidden'}}>
                                                <label for="">  فرانسه:
                                                </label>
                                                <ul>

                                                    <li class="{{searchForId('TCF', $attr_list)?'':'disn'}}"><span class="expert-box-single">TCF</span></li>
                                                    <li class="{{searchForId('TEF', $attr_list)?'':'disn'}}"><span class="expert-box-single">TEF</span></li>
                                                    <li class="{{searchForId('DELF', $attr_list)?'':'disn'}}"><span class="expert-box-single">DELF</span></li>
                                                    <li class="{{searchForId('DALF', $attr_list)?'':'disn'}}"><span class="expert-box-single">DALF</span></li>

                                                </ul>
                                            </div>
                                            <div class="expert-box" {{$user->teacher_class_german()?'':'hidden'}}>
                                                <label for="">آلمانی:
                                                </label>
                                                <ul>
                                                    <li class="{{searchForId('Goethe', $attr_list)?'':'disn'}}"><span class="expert-box-single">Goethe</span></li>
                                                    <li class="{{searchForId('Telc', $attr_list)?'':'disn'}}"><span class="expert-box-single">Telc</span></li>
                                                    <li class="{{searchForId('Test_Daf', $attr_list)?'':'disn'}}"><span class="expert-box-single">Test Daf</span></li>
                                                    <li class="{{searchForId('OSD', $attr_list)?'':'disn'}}"><span class="expert-box-single">OSD</span></li>


                                                </ul>
                                            </div>
                                            <div class="expert-box" {{$user->teacher_class_turkey()?'':'hidden'}}>
                                                <label for="">ترکی استانبولی:
                                                </label>
                                                <ul>
                                                    <li class="{{searchForId('TOMER', $attr_list)?'':'disn'}}"><span class="expert-box-single">TOMER</span></li>
                                                    <li class="{{searchForId('TYS', $attr_list)?'':'disn'}}"><span class="expert-box-single">TYS</span></li>


                                                </ul>
                                            </div>
                                            <div class="expert-box" {{$user->teacher_class_spain()?'':'hidden'}}>
                                                <label for="">اسپانیایی:
                                                </label>
                                                <ul>
                                                    <li class="{{searchForId('DELE', $attr_list)?'':'disn'}}"><span class="expert-box-single">DELE</span></li>
                                                    <li class="{{searchForId('SIELE', $attr_list)?'':'disn'}}"><span class="expert-box-single">SIELE</span></li>

                                                </ul>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- end teacher-expert-list -->

                        <!-- Start Teacher Comment Form -->
                        <div id="teacher-comment-form" style="padding: 0 30px; margint-bottom:0px">
                            <h3>نظر خود را بنویسید</h3>
                            <?php if($errors->any()): ?>
                            <div class="e_section" id="e_section">
                                <?php echo implode('', $errors->all('<span class="text text-danger">:message</span><br>')); ?>
                            </div>
                            <?php endif; ?>
                            <form action="{{{route('home.comment.teacher',$user->id)}}}" method="post">
                                @csrf
                                @method('post')
                                <div class="input-container icon">
                                    <span>نام*</span>
                                    <i class="right-bg">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.9414 20.634C8.9636 20.634 7.0302 20.0475 5.38571 18.9487C3.74122 17.8499 2.45949 16.2881 1.70262 14.4608C0.945739 12.6336 0.747706 10.6229 1.13356 8.68307C1.51941 6.74326 2.47182 4.96143 3.87034 3.56291C5.26887 2.16438 7.0507 1.21198 8.99051 0.826124C10.9303 0.440272 12.941 0.638305 14.7682 1.39518C16.5955 2.15206 18.1573 3.43378 19.2561 5.07827C20.3549 6.72277 20.9414 8.65616 20.9414 10.634C20.9414 13.2861 19.8878 15.8297 18.0125 17.705C16.1371 19.5804 13.5936 20.634 10.9414 20.634ZM10.9414 18.634C12.5237 18.634 14.0704 18.1648 15.386 17.2857C16.7016 16.4067 17.7269 15.1573 18.3324 13.6954C18.9379 12.2336 19.0964 10.6251 18.7877 9.07325C18.479 7.52141 17.7171 6.09594 16.5983 4.97712C15.4794 3.8583 14.054 3.09638 12.5021 2.78769C10.9503 2.47901 9.34175 2.63744 7.87994 3.24294C6.41813 3.84844 5.16871 4.87382 4.28965 6.18941C3.4106 7.50501 2.94141 9.05173 2.94141 10.634C2.94141 12.7557 3.78427 14.7905 5.28456 16.2908C6.78485 17.7911 8.81968 18.634 10.9414 18.634ZM5.94141 10.634H7.94141C7.94141 11.4296 8.25748 12.1927 8.82009 12.7553C9.3827 13.3179 10.1458 13.634 10.9414 13.634C11.7371 13.634 12.5001 13.3179 13.0627 12.7553C13.6253 12.1927 13.9414 11.4296 13.9414 10.634H15.9414C15.9414 11.9601 15.4146 13.2318 14.4769 14.1695C13.5393 15.1072 12.2675 15.634 10.9414 15.634C9.61533 15.634 8.34356 15.1072 7.40588 14.1695C6.46819 13.2318 5.94141 11.9601 5.94141 10.634Z" fill="#8895BA"></path>
                                        </svg>
                                    </i>
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="">
                                </div>
                                <div class="input-container textarea icon">
                                    <span>نظرتان را بنویسید*</span>
                                    <i class="right-bg">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0.948914H12C14.1217 0.948914 16.1566 1.79177 17.6569 3.29206C19.1571 4.79235 20 6.82718 20 8.94891C20 11.0706 19.1571 13.1055 17.6569 14.6058C16.1566 16.1061 14.1217 16.9489 12 16.9489V20.4489C7 18.4489 0 15.4489 0 8.94891C0 6.82718 0.842855 4.79235 2.34315 3.29206C3.84344 1.79177 5.87827 0.948914 8 0.948914ZM10 14.9489H12C12.7879 14.9489 13.5681 14.7937 14.2961 14.4922C15.0241 14.1907 15.6855 13.7487 16.2426 13.1916C16.7998 12.6344 17.2417 11.973 17.5433 11.245C17.8448 10.5171 18 9.73685 18 8.94891C18 8.16098 17.8448 7.38077 17.5433 6.65281C17.2417 5.92486 16.7998 5.26342 16.2426 4.70627C15.6855 4.14912 15.0241 3.70716 14.2961 3.40564C13.5681 3.10411 12.7879 2.94891 12 2.94891H8C6.4087 2.94891 4.88258 3.58105 3.75736 4.70627C2.63214 5.83149 2 7.35761 2 8.94891C2 12.5589 4.462 14.9149 10 17.4289V14.9489Z" fill="#8895BA"></path>
                                        </svg>
                                    </i>
                                    <textarea name="comment" id="" cols="30" rows="10">{{old('comment')}}</textarea>
                                </div>
                                <div class="button-container">
                                    <div class="rate">
                                        <input {{old('rate')=='5'?'checked':""}} type="radio" id="star5" name="rate" value="5">
                                        <label for="star5" title="text">5 stars</label>
                                        <input {{old('rate')=='4'?'checked':""}} type="radio" id="star4" name="rate" value="4">
                                        <label for="star4" title="text">4 stars</label>
                                        <input {{old('rate')=='3'?'checked':""}} type="radio" id="star3" name="rate" value="3">
                                        <label for="star3" title="text">3 stars</label>
                                        <input {{old('rate')=='2'?'checked':""}} type="radio" id="star2" name="rate" value="2">
                                        <label for="star2" title="text">2 stars</label>
                                        <input {{old('rate')=='1'?'checked':""}} type="radio" id="star1" name="rate" value="1">
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    <div class="button">

                                        <button class="next">
                                            <span class="text">ثبت نظر</span>
                                            <span class="icon">
														<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M13.5451 5.69702H3.89112L7.66112 1.95703C7.87308 1.73949 7.9917 1.44778 7.9917 1.14404C7.9917 0.840311 7.87308 0.548539 7.66112 0.330994C7.44644 0.118963 7.15685 6.10352e-05 6.85512 6.10352e-05C6.55338 6.10352e-05 6.2638 0.118963 6.04912 0.330994L0.317116 6.03101C0.112086 6.2491 -0.00205994 6.53715 -0.00205994 6.83649C-0.00205994 7.13582 0.112086 7.42394 0.317116 7.64203L6.04912 13.342C6.2638 13.5541 6.55338 13.6729 6.85512 13.6729C7.15685 13.6729 7.44644 13.5541 7.66112 13.342C7.86825 13.1263 7.98736 12.841 7.99512 12.542C7.99218 12.2402 7.87247 11.9514 7.66112 11.736L3.89112 7.98102H13.5451C13.8418 7.97223 14.1233 7.84824 14.33 7.63531C14.5367 7.42239 14.6523 7.13728 14.6523 6.84052C14.6523 6.54375 14.5367 6.25864 14.33 6.04572C14.1233 5.83279 13.8418 5.7088 13.5451 5.70001V5.69702Z" fill="currentColor"></path>
														</svg>
													</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end Teacher Comment Form -->

                        <!-- Start Teacher Resume -->
                        <div id="teacher-resume">
                            <h3>رزومه کاری و تحصیلی</h3>

                            <div class="tab-nav">
                                <ul>
                                    <li class="active"><span>سابقه کار</span></li>
                                    <li><span>تحصیلات</span></li>
                                    <li><span>مدارک</span></li>
                                </ul>
                            </div>

                            <div class="tab-container">
                                <ul>
                                    <li class="active">
                                        <div>
                                            <div class="resume-section">
                                                <ul>
                                                    @foreach($user->resumes()->whereType('education')->get() as $res)
                                                    <li>
                                                        <div class="resume">
                                                            <div class="right">
                                                                <span>{{$res->from}}</span>
                                                            </div>
                                                            <div class="left">
                                                                <h5>{{$res->title}} ({{$res->place}})</h5>
                                                                <p>
                                                                    {{$res->info}}
                                                                </p>
                                                                <span class="date">
																		<span>{{$res->from}}-{{$res->till}}</span>
																	</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="resume-section">
                                                <ul>
                                                    @foreach($user->resumes()->whereType('sabeghe')->get() as $res)
                                                        <li>
                                                            <div class="resume">
                                                                <div class="right">
                                                                    <span>{{$res->from}}</span>
                                                                </div>
                                                                <div class="left">
                                                                    <h5>{{$res->title}} ({{$res->place}})</h5>
                                                                    <p>
                                                                        {{$res->info}}
                                                                    </p>
                                                                    <span class="date">
																		<span>{{$res->from}}-{{$res->till}}</span>
																	</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="resume-section">
                                                <ul>
                                                    @foreach($user->resumes()->whereType('licence')->get() as $res)
                                                        <li>
                                                            <div class="resume">
                                                                <div class="right">
                                                                    <span>{{$res->from}}</span>
                                                                </div>
                                                                <div class="left">
                                                                    <h5>{{$res->title}} ({{$res->place}})</h5>
                                                                    <p>
                                                                        {{$res->info}}
                                                                    </p>
                                                                    <span class="date">
																		<span>{{$res->from}}-{{$res->till}}</span>
																	</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Teacher Resume -->

                        <!-- Start Teacher Blog -->
                        <div id="teacher-blog">

                            <div class="top-title">
                                <h3>مقالات استاد</h3>
                                <a href="#" class="more">مشاهده همه</a>
                            </div>

                            <div class="row">
                                @foreach($user->articles()->whereActive('1')->whereSubmit('1')->latest()->take(3)->get() as $article)
                                    @php($v=verta($article->created_at))
                                <div class="col-lg-4 col-sm-12">
                                    <div>

                                        <div class="single-blog">
                                            <div class="top">
                                                <div class="info">
                                                    <div class="author">
                                                        <div class="img" style="background: url('{{asset('src/avatar/'.searchForId('avatar', $attr_list))}}');">

                                                        </div>
                                                        <span class="name">  {{$article->user->name}}</span>
                                                    </div>

                                                    <span class="date">
												{{$v->format('%B %d، %Y')}}
														</span>
                                                </div>
                                                <div class="img">
                                                    <a href="#" style="background: url('{{asset('src/article/images/').'/'.$article->image}}');">

                                                    </a>
                                                </div>
                                            </div>

                                            <div class="blog-text">
                                                <h3>
                                                    <a href="{{route('home.single.article',$article->id)}}"> {{$article->title}} </a>
                                                </h3>
                                                <p>
                                                    {{mb_strimwidth(strip_tags(html_entity_decode(  $article->article)), 0, 100)}} ...
                                                </p>

                                            </div>

                                            <div class="more">
                                                <a href="{{route('home.single.article',$article->id)}}">مشاهده مطلب</a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                    @endforeach

                            </div>

                        </div>
                        <!-- End Teacher Blog -->

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Teacher Section -->






    <div class="popup popupc" id="level1_{{$user->id}}">
        <div>
            <div>
                <div>
                    <div class="popup-container payprocesspop" >
						<span class="close close_popup">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
							</svg>
						</span>

                        <div class="payprocess">
                            <ul>
                                <li class="step1 active">
									<span class="circ">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9.003 14L16.073 6.929L14.659 5.515L9.003 11.172L6.174 8.343L4.76 9.757L9.003 14Z" fill="#57BA7E"/>
										</svg>
									</span>
                                    <div class="step-title">
                                        <span>مرحله یک :</span>
                                        <span class="val">نوع کلاس</span>
                                    </div>
                                </li>
                                <li class="step2">
									<span class="circ">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9.003 14L16.073 6.929L14.659 5.515L9.003 11.172L6.174 8.343L4.76 9.757L9.003 14Z" fill="#57BA7E"/>
										</svg>
									</span>
                                    <div class="step-title">
                                        <span>مرحله دو :</span>
                                        <span class="val">زمان بندی</span>
                                    </div>
                                </li>
                                <li class="step3">
									<span class="circ">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9.003 14L16.073 6.929L14.659 5.515L9.003 11.172L6.174 8.343L4.76 9.757L9.003 14Z" fill="#57BA7E"/>
										</svg>
									</span>
                                    <div class="step-title">
                                        <span>مرحله سه :</span>
                                        <span class="val">پرداخت</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="paycontent">
                            <div class="packages">
                                <h3 class="title">لطفا نوع پکیج مورد نظر را انتخاب کنید</h3>
                                @if(searchForId('freeclass', $attr_list) !='noclass')
                                <div class="payoption">
                                    <input type="radio" data-off="0" data-count="0" data-sum="{{$user->com_price($user->free_class_price())}}"
                                           name="class_type" id="freeclass" value="freeclass">
                                    <label for="freeclass">
                                        <div class="right">
                                            <h4>یک جلسه آزمایشی</h4>
                                            <span class="time">30 دقیقه</span>
                                        </div>
                                        <div class="left">
                                               @if($user->free_class_price()>0)
                                                    {{number_format($user->com_price($user->free_class_price()))}}
                                                    تومان / ساعتی
                                                @else
                                                    <span class="free">رایگان</span>
                                                @endif

                                        </div>
                                    </label>
                                </div>
                                @endif
                                <div class="payoption">
                                    <input type="radio"  data-off="0" data-count="1" data-sum="{{$user->com_price($user->meet1)}}"  name="class_type" id="session1" value="meet1">
                                    <label for="session1">
                                        <div class="right">
                                            <h4>
                                                <span>۱ جلسه خصوصی</span>
                                                <span class="icon">
													<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M2.92611 5.20008L7.12611 8.00008L11.3121 2.14008C11.4046 2.01045 11.5267 1.90479 11.6683 1.83188C11.8099 1.75898 11.9669 1.72095 12.1261 1.72095C12.2854 1.72095 12.4423 1.75898 12.5839 1.83188C12.7255 1.90479 12.8476 2.01045 12.9401 2.14008L17.1261 8.00008L21.3261 5.20008C21.4851 5.09433 21.671 5.03629 21.8619 5.03282C22.0527 5.02935 22.2406 5.0806 22.4033 5.1805C22.566 5.28041 22.6967 5.4248 22.78 5.59662C22.8632 5.76843 22.8955 5.96048 22.8731 6.15008L21.2301 20.1171C21.2014 20.3603 21.0845 20.5846 20.9015 20.7474C20.7184 20.9101 20.482 21 20.2371 21.0001H4.01511C3.77017 21 3.53377 20.9101 3.35073 20.7474C3.1677 20.5846 3.05076 20.3603 3.02211 20.1171L1.37911 6.14908C1.35691 5.95957 1.38939 5.76765 1.47273 5.596C1.55606 5.42435 1.68677 5.28012 1.84942 5.18034C2.01207 5.08057 2.19986 5.02941 2.39065 5.03291C2.58143 5.0364 2.76722 5.09441 2.92611 5.20008ZM12.1261 15.0001C12.6565 15.0001 13.1652 14.7894 13.5403 14.4143C13.9154 14.0392 14.1261 13.5305 14.1261 13.0001C14.1261 12.4696 13.9154 11.9609 13.5403 11.5859C13.1652 11.2108 12.6565 11.0001 12.1261 11.0001C11.5957 11.0001 11.087 11.2108 10.7119 11.5859C10.3368 11.9609 10.1261 12.4696 10.1261 13.0001C10.1261 13.5305 10.3368 14.0392 10.7119 14.4143C11.087 14.7894 11.5957 15.0001 12.1261 15.0001Z" fill="#FF974A"/>
													</svg>
												</span>
                                            </h4>
                                            <span class="time">
												60 دقیقه
											</span>
                                        </div>
                                        <div class="left">
                                            <span class="num">    {{number_format($user->com_price($user->meet1))}}
                                            </span>
                                            <span class="tom">تومان</span>
                                        </div>
                                    </label>
                                </div>

                                <div class="payoption">
                                    <input type="radio" data-off="{{floor((($user->com_price($user->meet1)- $user->com_price($user->meet5))*100)/$user->com_price($user->meet1))}}"  data-count="5"   data-sum="{{$user->com_price($user->meet5)*5}}"  name="class_type" id="session5" value="meet5">

                                    <label for="session5">
                                        <div class="right">
                                            <h4>
                                                <span>5 جلسه خصوصی</span>
                                                <span class="icon">
													<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M2.92611 5.20008L7.12611 8.00008L11.3121 2.14008C11.4046 2.01045 11.5267 1.90479 11.6683 1.83188C11.8099 1.75898 11.9669 1.72095 12.1261 1.72095C12.2854 1.72095 12.4423 1.75898 12.5839 1.83188C12.7255 1.90479 12.8476 2.01045 12.9401 2.14008L17.1261 8.00008L21.3261 5.20008C21.4851 5.09433 21.671 5.03629 21.8619 5.03282C22.0527 5.02935 22.2406 5.0806 22.4033 5.1805C22.566 5.28041 22.6967 5.4248 22.78 5.59662C22.8632 5.76843 22.8955 5.96048 22.8731 6.15008L21.2301 20.1171C21.2014 20.3603 21.0845 20.5846 20.9015 20.7474C20.7184 20.9101 20.482 21 20.2371 21.0001H4.01511C3.77017 21 3.53377 20.9101 3.35073 20.7474C3.1677 20.5846 3.05076 20.3603 3.02211 20.1171L1.37911 6.14908C1.35691 5.95957 1.38939 5.76765 1.47273 5.596C1.55606 5.42435 1.68677 5.28012 1.84942 5.18034C2.01207 5.08057 2.19986 5.02941 2.39065 5.03291C2.58143 5.0364 2.76722 5.09441 2.92611 5.20008ZM12.1261 15.0001C12.6565 15.0001 13.1652 14.7894 13.5403 14.4143C13.9154 14.0392 14.1261 13.5305 14.1261 13.0001C14.1261 12.4696 13.9154 11.9609 13.5403 11.5859C13.1652 11.2108 12.6565 11.0001 12.1261 11.0001C11.5957 11.0001 11.087 11.2108 10.7119 11.5859C10.3368 11.9609 10.1261 12.4696 10.1261 13.0001C10.1261 13.5305 10.3368 14.0392 10.7119 14.4143C11.087 14.7894 11.5957 15.0001 12.1261 15.0001Z" fill="#FF974A"/>
													</svg>
												</span>
                                            </h4>
                                            <span class="time">
											60 دقیقه
											</span>
                                        </div>
                                        <div class="left">
											<span class="percent">
                                            %
                                                {{floor((($user->com_price($user->meet1)- $user->com_price($user->meet5))*100)/$user->com_price($user->meet1))}}
											</span>
                                            <span class="num">{{number_format($user->com_price($user->meet5))}}</span>
                                            <span class="tom">تومان</span>
                                        </div>
                                    </label>
                                </div>

                                <div class="payoption">
                                    <input type="radio" data-off="{{floor((($user->com_price($user->meet1)- $user->com_price($user->meet10))*100)/$user->com_price($user->meet1))}}"  data-count="10"  data-sum="{{$user->com_price($user->meet10)*10}}" name="class_type" id="session10" value="meet10">
                                    <label for="session10">
                                        <div class="right">
                                            <h4>
                                                <span>۱۰ جلسه خصوصی</span>
                                                <span class="icon">
													<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M2.92611 5.20008L7.12611 8.00008L11.3121 2.14008C11.4046 2.01045 11.5267 1.90479 11.6683 1.83188C11.8099 1.75898 11.9669 1.72095 12.1261 1.72095C12.2854 1.72095 12.4423 1.75898 12.5839 1.83188C12.7255 1.90479 12.8476 2.01045 12.9401 2.14008L17.1261 8.00008L21.3261 5.20008C21.4851 5.09433 21.671 5.03629 21.8619 5.03282C22.0527 5.02935 22.2406 5.0806 22.4033 5.1805C22.566 5.28041 22.6967 5.4248 22.78 5.59662C22.8632 5.76843 22.8955 5.96048 22.8731 6.15008L21.2301 20.1171C21.2014 20.3603 21.0845 20.5846 20.9015 20.7474C20.7184 20.9101 20.482 21 20.2371 21.0001H4.01511C3.77017 21 3.53377 20.9101 3.35073 20.7474C3.1677 20.5846 3.05076 20.3603 3.02211 20.1171L1.37911 6.14908C1.35691 5.95957 1.38939 5.76765 1.47273 5.596C1.55606 5.42435 1.68677 5.28012 1.84942 5.18034C2.01207 5.08057 2.19986 5.02941 2.39065 5.03291C2.58143 5.0364 2.76722 5.09441 2.92611 5.20008ZM12.1261 15.0001C12.6565 15.0001 13.1652 14.7894 13.5403 14.4143C13.9154 14.0392 14.1261 13.5305 14.1261 13.0001C14.1261 12.4696 13.9154 11.9609 13.5403 11.5859C13.1652 11.2108 12.6565 11.0001 12.1261 11.0001C11.5957 11.0001 11.087 11.2108 10.7119 11.5859C10.3368 11.9609 10.1261 12.4696 10.1261 13.0001C10.1261 13.5305 10.3368 14.0392 10.7119 14.4143C11.087 14.7894 11.5957 15.0001 12.1261 15.0001Z" fill="#FF974A"/>
													</svg>
												</span>
                                            </h4>
                                            <span class="time">
												  60 دقیقه
											</span>
                                        </div>
                                        <div class="left">
											<span class="percent">
												%
                                                {{floor((($user->com_price($user->meet1)- $user->com_price($user->meet10))*100)/$user->com_price($user->meet1))}}
											</span>
                                            <span class="num">{{number_format($user->com_price($user->meet10))}}</span>

                                            <span class="tom">تومان</span>
                                        </div>
                                    </label>
                                </div>

                                <div class="payfooter">
                                    <div class="avatar">
                                        <div class="img" style="background: url('{{asset('/src/avatar/'.searchForId('avatar', $attr_list))}}');"></div>
                                    </div>
                                    <div class="options">
                                        <ul>
                                            <li>
                                                <div class="option">
                                                    <h5 class="class_name">     </h5>
                                                    <div class="text">
														<span class="icon">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M18.3334 9.99983C18.3334 14.5998 14.6 18.3332 10.0001 18.3332C5.40007 18.3332 1.66675 14.5998 1.66675 9.99983C1.66675 5.39984 5.40007 1.6665 10.0001 1.6665C14.6 1.6665 18.3334 5.39984 18.3334 9.99983Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																<path opacity="0.4" d="M13.0917 12.65L10.5083 11.1083C10.0583 10.8416 9.69165 10.2 9.69165 9.67497V6.2583" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</span>
                                                        <span class="time class_time">30 دقیقه</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="option">
                                                    <h5>هزینه</h5>
                                                    <div class="text">
														<span class="icon">
															<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M3.47495 13.6911L7.24995 17.4661C8.79995 19.0161 11.3166 19.0161 12.875 17.4661L16.5333 13.8077C18.0833 12.2577 18.0833 9.74108 16.5333 8.18275L12.75 4.41608C11.9583 3.62441 10.8666 3.19941 9.74995 3.25775L5.58328 3.45775C3.91662 3.53275 2.59162 4.85775 2.50828 6.51608L2.30828 10.6827C2.25828 11.8077 2.68328 12.8994 3.47495 13.6911Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																<path opacity="0.4" d="M7.91658 10.9413C9.06718 10.9413 9.99992 10.0086 9.99992 8.85799C9.99992 7.7074 9.06718 6.77466 7.91658 6.77466C6.76599 6.77466 5.83325 7.7074 5.83325 8.85799C5.83325 10.0086 6.76599 10.9413 7.91658 10.9413Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round"/>
															</svg>
														</span>
                                                        <span class="class_price">رایگان</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="option">
                                                    <h5>میزان تخفیف</h5>
                                                    <div class="text">
														<span class="icon">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M5.60835 16.4167C6.29169 15.6834 7.33335 15.7417 7.93335 16.5417L8.77502 17.6667C9.45002 18.5584 10.5417 18.5584 11.2167 17.6667L12.0584 16.5417C12.6584 15.7417 13.7 15.6834 14.3834 16.4167C15.8667 18.0001 17.075 17.4751 17.075 15.2584V5.86675C17.0834 2.50841 16.3 1.66675 13.15 1.66675H6.85002C3.70002 1.66675 2.91669 2.50841 2.91669 5.86675V15.2501C2.91669 17.4751 4.13335 17.9917 5.60835 16.4167Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																<path opacity="0.4" d="M7.5 10.8333L12.5 5.83325" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																<path opacity="0.4" d="M12.4954 10.8334H12.5029" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path opacity="0.4" d="M7.4954 6.24992H7.50289" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</span>
                                                        <span class="class_off">%۱۰۰</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="next">
                                        <span class="next-step go_level_2 " style="text-align: center" data-id="{{$user->id}}" id="">مرحله بعد</span>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="popup popupc" id="level2_{{$user->id}}">
        <div>
            <div>
                <div>
                    <div class="popup-container payprocesspop" >
						<span class="close close_popup">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
							</svg>
						</span>
                        <!-- Start payment -->
                        <div id="payment-page"  >
                            <div class="containessssr">
                                <div class="row">
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <div>
                                            <div class="payment-method">
                                                <h3 class="title">
                                                    انتخاب شیوه پرداخت :
                                                </h3>
                                                <form action="{{route('student.charge.wallet')}}" method="post" id="pay_for_meet">
                                                            @csrf
                                                            @method('post')
                                                            <input type="text" hidden name="count" id="count_meet"  >
                                                            <input type="text" hidden name="time" id="time_meet"  >
                                                            <input type="text" hidden name="fst" id="fst"   >

                                                                <div class="banks">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-sm-12">
                                                                            <div>
                                                                                <div class="bank">
                                                                                    <input type="radio" checked id="mellat" value="mellat" name="bank">
                                                                                    <label for="mellat">
                                                                                        <div class="circ">
                                                                                            <span></span>
                                                                                        </div>
                                                                                        <div class="text">
                                                                                            <span class="title">پرداخت از طریق درگاه بانک</span>
                                                                                            <span class="exp">تمامی درگاه های بانکی</span>
                                                                                        </div>
                                                                                        <div class="icon">
                                                                                            <img src="/home/images/mellat.png" alt="">
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if(\Illuminate\Support\Facades\Auth::check())

                                                                        <div class="col-lg-6 col-sm-12">
                                                                            <div>
                                                                                <div class="bank">
                                                                                    <input type="radio" name="bank" id="ses2" value="wallet">
                                                                                    <label for="ses2">
                                                                                        <div class="circ">
                                                                                            <span></span>
                                                                                        </div>
                                                                                        <div class="text">
                                                                                            <span class="title">پرداخت از طرق کیف پول</span>
                                                                                            <span class="exp">موجودی شما
                                                                                                {{number_format(auth()->user()->total_cash())}}
                                                                                                    :<strong>
                                                                                                </strong>تومان</span>
                                                                                        </div>
                                                                                        <div class="icon">
                                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                <path d="M18.04 13.55C17.62 13.96 17.38 14.55 17.44 15.18C17.53 16.26 18.52 17.05 19.6 17.05H21.5V18.24C21.5 20.31 19.81 22 17.74 22H7.63C7.94 21.74 8.21 21.42 8.42 21.06C8.79 20.46 9 19.75 9 19C9 16.79 7.21 15 5 15C4.06 15 3.19 15.33 2.5 15.88V11.51C2.5 9.44001 4.18999 7.75 6.25999 7.75H17.74C19.81 7.75 21.5 9.44001 21.5 11.51V12.95H19.48C18.92 12.95 18.41 13.17 18.04 13.55Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                <path opacity="0.4" d="M2.5 12.41V7.84004C2.5 6.65004 3.23 5.59 4.34 5.17L12.28 2.17C13.52 1.7 14.85 2.62003 14.85 3.95003V7.75002" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                <path d="M22.56 13.97V16.03C22.56 16.58 22.12 17.03 21.56 17.05H19.6C18.52 17.05 17.53 16.26 17.44 15.18C17.38 14.55 17.62 13.96 18.04 13.55C18.41 13.17 18.92 12.95 19.48 12.95H21.56C22.12 12.97 22.56 13.42 22.56 13.97Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                <path opacity="0.4" d="M7 12H14" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                <path d="M9 19C9 19.75 8.79 20.46 8.42 21.06C8.21 21.42 7.94 21.74 7.63 22C6.93 22.63 6.01 23 5 23C3.54 23 2.27 22.22 1.58 21.06C1.21 20.46 1 19.75 1 19C1 17.74 1.58 16.61 2.5 15.88C3.19 15.33 4.06 15 5 15C7.21 15 9 16.79 9 19Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                                <path d="M3.44 19L4.42999 19.99L6.56 18.02" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                            </svg>
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                        </form>

{{--                                                <div class="discount-form">--}}
{{--                                                    <div class="top">--}}
{{--                                                        <h4>کد تخفیف دارید؟</h4>--}}
{{--                                                        <span class="icon">--}}
{{--											<svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--												<path d="M5.05112 6.77764C4.91388 6.77765 4.77798 6.75089 4.65118 6.69888C4.52439 6.64686 4.40916 6.57062 4.3121 6.47449L0.412109 2.6108C0.216247 2.41676 0.106201 2.1536 0.106201 1.87919C0.106201 1.60477 0.216247 1.34161 0.412109 1.14757C0.607972 0.953533 0.873613 0.844513 1.1506 0.844513C1.4276 0.844513 1.69324 0.953533 1.8891 1.14757L5.0531 3.5252L8.2171 1.14757C8.31408 1.05149 8.42923 0.975267 8.55594 0.923271C8.68265 0.871274 8.81844 0.844513 8.9556 0.844513C9.09275 0.844513 9.22857 0.871274 9.35529 0.923271C9.482 0.975267 9.59714 1.05149 9.69412 1.14757C9.7911 1.24365 9.86802 1.35772 9.9205 1.48325C9.97299 1.60878 10 1.74331 10 1.87919C10 2.01506 9.97299 2.14962 9.9205 2.27515C9.86802 2.40068 9.7911 2.51472 9.69412 2.6108L5.7941 6.47449C5.6966 6.57113 5.58075 6.64766 5.45322 6.69969C5.32569 6.75173 5.18904 6.77823 5.05112 6.77764Z" fill="#696974"/>--}}
{{--											</svg>--}}
{{--										</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="bot">--}}
{{--                                                        <div class="input-container">--}}
{{--                                                            <input type="text">--}}
{{--                                                            <span>لطفا کد تخفف خود را وارد نمایید.</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}

                                                <div class="rules">
                                                    <h4>قوانین حضور در کلاس</h4>
                                                    <ul class="circle" style="text-align: right">
                                                        <li>پس از پرداخت موفق می توانید زمان کلاس های خود را از روی تقویم استاد به صورت یکجا و یا تدریجی انتخاب کنید.</li>
                                                        <li>پس از پرداخت موفق، در صورت عدم رضایت امکان تغییر استاد نیز وجود دارد</li>
                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                            @if(auth()->user()->total_cash()>0)

                                                                <div class="check-toggle" style="display: inline-block; margin-left: 5px;top: 6px">
                                                                    <input form="pay_for_meet" type="checkbox" data-filter="جلسه ازمایشی رایگان" class="ts" data-cash="{{auth()->user()->cash}}"  id="forwallety" name="usewallet" value="1">
                                                                    <label for="forwallety"><span></span></label>
                                                                </div>
                                                        <span class="text show-for-desktop inb">
                                                                                        استفاده از موجودی کیف برای پرداخت
                                                        </span>

                                                            @endif
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="teacher-option">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div>
                                                            <div class="teacher-option">
												<span class="icon">
													<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.4" d="M12.7184 19.2292H19.1317C19.0342 19.3159 18.9367 19.3917 18.8392 19.4784L14.2134 22.945C12.6859 24.0825 10.1942 24.0825 8.65589 22.945L4.01923 19.4784C3.00089 18.72 2.16672 17.0408 2.16672 15.7733V7.74584C2.16672 6.42418 3.17423 4.96168 4.40923 4.49584L9.80422 2.47001C10.6926 2.13418 12.1659 2.13418 13.0542 2.47001L18.4384 4.49584C19.4676 4.88584 20.3451 5.96918 20.6159 7.07418H12.7075C12.4692 7.07418 12.2525 7.08503 12.0467 7.08503C10.0425 7.20419 9.52254 7.93001 9.52254 10.2158V16.0983C9.53338 18.59 10.1726 19.2292 12.7184 19.2292Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M9.53339 12.1549H23.8334" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M23.8334 10.205V16.2175C23.8117 18.6225 23.1509 19.2183 20.6484 19.2183H12.7184C10.1726 19.2183 9.53339 18.5791 9.53339 16.0766V10.1942C9.53339 7.91915 10.0534 7.1933 12.0576 7.0633C12.2634 7.0633 12.4801 7.05249 12.7184 7.05249H20.6484C23.1942 7.06332 23.8334 7.69166 23.8334 10.205Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M12.2634 16.5317H13.7042" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M15.9792 16.5317H19.5217" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
													</svg>
												</span>
                                                                <span class="text">
													بازگشت هزینه
												</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div>
                                                            <div class="teacher-option">
												<span class="icon">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M8 2V5" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M16 2V5" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path opacity="0.4" d="M3.5 9.08997H20.5" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M18 23C20.2091 23 22 21.2091 22 19C22 16.7909 20.2091 15 18 15C15.7909 15 14 16.7909 14 19C14 21.2091 15.7909 23 18 23Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M19.07 20.11L16.95 18" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M19.05 18.02L16.93 20.14" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M21 8.5V16.36C20.27 15.53 19.2 15 18 15C15.79 15 14 16.79 14 19C14 19.75 14.21 20.46 14.58 21.06C14.79 21.42 15.06 21.74 15.37 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path opacity="0.4" d="M11.9955 13.7H12.0045" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
														<path opacity="0.4" d="M8.29431 13.7H8.30329" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
														<path opacity="0.4" d="M8.29443 16.7H8.30342" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													</svg>
												</span>
                                                                <span class="text">
													لغو کلاس
												</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div>
                                                            <div class="teacher-option">
												<span class="icon">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M10.49 2.23006L5.50003 4.10006C4.35003 4.53006 3.41003 5.89006 3.41003 7.12006V14.5501C3.41003 15.7301 4.19005 17.2801 5.14005 17.9901L9.44003 21.2001C10.85 22.2601 13.17 22.2601 14.58 21.2001L18.88 17.9901C19.83 17.2801 20.61 15.7301 20.61 14.5501V7.12006C20.61 5.89006 19.67 4.53006 18.52 4.10006L13.53 2.23006C12.68 1.92006 11.32 1.92006 10.49 2.23006Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path opacity="0.4" d="M12 15.5C14.2091 15.5 16 13.7091 16 11.5C16 9.29086 14.2091 7.5 12 7.5C9.79086 7.5 8 9.29086 8 11.5C8 13.7091 9.79086 15.5 12 15.5Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
														<path opacity="0.4" d="M12.25 10.25V11.18C12.25 11.53 12.07 11.86 11.76 12.04L11 12.5" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
													</svg>
												</span>
                                                                <span class="text">
													بازگشت هزینه
												</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div>
                                                            <div class="teacher-option">
												<span class="icon">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M16.92 22.0001C14.12 22.0001 11.84 19.73 11.84 16.92C11.84 14.12 14.11 11.8401 16.92 11.8401C19.72 11.8401 22 14.11 22 16.92C22 19.73 19.73 22.0001 16.92 22.0001Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M5.02 2H8.94C11.01 2 12.01 3.00002 11.96 5.02002V8.94C12.01 11.01 11.01 12.01 8.94 11.96H5.02C3 12 2 11 2 8.92999V5.01001C2 3.00001 3 2 5.02 2Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M9.00995 5.84985H4.94995" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M6.96997 5.16992V5.84991" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M7.98994 5.83997C7.98994 7.58997 6.61994 9.00995 4.93994 9.00995" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M9.0099 9.01001C8.2799 9.01001 7.61991 8.62 7.15991 8" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path opacity="0.4" d="M2 15C2 18.87 5.13 22 9 22L7.95 20.25" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path opacity="0.4" d="M22 9C22 5.13 18.87 2 15 2L16.05 3.75" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M14.1812 21.1211C14.6143 20.1656 15.7459 19.485 17.0701 19.485C18.2759 19.485 19.322 20.0494 19.8264 20.8717" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M18.8599 16.29C18.8599 17.28 18.0599 18.085 17.0699 18.085C16.0799 18.085 15.2799 17.28 15.2799 16.29C15.2799 15.3 16.0799 14.5 17.0699 14.5C18.0599 14.5 18.8599 15.3 18.8599 16.29Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													</svg>
												</span>
                                                                <span class="text">
													تغییر استاد
												</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div>
                                            <div class="payment-sidebar">
                                                <div class="avatar">
                                                    <div class="img" style="background: url('{{asset('/src/avatar/'.searchForId('avatar', $attr_list))}}');"></div>
                                                    <div class="flag">
                                                        <img src="{{asset('/src/img/lang/'.\App\Models\Language::find($user->languages()->first()->id)->img)}}" alt="">
                                                    </div>
                                                </div>

                                                <div class="name">
                                                    <h4> {{$user->name}}</h4>
                                                    <span class="expert">استاد زبان
                                                    {{$user->languages()->first()->name}}
                                                    </span>
                                                </div>

                                                <div class="date">
                                                    <span class="title">تاریخ برگزای :</span>
                                                    <div class="date-box">
										<span class="icon">
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M8 16C6.41775 16 4.87103 15.5308 3.55544 14.6518C2.23985 13.7727 1.21447 12.5233 0.608967 11.0615C0.00346633 9.59966 -0.15496 7.99113 0.153721 6.43928C0.462403 4.88743 1.22433 3.46197 2.34315 2.34315C3.46197 1.22433 4.88743 0.462403 6.43928 0.153721C7.99113 -0.15496 9.59966 0.00346622 11.0615 0.608967C12.5233 1.21447 13.7727 2.23985 14.6518 3.55544C15.5308 4.87103 16 6.41775 16 8C16.0001 9.05061 15.7933 10.091 15.3913 11.0616C14.9893 12.0323 14.4 12.9142 13.6571 13.6571C12.9142 14.4 12.0323 14.9893 11.0616 15.3913C10.091 15.7933 9.05061 16.0001 8 16ZM8 6.86928L5.73763 4.60598L4.60506 5.73855L6.86835 8.00093L4.60506 10.2633L5.7367 11.3949L7.99908 9.13165L10.2615 11.3949L11.3931 10.2633L9.1298 8.00093L11.3931 5.73855L10.2624 4.60598L8 6.86928Z" fill="#D3D3D8"/>
											</svg>

										</span>
                                                        <span class="val s_time">سه شنبه 16 شهریور 17:00-16:30</span>
                                                    </div>
{{--                                                    <div class="region">--}}
{{--                                                        <span class="title">زمان درس در منطقه زمانی شما</span>--}}
{{--                                                        <span class="area"> (17:47 UTC+02:00)</span>--}}
{{--                                                    </div>--}}
                                                </div>

{{--                                                <div class="mid">--}}
{{--                                                    <span class="line"></span>--}}
{{--                                                </div>--}}

                                                <div class="class-detail">
                                                    <ul>
                                                        <li>
                                                            <span class="right class_time">۱ ساعت درس: </span>
                                                            <span class="left">
												<span class="num sum class_price">۵۰,۰۰۰ </span>
												<span class="tom">تومان</span>
											</span>
                                                        </li>
                                                        <li>
                                                            <span class="right">مالیات: </span>
                                                            <span class="left">
												<span class="num">۰ </span>
												<span class="tom">تومان</span>
											</span>
                                                        </li>
                                                        <li>
                                                            <span class="right">هزینه لغو کلاس :</span>
                                                            <span class="left">
												<span class="free">رایگان</span>
											</span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="total-price">
                                                    <span class="right">مبلغ قابل پرداخت :</span>
                                                    <span class="left">
										<span class="num class_price sum">۹۰,۰۰۰ </span>
										<span class="tom">تومان</span>
									</span>
                                                </div>

                                                    <div class="paybutton">
                                                        <span class="pay"  id="send_pay_for_meet">
                                                            <span class="val">پرداخت هزینه</span>
                                                            <span class="icon">
                                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.5471 5.69696H3.89307L7.66307 1.95697C7.87503 1.73943 7.99365 1.44771 7.99365 1.14398C7.99365 0.84025 7.87503 0.548478 7.66307 0.330933C7.44839 0.118902 7.15881 0 6.85707 0C6.55534 0 6.26575 0.118902 6.05107 0.330933L0.319069 6.03094C0.114039 6.24904 -0.000106812 6.53709 -0.000106812 6.83643C-0.000106812 7.13576 0.114039 7.42387 0.319069 7.64197L6.05107 13.342C6.26575 13.554 6.55534 13.6729 6.85707 13.6729C7.15881 13.6729 7.44839 13.554 7.66307 13.342C7.8702 13.1263 7.98932 12.8409 7.99707 12.5419C7.99413 12.2402 7.87442 11.9513 7.66307 11.736L3.89307 7.98096H13.5471C13.8437 7.97217 14.1252 7.84818 14.332 7.63525C14.5387 7.42233 14.6543 7.13722 14.6543 6.84045C14.6543 6.54369 14.5387 6.25858 14.332 6.04565C14.1252 5.83273 13.8437 5.70874 13.5471 5.69995V5.69696Z" fill="white"/>
                                                                </svg>

                                                            </span>
                                                        </span>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End payment -->
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

