@component('home.teacher.content',['title'=>' تنظیمات  '])


    <div class="class-price-select">
        <h3>
           قیمت گذاری کلاس
           (تومان)
        </h3>

        <div class="row">
            @if($errors->any())
                <div class="e_section" id="e_section">
                    @if($errors->any())
                        {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                    @endif
                </div>
            @endif
            <div class="col-lg-6 col-md-12">
                <div>
                    <div class="img">
                        <img src="/home/images/class-price-select.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div>
                    <div class="form">
                        <form action="{{route('teacher.save.price',$teacher->id)}}" method="post">
                            @csrf
                            @method('post')
                            @php($setting=new \App\Models\Setting())
                            <span id="min" data-min="{{$setting->set('min_price')}}"></span>
                            @php($diff=$setting->set('max_price')-$setting->set('min_price'))
{{--                            @dd($setting->set('max_price'))--}}
                            <div class="select-container">
                                <label for="s1">قیمت یک جلسه</label>
                                <select class="select2" name="meet1" id="s1" class="selectBox">
                                    <option value="">لطفا یک مورد را انتخاب کنید </option>
                                    @for($i=0 ;$i<$diff/5000; $i++)
                                        <option {{old('meet1',$teacher->meet1)==($i*5000 +$setting->set('min_price'))?'selected':''}} value="{{($i*5000) +$setting->set('min_price')}}">

                                            {{number_format(($i*5000) +$setting->set('min_price'))}}

                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="select-container">
                                <label for="s2">قیمت هر جلسه از دوره 5 جلسه ای</label>
                                <select class="select2" name="meet5" id="s2">
                                    @if(old('meet5',$teacher->meet5))
                                        <option value="{{old('meet5',$teacher->meet5)}}">   {{number_format(old('meet5',$teacher->meet5))}} </option>
                                        @for($i=1 ;$i<($teacher->meet5-$setting->set('min_price'))/5000; $i++)
                                            <option    value="{{$teacher->meet5-$i*5000}}">

                                                        {{number_format($teacher->meet5-$i*5000)}}
                                            </option>
                                        @endfor
                                    @else
                                        <option value="">لطفا یک مورد را انتخاب کنید </option>
                                    @endif
                                </select>
                            </div>

                            <div class="select-container">
                                <label for="s3">قیمت هر جلسه از دوره 10جلسه ای</label>
                                <select class="select2" name="meet10" id="s3">
                                    @if(old('meet10',$teacher->meet10)))
                                    <option value="{{old('meet10',$teacher->meet10)}}">   {{number_format(old('meet10',$teacher->meet10))}} </option>
                                    @for($i=1 ;$i<($teacher->meet10-$setting->set('min_price'))/5000; $i++)
                                        <option   value="{{$teacher->meet10-$i*5000}}">
                                                {{number_format($teacher->meet10-$i*5000)}}
                                        </option>
                                    @endfor
                                    @else
                                        <option value="">لطفا یک مورد را انتخاب کنید </option>
                                    @endif
                                </select>
                            </div>

                            <div class="button">
                                <button class="send">
                                    ذخیره تغییرات
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                var data = [

                    @for($i=0 ;$i<$diff/5000; $i++)
                    {
                        id: {{$i}},
                        text: '<div class="price"><span class="num">50000</span><span class="tom">تومان</span></div>',
                        html: '<div class="price"><span class="num">50000</span><span class="tom">تومان</span></div>',
                        title: '<div class="price"><span class="num">50000</span><span class="tom">تومان</span></div>'
                    }  ,
                    <option {{old('meet1',$teacher->meet1)==($i*5000 +$setting->set('min_price'))?'selected':''}} value="{{$i*5000 +$setting->set('min_price')}}">{{$i*5000 +$setting->set('min_price')}} تومان</option>
                        @endfor

                ];

                $("select").select2({
                    placeholder:"مبلغ را انتخاب کنید",
                    dir: "rtl",
                    minimumResultsForSearch: -1,

                })
            })
        })(jQuery);
    </script>

    <div class="pricing-tutrial">
        <h3>قیمت گذاری کلاس آزمایشی</h3>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div>
                    <div class="img">
                        <img src="/home/images/pricing-tutrial.png" alt="">
                        <p>
                            جلسه آزمایشی ، یک جلسه 30 دقیقه ای برای آشنایی دانشجو با شماست
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div>

                    <form action="{{route('teacher.save.more.price',$teacher->id)}}" method="post">
                        @csrf
                        @method('post')
                        <div class="radio-group">

                            <ul>
                                <li>
                                    <div class="label-container">
                                        <input type="radio" name="freeclass"   {{(old('freeclass') == 'free'  || $teacher->attr('freeclass')=='free') ? 'checked' : ''}} id="free" value="free">

                                        <label for="free">رایگان</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-container">
                                        <input type="radio" name="freeclass"   {{(old('freeclass') == 'nofree'  || $teacher->attr('freeclass')=='nofree') ? 'checked' : ''}} id="nofree" value="nofree">

                                        <label for="nofree">با هزینه</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-container">
                                        <input type="radio" name="freeclass"   {{(old('freeclass') == 'noclass'  || $teacher->attr('freeclass')=='noclass') ? 'checked' : ''}} id="noclass" value="noclass">
                                        <label for="noclass">عدم ارائه</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <p>قیمت هر جلسه آزمایشی</p>
                        <div class="input clas_sec"  {{(old('freeclass') == 'nofree' || $teacher->attr('freeclass')=='nofree') ? '' : 'hidden'}} >
                            <span class="icon"></span>
                            <input type="number" class="money" value="{{old('free_meeting_price',$teacher->attr('free_meeting_price'))}}"  name="free_meeting_price" placeholder="‏650,000 تومان">
                            <div class="tx">{{old('free_meeting_price',$teacher->attr('free_meeting_price'))}} تومان</div>
                        </div>
                        <div class="button">
                            <button class="send">ذخیره تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="faqs">
        <h3>چه قیمتی را برای کلاس هایم تعیین کنم؟</h3>


        <div class="faqs">


            <div class="faq">
                <div class="question tran">
                    <h4>
                        حداقل و حداکثر قیمت هر جلسه چقدر است؟

                    </h4>
                </div>
                <div class="answer">
                    <p>
                        شما می توانید برای هر جلسه حداقل 20 هزار تومان و حداکثر 500 هزار تومان تعیین کنید.

                    </p>
                </div>

            </div>

            <div class="faq">
                <div class="question tran">
                    <h4>
                        کمیسیون سایت چقدر است؟

                    </h4>
                </div>
                <div class="answer">
                    <p>

                        امکانات سایت برای اساتید رایگان است.
                    </p>
                </div>

            </div>

            <div class="faq">
                <div class="question tran">
                    <h4>
                        برای کلاس آزمایشی چقدر هزینه تعیین کنم؟
                    </h4>
                </div>
                <div class="answer">
                    <p>

                        کلاس های آزمایشی 30 دقیقه ای می باشد که برای آشنایی استاد و زبان آموز درنظر گرفته شده است پس پیشنهاد می کنیم کلاس های آزمایشی را به صورت رایگان برگزار کنید تا زبان آموزان بیشتری جذب کنید.
                    </p>
                </div>

            </div>


            <div class="faq">
                <div class="question tran">
                    <h4>
                        آیا لغو کلاس ها شامل جریمه می شود؟

                    </h4>
                </div>
                <div class="answer">
                    <p>

                        در صورت نزدیک بودن زمان کلاس در صورت لغو کلاس 20 درصد از مبلغ کلاس از کیف پول شما کسر خواهد شد.
                    </p>
                </div>

            </div>

            <div class="faq">
                <div class="question tran">
                    <h4>
                        چه زمانی امکان برداشت درآمدها وجود دارد؟
                    </h4>
                </div>
                <div class="answer">
                    <p>
                        در پایان هر ماه به با تمامی اساتیدی که به حداقل درآمد قابل برداشت رسیده باشند تسویه حساب می شود.

                    </p>
                </div>

            </div>


        </div>
    </div>




    @endcomponent
