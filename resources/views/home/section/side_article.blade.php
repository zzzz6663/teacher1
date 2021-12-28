
        <div id="blog-sidebar">
            <div class="side-search">
                <form action="{{route('home.articles')}}" method="get">
                    @csrf
                    @method('fet')
                    <input placeholder="جستجو..." type="search" name="search" title="جستجو" value="{{request('search')}}">
                    <button class="sear">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.77344 15.9277C12.7085 15.9277 15.8984 12.7378 15.8984 8.80273C15.8984 4.86771 12.7085 1.67773 8.77344 1.67773C4.83841 1.67773 1.64844 4.86771 1.64844 8.80273C1.64844 12.7378 4.83841 15.9277 8.77344 15.9277Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path opacity="0.4" d="M16.6484 16.6777L15.1484 15.1777" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
            </div>

            <div class="side-widget">
                <div class="widget-title-side">
                    <h4>
										<span class="icon">
											<svg width="17" height="23" viewBox="0 0 17 23" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M13.9258 14.6571V21.5291C13.9258 21.6176 13.9023 21.7044 13.8578 21.7809C13.8133 21.8573 13.7493 21.9206 13.6723 21.9642C13.5953 22.0078 13.5082 22.0302 13.4197 22.0292C13.3313 22.0281 13.2447 22.0036 13.1688 21.9581L8.92578 19.4121L4.68278 21.9581C4.60682 22.0036 4.52014 22.0281 4.4316 22.0292C4.34305 22.0302 4.25582 22.0077 4.17882 21.9639C4.10183 21.9202 4.03783 21.8568 3.99337 21.7802C3.94891 21.7036 3.92559 21.6166 3.92578 21.5281V14.6581C2.63193 13.6222 1.69177 12.21 1.23524 10.6166C0.778707 9.02328 0.828337 7.32747 1.37727 5.76356C1.92621 4.19964 2.94734 2.84483 4.29956 1.88636C5.65179 0.927893 7.26832 0.413086 8.92578 0.413086C10.5832 0.413086 12.1998 0.927893 13.552 1.88636C14.9042 2.84483 15.9254 4.19964 16.4743 5.76356C17.0232 7.32747 17.0729 9.02328 16.6163 10.6166C16.1598 12.21 15.2196 13.6222 13.9258 14.6581V14.6571ZM5.92578 15.8301V18.8801L8.92578 17.0801L11.9258 18.8801V15.8301C10.9726 16.2156 9.95394 16.4132 8.92578 16.4121C7.89762 16.4132 6.87894 16.2156 5.92578 15.8301ZM8.92578 14.4121C10.5171 14.4121 12.0432 13.7799 13.1684 12.6547C14.2936 11.5295 14.9258 10.0034 14.9258 8.41208C14.9258 6.82079 14.2936 5.29466 13.1684 4.16944C12.0432 3.04423 10.5171 2.41208 8.92578 2.41208C7.33448 2.41208 5.80836 3.04423 4.68314 4.16944C3.55792 5.29466 2.92578 6.82079 2.92578 8.41208C2.92578 10.0034 3.55792 11.5295 4.68314 12.6547C5.80836 13.7799 7.33448 14.4121 8.92578 14.4121Z" fill="white"/>
											</svg>
										</span>
                        <span class="text">دسته‌بندی‌ها</span>
                    </h4>
                </div>
                <div class="widget-content-side">
                    <div class="category">
                        <div id="smenu2">
                            <ul>

                                @foreach(\App\Models\Acat::whereNull('parent_id')->latest()->get() as $ac)
                                    @if(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get()->first()  )
                                        <li  >
                                            <a  class="{{\App\Models\Acat::where('parent_id',$ac->id)->latest()->count()>0?'has_child':''}}">
                                                <span class="num">9</span>
                                                <span class="text">    {{$ac->name}}</span>
                                            </a>
                                            <ul  >
                                                <li>
                                                    <a  href="{{route('home.articles',$ac->id)}}"  >
                                                        <span class="num">7</span>
                                                        <span class="text">    {{$ac->name}}</span>
                                                    </a>
                                                </li>
                                                @foreach(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get() as $accc)
                                                    <li>
                                                        <a class=""  href="{{route('home.articles',$accc->id)}}"  >
                                                            <span class="num">5</span>
                                                            <span class="text">    {{$accc->name}}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a   href="{{route('home.articles',$ac->id)}}"  >
                                                <span class="num">5</span>
                                                <span class="text">    {{$ac->name}}</span>
                                            </a>
                                        </li>

                                    @endif
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="side-widget">
                <div class="widget-title-side">
                    <h4>
										<span class="icon">
											<svg width="19" height="21" viewBox="0 0 19 21" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M4.86578 12.6727C4.63278 13.2967 4.43578 13.8727 4.25978 14.4557C5.21978 13.7587 6.36078 13.3167 7.67778 13.1517C10.1908 12.8377 12.4238 11.1787 13.5538 9.09372L12.0978 7.63872L13.5108 6.22372L14.5108 5.22272C14.9408 4.79272 15.4258 3.99872 15.9388 2.85472C10.3458 3.72172 6.92078 7.14672 4.86478 12.6727H4.86578ZM14.9258 7.63772L15.9258 8.63672C14.9258 11.6367 11.9258 14.6367 7.92578 15.1367C5.25678 15.4707 3.58978 17.3037 2.92378 20.6367H0.925781C1.92578 14.6367 3.92578 0.636719 18.9258 0.636719C17.9258 3.63372 16.9278 5.63272 15.9288 6.63372L14.9258 7.63772Z" fill="white"/>
											</svg>
										</span>
                        <span class="text">آخرین مقالات</span>
                    </h4>
                </div>
                <div class="widget-content-side">
                    <div class="last-post">


                        @foreach(\App\Models\Article::where('submit','1')->where('active','1')->take(4)->latest()->get() as $latest)


                            <div class="hor-post">
                                <div class="right">
                                    <a href="{{route('home.single.article',$latest->id)}}">
                                        <div class="img" style="background: url('{{asset('/src/article/images/'.$latest->image)}}');">

                                        </div>
                                    </a>
                                </div>
                                <div class="left">
                                    <h5>
                                        <a href="{{route('home.single.article',$latest->id)}}">{{$latest->title}} </a>
                                    </h5>
                                    <div class="date">
                                        <span>{{\Morilog\Jalali\Jalalian::forge($latest->created_at)->format('%B %d، %Y')}} </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>


        </div>




