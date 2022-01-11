@component('home.student.content',['title'=>' تنظیمات  '])


    <div class="popup not-fixed">
        <div>
            <div>
                <div>
                    <div class="popup-container payprocesspop" >
						<span class="close">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
							</svg>
						</span>


                        <div class="paycontent" style="margin-right: 0;">
                            <div class="popcalendar">

                                <a href="{{route('student.dashboard')}}" class="backstep">
                                    رفتن به عقب
                                    <span class="icon">
										<svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M0.849654 5.05112C0.849634 4.91388 0.876397 4.77798 0.928411 4.65118C0.980426 4.52439 1.05667 4.40916 1.1528 4.3121L5.01649 0.412109C5.21053 0.216247 5.47369 0.106201 5.7481 0.106201C6.02251 0.106201 6.28568 0.216247 6.47972 0.412109C6.67376 0.607972 6.78278 0.873613 6.78278 1.1506C6.78278 1.4276 6.67376 1.69324 6.47972 1.8891L4.10209 5.0531L6.47972 8.2171C6.5758 8.31408 6.65202 8.42923 6.70402 8.55594C6.75602 8.68265 6.78278 8.81844 6.78278 8.9556C6.78278 9.09275 6.75602 9.22857 6.70402 9.35529C6.65202 9.482 6.5758 9.59714 6.47972 9.69412C6.38364 9.7911 6.26957 9.86802 6.14404 9.9205C6.01851 9.97299 5.88398 10 5.7481 10C5.61223 10 5.47767 9.97299 5.35214 9.9205C5.22661 9.86802 5.11257 9.7911 5.01649 9.69412L1.1528 5.7941C1.05616 5.6966 0.979627 5.58075 0.927595 5.45322C0.875562 5.32569 0.849058 5.18904 0.849654 5.05112Z" fill="currentColor"/>
										</svg>
									</span>
                                </a>

                                <h3 id="res_student" data-user="{{$teacher->id}}"  >
                                    تغییر کلاس
                                </h3>

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
                                            //TODO برای ایجاد
											هفته قبل
										</span>
                                        <span class="day">
											{{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now())->format('%B %d، %Y')}} -
                                    {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now()->addDay(7))->format('%B %d، %Y')}}

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

                                    <div id="teacher-clander" data-name="   {{$teacher->name }} {{$teacher->family }} " data-lang="سوئدی" data-flag="images/swedish.png" data-pic="images/teacher.png">
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
                                                <ul>
                                                    <li>

                                                        <span>07:00</span>
                                                    </li>
                                                    <li>

                                                        <span>08:00</span>
                                                    </li>
                                                    <li>

                                                        <span>09:00</span>
                                                    </li>
                                                    <li>

                                                        <span>10:00</span>
                                                    </li>
                                                    <li>

                                                        <span>11:00</span>
                                                    </li>
                                                    <li>

                                                        <span>12:00</span>
                                                    </li>
                                                    <li>

                                                        <span>13:00</span>
                                                    </li>
                                                    <li>

                                                        <span>14:00</span>
                                                    </li>
                                                    <li>

                                                        <span>15:00</span>
                                                    </li>
                                                    <li>

                                                        <span>16:00</span>
                                                    </li>
                                                    <li>

                                                        <span>17:00</span>
                                                    </li>
                                                    <li>

                                                        <span>18:00</span>
                                                    </li>
                                                    <li>

                                                        <span>19:00</span>
                                                    </li>
                                                    <li>

                                                        <span>20:00</span>
                                                    </li>
                                                    <li>

                                                        <span>21:00</span>
                                                    </li>
                                                    <li>

                                                        <span>22:00</span>
                                                    </li>
                                                    <li>

                                                        <span>23:00</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="con">

                                            <?php
                                            $w=[  'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
                                            $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
                                            ?>
                                            <ul class=" ">
                                                @for($i=0 ;$i<12;$i++)
                                                    <li class="par"   data-date=" {{verta(\Carbon\Carbon::now()->addDay($i))->format('Y-n-j H:i')}} ">

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

                                                        @for($p=0 ;$p<35;$p++)

                                                            @php
                                                                $today= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                                $today2= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                                $today4= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                                $today3= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                                $today5= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                            @endphp

                                                            @if($today->addMinutes(($p*30))->greaterThan(\Carbon\Carbon::now() ))

                                                                <div data-level="student" data-ps="sssf"

                                                                     data-id="{{$teacher->id}}"    class="hour {{($teacher->empty($today2->addMinutes(($p*30))->format('Y-m-d H:i:s')))?' open ':' '}}  {{($teacher->reserved($today5->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'  reserved  ':'  '}}" data-cid="{{$teacher->empty($today4->addMinutes(($p*30))->format('Y-m-d H:i:s'))}}"
                                                                     data-da="
{{--                                            {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30)))->format('%A, %d %B ')}}--}}
                                                                     {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30)))->format('%A, %d %B ')}}
                                                                         "
                                                                     data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i:s')}}"
                                                                >
                                                                    <input type="checkbox" form="plan" class="op" name="reserve[]" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                                                </div>

                                                            @else
                                                                <div   class="hour {{($teacher->empty($today3->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'   ':''}}" data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i:s')}}" >
                                                                    <input type="checkbox" form="plan" class="op" name=" " value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                                                </div>
                                                            @endif
                                                        @endfor


                                                    </li>
                                                @endfor

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="payfooter">
                                    <div class="avatar">
                                        <div class="img" style="background: url('{{asset('/src/avatar/'.$teacher->attr('avatar'))}}');"></div>
                                    </div>
                                    <div class="options">
                                        <ul>
                                            <li>
                                                <div class="option">
                                                    <h5>یک جلسه خصوصی</h5>
                                                    <div class="text">
														<span class="icon">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M18.3334 9.99983C18.3334 14.5998 14.6 18.3332 10.0001 18.3332C5.40007 18.3332 1.66675 14.5998 1.66675 9.99983C1.66675 5.39984 5.40007 1.6665 10.0001 1.6665C14.6 1.6665 18.3334 5.39984 18.3334 9.99983Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
																<path opacity="0.4" d="M13.0917 12.65L10.5083 11.1083C10.0583 10.8416 9.69165 10.2 9.69165 9.67497V6.2583" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</span>
                                                        <span class="time" id="date_e">   </span>
                                                        <span class="time" id="time_e">   </span>
                                                    </div>
                                                </div>
                                            </li>
                                            {{--                                            <li>--}}
                                            {{--                                                <div class="option">--}}
                                            {{--                                                    <h5>هزینه</h5>--}}
                                            {{--                                                    <div class="text">--}}
                                            {{--														<span class="icon">--}}
                                            {{--															<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                            {{--																<path d="M3.47495 13.6911L7.24995 17.4661C8.79995 19.0161 11.3166 19.0161 12.875 17.4661L16.5333 13.8077C18.0833 12.2577 18.0833 9.74108 16.5333 8.18275L12.75 4.41608C11.9583 3.62441 10.8666 3.19941 9.74995 3.25775L5.58328 3.45775C3.91662 3.53275 2.59162 4.85775 2.50828 6.51608L2.30828 10.6827C2.25828 11.8077 2.68328 12.8994 3.47495 13.6911Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                            {{--																<path opacity="0.4" d="M7.91658 10.9413C9.06718 10.9413 9.99992 10.0086 9.99992 8.85799C9.99992 7.7074 9.06718 6.77466 7.91658 6.77466C6.76599 6.77466 5.83325 7.7074 5.83325 8.85799C5.83325 10.0086 6.76599 10.9413 7.91658 10.9413Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round"/>--}}
                                            {{--															</svg>--}}
                                            {{--														</span>--}}
                                            {{--                                                        <span>رایگان</span>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </li>--}}
                                            {{--                                            <li>--}}
                                            {{--                                                <div class="option">--}}
                                            {{--                                                    <h5>میزان تخفیف</h5>--}}
                                            {{--                                                    <div class="text">--}}
                                            {{--														<span class="icon">--}}
                                            {{--															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                            {{--																<path d="M5.60835 16.4167C6.29169 15.6834 7.33335 15.7417 7.93335 16.5417L8.77502 17.6667C9.45002 18.5584 10.5417 18.5584 11.2167 17.6667L12.0584 16.5417C12.6584 15.7417 13.7 15.6834 14.3834 16.4167C15.8667 18.0001 17.075 17.4751 17.075 15.2584V5.86675C17.0834 2.50841 16.3 1.66675 13.15 1.66675H6.85002C3.70002 1.66675 2.91669 2.50841 2.91669 5.86675V15.2501C2.91669 17.4751 4.13335 17.9917 5.60835 16.4167Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                            {{--																<path opacity="0.4" d="M7.5 10.8333L12.5 5.83325" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                            {{--																<path opacity="0.4" d="M12.4954 10.8334H12.5029" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                            {{--																<path opacity="0.4" d="M7.4954 6.24992H7.50289" stroke="#5E57BA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                            {{--															</svg>--}}
                                            {{--														</span>--}}
                                            {{--                                                        <span>%۱۰۰</span>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </li>--}}
                                        </ul>
                                    </div>
                                    <div class="button">
                                        <a class="cancel" href="{{route('student.dashboard')}}">برگشت</a>
                                    </div>

                                    <div id="nextstep" hidden>
                                        <div class="next reight" id="nextstep2">
                                        <span id="s_change" class="next-step" style="text-align: center">
                                             انتخاب
                                        </span>
                                        </div>
                                    </div>
                                    <form id="form_ch" action="{{route('student.change')}}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="text" name="reason"  value="{{$reason}}" hidden>
                                        <input type="text" name="a_meet" id="a_meet" hidden>
                                        <input type="text" name="b_meet" value="{{$meet->id}}" hidden>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @endcomponent
