@extends('master.home')
@section('main_body')
{{--    @php($header=true)--}}
{{--    @php($side=true)--}}
    @php($footer=true)

    <!-- Start Header Dashboard -->
    <div id="header-dashboard" class="rows">
        <div class="dashcontainer">

            <div id="mmenud">
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						  <line x1="4" y1="6" x2="20" y2="6"></line>
						  <line x1="4" y1="12" x2="20" y2="12"></line>
						  <line x1="4" y1="18" x2="20" y2="18"></line>
						</svg>
					</span>
            </div>
            <div class="welcome">
                <span>خوش آمدید؛ امروز
                       {{\Morilog\Jalali\Jalalian::forge('today')->format('%A %d %B ')}}
                   </span>
            </div><div class="user-menu">
                <ul>
                    <li>
                        <div class="wallet drops">
                            <div class="top">
									<span class="icon">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M15.033 11.2916C14.683 11.6332 14.483 12.1249 14.533 12.6499C14.608 13.5499 15.433 14.2082 16.333 14.2082H17.9163V15.1999C17.9163 16.9249 16.508 18.3333 14.783 18.3333H5.21634C3.49134 18.3333 2.08301 16.9249 2.08301 15.1999V9.59159C2.08301 7.86659 3.49134 6.45825 5.21634 6.45825H14.783C16.508 6.45825 17.9163 7.86659 17.9163 9.59159V10.7916H16.233C15.7663 10.7916 15.3413 10.9749 15.033 11.2916Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path opacity="0.4" d="M2.08301 10.3416V6.5333C2.08301 5.54163 2.69134 4.65826 3.61634 4.30826L10.233 1.80826C11.2663 1.41659 12.3747 2.18329 12.3747 3.29162V6.45828" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M18.7997 11.6417V13.3584C18.7997 13.8168 18.433 14.1917 17.9663 14.2084H16.333C15.433 14.2084 14.608 13.5501 14.533 12.6501C14.483 12.1251 14.683 11.6334 15.033 11.2917C15.3413 10.9751 15.7663 10.7917 16.233 10.7917H17.9663C18.433 10.8084 18.7997 11.1834 18.7997 11.6417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											<path opacity="0.4" d="M5.83301 10H11.6663" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
                            </div>
                            <div class="drop">
                                <div class="drop-container">
                                    <div class="wallet-drop">
                                        <div class="credit">
                                            <span class="title">موجودی شما</span>
                                            <span class="price">
													<span class="num"> {{number_format(auth()->user()->cash)}}</span>
													<span class="tom">تومان</span>
												</span>
                                        </div>
                                        <a href="{{route('student.wallet')}}">
												<span class="icon">
													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.333 5.00008V7.01675C18.333 8.33341 17.4997 9.16675 16.183 9.16675H13.333V3.34175C13.333 2.41675 14.0914 1.66675 15.0164 1.66675C15.9247 1.67508 16.758 2.04175 17.358 2.64175C17.958 3.25008 18.333 4.08341 18.333 5.00008Z" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M1.66699 5.83341V17.5001C1.66699 18.1917 2.45031 18.5834 3.00031 18.1667L4.42532 17.1001C4.75866 16.8501 5.22533 16.8834 5.52533 17.1834L6.90864 18.5751C7.23364 18.9001 7.76701 18.9001 8.09201 18.5751L9.492 17.1751C9.78367 16.8834 10.2503 16.8501 10.5753 17.1001L12.0003 18.1667C12.5503 18.5751 13.3337 18.1834 13.3337 17.5001V3.33341C13.3337 2.41675 14.0837 1.66675 15.0003 1.66675H5.83366H5.00033C2.50033 1.66675 1.66699 3.15841 1.66699 5.00008V5.83341Z" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
														<path opacity="0.4" d="M5 7.5H10" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														<path opacity="0.4" d="M5.625 10.8333H9.375" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</span>
                                            <span class="text">صورت حساب ها</span>
                                        </a>
                                        <a href="{{route('student.wallet')}}">
												<span class="icon">
													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<g opacity="0.4">
														<path d="M6.66699 10H13.3337" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M10 13.3334V6.66675" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														</g>
														<path d="M7.50033 18.3334H12.5003C16.667 18.3334 18.3337 16.6667 18.3337 12.5001V7.50008C18.3337 3.33341 16.667 1.66675 12.5003 1.66675H7.50033C3.33366 1.66675 1.66699 3.33341 1.66699 7.50008V12.5001C1.66699 16.6667 3.33366 18.3334 7.50033 18.3334Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</span>
                                            <span class="text">شارژ کیف پول</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
{{--                    <li>--}}
{{--                        <div class="wish drops">--}}
{{--                            <div class="top">--}}
{{--									<span class="icon">--}}
{{--										<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--											<path d="M11.3557 17.3416C11.0687 17.4416 10.596 17.4416 10.3089 17.3416C7.86085 16.5166 2.39062 13.0749 2.39062 7.24159C2.39062 4.66659 4.49261 2.58325 7.08421 2.58325C8.6206 2.58325 9.97972 3.31659 10.8323 4.44992C11.6849 3.31659 13.0525 2.58325 14.5804 2.58325C17.172 2.58325 19.274 4.66659 19.274 7.24159C19.274 13.0749 13.8038 16.5166 11.3557 17.3416Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--										</svg>--}}
{{--									</span>--}}
{{--                            </div>--}}
{{--                            <div class="drope">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <div class="notif drops">--}}
{{--                            <div class="top">--}}
{{--									<span class="icon">--}}
{{--										<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--											<path d="M15.9746 5.59165V15.0583C15.9746 16.2667 15.0967 16.775 14.0246 16.1917L10.707 14.3667C10.3525 14.175 9.77841 14.175 9.42386 14.3667L6.10628 16.1917C5.03418 16.775 4.15625 16.2667 4.15625 15.0583V5.59165C4.15625 4.16665 5.33808 3 6.78161 3H13.3493C14.7928 3 15.9746 4.16665 15.9746 5.59165Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--										</svg>--}}
{{--									</span>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </li>--}}
                </ul>
{{--                <a class="logout" href="{{route('student.logout',auth()->user()->id)}}">--}}
{{--						<span class="text">--}}
{{--							خروج از حساب--}}
{{--						</span>--}}
{{--                    <span class="icon">--}}
{{--							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--								<path d="M8.8999 7.55999C9.2099 3.95999 11.0599 2.48999 15.1099 2.48999H15.2399C19.7099 2.48999 21.4999 4.27999 21.4999 8.74999V15.27C21.4999 19.74 19.7099 21.53 15.2399 21.53H15.1099C11.0899 21.53 9.2399 20.08 8.9099 16.54" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--								<path d="M15.0001 12H3.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--								<path d="M5.85 8.6499L2.5 11.9999L5.85 15.3499" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--							</svg>--}}
{{--						</span>--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
    <!-- End Header Dashboard -->
    <div id="dash-main" class="rows">
        @include('home.student.sidebar')

        <div id="dash-content">
            <div>
{{--                {{$bread}}--}}

                {{$slot}}
            </div>
        </div>

    </div>
    @endsection
