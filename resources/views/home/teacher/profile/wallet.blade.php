@component('home.teacher.content',['title'=>' تنظیمات  '])


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
                        @php($ar='tup')
                        @break
                        @case('charge_wallet')
                        @case('s_penalty_class_remain')
                        @php($ar='tdown')
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


@endcomponent
