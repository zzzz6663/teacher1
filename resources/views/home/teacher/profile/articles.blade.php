@component('home.teacher.content',['title'=>' تنظیمات  '])


    <div class="sarch-button-order">
        <div class="add-new-class">
            <a style="text-align: center" href="{{route('Article.create' )}}" class="add-new-class-bt">
								<span class="icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g opacity="0.4">
										<path d="M9.5 13.75C9.5 14.72 10.25 15.5 11.17 15.5H13.05C13.85 15.5 14.5 14.82 14.5 13.97C14.5 13.06 14.1 12.73 13.51 12.52L10.5 11.47C9.91 11.26 9.51001 10.94 9.51001 10.02C9.51001 9.17999 10.16 8.48999 10.96 8.48999H12.84C13.76 8.48999 14.51 9.26999 14.51 10.24" stroke="#57BA7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M12 7.5V16.5" stroke="#57BA7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</g>
										<path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2" stroke="#57BA7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M22 6V2H18" stroke="#57BA7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M17 7L22 2" stroke="#57BA7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
                <span class="text">نوشتن مقاله جدید</span>
            </a>
        </div>

        <div class="search-ordering">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <form action="{{route('teacher.articles')}}" class="search" method="get">
                        @csrf
                        @method('get')
                        <input name="search" type="text" value="{{request('search')}}" placeholder="جستجو بر اساس عنوان یا کلمه کلیدی ...">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.58341 17.5001C13.9557 17.5001 17.5001 13.9557 17.5001 9.58341C17.5001 5.21116 13.9557 1.66675 9.58341 1.66675C5.21116 1.66675 1.66675 5.21116 1.66675 9.58341C1.66675 13.9557 5.21116 17.5001 9.58341 17.5001Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path opacity="0.4" d="M18.3334 18.3334L16.6667 16.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div>
                        <div class="ordering">
                            <h4>
												<span class="icon">
													<svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M7.77333 12.9939L10.731 12.9939V11.6639L7.77333 11.6639V12.9939ZM2.59741 4.9939V6.3279L15.9069 6.3279V4.9939L2.59741 4.9939ZM4.81455 9.6629L13.6831 9.6629V8.3289L4.81455 8.3289V9.6629Z" fill="#5E57BA"></path>
													</svg>
												</span>
                                <span class="val">نمایش :</span>
                            </h4>

                            <form action="{{route('teacher.articles')}}" class="search" method="get">
                                @csrf
                                @method('get')
                                <ul>
                                    <li>
                                        <div class="label-container">
                                            <input type="text" hidden name="filter"  value="1" >
                                            <input {{request('filter')=='all'?'checked':''}} type="radio" name="filter" id="alls" value="all" checked="">
                                            <label for="alls">همه</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input {{request('filter')=='draft'?'checked':''}} type="radio" name="filter" id="draft" value="draft">
                                            <label for="draft">پیشنویس ها</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input {{request('filter')=='persubmit'?'checked':''}} type="radio" name="filter" id="proccesing" value="persubmit">
                                            <label for="proccesing">منتظر تایید</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input {{request('filter')=='release'?'checked':''}} type="radio" name="filter" id="deliverd" value="release">
                                            <label for="deliverd">منتشر شده</label>
                                        </div>
                                    </li>
                                </ul>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="dash-title">
        مقاله های شما
    </h3>
    <div class="teacher-articles">
        <div class="row">
            @foreach($artices  as $ar)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div>

                    <div class="single-blog">
                        <div class="top">
                            <div class="info">
{{--                                <div class="author">--}}
{{--                                    <div class="img" style="background: url('{{asset('/src/article/images/'.$ar->image)}}');">--}}

