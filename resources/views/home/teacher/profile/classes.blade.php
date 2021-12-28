@component('home.teacher.content',['title'=>' تنظیمات  '])


    <div class="add-new-class-page">
        <div class="guide">
            <h4>راهنمای ایجاد کلاس</h4>
            <div class="guide-box">
                <ul class="circle">
                    <li>هر کلاس تا ۳۰ نفر ظرفیت دارد</li>
                    <li>زمان جلسات بعدا هم قابل تغییر می باشد</li>
                </ul>
            </div>

            <div class="form">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div>
                            <div class="img">
                                <img src="/home/images/add-class.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div>
                            @if($errors->any())
                                <div class="e_section" id="e_section">
                                    {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                                </div>
                            @endif
                                <form id="free" action="{{route('teacher.free.class',$user->id)}}" method="post">
                                    @csrf
                                    @method('post')
                                <div class="input-container">
                                    <input id="name" type="text" name="name"  >
                                    <span><b>عنوان کلاس </b> <span class="small"> (نامی مناسب برای کلاس انتخاب کنید)</span></span>
                                </div>
                                <div id="class_parent">
                                    <div class="text posrel v2" id="boxy_0">
                                    <label for="">جلسه ۱</label>
                                    <div class="input-container fill">
                                        <div class="text v2">
                                            <span>زمان شروع کلاس :</span>
                                            <ul>
                                                <li class="day">
                                                    <input type="text"  autocomplete="off" name="ser[0][day]" class="perisan em pdp-el" placeholder="انتخاب روز">

                                                </li>
                                                <li class="day">
                                                    <select class="em" name="ser[0][du]" id="">
                                                        <option value="">  مدت زمان </option>
                                                        <option value="30">30</option>
                                                        <option value="60">60</option>
                                                        <option value="90">90</option>
                                                        <option value="120">120</option>
                                                        <option value="180">180</option>

                                                    </select>
                                                </li>
                                                <li class="titl">
                                                    ساعت :
                                                </li>
                                                <li class="hour active">
                                                    <select class="em" name="ser[0][h]" id="">
                                                        <option value="">    ساعت </option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                    </select>
                                                </li>
                                                <li class="eq">:</li>
                                                <li class="min">
                                                    <select class="em" name="ser[0][min]" id="">
                                                        <option value="">دقیقه</option>
                                                        <option value="30">30</option>
                                                        <option value="00">00</option>
                                                    </select>
                                                </li>
                                            </ul>



                                        </div>
                                    </div>
                                    </div>
                                </div>





                                <div class="clr"></div>
                                <div class="clr"></div>
                                <div class="clr"></div>
                                <div class="button-container button reight">
                                    <span class="cancel pointer" id="new_class_row" >    اضافه</span>
                                    <button class="send">ایجاد کلاس</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let  create_new_class=(id)=>{
            return `
         <div class="text posrel v2" id="boxy_${id}">

                                    <label for="">
 <img  class="posab " onclick="document.getElementById('boxy_${id}').remove()" src="/home/css/images/close.png" alt="">
جلسه
                                    ${id+1}


                                    </label>
                                    <div class="input-container fill">
                                        <div class="text v2">
                                            <span>زمان شروع کلاس :</span>
                                            <ul>
                                                <li class="day">
                                                    <input type="text"  autocomplete="off"  name="ser[${id}][day]" class="perisan em pdp-el" placeholder="انتخاب روز">

                                                </li>
                                                <li class="day">
                                                    <select class="em" name="ser[${id}][du]" id="">
                                                        <option value="">  مدت زمان </option>
                                                        <option value="30">30</option>
                                                        <option value="60">60</option>
                                                        <option value="90">90</option>
                                                        <option value="120">120</option>
                                                        <option value="180">180</option>

                                                    </select>
                                                </li>
                                                <li class="titl">
                                                    ساعت :
                                                </li>
                                                <li class="hour active">
                                                    <select class="em" name="ser[${id}][h]" id="">
                                                        <option value="">    ساعت </option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                    </select>
                                                </li>
                                                <li class="eq">:</li>
                                                <li class="min">
                                                    <select class="em" name="ser[${id}][min]" id="">
                                                        <option value="">دقیقه</option>
                                                        <option value="30">30</option>
                                                        <option value="00">00</option>
                                                    </select>
                                                </li>
                                            </ul>



                                        </div>
                                    </div>
                                    </div>

`
        }
        (function ($) {
            $(document).ready(function () {

                $('body').on('click','#new_class_row',function (e) {
                    var class_parent=$('#class_parent')
                    var id= class_parent.children().length
                    var go= true
                    $( ".em" ).each(function( index ) {
                        if ( $( this ).val() ==''){
                            noty('لطفا  همه موارد را پر کنید ')
                            go=false
                            return false

                        }
                    });
                    if (go){
                        class_parent.append(
                            create_new_class(id)
                        )
                        console.log('ss')
                        var p = new persianDate();
                        $(".perisan").persianDatepicker({
                            startDate: "today",
                            endDate:"1495/5/5",
                            inline: true,
                        });
                    }

                })
            })
        })(jQuery);
    </script>



    <div class="teacher-class-row shade" style="display: none">

        <div class="widget-title">
            <h3>لیست کلاس های ایجاد شده شما</h3>

            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">
            @php($fclasses =auth()->user()->fclasses()->latest()->paginate(10))
            @if($fclasses)

            <div class="class-rows">
                @foreach($fclasses as $fclass)
                <div class="class-row">
                    <ul>
                        <li class="name"><span>{{$fclass->name}}    </span></li>
{{--                        <li class="coacity"><span>ظرفیت کلاس</span> <span class="num">20</span></li>--}}
                        <li class="reg"><span>  نام شده</span> <span class="num">9</span></li>
                        <li data-link="{{route('go.free.class',$fclass->id)}}" class="copy-link"><span>کپی لینک<i class="icon-copy"></i></span></li>
{{--                        <li class="share-link"><span>اشتراک گزاری<i class="icon-share"></i></span></li>--}}
                        <li class="del-link"><span>حذف<i class="icon-trash"></i></span></li>
{{--                        <li class="edit-link"><span>ویرایش<i class="icon-edit"></i></span></li>--}}
                    </ul>
                </div>
                @endforeach

            </div>
            @endif
            {{$fclasses->appends(request()->all())->links('home.section.pagination')}}
            <div class="class-row-text">
                <h3># مسئولیت اجتماعی تیچر پرو</h3>
                <p>
                    باتوجه به مشکلات رفت و آمدی اخیر به منظور جلوگیری از شیوع کرونا و همچنین تماس های بیشماری که از جانب شما اساتید زبان عزیز و زبان آموزاتون با ما گرفته شد، اُتیچر تصمیم گرفته تا پروفایل مدیریتی کلاس ها، پشتیبانی از 8 تا 24 و زیرساخت برگزاری کلاس های خصوصی و گروهی رو به صورت صددرصد رایگان در اختیار شما و زبان آموزاتون قرار بده.
                </p>
                <div class="gray-box">
                    <span> لذا اگر قبلآ شهریه کلاسها رو از زبان آموزاتون دریافت کردید، اما به دلیل کرونا درحال حاضر امکان برگزاری حضوری نیست، میتونین به.رایگان از زیرساخت اُتیچر استفاده کنین</span>
                </div>
                <h4> برخی از امکانات رایگان  :</h4>
                <ul>
                    <li><span>پشتیبانی فنی 24 ساعته به شما و زبان آموزانتان</span></li>
                    <li><span>تا ۳۰ نفر زبان آموز در هر کلاس</span></li>
                    <li><span>قابلیت تغییر زمان و یا لغو کلاس</span></li>
                    <li><span>تماس صوتی و تصویری</span></li>
                </ul>
            </div>
        </div>

    </div>



    <div class="popup popupc"  style="display: {{old('flass')?'block':'none'}}">
        <div>
            <div>
                <div>
                    <div class="popup-container class-succses-pop">
						<span class="close">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"></path>
							</svg>
						</span>
                        <div class="pop-title right">
                            <h3>کلاس شما با موفقیت ایجاد شد</h3>
                        </div>

                        <form action="">
                            <div class="pic">
                                <img src="images/class-succses-pop.png" alt="">
                                <p>
                                    حالا کافیه لینک عضویت کلاس رو به زبان آموزات بدی تا اونا بتونن تو کلاست به طور رایگان شرکت کنن!
                                </p>
                            </div>
                            <div class="toshare-link">
								<span>
                                    @if(old('flass'))
                                    {{route('go.free.class',old('flass'))}}
                                    @endif
								</span>
                            </div>

                            <div class="nav-share">
                                <ul>
                                    @if(old('flass'))
                                    <li data-link="{{route('go.free.class',old('flass'))}} " class="copy-link pointer">
                                        @endif
                                    <span >
											<span class="icon">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M21.6602 10.44L20.6802 14.62C19.8402 18.23 18.1802 19.69 15.0602 19.39C14.5602 19.35 14.0202 19.26 13.4402 19.12L11.7602 18.72C7.59018 17.73 6.30018 15.67 7.28018 11.49L8.26018 7.30001C8.46018 6.45001 8.70018 5.71001 9.00018 5.10001C10.1702 2.68001 12.1602 2.03001 15.5002 2.82001L17.1702 3.21001C21.3602 4.19001 22.6402 6.26001 21.6602 10.44Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M15.0603 19.39C14.4403 19.81 13.6603 20.16 12.7103 20.47L11.1303 20.99C7.16034 22.27 5.07034 21.2 3.78034 17.23L2.50034 13.28C1.22034 9.30998 2.28034 7.20998 6.25034 5.92998L7.83034 5.40998C8.24034 5.27998 8.63034 5.16998 9.00034 5.09998C8.70034 5.70998 8.46034 6.44998 8.26034 7.29998L7.28034 11.49C6.30034 15.67 7.59034 17.73 11.7603 18.72L13.4403 19.12C14.0203 19.26 14.5603 19.35 15.0603 19.39Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12.6406 8.53003L17.4906 9.76003" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M11.6602 12.4L14.5602 13.14" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</span>

                                            <span class="text">کپی لینک</span>
                                        </span>
                                    </li>
{{--                                    <li>--}}
{{--                                        <button class="share-link">--}}
{{--											<span class="icon">--}}
{{--												<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--													<path d="M14.1328 5.14166C15.7995 6.3 16.9495 8.14166 17.1828 10.2667" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--													<path d="M2.9082 10.3083C3.12487 8.19168 4.2582 6.35002 5.9082 5.18335" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--													<path d="M6.82422 17.45C7.79089 17.9417 8.89089 18.2167 10.0492 18.2167C11.1659 18.2167 12.2159 17.9667 13.1576 17.5083" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--													<path d="M10.051 6.41666C11.3305 6.41666 12.3677 5.37945 12.3677 4.09999C12.3677 2.82053 11.3305 1.78333 10.051 1.78333C8.77158 1.78333 7.73438 2.82053 7.73438 4.09999C7.73438 5.37945 8.77158 6.41666 10.051 6.41666Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--													<path d="M4.02565 16.6C5.30511 16.6 6.34232 15.5628 6.34232 14.2833C6.34232 13.0039 5.30511 11.9667 4.02565 11.9667C2.74619 11.9667 1.70898 13.0039 1.70898 14.2833C1.70898 15.5628 2.74619 16.6 4.02565 16.6Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--													<path d="M15.9749 16.6C17.2543 16.6 18.2915 15.5628 18.2915 14.2833C18.2915 13.0039 17.2543 11.9667 15.9749 11.9667C14.6954 11.9667 13.6582 13.0039 13.6582 14.2833C13.6582 15.5628 14.6954 16.6 15.9749 16.6Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
{{--												</svg>--}}
{{--											</span>--}}
{{--                                            <span class="text">اشتراک گزاری</span>--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>

                            <div class="button">
                                <button class="back close_popup">
                                    بازگشت
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @endcomponent
