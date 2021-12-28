@component('home.teacher.content',['title'=>' تنظیمات  '])



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
                @foreach($article->comments()->whereActive('1')->orderBy('seen','desc')->get( ) as $comment)
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

{{--            <div class="more-comment">--}}
{{--                <a href="#"><span>(مشاهده </span><b>همه نظرات</b>)</a>--}}
{{--            </div>--}}

        </div>
    </div>



@endcomponent
