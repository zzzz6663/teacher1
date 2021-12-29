@extends('master.home')
@section('main_body')

<!-- Start Filter -->
<div id="filters" class="rows">
    <div class="fullcontainer">
        <form id="s1" action="{{route('home.teacher.list')}}" method="get">
            @csrf
            @method('get')
            <div class="filters">
                <div>

                    <div class="lang sfilter drop-filter">
                        <div class="drop-value">
                            <span class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.8833 15.5583L14.1 12L12.3167 15.5583" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.6416 14.925H15.5749" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14.1 18.3333C11.7667 18.3333 9.8667 16.4417 9.8667 14.1C9.8667 11.7667 11.7584 9.8667 14.1 9.8667C16.4334 9.8667 18.3334 11.7583 18.3334 14.1C18.3334 16.4417 16.4417 18.3333 14.1 18.3333Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.18342 1.66675H7.45008C9.17508 1.66675 10.0084 2.5001 9.96675 4.18343V7.45008C10.0084 9.17508 9.17508 10.0084 7.45008 9.96677H4.18342C2.50008 10.0001 1.66675 9.16674 1.66675 7.44174V4.17509C1.66675 2.50009 2.50008 1.66675 4.18342 1.66675Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.50833 4.875H4.125" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.80835 4.30835V4.87501" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.65837 4.8667C6.65837 6.32503 5.5167 7.50835 4.1167 7.50835" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.50846 7.50842C6.90012 7.50842 6.35013 7.18341 5.9668 6.66675" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M1.66675 12.5C1.66675 15.725 4.27508 18.3333 7.50008 18.3333L6.62508 16.875" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M18.3333 7.50008C18.3333 4.27508 15.725 1.66675 12.5 1.66675L13.375 3.12508" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>

                            <span class="text">
                                زبان
                            </span>

                            <span class="drop-icon">
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path d="M4 4L7 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4 4L1 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>

                            </span>
                        </div>
                        <div class="drop">
                            <div class="drop-container">

                                <div class="search-op">
                                    <input type="text" placeholder="جست وجوی زبان ···">
                                    <span>
                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.353 10.0779L14.209 12.9329L13.266 13.8759L10.411 11.0209C9.21287 11.978 7.69373 12.44 6.16559 12.3121C4.63744 12.1842 3.21627 11.476 2.19396 10.333C1.17164 9.18995 0.625777 7.69888 0.668465 6.16599C0.711154 4.63309 1.33916 3.17471 2.4235 2.09037C3.50784 1.00603 4.96622 0.378024 6.49912 0.335335C8.03201 0.292647 9.52308 0.838513 10.6661 1.86083C11.8091 2.88314 12.5173 4.30431 12.6452 5.83246C12.7732 7.3606 12.3111 8.87974 11.354 10.0779H11.353ZM10.016 9.58287C10.8732 8.69925 11.3464 7.51259 11.3324 6.28156C11.3184 5.05053 10.8184 3.87494 9.94128 3.01104C9.06418 2.14713 7.88115 1.66496 6.65005 1.66963C5.41895 1.67429 4.2396 2.16542 3.36907 3.03594C2.49855 3.90647 2.00742 5.08582 2.00276 6.31692C1.99809 7.54802 2.48026 8.73105 3.34417 9.60815C4.20807 10.4853 5.38366 10.9853 6.61469 10.9993C7.84572 11.0133 9.03238 10.5401 9.916 9.68287L10.016 9.58287Z" fill="#B5B5BE" />
                                        </svg>
                                    </span>
                                </div>


                                <ul class="drop-options  ">

                                    @foreach(\App\Models\Language::whereActive('1')->orderBy('sort')->get() as $lang)
                                    <li class="drop-option">
                                        <div class="label-container">
                                            <input type="checkbox" {{in_array($lang->id,request('la',[]))?'checked':''}} name="la[]" class="ts" id="{{$lang->en}}" value="{{$lang->id}}">
                                            <label for="{{$lang->en}}">
                                                <div class="right">
                                                    {{-- <img src="/home/images/french.png" alt="">--}}
                                                    <img style="width:25px;height:25px" src="{{asset('/src/img/lang/'.$lang->img)}}" alt="">
                                                </div>
                                                <div class="left">
                                                    <span class="top">{{$lang->name}}</span>
                                                    <span class="bot">{{$lang->en}}</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach

                                    <li class="drop-option">
                                        <div class="label-container">
                                            <input data-filter="زبان فرانسوی" type="checkbox" name="lang" value="french" id="french">
                                            <label for="french">
                                                <div class="right">
                                                    <img src="/home/images/france.png" alt="">
                                                </div>
                                                <div class="left">
                                                    <span class="top">فرانسوی</span>
                                                    <span class="bot">French</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="sfilter native">
                        <span class="text show-for-desktop inb">
                            زﺑﺎن ﺑﻮﻣﯽ
                        </span>
                        <span class="text show-for-mobile inb">
                            زﺑﺎن ﺑﻮﻣﯽ
                        </span>
                        <div class="check-toggle">
                            <input type="checkbox" data-filter="بومی" {{request('native')=='native'?'checked':''}} class="ts" name="native" value="native" id="native">
                            <label for="native"><span></span></label>
                        </div>
                    </div>

                    <div class="price sfilter drop-filter">
                        <div class="drop-value">
                            <span class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.47483 12.7502L7.24983 16.5252C8.79983 18.0752 11.3165 18.0752 12.8748 16.5252L16.5332 12.8668C18.0832 11.3168 18.0832 8.80016 16.5332 7.24183L12.7498 3.47516C11.9582 2.6835 10.8665 2.2585 9.74983 2.31683L5.58316 2.51683C3.9165 2.59183 2.5915 3.91683 2.50816 5.57516L2.30816 9.74183C2.25816 10.8668 2.68316 11.9585 3.47483 12.7502Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M7.91658 10.0002C9.06718 10.0002 9.99992 9.06742 9.99992 7.91683C9.99992 6.76624 9.06718 5.8335 7.91658 5.8335C6.76599 5.8335 5.83325 6.76624 5.83325 7.91683C5.83325 9.06742 6.76599 10.0002 7.91658 10.0002Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" />
                                </svg>

                            </span>

                            <span class="text">
                                قیمت
                            </span>

                            <span class="drop-icon">
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path d="M4 4L7 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4 4L1 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>

                            </span>
                        </div>
                        <div class="drop">

                            <div class="drop-container">

                                <h4>بازه قیمت مورد نظر خود را انتخاب کنید</h4>
                                <div id="priceslider" data-min="0" data-max="400000"></div>

                                <input type="text" hidden id="amount1" name="min" value="{{request('min',0) }}" readonly>
                                <input type="text" hidden id="amount2" name="max" value="{{request('max',400000) }}" readonly>
                                <div class="price-values">
                                    <div class="min">
                                        <span class="num"></span>
                                        <span class="text">تومان</span>
                                    </div>
                                    <div class="max">
                                        <span class="num"></span>
                                        <span class="text">تومان</span>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>

                    <div class="sex sfilter drop-filter">
                        <div class="drop-value">
                            <span class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M10.0999 10.65C10.0416 10.6417 9.9666 10.6417 9.89993 10.65C8.43327 10.6 7.2666 9.39998 7.2666 7.92498C7.2666 6.41665 8.48327 5.19165 9.99993 5.19165C11.5083 5.19165 12.7333 6.41665 12.7333 7.92498C12.7249 9.39998 11.5666 10.6 10.0999 10.65Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.34" d="M15.6166 16.15C14.1333 17.5084 12.1666 18.3334 9.99997 18.3334C7.8333 18.3334 5.86663 17.5084 4.3833 16.15C4.46663 15.3667 4.96663 14.6 5.8583 14C8.14163 12.4834 11.875 12.4834 14.1416 14C15.0333 14.6 15.5333 15.3667 15.6166 16.15Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.0001 18.3334C14.6025 18.3334 18.3334 14.6025 18.3334 10.0001C18.3334 5.39771 14.6025 1.66675 10.0001 1.66675C5.39771 1.66675 1.66675 5.39771 1.66675 10.0001C1.66675 14.6025 5.39771 18.3334 10.0001 18.3334Z" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>


                            </span>

                            <span class="text">
                                جنسیت
                            </span>

                            <span class="drop-icon">
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path d="M4 4L7 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4 4L1 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>

                            </span>
                        </div>
                        <div class="drop">
                            <div class="drop-container">
                                <h4>جنسیت</h4>

                                <ul class="gender">
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="جنسیت: هردو" class="ts" type="radio" {{request('sex')=='both'?'checked':'' }} name="sex" value="both" id="both">
                                            <label for="both">
                                                <span>هردو</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="جنسیت: آقا" class="ts" type="radio" {{request('sex')=='male'?'checked':'' }} name="sex" value="male" id="male">
                                            <label for="male">
                                                <span>آقا</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="جنسیت: خانم" class="ts" type="radio" {{request('sex')=='female'?'checked':'' }} name="sex" value="female" id="female">
                                            <label for="female">
                                                <span>خانم</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="level sfilter drop-filter">
                        <div class="drop-value">
                            <span class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.5 5.83325H17.5" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.34" d="M5 10H15" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M8.33325 14.1667H11.6666" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>

                            <span class="text">
                                سطح
                            </span>

                            <span class="drop-icon">
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path d="M4 4L7 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4 4L1 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>

                            </span>
                        </div>
                        <div class="drop">
                            <div class="drop-container">
                                <h4>سطح</h4>
                                <ul>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="سطح: ‏Starter" type="radio" class="ts" {{request('teachlevel')=='Starter'?'checked':''}} name="teachlevel" value="Starter" id="Starter">
                                            <label for="Starter">
                                                <span>‏Starter</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="سطح: ‏‏Elementary" type="radio" class="ts" {{request('teachlevel')=='Elementary'?'checked':''}} name="teachlevel" value="Elementary" id="Elementary">
                                            <label for="Elementary">
                                                <span>‏‏Elementary</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="سطح: ‏‏Intermediate" type="radio" class="ts" {{request('teachlevel')=='Intermediate'?'checked':''}} name="teachlevel" value="Intermediate" id="Intermediate">
                                            <label for="Intermediate">
                                                <span>‏‏Intermediate</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="سطح: ‏‏Upper Intermediate" type="radio" class="ts" {{request('teachlevel')=='Upper_intermediate'?'checked':''}} name="teachlevel" value="Upper_intermediate" id="upperintermediate">
                                            <label for="upperintermediate">
                                                <span>‏‏Upper Intermediate</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="سطح: ‏‏Advanced" type="radio" class="ts" {{request('teachlevel')=='Advanced'?'checked':''}} name="teachlevel" value="Advanced" id="Advanced">
                                            <label for="Advanced">
                                                <span>‏‏Advanced</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="سطح: ‏‏Mastery" type="radio" class="ts" {{request('teachlevel')=='mastery'?'checked':''}} name="teachlevel" value="mastery" id="mastery">
                                            <label for="mastery">
                                                <span>‏‏Mastery</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="expert sfilter drop-filter">
                        <div class="drop-value">
                            <span class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.5 5.83325H17.5" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.34" d="M5 10H15" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M8.33325 14.1667H11.6666" stroke="#5E57BA" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </span>

                            <span class="text">
                                تخصص
                            </span>

                            <span class="drop-icon">
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path d="M4 4L7 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4 4L1 1" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>

                            </span>
                        </div>
                        <div class="drop">
                            <div class="drop-container">

                                <div class="search-op">
                                    <input type="text" placeholder="Search">
                                    <span>
                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.353 10.0779L14.209 12.9329L13.266 13.8759L10.411 11.0209C9.21287 11.978 7.69373 12.44 6.16559 12.3121C4.63744 12.1842 3.21627 11.476 2.19396 10.333C1.17164 9.18995 0.625777 7.69888 0.668465 6.16599C0.711154 4.63309 1.33916 3.17471 2.4235 2.09037C3.50784 1.00603 4.96622 0.378024 6.49912 0.335335C8.03201 0.292647 9.52308 0.838513 10.6661 1.86083C11.8091 2.88314 12.5173 4.30431 12.6452 5.83246C12.7732 7.3606 12.3111 8.87974 11.354 10.0779H11.353ZM10.016 9.58287C10.8732 8.69925 11.3464 7.51259 11.3324 6.28156C11.3184 5.05053 10.8184 3.87494 9.94128 3.01104C9.06418 2.14713 7.88115 1.66496 6.65005 1.66963C5.41895 1.67429 4.2396 2.16542 3.36907 3.03594C2.49855 3.90647 2.00742 5.08582 2.00276 6.31692C1.99809 7.54802 2.48026 8.73105 3.34417 9.60815C4.20807 10.4853 5.38366 10.9853 6.61469 10.9993C7.84572 11.0133 9.03238 10.5401 9.916 9.68287L10.016 9.58287Z" fill="#B5B5BE" />
                                        </svg>
                                    </span>
                                </div>

                                <ul>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="تخصص: ACT" type="checkbox" class="ts" {{request('TOEFL')=='TOEFL'?'checked':''}} name="TOEFL" value="TOEFL" id="TOEFL">
                                            <label for="TOEFL">
                                                <span class="top">TOEFL</span>
                                                <span class="bot">Test of English as a Foreign Language</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="تخصص: IELS" type="checkbox" class="ts" {{request('IELTS')=='IELTS'?'checked':''}} name="IELTS" value="IELTS" id="IELTS">
                                            <label for="IELTS">
                                                <span class="top">IELS</span>
                                                <span class="bot">International English LS</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="label-container">
                                            <input data-filter="تخصص: PTE" type="checkbox" class="ts" {{request('PTE')=='PTE'?'checked':''}} name="PTE" value="PTE" id=PTE">
                                            <label for="PTE">
                                                <span class="top">PTE</span>
                                                <span class="bot">Pearson Language Tests</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="sfilter trial">
                        <span class="icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.6414 8.33325H3.30811V14.9999C3.30811 17.4999 4.14144 18.3333 6.64144 18.3333H13.3081C15.8081 18.3333 16.6414 17.4999 16.6414 14.9999V8.33325Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.9168 5.83341V6.66675C17.9168 7.58341 17.4752 8.33341 16.2502 8.33341H3.75016C2.47516 8.33341 2.0835 7.58341 2.0835 6.66675V5.83341C2.0835 4.91675 2.47516 4.16675 3.75016 4.16675H16.2502C17.4752 4.16675 17.9168 4.91675 17.9168 5.83341Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.4" d="M9.69998 4.16662H5.09998C4.81665 3.85828 4.82498 3.38328 5.12498 3.08328L6.30832 1.89995C6.61665 1.59162 7.12498 1.59162 7.43332 1.89995L9.69998 4.16662Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.4" d="M14.8915 4.16662H10.2915L12.5582 1.89995C12.8665 1.59162 13.3748 1.59162 13.6832 1.89995L14.8665 3.08328C15.1665 3.38328 15.1748 3.85828 14.8915 4.16662Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.4" d="M7.4502 8.33325V12.6166C7.4502 13.2833 8.18353 13.6749 8.74186 13.3166L9.5252 12.7999C9.80853 12.6166 10.1669 12.6166 10.4419 12.7999L11.1835 13.2999C11.7335 13.6666 12.4752 13.2749 12.4752 12.6083V8.33325H7.4502Z" stroke="#5E57BA" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </span>
                        <span class="text">
                            جلسه آزمایشی رایگان
                        </span>
                        <div class="check-toggle">
                            <input type="checkbox" data-filter="جلسه ازمایشی رایگان" {{request('freeclass')=='freeclass'?'checked':''}} class="ts" name="freeclass" value="freeclass" id="freeclass">
                            <label for="freeclass"><span></span></label>
                        </div>
                    </div>

                </div>
                <button class="view-commwnt">
                    مشاهده همه نظرات
                </button>
            </div>
        </form>
        <div class="applied-filters">
            <div class="row">
                <div class="col-lg-9 col-md-12 center-block">
                    <div>


                        <h4>
                            <span class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.0249 12.2916C18.0249 13.0333 17.8166 13.7333 17.4499 14.3333C16.7666 15.4833 15.5083 16.2499 14.0666 16.2499C12.6249 16.2499 11.3666 15.4749 10.6833 14.3333C10.3166 13.7416 10.1083 13.0333 10.1083 12.2916C10.1083 10.1083 11.8833 8.33325 14.0666 8.33325C16.2499 8.33325 18.0249 10.1083 18.0249 12.2916Z" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.1251 13.3251L13.0334 11.2334" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.1084 11.2583L13.0167 13.35" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M17.2416 3.3501V5.20007C17.2416 5.87507 16.8166 6.71675 16.4 7.14175L14.9333 8.43341C14.6583 8.36674 14.3666 8.33342 14.0666 8.33342C11.8833 8.33342 10.1083 10.1084 10.1083 12.2917C10.1083 13.0334 10.3166 13.7334 10.6833 14.3334C10.9916 14.8501 11.4166 15.2917 11.9333 15.6084V15.8918C11.9333 16.4001 11.6 17.0751 11.175 17.3251L9.99997 18.0834C8.9083 18.7584 7.39163 18.0001 7.39163 16.6501V12.1918C7.39163 11.6001 7.04997 10.8418 6.71663 10.4251L3.51663 7.05839C3.09997 6.63339 2.7583 5.87509 2.7583 5.37509V3.43341C2.7583 2.42508 3.51663 1.66675 4.44163 1.66675H15.5583C16.4833 1.66675 17.2416 2.4251 17.2416 3.3501Z" stroke="#92929D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="text">فیلتر های اعمال شده</span>
                        </h4>

                        <div class="show-filter">
                            <div class="button">
                                <span class="cancel"> فیلترها</span>
                            </div>
                        </div>
                        <ul>
                            @foreach(request('la',[]) as $lan)
                            @php($lang=\App\Models\Language::find($lan))
                            <li class="{{$lang->en}}">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text"> {{$lang->name}}</span>
                            </li>
                            @endforeach
                            @if(request('sex')=='male')
                            <li class="male">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">جنسیت: آقا</span>
                            </li>
                            @endif
                            @if(request('sex')=='female')
                            <li class="male">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">جنسیت: خانم</span>
                            </li>
                            @endif
                            @if(request('sex')=='both')
                            <li class="male">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">جنسیت: هردو </span>
                            </li>
                            @endif

                            @if(request('teachlevel')=='Starter')
                            <li class="Starter">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">سطح: Starter </span>
                            </li>
                            @endif
                            @if(request('teachlevel')=='Elementary')
                            <li class="Elementary">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">سطح: Elementary </span>
                            </li>
                            @endif
                            @if(request('teachlevel')=='Intermediate')
                            <li class="Intermediate">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">سطح: intermediate </span>
                            </li>
                            @endif
                            @if(request('teachlevel')=='Upper_intermediate')
                            <li class="Upperintermediate">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">سطح: Upper Intermediate </span>
                            </li>
                            @endif
                            @if(request('teachlevel')=='Advanced')
                            <li class="Advanced">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">سطح: Advanced </span>
                            </li>
                            @endif
                            @if(request('teachlevel')=='mastery')
                            <li class="mastery">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">سطح: Mastery </span>
                            </li>
                            @endif

                            @if(request('TOEFL')=='TOEFL')
                            <li class="mastery">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">تخصص: Toefl </span>
                            </li>
                            @endif

                            @if(request('IELTS')=='IELTS')
                            <li class="IELTS">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">تخصص: Ielts </span>
                            </li>
                            @endif

                            @if(request('PTE')=='PTE')
                            <li class="PTE">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">تخصص: PTE </span>
                            </li>
                            @endif
                            @if(request('native')=='native')
                            <li class="native">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">بومی </span>
                            </li>
                            @endif
                            @if(request('freeclass')=='freeclass')
                            <li class="freeclass">
                                <span class="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="10" height="10" viewBox="0 0 24 24" stroke-width="3" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="text">جلسه آزمایشی رایگان </span>
                            </li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Filter -->


