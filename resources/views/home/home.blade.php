@extends('master.home')
@section('main_body')
    <!-- Start Top Slid -->
    <div id="home">


    <div id="top-slid" class="rows">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div>
                        <div class="top-slid">
                            <h2>
                                با تیچر وان، به هر زبانی مسلط شوید
                                 </h2>
                            <ul>
                                <li>
										<span class="icon red">
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5.9987 14.6666H9.9987C13.332 14.6666 14.6654 13.3333 14.6654 9.99992V5.99992C14.6654 2.66659 13.332 1.33325 9.9987 1.33325H5.9987C2.66536 1.33325 1.33203 2.66659 1.33203 5.99992V9.99992C1.33203 13.3333 2.66536 14.6666 5.9987 14.6666Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path opacity="0.34" d="M10.6656 8.00008H10.6716" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												<path opacity="0.34" d="M7.99764 8.00008H8.00363" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												<path opacity="0.34" d="M5.32967 8.00008H5.33566" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
                                    <span class="text">تدریس بیش از 12 زبان زنده دنیا
</span>
                                </li>
                                <li>
										<span class="icon blue">
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M7.9987 14.6666C11.6654 14.6666 14.6654 11.6666 14.6654 7.99992C14.6654 4.33325 11.6654 1.33325 7.9987 1.33325C4.33203 1.33325 1.33203 4.33325 1.33203 7.99992C1.33203 11.6666 4.33203 14.6666 7.9987 14.6666Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path opacity="0.34" d="M5.16797 7.99995L7.05464 9.88661L10.8346 6.11328" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>

										</span>
                                    <span class="text">استاد ایده آل خود را انتخاب کنید.
 </span>
                                </li>
                                <li>
										<span class="icon green">
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M14.6654 7.99992C14.6654 11.6799 11.6787 14.6666 7.9987 14.6666C4.3187 14.6666 1.33203 11.6799 1.33203 7.99992C1.33203 4.31992 4.3187 1.33325 7.9987 1.33325C11.6787 1.33325 14.6654 4.31992 14.6654 7.99992Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path opacity="0.4" d="M10.4739 10.1199L8.40724 8.88659C8.04724 8.67326 7.75391 8.15992 7.75391 7.73992V5.00659" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
                                    <span class="text"> یادگیری موثر و مقرون به صرفه
