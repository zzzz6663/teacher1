@component('home.teacher.content',['title'=>' تنظیمات '])
<div class="popup not-fixeds">
    <div class="popup-container user-set-pop">
        {{-- disbm --}}
        <div class="user-set-pop-content disbm">
            <ul class="tabv">
                <li class="tabv active">
                    <div class="user-set-pop-content" style="margin-right: 0">
                        <div class="form">
                            @if($errors->any())
                            <div class="e_section" id="e_section">
                                {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                            </div>
                        @endif
                            <form class="mwidth pt0" action="{{route('teacher.save.expert',$user->id)}}" method="post" id="teacher_ab_form">
                                @csrf
                                @method('post')


                                <div class="expert-form">


                                    <div class="expert-section">
                                        <h4>سطوح تدریس</h4>
                                        <div class="forsm">
                                            <div class="ra row">

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Starter">
                                                            <input type="checkbox" {{($user->attr('Starter'))?'checked':''}} id="Starter" name="Starter">
                                                            <label class="key" for="Starter">

                                                                <div class="right">
                                                                    <span> Starter</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>

                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Elementary">
                                                            <input type="checkbox" {{($user->attr('Elementary'))?'checked':''}} id="Elementary" name="Elementary">
                                                            <label class="key" for="Elementary">

                                                                <div class="right">
                                                                    <span> Elementary</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Intermediate">
                                                            <input type="checkbox" {{($user->attr('Intermediate'))?'checked':''}} id="Intermediate" name="Intermediate">
                                                            <label class="key" for="Intermediate">

                                                                <div class="right">
                                                                    <span> Intermediate</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Upper_intermediate">
                                                            <input type="checkbox" {{($user->attr('Upper_intermediate'))?'checked':''}} id="Upper_intermediate" name="Upper_intermediate">
                                                            <label class="key" for="Upper_intermediate">

                                                                <div class="right">
                                                                    <span> Upper intermediate</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Advanced">
                                                            <input type="checkbox" {{($user->attr('Advanced'))?'checked':''}} id="Advanced" name="Advanced">
                                                            <label class="key" for="Advanced">

                                                                <div class="right">
                                                                    <span> Advanced</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Mastery">
                                                            <input type="checkbox" {{($user->attr('Mastery'))?'checked':''}} id="Mastery" name="Mastery">
                                                            <label class="key" for="Mastery">

                                                                <div class="right">
                                                                    <span> Mastery</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="expert-section">
                                        <h4>لهجه مدرس</h4>
                                        <div class="forsm">
                                            <div class="ra row">
                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="American_Accent">
                                                            <input type="checkbox" {{($user->attr('American_Accent'))?'checked':''}} id="American_Accent" name="American_Accent">
                                                            <label class="key" for="American_Accent">

                                                                <div class="right">
                                                                    <span> American Accent</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="British_Accent">
                                                            <input type="checkbox" {{($user->attr('British_Accent'))?'checked':''}} id="British_Accent" name="British_Accent">
                                                            <label class="key" for="British_Accent">

                                                                <div class="right">
                                                                    <span> British Accent</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Australian_Accent">
                                                            <input type="checkbox" {{($user->attr('Australian_Accent'))?'checked':''}} id="Australian_Accent" name="Australian_Accent">
                                                            <label class="key" for="Australian_Accent">

                                                                <div class="right">
                                                                    <span> Australian Accent</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Indian_Accent">
                                                            <input type="checkbox" {{($user->attr('Indian_Accent'))?'checked':''}} id="Indian_Accent" name="Indian_Accent">
                                                            <label class="key" for="Indian_Accent">

                                                                <div class="right">
                                                                    <span> Indian Accent</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Irish_Accent">
                                                            <input type="checkbox" {{($user->attr('Irish_Accent'))?'checked':''}} id="Irish_Accent" name="Irish_Accent">
                                                            <label class="key" for="Irish_Accent">

                                                                <div class="right">
                                                                    <span> Irish Accent</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Scottish_Accent">
                                                            <input type="checkbox" {{($user->attr('Scottish_Accent'))?'checked':''}} id="Scottish_Accent" name="Scottish_Accent">
                                                            <label class="key" for="Scottish_Accent">

                                                                <div class="right">
                                                                    <span> Scottish Accent</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="South_African_Accent">
                                                            <input type="checkbox" {{($user->attr('South_African_Accent'))?'checked':''}} id="South_African_Accent" name="South_African_Accent">
                                                            <label class="key" for="South_African_Accent">

                                                                <div class="right">
                                                                    <span> South African Accent</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="expert-section">
                                        <h4>سن</h4>
                                        <div class="forsm">
                                            <div class="ra row">
                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Children_">
                                                            <input type="checkbox" {{($user->attr('Children'))?'checked':''}} id="Children_(4-11)" name="Children">
                                                            <label class="key" for="Children_(4-11)">

                                                                <div class="right">
                                                                    <span> Children (4-11)</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Teenagers_">
                                                            <input type="checkbox" {{($user->attr('Teenagers'))?'checked':''}} id="Teenagers_(12-18)" name="Teenagers">
                                                            <label class="key" for="Teenagers_(12-18)">

                                                                <div class="right">
                                                                    <span> Teenagers (12-18)</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Adults_">
                                                            <input type="checkbox" {{($user->attr('Adults'))?'checked':''}} id="Adults_(18+)" name="Adults">
                                                            <label class="key" for="Adults_(18+)">

                                                                <div class="right">
                                                                    <span> Adults (18+)</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="expert-section">
                                        <h4>کلاس شامل چه مواردی میشود</h4>
                                        <div class="forsm">
                                            <div class="ra row">
                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Curriculum">
                                                            <input type="checkbox" {{($user->attr('Curriculum'))?'checked':''}} id="Curriculum" name="Curriculum">
                                                            <label class="key" for="Curriculum">

                                                                <div class="right">
                                                                    <span> Curriculum</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Homework">
                                                            <input type="checkbox" {{($user->attr('Homework'))?'checked':''}} id="Homework" name="Homework">
                                                            <label class="key" for="Homework">

                                                                <div class="right">
                                                                    <span> Homework</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Learning_Materials">
                                                            <input type="checkbox" {{($user->attr('Learning_Materials'))?'checked':''}} id="Learning_Materials" name="Learning_Materials">
                                                            <label class="key" for="Learning_Materials">

                                                                <div class="right">
                                                                    <span> Learning Materials</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Writing_Exercises">
                                                            <input type="checkbox" {{($user->attr('Writing_Exercises'))?'checked':''}} id="Writing_Exercises" name="Writing_Exercises">
                                                            <label class="key" for="Writing_Exercises">

                                                                <div class="right">
                                                                    <span> Writing Exercises</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Lesson_Plans">
                                                            <input type="checkbox" {{($user->attr('Lesson_Plans'))?'checked':''}} id="Lesson_Plans" name="Lesson_Plans">
                                                            <label class="key" for="Lesson_Plans">

                                                                <div class="right">
                                                                    <span> Lesson Plans</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Proficiency_Assessment">
                                                            <input type="checkbox" {{($user->attr('Proficiency_Assessment'))?'checked':''}} id="Proficiency_Assessment" name="Proficiency_Assessment">
                                                            <label class="key" for="Proficiency_Assessment">

                                                                <div class="right">
                                                                    <span> Proficiency Assessment</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Quizzes_Tests">
                                                            <input type="checkbox" {{($user->attr('Quizzes_Tests'))?'checked':''}} id="Quizzes_Tests" name="Quizzes_Tests">
                                                            <label class="key" for="Quizzes_Tests">

                                                                <div class="right">
                                                                    <span> Quizzes Tests</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Reading_Exercises">
                                                            <input type="checkbox" {{($user->attr('Reading_Exercises'))?'checked':''}} id="Reading_Exercises" name="Reading_Exercises">
                                                            <label class="key" for="Reading_Exercises">

                                                                <div class="right">
                                                                    <span> Reading Exercises</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="expert-section">
                                        <h4>موضوعات</h4>
                                        <div class="forsm">
                                            <div class="ra row">
                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Business_English">
                                                            <input type="checkbox" {{($user->attr('Business_English'))?'checked':''}} id="Business_English" name="Business_English">
                                                            <label class="key" for="Business_English">

                                                                <div class="right">
                                                                    <span> Business English</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Interview_Preparation">
                                                            <input type="checkbox" {{($user->attr('Interview_Preparation'))?'checked':''}} id="Interview_Preparation" name="Interview_Preparation">
                                                            <label class="key" for="Interview_Preparation">

                                                                <div class="right">
                                                                    <span> Interview Preparation</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Reading_Comprehension">
                                                            <input type="checkbox" {{($user->attr('Reading_Comprehension'))?'checked':''}} id="Reading_Comprehension" name="Reading_Comprehension">
                                                            <label class="key" for="Reading_Comprehension">

                                                                <div class="right">
                                                                    <span> Reading Comprehension</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Listening_Comprehension">
                                                            <input type="checkbox" {{($user->attr('Listening_Comprehension'))?'checked':''}} id="Listening_Comprehension" name="Listening_Comprehension">
                                                            <label class="key" for="Listening_Comprehension">

                                                                <div class="right">
                                                                    <span> Listening Comprehension</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Speaking_Practice">
                                                            <input type="checkbox" {{($user->attr('Speaking_Practice'))?'checked':''}} id="Speaking_Practice" name="Speaking_Practice">
                                                            <label class="key" for="Speaking_Practice">

                                                                <div class="right">
                                                                    <span> Speaking Practice</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Writing_Correction">
                                                            <input type="checkbox" {{($user->attr('Writing_Correction'))?'checked':''}} id="Writing_Correction" name="Writing_Correction">
                                                            <label class="key" for="Writing_Correction">

                                                                <div class="right">
                                                                    <span> Writing Correction</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Vocabulary_Development">
                                                            <input type="checkbox" {{($user->attr('Vocabulary_Development'))?'checked':''}} id="Vocabulary_Development" name="Vocabulary_Development">
                                                            <label class="key" for="Vocabulary_Development">

                                                                <div class="right">
                                                                    <span> Vocabulary Development</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Grammar_Development">
                                                            <input type="checkbox" {{($user->attr('Grammar_Development'))?'checked':''}} id="Grammar_Development" name="Grammar_Development">
                                                            <label class="key" for="Grammar_Development">

                                                                <div class="right">
                                                                    <span> Grammar Development</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Academic_English">
                                                            <input type="checkbox" {{($user->attr('Academic_English'))?'checked':''}} id="Academic_English" name="Academic_English">
                                                            <label class="key" for="Academic_English">

                                                                <div class="right">
                                                                    <span> Academic English</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Accent_Reduction">
                                                            <input type="checkbox" {{($user->attr('Accent_Reduction'))?'checked':''}} id="Accent_Reduction" name="Accent_Reduction">
                                                            <label class="key" for="Accent_Reduction">

                                                                <div class="right">
                                                                    <span> Accent Reduction</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Phonetics">
                                                            <input type="checkbox" {{($user->attr('Phonetics'))?'checked':''}} id="Phonetics" name="Phonetics">
                                                            <label class="key" for="Phonetics">

                                                                <div class="right">
                                                                    <span> Phonetics</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Colloquial_English">
                                                            <input type="checkbox" {{($user->attr('Colloquial_English'))?'checked':''}} id="Colloquial_English" name="Colloquial_English">
                                                            <label class="key" for="Colloquial_English">

                                                                <div class="right">
                                                                    <span> Colloquial English</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-fx-6 col-md-12">
                                                    <div>
                                                        <div class="lable-container" style="line-height: 50px">
                                                            <input type="text" hidden name="Phonetics">
                                                            <input type="checkbox" {{($user->attr('Phonetics'))?'checked':''}} id="Phonetics" name="Phonetics">
                                                            <label class="key" for="Phonetics">

                                                                <div class="right">
                                                                    <span> Phonetics</span>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="toggle">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>






                                    <div class="expert-section">
                                        <h4>آمادگی برای آزمون</h4>
                                        <div class="forsm">
                                            <div class="ra ">
                                                <br>
                                                <br>
                                                <h3>انگلیسی:</h3>

                                                <div class="row">


                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="TOEFL">
                                                                <input type="checkbox" {{($user->attr('TOEFL'))?'checked':''}} id="TOEFL" name="TOEFL">
                                                                <label class="key" for="TOEFL">

                                                                    <div class="right">
                                                                        <span> TOEFL</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="IELTS">
                                                                <input type="checkbox" {{($user->attr('IELTS'))?'checked':''}} id="IELTS" name="IELTS">
                                                                <label class="key" for="IELTS">

                                                                    <div class="right">
                                                                        <span> IELTS</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="PTE">
                                                                <input type="checkbox" {{($user->attr('PTE'))?'checked':''}} id="PTE" name="PTE">
                                                                <label class="key" for="PTE">

                                                                    <div class="right">
                                                                        <span> PTE</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="GRE">
                                                                <input type="checkbox" {{($user->attr('GRE'))?'checked':''}} id="GRE" name="GRE">
                                                                <label class="key" for="GRE">

                                                                    <div class="right">
                                                                        <span> GRE</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="CELPIP">
                                                                <input type="checkbox" {{($user->attr('CELPIP'))?'checked':''}} id="CELPIP" name="CELPIP">
                                                                <label class="key" for="CELPIP">

                                                                    <div class="right">
                                                                        <span> CELPIP</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="Duolingo">
                                                                <input type="checkbox" {{($user->attr('Duolingo'))?'checked':''}} id="Duolingo" name="Duolingo">
                                                                <label class="key" for="Duolingo">

                                                                    <div class="right">
                                                                        <span> Duolingo</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="TOEIC">
                                                                <input type="checkbox" {{($user->attr('TOEIC'))?'checked':''}} id="TOEIC" name="TOEIC">
                                                                <label class="key" for="TOEIC">

                                                                    <div class="right">
                                                                        <span> TOEIC</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="KET">
                                                                <input type="checkbox" {{($user->attr('KET'))?'checked':''}} id="KET" name="KET">
                                                                <label class="key" for="KET">

                                                                    <div class="right">
                                                                        <span> KET</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="PET">
                                                                <input type="checkbox" {{($user->attr('PET'))?'checked':''}} id="PET" name="PET">
                                                                <label class="key" for="PET">

                                                                    <div class="right">
                                                                        <span> PET</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="CAE">
                                                                <input type="checkbox" {{($user->attr('CAE'))?'checked':''}} id="CAE" name="CAE">
                                                                <label class="key" for="CAE">

                                                                    <div class="right">
                                                                        <span> CAE</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="FCE">
                                                                <input type="checkbox" {{($user->attr('FCE'))?'checked':''}} id="FCE" name="FCE">
                                                                <label class="key" for="FCE">

                                                                    <div class="right">
                                                                        <span> FCE</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="CPE">
                                                                <input type="checkbox" {{($user->attr('CPE'))?'checked':''}} id="CPE" name="CPE">
                                                                <label class="key" for="CPE">

                                                                    <div class="right">
                                                                        <span> CPE</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="BEC">
                                                                <input type="checkbox" {{($user->attr('BEC'))?'checked':''}} id="BEC" name="BEC">
                                                                <label class="key" for="BEC">

                                                                    <div class="right">
                                                                        <span> BEC</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="TOEFLPhD">
                                                                <input type="checkbox" {{($user->attr('TOEFLPhD'))?'checked':''}} id="TOEFLPhD" name="TOEFLPhD">

                                                                {{-- <input type="checkbox" {{r($user->att(''checkedتافل_دکت)?:'ری')}} id="تافل_دکتری" name="تافل_دکتری">--}}
                                                                <label class="key" for="TOEFLPhD">

                                                                    <div class="right">
                                                                        <span> TOEFL PhD</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                </div>
                                                <div class="clr"></div>
                                                <h3>فرانسه:</h3>

                                                <div class="row">
                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="TCF">
                                                                <input type="checkbox" {{($user->attr('TCF'))?'checked':''}} id="TCF" name="TCF">
                                                                <label class="key" for="TCF">

                                                                    <div class="right">
                                                                        <span> TCF</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="TEF">
                                                                <input type="checkbox" {{($user->attr('TEF'))?'checked':''}} id="TEF" name="TEF">
                                                                <label class="key" for="TEF">

                                                                    <div class="right">
                                                                        <span> TEF</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="DELF">
                                                                <input type="checkbox" {{($user->attr('DELF'))?'checked':''}} id="DELF" name="DELF">
                                                                <label class="key" for="DELF">

                                                                    <div class="right">
                                                                        <span> DELF</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="DALF">
                                                                <input type="checkbox" {{($user->attr('DALF'))?'checked':''}} id="DALF" name="DALF">
                                                                <label class="key" for="DALF">

                                                                    <div class="right">
                                                                        <span> DALF</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                </div>
                                                <div class="clr"></div>

                                                <h3>آلمانی:</h3>

                                                <div class="row">
                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="Goethe">
                                                                <input type="checkbox" {{($user->attr('Goethe'))?'checked':''}} id="Goethe" name="Goethe">
                                                                <label class="key" for="Goethe">

                                                                    <div class="right">
                                                                        <span> Goethe</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="Telc">
                                                                <input type="checkbox" {{($user->attr('Telc'))?'checked':''}} id="Telc" name="Telc">
                                                                <label class="key" for="Telc">

                                                                    <div class="right">
                                                                        <span> Telc</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="Test_Daf">
                                                                <input type="checkbox" {{($user->attr('Test_Daf'))?'checked':''}} id="Test_Daf" name="Test_Daf">
                                                                <label class="key" for="Test_Daf">

                                                                    <div class="right">
                                                                        <span> Test Daf</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="OSD">
                                                                <input type="checkbox" {{($user->attr('OSD'))?'checked':''}} id="OSD" name="OSD">
                                                                <label class="key" for="OSD">

                                                                    <div class="right">
                                                                        <span> OSD</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                </div>
                                                <div class="clr"></div>

                                                <h3>ترکی استانبولی:</h3>

                                                <div class="row">
                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="TOMER">
                                                                <input type="checkbox" {{($user->attr('TOMER'))?'checked':''}} id="TOMER" name="TOMER">
                                                                <label class="key" for="TOMER">

                                                                    <div class="right">
                                                                        <span> TOMER</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="TYS">
                                                                <input type="checkbox" {{($user->attr('TYS'))?'checked':''}} id="TYS" name="TYS">
                                                                <label class="key" for="TYS">

                                                                    <div class="right">
                                                                        <span> TYS</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                </div>
                                                <div class="clr"></div>

                                                <h3>اسپانیایی:</h3>

                                                <div class="row">
                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="DELE">
                                                                <input type="checkbox" {{($user->attr('DELE'))?'checked':''}} id="DELE" name="DELE">
                                                                <label class="key" for="DELE">

                                                                    <div class="right">
                                                                        <span> DELE</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-fx-6 col-md-12">
                                                        <div>
                                                            <div class="lable-container" style="line-height: 50px">
                                                                <input type="text" hidden name="SIELE">
                                                                <input type="checkbox" {{($user->attr('SIELE'))?'checked':''}} id="SIELE" name="SIELE">
                                                                <label class="key" for="SIELE">

                                                                    <div class="right">
                                                                        <span> SIELE</span>
                                                                    </div>
                                                                    <div class="left">
                                                                        <div class="toggle">
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                </div>



                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>
                                                <div class="button">
                                                    <button class="send"> ذخیره</button>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="clr"></div>

                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</div>





@endcomponent
