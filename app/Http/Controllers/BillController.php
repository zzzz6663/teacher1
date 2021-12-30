<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Count;
use App\Models\Meet;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as shetabit;
use function GuzzleHttp\Promise\all;

class BillController extends Controller
{

    public function  charge_wallet(Request  $request ,User $user  ){
        $user =auth()->user();
        if (!$user){
            session()->put('key_register',$request->all());
            alert()->error('ابتدا وارد حساب خود  شوید');
            return \redirect()->route('home.student.register.form');
        }

        if ($user && $user->level=='teacher'){
            alert()->error('شما نمیتوانید به عنوان مدرس کلاس را رزرو کنید');
            return back();
        }
        if ($user &&    session()->get('key_register' ) ){
            $ar=session()->get('key_register' );
            $request->request->add(['count' =>$ar['count']]); //add request
            $request->request->add(['time' =>$ar['time']]); //add request
            $request->request->add(['fst' =>$ar['fst']]); //add request
            $request->request->add(['bank' =>$ar['bank']]); //add request
            session()->remove('key_register');
        }
        $amount=0;
        $via='zibal';
//        اگرخواست کیفش رو شارژ کنه
        if ($request->has('amount')){

            if ($request->amount>0){
                $amount=$request->amount;
            }else{
                switch ($request->pricech){
                    case 'p50': $amount=50000;break;
                    case 'p100': $amount=100000;break;
                    case 'p200': $amount=200000;break;
                    case 'p250': $amount=250000;break;
                    case 'p500': $amount=500000;break;
                    case 'p1000': $amount=1000000;break;
                    default: return back();
                }
            }
            $type='charge_wallet';
            $count=0;

        }
        $meet_id=null;
        $com=0;
//        اگه خواست برای کلاس پرداخت کنه
        if ($request->has('time') ){
            $count=$request->count;
            $meet_id=$request->time;
            $type='reserve_meet';
            $teacher=User::find(Meet::find($meet_id)->user_id);
            $meet=Meet::find($meet_id);
            if( $meet->student_id){
                alert()->error('این کلاس قبلا رزرو شده است');
                return back();
            }

            if ($count=='0'   ){
                   $free_teacher_reserve=$teacher->meets()->whereType('free')->where('student_id',$user->id)->count();
                    if ($free_teacher_reserve>0){
                        alert()->error('شما قبلا با این  مدرس کلاس آزمایشی داشته اید');
                        return \redirect()->back();
                    }
                    if ( $teacher->attr('freeclass')=='free'){
                        $meet->update([
                            'student_id'=>$user->id,
                            'type'=>'free'
                        ]);
                        $teacher->create_ski_room($user);
                        alert()->success('  کلاس رایگان با موفقیت رزور شد');
                        return \redirect()->route('student.dashboard');
                    }
            }
            if ($count==0){
                $amou=  $teacher->attr('free_meeting_price');
                $amount=  $teacher->com_price($amou);
            }else{
                $amou=  $teacher['meet'.$count];
                $amount=  $teacher->com_price($amou)*$count;
            }
            $com= $teacher->com_price($amou)-$amou;
            if ($request->bank=='bank'){
              if(!$amount){
                  return  redirect()->route('home.teacher.list');
              }
            }
            if ($request->bank=='wallet'){
                $type='reserve_meet_by_charge';

                if ($user->total_cash()<$amount){
                    alert()->error('موجودی شما کافی نمیباشد');
                    return back();
                }



                $payment= Bill::create([
                    'transactionId'=>'88'.$teacher->id.'77'.$user->id.'66'.time(),
                    'amount'=>$amount,
                    'type'=>$type,
                    'user_id'=>$user->id,
                    'meet_id'=>$meet_id,
                    'count'=>$count,
                    'com'=>$com,
                    'wallet'=>$amount,
                    'port'=>0
                ]);
                return \redirect()->route('bill.verify',['trackId'=>$payment->transactionId,'success'=>'1']) ;


            }

        }
        if ($request->usewallet && $user->total_cash()>$amount){
            alert()->error('      برای استفاده کامل از کیف پول باید گزینه پرداخت با کیف پول را انتخاب کنید ');
            return back();
        }
        $amount=(int)$amount;

        //            اگر خواست ازکیفش هم استفاده کنه
        $wallet=0;
        $port=$amount;
        if ($request->usewallet ){
            $wallet=   $user->total_cash();
            $port=$amount-$user->total_cash();
        }

        $invoice = (new Invoice) ;
        $invoice->amount($port);
        return   shetabit::via($via)->callbackUrl(route('bill.verify'))->purchase($invoice,function($driver, $transactionId) use ( $user,$invoice,$type,$amount,$meet_id,$count,$com, $wallet, $port) {
            $payment= Bill::create([
                'transactionId'=>($transactionId),
                'amount'=>$amount,
                'type'=>$type,
                'user_id'=>$user->id,
                'meet_id'=>$meet_id,
                'count'=>$count,
                'com'=>$com,
                'wallet'=>$wallet,
                'port'=>$port,
                'remain'=>0
            ]);
        })->pay()->render();

    }