<!-- Start Search And Ordering -->
<div id="search-ordering" class="rows">
    <div class="container">
        <div class="search-ordering">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <form action="{{route('home.teacher.list')}}" method="get" class="search">
                        @csrf
                        @method('get')
                        <input type="text" value="{{request('tname')}}" name="tname" placeholder="جستجو بر اساس نام یا کلمه کلیدی ...">
                        <button>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.58341 17.5001C13.9557 17.5001 17.5001 13.9557 17.5001 9.58341C17.5001 5.21116 13.9557 1.66675 9.58341 1.66675C5.21116 1.66675 1.66675 5.21116 1.66675 9.58341C1.66675 13.9557 5.21116 17.5001 9.58341 17.5001Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.4" d="M18.3334 18.3334L16.6667 16.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div class="button">
                            <button class=" send" style="left: 10px; right: unset; background: #bdbfbe; color: #fff">
                                جستوجو
                            </button>
                        </div>


                    </form>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div>
                        <div class="ordering">
                            <h4>
                                {{-- <span class="icon">--}}
                                {{-- <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                {{-- <path d="M7.77333 12.9939L10.731 12.9939V11.6639L7.77333 11.6639V12.9939ZM2.59741 4.9939V6.3279L15.9069 6.3279V4.9939L2.59741 4.9939ZM4.81455 9.6629L13.6831 9.6629V8.3289L4.81455 8.3289V9.6629Z" fill="#5E57BA"/>--}}
                                {{-- </svg>--}}
                                {{-- </span>--}}
                                {{-- <span class="val">مرتب سازی :</span>--}}
                            </h4>
                            <form action="">
                                <ul>

                                    <li onclick="window.location.href='{{request()->fullUrlWithQuery(['most'=>'all'])}}'">
                                        <div class="label-container">
                                            <input {{(request('most')=='all')?'checked':''}} type="radio" name="most" id="all" value="all" checked="">
                                            <label for="all">همه</label>
                                        </div>
                                    </li>
                                    <li onclick="window.location.href='{{request()->fullUrlWithQuery(['most'=>'cheap'])}}'">
                                        <div class="label-container">
                                            <input {{(request('most')=='cheap')?'checked':''}} type="radio" name="most" id="cheap" value="cheap">
                                            <label for="cheap">ارزان ترین</label>
                                        </div>
                                    </li>
                                    <li onclick="window.location.href='{{request()->fullUrlWithQuery(['most'=>'expensive'])}}'">
                                        <div class="label-container">
                                            <input {{(request('most')=='expensive')?'checked':''}} type="radio" name="most" id="expensive" value="expensive">
                                            <label for="expensive">گران ترین</label>
                                        </div>
                                    </li>

                                    <li onclick="window.location.href='{{request()->fullUrlWithQuery(['most'=>'popular'])}}'">
                                        <div class="label-container">
                                            <input {{(request('most')=='popular')?'checked':''}} type="radio" name="most" id="popular" value="popular">
                                            <label for="popular">محبوب</label>
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
</div>
<!-- End Search And Ordering -->



{{-- <!-- Start Call To Action -->--}}
{{-- <div id="calltoaction" class="rows">--}}
{{-- <div class="container">--}}
{{-- <div class="calltoaction">--}}
{{-- <div class="right">--}}
{{-- <div class="img">--}}
{{-- <img src="/home/images/gold.png" alt="">--}}
{{-- </div>--}}
{{-- <div class="info">--}}
{{-- <h3>این یک فرصت #طلایی است</h3>--}}
{{-- <p>از ۲۱ مه تا ۲۱ ژوئن با ۲۰ درصد تخفیف در ثبت نام کلاس های آنلاین زبان تخفیف دریافت کنید.</p>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="left">--}}
{{-- <a href="#" class="more">--}}
{{-- <span class="text">جزئیات بیشتر</span>--}}
{{-- <span class="icon">--}}
{{-- <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <path d="M2.71502 4.93595L6.36502 8.12296C6.44283 8.18654 6.50554 8.26663 6.5486 8.35743C6.59166 8.44823 6.614 8.54746 6.614 8.64795C6.614 8.74845 6.59166 8.84768 6.5486 8.93848C6.50554 9.02928 6.44283 9.10937 6.36502 9.17296C6.19652 9.31318 5.98423 9.38995 5.76502 9.38995C5.54581 9.38995 5.33352 9.31318 5.16502 9.17296L0.914018 5.46096C0.836204 5.39737 0.773499 5.31728 0.730438 5.22648C0.687378 5.13568 0.665039 5.03645 0.665039 4.93596C0.665039 4.83546 0.687378 4.73623 0.730438 4.64543C0.773499 4.55463 0.836204 4.47454 0.914018 4.41095L5.16502 0.697955C5.33352 0.557734 5.54581 0.480957 5.76502 0.480957C5.98423 0.480957 6.19652 0.557734 6.36502 0.697955C6.44283 0.761543 6.50554 0.841633 6.5486 0.932431C6.59166 1.02323 6.614 1.12246 6.614 1.22295C6.614 1.32345 6.59166 1.42268 6.5486 1.51348C6.50554 1.60428 6.44283 1.68437 6.36502 1.74795L2.71502 4.93595Z" fill="white"/>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <!-- End Call To Action -->--}}



<!-- Start Teacher List -->
<div id="teacher-list" class="rows">
    <div class="container">


        <!-- Start Single Teacher -->
        <?php
        function searchForId($id, $array) {
              foreach ($array as $key => $val) {
                  if ($val['name'] === $id) {
                      return $val['value'];
                  }
              }
              return null;
              }
              // searchForId('avatar', $ar)
      ?>
        @foreach($teachers as $teacher)
        @if($teacher->languages()->count()==0)
        @continue

        @endif
        <?php
        $attr_list=$teacher->attributes()->get()->toArray();
        ?>


        <div class="single-teacher">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div>
                        <div class="teacher-info">
                            <div class="avatar">
                                <div class="img">
                                    <span class="online"></span>
                                    <img src="{{asset('/src/avatar/'.searchForId('avatar', $attr_list))}}" alt="{{$teacher->name}}">
                                </div>
                                <div class="name">
                                    <h4>
                                        <a href="{{route('home.teacher.profile',$teacher->id)}}"> {{$teacher->name}}
                                        </a>

                                        <span class="dish">
                                            <span class="star">
                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.77333 11.3334L5.63877 13.1374C5.25588 13.3578 4.79625 13.0096 4.90465 12.5814L5.7453 9.26008L3.02716 7.06606C2.67471 6.78156 2.85191 6.21251 3.30357 6.17841L6.90204 5.90675L8.3159 2.7032C8.49133 2.30571 9.05533 2.30571 9.23076 2.7032L10.6446 5.90675L14.2436 6.17841C14.6953 6.21251 14.8725 6.78161 14.52 7.06609L11.8014 9.26008L12.642 12.5814C12.7504 13.0096 12.2908 13.3578 11.9079 13.1374L8.77333 11.3334Z" fill="white" />
                                                </svg>
                                                {{$teacher->score()['av']}}

                                            </span>
                                            از
                                            {{$teacher->active_comments()->count()}}
                                            رای
                                        </span>
                                    </h4>
                                </div>
                                <div class="rate dishb">
                                    <span class="title">سطوح تدریس :</span>
                                    <span class="val"><b>
                                            {{searchForId('Starter', $attr_list)=='on'?'(Starter)':''}}
                                            {{searchForId('Elementary', $attr_list)=='on'?'(Elementary)':''}}
                                            {{searchForId('Intermediate', $attr_list)=='on'?'(Intermediate)':''}}
                                            {{searchForId('Upper_intermediate', $attr_list)=='on'?'(Upper intermediate) ':''}}
                                            {{searchForId('Advanced', $attr_list)=='on'?'(Advanced)':''}}
                                            {{searchForId('Mastery', $attr_list)=='on'?'(Mastery)':''}}
                                        </b></span>
                                </div>
                                <div class="rate disnw">
                                    <span class="rate">
                                        <span class="star">
                                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.77333 11.3334L5.63877 13.1374C5.25588 13.3578 4.79625 13.0096 4.90465 12.5814L5.7453 9.26008L3.02716 7.06606C2.67471 6.78156 2.85191 6.21251 3.30357 6.17841L6.90204 5.90675L8.3159 2.7032C8.49133 2.30571 9.05533 2.30571 9.23076 2.7032L10.6446 5.90675L14.2436 6.17841C14.6953 6.21251 14.8725 6.78161 14.52 7.06609L11.8014 9.26008L12.642 12.5814C12.7504 13.0096 12.2908 13.3578 11.9079 13.1374L8.77333 11.3334Z" fill="white" />
                                            </svg>
                                        </span>
                                        <span class="num">
                                            {{$teacher->score()['av']}}
                                        </span>
                                    </span>
                                </div>
                                <div class="stat disnw">
                                    ({{$teacher->active_comments()->count()}}) نظرات دانشجویان
                                </div>
                            </div>

                            <div class="lang-expers">
                                <div class="langs-list">
                                    <ul>
                                        @foreach($teacher->languages()->get() as $lang )
                                        <li>
                                            <span class="lang">
                                                <span class="nat"> {{$lang->pivot->level}}</span>
                                                <span class="flag">
                                                    <img src="{{asset('/src/img/lang/'.$lang->img)}}" alt="">
                                                </span>
                                                <span class="title"> {{$lang->name}}</span>
                                            </span>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>

                                <div class="options disnw">
                                    <ul>
                                        <li>
                                            <span class="title">سطوح تدریس :</span>
                                            <span class="val"><b>
                                                    {{searchForId('Starter', $attr_list)=='on'?'(Starter)':''}}
                                                    {{searchForId('Elementary', $attr_list)=='on'?'(Elementary)':''}}
                                                    {{searchForId('Intermediate', $attr_list)=='on'?'(Intermediate)':''}}
                                                    {{searchForId('Upper_intermediate', $attr_list)=='on'?'(Upper intermediate) ':''}}
                                                    {{searchForId('Advanced', $attr_list)=='on'?'(Advanced)':''}}
                                                    {{searchForId('Mastery', $attr_list)=='on'?'(Mastery)':''}}
                                                </b></span>
                                        </li>
                                        <li>
                                            <span class="title">لهجه :</span>
                                            <span class="val">
                                                {{searchForId('American_Accent', $attr_list)=='on'?'(American Accent)':''}}
                                                {{searchForId('British_Accent', $attr_list)=='on'?'(British Accent)':''}}
                                                {{searchForId('Australian_Accent', $attr_list)=='on'?'(Australian Accent)':''}}
                                                {{searchForId('Indian_Accent', $attr_list)=='on'?'(Indian Accent)':''}}

                                                {{searchForId('Irish_Accent', $attr_list)=='on'?'(Irish Accent)':''}}
                                                {{searchForId('Scottish_Accent', $attr_list)=='on'?'(Scottish Accent)':''}}
                                                {{searchForId('South_African_Accent', $attr_list)=='on'?'(South African Accent) ':''}}

                                            </span>
                                        </li>
                                        <li>
                                            <span class="title">زبان آموزان :</span>
                                            <span class="val"> نفر
                                                {{$teacher->students()}}
                                            </span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="buttons">
                                    <ul>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                        @if(auth()->user()->level=='student')
                                        <form id="form_save_{{$teacher->id}}" action="{{route('student.fave.teachers',$teacher->id)}}" method="post">
                                            @csrf
                                            @method('post')
                                            <input type="text" hidden name="teacher" value="{{$teacher->id}}">
                                            <li>
                                                <button>
                                                    <svg style="fill: {{(auth()->user()->has_fave($teacher->id))?'red':''}}" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.95374 16.3417C9.66672 16.4417 9.19398 16.4417 8.90696 16.3417C6.45887 15.5167 0.988647 12.075 0.988647 6.24171C0.988647 3.66671 3.09063 1.58337 5.68223 1.58337C7.21862 1.58337 8.57774 2.31671 9.43035 3.45004C10.283 2.31671 11.6505 1.58337 13.1785 1.58337C15.7701 1.58337 17.8721 3.66671 17.8721 6.24171C17.8721 12.075 12.4018 15.5167 9.95374 16.3417Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </form>


                                        @endif
                                        @endif


                                        {{-- <li>--}}
                                        {{-- <button>--}}
                                        {{-- <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{-- <path d="M12.5725 3.59178V13.0585C12.5725 14.2668 11.6946 14.7751 10.6225 14.1918L7.30492 12.3668C6.95037 12.1751 6.37631 12.1751 6.02176 12.3668L2.70418 14.1918C1.63209 14.7751 0.75415 14.2668 0.75415 13.0585V3.59178C0.75415 2.16678 1.93598 1.00012 3.37951 1.00012H9.94717C11.3907 1.00012 12.5725 2.16678 12.5725 3.59178Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                        {{-- </svg>--}}
                                        {{-- </button>--}}
                                        {{-- </li>--}}
                                        {{-- <li>--}}
                                        {{-- <button>--}}
                                        {{-- <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{-- <path d="M6.31771 7C6.24927 6.99324 6.16713 6.99324 6.09184 7C4.46282 6.94588 3.16919 5.62683 3.16919 4.00338C3.16919 2.34611 4.52442 1 6.2082 1C7.88513 1 9.24721 2.34611 9.24721 4.00338C9.24037 5.62683 7.94673 6.94588 6.31771 7Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                        {{-- <path d="M11.3457 3C12.4285 3 13.2992 3.89714 13.2992 5C13.2992 6.08 12.462 6.96 11.4183 7C11.3737 6.99429 11.3234 6.99429 11.2732 7" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                        {{-- <path d="M2.49102 9.95506C0.69375 11.0823 0.69375 12.9194 2.49102 14.0397C4.53336 15.3201 7.88281 15.3201 9.92516 14.0397C11.7224 12.9124 11.7224 11.0754 9.92516 9.95506C7.89024 8.68165 4.54079 8.68165 2.49102 9.95506Z" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                        {{-- <path d="M12.2861 13C12.7522 12.925 13.1923 12.78 13.5548 12.565C14.5646 11.98 14.5646 11.015 13.5548 10.43C13.1988 10.22 12.7651 10.08 12.3056 10" stroke="#92929D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
                                        {{-- </svg>--}}

                                        {{-- </button>--}}
                                        {{-- </li>--}}
                                    </ul>

                                    <div class="trial">
                                        <span class="title">جلسه آزمایشی :</span>
                                        <span class="val"> {{__('arr.'.searchForId('freeclass', $attr_list))}}</span>
                                    </div>
                                    <div class="trial" style="float: right">
                                        <span class="title"> یک ساعت :</span>
                                        <span class="val"> {{number_format($teacher->com_price($teacher->meet1))}}
                                            تومان
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <div class="price-button">
                                <div class="price disnw">
                                    <span class="title">هزینه هر جلسه</span>
                                    <span class="session">یک ساعته</span>
                                    <div class="price-number">
                                        <span class="num">{{number_format($teacher->com_price($teacher->meet1))}} </span>
                                        <span class="tom">تومان</span>
                                    </div>
                                </div>
                                <div class="dishb">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                                <a href="{{route('home.teacher.profile',$teacher->id)}}" class="reserv btnr ">پروفایل</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <a data-id="{{$teacher->id}}" class="reserv classtut btnr pointer"> مشاهده
                                                    &nbsp
                                                    ویدئو</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('home.teacher.profile',$teacher->id)}}#teacher-scadule" class="reserv">رزرو کلاس</a>

                                <div class="popup popupc" id="classtut_pop_{{$teacher->id}}">
                                    <div>
                                        <div>
                                            <div>
                                                <div class="popup-container user-set-pop">
                                                    <span class="close">
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor" />
                                                        </svg>
                                                    </span>

                                                    <div class="video">
                                                        <video id="player" class="js-player" playsinline controls data-poster="{{asset('/src/port_img/'.searchForId('port_img', $attr_list))}}">
                                                            <source src="{{asset('/src/port_vid/'.searchForId('port_vid', $attr_list))}}" type="video/mp4" />
                                                        </video>

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
                <div class="col-lg-4 col-md-12">
                    <div>
                        <div class="teacher-tabs disnw">
                            <div class="tab-nav">
                                <ul>
                                    <li class="active"><span>ویدیو</span></li>
                                    {{-- <li><span>تقویم</span></li> --}}
                                    <li><span>درباره</span></li>
                                </ul>
                            </div>
                            <div class="tab-container">
                                <ul>
                                    <li class="active">
                                        <div>
                                            <video id="player" class="js-player" playsinline controls data-poster="{{asset('/src/port_img/'.searchForId('port_img', $attr_list))}}">
                                                <source src="{{asset('/src/port_vid/'.searchForId('port_vid', $attr_list))}}" type="video/mp4" />

                                            </video>

                                        </div>
                                    </li>
                                    {{-- <li>
                                        <div>
                                            <div class="calendar">

                                                <div class="hours">
                                                    <ul>

                                                        <li>
                                                            <span>۰۴ - ۰۸</span>
                                                        </li>
                                                        <li>
                                                            <span>۰۸ - ۱۲</span>
                                                        </li>
                                                        <li>
                                                            <span>۱۲ - ۱۶</span>
                                                        </li>
                                                        <li>
                                                            <span>۱۶ - ۲۰</span>
                                                        </li>
                                                        <li>
                                                            <span>۲۰ - ۲۴</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="week">
                                                    @for($i=0;$i<5;$i++) @php($count=$teacher->calendar($i)['count'][$i])
                                                        @php($day=$teacher->calendar($i)['day'][$i])
                                                        <div class="days">

                                                            @for($b=0;$b<7;$b++) @php($count_unit=$count[$b]) <span class="day {{$count_unit>0?'green':''}}">
                                                                <span class="title"></span>
                                                                @if($count_unit>0)
                                                                <span class="tooltip">
                                                                    <b>{{$count_unit/2}}
                                                                        ساعت /</b>
                                                                    {{$day[$b]}}
                                                                </span>
                                                                @endif
                                                                </span>
                                                                @endfor
                                                        </div>
                                                        @endfor

                                                </div>

                                                <a class="more" href="{{route('home.teacher.profile',$teacher->id)}}">
                                                    <span class="icon">
                                                        <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.95398 4.04812L0.414978 1.82612C0.360802 1.78185 0.317144 1.72609 0.287164 1.66288C0.257184 1.59967 0.241631 1.53058 0.241631 1.46062C0.241631 1.39066 0.257184 1.32157 0.287164 1.25836C0.317144 1.19514 0.360802 1.13939 0.414978 1.09512C0.532326 0.997345 0.680235 0.943801 0.832978 0.943801C0.98572 0.943801 1.13363 0.997345 1.25098 1.09512L4.20898 3.68012C4.26315 3.72439 4.30681 3.78014 4.33679 3.84336C4.36677 3.90657 4.38232 3.97566 4.38232 4.04562C4.38232 4.11558 4.36677 4.18467 4.33679 4.24788C4.30681 4.31109 4.26315 4.36685 4.20898 4.41112L1.25198 6.99712C1.13463 7.09489 0.98672 7.14844 0.833977 7.14844C0.681235 7.14844 0.533325 7.09489 0.415977 6.99712C0.361802 6.95285 0.318144 6.89709 0.288164 6.83388C0.258183 6.77067 0.242631 6.70158 0.242631 6.63162C0.242631 6.56166 0.258183 6.49257 0.288164 6.42936C0.318144 6.36615 0.361802 6.31039 0.415977 6.26612L2.95398 4.04812Z" fill="white" />
                                                        </svg>

                                                    </span>
                                                    <span class="title">مشاهده بیشتر</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li> --}}
                                    <li>
                                        <div>
                                            <div class="about">
                                                <div>
                                                    <p style="text-align: justify">
                                                        {{ \Illuminate\Support\Str::limit($teacher-> bio, 150, $end='...') }}


                                                        <a href="{{route('home.teacher.profile',$teacher->id)}}"> خواندن ادامه <i class="icon-left"></i><i class="icon-left"></i></a>

                                                    </p>


                                                </div>
                                                <a href="{{route('home.teacher.profile',$teacher->id)}}" class="more">
                                                    <span class="icon">
                                                        <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.95398 4.04812L0.414978 1.82612C0.360802 1.78185 0.317144 1.72609 0.287164 1.66288C0.257184 1.59967 0.241631 1.53058 0.241631 1.46062C0.241631 1.39066 0.257184 1.32157 0.287164 1.25836C0.317144 1.19514 0.360802 1.13939 0.414978 1.09512C0.532326 0.997345 0.680235 0.943801 0.832978 0.943801C0.98572 0.943801 1.13363 0.997345 1.25098 1.09512L4.20898 3.68012C4.26315 3.72439 4.30681 3.78014 4.33679 3.84336C4.36677 3.90657 4.38232 3.97566 4.38232 4.04562C4.38232 4.11558 4.36677 4.18467 4.33679 4.24788C4.30681 4.31109 4.26315 4.36685 4.20898 4.41112L1.25198 6.99712C1.13463 7.09489 0.98672 7.14844 0.833977 7.14844C0.681235 7.14844 0.533325 7.09489 0.415977 6.99712C0.361802 6.95285 0.318144 6.89709 0.288164 6.83388C0.258183 6.77067 0.242631 6.70158 0.242631 6.63162C0.242631 6.56166 0.258183 6.49257 0.288164 6.42936C0.318144 6.36615 0.361802 6.31039 0.415977 6.26612L2.95398 4.04812Z" fill="white" />
                                                        </svg>

                                                    </span>
                                                    <span class="title">مشاهده بیشتر</span>
                                                </a>
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

        <!-- End Single Teacher -->
        @endforeach
        {{ $teachers ->appends(Request::all())->links('home.section.pagination') }}




    </div>
</div>
<!-- End Teacher List -->






@endsection
