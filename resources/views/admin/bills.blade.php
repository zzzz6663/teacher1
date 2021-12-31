@component('admin.section.content',['title'=>'لیست تراکنش ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست   تراکنش ها</li>
    @endslot
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header">
                                <h3 class="card-title">   لیست        تراکنش
                                </h3>
                                <br>
                                <form action="{{route('admin.bills')}}" method="get" autocomplete="off">
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
                                            <label for="">نوع تراکنش</label>
                                            <select name="type" id="">
                                                <option value="" >همه موارد</option>
                                                <option {{request('type')=='reserve_meet'?'selected':''}} value="reserve_meet" >رزرو  کلاس</option>
                                                <option {{request('type')=='deposit_teacher'?'selected':''}} value="deposit_teacher" >سهم مدرس</option>
                                                <option {{request('type')=='site_share'?'selected':''}} value="site_share" >سهم اموزشگاه</option>
                                                <option {{request('type')=='reserve_meet_by_charge'?'selected':''}} value="reserve_meet_by_charge" >رزرو  کلاس با شارژ</option>
                                                <option {{request('type')=='s_penalty_class'?'selected':''}} value="s_penalty_class" >  بیست درصد کنسلی کلاس     </option>
                                                <option {{request('type')=='s_penalty_class_remain'?'selected':''}} value="s_penalty_class_remain" >    باقیمانده    جریمه کنسلی کلاس    </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">  نتیجه تراکنش</label>
                                            <select name="status" id="">
                                                <option value="" >همه موارد</option>
                                                <option {{request('status')=='1'?'selected':''}} value="1" >موفق</option>
                                                <option {{request('status')=='0'?'selected':''}} value="0" >ناموفق</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder="جستجو">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>


                                <br>

                                </form>
                            </div>
                           <div class="card-tools">
                               <div class="btn-group-sm">

{{--                                   <a class="btn btn-info" href="{{route('languages.create')}}">create new</a>--}}
                               </div>
                           </div>
                            <div class="card-tools">
                                {{-- <form action="{{route('admin.bills')}}" method="get">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                        @method('get')
                                        @csrf
                                        <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder="جستجو">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                </div>
                                </form>
                            </div> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>مبلغ</th>
                                    <th>کمسیون</th>
                                    <th>نوع</th>
                                    <th>کیف</th>
                                    <th>درگاه</th>
                                    <th>وضعیت</th>
                                    <th>پیگیری</th>
                                    <th>تعداد کلاس</th>
                                    <th>تاریخ</th>
                                </tr>
                                @foreach($bills as $bill)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="{{route('admin.student.edit',\App\Models\User::find($bill->user->id)->id)}}">{{\App\Models\User::find($bill->user->id)->name}}</a>
                                        </td>
                                        <td>{{number_format( $bill->amount)}}
                                            تومان</td>

                                        <td>
                                             {{number_format($bill->com)}}
                                            تومان
                                       </td>
                                        <td>{{__('arr.'.$bill->type)}}</td>
                                        <td><span> {{$bill->wallet}}  </span></td>
                                        <td><span> {{$bill->port}}  </span></td>
                                        <td>
                                            <span class="badge  badge-{{($bill->status==1)?'success':'error'}} "> {{($bill->status==1)?'موفق':'ناموفق'}}</span>

                                        </td>
                                        <td>{{$bill->transactionId}}</td>
                                        <td>{{$bill->count}}</td>
                                        <td>{{verta($bill->created_at)}}</td>

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

          <div class="pagi">
              {{ $bills->appends(Request::all())->links('home.section.pagination') }}
          </div>

        </div>
    </div>



@endcomponent

