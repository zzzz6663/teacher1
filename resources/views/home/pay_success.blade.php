@extends('master.home')



@section('main_body')

    @if($bill->type=='charge_wallet')



    <div id="page-success" class="rows">
        <div class="container">
            <div class="page-success">
                <div class="img">
                    <img src="/home/images/successp.png" alt="">
                </div>
                <h3>پرداخت با موفقیت انجام شد</h3>
                <p>
                    شماره سریال پرداختی شما  :
                </p>
                <div class="serial">
                    <span>{{$bill->transactionId}}</span>
                </div>

                <div class="button">
                    <a href="{{route('student.wallet')}}" class="send">
                        <span class="text">رفتن به پنل</span>
                        <span class="icon">
								<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M13.5471 5.95599H3.89307L7.66307 2.216C7.87503 1.99846 7.99365 1.70675 7.99365 1.40302C7.99365 1.09928 7.87503 0.807511 7.66307 0.589966C7.44839 0.377935 7.15881 0.259033 6.85707 0.259033C6.55534 0.259033 6.26575 0.377935 6.05107 0.589966L0.319069 6.28998C0.114039 6.50807 -0.000106812 6.79612 -0.000106812 7.09546C-0.000106812 7.39479 0.114039 7.68291 0.319069 7.901L6.05107 13.601C6.26575 13.813 6.55534 13.9319 6.85707 13.9319C7.15881 13.9319 7.44839 13.813 7.66307 13.601C7.8702 13.3853 7.98932 13.0999 7.99707 12.801C7.99413 12.4992 7.87442 12.2104 7.66307 11.995L3.89307 8.23999H13.5471C13.8437 8.23121 14.1252 8.10721 14.332 7.89429C14.5387 7.68136 14.6543 7.39625 14.6543 7.09949C14.6543 6.80272 14.5387 6.51761 14.332 6.30469C14.1252 6.09176 13.8437 5.96777 13.5471 5.95898V5.95599Z" fill="white"></path>
								</svg>
							</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="popup">
            <div>
                <div>
                    <div>
                        <div class="popup-container payprocesspop" >
						<span class="close">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
							</svg>
						</span>

                            <div class="payprocess">
                                <ul>
                                    <li class="step1 done">
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
                                    <li class="step2 done">
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
                                    <li class="step3 active">
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
                                <div class="popsucces">
                                    <h3 class="title">پرداخت موفق</h3>

                                    <div class="paysuccess">
                                        <div class="top">
                                            <img src="/home/images/success.png" alt="">
                                            <span>کاربر گرامی کلاس شما با <b>موفقیت</b> ثبت شد</span>
                                        </div>
                                        <div class="result">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div>
                                                        <div class="teacher">
                                                            <div class="avatar">
                                                                <div class="img" style="background: url('{{asset('/src/avatar/'.$bill->meet->user->attr('avatar'))}} ');"></div>
                                                            </div>
                                                            <div class="left">

                                                                <h5> {{$bill->meet->user->name}}</h5>
                                                                <span>
                                                                    @switch($bill->count)
                                                                        @case(0)
                                                                            یک چلسه آژمایشی
                                                                        @break
                                                                        @case(1)
                                                                            یک چلسه خصوصی
                                                                        @break
                                                                        @case(5)
                                                                            پنج چلسه خصوصی
                                                                        @break
                                                                        @case(10)
                                                                            ده چلسه خصوصی
                                                                        @break

                                                                        @endswitch
                                                                </span>
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
                                                                <span class="val">

                                                                    {{\Morilog\Jalali\Jalalian::forge($bill->meet->start)}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <span>شما میتوانید در قسمت پنل کاربری درس را مشاهده کرده و آن را مدیریت کنید</span>
                                        </div>
                                        <div class="buttons">
{{--                                            <a href="{{route('student.dashboard')}}" class="don">متوجه شدم</a>--}}
                                            <a href="{{route('student.dashboard')}}" style="line-height: 60px" class="dash">رفتن به داشبورد  </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
