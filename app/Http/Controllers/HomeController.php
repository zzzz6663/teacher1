<?php

namespace App\Http\Controllers;

use AliBayat\LaravelCategorizable\Category;
use App\Mail\ForgetMail;
use App\Mail\SampleMail;
use App\Models\Acat;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Count;
use App\Models\Fclass;
use App\Models\Language;
use App\Models\Meet;
use App\Models\Room;
use App\Models\User;
use App\Notifications\SendCodeSms;
use App\Notifications\SendKaveCode;
use App\Notifications\SendSms;
use App\Notifications\testNotification;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Morilog\Jalali\Jalalian;
use Newsletter;
use function Composer\Autoload\includeFile;

class HomeController extends Controller
{
    public function redirect_google(Request  $request)
    {

        return Socialite::driver('google')->stateless()->redirect();
    }
    public function gcallback()
    {
        try {
            $goo = Socialite::driver('google')->stateless()->user();
            $user = User::whereEmail($goo->email)->first();
            if ($user) {
                Auth::loginUsingId($user->id, true);

                if ($fclass = session()->get('flink')) {
                    $fclass = Fclass::find($fclass);
                    $fclass->update(['student_id' => $user->id]);
                    $fclass->meets()->update(['student_id' => $user->id]);;
                    $teacher = User::find($fclass->user->id);
                    $teacher->create_ski_room($user);
                    session()->forget('flink');
                }
                return redirect()->route('student.dashboard');
            } else {
                //                $user=  User::create([
                //                    'email'=>$goo->email,
                //                    'name'=>$goo->name,
                //                    'level'=>'student',
                //                    'password'=>'123456'
                //                ]);

                alert()->error('     ابتدا ثبت نام کنید ');
                return back();
            }
        } catch (\Exception $e) {
            //
            alert()->error('ارتباط با گوگل برقرار نشد ');
            return back();
        }
    }
    public function test()
    {

        dd(Jalalian::forge(\Carbon\Carbon::now())->format('   %B   '));
    }
    public function forget_password(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::whereEmail($data['email'])->first();
        if (!$user) {
            alert()->error('ایمیلی با این مشخصات پیدا نشد');
            return back();
        }
        Mail::to($user->email)->send(new ForgetMail($user));

        alert()->success('رمز عبور شما با موفقیت به ایمیلتان ارسال  شد');
        return back();
    }
    public function go_free_class(Fclass $fclass)
    {
        //       if ($fclass->student_id){
        //           Auth::loginUsingId($fclass->student_id,true);
        //           return \redirect(route('student.dashboard'));
        //       }
        session()->put('flink', $fclass->id);
        return view('home.link', compact('fclass'));
    }
    public function index()
    {
        $user = \auth()->user();
        //        $invitedUser = new User;
        //        $invitedUser->notify(new SendKaveCode( '09373699317','register','ناصر','',''));
        //        dd(3);
        $articles = Article::where('submit', '1')->where('active', '1')->take(10)->get();
        //dd($res);
        //       dd($user->c    om_price(650000))
        //;
        return view('home.home', compact(['articles']));
    }
    public function about_us()
    {
        return view('home.about_us');
    }
    public function tag_articles(Request $request, $tag)
    {

        $articles = Article::where('submit', '1')->where('active', '1');

        $articles = $articles->Where(function ($query) use ($tag) {
            $query->Where('tag', 'LIKE', "%{$tag}%");
        });
        $articles = $articles->latest()->paginate(6);
        return view('home.articles', compact('articles'));
    }
    public function home_articles(Request $request, Acat $acat)
    {
        if ($acat->id) {
            $childs = Acat::where('parent_id', $acat->id)->get();
            if ($childs->first()) {
                $articles = Article::whereHas('acats', function ($query) use ($childs) {
                    $query->whereIn('acat_id', $childs->pluck('id')->toArray());
                })->where('submit', '1');
            } else {
                $articles = $acat->articles()->where('submit', '1')->where('active', '1');
            }

            $articles = $articles->latest()->paginate(6);
            return view('home.cat', compact(['articles', 'acat']));
        }
        $articles = Article::query();
        if ($request->has('search')) {
            $articles = $articles->Where(function ($query) use ($request) {
                $search = $request->search;
                $query->Where('title', 'LIKE', "%{$search}%")
                    ->orWhere('article', 'LIKE', "%{$search}%");
            });
        }
        $articles = $articles->where('submit', '1')->where('active', '1')->latest()->paginate(9);

        return view('home.articles', compact('articles'));
    }
    public function admin_login()
    {
        return view('admin.login');
    }
    public function check_login(Request $request)
    {
        $exist_user = User::where('email', $request->username)->first();
        if ($exist_user) {
            if (Crypt::decryptString($exist_user->password) == $request->password) {
                Auth::loginUsingId($exist_user->id, 'true');
                return redirect()->route('admin.index');
            }
        }
        alert()->error('اطلاعات شما صحیح نیست ');
        return back();
    }
    public function single_article(Request $request, Article $article)
    {
        $tags = explode('__', $article->tag);
        $related = Article::query();
        for ($i = 0; $i < sizeof($tags), $i++;) {
            $related = $related->Where(function ($query) use ($tags, $i) {
                $query->orWhere('tag', 'LIKE', "%{$tags[$i]}%");
            });
        }
        $related = $related->latest()->take(3)->get();





        $all = Article::where('active', '1')->where('submit', '1')->pluck('id')->toArray();
        $pos =  array_search($article->id, $all);
        $next = null;
        $prv = null;
        $n = $pos + 1;
        $p = $pos - 1;
        if (isset($all[$n])) {
            $next = Article::find($all[$n]);
        }
        if (isset($all[$p])) {
            $prv = Article::find($all[$p]);
        }
        return view('home.single_article', compact(['article', 'next', 'prv', 'tags', 'related']));
    }
    public function comment_teacher(Request $request, User $user)
    {
        $auth = \auth()->user();
        if (!$auth) {
            alert()->error(' ابتدا وارد حساب کاربری خود شوید سپس نظر خود را ثبت کنید ');
            return back();
        }
        $com = Comment::where('commentable_type', 'App\Models\User')->where('commentable_id', $user->id)->where('user_id', $auth->id)->first();
        $meet = $user->meets()->where('student_id', $auth->id)->first();
        if (!$meet) {
            alert()->error('شما قبلا با این استاد کلاسی نداشته اید ');
            return back();
        }
        if ($com) {
            alert()->error('شما قبلا برای این معلم نظر ثبت کرده اید  ');
            return back();
        }
        $valid = $request->validate([
            'name' => 'required',
            'comment' => 'required',
            'rate' => 'required',
        ]);
        $valid['user_id'] = $auth->id;
        $comment = $user->comments()->create($valid);
        alert()->success('نظر شما با موفقیت  ثبت شد ');
        return back();
    }
    public function comment_article(Request $request, Article $article)
    {
        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
            'parent_id' => 'required',
        ]);
        $comm = $article->comments()->where('parent_id', $valid['parent_id'])->count();
        if (Auth::check()) {
            $comment = $article->comments()->create([
                'user_id' => \auth()->user()->id,
                'name' => \auth()->user()->name,
                'email' => \auth()->user()->email,
                'comment' => $valid['comment'],
                'parent_id' => $valid['parent_id'],
            ]);
        } else {
            $comment = $article->comments()->create([
                'name' => $valid['name'],
                'email' => $valid['email'],
                'comment' => $valid['comment'],
                'parent_id' => $valid['parent_id'],
            ]);
        }

        alert()->success('نظر شما با موفقیت ثبت شد و بعد از بررسی نمایش داده خواهد شد ');
        return back();
    }
    public function contact_us()
    {
        return view('home.contact_us');
    }
    public function sky($action, $params = array())
    {
        try {
            $test = Http::post('https://www.skyroom.online/skyroom/api/apikey-677331-147-1d4007d2a0b1d6614101b51d2fa6afce', [
                "action" => $action,
                'params' => $params
            ]);
            return   $test->json();
        } catch (\Exception $e) {
            return false;
        }
    }
    public function teacher_list(Request $request)
    {
        $teachers = \App\Models\User::query()->whereIn('level', ['teacher']);
        $teachers = $teachers->whereActive('1')->whereSubmit('1');

        if ($request->tname) {
            $search1 = $request->tname;
            $teachers->where('name', 'LIKE', "%{$search1}%");
        }
        if ($request->langsearch) {
            $search2 = $request->langsearch;
            $teachers->whereHas('languages', function ($query) use ($request, $search2) {
                $query->where('name', 'LIKE', "%{$search2}%");
            });
        }
        if ($request->lang) {
            $teachers->whereHas('languages', function ($query) use ($request) {
                $query->where('id', $request->lang);
            });
        }
        if ($request->la) {
            $teachers->whereHas('languages', function ($query) use ($request) {
                $query->whereIn('id', $request->la);
            });
        }

        if ($request->max) {
            $teachers->where('meet1', '>=', (int)$request->min)
                ->where('meet1', '<=', (int)$request->max);
        }


        if ($request->IELTS) {
            $teachers->whereHas('attributes', function ($query) use ($request) {
                $query->where('name', $request->IELTS)
                    ->where('value', 'on');
            });
        }
        if ($request->GRE) {
            $teachers->whereHas('attributes', function ($query) use ($request) {
                $query->where('name', $request->GRE)
                    ->where('value', 'on');
            });
        }
        if ($request->PTE) {
            $teachers->whereHas('attributes', function ($query) use ($request) {
                $query->where('name', $request->PTE)
                    ->where('value', 'on');
            });
        }
        if ($request->TOEFL) {
            $teachers->whereHas('attributes', function ($query) use ($request) {
                $query->where('name', $request->TOEFL)
                    ->where('value', 'on');
            });
        }
        if ($request->freeclass) {
            $teachers->whereHas('attributes', function ($query) use ($request) {
                $query->where('name', $request->freeclass)
                    ->where('value', 'free');
            });
        }
        if ($request->teachlevel) {
            $teachers->whereHas('attributes', function ($query) use ($request) {
                $query->where('name', $request->teachlevel)
                    ->where('value', 'on');
            });
        }
        if ($request->native) {
            $teachers->whereHas('languages', function ($query) use ($request) {
                $query->where('status', 'vernacular');
            });
        }



        if ($request->port) {
            //          dd(4);
            $teachers->whereHas('attributes', function ($query) use ($request) {
                $query->where('name', 'port')->where('value', '1');
            });
        }
        if ($request->free) {
            //          dd(5);
            $teachers->whereHas('attributes', function ($query) use ($request) {
                $query->where('name', 'freeclass')->where('value', 'free');
            });
        }
        if ($request->sex && $request->sex != 'both') {
            $teachers->where('sex', $request->sex);
        }






        //        if ($request->la){
        //            $teachers->whereHas('languages',function ($query) use($request  ){
        //                $query->whereIn('id',$request->la);
        //            });
        //        }
        //        $teachers=$teachers->whereIn('level', ['teacher'])->inRandomOrder()->paginate(10);
        if ($request->most == 'expensive') {
            $teachers->orderBy('meet1', 'desc');
        }
        if ($request->most == 'cheap') {
            $teachers->orderBy('meet1', 'asc');
        }
        if ($request->most == 'popular') {
            $teachers->withCount('meets')->orderBy('meets_count', 'asc')->whereHas('meets', function ($query) {
                $query->whereIn('status', ['passed', 'done']);
            });
        }
        $teachers = $teachers->paginate(10);

        return view('home.teacher_list', compact(['teachers']));
    }
    public function teacher_profile(User $user)
    {

        $seen = $user->attr('visit_profile');
        if (!$seen) {
            $seen = 0;
        }
        if (Auth::user()) {   // Check is user logged in
            if ($user->id != \auth()->user()->id) {
                $user->save_attr('visit_profile', $seen + 1);
            }
        }
        return view('home.teacher.teacher_profile', compact(['user']));
    }
    public function teacher_register_form()
    {
        $languages = Language::whereActive(1)->orderBy('sort')->get();
        return view('home.teacher_register_form', compact('languages'));
    }

    public function check_sms(Request $requrest)
    {
        $rnd = session()->get('rnd');
        $mobile =  session()->get('mobile');
        $level =  session()->get('level');

        if ($requrest->code == $rnd) {

            $user = User::whereMobile($mobile)->first();

            if (!$user) {

                $user = User::create([
                    'mobile' => $mobile,
                    'level' => $level,
                    'password', substr($mobile, -4)
                ]);

                if ($fclass = session()->get('flink')) {
                    $fclass = Fclass::find($fclass);
                    $fclass->update(['student_id' => $user->id]);
                    $fclass->meets()->update(['student_id' => $user->id]);;
                    $teacher = User::find($fclass->user->id);
                    $teacher->create_ski_room($user);
                    session()->forget('flink');
                }
                $user->notify(new SendKaveCode($user->mobile, 'register', 'کاربر', '', ''));
            }

            Auth::loginUsingId($user->id, true);

            //          $user->sms_code(new SendKaveCode(  ['login'=>$rnd],'57350',$mobile));
            //          $user->sms_code('register',$user->name);

            $url = null;

            if ($user->level == 'student') {
                $url = route('student.dashboard');
            }
            if ($user->level == 'teacher') {
                $url = route('teacher.level');
            }
            return response()->json([
                'status' => 'ok',
                'url' => $url
            ]);
        } else {
            return response()->json([
                'status' => 'notok',
            ]);
        }
    }
    public function login_sms(Request $requrest)
    {
        $new = 1;
        $data = $requrest->validate([
            'mobile' => 'required|min:11|max:11',
            'level' => 'nullable|in:student,teacher',
        ]);
        $is_exist = User::whereMobile($data['mobile'])->first();
        if (!$is_exist && !isset($data['level'])) {
            $new = 0;
            return response()->json([
                'status' => 'ok',
                'new' => $new,
            ]);
        }
        $digits = 4;
        $rnd = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $invitedUser = new User;
        $invitedUser->notify(new SendKaveCode($data['mobile'], 'login', $rnd, '', ''));
        session()->put('rnd', $rnd);
        session()->put('mobile', $data['mobile']);
        if (isset($data['level'])) {
            session()->put('level', $data['level']);
        }
        $is_exist = User::whereMobile($data['mobile'])->first();
        if ($is_exist) {
            $new = 1;
        }
        return response()->json([
            'status' => 'ok',
            'rnd' => $rnd,
            'new' => $new,
        ]);
    }
    public function student_register_form()
    {
        if (Auth::check()) {
            alert()->error('شما هم  اکنون در حساب خود هستید   ');
            return back();
        }
        return view('home.student_register_form');
    }

    public function student_register(Request $request)
    {
        $data = $request->validate([
            //            'name'=>'required|min:3',
            //            'email'=>'required|unique:users',
            //            'username'=>'required|unique:users|min:4|max:24|regex:/^[a-zA-Z0-9]+$/',
            'mobile' => 'required|unique:users',
            //            'sex'=>'required|in:male,female' ,
            'level' => 'required|in:student,teacher',
            //            'password'=>'required|min:4|max:24|regex:/^[a-zA-Z0-9]+$/',
        ]);
        $lastid = User::latest()->first()->id + 1;
        $data['username'] = $lastid . '0';
        $params = [
            'username' => $data['username'],
            'password' => $request->password,
            'nickname' => $request->name,
            'status' => '1',
            "is_public" => true
        ];
        $res =  $this->sky('createUser', $params);
        if (!$res['ok']) {
            return Redirect::back()->withErrors([
                'res' => $res,
                'message' => $res['error_message']
            ]);
        }
        $data['sky_id'] = $res['result'];
        $data['password'] = Crypt::encryptString($data['password']);
        $user = User::create($data);
        if ($fclass = session()->get('flink')) {
            $fclass = Fclass::find($fclass);
            $fclass->update(['student_id' => $user->id]);
            $fclass->meets()->update(['student_id' => $user->id]);;
            $teacher = User::find($fclass->user->id);
            $teacher->create_ski_room($user);
            session()->forget('flink');
        }
        Auth::loginUsingId($user->id, true);
        $user->sms_code('register', $user->name);
        alert()->success('به تیچر وان خوش آمدید');

        if ($data['level'] == 'student') {
            return \redirect()->route('student.dashboard');
        }
        if ($data['level'] == 'teacher') {
            return \redirect()->route('teacher.dashboard');
        }
    }

    public function go_class(Request $request, Meet $meet)
    {
        if (Carbon::now()->gt(Carbon::parse($meet->start)->addHours(2))) {
            alert()->error('این کلاس برگزار شده است ');
            return back();
        }
        $now = Carbon::now();
        $start = Carbon::parse($meet->start);
        if ($start->gt($now)) {
            $duration = $start->diffInMinutes($now);
            if ($duration > 60) {
                alert()->error('شما فقط میتوانید 60 دقیقه به شروع کلاس وارد شوید ');
                return  back();
            }
        }
        //       else{
        //           alert()->error('زمان کلاس به پایان رسیده است ');
        //           return  back();
        //       }

        //        dd($meet);
        $user = auth()->user();

        if (in_array($request->user()->level, ['teacher'])) {
            if (($user->languages()->count() == 0)) {
                alert()->error('شما باید حداقل یک زبان برای تدریس انتخاب کنید');
                return   redirect(route('teacher.lang'));
            }
            if (!$user->attr('port')) {
                alert()->error('لطفا تصویر پروفایل خود را به روز رسانی کنید ');
                return \redirect()->route('teacher.profile');
            }
            if (!$user->attr('save_expert')) {
                alert()->error('لطفا  اطلاعات پروفایل خود را به روز رسانی کنید ');
                return \redirect()->route('teacher.profile');
            }
            if (!$user->attr('time_plan')) {
                alert()->error('لطفا برنامه  زمانی خود را تعیین   کنید ');
                return \redirect()->route('teacher.plans');
            }
            if (!$user->attr('price_plan')) {
                alert()->error('لطفا قیمت کلاس های خود را به روز رسانی  کنید ');
                return \redirect()->route('teacher.prices');
            }
            if (!$user->attr('port_vid')) {
                alert()->error('لطفا ویدو معرفی خود را به روز رسانی  کنید ');
                return \redirect()->route('teacher.profile');
            }
        }

        $teacher = User::find($meet->user_id);
        $student = User::find($meet->student_id);
        $teacher->create_ski_room($student);
        $room = null;
        $new_meet = $teacher->meets()->whereModel('not_free')->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();

        if (!$user->name) {
            alert()->error('لطفا ابتدا پروفایل خود را       کامل  کنید');
            return back();
        }
        if (!$user->create_sky_user()) {
            alert()->error('مشکل در برقراری ارتباط با سامانه');
            return back();
        }
        if ($user->level == 'teacher') {
            $meet->update(['t_click' => '1']);
            if ($meet->type != 'free') {
                $new_meet->update(['t_click' => '1']);
            }
            $room = $user->rooms()->where('student_id', $meet->student_id)->first();
        } else {
            $meet->update(['s_click' => '1']);
            if ($meet->type != 'free') {
                $new_meet->update(['s_click' => '1']);
            }
            $room = $user->srooms()->where('user_id', $meet->user_id)->first();
        }
        $params = [
            'room_id' => $room->sky_id,
            'user_id' => $user->level,
            'nickname' => $user->name,
            'access' => 3,
            'ttl' => '40000',
            'concurrent' => '1',
        ];
        $resulat = $this->sky('createLoginUrl', $params);
        if (!$resulat['ok']) {
            alert()->error('لطفا با پشتیبانی تماس بگیرید');
            return back();
        }
        $url  = $resulat['result'];
        if ($meet->s_click == '1' && $meet->t_click == '1') {
            $meet->update(['status' => 'down']);
            if ($meet->type != 'free') {
                $new_meet->update(['status' => 'down']);
            }
        }
        return \redirect($url);
    }
    public function user_login(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);
        $message = 0;
        $url = '';
        $user = User::whereEmail($data['email'])->first();
        if (Crypt::decryptString($user->password) == $data['password']) {
            $message = 1;
            Auth::loginUsingId($user->id, true);
            if ($user->level == 'student') {
                if ($fclass = session()->get('flink')) {
                    $fclass = Fclass::find($fclass);
                    $fclass->update(['student_id' => $user->id]);
                    $fclass->meets()->update(['student_id' => $user->id]);;
                    session()->forget('flink');
                    $teacher = User::find($fclass->user);
                    $teacher->create_ski_room($user);
                }
                $url = route('student.dashboard');
            } else {
                $url = route('teacher.dashboard');
            }
            return \redirect($url);
        }
        return Redirect::back()->withErrors([
            'message' => 'رمز وارد شده صحیح نمی باشد'
        ]);
    }
    public function teacher_register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4',
            'username' => 'required|unique:users|min:4|max:24|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|unique:users',
            'mobile' => 'required|unique:users|min:10',
            'sex' => 'required',
            'password' => 'required|confirmed|min:4|max:24|regex:/^[a-zA-Z0-9]+$/',

        ]);

        $params = [
            'username' => $request->username,
            'password' => $request->password,
            'nickname' => $request->name,
            'status' => '1',
            "is_public" => true
        ];
        $res =  $this->sky('createUser', $params);

        if (!$res['ok']) {
            return Redirect::back()->withErrors([$res['error_message']]);
        }

        $data['level'] = 'teacher';
        $data['active'] = '0';
        $data['sky_id'] = $res['result'];
        $data['password'] = Crypt::encryptString($data['password']);
        $user = User::create($data);
        $user = Auth::loginUsingId($user->id, true);
        $user->sms_code('register', $user->name);
        alert()->success('  ثبت نام شما با موفقیت انجام شد ', 'پیام جدید');
        return redirect(route('teacher.dashboard'));
    }
    function generateRandomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $use = User::where('username', $randomString)->first();
        if ($use) {
            $this->generateRandomString();
        }
        return $randomString;
    }
    public function cancel_class(Request $request)
    {

        if ($request->has('class')) {
            $user = \auth()->user();
            $meet = Meet::find($request->class);

            $bill = $meet->bill;
            if(!$bill){
                //    یعنی این کلاس رزرو آزمایشی رایگان بوده و فقط کافی است کلاس نخلیه شود و سند حسابداری ندراد
                $meet->empty_class();
                alert()->success('کلاس با موفقیت لغو شد ');
                return back();
               }
            $student = User::find($meet->student_id);
            $teacher = User::find($meet->user_id);
            $persian_date = $user->perisan_date($meet->start);
            $new_meet = $teacher->meets()->whereModel('not_free')->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();
            if (!($meet->start && $new_meet->start)) {
                alert()->error('مشکلی پیش آمده دوباره سعی کنید');
                return back();
            }







            $count = Count::where('bill_id', $bill->id)->first();
            if (!$count) {
                $count = Count::create([
                    'teacher_id' => $teacher->id,
                    'user_id' => $student->id,
                    'bill_id' => $bill->id,
                    'count' => 0,
                    'price' => $meet->price,
                    'com' => $meet->com,
                ]);
            }
            $start = Carbon::parse($meet->start);
            $now = Carbon::now();
            $diff = $start->diffInMinutes($now);


            if ($user->level == 'student') {
                // if ($student->cmeets()->count() > 4) {
                //     alert()->error('شما حد اکثر تا سه کلاس را میتوانید کنسل کنید  ');
                //     return back();
                // }
                if ($meet->s_click == 1) {
                    alert()->error('شما قبلا وارد کلاس شده اید ');
                    return back();
                }




                //                     ثبت کلاس به عنوان کنسلی
                $student->cmeets()->create(
                    [
                        'meet_id' => $meet->id,
                        'bill_id' => $bill->id
                    ]
                );
                //                 اگر کلاس آزمایشی نبود
                if ($bill->count > 0) {
                    $student->cmeets()->create([
                        'meet_id' => $new_meet->id,
                        'bill_id' => $bill->id
                    ]);
                }
                if ($diff < 1440) {



                    //   اگر کمتر از 24  ساعت بود 20 درصد کم و به حساب معلم واریز میشود
                    $amount =  $meet->price;
                    $penalty = ($amount * 20) / 100;
                    $remain = $amount - $penalty;
                    $teacher->change_cash('s_penalty_class', $penalty);

                    $teacher->bills()->create([
                        'amount' => $penalty,
                        'meet_id' => $meet->id,
                        'com' => 0,
                        'bank' => '',
                        'type' => 's_penalty_class',
                        'status' => '1',
                        'transactionId' => $meet->bill->transactionId,
                        'count' => '0',
                        'remain' => $teacher->total_cash()
                    ]);



                    // الباقی به حساب دانش اموز بر میگردد


                    $student->change_cash('s_penalty_class_remain', $remain);
                    $student->bills()->create([
                        'amount' => $remain,
                        'meet_id' => $meet->id,
                        'com' => 0,
                        'bank' => '',
                        'type' => 's_penalty_class_remain',
                        'status' => '1',
                        'transactionId' => $meet->bill->transactionId,
                        'count' => '0',
                        'remain' => $student->total_cash()
                    ]);
                    $meet->empty_class();
                    if ($bill->count > 0) {
                        $new_meet->empty_class();
                    }
                    $student->sms_code('cancel-class-student2', $student->name ?? 'کاربر', '', '', $teacher->name ?? 'استاد', '');;
                    $teacher->sms_code('cancel-class-teacher2', $teacher->name ?? '', '', '', $student->name, $persian_date);;
                    alert()->success('بیست درصد از مبلغ کلاس کسر و به حساب استاد  واریز شد . الباقی به موجودی کیف شما برگشت');
                    return back();
                }
                if ($bill->count > 0) {
                    $count->update([
                        'count' => $count->count + 1
                    ]);
                    $meet->empty_class();
                    $new_meet->empty_class();
                } else {
                    $student->change_cash('back_money_cancel_free_class', $meet->price);
                    $student->bills()->create([
                        'amount' => $meet->price,
                        'meet_id' => $meet->id,
                        'com' => 0,
                        'bank' => '',
                        'type' => 'back_money_cancel_free_class',
                        'status' => '1',
                        'transactionId' => $meet->bill->transactionId,
                        'count' => '0',
                        'remain' => $student->total_cash()
                    ]);
                    $meet->empty_class();
                }


                alert()->success('کلاس با موفقیت لغو شد');
                return back();
            }

            if ($user->level == 'teacher') {
                // if ($teacher->cmeets()->count() > 2) {
                //     alert()->error('شما حد اکثر تا سه کلاس را میتوانید کنسل کنید  ');
                //     return back();
                // }
                if ($meet->t_click == 1) {
                    alert()->error('شما قبلا وارد کلاس شده اید ');
                    return back();
                }
                //               $meet->update(['canceled'=>'1']);
                //               $new_meet= $teacher->meets()->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();
                //               $new_meet->update(['canceled'=>'1']);
                if ($bill->count > 0) {
                    $count->update([
                        'count' => $count->count + 1
                    ]);
                    $teacher->cmeets()->create([
                        'meet_id' => $new_meet->id,
                        'bill_id' => $bill->id
                    ]);
                    $new_meet->empty_class();
                } else {
                    $student->change_cash('back_money_cancel_free_class', $meet->price);
                    $student->bills()->create([
                        'amount' => $meet->price,
                        'meet_id' => $meet->id,
                        'com' => 0,
                        'bank' => '',
                        'type' => 'back_money_cancel_free_class',
                        'status' => '1',
                        'transactionId' => $meet->bill->transactionId,
                        'count' => '0',
                        'remain' => $student->total_cash()
                    ]);
                }

                $teacher->cmeets()->create([
                    'meet_id' => $meet->id,
                    'bill_id' => $bill->id
                ]);

                $meet->empty_class();
                $teacher->sms_code('cancel-class-teacher', $user->name ?? 'کاربر', '', '', $user->name ?? 'دانشجو', '');
                $student->sms_code('cancel-class-student', $student->name ?? 'کاربر', '', '', $teacher->name ?? 'کاربر', $persian_date);;
                alert()->success('کلاس با موفقیت لغو شد');
                return \redirect()->route('teacher.dashboard');
            }
        }
    }
}
