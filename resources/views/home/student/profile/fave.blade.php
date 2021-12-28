@component('home.student.content',['title'=>' تنظیمات  '])


    <div class="popup not-fixed">
        <div>
            <div>
                <div>
                    <div class="popup-container teacher-wish-pop" >
						<span class="close">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
							</svg>
						</span>
                        <h3 class="title">اساتیدی که لایک کرده اید</h3>

                        <!-- Start Single Teacher -->
                        @foreach(auth()->user()->sfave()->get() as  $fave)
                            @php($teacher=\App\Models\User::find($fave->teacher_id))
                            @if($teacher->languages()->count()==0)
                                @continue
                            @endif


                            <div class="single-teacher">
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <div>
                                            <div class="teacher-info">
                                                <div class="avatar">
                                                    <div class="img">
                                                        <span class="online"></span>
                                                        <img src="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" alt="{{$teacher->name}}">
                                                    </div>
                                                    <div class="name">
                                                        <h4> {{$teacher->name}}</h4>
                                                    </div>
                                                    <div class="rate">
											<span class="rate">
												<span class="star">
													<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M8.77333 11.3334L5.63877 13.1374C5.25588 13.3578 4.79625 13.0096 4.90465 12.5814L5.7453 9.26008L3.02716 7.06606C2.67471 6.78156 2.85191 6.21251 3.30357 6.17841L6.90204 5.90675L8.3159 2.7032C8.49133 2.30571 9.05533 2.30571 9.23076 2.7032L10.6446 5.90675L14.2436 6.17841C14.6953 6.21251 14.8725 6.78161 14.52 7.06609L11.8014 9.26008L12.642 12.5814C12.7504 13.0096 12.2908 13.3578 11.9079 13.1374L8.77333 11.3334Z" fill="white"/>
													</svg>
												</span>
												<span class="num">
													4.9
												</span>
											</span>
                                                    </div>
                                                    <div class="stat">
                                                        (14) نظرات دانشجویان
                                                    </div>
                                                </div>

                                                <div class="lang-expers">
                                                    <div class="langs-list">
                                                        <ul>
                                                            @foreach($teacher->languages()->get() as $lang )
                                                                <li>
                                         	<span class="lang">
														<span class="nat"> {{$lang->pivot->level}}</span>
														<span class="flag">
															<img src="{{asset('/src/img/lang/'.$lang->img)}}" alt="">
														</span>
														<span class="title"> {{$lang->name}}</span>
													</span>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>

                                                    <div class="options">
                                                        <ul>
                                                            <li>
                                                                <span class="title">سطوح تدریس :</span>
                                                                <span class="val"><b>
                                                        {{$teacher->attr('Starter')=='on'?'(Starter)':''}}
                                                                        {{$teacher->attr('Elementary')=='on'?'(Elementary)':''}}
                                                                        {{$teacher->attr('Intermediate')=='on'?'(Intermediate)':''}}
                                                                        {{$teacher->attr('Upper_intermediate')=='on'?'(Upper intermediate) ':''}}
                                                                        {{$teacher->attr('Advanced')=='on'?'(Advanced)':''}}
                                                                        {{$teacher->attr('Mastery')=='on'?'(Mastery)':''}}
                                                    </b></span>
                                                            </li>
                                                            <li>
                                                                <span class="title">لهجه :</span>
                                                                <span class="val">
                                                 {{$teacher->attr('American_Accent')=='on'?'(American Accent)':''}}
                                                                    {{$teacher->attr('British_Accent')=='on'?'(British Accent)':''}}
                                                                    {{$teacher->attr('Australian_Accent')=='on'?'(Australian Accent)':''}}
                                                                    {{$teacher->attr('Indian_Accent')=='on'?'(Indian Accent)':''}}

                                                                    {{$teacher->attr('Irish_Accent')=='on'?'(Irish Accent)':''}}
                                                                    {{$teacher->attr('Scottish_Accent')=='on'?'(Scottish Accent)':''}}
                                                                    {{$teacher->attr('South_African_Accent')=='on'?'(South African Accent) ':''}}

                                                </span>
                                                            </li>
                                                            <li>
                                                                <span class="title">زبان آموزان :</span>
                                                                <span class="val"> نفر
                                                {{$teacher->count_student()}}
                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="buttons">
                                                        <ul>
                                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                                @if(auth()->user()->level=='student')
                                                                    <form id="form_save_{{$teacher->id}}" action="{{route('student.fave.teachers',$teacher->id)}}" method="post">
                                                                        @csrf
                                                                        @method('post')
                                                                        <input type="text" hidden name="teacher" value="{{$teacher->id}}">
                                                                        <li>
                                                                            <button>
                                                                                <svg style="fill: {{(auth()->user()->has_fave($teacher->id))?'red':''}}"  width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M9.95374 16.3417C9.66672 16.4417 9.19398 16.4417 8.90696 16.3417C6.45887 15.5167 0.988647 12.075 0.988647 6.24171C0.988647 3.66671 3.09063 1.58337 5.68223 1.58337C7.21862 1.58337 8.57774 2.31671 9.43035 3.45004C10.283 2.31671 11.6505 1.58337 13.1785 1.58337C15.7701 1.58337 17.8721 3.66671 17.8721 6.24171C17.8721 12.075 12.4018 15.5167 9.95374 16.3417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                </svg>
                                                                            </button>
                                                                        </li>
                                                                    </form>


                                                                @endif
                                                            @else
                                                                <a href="">

                                                                </a>
                                                            @endif

                                                            {{--                                            <li>--}}
                                                            {{--                                                <button>--}}
                                                            {{--                                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                                            {{--                                                        <path d="M12.5725 3.59178V13.0585C12.5725 14.2668 11.6946 14.7751 10.6225 14.1918L7.30492 12.3668C6.95037 12.1751 6.37631 12.1751 6.02176 12.3668L2.70418 14.1918C1.63209 14.7751 0.75415 14.2668 0.75415 13.0585V3.59178C0.75415 2.16678 1.93598 1.00012 3.37951 1.00012H9.94717C11.3907 1.00012 12.5725 2.16678 12.5725 3.59178Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                                            {{--                                                    </svg>--}}
                                                            {{--                                                </button>--}}
                                                            {{--                                            </li>--}}
                                                            {{--                                            <li>--}}
                                                            {{--                                                <button>--}}
                                                            {{--                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                                            {{--                                                        <path d="M6.31771 7C6.24927 6.99324 6.16713 6.99324 6.09184 7C4.46282 6.94588 3.16919 5.62683 3.16919 4.00338C3.16919 2.34611 4.52442 1 6.2082 1C7.88513 1 9.24721 2.34611 9.24721 4.00338C9.24037 5.62683 7.94673 6.94588 6.31771 7Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                                            {{--                                                        <path d="M11.3457 3C12.4285 3 13.2992 3.89714 13.2992 5C13.2992 6.08 12.462 6.96 11.4183 7C11.3737 6.99429 11.3234 6.99429 11.2732 7" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                                            {{--                                                        <path d="M2.49102 9.95506C0.69375 11.0823 0.69375 12.9194 2.49102 14.0397C4.53336 15.3201 7.88281 15.3201 9.92516 14.0397C11.7224 12.9124 11.7224 11.0754 9.92516 9.95506C7.89024 8.68165 4.54079 8.68165 2.49102 9.95506Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                                            {{--                                                        <path d="M12.2861 13C12.7522 12.925 13.1923 12.78 13.5548 12.565C14.5646 11.98 14.5646 11.015 13.5548 10.43C13.1988 10.22 12.7651 10.08 12.3056 10" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                                            {{--                                                    </svg>--}}

                                                            {{--                                                </button>--}}
                                                            {{--                                            </li>--}}
                                                        </ul>

                                                        <div class="trial">
                                                            <span class="title">جلسه آزمایشی :</span>
                                                            <span class="val">  {{__('arr.'.$teacher->attr('freeclass'))}}</span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="price-button">
                                                    <div class="price">
                                                        <span class="title">هزینه هر جلسه</span>
                                                        <span class="session">یک ساعته</span>
                                                        <div class="price-number">
                                                            <span class="num">{{number_format($teacher->com_price($teacher->meet1))}} </span>
                                                            <span class="tom">تومان</span>
                                                        </div>
                                                    </div>
                                                    <a href="{{route('home.teacher.profile',$teacher->id)}}" class="reserv">رزرو کلاس</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div>
                                            <div class="teacher-tabs">
                                                <div class="tab-nav">
                                                    <ul>
                                                        <li class="active"><span>ویدیو</span></li>
                                                        <li><span>تقویم</span></li>
                                                        <li><span>درباره</span></li>
                                                    </ul>
                                                </div>
                                                <div class="tab-container">
                                                    <ul>
                                                        <li class="active">
                                                            <div>
                                                                <video id="player" class="js-player" playsinline controls  data-poster="{{asset('/src/port_img/'.$teacher->attr('port_img'))}}">
                                                                    <source src="{{asset('/src/port_vid/'.$teacher->attr('port_vid'))}}" type="video/mp4" />

                                                                </video>

                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="calendar">

                                                                    <div class="hours">
                                                                        <ul>
                                                                            <li>
                                                                                <span>۰۰ - ۰۴</span>
                                                                            </li>
                                                                            <li>
                                                                                <span>۰۴ - ۰۸</span>
                                                                            </li>
                                                                            <li>
                                                                                <span>۰۸ - ۱۲</span>
                                                                            </li>
                                                                            <li>
                                                                                <span>۱۲ - ۱۶</span>
                                                                            </li>
                                                                            <li>
                                                                                <span>۱۶ - ۲۰</span>
                                                                            </li>
                                                                            <li>
                                                                                <span>۲۰ - ۲۴</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="week">
                                                                        <div class="days">
																<span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                        </div>
                                                                        <div class="days">
																<span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day green">
																	<span class="title"></span>
																	<span class="tooltip">
																		<b>۴ ساعت /</b>
																		سه شنبه
																	</span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                        </div>
                                                                        <div class="days">
																<span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day green">
																	<span class="title"></span>
																	<span class="tooltip">
																		<b>۴ ساعت /</b>
																		سه شنبه
																	</span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                        </div>
                                                                        <div class="days">
																<span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day green">
																	<span class="title"></span>
																	<span class="tooltip">
																		<b>۴ ساعت /</b>
																		سه شنبه
																	</span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                        </div>
                                                                        <div class="days">
																<span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                        </div>
                                                                        <div class="days">
																<span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day green">
																	<span class="title"></span>
																	<span class="tooltip">
																		<b>۴ ساعت /</b>
																		سه شنبه
																	</span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                            <span class="day">
																	<span class="title"></span>
																</span>
                                                                        </div>
                                                                    </div>

                                                                    <a class="more" href="{{route('home.teacher.profile',$teacher->id)}}">
															<span class="icon">
																<svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M2.95398 4.04812L0.414978 1.82612C0.360802 1.78185 0.317144 1.72609 0.287164 1.66288C0.257184 1.59967 0.241631 1.53058 0.241631 1.46062C0.241631 1.39066 0.257184 1.32157 0.287164 1.25836C0.317144 1.19514 0.360802 1.13939 0.414978 1.09512C0.532326 0.997345 0.680235 0.943801 0.832978 0.943801C0.98572 0.943801 1.13363 0.997345 1.25098 1.09512L4.20898 3.68012C4.26315 3.72439 4.30681 3.78014 4.33679 3.84336C4.36677 3.90657 4.38232 3.97566 4.38232 4.04562C4.38232 4.11558 4.36677 4.18467 4.33679 4.24788C4.30681 4.31109 4.26315 4.36685 4.20898 4.41112L1.25198 6.99712C1.13463 7.09489 0.98672 7.14844 0.833977 7.14844C0.681235 7.14844 0.533325 7.09489 0.415977 6.99712C0.361802 6.95285 0.318144 6.89709 0.288164 6.83388C0.258183 6.77067 0.242631 6.70158 0.242631 6.63162C0.242631 6.56166 0.258183 6.49257 0.288164 6.42936C0.318144 6.36615 0.361802 6.31039 0.415977 6.26612L2.95398 4.04812Z" fill="white"/>
																</svg>

															</span>
                                                                        <span class="title">مشاهده بیشتر</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                                <div class="about">
                                                                    <div>
                                                                        <p style="text-align: justify">
                                                                            {{ \Illuminate\Support\Str::limit($teacher-> bio, 150, $end='...') }}


                                                                            <a href="{{route('home.teacher.profile',$teacher->id)}}"> خواندن ادامه <i class="icon-left"></i><i class="icon-left"></i></a>

                                                                        </p>


                                                                    </div>
                                                                    <a href="{{route('home.teacher.profile',$teacher->id)}}" class="more">
														<span class="icon">
															<svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M2.95398 4.04812L0.414978 1.82612C0.360802 1.78185 0.317144 1.72609 0.287164 1.66288C0.257184 1.59967 0.241631 1.53058 0.241631 1.46062C0.241631 1.39066 0.257184 1.32157 0.287164 1.25836C0.317144 1.19514 0.360802 1.13939 0.414978 1.09512C0.532326 0.997345 0.680235 0.943801 0.832978 0.943801C0.98572 0.943801 1.13363 0.997345 1.25098 1.09512L4.20898 3.68012C4.26315 3.72439 4.30681 3.78014 4.33679 3.84336C4.36677 3.90657 4.38232 3.97566 4.38232 4.04562C4.38232 4.11558 4.36677 4.18467 4.33679 4.24788C4.30681 4.31109 4.26315 4.36685 4.20898 4.41112L1.25198 6.99712C1.13463 7.09489 0.98672 7.14844 0.833977 7.14844C0.681235 7.14844 0.533325 7.09489 0.415977 6.99712C0.361802 6.95285 0.318144 6.89709 0.288164 6.83388C0.258183 6.77067 0.242631 6.70158 0.242631 6.63162C0.242631 6.56166 0.258183 6.49257 0.288164 6.42936C0.318144 6.36615 0.361802 6.31039 0.415977 6.26612L2.95398 4.04812Z" fill="white"/>
															</svg>

														</span>
                                                                        <span class="title">مشاهده بیشتر</span>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End Single Teacher -->
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>




    @endcomponent
