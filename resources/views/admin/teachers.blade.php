@component('admin.section.content',['title'=>'لیست مدرس ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  مدرس ها</li>
    @endslot
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست مدرس ها</h3>
{{--                           <div class="card-tools">--}}
{{--                               <div class="btn-group-sm ml-5">--}}
{{--                               </div>--}}
{{--                           </div>--}}
                            <div class="card-tools">

                                <form action="{{route('admin.teachers')}}" method="get" autocomplete="off">
                                    @csrf
                                    @method('get')
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="from">
                                                از تاریخ
                                            </label>
                                            <input type="text" hidden="" name="filter" value="1"  placeholder="از تاریخ" style="">
                                            <input type="text" name="from" id="from" value="{{request('from')}}" class="persian3  persian2" placeholder="از تاریخ">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="to">
                                                تا تاریخ
                                            </label>
                                            <input type="text" name="to" id="to" value="{{request('to')}}" class="persian3  persian2" placeholder="تا تاریخ">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">نوع مراحل</label>

                                            <select name="attr" id="">
                                                <option value="" >همه موارد</option>
                                                <option {{request('attr')=='price_plan'?'selected':''}} value="price_plan" >   تعیین قیمت جلسات </option>
                                                <option {{request('attr')=='port'?'selected':''}} value="port" >   آپلود ویدیو    </option>
                                                <option {{request('attr')=='save_lang'?'selected':''}} value="save_lang" >     انتخاب زبان    </option>
                                                <option {{request('attr')=='save_expert'?'selected':''}} value="save_expert" >    تکمیل     توانایی ها    </option>
                                                <option {{request('attr')=='time_plan'?'selected':''}} value="time_plan" >   تعیین برنامه زمانی    </option>
                                                <option {{request('attr')=='profile_plan'?'selected':''}} value="profile_plan" >      آپلود تصویر پروفایل  </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">    وضعیت نهایی</label>
                                            <select name="active" id="">
                                                <option value="" >همه موارد</option>
                                                <option {{request('active')=='1'?'selected':''}} value="1" >فعال</option>
                                                <option {{request('active')=='0'?'selected':''}} value="0" >غیر فعال</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder="جستجو">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                <input type="submit" name="excel" class="btn btn-default" value="excel">
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>


                                <br>

                                </form>

                                <a class="btn btn-info" href="{{route('admin.teachers',['show'=>'cash'])}}">  با موجودی</a>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>موبایل</th>

                                    <th> تعیین قیمت  </th>
                                    <th>  آپلود ویدیو  </th>
                                    <th> انتخاب زبان  </th>
                                    <th>توانایی </th>
                                    <th> برنامه زمانی  </th>
                                    <th>  تصویر پروفایل </th>
                                    <th>وضعیت</th>
                                    <th>موجودی</th>
                                    <th>عملکرد</th>
                                </tr>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->mobile}}</td>
                                        <td>
                                            <small class="badge badge-{{$teacher->attr('price_plan')?'success':'danger'}} ">  تعیین قیمت جلسات  </small>

                                        </td>
                                        <td>
                                            <small class="badge badge-{{$teacher->attr('port_vid')?'success':'danger'}} ">    آپلود ویدیو    </small>

                                        </td>
                                        <td>
                                            <small class="badge badge-{{$teacher->attr('save_lang')?'success':'danger'}} ">      انتخاب زبان    </small>

                                        </td>
                                        <td>
                                            <small class="badge badge-{{$teacher->attr('save_expert')?'success':'danger'}} ">      تکمیل     توانایی ها  </small>

                                        </td>
                                        <td>
                                            <small class="badge badge-{{$teacher->attr('time_plan')?'success':'danger'}} ">      تعیین برنامه زمانی  </small>

                                        </td>
                                        <td>
                                            <small class="badge badge-{{$teacher->attr('profile_plan')?'success':'danger'}} ">          آپلود تصویر پروفایل  </small>

                                        </td>
                                        <td>
                                            <span class="badge  badge-{{($teacher->active==1)?'success':'danger'}} ">{{($teacher->active==1)?'فعال':'غیر فعال'}}</span>
                                       </td>
                                        <td>
                                            {{number_format($teacher->cash)}}
                                            تومان
                                        </td>
                                        <td>
                                            <a href="{{route('admin.teacher.edit',$teacher->id)}}" class="btn btn-primary">edit</a>
                                            @if($teacher->cash>0)
                                                <a href="{{route('admin.teacher.pay',$teacher->id)}}" class="btn btn-success">ثبت پرداخت</a>
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="col-md-12">

            {{ $teachers->appends(Request::all())->links('home.section.pagination2') }}

        </div>
    </div>



@endcomponent