   public function result_pay(Bill $bill){
        $user=auth()->user();
        if ($bill->status==1){
            return view('home.pay_success',compact(['user','bill']));
        }
       return view('home.pay_faild',compact('user'));

   }
   public function verify(Request $request){
//        dd($request->all());
       $tid=($request->trackId);
       if (strlen($request->trackId)<12){
           $tid=abs($request->trackId);
       }
       $bill=Bill::where('transactionId',($tid))->first();
       if (!$bill){
           alert()->error('پرداخت با شمکل مواجه شد');
           return \redirect()->route('login');
       }
       if ($request->success=='1'){
            $user= $bill->user;


            $com= $bill->com;
          switch ($bill->type){
               case 'charge_wallet':
                   $amount=$bill->amount;
                   $ss=$bill->update([
                       'status'=>'1',
                       'remain'=>$amount+$user->total_cash()
                   ]);
                   $user->change_cash($bill->type,$amount );
                   break;
               case 'reserve_meet':
               case 'reserve_meet_by_charge':
                   $teacher=$bill->meet->user;
                   $amount=$bill->amount;
                   $Count_m=new Count();

//                        اگر کلاس ازمایشی نبود
                    if ($bill->count>0){
                        $county=$Count_m->create([
                            'teacher_id'=>$teacher->id,
                            'user_id'=>$user->id,
                            'count'=>$bill->count-1,
                            'com'=>$bill->com,
                            'price'=>$amount/$bill->count,
                            'bill_id'=>$bill->id,

                        ]);
                    }

//                   $county->update_count($teacher->id,$user->id,($bill->count-1),1);
                   $date = Carbon::parse($bill->meet->start);

                   if ($bill->type=='reserve_meet_by_charge'){
                       $user->change_cash($bill->type,$bill->amount );
                   }


                    $bill->update([
                       'status'=>'1',
                       'remain'=> $user->total_cash()
                   ]);


                   if ($bill->count>0){
                      $bill->meet->update([
                         'student_id'=>$user->id,
                         'com'=>$bill->com ,
                         'price'=>$amount/$bill->count,
                         'bill_id'=>$bill->id,
                         'status'=>'reserved'
                         ]);
                      }else{
                         $bill->meet->update([
                             'student_id'=>$user->id,
                             'com'=>$bill->com ,
                             'price'=>$amount,
                             'bill_id'=>$bill->id,
                             'status'=>'reserved'
                         ]);
                      }



                    if ($bill->count==0){
                        $bill->meet->update([
                            'type'=>'free'
                        ]);
                    }else{
                        $new_meet= $teacher->meets()->whereModel('not_free')->whereStart($date->addMinutes(30))->first();
                        $new_meet->update([
                            'student_id'=>$user->id,
                            'com'=>$bill->com ,
                            'price'=>$amount/$bill->count,
                            'pair'=>$bill->meet->id,
                            'bill_id'=>$bill->id,
                            'status'=>'reserved'
                        ]);

                    }


//                    پردخت قسمتی با کیف
              if ($bill->type=='reserve_meet' && $bill->wallet>0){
                  $user->change_cash($bill->type,$bill->wallet );
                  $bill->update(['remain'=>0]);
              }


               $teacher->create_ski_room($user);
               break;

           }

     }

       return \redirect()->route('bill.result_pay',$bill->id);
   }


    public function sky($action,$params=array()){
        try {
            $test= Http::post('https://www.skyroom.online/skyroom/api/apikey-677331-147-1d4007d2a0b1d6614101b51d2fa6afce',[
                "action"=>$action,
                'params'=>$params
            ]);
            return   $test->json();
        }catch (\Exception $e){
            return false;
        }

    }
}
