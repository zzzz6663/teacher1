<?php

namespace App\Http\Controllers\admin;


use App\Models\Com;
use App\Models\Bill;
use App\Models\Fave;
use App\Models\Meet;
use App\Models\User;
use NumberFormatter;
use App\Models\Count;
use App\Models\Payam;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Language;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Exports\TeacherExport;
use App\Exports\PollNumberExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class AdminController extends Controller
{
    public function index()
    {




        //       $encrypted = Crypt::encryptString('121212');
        //       dd($encrypted);
        //       $decrypted = Crypt::decryptString(
        //           trim("
        //           eyJpdiI6Ikc0ZWpRSkE1dUdXSHhINmtPR28xWGc9PSIsInZhbHVlIjoiYTFnSHpXZ3ljT3NMbTBlN0gxNmhPdz09IiwibWFjIjoiYzYyYzJkOTE4YTU1YzdjZTg4YTdlZjljOWYwYzRlMzNiNTI0NTQxYzYyZmNmZmMyNzk3OWQ3ZjhmMGE5NTQ5OSJ9
        //           ")
        //       );
        //       dd($decrypted);
        //



        return view('admin.index');
    }

    public function users(Request $request)
    {
        $students = User::query()->whereIn('level', ['student']);

        if ($request->search) {
            $students = $students->where(function ($query) use ($request) {
                if ($request->search) {
                    $search = $request->search;
                    $query->orWhere('name', 'LIKE', "%{$search}%")->get();
                    $query->orWhere('mobile', 'LIKE', "%{$search}%")->get();
                }
            });
        }




        $students = $students->orderBy('id', 'DESC')->latest()->paginate(10);
        return view('admin.users', compact(['students']));
    }
    public function logoutadmin()
    {
        Auth::logout();
        alert()->success('شما با موفقیت از حساب کاربری خود خارج شدید ');
        return  \redirect(route('login'));
    }
    public function setting()
    {
        $user = \auth()->user();
        return view('admin.setting', compact('user'));
    }
    public function bills(Request  $request)
    {

        $bills = Bill::query();
        if ($request->from) {
            $request->from = $this->convert_date($request->from);
            $bills->where('created_at', '>', $request->from);
        }
        if ($request->to) {
            $request->to = $this->convert_date($request->to);
            $bills->where('created_at', '<', $request->to);
        }
        if ($request->type) {
            $bills->where('type', $request->type);
        }
        if ($request->status=='0') {
            $status=$request->status;
            $bills->where('status',    $status);
        }
        if ($request->status==1) {
            $status=$request->status;
            $bills->where('status',    $status);
        }
        if ($request->search) {

            $bills->where(function ($query) use ($request) {
                if ($request->search) {
                    $search = $request->search;
                    $query->orWhere('amount', 'LIKE', "%{$search}%")->get();
                    $query->orWhere('com', 'LIKE', "%{$search}%")->get();
                    $query->orWhere('bank', 'LIKE', "%{$search}%")->get();
                    $query->orWhere('transactionId', 'LIKE', "%{$search}%")->get();
                    $query->orWhere('count', 'LIKE', "%{$search}%")->get();
                }
            })->OrWhereHas('user', function ($query) use ($request) {
                $search = $request->search;
                $query->Where('name', 'LIKE', "%{$search}%");
            });
        }


        $bills = $bills->latest()->paginate(10);




        return view('admin.bills', compact(['bills']));
    }
    public function zaro_balance(Request $request, User $user)
    {
        $user->meets()->delete();
        Meet::where('student_id', $user->id)->delete();
        $user->bills()->delete();
        $user->cmeets()->delete();
        $user->emeets()->delete();
        Count::where('teacher_id', $user->id)->delete();
        Count::where('user_id', $user->id)->delete();
        Fave::where('teacher_id', $user->id)->delete();
        Fave::where('user_id', $user->id)->delete();

        $user->update([
            'cash' => 0
        ]);

        alert()->success('موجودی   صفر شد ', 'پیام  جدید');
        alert()->error('این  ویزگی حذف شده ', '    ');
        return Redirect::back();
    }

    public function classes(Request  $request)
    {

        $classes = Meet::query()->whereNotNull('student_id')->whereModel('not_free')->whereNull('pair');
        //
        if ($request->search) {

            $classes = $classes->where(function ($query) use ($request) {
                if ($request->search) {
                    $search = $request->search;
                    $query->orWhere('price', 'LIKE', "%{$search}%")->get();
                    $query->orWhere('com', 'LIKE', "%{$search}%")->get();
                    $query->orWhere('price', 'LIKE', "%{$search}%")->get();
                }
            })->OrWhereHas('user', function ($query) use ($request) {
                $search = $request->search;
                $query->Where('name', 'LIKE', "%{$search}%");
            })
                ->OrWhereHas('student', function ($query) use ($request) {
                    $search = $request->search;
                    $query->Where('name', 'LIKE', "%{$search}%");
                });
        }


        $classes = $classes->latest()->paginate(100);




        return view('admin.classes', compact(['classes']));
    }
    public function tarticles()
    {
        $articles = Article::latest()->paginate(10);;
        return view('admin.tarticles', compact(['articles']));
    }
    public function comments()
    {
        $comments = Comment::latest()->paginate(20);;
        return view('admin.comments', compact(['comments']));
    }
    public function payam()
    {
        $payams = Payam::latest()->paginate(10);
        return view('admin.payam', compact(['payams']));
    }
    public function home_payam(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'mobile' => 'required|min:11',
            'payam' => 'required|min:10',
        ]);
        Payam::create($data);
        alert()->success('پیام شما با موفقیت برای مدیریت ارسال شد  ');
        return back();
    }
    public function home_article(Article $article)
    {

        if ($article->home == '0') {
            $count = Article::whereHome('1')->count();

            if ($count < 2) {
                $article->update(['home' => '1']);
                alert()->success('مقاله با موفقیت به صفحه اصلی اضافه شد ');
                return back();
            }
            alert()->error('فقط دو مقاله میتواند به صفحه اصلی اضافه شود  ');
            return back();
        } else {
            $article->update(['home' => '0']);
            alert()->success('مقاله با موفقیت از صفحه اصلی حذف شد ');
            return back();
        }
    }
    public function submit_teacher_pay(Request $request, User  $user)
    {
        $data = $request->validate([
            'time' => 'required',
            'info' => 'required',
        ]);
        $data['time'] = $this->convert_date($data['time']);
        $cash = $user->cash;
        if ($cash <= 0) {
            alert()->error('موجودی برای تسویه کافی نیست ');
            return back();
        }

        $bill =  Bill::create([
            'transactionId' => 'tr_' . $user->id . time(),
            'amount' => $cash,
            'type' => 'teacher_pay',
            'user_id' => $user->id,
            'meet_id' => null,
            'count' => 0,
            'com' => 0,
            'wallet' => 0,
            'port' => 0,
            'remain' => 0,
            'status' => 1
        ]);
        $user->update([
            'cash' => 0
        ]);

        //                    Bill::create([
        //                      'transactionId'=>'tr_'.$teacher->id.'_'.$user->id.'_'.time(),
        //                      'amount'=>$amount,
        //                      'type'=>'reserve_meet',
        //                      'user_id'=>$user->id,
        //                      'meet_id'=>$bill->meet_id,
        //                      'count'=>0,
        //                      'com'=>0,
        //                      'wallet'=>$bill->wallet,
        //                      'port'=>0,
        //                      'status'=>1,
        //                      'remain'=>0
        //                  ]);
        alert()->success('پرداخت با موفقیت ثبت شد ');
        return  \redirect()->route('admin.teachers');
    }
    public function teacher_pay(Request $request, User  $user)
    {
        return view('admin.teacher_pay', compact('user'));
    }
    public function teachers(Request $request)
    {

        $teachers = User::query()->whereIn('level', ['teacher']);
        if ($request->show == 'cash') {
            $teachers->where('cash', '>', 0);
        }

        if ($request->from) {
            $request->from = $this->convert_date($request->from);
            $teachers->where('created_at', '>', $request->from);
        }
        if ($request->to) {
            $request->to = $this->convert_date($request->to);
            $teachers->where('created_at', '<', $request->to);
        }
        if ($request->attr) {
            $atrr=$request->attr;
            $teachers->whereHas('attributes',function($query) use( $atrr){
                $query->where('name',$atrr)->where('value',$atrr);
                $query->orWhere('name',$atrr)->where('value',1);
            } );
        }
        if ($request->active=="0") {
            $status=$request->active;
            $teachers->where('active',    $status);
        }
        if ($request->active==1) {
            $status=$request->active;
            $teachers->where('active',    $status);
        }
        if ($request->search) {
            $teachers = $teachers->where(function ($query) use ($request) {
                if ($request->search) {
                    $search = $request->search;
                    $query->orWhere('name', 'LIKE', "%{$search}%")->get();
                    $query->orWhere('mobile', 'LIKE', "%{$search}%")->get();
                }
            });
        }


        if ($request->excel){
            if ($request->has('excel')){
                return Excel::download(new TeacherExport($teachers->select('name','mobile')->get()), 'Poll_'.Jalalian::now().'.xlsx');
            }
        }

        $teachers = $teachers->orderBy('id', 'DESC')->latest()->paginate(10);

        return view('admin.teachers', compact(['teachers']));
    }
    public function convert_date($from)
    {

        $date = explode('-', $from);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];
        $from =  \Morilog\Jalali\CalendarUtils::toGregorian($year, $month, $day);
        return   $from = $from[0] . '-' . $from[1] . '-' . $from[2] . ' 00:00:00';
    }
}
