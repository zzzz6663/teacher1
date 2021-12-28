@component('home.teacher.content',['title'=>' تنظیمات '])

<div class="popup not-fixeds">
    <div class="popup-container user-set-pop">
        <div class="user-set-pop-content disbm">
            <ul class="tabv">
                <li class="tabv active">

                    <div class="form">
                        @if($errors->any())
                        <div class="e_section" id="e_section">
                            {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                        </div>
                    @endif
                        <form class="mwidth pt0" action="{{route('Resume.store',$user->id)}}" method="post">
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
                                                    <input type="text" name="place" value="{{old('place')}}" placeholder="‏">

                                                </div>

                                                <div class="select-box">
                                                    <div class="right">
                                                        <div class="input-container {{old('from')?'active':""}}">
                                                            <span>سال شروع</span>
                                                            <input type="number" value="{{old('from')}}" name="from">
                                                        </div>
                                                    </div>
                                                    <div class="left">
                                                        <div class="input-container {{old('till')?'active':""}}">
                                                            <span>سال اتمام</span>
                                                            <input type="number" value="{{old('till')}}" name="till">
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
                                                            <span> {{$res->from}}-{{$res->till}}</span>
                                                            <span class="icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.7" d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM11 10H15V12H9V5H11V10Z" fill="#889AAF"></path>
                                                                </svg>
                                                            </span>

                                                        </span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <form id="fff_{{$res->id}}" action="{{route('Resume.destroy',$res->id)}}" class="delete_user_note  nonee " style="display:none; padding-left: 5px" method="post">

                                                        </form>
                                                        <form id="fff_{{$res->id}}" action="{{route('Resume.destroy',$res->id)}}" class="delete_user_note  nonee " style="padding-left: 5px" method="post">
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

                                                        <form id="ddr_{{$res->id}}" action="{{route('Resume.edit',$res->id)}}" class="delete_user_note  nonee" method="get">
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
                                        <li>
                                            <div>
                                                @foreach($user->resumes()->whereType('sabeghe')->get() as $res1)
                                                <div class="resume">

                                                    <div class="left">
                                                        <h5>{{$res1->title}} ({{$res1->place}})</h5>
                                                        <p>
                                                            {{$res1->info}}
                                                        </p>
                                                        <span class="date">
                                                            <span> {{$res1->from}}-{{$res1->till}}</span>
                                                            <span class="icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.7" d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM11 10H15V12H9V5H11V10Z" fill="#889AAF"></path>
                                                                </svg>
                                                            </span>

                                                        </span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <form id="fff_{{$res1->id}}" action="{{route('Resume.destroy',$res1->id)}}" class="delete_user_note  nonee " style="display:none; padding-left: 5px" method="post">

                                                        </form>
                                                        <form id="ff_{{$res1->id}}" action="{{route('Resume.destroy',$res1->id)}}" class="delete_user_note nonee" style="padding-left: 5px" method="post">
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

                                                        <form id="dd_{{$res1->id}}" action="{{route('Resume.edit',$res1->id)}}" class="delete_user_note nonee" method="get">
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
                                        <li>
                                            <div>
                                                @foreach($user->resumes()->whereType('licence')->get() as $res2)
                                                <div class="resume">

                                                    <div class="left">
                                                        <h5>{{$res2->title}} ({{$res2->place}})</h5>
                                                        <p>
                                                            {{$res2->info}}
                                                        </p>
                                                        <span class="date">
                                                            <span> {{$res2->from}}-{{$res2->till}}</span>
                                                            <span class="icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.7" d="M10 20C8.02219 20 6.08879 19.4135 4.4443 18.3147C2.79981 17.2159 1.51809 15.6541 0.761209 13.8268C0.00433284 11.9996 -0.193701 9.98891 0.192152 8.0491C0.578004 6.10929 1.53041 4.32746 2.92894 2.92894C4.32746 1.53041 6.10929 0.578004 8.0491 0.192152C9.98891 -0.193701 11.9996 0.00433284 13.8268 0.761209C15.6541 1.51809 17.2159 2.79981 18.3147 4.4443C19.4135 6.08879 20 8.02219 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20ZM10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00347 6.93854 2.60897C5.47673 3.21447 4.2273 4.23985 3.34825 5.55544C2.4692 6.87104 2 8.41775 2 10C2 12.1217 2.84286 14.1566 4.34315 15.6569C5.84344 17.1572 7.87827 18 10 18ZM11 10H15V12H9V5H11V10Z" fill="#889AAF"></path>
                                                                </svg>
                                                            </span>

                                                        </span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <form id="fff_{{$res2->id}}" action="{{route('Resume.destroy',$res2->id)}}" class="delete_user_note  nonee " style="display:none; padding-left: 5px" method="post">

                                                        </form>
                                                        <form id="ff_w{{$res2->id}}" action="{{route('Resume.destroy',$res2->id)}}" class="delete_user_note nonee dsinb" style="padding-left: 5px" method="post">
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

                                                        <form id="dd_{{$res2->id}}" action="{{route('Resume.edit',$res2->id)}}" class="delete_user_note nonee dsinb" method="get">
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

            </ul>
        </div>

    </div>
</div>





@endcomponent