{{--                                    </div>--}}
{{--                                    <span class="name">پگاه علیـزاده</span>--}}
{{--                                </div>--}}

                                <span class="date">
												 {{\Morilog\Jalali\Jalalian::forge($ar->created_at)->format('%B %d، %Y')}}
												</span>
                            </div>
                            <div class="img">
                                <a href="{{route('home.single.article',$ar->id)}}" style="background: url('{{asset('/src/article/images/'.$ar->image)}}');">

                                </a>
                            </div>
                        </div>

                        <div class="blog-text">
                            <h3>
                                <a href="{{route('home.single.article',$ar->id)}}">{{$ar->title}}</a>
                            </h3>
                            {!! $ar->article !!}
                        </div>

                        <div class="more">
                            <a class="moretag" href="{{route('teacher.see.comment',  $ar->id  )}}">   دیدگاه</a>
                            <a class="cancel moretag" href="{{route('home.single.article',$ar->id)}}">مشاهده مطلب</a>
                            <a class="moretag" href="{{route('Article.edit',['Article'=>$ar->id,'user'=>$user->id])}}"> ویرایش   </a>
                            <form class="moretagform"  action="{{route('Article.destroy',['Article'=>$ar->id] )}}"  method="POST"  >
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="cancel moretag" value="حذف" >
                            </form>
                        </div>

                    </div>

                </div>
            </div>
                @endforeach

        </div>
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div>--}}
{{--                    <div class="load-more">--}}
{{--                        <a href="#" class="load">--}}
{{--                            <span class="text">مشاهده بیشتر</span>--}}
{{--                            <span class="icon">--}}
{{--												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--													<path d="M11.9999 2C12.2652 2 12.5195 2.10536 12.707 2.29289C12.8946 2.48043 12.9999 2.73478 12.9999 3V6C12.9999 6.26522 12.8946 6.51957 12.707 6.70711C12.5195 6.89464 12.2652 7 11.9999 7C11.7347 7 11.4804 6.89464 11.2928 6.70711C11.1053 6.51957 10.9999 6.26522 10.9999 6V3C10.9999 2.73478 11.1053 2.48043 11.2928 2.29289C11.4804 2.10536 11.7347 2 11.9999 2ZM11.9999 17C12.2652 17 12.5195 17.1054 12.707 17.2929C12.8946 17.4804 12.9999 17.7348 12.9999 18V21C12.9999 21.2652 12.8946 21.5196 12.707 21.7071C12.5195 21.8946 12.2652 22 11.9999 22C11.7347 22 11.4804 21.8946 11.2928 21.7071C11.1053 21.5196 10.9999 21.2652 10.9999 21V18C10.9999 17.7348 11.1053 17.4804 11.2928 17.2929C11.4804 17.1054 11.7347 17 11.9999 17ZM20.6599 7C20.7925 7.22968 20.8285 7.50263 20.7598 7.7588C20.6912 8.01497 20.5236 8.23339 20.2939 8.366L17.6959 9.866C17.5822 9.9327 17.4563 9.97623 17.3257 9.9941C17.195 10.012 17.0621 10.0038 16.9346 9.9701C16.8071 9.93639 16.6875 9.8778 16.5828 9.79769C16.478 9.71758 16.3901 9.61754 16.3242 9.50333C16.2582 9.38912 16.2155 9.26299 16.1985 9.13221C16.1815 9.00143 16.1906 8.86858 16.2251 8.74131C16.2597 8.61403 16.3191 8.49485 16.3999 8.39063C16.4807 8.2864 16.5813 8.19918 16.6959 8.134L19.2939 6.634C19.5236 6.5014 19.7966 6.46546 20.0527 6.5341C20.3089 6.60274 20.5273 6.77033 20.6599 7ZM7.66994 14.5C7.80254 14.7297 7.83848 15.0026 7.76984 15.2588C7.7012 15.515 7.53361 15.7334 7.30394 15.866L4.70594 17.366C4.59217 17.4327 4.46633 17.4762 4.33566 17.4941C4.205 17.512 4.07209 17.5038 3.94459 17.4701C3.81709 17.4364 3.69752 17.3778 3.59276 17.2977C3.488 17.2176 3.40012 17.1175 3.33418 17.0033C3.26823 16.8891 3.22554 16.763 3.20854 16.6322C3.19154 16.5014 3.20058 16.3686 3.23513 16.2413C3.26968 16.114 3.32907 15.9949 3.40987 15.8906C3.49067 15.7864 3.59129 15.6992 3.70594 15.634L6.30394 14.134C6.53362 14.0014 6.80657 13.9655 7.06274 14.0341C7.31891 14.1027 7.53733 14.2703 7.66994 14.5ZM20.6599 17C20.5273 17.2297 20.3089 17.3973 20.0527 17.4659C19.7966 17.5345 19.5236 17.4986 19.2939 17.366L16.6959 15.866C16.4681 15.7324 16.3024 15.5142 16.2349 15.2589C16.1674 15.0036 16.2036 14.732 16.3357 14.5033C16.4677 14.2746 16.6848 14.1074 16.9397 14.0383C17.1945 13.9691 17.4664 14.0035 17.6959 14.134L20.2939 15.634C20.5236 15.7666 20.6912 15.985 20.7598 16.2412C20.8285 16.4974 20.7925 16.7703 20.6599 17ZM7.66994 9.5C7.53733 9.72967 7.31891 9.89726 7.06274 9.9659C6.80657 10.0345 6.53362 9.9986 6.30394 9.866L3.70594 8.366C3.59129 8.30082 3.49067 8.2136 3.40987 8.10937C3.32907 8.00515 3.26968 7.88597 3.23513 7.75869C3.20058 7.63142 3.19154 7.49857 3.20854 7.36779C3.22554 7.23701 3.26823 7.11088 3.33418 6.99667C3.40012 6.88246 3.488 6.78242 3.59276 6.70231C3.69752 6.62221 3.81709 6.56361 3.94459 6.5299C4.07209 6.49619 4.205 6.48804 4.33566 6.5059C4.46633 6.52377 4.59217 6.5673 4.70594 6.634L7.30394 8.134C7.53361 8.26661 7.7012 8.48503 7.76984 8.7412C7.83848 8.99737 7.80254 9.27032 7.66994 9.5Z" fill="#5A6274"></path>--}}
{{--												</svg>--}}

