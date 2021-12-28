@component('home.student.content',['title'=>' تنظیمات  '])
    <div class="search-ordering">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <form action="" class="search">
                    <input type="text" placeholder="جستجو بر اساس مبلغ، تاریخ یا کلمه کلیدی ...">
                    <button>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.58341 17.5001C13.9557 17.5001 17.5001 13.9557 17.5001 9.58341C17.5001 5.21116 13.9557 1.66675 9.58341 1.66675C5.21116 1.66675 1.66675 5.21116 1.66675 9.58341C1.66675 13.9557 5.21116 17.5001 9.58341 17.5001Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path opacity="0.4" d="M18.3334 18.3334L16.6667 16.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
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
                        <form action="{{route('student.wallet')}}" id="sortaccount" method="get">
                            @csrf
                            @method('get')
                            <ul>

                                <ul class="oredering">
{{--                                    <li class="{{request('type')?'':'active'}}">--}}
{{--                                        <span onclick="window.location.href='{{route('student.wallet')}}'">همه</span>--}}
{{--                                    </li>--}}
{{--                                    <li class="{{(request('type')=='charge_wallet')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['type'=>'charge_wallet'])}}'"><span>شارژ کیف</span></li>--}}
{{--                                    <li class="{{(request('type')=='reserve_meet')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['type'=>'reserve_meet'])}}'"><span>  رزرو</span></li>--}}
{{--                                    --}}{{--                                    <li class="{{(request('type')=='reserve_meet')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['type'=>'reserve_meet'])}}'"><span>  رزرو</span></li>--}}

                                </ul>
                                <li>
                                    <div class="label-container">
                                        <input {{request('type')=='all'?'checked':''}} checked type="radio" name="type" id="all" value="all"  >
                                        <label for="all">همه</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-container">
                                        <input {{request('type')=='charge_wallet'?'checked':''}}  type="radio" name="type" id="success" value="charge_wallet">
                                        <label for="success">شارژ کیف</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-container">
                                        <input {{request('type')=='reserve_meet'?'checked':''}} type="radio" name="type" id="proccesing" value="reserve_meet">
                                        <label for="proccesing">  رزرو</label>
                                    </div>
                                </li>
{{--                                <li>--}}
{{--                                    <div class="label-container">--}}
{{--                                        <input type="radio" name="order" id="canceled" value="canceled">--}}
{{--                                        <label for="canceled">لغو شده</label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                            </ul>

                        </form>
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
                    <th><span> ردیف</span></th>
                    <th><span>شماره‌تراکنش</span></th>
                    <th><span>نوع</span></th>
                    <th><span>کیف</span></th>
                    <th><span>درگاه</span></th>
                    <th><span>تاریخ تراکنش</span></th>
                    <th><span>مبلغ(تومان)</span></th>
                    <th><span>مانده(تومان)</span></th>
{{--                    <th class="check"><span></span></th>--}}

                </tr>
                </thead>
                <tbody>

                @foreach($bills as $bill)
                    @php($ar='tup')
                    @switch($bill->type)
                        @case('reserve_meet')
                        @php($ar='tdown')
                        @break
                        @case('charge_wallet')
                        @case('s_penalty_class_remain')
                        @php($ar='tup ')
                        @break
                    @endswitch
                    <tr>
                        <td><span>{{$loop->iteration}}</span></td>
                        <td><span>
                                <i class="icon-{{$ar}}"></i>{{$bill->transactionId}}</span>
                            <span>
{{--												<span class="stat {{$ar=='tdown'?'green':'red'}} ">{{$ar=='tdown'?'واریز':'برداشت'}}</span>--}}
											</span>
                        </td>
                        <td><span> {{__('arr.'.$bill->type) }}     </span></td>
                        <td><span> {{number_format($bill->wallet)}}  </span></td>
                        <td><span> {{number_format($bill->port)}}  </span></td>
                        <td><span>{{\Morilog\Jalali\Jalalian::forge($bill->created_at)->format('%B %d، %Y')}}</span></td>

                        <td>

                            <span>
                                <span class="price">
                                    <span class="num"> {{number_format($bill->amount)}}   </span>
                                    <span class="tom">تومان</span>
                                </span>
                            </span>
                        </td>
                        <td><span>{{number_format($bill->remain)}}</span></td>
                        {{--                                    <td><span class="but">جزییات</span></td>--}}
                    </tr>
                @endforeach


                </tbody>
            </table>
            {{ $bills->appends(Request::all())->links('home.section.pagination') }}
        </div>


    </div>


    <div style="overflow:hidden; margin-top: 30px" class="call-to-actions">
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
                                    <p><span class="num">0</span> <span class="tom">تومان</span></p>
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

                        <form action="{{route('student.charge.wallet',$user->id)}}" class=" " method="post"  >
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
                                <input  type="number" id="amount" name="amount"  >
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

@endcomponent
