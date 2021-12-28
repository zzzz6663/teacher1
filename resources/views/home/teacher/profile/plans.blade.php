@component('home.teacher.content',['title'=>' تنظیمات  '])


    <!-- Start Teacher Scadule -->
    <div id="teacher-scadule">
        <h3>تنظیم برنامه زمانی</h3>


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
                <div class="col-lg-12">
                    @if($errors->any())
                        <div class="e_section" id="e_section">
                            <span class="text text-danger">حداقل یک زمان انتخاب کنید </span><br>
                        </div>
                    @endif
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
							 {{\Morilog\Jalali\Jalalian::forge('today')->format('%A,%B %d، %Y')}}
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

        <div id="teacher-clander" data-name="عرفان آماده" data-job="استاد مجرب" data-pic="images/teacher.jpg">
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
            <div class="cond">
                <form id="plan" action="{{route('teacher.save.plan',$teacher->id)}}" method="post" >
                    @csrf
                    @method('post')
                </form>
                <?php
                $w=[  'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
                $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
                ?>
                <ul class="   ">
                    @for($i=0 ;$i<22;$i++)
                        <li data-date="{{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now()->addDay($i))->format('%A, %d %B %y')}}">
                            <div class="date">
                                <?php
                                $v=verta(\Carbon\Carbon::now()->addDay($i))
                                ?>
                                <span class="top"> {{ $w[$v->dayOfWeek] }} </span>
                                <span class="bot" style="font-size: 15px; min-height: 30px">
                                        {{ $v->day }}
                                    {{ $m[$v->month-1] }}
                                    </span>
                            </div>
                            @for($p=0 ;$p<34;$p++)

                                @php
                                    $today= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                    $today5= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                @endphp




                                <div   class="hour {{($teacher->empty($today->addMinutes(($p*30))->format('Y-m-d H:i:s')))?' certain ':'    '}} {{($teacher->reserved($today5->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'  reserved  ':'  '}}" data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" >
                                    <input type="checkbox" form="plan" class="op" name="reserve[]" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                    <input type="checkbox" form="plan" class="can" name="can[]" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                </div>




                            @endfor

                        </li>
                    @endfor
                </ul>

            </div>
        </div>


        <div>
            <div class="button">
                <input class="cancel pointer" type="submit" form="plan" value="ذخیره تغییرات">
            </div>
        </div>

    </div>
    <!-- End Teacher Scadule -->





    @endcomponent
