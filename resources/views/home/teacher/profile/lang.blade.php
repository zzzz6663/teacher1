@component('home.teacher.content',['title'=>' تنظیمات  '])


    <div class="popup not-fixed">
        <div>
            <div>
                <div>
                    <div class="popup-container user-set-pop add-lang-pop" >
						<span class="close">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"/>
							</svg>
						</span>
                        @if($errors->any())
                            <div class="e_section" id="e_section">
                                {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                            </div>
                        @endif
                        <div class="pop-title">
                            <h3>افزودن زبان هایی که بلد هستید</h3>
                        </div>
                        <div class="user-set-pop-content" style="background: #fff">
                            <form action="{{route('teacher.save.lang',$user->id)}}" class=" " method="post"  >
                                @csrf
                                @method('post')
                            <div class="pic">
                                <img src="/home/images/add-lang-pop.png" alt="">
                            </div>

                            <div class="select">
                                <select name="language_id" id="" class="lang"></select>
                            </div>
                            <div class="level">
                                <div class="label">انتخاب سطح</div>
                                <ul>
                                    <li class="lev1">
                                        <div class="lable-container">
                                            <input type="text" readonly name="level" hidden>
                                            <input type="radio"  name="level"  {{(old('level')=='lev1')?'selected':''}}  id="lev1" value="starter" checked="">
                                            <label for="lev1">
                                                <div>
                                                    <div class="cir"></div>
                                                    <span class="t">‏A1</span>
                                                    <span>‏Starter</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="lev2">
                                        <div class="lable-container">
                                            <input type="radio" name="level"  {{(old('level')=='lev2')?'checked':''}}  id="lev2" value="elementary">
                                            <label for="lev2">
                                                <div>
                                                    <div class="cir"></div>
                                                    <span class="t">‏A2</span>
                                                    <span>elementary</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="lev3">
                                        <div class="lable-container">
                                            <input type="radio" name="level"  {{(old('level')=='lev3')?'checked':''}}  id="lev3" value="intermediate">
                                            <label for="lev3">
                                                <div>
                                                    <div class="cir"></div>
                                                    <span class="t">‏B1</span>
                                                    <span>‏Intermediate</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="lev4">
                                        <div class="lable-container">
                                            <input type="radio" name="level"  {{(old('level')=='lev4')?'checked':''}}  id="lev4" value="uintermediate">
                                            <label for="lev4">
                                                <div>
                                                    <div class="cir"></div>
                                                    <span class="t">‏B2</span>
                                                    <span>‏Upper Intermediate</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="lev5">
                                        <div class="lable-container">
                                            <input type="radio" name="level"  {{(old('level')=='lev5')?'checked':''}}  id="lev5" value="advanced">
                                            <label for="lev5">
                                                <div>
                                                    <div class="cir"></div>
                                                    <span class="t">‏C1</span>
                                                    <span>‏Advanced</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="lev6">
                                        <div class="lable-container">
                                            <input type="radio" name="level"  {{(old('level')=='lev6')?'checked':''}}  id="lev6" value="mastery">
                                            <label for="lev6">
                                                <div>
                                                    <div class="cir"></div>
                                                    <span class="t">‏C2</span>
                                                    <span>‏Mastery</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <ul class="lang-op">
                                <li>
                                    <div class="option-toggle">
                                        <span class="title">زبان مادری (Native)</span>
                                        <div class="check-toggle">
                                            <input type="radio" checked {{(old('status')=='vernacular')?'checked':''}}  name="status" id="vernacular" value="vernacular">
                                            <label for="vernacular"><span></span></label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="option-toggle">
                                        <span class="title">زبان دوم</span>
                                        <div class="check-toggle">
                                            <input type="radio" {{(old('status')=='learning')?'checked':''}}  name="status" id="learning" value="learning">
                                            <label for="learning"><span></span></label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                             @if($languages->count()<2)
                            <div class="button">
                                <button class="send">
                                    افزودن زبان
                                </button>
                            </div>
                                @else
                                <p style="text-align: center; color: red; font-size: 18px">
                                    شما فقط حداکثر میتوانید دو زبان انتخاب کنید
                                </p>
                                @endif

                            </form>
{{--                            <form action="">--}}
                                <div class="form mwidth290">
                                    <div class="add-lang-box">
                                        <h4>زبان هایی که بلد هستید</h4>

                                        <ul>
                                            @foreach($languages as $lang)


                                                <li>
                                                    <div class="right">
													<span class="flag">
														<img  src="{{asset('src/img/lang/'.$lang->img)}}" alt="">
													</span>
                                                        <div class="lang">
                                                            <span class="top">{{$lang->name}} </span>
                                                            <span class="bot">{{__('arr.'.$lang->pivot->level)}}  </span>
                                                        </div>
                                                    </div>
                                                    <div class="left">
                                                        <form class="nonee" action="{{route('teacher.delete.lang',$lang->id)}}"  method="post"  >
                                                            @csrf
                                                            @method('post')
                                                                <button class="remove">
                                                                    <span class="icon">
                                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8 16C6.41775 16 4.87103 15.5308 3.55544 14.6518C2.23985 13.7727 1.21447 12.5233 0.608967 11.0615C0.00346633 9.59966 -0.15496 7.99113 0.153721 6.43928C0.462403 4.88743 1.22433 3.46197 2.34315 2.34315C3.46197 1.22433 4.88743 0.462403 6.43928 0.153721C7.99113 -0.15496 9.59966 0.00346622 11.0615 0.608967C12.5233 1.21447 13.7727 2.23985 14.6518 3.55544C15.5308 4.87103 16 6.41775 16 8C16.0001 9.05061 15.7933 10.091 15.3913 11.0616C14.9893 12.0323 14.4 12.9142 13.6571 13.6571C12.9142 14.4 12.0323 14.9893 11.0616 15.3913C10.091 15.7933 9.05061 16.0001 8 16ZM8 6.86928L5.73763 4.60598L4.60506 5.73855L6.86835 8.00093L4.60506 10.2633L5.7367 11.3949L7.99908 9.13165L10.2615 11.3949L11.3931 10.2633L9.1298 8.00093L11.3931 5.73855L10.2624 4.60598L8 6.86928Z" fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="text">حذف</span>
                                                                </button>
                                                        </form>

                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
{{--                            </form>--}}
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
                    @foreach($langs as $la)

                    {
                        id: {{$la->id}},
                        text: '<div class="country-op"><span class="flag"><img src="{{asset('src/img/lang').'/'.$la->img}}" alt=""></span><span>انتخاب زبان :  {{$la->name}}</span></div>',
                        html: '<div class="country-op"><span class="flag"><img src="{{asset('src/img/lang').'/'.$la->img}}" alt=""></span><span>انتخاب زبان :  {{$la->name}}</span></div>',
                        title: '<div class="country-op"><span class="flag"><img src="{{asset('src/img/lang').'/'.$la->img}}" alt=""></span><span>انتخاب زبان :  {{$la->name}}</span></div>'
                    },
                    @endforeach
                ];




                $("select.cat").select2({
                    placeholder:"انتخاب دسته بندی",
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

                $("select.lang").select2({
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












    <div id="teacherpish">

    @slot('bread')


        @include('home.teacher.profile.bread_left',['name'=>'اضافه کردن زبان'])

    @endslot




</div>



    @endcomponent
