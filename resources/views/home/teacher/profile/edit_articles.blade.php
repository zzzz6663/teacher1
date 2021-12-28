@component('home.teacher.content',['title'=>' تنظیمات  '])


    <div id="article-from" class="shade">

        <div class="widget-title">
            <h3>ویرایش  مقاله
--------
            <span style="color: red">بعد از هر بار ویرایش مقاله شما در صف تایید توسط ادمین قرار خواهد گرفت</span>
            </h3>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="widget-content">
            @if($errors->any())
                <div class="e_section" id="e_section">
                    {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                </div>
            @endif


                <form action="{{route('Article.update',['Article'=>$Article->id])}}" enctype="multipart/form-data" class=" " method="post"  >
                    @csrf
                    @method('PATCH')



                    <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div>

                            <div class="input-container {{old('title',$Article->title )?'active':""}}">
												<span>
													<b>عنوان مقاله</b>
                                                    <span class="small"> (عنوانی مناسب   بنویسید)</span>
												</span>
                                <input type="text" name="title" value="{{old('title',$Article->title )}}" >
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div>
                            <div class="row">


                                <div class="col-lg-5 col-md-12">
                                    <div>
                                        <select name="cat[]" id="" class="select2" multiple>
                                            <option >لطفا یک مورد را انتخاب کنید </option>
                                            @foreach(\App\Models\Acat::whereNull('parent_id')->latest()->get() as $ac)
                                                @if(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get()->first()  )
                                                    <optgroup  label="{{$ac->name}}" >
                                                        <option {{(in_array($ac->id,old('cat',$Article->acats()->pluck('id')->toArray() ))?'selected':'')}}  value="{{$ac->id}}">{{$ac->name}}</option>

                                                        @foreach(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get() as $accc)
                                                            <option {{(in_array($accc->id,old('cat',$Article->acats()->pluck('id')->toArray() ))?'selected':'')}}  value="{{$accc->id}}">{{$accc->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @else
                                                    <optgroup  label="{{$ac->name}}" >
                                                        <option {{(in_array($ac->id,old('cat',$Article->acats()->pluck('id') ->toArray() ))?'selected':'')}} value="{{$ac->id}}">{{$ac->name}}</option>
                                                    </optgroup>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12">
                                    <div>

                                        <div id="fileuploader">
                                            <input type="file" id="featured-pic" name="image" placeholder="انتخاب کن" accept="image/*">
                                            <label for="featured-pic">
																<span class="icon">
																	<svg width="38" height="31" viewBox="0 0 38 31" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M26.0499 23.732C24.4389 23.732 22.8149 23.715 21.2039 23.732C21.0444 23.7282 20.8925 23.6631 20.7796 23.5503C20.6668 23.4375 20.6017 23.2856 20.5979 23.126C20.6149 22.126 20.7979 22.52 21.8089 22.52C24.6769 22.52 27.4209 22.529 30.2889 22.52C33.4409 22.511 35.8089 19.606 35.7399 16.463C35.7271 15.3735 35.368 14.3163 34.7145 13.4444C34.061 12.5725 33.1471 11.9311 32.1049 11.613C31.9568 11.5799 31.8212 11.5053 31.7139 11.398C31.6066 11.2907 31.5321 11.1551 31.4989 11.007C31.3901 10.2469 31.13 9.51628 30.7339 8.85844C30.3378 8.20061 29.8137 7.62891 29.1927 7.17718C28.5718 6.72544 27.8665 6.40285 27.1187 6.22848C26.3709 6.05411 25.5957 6.03152 24.8389 6.16203C23.7799 6.31703 22.6629 6.12203 21.8099 6.76803C21.5519 6.95703 21.3099 7.02603 21.2039 6.76803C20.5574 5.24249 19.4518 3.95616 18.0407 3.08773C16.6297 2.2193 14.9832 1.81186 13.3299 1.92203C11.361 1.97809 9.47886 2.745 8.03145 4.08102C6.58403 5.41704 5.66917 7.23184 5.45593 9.19003C5.35689 9.79165 5.35689 10.4054 5.45593 11.007C5.50793 11.291 5.69693 11.535 5.45593 11.613C4.27295 11.9728 3.23031 12.6899 2.47114 13.6659C1.71198 14.6418 1.27352 15.8289 1.21593 17.064C1.2191 18.5087 1.79442 19.8934 2.816 20.915C3.83757 21.9365 5.22221 22.5119 6.66693 22.515C9.74193 22.532 12.6779 22.532 15.7529 22.515C15.8352 22.5038 15.9189 22.5117 15.9975 22.5382C16.0762 22.5646 16.1476 22.6089 16.2063 22.6676C16.265 22.7263 16.3093 22.7978 16.3358 22.8764C16.3623 22.9551 16.3702 23.0388 16.3589 23.121C16.3329 24.008 16.6489 23.727 15.7529 23.727H7.27293C6.30877 23.7632 5.34751 23.6 4.44934 23.2475C3.55117 22.8951 2.73543 22.361 2.05318 21.6788C1.37093 20.9965 0.83687 20.1808 0.484425 19.2826C0.131981 18.3845 -0.0312565 17.4232 0.00493311 16.459C0.0377662 15.3009 0.396026 14.1754 1.0387 13.2114C1.68138 12.2474 2.58251 11.4838 3.63893 11.008C3.88893 10.879 4.24493 10.695 4.24493 10.402C4.14481 8.10305 4.89084 5.84712 6.34184 4.0611C7.79285 2.27507 9.84818 1.08285 12.1189 0.710028C13.971 0.395432 15.8746 0.629184 17.5956 1.38252C19.3165 2.13585 20.7797 3.37589 21.8049 4.95003C22.0379 5.31203 22.0049 5.11403 22.4109 4.95003C26.6399 3.26203 31.5109 5.99203 32.7109 10.401C32.7799 10.668 33.0579 10.272 33.3169 10.401C34.5869 11.1026 35.6141 12.1729 36.2629 13.4705C36.9118 14.7682 37.1517 16.2322 36.9509 17.669C36.8271 19.1348 36.2282 20.52 35.2453 21.6143C34.2623 22.7087 32.949 23.4522 31.5049 23.732C30.901 23.7966 30.2919 23.7966 29.6879 23.732C28.4779 23.718 27.2559 23.732 26.0499 23.732Z" fill="#CDD5DE"/>
																		<path d="M18.176 15.247C16.738 16.694 15.262 18.126 13.936 19.487C13.669 19.754 13.606 19.787 13.33 19.487C12.65 18.755 12.63 18.973 13.33 18.276C15.061 16.545 16.445 14.576 18.176 12.825C18.391 12.61 18.523 12.567 18.782 12.825C20.66 14.725 22.944 17.005 24.839 18.882C25.046 19.089 25.08 18.682 24.839 18.882C24.563 19.106 23.939 20.093 23.628 20.093C23.317 20.093 23.272 19.131 23.022 18.882C21.911 17.782 21.096 16.956 19.993 15.853L19.387 15.247C19.266 15.411 19.387 15.706 19.387 15.853C19.387 20.553 19.37 25.688 19.387 30.39C19.387 30.778 19.177 30.407 18.781 30.39C17.881 30.364 18.175 30.671 18.175 29.784V15.853C18.158 15.732 18.176 15.54 18.176 15.247Z" fill="#CDD5DE"/>
																	</svg>
																</span>
                                                <span class="text"> عکس اصلی </span>
                                                <span class="but">بارگذاری ...</span>
                                            </label>
                                            <img style="border: 2px solid #0eb582;box-sizing: border-box; border-radius: 15px; width: 100px; height: auto;float: left; margin-top: 10px" src="{{asset('src/article/images/').'/'.$Article->image}}" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <textarea name="article" id="mytextarea">{{old('article',$Article->article )}}</textarea>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="add-tag">
                                <h4><span class="hs">#</span>افزودن تگ ها <span>(حداكثر 5 تا)</span></h4>

                                <div class="form">
                                    <input type="text" placeholder="كلمات كليدی">
                                    <span class="addt">افزودن</span>
                                </div>
                                <div class="result">

                                    @if(  old('tag',$Article->tag))
                                            @php
                                                $tags=explode('__', $Article->tag)
                                            @endphp
                                        @foreach(   old('tag',$tags) as $old)
                                            <span><input name="tag[]" hidden="" value="{{($old)}}"> {{$old}}<i class="icon-close"></i></span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="buttons">
                                <div class="button-container">
                                    <input type="submit" class="publish" value="انتشار  " name="save">
                                </div>
                                <div class="button-container">
                                    <input type="submit" class="draft" value="  ذخیره پیشنویس" name="draft">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </form>



        </div>


    </div>

    <script>
        (function ($) {
            $(document).ready(function () {
                var data = [{
                    id: 0,
                    text: '<div class="category-op"><span>دسته 1</span></div>',
                    html: '<div class="category-op"><span>دسته 1</span></div>',
                    title: '<div class="category-op"><span>دسته 1</span></div>'
                }, {
                    id: 1,
                    text: '<div class="category-op"><span>دسته 2</span></div>',
                    html: '<div class="category-op"><span>دسته 2</span></div>',
                    title: '<div class="category-op"><span>دسته 2</span></div>'
                }, {
                    id: 3,
                    text: '<div class="category-op"><span>دسته 3</span></div>',
                    html: '<div class="category-op"><span>دسته 3</span></div>',
                    title: '<div class="category-op"><span>دسته 3</span></div>'
                }, {
                    id: 4,
                    text: '<div class="category-op"><span>دسته 4</span></div>',
                    html: '<div class="category-op"><span>دسته 4</span></div>',
                    title: '<div class="category-op"><span>دسته 4</span></div>'
                }];

                $("select").select2({
                    placeholder:"انتخاب دسته بندی",
                    dir: "rtl",
                    minimumResultsForSearch: -1,

                })
            })
        })(jQuery);
    </script>

































@endcomponent