{{--											</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>



    <div class="teacher-comment shade">

        <div class="widget-title">
            <h3>آخرین نظرات زبان آموزان</h3>

            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">
            <div>

                @foreach(  \App\Models\Comment::where('active','1')->whereHas('commentable' , function($query) {
                    $query->where('user_id' , \auth()->user()->id);
                })->latest()->take(5)->get() as $comment)
                    @php($v=verta($comment->created_at))


                    <div class="ho-comment">
                        <div class="right">
                            <div class="pic">
                            <span class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.51599 1.99707H9.09799C10.4676 1.99707 11.7811 2.54113 12.7495 3.50957C13.7179 4.47801 14.262 5.79149 14.262 7.16107C14.262 8.53065 13.7179 9.84413 12.7495 10.8126C11.7811 11.781 10.4676 12.3251 9.09799 12.3251V14.5841C5.86999 13.2971 1.35199 11.3571 1.35199 7.16107C1.35199 5.79149 1.89605 4.47801 2.86449 3.50957C3.83293 2.54113 5.14641 1.99707 6.51599 1.99707Z" fill="white"></path>
                                </svg>
                            </span>
                                @if($comment->user_id)
                                    <div class="img" style="background: url('{{asset('/src/avatar/'.$comment->user->attr('avatar'))}}');">

                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="mtexct">
                            <div class="right">
                                <div class="name"><span>توسط :</span> <span class="namet">   {{$comment->name}}</span></div>
                                <div class="date"><span>  {{$v->format('%B %d، %Y')}}</span></div>
                                <div class="text">
                                    <p>
                                        {{$comment->comment}}
                                    </p>
                                </div>
                            </div>
                            <div class="buuton">
                                {{--											<span class="remove">--}}
                                {{--												<i class="icon">--}}
                                {{--													<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                {{--														<path d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
                                {{--														<path opacity="0.34" d="M7.08301 4.14163L7.26634 3.04996C7.39967 2.25829 7.49967 1.66663 8.90801 1.66663H11.0913C12.4997 1.66663 12.608 2.29163 12.733 3.05829L12.9163 4.14163" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
                                {{--														<path d="M15.7087 7.6167L15.167 16.0084C15.0753 17.3167 15.0003 18.3334 12.6753 18.3334H7.32533C5.00033 18.3334 4.92533 17.3167 4.83366 16.0084L4.29199 7.6167" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
                                {{--														<path opacity="0.34" d="M8.6084 13.75H11.3834" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
                                {{--														<path opacity="0.34" d="M7.91699 10.4166H12.0837" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>--}}
                                {{--													</svg>--}}
                                {{--												</i>--}}
                                {{--												حذف--}}
                                {{--											</span>--}}

                                <a  class="reply" href="{{route('home.single.article',$comment->commentable)}}">
                                    <i class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.4">
                                                <path d="M5.83301 10.1333H8.06634C8.658 10.1333 9.058 10.5833 9.058 11.125V12.3667C9.058 12.9083 8.658 13.3583 8.06634 13.3583H6.82468C6.28301 13.3583 5.83301 12.9083 5.83301 12.3667V10.1333Z" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5.83301 10.1333C5.83301 7.80827 6.26634 7.4166 7.57467 6.6416" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.9502 10.1333H13.1835C13.7752 10.1333 14.1752 10.5833 14.1752 11.125V12.3667C14.1752 12.9083 13.7752 13.3583 13.1835 13.3583H11.9419C11.4002 13.3583 10.9502 12.9083 10.9502 12.3667V10.1333Z" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.9502 10.1333C10.9502 7.80827 11.3835 7.4166 12.6919 6.6416" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                            <path d="M10.0003 18.3333C14.6027 18.3333 18.3337 14.6023 18.3337 9.99996C18.3337 5.39759 14.6027 1.66663 10.0003 1.66663C5.39795 1.66663 1.66699 5.39759 1.66699 9.99996C1.66699 14.6023 5.39795 18.3333 10.0003 18.3333Z" stroke="#636379" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </i>
                                    پاسخ

                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach



            </div>

{{--                        <div class="more-comment">--}}
{{--                            <a href="{{route('teacher.see.comment')}}"><span>(مشاهده </span><b>همه نظرات</b>)</a>--}}
{{--                        </div>--}}

        </div>
    </div>
















@endcomponent
