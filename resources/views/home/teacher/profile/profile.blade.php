@component('home.teacher.content',['title'=>' تنظیمات  '])

    <?php
    $c='c.svg';
    $uc='uc.svg';
    ?>








    <div class="popup not-fixeds">
        <div>
            <div>
                <div>
                    <div class="popup-container user-set-pop">
										<span class="close">
											<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"></path>
											</svg>
										</span>
                        @if($errors->any())
                            <div class="e_section" id="e_section">
                                {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                            </div>
                        @endif

                        <div class="user-set-pop-side">
                            <ul id="jtab">
                                <li class="taby ">
                                    <a href="#">
														<span class="icon">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M5 4V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4H19C19.2652 4 19.5196 4.10536 19.7071 4.29289C19.8946 4.48043 20 4.73478 20 5V19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20H1C0.734784 20 0.48043 19.8946 0.292893 19.7071C0.105357 19.5196 0 19.2652 0 19V5C0 4.73478 0.105357 4.48043 0.292893 4.29289C0.48043 4.10536 0.734784 4 1 4H5ZM2 15V18H18V15H2ZM2 13H18V6H2V13ZM7 2V4H13V2H7ZM9 10H11V12H9V10Z" fill="currentColor"></path>
															</svg>
														</span>
                                        <span class="text">رزومه</span>

                                    </a>
                                </li>
                                <li class="taby active">
                                    <a href="#">
														<span class="icon">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM5 10H7C7 10.7956 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20435 13 10 13C10.7956 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7956 13 10H15C15 11.3261 14.4732 12.5979 13.5355 13.5355C12.5979 14.4732 11.3261 15 10 15C8.67392 15 7.40215 14.4732 6.46447 13.5355C5.52678 12.5979 5 11.3261 5 10Z" fill="currentColor"></path>
															</svg>
														</span>
                                        <span class="text">حساب کاربری</span>
                                        <span class="num">
                                            <img src="/home/images/{{($user->attr('profile_plan') )?$c:$uc}}" alt="">
                                            </span>
                                    </a>
                                </li>

{{--                                <li class="taby ">--}}
{{--                                    <a href="#">--}}
{{--														<span class="icon">--}}
{{--															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--																<path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM9 10.792C8.4736 10.5623 8.04236 10.1583 7.77878 9.64797C7.51521 9.13767 7.43539 8.55217 7.55273 7.98994C7.67008 7.4277 7.97744 6.92302 8.42313 6.56075C8.86881 6.19847 9.42565 6.00071 10 6.00071C10.5744 6.00071 11.1312 6.19847 11.5769 6.56075C12.0226 6.92302 12.3299 7.4277 12.4473 7.98994C12.5646 8.55217 12.4848 9.13767 12.2212 9.64797C11.9576 10.1583 11.5264 10.5623 11 10.792V14H9V10.792Z" fill="currentColor"></path>--}}
{{--															</svg>--}}
{{--														</span>--}}
{{--                                        <span class="text">امنیت</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="taby">
                                    <a href="#">
														<span class="icon">
															<svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M16 5.2L21.213 1.55C21.288 1.49746 21.3759 1.4665 21.4672 1.4605C21.5586 1.4545 21.6498 1.4737 21.731 1.51599C21.8122 1.55829 21.8802 1.62206 21.9276 1.70035C21.9751 1.77865 22.0001 1.86846 22 1.96V14.04C22.0001 14.1315 21.9751 14.2214 21.9276 14.2996C21.8802 14.3779 21.8122 14.4417 21.731 14.484C21.6498 14.5263 21.5586 14.5455 21.4672 14.5395C21.3759 14.5335 21.288 14.5025 21.213 14.45L16 10.8V15C16 15.2652 15.8946 15.5196 15.7071 15.7071C15.5196 15.8946 15.2652 16 15 16H1C0.734784 16 0.48043 15.8946 0.292893 15.7071C0.105357 15.5196 0 15.2652 0 15V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H15C15.2652 0 15.5196 0.105357 15.7071 0.292893C15.8946 0.48043 16 0.734784 16 1V5.2ZM16 8.359L20 11.159V4.84L16 7.64V8.358V8.359ZM2 2V14H14V2H2ZM4 4H6V6H4V4Z" fill="currentColor"></path>
															</svg>
														</span>
                                        <span class="text">آپلود ویدیو</span>
                                        <span class="num">
                                    <img src="/home/images/{{(  $user->attr('port_vid'))?$c:$uc}}" alt="">
                                    </span>
                                    </a>
                                </li>
                                <li class="taby ">
                                    <a href="#">
														<span class="icon">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M18 10C17.9998 8.21688 17.4039 6.48494 16.3069 5.07919C15.2099 3.67345 13.6747 2.67448 11.9451 2.24094C10.2155 1.80739 8.39064 1.96411 6.76028 2.68621C5.12992 3.40831 3.78753 4.65439 2.94629 6.22659C2.10504 7.79879 1.81316 9.60698 2.11699 11.364C2.42083 13.1211 3.30296 14.7262 4.62331 15.9246C5.94366 17.1231 7.62653 17.846 9.40471 17.9787C11.1829 18.1114 12.9544 17.6462 14.438 16.657L15.548 18.321C13.9062 19.4187 11.975 20.0032 10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10V11.5C20.0001 12.2488 19.7601 12.9778 19.3152 13.5801C18.8703 14.1823 18.244 14.626 17.5283 14.846C16.8126 15.066 16.0453 15.0507 15.3389 14.8023C14.6326 14.5539 14.0245 14.0855 13.604 13.466C12.9366 14.16 12.083 14.6465 11.1457 14.8671C10.2085 15.0877 9.22747 15.033 8.32056 14.7096C7.41366 14.3861 6.61943 13.8077 6.03331 13.0438C5.44718 12.2799 5.09408 11.363 5.01644 10.4033C4.9388 9.44358 5.13991 8.48186 5.59562 7.63367C6.05133 6.78549 6.74225 6.08692 7.58537 5.6219C8.42849 5.15688 9.38794 4.94519 10.3485 5.01227C11.309 5.07934 12.2297 5.42232 13 6H15V11.5C15 11.8978 15.158 12.2794 15.4393 12.5607C15.7206 12.842 16.1022 13 16.5 13C16.8978 13 17.2794 12.842 17.5607 12.5607C17.842 12.2794 18 11.8978 18 11.5V10ZM10 7C9.20435 7 8.44129 7.31607 7.87868 7.87868C7.31607 8.44129 7 9.20435 7 10C7 10.7956 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20435 13 10 13C10.7956 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7956 13 10C13 9.20435 12.6839 8.44129 12.1213 7.87868C11.5587 7.31607 10.7956 7 10 7Z" fill="currentColor"></path>
															</svg>
														</span>
                                        <span class="text">توانایی ها</span>
                                        <span class="num">
                                    <img src="/home/images/{{( $user->attr('save_expert'))?$c:$uc}}" alt="">
                                    </span>
                                    </a>
                                </li>


                            </ul>
                        </div>

                        <div class="user-set-pop-content">
                            <ul class="tabv">
                                <li class="tabv">

                                    <div class="form">
                                        <form  class="mwidth pt0" action="{{route('Resume.store',$user->id)}}" method="post">
                                            @csrf
                                            @method('post')
                                            <div class="add-resume">
                                                <h3>افزودن رزومه جدید</h3>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div>
                                                            <div class="pic">
                                                                <img src="/home/images/add-resume.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div>
                                                            <div class="resume-form">
                                                                <h4>انتخاب نوع</h4>
                                                                <div class="radio-group">

                                                                    <ul>
                                                                        <li>
                                                                            <div class="label-container">
                                                                                <input type="radio" {{(old('type')=='education')?'checked':""}} name="type" id="resume" value="education" checked="">
                                                                                <label for="resume">سابقه کار</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="label-container">
                                                                                <input type="radio" {{(old('type')=='sabeghe')?'checked':""}} name="type" id="edjucation" value="sabeghe">
                                                                                <label for="edjucation">تحصیلات</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="label-container">
                                                                                <input type="radio" {{(old('type')=='licence')?'checked':""}} name="type" id="doc" value="licence">
                                                                                <label for="doc">مدارک</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="input-container {{old('title')?'active':''}} icon">
                                                                    <i class="right-bg">
                                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5 4V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4H19C19.2652 4 19.5196 4.10536 19.7071 4.29289C19.8946 4.48043 20 4.73478 20 5V19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20H1C0.734784 20 0.48043 19.8946 0.292893 19.7071C0.105357 19.5196 0 19.2652 0 19V5C0 4.73478 0.105357 4.48043 0.292893 4.29289C0.48043 4.10536 0.734784 4 1 4H5ZM2 15V18H18V15H2ZM2 13H18V6H2V13ZM7 2V4H13V2H7ZM9 10H11V12H9V10Z" fill="#8895BA"></path>
                                                                        </svg>
                                                                    </i>
                                                                    <span id="onv">عنوان سابقه کار را بنویسید</span>
                                                                    <input type="text" name="title" value="{{old('title')}}" placeholder="‏">

                                                                </div>

                                                                <div class="input-container textarea {{old('info')?'active':''}} icon">
                                                                    <i class="right-bg">
                                                                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M17 20H1C0.734784 20 0.48043 19.8946 0.292893 19.7071C0.105357 19.5196 0 19.2652 0 19V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H17C17.2652 0 17.5196 0.105357 17.7071 0.292893C17.8946 0.48043 18 0.734784 18 1V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20ZM16 18V2H2V18H16ZM5 5H13V7H5V5ZM5 9H13V11H5V9ZM5 13H13V15H5V13Z" fill="#8895BA"></path>
                                                                        </svg>
                                                                    </i>
                                                                    <span>توضیحات</span>
                                                                    <textarea name="info" placeholder="یک پاراگراف مرتبط با عنوان مورد نظر بنویسید" id="" cols="30" rows="10">{{old('info')}}</textarea>
                                                                </div>

                                                                <div class="input-container {{old('place')?'active':''}} icon">
                                                                    <i class="right-bg">
                                                                        <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M9 18.8999L13.95 13.9499C14.9289 12.9709 15.5955 11.7236 15.8656 10.3658C16.1356 9.00795 15.9969 7.60052 15.4671 6.32148C14.9373 5.04244 14.04 3.94923 12.8889 3.18009C11.7378 2.41095 10.3844 2.00043 9 2.00043C7.61557 2.00043 6.26222 2.41095 5.11109 3.18009C3.95996 3.94923 3.06275 5.04244 2.53292 6.32148C2.00308 7.60052 1.86442 9.00795 2.13445 10.3658C2.40449 11.7236 3.07111 12.9709 4.05 13.9499L9 18.8999ZM9 21.7279L2.636 15.3639C1.37734 14.1052 0.520187 12.5016 0.172928 10.7558C-0.17433 9.00995 0.00390685 7.20035 0.685099 5.55582C1.36629 3.91129 2.51984 2.50569 3.99988 1.51677C5.47992 0.527838 7.21998 0 9 0C10.78 0 12.5201 0.527838 14.0001 1.51677C15.4802 2.50569 16.6337 3.91129 17.3149 5.55582C17.9961 7.20035 18.1743 9.00995 17.8271 10.7558C17.4798 12.5016 16.6227 14.1052 15.364 15.3639L9 21.7279ZM9 10.9999C9.53044 10.9999 10.0391 10.7892 10.4142 10.4141C10.7893 10.0391 11 9.53035 11 8.99992C11 8.46949 10.7893 7.96078 10.4142 7.58571C10.0391 7.21064 9.53044 6.99992 9 6.99992C8.46957 6.99992 7.96086 7.21064 7.58579 7.58571C7.21072 7.96078 7 8.46949 7 8.99992C7 9.53035 7.21072 10.0391 7.58579 10.4141C7.96086 10.7892 8.46957 10.9999 9 10.9999ZM9 12.9999C7.93914 12.9999 6.92172 12.5785 6.17158 11.8283C5.42143 11.0782 5 10.0608 5 8.99992C5 7.93906 5.42143 6.92164 6.17158 6.17149C6.92172 5.42135 7.93914 4.99992 9 4.99992C10.0609 4.99992 11.0783 5.42135 11.8284 6.17149C12.5786 6.92164 13 7.93906 13 8.99992C13 10.0608 12.5786 11.0782 11.8284 11.8283C11.0783 12.5785 10.0609 12.9999 9 12.9999Z" fill="#8895BA"></path>
                                                                        </svg>
                                                                    </i>
                                                                    <span>محل</span>
                                                                    <input type="text" name="place"  value="{{old('place')}}" placeholder="‏">

                                                                </div>

                                                                <div class="select-box">
                                                                    <div class="right">
                                                                        <div class="input-container {{old('from')?'active':""}}">
                                                                            <span>سال شروع</span>
                                                                            <input type="number" value="{{old('from')}}"   name="from" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="input-container {{old('till')?'active':""}}">
                                                                            <span>سال اتمام</span>
                                                                            <input type="number" value="{{old('till')}}" name="till" >
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="button">
                                                                    <button class="send">ذخیره تغییرات</button>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="resume-history">
                                                <div class="tab-nav">
                                                    <ul>
                                                        <li class="active">
                                                            <span>سابقه کار</span>
                                                        </li>
                                                        <li>
                                                            <span>تحصیلات</span>
                                                        </li>
                                                        <li>
                                                            <span>مدارک</span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="tab-container">
                                                    <ul>
                                                        <li class="active">
                                                            <div>
                                                                @foreach($user->resumes()->whereType('education')->get() as $res)
                                                                    <div class="resume">

                                                                        <div class="left">
                                                                            <h5>{{$res->title}} ({{$res->place}})</h5>
                                                                            <p>
                                                                                {{$res->info}}
                                                                            </p>
                                                                            <span class="date">
																					<span>   {{$res->from}}-{{$res->till}}</span>
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.7" d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM11 10H15V12H9V5H11V10Z" fill="#889AAF"></path>
																						</svg>
																					</span>

																				</span>
                                                                        </div>
                                                                        <div class="edit-box">
                                                                            <form id="fff_{{$res->id}}" action="{{route('Resume.destroy',$res->id)}}" class="delete_user_note  nonee " style="display:none; padding-left: 5px" method="post"  >

                                                                            </form>
                                                                            <form id="fff_{{$res->id}}" action="{{route('Resume.destroy',$res->id)}}" class="delete_user_note  nonee " style="padding-left: 5px" method="post"  >
                                                                                @csrf
                                                                                @method('delete')

                                                                                <button class="remove">
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M7.08398 4.14175L7.26732 3.05008C7.40065 2.25841 7.50065 1.66675 8.90898 1.66675H11.0923C12.5007 1.66675 12.609 2.29175 12.734 3.05841L12.9173 4.14175" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path d="M15.7077 7.6167L15.166 16.0084C15.0744 17.3167 14.9993 18.3334 12.6743 18.3334H7.32435C4.99935 18.3334 4.92435 17.3167 4.83268 16.0084L4.29102 7.6167" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M8.60742 13.75H11.3824" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M7.91602 10.4167H12.0827" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																						</svg>
																					</span>
                                                                                    <span class="text">حذف</span>
                                                                                </button>
                                                                            </form>

                                                                            <form id="ddr_{{$res->id}}" action="{{route('Resume.edit',$res->id)}}" class="delete_user_note  nonee"   method="get"  >
                                                                                @csrf
                                                                                @method('get')
                                                                                <button class="edit">
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.4" d="M9.16602 1.66675H7.49935C3.33268 1.66675 1.66602 3.33341 1.66602 7.50008V12.5001C1.66602 16.6667 3.33268 18.3334 7.49935 18.3334H12.4993C16.666 18.3334 18.3327 16.6667 18.3327 12.5001V10.8334" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path d="M13.3675 2.51663L6.80088 9.0833C6.55088 9.3333 6.30088 9.82497 6.25088 10.1833L5.89254 12.6916C5.75921 13.6 6.40088 14.2333 7.30921 14.1083L9.81754 13.75C10.1675 13.7 10.6592 13.45 10.9175 13.2L17.4842 6.6333C18.6175 5.49997 19.1509 4.1833 17.4842 2.51663C15.8175 0.849967 14.5009 1.3833 13.3675 2.51663Z" stroke="#636379" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.4" d="M12.4258 3.45825C12.9841 5.44992 14.5424 7.00825 16.5424 7.57492" stroke="#636379" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
																						</svg>
																					</span>
                                                                                    <span class="text">ویرایش</span>
                                                                                </button>

                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </li>
                                                        <li >
                                                            <div>
                                                                @foreach($user->resumes()->whereType('sabeghe')->get() as $res1)
                                                                    <div class="resume">

                                                                        <div class="left">
                                                                            <h5>{{$res1->title}} ({{$res1->place}})</h5>
                                                                            <p>
                                                                                {{$res1->info}}
                                                                            </p>
                                                                            <span class="date">
																					<span>   {{$res1->from}}-{{$res1->till}}</span>
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.7" d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM11 10H15V12H9V5H11V10Z" fill="#889AAF"></path>
																						</svg>
																					</span>

																				</span>
                                                                        </div>
                                                                        <div class="edit-box">
                                                                            <form id="fff_{{$res1->id}}" action="{{route('Resume.destroy',$res1->id)}}" class="delete_user_note  nonee " style="display:none; padding-left: 5px" method="post"  >

                                                                            </form>
                                                                            <form id="ff_{{$res1->id}}" action="{{route('Resume.destroy',$res1->id)}}" class="delete_user_note nonee"   style="padding-left: 5px" method="post"  >
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button class="remove">
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M7.08398 4.14175L7.26732 3.05008C7.40065 2.25841 7.50065 1.66675 8.90898 1.66675H11.0923C12.5007 1.66675 12.609 2.29175 12.734 3.05841L12.9173 4.14175" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path d="M15.7077 7.6167L15.166 16.0084C15.0744 17.3167 14.9993 18.3334 12.6743 18.3334H7.32435C4.99935 18.3334 4.92435 17.3167 4.83268 16.0084L4.29102 7.6167" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M8.60742 13.75H11.3824" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M7.91602 10.4167H12.0827" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																						</svg>
																					</span>
                                                                                    <span class="text">حذف</span>
                                                                                </button>
                                                                            </form>

                                                                            <form id="dd_{{$res1->id}}" action="{{route('Resume.edit',$res1->id)}}" class="delete_user_note nonee"  method="get"  >
                                                                                @csrf
                                                                                @method('get')
                                                                                <button class="edit">
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.4" d="M9.16602 1.66675H7.49935C3.33268 1.66675 1.66602 3.33341 1.66602 7.50008V12.5001C1.66602 16.6667 3.33268 18.3334 7.49935 18.3334H12.4993C16.666 18.3334 18.3327 16.6667 18.3327 12.5001V10.8334" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path d="M13.3675 2.51663L6.80088 9.0833C6.55088 9.3333 6.30088 9.82497 6.25088 10.1833L5.89254 12.6916C5.75921 13.6 6.40088 14.2333 7.30921 14.1083L9.81754 13.75C10.1675 13.7 10.6592 13.45 10.9175 13.2L17.4842 6.6333C18.6175 5.49997 19.1509 4.1833 17.4842 2.51663C15.8175 0.849967 14.5009 1.3833 13.3675 2.51663Z" stroke="#636379" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.4" d="M12.4258 3.45825C12.9841 5.44992 14.5424 7.00825 16.5424 7.57492" stroke="#636379" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
																						</svg>
																					</span>
                                                                                    <span class="text">ویرایش</span>
                                                                                </button>

                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </li>
                                                        <li >
                                                            <div>
                                                                @foreach($user->resumes()->whereType('licence')->get() as $res2)
                                                                    <div class="resume">

                                                                        <div class="left">
                                                                            <h5>{{$res2->title}} ({{$res2->place}})</h5>
                                                                            <p>
                                                                                {{$res2->info}}
                                                                            </p>
                                                                            <span class="date">
																					<span>   {{$res2->from}}-{{$res2->till}}</span>
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.7" d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM11 10H15V12H9V5H11V10Z" fill="#889AAF"></path>
																						</svg>
																					</span>

																				</span>
                                                                        </div>
                                                                        <div class="edit-box">
                                                                            <form id="fff_{{$res2->id}}" action="{{route('Resume.destroy',$res2->id)}}" class="delete_user_note  nonee " style="display:none; padding-left: 5px" method="post"  >

                                                                            </form>
                                                                            <form id="ff_w{{$res2->id}}" action="{{route('Resume.destroy',$res2->id)}}" class="delete_user_note nonee dsinb"   style="padding-left: 5px" method="post"  >
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button class="remove">
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M7.08398 4.14175L7.26732 3.05008C7.40065 2.25841 7.50065 1.66675 8.90898 1.66675H11.0923C12.5007 1.66675 12.609 2.29175 12.734 3.05841L12.9173 4.14175" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path d="M15.7077 7.6167L15.166 16.0084C15.0744 17.3167 14.9993 18.3334 12.6743 18.3334H7.32435C4.99935 18.3334 4.92435 17.3167 4.83268 16.0084L4.29102 7.6167" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M8.60742 13.75H11.3824" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.34" d="M7.91602 10.4167H12.0827" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																						</svg>
																					</span>
                                                                                    <span class="text">حذف</span>
                                                                                </button>
                                                                            </form>

                                                                            <form id="dd_{{$res2->id}}" action="{{route('Resume.edit',$res2->id)}}" class="delete_user_note nonee dsinb" method="get"  >
                                                                                @csrf
                                                                                @method('get')
                                                                                <button class="edit">
																					<span class="icon">
																						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																							<path opacity="0.4" d="M9.16602 1.66675H7.49935C3.33268 1.66675 1.66602 3.33341 1.66602 7.50008V12.5001C1.66602 16.6667 3.33268 18.3334 7.49935 18.3334H12.4993C16.666 18.3334 18.3327 16.6667 18.3327 12.5001V10.8334" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path d="M13.3675 2.51663L6.80088 9.0833C6.55088 9.3333 6.30088 9.82497 6.25088 10.1833L5.89254 12.6916C5.75921 13.6 6.40088 14.2333 7.30921 14.1083L9.81754 13.75C10.1675 13.7 10.6592 13.45 10.9175 13.2L17.4842 6.6333C18.6175 5.49997 19.1509 4.1833 17.4842 2.51663C15.8175 0.849967 14.5009 1.3833 13.3675 2.51663Z" stroke="#636379" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
																							<path opacity="0.4" d="M12.4258 3.45825C12.9841 5.44992 14.5424 7.00825 16.5424 7.57492" stroke="#636379" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
																						</svg>
																					</span>
                                                                                    <span class="text">ویرایش</span>
                                                                                </button>

                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="tabv active">

                                    <p style="color: red; font-weight: bold; font-size: 25px;position: relative; bottom: 20px">
                                        ابعاد تصویر پروفایل باید با هم برابر و حداکثر یک مگابایت باشد

                                    </p>
                                    <div class="form">


                                        <form  id="avatarf" style="padding: 0" action="{{route('teacher.save.avatar',$user->id)}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('post')
                                        </form>
{{--                                        <form id="avatf" style="padding: 0" action="{{route('teacher.save.bg',$user->id)}}" enctype="multipart/form-data" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('post')--}}
{{--                                        </form>--}}

                                            <form  action="{{route('teacher.profile.save.info',$user->id)}}" class="mwidth " method="post"  >
                                                @csrf
                                                @method('post')
                                            <div class="cover">
                                               @if(file_exists(public_path('/src/bg/'.$user->attr('bg'))) && !empty($user->attr('bg')))

                                                    <div class="imgcov"  style="height: auto">
                                                        <img style="width: 100%" src="{{asset('/src/bg/'.$user->attr('bg'))}}" alt="">
                                                    </div>

                                                                           <img src="/home/images/cover.png" alt="">
                                                @else
                                                    <img style="width: 100%"  src="/home/images/cover.png" alt="">
                                                @endif

                                                <div class="upload">
                                                        <div class="lable-container">
                                                            <input id="cover-file" form="avatf" name="bg" class="avat2" type="file" accept="image/*">
                                                            <label for="cover-file">
                                                            <span class="icon">
                                                                <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.25 0.75H16.75L19.25 3.25H24.25C24.5815 3.25 24.8995 3.3817 25.1339 3.61612C25.3683 3.85054 25.5 4.16848 25.5 4.5V22C25.5 22.3315 25.3683 22.6495 25.1339 22.8839C24.8995 23.1183 24.5815 23.25 24.25 23.25H1.75C1.41848 23.25 1.10054 23.1183 0.866116 22.8839C0.631696 22.6495 0.5 22.3315 0.5 22V4.5C0.5 4.16848 0.631696 3.85054 0.866116 3.61612C1.10054 3.3817 1.41848 3.25 1.75 3.25H6.75L9.25 0.75ZM13 20.75C14.9891 20.75 16.8968 19.9598 18.3033 18.5533C19.7098 17.1468 20.5 15.2391 20.5 13.25C20.5 11.2609 19.7098 9.35322 18.3033 7.9467C16.8968 6.54018 14.9891 5.75 13 5.75C11.0109 5.75 9.10322 6.54018 7.6967 7.9467C6.29018 9.35322 5.5 11.2609 5.5 13.25C5.5 15.2391 6.29018 17.1468 7.6967 18.5533C9.10322 19.9598 11.0109 20.75 13 20.75ZM13 18.25C11.6739 18.25 10.4021 17.7232 9.46447 16.7855C8.52678 15.8479 8 14.5761 8 13.25C8 11.9239 8.52678 10.6521 9.46447 9.71447C10.4021 8.77678 11.6739 8.25 13 8.25C14.3261 8.25 15.5979 8.77678 16.5355 9.71447C17.4732 10.6521 18 11.9239 18 13.25C18 14.5761 17.4732 15.8479 16.5355 16.7855C15.5979 17.7232 14.3261 18.25 13 18.25Z" fill="white"></path>
                                                                </svg>
                                                            </span>
                                                                <span class="text">  آپلود تصویر کاور
                                                                    (حداکثر 8 مگ)
                                                                </span>
                                                            </label>
                                                        </div>
{{--                                                    <input type="file" id="cover-upload">--}}

                                                </div>
                                                <div class="avatar-upload">



                                                    <input id="profile-file" name="avatar" form="avatarf" class="avat" type="file" accept="image/*">
                                                    <label for="profile-file">
                                                        @if($user->attr('avatar'))
                                                            <div class="img" style="background: url('{{asset('src/avatar/'.$user->attr('avatar'))}}');"></div>
                                                        @else
                                                            <div class="img" style="background: url('/home/images/teacher.png');"></div>
                                                        @endif

                                                        <span class="icon">
													<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11.25 3.75H18.75L21.25 6.25H26.25C26.5815 6.25 26.8995 6.3817 27.1339 6.61612C27.3683 6.85054 27.5 7.16848 27.5 7.5V25C27.5 25.3315 27.3683 25.6495 27.1339 25.8839C26.8995 26.1183 26.5815 26.25 26.25 26.25H3.75C3.41848 26.25 3.10054 26.1183 2.86612 25.8839C2.6317 25.6495 2.5 25.3315 2.5 25V7.5C2.5 7.16848 2.6317 6.85054 2.86612 6.61612C3.10054 6.3817 3.41848 6.25 3.75 6.25H8.75L11.25 3.75ZM15 23.75C16.9891 23.75 18.8968 22.9598 20.3033 21.5533C21.7098 20.1468 22.5 18.2391 22.5 16.25C22.5 14.2609 21.7098 12.3532 20.3033 10.9467C18.8968 9.54018 16.9891 8.75 15 8.75C13.0109 8.75 11.1032 9.54018 9.6967 10.9467C8.29018 12.3532 7.5 14.2609 7.5 16.25C7.5 18.2391 8.29018 20.1468 9.6967 21.5533C11.1032 22.9598 13.0109 23.75 15 23.75ZM15 21.25C13.6739 21.25 12.4021 20.7232 11.4645 19.7855C10.5268 18.8479 10 17.5761 10 16.25C10 14.9239 10.5268 13.6521 11.4645 12.7145C12.4021 11.7768 13.6739 11.25 15 11.25C16.3261 11.25 17.5979 11.7768 18.5355 12.7145C19.4732 13.6521 20 14.9239 20 16.25C20 17.5761 19.4732 18.8479 18.5355 19.7855C17.5979 20.7232 16.3261 21.25 15 21.25Z" fill="white"></path>
													</svg>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>



                                            <div class="mwidth290">

                                                <div class="input-container icon {{old('name',$user->name)?'active':''}}">
                                                    <span>نام و نام خانوادگی</span>
                                                    <i class="right-bg">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM5 10H7C7 10.7957 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20436 13 10 13C10.7957 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7957 13 10H15C15 11.3261 14.4732 12.5979 13.5355 13.5355C12.5979 14.4732 11.3261 15 10 15C8.67392 15 7.40215 14.4732 6.46447 13.5355C5.52679 12.5979 5 11.3261 5 10Z" fill="#8895BA"/>
                                                        </svg>
                                                    </i>
                                                    <input name="name" type="text" value="{{old('name',$user->name)}}"  placeholder="   ">

                                                </div>

                                                <div class="input-container icon {{old('email',$user->email)?'active':''}}">
                                                    <span>ﺁﺩﺭﺱ ﺍﯾﻤﯿﻞ </span>
                                                    <i class="right-bg">
                                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18 10C17.9998 8.21689 17.4039 6.48494 16.3069 5.0792C15.2099 3.67345 13.6747 2.67449 11.9451 2.24094C10.2155 1.80739 8.39066 1.96411 6.7603 2.68621C5.12993 3.40831 3.78755 4.65439 2.9463 6.22659C2.10505 7.79879 1.81317 9.60698 2.11701 11.364C2.42084 13.1211 3.30297 14.7262 4.62332 15.9246C5.94367 17.1231 7.62655 17.846 9.40472 17.9787C11.1829 18.1114 12.9544 17.6462 14.438 16.657L15.548 18.321C13.6936 19.5576 11.4792 20.1392 9.25643 19.9735C7.03368 19.8077 4.93002 18.9042 3.2795 17.4062C1.62897 15.9083 0.526209 13.9018 0.146324 11.7055C-0.233561 9.5092 0.13121 7.24893 1.18271 5.28363C2.23421 3.31832 3.91216 1.76065 5.95011 0.857956C7.98806 -0.0447349 10.2692 -0.240691 12.4312 0.301204C14.5933 0.843099 16.5123 2.09178 17.8836 3.84896C19.2548 5.60614 19.9998 7.77108 20 10V11.5C20.0014 12.2499 19.7619 12.9804 19.3168 13.5838C18.8717 14.1873 18.2446 14.6319 17.5278 14.8521C16.811 15.0723 16.0424 15.0565 15.3353 14.8069C14.6281 14.5574 14.0199 14.0873 13.6 13.466C12.9322 14.1597 12.0784 14.6458 11.141 14.8659C10.2036 15.0861 9.22262 15.0309 8.31586 14.707C7.4091 14.3831 6.61516 13.8042 6.02941 13.04C5.44367 12.2758 5.09105 11.3587 5.01392 10.3989C4.93679 9.43913 5.13842 8.47749 5.5946 7.62953C6.05079 6.78158 6.7421 6.08338 7.5855 5.61882C8.42889 5.15426 9.38849 4.9431 10.349 5.01072C11.3095 5.07834 12.23 5.42186 13 6H15V11.5C15 11.8978 15.1581 12.2794 15.4394 12.5607C15.7207 12.842 16.1022 13 16.5 13C16.8978 13 17.2794 12.842 17.5607 12.5607C17.842 12.2794 18 11.8978 18 11.5V10ZM10 7C9.40667 7 8.82665 7.17595 8.3333 7.50559C7.83996 7.83524 7.45544 8.30377 7.22838 8.85195C7.00131 9.40013 6.9419 10.0033 7.05766 10.5853C7.17341 11.1672 7.45914 11.7018 7.87869 12.1213C8.29825 12.5409 8.8328 12.8266 9.41474 12.9424C9.99669 13.0581 10.5999 12.9987 11.1481 12.7716C11.6962 12.5446 12.1648 12.1601 12.4944 11.6667C12.8241 11.1734 13 10.5933 13 10C13 9.20435 12.6839 8.44129 12.1213 7.87868C11.5587 7.31607 10.7957 7 10 7Z" fill="#8895BA"/>
                                                        </svg>
                                                    </i>
{{--                                                    <i class="left-bg">--}}
{{--                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M6 12C4.81331 12 3.65328 11.6481 2.66658 10.9888C1.67989 10.3295 0.910851 9.39246 0.456726 8.2961C0.00259972 7.19975 -0.11622 5.99335 0.115291 4.82946C0.346802 3.66558 0.918247 2.59648 1.75736 1.75736C2.59648 0.918247 3.66558 0.346802 4.82946 0.115291C5.99335 -0.11622 7.19975 0.00259972 8.2961 0.456726C9.39246 0.910851 10.3295 1.67989 10.9888 2.66658C11.6481 3.65328 12 4.81331 12 6C12 7.5913 11.3679 9.11742 10.2426 10.2426C9.11742 11.3679 7.5913 12 6 12ZM6 10.8C6.94935 10.8 7.87738 10.5185 8.66674 9.99106C9.4561 9.46363 10.0713 8.71397 10.4346 7.83688C10.7979 6.9598 10.893 5.99468 10.7078 5.06357C10.5226 4.13246 10.0654 3.27718 9.39412 2.60589C8.72282 1.9346 7.86755 1.47744 6.93644 1.29223C6.00533 1.10702 5.04021 1.20208 4.16312 1.56538C3.28604 1.92868 2.53638 2.54391 2.00895 3.33327C1.48152 4.12262 1.2 5.05065 1.2 6C1.2 7.27304 1.70572 8.49394 2.60589 9.39412C3.50606 10.2943 4.72696 10.8 6 10.8ZM5.4 8.4L2.856 5.854L3.7 5.006L5.4 6.7L8.8 3.309L9.649 4.157L5.4 8.4Z" fill="#8B8EC4"/>--}}
{{--                                                        </svg>--}}
{{--                                                    </i>--}}
                                                    <input name="email" type="email" value="{{old('email',$user->email)}}"  placeholder="  ">

                                                </div>

                                                <div class="input-container phone {{old('mobile',$user->mobile)?'active':''}}">
                                                    <div class="code">
													<span class="flag">
														<img src="/home/images/iran.png" alt="">
													</span>
                                                        <span class="precode">
														+98
													</span>
                                                    </div>
                                                    <span>شماره موبایل</span>
                                                    <input name="mobile" type="number" value="{{old('mobile',$user->mobile)}}"  placeholder=" " readonly>

                                                </div>




                                                <div class="input-container icon textarea">
                                                    <span>بیو گرافی</span>
                                                    <i class="right-bg">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM5 10H7C7 10.7957 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20436 13 10 13C10.7957 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7957 13 10H15C15 11.3261 14.4732 12.5979 13.5355 13.5355C12.5979 14.4732 11.3261 15 10 15C8.67392 15 7.40215 14.4732 6.46447 13.5355C5.52679 12.5979 5 11.3261 5 10Z" fill="#8895BA"></path>
                                                        </svg>
                                                    </i>
                                                    <textarea name="bio" id="" cols="30" rows="20" placeholder="  خود را به زبان آموزانی که بیوگرافی شما را مشاهده میکنند معرفی کنید	  ">{{old('bio',$user->bio)}}</textarea>

                                                </div>


                                                <div class="input-container icon {{old('shaba',$user->attr('shaba'))?'active':''}}">
                                                    <span>  شماره شبا </span>
                                                    <input name="shaba" type="number" value="{{old('shaba',$user->attr('shaba'))}}"  placeholder="  ">
                                                </div>


                                                <div class="gender">
                                                    <div class="radio-group">

                                                        <ul>

                                                            <li>
                                                                <div class="label-container">
                                                                    <input {{(old('sex',$user->sex)=='male')?'checked':''}} type="radio" name="sex" id="male" value="male">
                                                                    <label for="male">آقا</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="label-container">
                                                                    <input {{(old('sex',$user->sex)=='female')?'checked':''}} type="radio" name="sex" id="female" value="female">
                                                                    <label for="female">خانم</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="button">
                                                    <button class="send">به روز رسانی</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>


{{--                                <li class="tabv">--}}
{{--                                    <div class="user-set-pop-content">--}}
{{--                                        <div class="form">--}}

{{--                                            <form id="repass" action="{{route('teacher.save.password',$user->id)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('post')--}}

{{--                                                <div class="pass-icon">--}}
{{--										<span class="icon">--}}
{{--											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--												<path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM9 10.792C8.4736 10.5623 8.04236 10.1583 7.77878 9.64797C7.51521 9.13767 7.43539 8.55217 7.55273 7.98994C7.67008 7.4277 7.97744 6.92302 8.42313 6.56075C8.86881 6.19847 9.42565 6.00071 10 6.00071C10.5744 6.00071 11.1312 6.19847 11.5769 6.56075C12.0226 6.92302 12.3299 7.4277 12.4473 7.98994C12.5646 8.55217 12.4848 9.13767 12.2212 9.64797C11.9576 10.1583 11.5264 10.5623 11 10.792V14H9V10.792Z" fill="white"></path>--}}
{{--											</svg>--}}
{{--										</span>--}}
{{--                                                    <span class="text">تغییر رمز عبور</span>--}}
{{--                                                </div>--}}

{{--                                                <div class="input-container icon active">--}}
{{--                                                    <span>رمز عبور فعلی</span>--}}
{{--                                                    <i class="right-bg">--}}
{{--                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM9 10.792C8.4736 10.5623 8.04236 10.1583 7.77879 9.64797C7.51522 9.13767 7.43539 8.55218 7.55274 7.98994C7.67008 7.42771 7.97744 6.92302 8.42313 6.56075C8.86882 6.19848 9.42565 6.00072 10 6.00072C10.5744 6.00072 11.1312 6.19848 11.5769 6.56075C12.0226 6.92302 12.3299 7.42771 12.4473 7.98994C12.5646 8.55218 12.4848 9.13767 12.2212 9.64797C11.9576 10.1583 11.5264 10.5623 11 10.792V14H9V10.792Z" fill="#8895BA"></path>--}}
{{--                                                        </svg>--}}
{{--                                                    </i>--}}
{{--                                                    <input type="text" value="{{\Illuminate\Support\Facades\Crypt::decryptString($user->password)}}" placeholder="‏">--}}
{{--                                                </div>--}}

{{--                                                <div class="input-container icon">--}}
{{--                                                    <span>رمز عبور جدید</span>--}}
{{--                                                    <i class="right-bg">--}}
{{--                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM9 10.792C8.4736 10.5623 8.04236 10.1583 7.77879 9.64797C7.51522 9.13767 7.43539 8.55218 7.55274 7.98994C7.67008 7.42771 7.97744 6.92302 8.42313 6.56075C8.86882 6.19848 9.42565 6.00072 10 6.00072C10.5744 6.00072 11.1312 6.19848 11.5769 6.56075C12.0226 6.92302 12.3299 7.42771 12.4473 7.98994C12.5646 8.55218 12.4848 9.13767 12.2212 9.64797C11.9576 10.1583 11.5264 10.5623 11 10.792V14H9V10.792Z" fill="#8895BA"></path>--}}
{{--                                                        </svg>--}}
{{--                                                    </i>--}}
{{--                                                    <i class="left-bg">--}}
{{--                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M6 12C4.81331 12 3.65328 11.6481 2.66658 10.9888C1.67989 10.3295 0.910851 9.39246 0.456726 8.2961C0.00259972 7.19975 -0.11622 5.99335 0.115291 4.82946C0.346802 3.66558 0.918247 2.59648 1.75736 1.75736C2.59648 0.918247 3.66558 0.346802 4.82946 0.115291C5.99335 -0.11622 7.19975 0.00259972 8.2961 0.456726C9.39246 0.910851 10.3295 1.67989 10.9888 2.66658C11.6481 3.65328 12 4.81331 12 6C12 7.5913 11.3679 9.11742 10.2426 10.2426C9.11742 11.3679 7.5913 12 6 12ZM6 10.8C6.94935 10.8 7.87738 10.5185 8.66674 9.99106C9.4561 9.46363 10.0713 8.71397 10.4346 7.83688C10.7979 6.9598 10.893 5.99468 10.7078 5.06357C10.5226 4.13246 10.0654 3.27718 9.39412 2.60589C8.72282 1.9346 7.86755 1.47744 6.93644 1.29223C6.00533 1.10702 5.04021 1.20208 4.16312 1.56538C3.28604 1.92868 2.53638 2.54391 2.00895 3.33327C1.48152 4.12262 1.2 5.05065 1.2 6C1.2 7.27304 1.70572 8.49394 2.60589 9.39412C3.50606 10.2943 4.72696 10.8 6 10.8ZM5.4 8.4L2.856 5.854L3.7 5.006L5.4 6.7L8.8 3.309L9.649 4.157L5.4 8.4Z" fill="#8B8EC4"></path>--}}
{{--                                                        </svg>--}}
{{--                                                    </i>--}}
{{--                                                    <input type="text" name="password" placeholder="‏">--}}
{{--                                                </div>--}}
{{--                                                <div class="input-container icon">--}}
{{--                                                    <span>تکرار رمز عبور جدید</span>--}}
{{--                                                    <i class="right-bg">--}}
{{--                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM9 10.792C8.4736 10.5623 8.04236 10.1583 7.77879 9.64797C7.51522 9.13767 7.43539 8.55218 7.55274 7.98994C7.67008 7.42771 7.97744 6.92302 8.42313 6.56075C8.86882 6.19848 9.42565 6.00072 10 6.00072C10.5744 6.00072 11.1312 6.19848 11.5769 6.56075C12.0226 6.92302 12.3299 7.42771 12.4473 7.98994C12.5646 8.55218 12.4848 9.13767 12.2212 9.64797C11.9576 10.1583 11.5264 10.5623 11 10.792V14H9V10.792Z" fill="#8895BA"></path>--}}
{{--                                                        </svg>--}}
{{--                                                    </i>--}}
{{--                                                    <i class="left-bg">--}}
{{--                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M6 12C4.81331 12 3.65328 11.6481 2.66658 10.9888C1.67989 10.3295 0.910851 9.39246 0.456726 8.2961C0.00259972 7.19975 -0.11622 5.99335 0.115291 4.82946C0.346802 3.66558 0.918247 2.59648 1.75736 1.75736C2.59648 0.918247 3.66558 0.346802 4.82946 0.115291C5.99335 -0.11622 7.19975 0.00259972 8.2961 0.456726C9.39246 0.910851 10.3295 1.67989 10.9888 2.66658C11.6481 3.65328 12 4.81331 12 6C12 7.5913 11.3679 9.11742 10.2426 10.2426C9.11742 11.3679 7.5913 12 6 12ZM6 10.8C6.94935 10.8 7.87738 10.5185 8.66674 9.99106C9.4561 9.46363 10.0713 8.71397 10.4346 7.83688C10.7979 6.9598 10.893 5.99468 10.7078 5.06357C10.5226 4.13246 10.0654 3.27718 9.39412 2.60589C8.72282 1.9346 7.86755 1.47744 6.93644 1.29223C6.00533 1.10702 5.04021 1.20208 4.16312 1.56538C3.28604 1.92868 2.53638 2.54391 2.00895 3.33327C1.48152 4.12262 1.2 5.05065 1.2 6C1.2 7.27304 1.70572 8.49394 2.60589 9.39412C3.50606 10.2943 4.72696 10.8 6 10.8ZM5.4 8.4L2.856 5.854L3.7 5.006L5.4 6.7L8.8 3.309L9.649 4.157L5.4 8.4Z" fill="#8B8EC4"></path>--}}
{{--                                                        </svg>--}}
{{--                                                    </i>--}}
{{--                                                    <input type="text" name="password_confirmation" placeholder="‏">--}}
{{--                                                </div>--}}

{{--                                                <div class="strength">--}}
{{--                                                    <ul>--}}
{{--                                                        <li><span class="green"></span></li>--}}
{{--                                                        <li><span class="green"></span></li>--}}
{{--                                                        <li><span class="green"></span></li>--}}
{{--                                                        <li><span></span></li>--}}
{{--                                                    </ul>--}}
{{--                                                    <span>قوی</span>--}}
{{--                                                </div>--}}

{{--                                                <div class="pass-rules">--}}
{{--                                                    <ul>--}}
{{--                                                        <li>--}}
{{--												<span class="icon green">--}}
{{--													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--														<path d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM9 14L16.07 6.929L14.659 5.515L9 11.172L6.174 8.34301L4.76 9.757L9 14Z" fill="currentColor"></path>--}}
{{--													</svg>--}}
{{--												</span>--}}
{{--                                                            <span class="text">بیشتر از ۶ کارکتر</span>--}}
{{--                                                        </li>--}}
{{--                                                        <li>--}}
{{--												<span class="icon">--}}
{{--													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--														<path d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM9 14L16.07 6.929L14.659 5.515L9 11.172L6.174 8.34301L4.76 9.757L9 14Z" fill="currentColor"></path>--}}
{{--													</svg>--}}
{{--												</span>--}}
{{--                                                            <span class="text">حداقل شامل یک کارکتر باشد</span>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <div class="button">--}}
{{--                                                    <button class="send">به روز رسانی</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                                <li class="tabv">

                                    <div class="form">
                                            <form id="port_form"  class="mwidth pt0" action="{{route('teacher.save.port',$user->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                            <div class="video-cover-upload">
                                                <h2>
                                                    عکس و ویدئو را انتخاب و سپس دکمه خیره را کلیک کنید
                                                </h2>
                                                <div class="right">

                                                    <h3>
                                                        <span>تصویر شاخص</span>
                                                        <span class="gray">(عکس کاور ویدیو را آپلود کنید)</span>
                                                        <span class="gray" id="cname"></span>

                                                    </h3>
                                                </div>
                                                <div class="left">
                                                    <div class="button">
                                                        <input type="file" id="video-cover" accept="image/*" name="port_img">
                                                        <label for="video-cover" class="back">  انتخاب فایل </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="video-upload">
                                                <div class="title">
                                                    <h3>
                                                        آپلود ویدیوی معرفی
                                                        <span class="small">(با آپلود ویدئو معرفی، دانشجویان بیشتری را به خود جذب کنید)</span>
                                                    </h3>
                                                </div>

                                                <div class="video-upload-box">
                                                    <input type="file" accept="video/mp4" id="video-upload" name="port_vid">
                                                    <label for="video-upload">
                                                        <div class="right">
                                                            <div class="icond">
														<span class="icon">
															<svg width="62" height="50" viewBox="0 0 62 50" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M43.0255 38.2259C40.3665 38.2259 37.6845 38.1979 35.0255 38.2259C34.7623 38.2196 34.5116 38.1122 34.3255 37.926C34.1393 37.7398 34.0319 37.4891 34.0255 37.2259C34.0535 35.5769 34.3615 36.2259 36.0255 36.2259C40.7605 36.2259 45.2905 36.2399 50.0255 36.2259C55.2255 36.2119 59.1395 31.4159 59.0255 26.2259C59.0028 24.4286 58.4093 22.685 57.3308 21.247C56.2523 19.809 54.7446 18.751 53.0255 18.2259C52.7816 18.1702 52.5584 18.0469 52.3815 17.87C52.2046 17.6931 52.0812 17.4698 52.0255 17.2259C51.8462 15.9703 51.4167 14.7635 50.7626 13.6769C50.1084 12.5903 49.2428 11.6461 48.217 10.9001C47.1913 10.1541 46.0263 9.62155 44.791 9.33398C43.5557 9.0464 42.2753 9.00965 41.0255 9.22591C39.2765 9.48191 37.4335 9.15991 36.0255 10.2259C35.5985 10.5389 35.1965 10.6529 35.0255 10.2259C32.8355 4.87991 27.8125 2.15491 22.0255 2.22591C18.7747 2.31864 15.6674 3.58493 13.2777 5.79078C10.8881 7.99662 9.37762 10.9929 9.02554 14.2259C8.86203 15.2192 8.86203 16.2326 9.02554 17.2259C9.11054 17.6949 9.42554 18.0979 9.02554 18.2259C7.07235 18.8198 5.35089 20.0038 4.09754 21.6152C2.84419 23.2267 2.12039 25.1866 2.02554 27.2259C2.03083 29.6112 2.98073 31.8974 4.66742 33.584C6.3541 35.2707 8.64022 36.2206 11.0255 36.2259C16.1015 36.2539 20.9495 36.2539 26.0255 36.2259C26.1612 36.2074 26.2993 36.2205 26.4291 36.2642C26.5589 36.3079 26.6768 36.381 26.7736 36.4778C26.8704 36.5747 26.9436 36.6926 26.9873 36.8223C27.031 36.9521 27.0441 37.0902 27.0255 37.2259C26.9825 38.6909 27.5045 38.2259 26.0255 38.2259H12.0255C5.25754 38.2259 -0.429457 32.9659 0.0255431 26.2259C0.309543 21.9889 2.25754 19.2169 6.02554 17.2259C6.43754 17.0129 7.02554 16.7089 7.02554 16.2259C7.01154 8.07891 12.0345 1.67591 20.0255 0.22591C23.0846 -0.295216 26.2292 0.0898269 29.0722 1.33361C31.9151 2.57739 34.3321 4.62559 36.0255 7.22591C36.4095 7.82591 36.3575 7.49591 37.0255 7.22591C44.0065 4.43891 52.0495 8.94591 54.0255 16.2259C54.1395 16.6669 54.5985 16.0129 55.0255 16.2259C59.4045 18.3159 61.6085 23.6329 61.0255 28.2259C60.3715 33.3869 56.9875 37.2729 52.0255 38.2259C51.0284 38.3326 50.0227 38.3326 49.0255 38.2259C47.0345 38.2119 45.0155 38.2259 43.0255 38.2259Z" fill="#CDD5DE"/>
																<path d="M30.025 24.2259C27.65 26.6149 25.215 28.9789 23.025 31.2259C22.584 31.6669 22.48 31.7259 22.025 31.2259C20.902 30.0169 20.873 30.3779 22.025 29.2259C24.883 26.3679 27.167 23.1119 30.025 20.2259C30.38 19.8709 30.598 19.7989 31.025 20.2259C34.125 23.3679 37.897 27.1259 41.025 30.2259C41.366 30.5669 41.425 29.8989 41.025 30.2259C40.57 30.5959 39.537 32.2259 39.025 32.2259C38.513 32.2259 38.437 30.6379 38.025 30.2259C36.191 28.4059 34.845 27.0459 33.025 25.2259L32.025 24.2259C31.825 24.4959 32.025 24.9839 32.025 25.2259C32.025 32.9889 31.997 41.4629 32.025 49.2259C32.025 49.8659 31.679 49.2539 31.025 49.2259C29.546 49.1829 30.025 49.6909 30.025 48.2259V25.2259C29.997 25.0269 30.025 24.7099 30.025 24.2259Z" fill="#CDD5DE"/>
															</svg>
														</span>
                                                                <span class="text">
															آپلود ویدیو معرفی
														</span>
                                                            </div>
                                                            <ul class="circle">
                                                                <li>حجم ویدئو حداکثر 20 مگابایت باشد</li>
                                                                <li>‏فرمت قابل قبول : MP4 </li>
                                                            </ul>
                                                        </div>
                                                        <div class="left">
                                                            <div class="button">
                                                                <div class="send">انتخاب فایل</div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>

                                                <div class="link-title">
                                                    <span>آپلود از طریق لینک</span>
                                                </div>

                                                <div class="input-container icon">
                                                    <i class="right-bg">
                                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.58673 0.304718C4.95837 0.263265 3.47419 1.36682 3.09356 3.01663L2.53888 5.41898C4.08588 2.89698 6.74867 1.23327 9.69317 0.948273L7.29083 0.393585C7.05514 0.339148 6.81935 0.31064 6.58673 0.304718ZM10.8074 2.50003C7.18467 2.58063 3.88029 4.99044 2.82892 8.65726C1.53492 13.1703 4.14454 17.8769 8.65704 19.1709C13.1695 20.4649 17.8767 17.8558 19.1707 13.3428C20.4647 8.8298 17.8556 4.12313 13.3426 2.82913C12.4964 2.58651 11.6435 2.48143 10.8074 2.50003ZM16.5809 2.53909C19.1029 4.08609 20.7666 6.74889 21.0516 9.69339L21.6063 7.29105C22.0418 5.40555 20.8687 3.52878 18.9832 3.09378L16.5809 2.53909ZM9.09552 5.29495C9.22794 5.3052 9.36133 5.32922 9.49395 5.36722C10.5555 5.67122 11.169 6.77837 10.865 7.83987C10.561 8.90137 9.45292 9.51497 8.39142 9.21097C7.32992 8.90697 6.7168 7.79981 7.0213 6.73831C7.28774 5.8095 8.16858 5.22324 9.09552 5.29495ZM14.8631 6.94925C14.9956 6.95953 15.1288 6.98345 15.2615 7.02151C16.323 7.32551 16.9371 8.43267 16.6326 9.49417C16.3286 10.5552 15.2205 11.1693 14.159 10.8653C13.0975 10.5613 12.4839 9.45411 12.7879 8.39261C13.0539 7.4638 13.9358 6.87729 14.8631 6.94925ZM11.0174 10.001C11.5694 10.0105 12.0083 10.4651 11.9988 11.0176C11.9893 11.5696 11.5347 12.0086 10.9822 11.9991C10.4302 11.9896 9.99129 11.535 10.0008 10.9825C10.0103 10.4305 10.4649 9.99151 11.0174 10.001ZM7.4422 11.0635C7.57466 11.0738 7.70795 11.0968 7.84063 11.1348C8.90213 11.4388 9.51623 12.5469 9.21173 13.6084C8.90723 14.6699 7.79909 15.283 6.73809 14.9785C5.67659 14.6745 5.0625 13.5674 5.367 12.5059C5.633 11.5771 6.51494 10.9918 7.4422 11.0635ZM0.948056 12.3076L0.393368 14.71C-0.0416316 16.5955 1.13092 18.4718 3.01642 18.9073L5.41876 19.4619C2.89726 17.9149 1.23306 15.2521 0.948056 12.3076ZM13.2088 12.7168C13.3413 12.7271 13.4755 12.7511 13.6082 12.7891C14.6697 13.0931 15.2828 14.2002 14.9783 15.2617C14.6738 16.3232 13.5672 16.9368 12.5057 16.6328C11.4442 16.3288 10.8306 15.2217 11.1346 14.1602C11.4006 13.2314 12.2815 12.6451 13.2088 12.7168ZM19.4617 16.5811C17.9147 19.1026 15.2519 20.7668 12.3074 21.0518L14.7098 21.6065C16.5953 22.0415 18.4715 20.8689 18.907 18.9834L19.4617 16.5811Z" fill="#8895BA"/>
                                                        </svg>
                                                    </i>
                                                    <span>لینک ویدیو در آپارات</span>
                                                    <input type="text" name="aparat_link">
                                                </div>
                                                <div class="button">
                                                    @if($user->attr('port_vid'))
                                                    <a href="#" class="more" id="classtut">مشاهده ویدئو من </a>
                                                    @endif
                                                    <button class="send">ذخیره   </button>
                                                </div>
                                            </div>


                                            <div class="instruction">
                                                <h3>دستور العمل ضبط ویدئو معرفی</h3>

                                                <div class="about-text" style="max-height: 120px;">
                                                    <div>
                                                        <p>
                                                            یکی از موارد مهم و تاثیر گذار در معرفی شما و انتخاب شما توسط زبان آموزان به عنوان مدرس، ویدیو معرفی است بنابراین این مورد را با حساسیت بیشتر انجام دهید تا به نتیجه مطلوب تری برسید.
                                                            در این مقاله می پردازیم به اینکه "یک ویدیو معرفی چه ویژگی ها و استاندارد هایی باید داشته باشد" تا شما اساتید بتوانید ویدیو با کیفیت در پروفایلتان آپلود کنید.
                                                            بهتر است زمان ویدیو طولانی یا کوتاه نباشد؛ حدود 1 تا 2 دقیقه مناسب تر است. نهایت حجم ویدیو 20 مگابایت است در صورتی که حجم ویدیو شما بیش از حد تعیین شده می باشد با نرم افزار HandBrake حجم ویدو را بدون افت کیفیت کاهش دهید. ویدیو باید با دوربین مناسب ضبط و فیلمبرداری شود. برای ضبط ویدیو حتی می تواند از وبکم کامپیوتر، تلفن همراه و ... که دارای دوربین با رزولوشن بالا هستند، استفاده کنید در این روش ها ضبط ویدیو به صورت افقی مناسب تر است. همچنین توجه داشته باشید که صدای شما رسا و با کیفیت عالی می باشد. دوربین ثابت و بدون لرزش باشد و فاصله خود با دوربین را تنظیم کنید تا بیش از حد نزدیک یا دور نباشید.
                                                            در مکانی که درای پس زمینه ساده و مرتب است ویدیو را ضبط کنید. دقت داشته باشید که هنگام فیلمبرداری محیط آرام، بدون صداهای پس زمینه و آزار دهنده (صدای گریه کودک، بوق خودرو، صدای تلویزیون و ...) باشد.
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="about-more">
                                                    <div>

												<span class="down">
													<svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M4.01206 2.89392L6.23406 0.354919C6.27833 0.300743 6.33409 0.257085 6.3973 0.227105C6.46051 0.197125 6.5296 0.181572 6.59956 0.181572C6.66952 0.181572 6.73861 0.197125 6.80182 0.227105C6.86504 0.257085 6.92079 0.300743 6.96506 0.354919C7.06284 0.472267 7.11638 0.620177 7.11638 0.772919C7.11638 0.925661 7.06284 1.07357 6.96506 1.19092L4.38006 4.14892C4.33579 4.20309 4.28004 4.24675 4.21682 4.27673C4.15361 4.30671 4.08452 4.32227 4.01456 4.32227C3.9446 4.32227 3.87551 4.30671 3.8123 4.27673C3.74909 4.24675 3.69333 4.20309 3.64906 4.14892L1.06306 1.19192C0.965287 1.07457 0.911743 0.926661 0.911743 0.773919C0.911743 0.621176 0.965287 0.473267 1.06306 0.355919C1.10733 0.301743 1.16309 0.258085 1.2263 0.228105C1.28951 0.198125 1.3586 0.182572 1.42856 0.182572C1.49852 0.182572 1.56761 0.198125 1.63082 0.228105C1.69404 0.258085 1.74979 0.301743 1.79406 0.355919L4.01206 2.89392Z" fill="currentColor"></path>
													</svg>
												</span>
                                                        <span>مشاهده بیشتر</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="videos">
                                                <h3>تعدادی از ویدیو های مناسب</h3>
                                                <p>ویدیو های زیر مورد تایید سایت میباشد میتوانید برای ساخت ویدیو خود از این ویدیو ها الگو بگیرید </p>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">

                                                        <div>
                                                            <div class="video">

                                                                <video id="player" class="js-player" playsinline controls data-poster="{{asset('/src/port_img/89_port_vid.m4v' )}}">
                                                                    <source src="{{asset('/src/port_vid/s2.mp4')}}" type="video/mp4" />
                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div>
                                                            <div class="video">
                                                                <video id="player" class="js-player" playsinline controls data-poster="/path/to/poster.jpg">
                                                                    <source src="{{asset('/src/port_vid/s1.mp4')}}" type="video/mp4" />

                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="tabv">
                                    <div class="user-set-pop-content" style="margin-right: 0">
                                        <div class="form">
                                            <form  class="mwidth pt0" action="{{route('teacher.save.expert',$user->id)}}" method="post" id="teacher_ab_form">
                                                @csrf
                                                @method('post')


                                            <div class="expert-form">


                                                    <div class="expert-section">
                                                        <h4>سطوح تدریس</h4>
                                                        <div class="forsm">
                                                            <div class="ra row">

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Starter">
                                                                            <input type="checkbox" {{($user->attr('Starter'))?'checked':''}} id="Starter" name="Starter">
                                                                            <label class="key" for="Starter">

                                                                                <div class="right">
                                                                                    <span>       Starter</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>

                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Elementary">
                                                                            <input type="checkbox" {{($user->attr('Elementary'))?'checked':''}} id="Elementary" name="Elementary">
                                                                            <label class="key" for="Elementary">

                                                                                <div class="right">
                                                                                    <span>       Elementary</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Intermediate">
                                                                            <input type="checkbox" {{($user->attr('Intermediate'))?'checked':''}} id="Intermediate" name="Intermediate">
                                                                            <label class="key" for="Intermediate">

                                                                                <div class="right">
                                                                                    <span>       Intermediate</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Upper_intermediate">
                                                                            <input type="checkbox" {{($user->attr('Upper_intermediate'))?'checked':''}} id="Upper_intermediate" name="Upper_intermediate">
                                                                            <label class="key" for="Upper_intermediate">

                                                                                <div class="right">
                                                                                    <span>       Upper intermediate</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Advanced">
                                                                            <input type="checkbox" {{($user->attr('Advanced'))?'checked':''}} id="Advanced" name="Advanced">
                                                                            <label class="key" for="Advanced">

                                                                                <div class="right">
                                                                                    <span>       Advanced</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Mastery">
                                                                            <input type="checkbox" {{($user->attr('Mastery'))?'checked':''}} id="Mastery" name="Mastery">
                                                                            <label class="key" for="Mastery">

                                                                                <div class="right">
                                                                                    <span>       Mastery</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="expert-section">
                                                        <h4>لهجه مدرس</h4>
                                                        <div class="forsm">
                                                            <div class="ra row">
                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="American_Accent">
                                                                            <input type="checkbox" {{($user->attr('American_Accent'))?'checked':''}} id="American_Accent" name="American_Accent">
                                                                            <label class="key" for="American_Accent">

                                                                                <div class="right">
                                                                                    <span>       American Accent</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="British_Accent">
                                                                            <input type="checkbox" {{($user->attr('British_Accent'))?'checked':''}} id="British_Accent" name="British_Accent">
                                                                            <label class="key" for="British_Accent">

                                                                                <div class="right">
                                                                                    <span>       British Accent</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Australian_Accent">
                                                                            <input type="checkbox" {{($user->attr('Australian_Accent'))?'checked':''}} id="Australian_Accent" name="Australian_Accent">
                                                                            <label class="key" for="Australian_Accent">

                                                                                <div class="right">
                                                                                    <span>       Australian Accent</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Indian_Accent">
                                                                            <input type="checkbox" {{($user->attr('Indian_Accent'))?'checked':''}} id="Indian_Accent" name="Indian_Accent">
                                                                            <label class="key" for="Indian_Accent">

                                                                                <div class="right">
                                                                                    <span>       Indian Accent</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Irish_Accent">
                                                                            <input type="checkbox" {{($user->attr('Irish_Accent'))?'checked':''}} id="Irish_Accent" name="Irish_Accent">
                                                                            <label class="key" for="Irish_Accent">

                                                                                <div class="right">
                                                                                    <span>       Irish Accent</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Scottish_Accent">
                                                                            <input type="checkbox" {{($user->attr('Scottish_Accent'))?'checked':''}} id="Scottish_Accent" name="Scottish_Accent">
                                                                            <label class="key" for="Scottish_Accent">

                                                                                <div class="right">
                                                                                    <span>       Scottish Accent</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="South_African_Accent">
                                                                            <input type="checkbox" {{($user->attr('South_African_Accent'))?'checked':''}} id="South_African_Accent" name="South_African_Accent">
                                                                            <label class="key" for="South_African_Accent">

                                                                                <div class="right">
                                                                                    <span>       South African Accent</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="expert-section">
                                                        <h4>سن</h4>
                                                        <div class="forsm">
                                                            <div class="ra row">
                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Children_">
                                                                            <input type="checkbox" {{($user->attr('Children'))?'checked':''}} id="Children_(4-11)" name="Children">
                                                                            <label class="key" for="Children_(4-11)">

                                                                                <div class="right">
                                                                                    <span>       Children (4-11)</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Teenagers_">
                                                                            <input type="checkbox" {{($user->attr('Teenagers'))?'checked':''}} id="Teenagers_(12-18)" name="Teenagers">
                                                                            <label class="key" for="Teenagers_(12-18)">

                                                                                <div class="right">
                                                                                    <span>       Teenagers (12-18)</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Adults_">
                                                                            <input type="checkbox" {{($user->attr('Adults'))?'checked':''}} id="Adults_(18+)" name="Adults">
                                                                            <label class="key" for="Adults_(18+)">

                                                                                <div class="right">
                                                                                    <span>       Adults (18+)</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="expert-section">
                                                        <h4>کلاس شامل چه  مواردی میشود</h4>
                                                        <div class="forsm">
                                                            <div class="ra row">
                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Curriculum">
                                                                            <input type="checkbox" {{($user->attr('Curriculum'))?'checked':''}} id="Curriculum" name="Curriculum">
                                                                            <label class="key" for="Curriculum">

                                                                                <div class="right">
                                                                                    <span>       Curriculum</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Homework">
                                                                            <input type="checkbox" {{($user->attr('Homework'))?'checked':''}} id="Homework" name="Homework">
                                                                            <label class="key" for="Homework">

                                                                                <div class="right">
                                                                                    <span>       Homework</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Learning_Materials">
                                                                            <input type="checkbox" {{($user->attr('Learning_Materials'))?'checked':''}} id="Learning_Materials" name="Learning_Materials">
                                                                            <label class="key" for="Learning_Materials">

                                                                                <div class="right">
                                                                                    <span>       Learning Materials</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Writing_Exercises">
                                                                            <input type="checkbox" {{($user->attr('Writing_Exercises'))?'checked':''}} id="Writing_Exercises" name="Writing_Exercises">
                                                                            <label class="key" for="Writing_Exercises">

                                                                                <div class="right">
                                                                                    <span>       Writing Exercises</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Lesson_Plans">
                                                                            <input type="checkbox" {{($user->attr('Lesson_Plans'))?'checked':''}} id="Lesson_Plans" name="Lesson_Plans">
                                                                            <label class="key" for="Lesson_Plans">

                                                                                <div class="right">
                                                                                    <span>       Lesson Plans</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Proficiency_Assessment">
                                                                            <input type="checkbox" {{($user->attr('Proficiency_Assessment'))?'checked':''}} id="Proficiency_Assessment" name="Proficiency_Assessment">
                                                                            <label class="key" for="Proficiency_Assessment">

                                                                                <div class="right">
                                                                                    <span>       Proficiency Assessment</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Quizzes_Tests">
                                                                            <input type="checkbox" {{($user->attr('Quizzes_Tests'))?'checked':''}} id="Quizzes_Tests" name="Quizzes_Tests">
                                                                            <label class="key" for="Quizzes_Tests">

                                                                                <div class="right">
                                                                                    <span>       Quizzes Tests</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Reading_Exercises">
                                                                            <input type="checkbox" {{($user->attr('Reading_Exercises'))?'checked':''}} id="Reading_Exercises" name="Reading_Exercises">
                                                                            <label class="key" for="Reading_Exercises">

                                                                                <div class="right">
                                                                                    <span>       Reading Exercises</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="expert-section">
                                                        <h4>موضوعات</h4>
                                                        <div class="forsm">
                                                            <div class="ra row">
                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Business_English">
                                                                            <input type="checkbox" {{($user->attr('Business_English'))?'checked':''}} id="Business_English" name="Business_English">
                                                                            <label class="key" for="Business_English">

                                                                                <div class="right">
                                                                                    <span>       Business English</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Interview_Preparation">
                                                                            <input type="checkbox" {{($user->attr('Interview_Preparation'))?'checked':''}} id="Interview_Preparation" name="Interview_Preparation">
                                                                            <label class="key" for="Interview_Preparation">

                                                                                <div class="right">
                                                                                    <span>       Interview Preparation</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Reading_Comprehension">
                                                                            <input type="checkbox" {{($user->attr('Reading_Comprehension'))?'checked':''}} id="Reading_Comprehension" name="Reading_Comprehension">
                                                                            <label class="key" for="Reading_Comprehension">

                                                                                <div class="right">
                                                                                    <span>       Reading Comprehension</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Listening_Comprehension">
                                                                            <input type="checkbox" {{($user->attr('Listening_Comprehension'))?'checked':''}} id="Listening_Comprehension" name="Listening_Comprehension">
                                                                            <label class="key" for="Listening_Comprehension">

                                                                                <div class="right">
                                                                                    <span>       Listening Comprehension</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Speaking_Practice">
                                                                            <input type="checkbox" {{($user->attr('Speaking_Practice'))?'checked':''}} id="Speaking_Practice" name="Speaking_Practice">
                                                                            <label class="key" for="Speaking_Practice">

                                                                                <div class="right">
                                                                                    <span>       Speaking Practice</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Writing_Correction">
                                                                            <input type="checkbox" {{($user->attr('Writing_Correction'))?'checked':''}} id="Writing_Correction" name="Writing_Correction">
                                                                            <label class="key" for="Writing_Correction">

                                                                                <div class="right">
                                                                                    <span>       Writing Correction</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Vocabulary_Development">
                                                                            <input type="checkbox" {{($user->attr('Vocabulary_Development'))?'checked':''}} id="Vocabulary_Development" name="Vocabulary_Development">
                                                                            <label class="key" for="Vocabulary_Development">

                                                                                <div class="right">
                                                                                    <span>       Vocabulary Development</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Grammar_Development">
                                                                            <input type="checkbox" {{($user->attr('Grammar_Development'))?'checked':''}} id="Grammar_Development" name="Grammar_Development">
                                                                            <label class="key" for="Grammar_Development">

                                                                                <div class="right">
                                                                                    <span>       Grammar Development</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Academic_English">
                                                                            <input type="checkbox" {{($user->attr('Academic_English'))?'checked':''}} id="Academic_English" name="Academic_English">
                                                                            <label class="key" for="Academic_English">

                                                                                <div class="right">
                                                                                    <span>       Academic English</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Accent_Reduction">
                                                                            <input type="checkbox" {{($user->attr('Accent_Reduction'))?'checked':''}} id="Accent_Reduction" name="Accent_Reduction">
                                                                            <label class="key" for="Accent_Reduction">

                                                                                <div class="right">
                                                                                    <span>       Accent Reduction</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Phonetics">
                                                                            <input type="checkbox" {{($user->attr('Phonetics'))?'checked':''}} id="Phonetics" name="Phonetics">
                                                                            <label class="key" for="Phonetics">

                                                                                <div class="right">
                                                                                    <span>       Phonetics</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Colloquial_English">
                                                                            <input type="checkbox" {{($user->attr('Colloquial_English'))?'checked':''}} id="Colloquial_English" name="Colloquial_English">
                                                                            <label class="key" for="Colloquial_English">

                                                                                <div class="right">
                                                                                    <span>       Colloquial English</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                                    <div>
                                                                        <div class="lable-container" style="line-height: 50px">
                                                                            <input type="text" hidden name="Phonetics">
                                                                            <input type="checkbox" {{($user->attr('Phonetics'))?'checked':''}} id="Phonetics" name="Phonetics">
                                                                            <label class="key" for="Phonetics">

                                                                                <div class="right">
                                                                                    <span>       Phonetics</span>
                                                                                </div>
                                                                                <div class="left">
                                                                                    <div class="toggle">
                                                                                        <span></span>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>






                                                    <div class="expert-section">
                                                        <h4>آمادگی برای آزمون</h4>
                                                        <div class="forsm">
                                                            <div class="ra ">
                                                                <br>
                                                                <br>
                                                                <h3>انگلیسی:</h3>

                                                                <div class="row">


                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="TOEFL">
                                                                                <input type="checkbox" {{($user->attr('TOEFL'))?'checked':''}} id="TOEFL" name="TOEFL">
                                                                                <label class="key" for="TOEFL">

                                                                                    <div class="right">
                                                                                        <span>       TOEFL</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="IELTS">
                                                                                <input type="checkbox" {{($user->attr('IELTS'))?'checked':''}} id="IELTS" name="IELTS">
                                                                                <label class="key" for="IELTS">

                                                                                    <div class="right">
                                                                                        <span>       IELTS</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="PTE">
                                                                                <input type="checkbox" {{($user->attr('PTE'))?'checked':''}} id="PTE" name="PTE">
                                                                                <label class="key" for="PTE">

                                                                                    <div class="right">
                                                                                        <span>       PTE</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="GRE">
                                                                                <input type="checkbox" {{($user->attr('GRE'))?'checked':''}} id="GRE" name="GRE">
                                                                                <label class="key" for="GRE">

                                                                                    <div class="right">
                                                                                        <span>       GRE</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="CELPIP">
                                                                                <input type="checkbox" {{($user->attr('CELPIP'))?'checked':''}} id="CELPIP" name="CELPIP">
                                                                                <label class="key" for="CELPIP">

                                                                                    <div class="right">
                                                                                        <span>       CELPIP</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="Duolingo">
                                                                                <input type="checkbox" {{($user->attr('Duolingo'))?'checked':''}} id="Duolingo" name="Duolingo">
                                                                                <label class="key" for="Duolingo">

                                                                                    <div class="right">
                                                                                        <span>       Duolingo</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="TOEIC">
                                                                                <input type="checkbox" {{($user->attr('TOEIC'))?'checked':''}} id="TOEIC" name="TOEIC">
                                                                                <label class="key" for="TOEIC">

                                                                                    <div class="right">
                                                                                        <span>       TOEIC</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="KET">
                                                                                <input type="checkbox" {{($user->attr('KET'))?'checked':''}} id="KET" name="KET">
                                                                                <label class="key" for="KET">

                                                                                    <div class="right">
                                                                                        <span>       KET</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="PET">
                                                                                <input type="checkbox" {{($user->attr('PET'))?'checked':''}} id="PET" name="PET">
                                                                                <label class="key" for="PET">

                                                                                    <div class="right">
                                                                                        <span>       PET</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="CAE">
                                                                                <input type="checkbox" {{($user->attr('CAE'))?'checked':''}} id="CAE" name="CAE">
                                                                                <label class="key" for="CAE">

                                                                                    <div class="right">
                                                                                        <span>       CAE</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="FCE">
                                                                                <input type="checkbox" {{($user->attr('FCE'))?'checked':''}} id="FCE" name="FCE">
                                                                                <label class="key" for="FCE">

                                                                                    <div class="right">
                                                                                        <span>       FCE</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="CPE">
                                                                                <input type="checkbox" {{($user->attr('CPE'))?'checked':''}} id="CPE" name="CPE">
                                                                                <label class="key" for="CPE">

                                                                                    <div class="right">
                                                                                        <span>       CPE</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="BEC">
                                                                                <input type="checkbox" {{($user->attr('BEC'))?'checked':''}} id="BEC" name="BEC">
                                                                                <label class="key" for="BEC">

                                                                                    <div class="right">
                                                                                        <span>       BEC</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="TOEFLPhD">
                                                                                <input type="checkbox" {{($user->attr('TOEFLPhD'))?'checked':''}} id="TOEFLPhD" name="TOEFLPhD">

                                                                                {{--                                                <input type="checkbox" {{r($user->att(''checkedتافل_دکت)?:'ری')}} id="تافل_دکتری" name="تافل_دکتری">--}}
                                                                                <label class="key" for="TOEFLPhD">

                                                                                    <div class="right">
                                                                                        <span>       TOEFL PhD</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <br>
                                                                </div>
                                                                <div class="clr"></div>
                                                                <h3>فرانسه:</h3>

                                                                <div class="row">
                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="TCF">
                                                                                <input type="checkbox" {{($user->attr('TCF'))?'checked':''}} id="TCF" name="TCF">
                                                                                <label class="key" for="TCF">

                                                                                    <div class="right">
                                                                                        <span>       TCF</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="TEF">
                                                                                <input type="checkbox" {{($user->attr('TEF'))?'checked':''}} id="TEF" name="TEF">
                                                                                <label class="key" for="TEF">

                                                                                    <div class="right">
                                                                                        <span>       TEF</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="DELF">
                                                                                <input type="checkbox" {{($user->attr('DELF'))?'checked':''}} id="DELF" name="DELF">
                                                                                <label class="key" for="DELF">

                                                                                    <div class="right">
                                                                                        <span>       DELF</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="DALF">
                                                                                <input type="checkbox" {{($user->attr('DALF'))?'checked':''}} id="DALF" name="DALF">
                                                                                <label class="key" for="DALF">

                                                                                    <div class="right">
                                                                                        <span>       DALF</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <br>
                                                                </div>
                                                                <div class="clr"></div>

                                                                <h3>آلمانی:</h3>

                                                                <div class="row">
                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="Goethe">
                                                                                <input type="checkbox" {{($user->attr('Goethe'))?'checked':''}} id="Goethe" name="Goethe">
                                                                                <label class="key" for="Goethe">

                                                                                    <div class="right">
                                                                                        <span>       Goethe</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="Telc">
                                                                                <input type="checkbox" {{($user->attr('Telc'))?'checked':''}} id="Telc" name="Telc">
                                                                                <label class="key" for="Telc">

                                                                                    <div class="right">
                                                                                        <span>       Telc</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="Test_Daf">
                                                                                <input type="checkbox" {{($user->attr('Test_Daf'))?'checked':''}} id="Test_Daf" name="Test_Daf">
                                                                                <label class="key" for="Test_Daf">

                                                                                    <div class="right">
                                                                                        <span>       Test Daf</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="OSD">
                                                                                <input type="checkbox" {{($user->attr('OSD'))?'checked':''}} id="OSD" name="OSD">
                                                                                <label class="key" for="OSD">

                                                                                    <div class="right">
                                                                                        <span>       OSD</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <br>
                                                                </div>
                                                                <div class="clr"></div>

                                                                <h3>ترکی استانبولی:</h3>

                                                                <div class="row">
                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="TOMER">
                                                                                <input type="checkbox" {{($user->attr('TOMER'))?'checked':''}} id="TOMER" name="TOMER">
                                                                                <label class="key" for="TOMER">

                                                                                    <div class="right">
                                                                                        <span>       TOMER</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="TYS">
                                                                                <input type="checkbox" {{($user->attr('TYS'))?'checked':''}} id="TYS" name="TYS">
                                                                                <label class="key" for="TYS">

                                                                                    <div class="right">
                                                                                        <span>       TYS</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <br>
                                                                </div>
                                                                <div class="clr"></div>

                                                                <h3>اسپانیایی:</h3>

                                                                <div class="row">
                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="DELE">
                                                                                <input type="checkbox" {{($user->attr('DELE'))?'checked':''}} id="DELE" name="DELE">
                                                                                <label class="key" for="DELE">

                                                                                    <div class="right">
                                                                                        <span>       DELE</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                                        <div>
                                                                            <div class="lable-container" style="line-height: 50px">
                                                                                <input type="text" hidden name="SIELE">
                                                                                <input type="checkbox" {{($user->attr('SIELE'))?'checked':''}} id="SIELE" name="SIELE">
                                                                                <label class="key" for="SIELE">

                                                                                    <div class="right">
                                                                                        <span>       SIELE</span>
                                                                                    </div>
                                                                                    <div class="left">
                                                                                        <div class="toggle">
                                                                                            <span></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <br>
                                                                </div>



                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <div class="button">
                                                                    <button class="send">  ذخیره</button>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clr"></div>

                                            </div>
                                            </form>
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

    <div class="popup popupc upload_avatar" id="upload_avatar">
        <div>
            <div>
                <div>
                    <div class="popup-container user-set-pop" >
                        <span class="close">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
							</svg>
						</span>
                            <div class="content claculate" >

                                <div class="btn">
                                    <div id="upload-demo"></div>
                                    <div class="button">
                                        <button data-url="{{route('teacher.save.bg',$user->id)}}" class="send btn-upload-image" style="margin-top:2%">آپلود</button>

                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
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
                            <video id="player" class="js-player" playsinline controls  data-poster="{{asset('/src/port_img/'.$user->attr('port_img'))}}">
                                <source src="{{asset('/src/port_vid/'.$user->attr('port_vid'))}}" type="video/mp4" />

                            </video>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        (function ($) {
            $(document).ready(function () {

                var data = [
                        @foreach(\App\Models\Language::whereActive('1')->get() as $la)

                    {
                        id: {{$loop->index}},
                        text: '<div class="country-op"><span class="flag"><img src="{{asset('src/img/lang').'/'.$la->img}}" alt=""></span><span>انتخاب زبان :  {{$la->name}}</span></div>',
                        html: '<div class="country-op"><span class="flag"><img src="{{asset('src/img/lang').'/'.$la->img}}" alt=""></span><span>انتخاب زبان :  {{$la->name}}</span></div>',
                        title: '<div class="country-op"><span class="flag"><img src="{{asset('src/img/lang').'/'.$la->img}}" alt=""></span><span>انتخاب زبان :  {{$la->name}}</span></div>'
                    },
                    @endforeach
                ];





                $("select.country").select2({
                    dir: "rtl",
                    minimumResultsForSearch: -1,
                    data: data,
                    escapeMarkup: function(markup) {
                        return markup;
                    },
                    templateResult: function(data) {
                        return data.html;
                    },
                    templateSelection: function(data) {
                        return data.text;
                    }
                })

            })
        })(jQuery);
    </script>




    @endcomponent