</span>
                                </li>
                            </ul>
                            <div class="button">
                                <a style="" href="{{route('home.student.register.form')}}" class="send"> ثبت نام     استاد  </a>
                                <a href="{{route('home.teacher.list')}}" class=" send" style="background: #5e57ba">شروع یادگیری</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div>
                        <div class="img">
                            <img src="/home/images/slid.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Slid -->

    <!-- Start Choose Lang -->
    <div id="choose-lang" class="rows">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div class="pre-title">
                            <h3>قصد دارید چه زبانی یاد بگیرید؟</h3>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">

                @foreach(\App\Models\Language::whereActive(1)->orderBy('sort')->take(5)->get() as $language)

                    <div class="col-lg-4 col-md-4   ">
                        <div>

                            <div class="home-lang">
                                <a href="{{route('home.teacher.list',['lang'=>$language->id])}}">
									<span class="flag">
										<img src="{{asset('src/img/lang/'.$language->img)}}" alt="">
									</span>
                                    <span class="text">{{$language->name}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div id="more_lang_sec" hidden>
                        @foreach(\App\Models\Language::whereActive(1)->where('sort','>',5)->orderBy('sort')->get() as $language)

                            <div class="col-lg-4 col-md-4   ">
                                <div>

                                    <div class="home-lang">
                                        <a href="{{route('home.teacher.list',['lang'=>$language->id])}}">
									<span class="flag">
										<img src="{{asset('src/img/lang/'.$language->img)}}" alt="">
									</span>
                                            <span class="text">{{$language->name}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4 col-md-4   ">
                        <div>

                            <div class="home-lang">
                                <a  style="cursor: pointer" id="more_lang">
									<span class="flag">
										<img src="/home/images/more.png" alt="">
									</span>
                                    <span class="text">بیشتر</span>
                                </a>
                            </div>
                        </div>
                    </div>


            </div>


        </div>
    </div>
    <!-- End Choose Lang -->

    <!-- Start Home Confirmed -->
    <div id="home-confirmed" class="rows">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div class="pre-title">
                            <h3>استادهای تأیید شده  </h3>
                            <p>با بیش از ۱۲ زبان زنده دنیا و همراهی بیش از ۸۰۰ استاد زبان ارزیابی و تأییدشده</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <ul class="confirmed-list owl-carousel owl-theme">

                            @foreach(\App\Models\User::where('level','teacher')->whereActive('1')->whereSubmit('1')->whereHas('attributes',function ($query){
                                                    $query->where('name','experienced')
                                                    ->where('value','experienced');
                                                    })->get() as $te)
                                @php( $languages=$te->languages()->withPivot('level','status')->pluck('name')->toArray())

                                <li>
                                <div class="single-fav-teacher">
                                    <div class="profile">
                                        <div class="avatar">
                                            <div class="img" style="background: url('{{asset('/src/avatar/'.$te->attr('avatar'))}}');"></div>
                                        </div>
                                        <h4 class="name"> {{$te->name}}</h4>
{{--                                        <span class="expert">زبان عمومی و تقویت مکالمه</span>--}}
                                        <div class="lang">
                                            <span>مدرس زبان
                                            {{implode(' , ',$languages)}}
                                            </span>
                                            <span class="flag">
                                    <img src="{{asset('/src/img/lang/'.$te->languages()->first()->img)}}" alt="">
												</span>
                                        </div>
                                    </div>
                                    <div class="button">
                                        <a href="{{route('home.teacher.profile',$te->id)}}" class="see-profile">
                                            <span>مشاهده پروفایل</span>
                                            <span class="icon">
													<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M13.5471 5.69696H3.89307L7.66307 1.95697C7.87503 1.73943 7.99365 1.44771 7.99365 1.14398C7.99365 0.84025 7.87503 0.548478 7.66307 0.330933C7.44839 0.118902 7.15881 0 6.85707 0C6.55534 0 6.26575 0.118902 6.05107 0.330933L0.319069 6.03094C0.114039 6.24904 -0.000106812 6.53709 -0.000106812 6.83643C-0.000106812 7.13576 0.114039 7.42387 0.319069 7.64197L6.05107 13.342C6.26575 13.554 6.55534 13.6729 6.85707 13.6729C7.15881 13.6729 7.44839 13.554 7.66307 13.342C7.8702 13.1263 7.98932 12.8409 7.99707 12.5419C7.99413 12.2402 7.87442 11.9513 7.66307 11.736L3.89307 7.98096H13.5471C13.8437 7.97217 14.1252 7.84818 14.332 7.63525C14.5387 7.42233 14.6543 7.13722 14.6543 6.84045C14.6543 6.54369 14.5387 6.25858 14.332 6.04565C14.1252 5.83273 13.8437 5.70874 13.5471 5.69995V5.69696Z" fill="white"></path>
													</svg>
												</span>
                                        </a>
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
    <!-- End Home Confirmed -->


    <!-- Start Home Process -->
    <div id="home-process" class="rows">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div class="pre-title">
                            <span>با تیچروان زبان جدید بیاموز.</span>
                            <h3>تیچر وان چگونه کار می کند؟</h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div>
                        <div class="img">
                            <img src="/home/images/home-process1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div>
                        <div class="home-process blue">
                            <span class="num">۰۱</span>
                            <h4> استاد ایده آل خود را پیدا کنید.
                            </h4>
                             <p>
                                 بر اساس نیاز خود مناسب ترین استاد را انتخاب کنید

                             </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row rev">
                <div class="col-lg-7 col-md-12">
                    <div>
                        <div class="img">
                            <img src="/home/images/home-process2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div>
                        <div class="home-process rev red">
                            <span class="num rev">۰۲</span>
                            <h4>در یک کلاس آزمایشی رایگان
                                شرکت کنید.
                            </h4>
                            <p>
                                برای ارزیابی استاد یک کلاس آزمایشی رزرو کنید

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div>
                        <div class="img">
                            <img src="/home/images/home-process3.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div>
                        <div class="home-process green">
                            <span class="num">۰۳</span>
                            <h4>از آموزش آنلاین لذت ببرید.
                            </h4>
                            <p>
                                در هر شرایط، هر زمان و هر مکانی که هستید وارد کلاس شوید.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Home Process -->



    <!-- Start Home Comment List -->
    <div id="home-comment" class="rows">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div class="pre-title">
                            <span>نظرات</span>
                            <h3>زبان آموزان درباره تیچروان چه می گویند
                                 </h3>
                            <p>
                                نظرات و تجربه زبان آموزان از اساتید و یادگیری زبان
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div>
                        <div class="img">
                            <img src="/home/images/home-comment.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div>
                        <div class="comment-box">
                            <ul class="home-comment-list owl-carousel owl-theme">
                                @foreach( $com=\App\Models\Com::latest()->get() as $co)
                                <li>
                                    <div class="home-single-comment">

                                        <div class="top">
                                            <div class="pic">
													<span class="icon">
														<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M6.51599 1.99707H9.09799C10.4676 1.99707 11.7811 2.54113 12.7495 3.50957C13.7179 4.47801 14.262 5.79149 14.262 7.16107C14.262 8.53065 13.7179 9.84413 12.7495 10.8126C11.7811 11.781 10.4676 12.3251 9.09799 12.3251V14.5841C5.86999 13.2971 1.35199 11.3571 1.35199 7.16107C1.35199 5.79149 1.89605 4.47801 2.86449 3.50957C3.83293 2.54113 5.14641 1.99707 6.51599 1.99707Z" fill="white"></path>
														</svg>
													</span>
                                                <div class="img" style="background: url('{{asset('src/img/com').'/'.$co->img}}');">

                                                </div>
                                            </div>
                                            <div class="name">
                                                <span>{{$co->name}}  </span>
                                            </div>
                                            <div class="rate">
{{--													<span class="rate">--}}
{{--														<span class="star">--}}
{{--															<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--																<path d="M8.77333 11.3334L5.63877 13.1374C5.25588 13.3578 4.79625 13.0096 4.90465 12.5814L5.7453 9.26008L3.02716 7.06606C2.67471 6.78156 2.85191 6.21251 3.30357 6.17841L6.90204 5.90675L8.3159 2.7032C8.49133 2.30571 9.05533 2.30571 9.23076 2.7032L10.6446 5.90675L14.2436 6.17841C14.6953 6.21251 14.8725 6.78161 14.52 7.06609L11.8014 9.26008L12.642 12.5814C12.7504 13.0096 12.2908 13.3578 11.9079 13.1374L8.77333 11.3334Z" fill="white"></path>--}}
{{--															</svg>--}}
{{--														</span>--}}
{{--														<span class="num">--}}
{{--															4.9--}}
{{--														</span>--}}
{{--													</span>--}}
                                                {{$co->info}}
                                            </div>
                                        </div>

                                        <div class="text">
                                            <p>
                                                {{$co->com}}
                                            </p>
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
    </div>
    <!-- End Home Comment List -->



    <!-- Start Teaching -->
    <div id="home-teaching" class="rows">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div>
                        <div class="be-teacher">
                            <div class="title">
                                <span class="pre-title"> مدرس هستید؟</span>
                                <h3><span>تدریس حرفه‌ای زبان</span> را با استفاده از پلتفرم  تجربه کنید</h3>
                            </div>
                            <div class="text">
                                <p>
                                    در تیچروان از مهارت تدریس زبان خود بیشترین درآمد را داشته باشید و از تدریس در محیط و شرایط دلخواهتان لذت ببرید. برنامه روزانه و هفتگی خود را هرطور که مایلید برنامه ریزی کنید. اکنون به جمع تیچروانی ها بپیوندید و کلاس های خصوصی و گروهی به هر تعداد که می خواهید برگزار کنید.
                                </p>
                            </div>
                            <div class="button">
                                <a style="text-align: center" href="{{route('home.student.register.form')}}" class="send">ثبت نام استاد</a>
                                <a style="text-align: center" href="{{route('home.single.article',35)}}" class="more">  اطلاعات بیشتر  </a>

{{--                                <button class="more">اطلاعات بیشتر</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div>
                        <div class="img">
                            <img src="/home/images/beteacher.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Teaching -->



    <!-- Start Faq -->
    <div id="home-faq" class="rows">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div class="pre-title">
{{--                            <span>پاسخ به</span>--}}
                            <h3>سوالات متداول در مورد آموزش زبان</h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="clr"></div>
            <div class="row">
                <div class="col-lg-10 col-md-12 center-block">
                    <div>
                        <div class="faqs">


                          <div class="col-lg-6 col-sm-12">
                              <div>
                                  <div class="faq">
                                      <div class="question tran">
                                          <h4>

                                              چگونه استاد مناسب و مطمئن پیدا کنیم ؟
                                          </h4>
                                      </div>
                                      <div class="answer">
                                          <p>
                                              با بازید از پروفایل اساتید، مقایسه سوابق آن ها، نظرات و امتیاز دیگر زبان آموزان می توانید ارزیابی
                                              مناسبی از عملکرد و تدریس اساتید داشته باشید. همچنین با شرکت در جلسه ی آزمایشی رایگان پس
                                              بررسی شرایط کلاس ها با اطمینان بیشتری کلاس های آنالین را رزرو کنید.

                                          </p>
                                      </div>

                                  </div>

                                  <div class="faq">
                                      <div class="question tran">
                                          <h4>
                                             چگونه می توانم درآمدم را افزایش دهم
                                              ؟

                                          </h4>
                                      </div>
                                      <div class="answer">
                                          <p>
                                              زبان آموزان شما محدود به شهر خاصی نمی باشند و می توانید زبان آموزانی از ایران یا کشور های
                                              دیگر داشته باشید که از این طریق زبان آموز بیشتر و درآمد بیشتری خواهید داشت

                                          </p>
                                      </div>

                                  </div>

                                  <div class="faq">
                                      <div class="question tran">
                                          <h4>
                                              کلاس های آزمایشی به چه منظور است؟

                                          </h4>
                                      </div>
                                      <div class="answer">
                                          <p>
                                              کلاس های آزمایشی جلسه ای 30 دقیقه ایست برای تعیین سطح زبان آموز، ارائه ی بهترین برنامه
                                              آموزشی متناسب با سطح زبان آموز و همچنین آشنایی بیشتر زبان آموز با استاد و شیوه تدریس می
                                              باشد.

                                          </p>
                                      </div>

                                  </div>

                              </div>
                          </div>

                          <div class="col-lg-6 col-sm-12">
                              <div>
                                  <div class="faq">
                                      <div class="question tran">
                                          <h4>
                                              کلاس ها به چه نحوی برگزار می شود؟

                                          </h4>
                                      </div>
                                      <div class="answer">
                                          <p>
                                              کلاس ها بنابر درخواست زبان آموزان به صورت خصوصی یا گروهی برگزار می شود که اساتید و زبان
                                              آموزان می توانند از لپ تاپ، تلفن همراه و تبلت که قابلیت اتصال به اینترنت را دارد، برای شرکت در
                                              کلاس ها استفاده کنند تا به صورت ویدیویی و زنده  همانند کلاس های حضوری ارتباط داشته
                                              باشند.

                                          </p>
                                      </div>

                                  </div>

                                  <div class="faq">
                                      <div class="question tran">
                                          <h4>
                                              قیمت گذاری هر جلسه به چه صورتی است؟

                                          </h4>
                                      </div>
                                      <div class="answer">
                                          <p>
                                              قیمت گذاری ها توسط اساتید و در صورت نیاز با مشورت تیچروان با توجه به فاکتور های مختلف
                                              مانند سابقه، تخصص، رتبه استاد در سایت تعیین می شود.

                                          </p>
                                      </div>

                                  </div>
                              </div>
                          </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->


    <!-- Start Blog List -->
    <div id="home-blog" class="rows">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="title-more">
                            <h3>آخرين مقالات سايت</h3>
                            <a href="{{route('home.articles')}}" class="more">مشاهده همه</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <ul class="owl-carousel owl-theme home-blog">


                            @foreach($articles as $article)
                                @php($v=verta($article->created_at))
                           <li>


                               <div class="single-blog">
                                   <div class="top">
                                       <div class="info">
                                           <div class="author">
                                               <div class="img" style="background: url('{{asset('/src/avatar/'.$article->user->attr('avatar'))}}');">

                                               </div>
                                               <span class="name">{{$article->user->name}}  </span>
                                           </div>

                                           <span class="date">
													{{$v->format('%B %d، %Y')}}
												</span>
                                       </div>
                                       <div class="img">
                                           <a href="{{route('home.single.article',$article->id)}}" style="background: url('{{asset('/src/article/images/'.$article->image)}}');">

                                           </a>
                                       </div>
                                   </div>

                                   <div class="blog-text">
                                       <h3>
                                           <a href="{{route('home.single.article',$article->id)}}"> {{$article->title}} </a>

                                       </h3>
                                       <p>
                                           {{mb_strimwidth(strip_tags(html_entity_decode(  $article->article)), 0, 70)}} ...

                                       </p>
                                   </div>

                                   <div class="more">
                                       <a href="{{route('home.single.article',$article->id)}}"> مشاهده مطلب  </a>
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
    <!-- End Blog List -->
    </div>
@endsection
