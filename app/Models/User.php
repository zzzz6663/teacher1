<?php

namespace App\Models;

use App\Models\Attribute;
use App\Notifications\SendKaveCode;
use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'mobile',
        'password',
        'sex',
        'level',
        'active',
        'submit',
        'cash',
        'bio',
        'lang',
        'sky_id',
        'count',
        'meet1',
        'meet5',
        'meet10',
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function comments()
    {
        return  $this->morphMany(Comment::class,'commentable');
    }
    public function scomments()
    {
        return  $this->morphMany(Comment::class,'commentable','','user_id');
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function languages(){
        return $this->belongsToMany(Language::class)->withPivot(['status','level']);

    }
    public function fclasses(){
        return $this->hasMany(Fclass::class);
    }
    public function cmeets(){
        return $this->hasMany(Cmeet::class);
    }
    public function emeets(){
        return $this->hasMany(Emeet::class);
    }

    public function sfave(){
        return $this->hasMany(Fave::class,'user_id','id');
    }
    public function tfave(){
        return $this->hasMany(Fave::class,'teacher_id','id');
    }
    public function has_fave($id){
        return $this->sfave()->where('teacher_id',$id)->first();
    }
    public function attributes(){
        return $this->hasMany(Attribute::class);
    }
    public function resumes(){
        return $this->hasMany(Resume::class);
    }
    public function meets(){
        return $this->hasMany(Meet::class);
    }
    public function smeets(){
        return $this->hasMany(Meet::class,'student_id');
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }






    public function rooms()
    {
        return $this->hasMany(Room::class );
    }
    public function srooms()
    {
        return $this->hasMany(Room::class,'student_id');
    }
    public function  empty($data){
        $res=$this->meets()->where('start','=',$data)->whereModel('not_free')->whereNull('student_id')->first();
        if ($res){
            return $res->id;
        }
        return false;
    }
    public function  reserved($data){
        $res=$this->meets()->where('start','=',$data)->whereModel('not_free')->whereNotNull('student_id')->first();
        if ( $res  ){
                   return true;
        }
        return false;
    }
    public function attr($name){
        $name=trim($name);
        $atr=  $this->hasMany(Attribute::class)->whereName($name)->first();
        if ($atr){
            return $atr->value;
        }
        return  false;
    }
    public function  accept_fclass(Fclass $fclass){
        $user=\auth()->user();
        foreach ($fclass->meets as $meet){
            $meet->update([
                'student_id'=>$user->id
            ]);
        }
        alert()->success('کلاس با موفقیت قبول شد') ;
        return \redirect()->route('student.dashboard');
    }
    public function save_attr($key,$val){
        $atr=  $this->hasMany(Attribute::class)->whereName($key)->first();

        if ($atr){
            $atr->update([
                'name'=>$key,
                'value'=>$val,
            ]);
            return false;
        }else{
            $this->attributes()->create([
                'name'=>$key,
                'value'=>$val,
            ]);
            return true;
        }
    }
    public function total_cash(){
        return $this->cash;
    }
    public function change_cash($type,$amount ){
        $cash=   $this->total_cash();
        $cash=(int)$cash;
        switch ($type){
            case 'site_share':
            case 'deposit_teacher':
            case 's_penalty_class':
            case 's_penalty_class_remain':
            case 'charge_wallet':
            case 'back_money_cancel_free_class':
                $amount= $cash +$amount;
                $this->update([
                    'cash'=>$amount
                ]);
                break;

            case 'reserve_meet_by_charge':
            case 'reserve_meet':
            $amount= $cash -$amount;
            $this->update([
                'cash'=>$amount
            ]);
            break;




        }
    }
    public function  free_class_price(){
        $atr=  $this->hasMany(Attribute::class)->whereName('freeclass')->first();
        if ($atr){
            if ($atr->value=='free'){
                return 0;
            }
            if ($atr->value=='nofree'){
              return  $this->attr('free_meeting_price');
            }

        }
        return '';
    }

    public function count_class($count,$type=1)
    {
        if ($type==1){
            $this->update(['count',$this->count+$count ]);
        }
        else{
            $this->update(['count',$this->count-$count ]);
        }

    }

    public function com_price($a)
    {
        $setting = new \App\Models\Setting();
        $c=0;
        for ($i=1;$i<8; $i++){
            ${'ba'.$i}=$setting->set('period'.$i);
            ${'ba'.$i}=(int)${'ba'.$i};
        }
        for ($i=1;$i<7; $i++){
            ${'wage'.$i}=$setting->set('wage'.$i);
            ${'wage'.$i}=(int)${'wage'.$i};
        }
        if ($ba1<=$a && $ba2>$a){$c=$a+$wage1;}
        if ($ba2<=$a && $ba3>$a){$c=$a+$wage2;}
        if ($ba3<=$a && $ba4>$a){$c=$a+$wage3;}
        if ($ba4<=$a && $ba5>$a){$c=$a+$wage4;}
        if ($ba5<=$a && $ba6>$a){$c=$a+$wage5;}
        if ($ba6<=$a && $ba7>$a){$c=$a+$wage6;}
        if ($a>$ba7){
            $c=50000;
        }
        return $c;

    }
    public function count_student(){
        if ($this->level=='teacher'){
//            return  $this->meets()->where('status','down')->select('student_id')->groupBy('student_id')- ->count();

            return   $this->meets()->where('status','down')-> distinct('student_id') ->count() ;
//            return $this->meets()->where('status','down')->select('student_id')->distinct()->count()/2;
        }  else{
            return 0;
        }
    }
    public function down_class(){
        if ($this->level=='teacher'){
            return $this->meets()->where('status','down')->count();
        }  else{
            return 0;
        }
    }
    public function unreserved_class(){
        if ($this->level=='student'){
            return Count::where('user_id',$this->id)->sum('count');
        }
        if ($this->level=='teacher'){
            return Count::where('teacher_id',$this->id)->sum('count');
        }


    }
    public function passed_class()
    {
        if ($this->level=='student'){
            return Meet::where('student_id',$this->id)->whereNull('pair')->where('status','passed')->count();
        }
        if ($this->level=='teacher'){
            return Meet::where('user_id',$this->id)->whereNull('pair')->where('status','passed')->count();
        }


    }
    public function reserved_class()
    {


        if ($this->level=='student'){
           return    \App\Models\Meet::where('student_id',$this->id)->whereNull('pair')->where('status','reserved')->count();

        }
        if ($this->level=='teacher'){

            return    \App\Models\Meet::where('user_id',$this->id)->whereNull('pair')->where('status','reserved')->count();

        }


    }
    public function  income($int=0){
        $v1 = verta();
        $v = Verta::parse(($v1->year-$int).'-01-01');
        $geo=null;
        $income_year=null;
        $income_year_mony=null;
        for ($i=0;$i<12; $i++){
            $m= $v->addMonths($i);
            $g=Verta::getGregorian($m->year,$m->month,$m->day);
            $geo[]= Carbon::parse($g[0].'-'.$g[1].'-'.$g[2])->toDateTimeString();

        }
        for ($i=0;$i<sizeof($geo); $i++){
            $start=$geo[$i];
            $end=Carbon::parse($geo[$i])->addMonth()->toDateTimeString();
            $income_year[]= $this->bills() ->where('type','deposit_teacher')->whereBetween('created_at',[$start,$end])->get();
        }
        $incomes= $this->bills()->select('amount')->where('type','deposit_teacher')->get();
        $income=0;
        foreach ($income_year as $in){
              $sum=0;
            if ($in->first()){
                foreach ($in as  $i){
                    $sum  +=(int)$i->amount;
                }
            }
        $income_year_mony[]=$sum;
        }
        foreach ($incomes as $in){
            $income  +=(int)$in->amount;
        }


        return ['income_year_mony'=>$income_year_mony, 'income_total'=>$income, 'income_year_total'=>array_sum($income_year_mony),'int'=>$int];
    }
    public function percent(){
        $per=0;
        if ($this->attr('price_plan')){$per+=30;}
        if ($this->attr('time_plan')){$per+=30;}
        if ($this->attr('profile_plan')){$per+=40;}
        return $per;
    }


    public function create_sky_user(){
        if ($this->sky_id){
           return true;
        }
        $params= [
            'username'=> $this->level.'_'.$this->id,
            'password'=>$this->mobile,
            'nickname'=>$this->name??$this->level.'_'.$this->id,
            'status'=>'1',
            "is_public"=>true
        ] ;
        $res=  $this->sky('createUser',$params);
        if ($res['ok']){
            $this->update([
                'sky_id'=>$res['result']
            ]);
            return  true;

        }
        return  true;
    }
    public function create_ski_room($student){
        $exist=$this->rooms()->where('student_id',$student->id)->first();

        $params=[
            'title'=>   ' کلاس خصوصی استاد '.$this->name.'  و دانشجو  '.$student->name  ,
            'name'=>$this->id.'-'.$student->id,
            'student_id'=>$student->id,
            "guest_login"=>false,
            "max_users"=>2,
        ];

//                   $sky_room= $this->sky('createRoom',$params);
        if (!$exist){
            $sky_room= $this->sky('createRoom',$params);
            $error='';
            $key_id='';
            if ($sky_room['ok']){
                $key_id=$sky_room['result'];
            }else{
                $error=$sky_room['error_message'];
            }
            $room= $this->rooms()->create([
                'title'=>   ' کلاس خصوصی استاد '.$this->name.'  و دانشجو  '.$student->name  ,
                'name'=>$this->id.'-'.$student->id,
                'student_id'=>$student->id,
                'code'=>$this->id.'-'.$student->id,
                'error'=>$error,
                'sky_id'=>$key_id
            ]);
        }else{
//            $sky_room_check= $this->sky('createRoom',['room_id'=>$exist->sky_id]);
//            $error='';
//            $key_id='';
//            if (!$sky_room_check['ok']){
//                $sky_room= $this->sky('createRoom',$params);
//
//                if ($sky_room['ok']){
//                    $key_id=$sky_room['result'];
//                }else{
//                    $error=$sky_room['error_message'];
//                }
//            }
//            $exist->update([
//                'error'=>$error,
//                'sky_id'=>$key_id
//            ]);
        }
    }


    public function  education_level(){
        if (
        $this->attr('Starter') ||
        $this->attr('Elementary') ||
        $this->attr('Intermediate') ||
        $this->attr('Advanced') ||
        $this->attr('Mastery') ||
        $this->attr('Upper_intermediate')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_race(){
        if (
        $this->attr('American_Accent') ||
        $this->attr('British_Accent') ||
        $this->attr('Australian_Accent') ||
        $this->attr('Indian_Accent') ||
        $this->attr('Irish_Accent') ||
        $this->attr('Scottish_Accent')||
        $this->attr('South_African_Accent')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_age_education_level(){

        if (
        $this->attr('Children') ||
        $this->attr('Teenagers') ||
        $this->attr('Adults')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_class_content(){
        if (
        $this->attr('Curriculum') ||
        $this->attr('Homework') ||
        $this->attr('Learning_Materials') ||
        $this->attr('Writing_Exercises') ||
        $this->attr('Lesson_Plans') ||
        $this->attr('Proficiency_Assessment') ||
        $this->attr('Quizzes_Tests') ||
        $this->attr('Reading_Exercises')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_class_subject(){
        if (
        $this->attr('Business_English') ||
        $this->attr('Interview_Preparation') ||
        $this->attr('Reading_Comprehension') ||
        $this->attr('Listening_Comprehension') ||
        $this->attr('Speaking_Practice') ||
        $this->attr('Writing_Correction') ||
        $this->attr('Vocabulary_Development') ||
        $this->attr('Grammar_Development') ||
        $this->attr('Academic_English') ||
        $this->attr('Accent_Reduction') ||
        $this->attr('Phonetics') ||
        $this->attr('Colloquial_English') ||
        $this->attr('Phonetics')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_class_english(){
        if (
        $this->attr('TOEFL') ||
        $this->attr('IELTS') ||
        $this->attr('PTE') ||
        $this->attr('GRE') ||
        $this->attr('CELPIP') ||
        $this->attr('Duolingo') ||
        $this->attr('TOEIC') ||
        $this->attr('KET') ||
        $this->attr('PET') ||
        $this->attr('CAE') ||
        $this->attr('FCE') ||
        $this->attr('CPE') ||
        $this->attr('BEC') ||
        $this->attr('TOEFLPhD')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_class_french(){
        if (
        $this->attr('TCF') ||
        $this->attr('TEF') ||
        $this->attr('DELF') ||
        $this->attr('DALF')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_class_german(){
        if (
        $this->attr('Goethe') ||
        $this->attr('Telc') ||
        $this->attr('Test_Daf') ||
        $this->attr('OSD')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_class_turkey(){
        if (
        $this->attr('TOMER') ||
        $this->attr('TYS')
        ){
            return true;
        }
        return false;
    }
    public function  teacher_class_spain(){
        if (
        $this->attr('DELE') ||
        $this->attr('SIELE')
        ){
            return true;
        }
        return false;
    }
    public function perisan_date($date){
        $persian_date= \Carbon\Carbon::parse($date);
        $persian_date= \Hekmatinasser\Verta\Facades\Verta::getJalali($persian_date->format('Y'),$persian_date->format('m'),$persian_date->format('d'));
       return implode('-',$persian_date);
    }
    public function sms_code($temp,$code1=null,$code2=null,$code3=null,$code4=null,$code5=null){

        if ($this->mobile){
            $this->notify(new SendKaveCode( $this->mobile ,$temp,$code1,$code2,$code3,$code4,$code5));
        }
    }
    public function score(){
     $comments=   $this->comments()->where('active','1')->latest()->get();
     $sum=0;
     $ar['per']=0;
     $ar['av']=0;
     $ar['r1']=0;
     $ar['r2']=0;
     $ar['r3']=0;
     $ar['r4']=0;
     $ar['r5']=0;
     $ar['pr1']=0;
     $ar['pr2']=0;
     $ar['pr3']=0;
     $ar['pr4']=0;
     $ar['pr5']=0;
     if ($comments){
         foreach ($comments as $comment){
             $ar['r'.$comment->rate]++;
             $sum+=$comment->rate;
         }
         if ($comments->count()>0){
             for ($i=1;$i<6;$i++){
                 $ar['pr'.$i] =($ar['r'.$i]*100)/$comments->count();
             }
             $ar['av']=$sum/$comments->count();

         }

         $ar['per']= ($ar['av']*100)/5;
     }


    return $ar;

    }

    public function students( ){
        return $this->meets() ->distinct()->count('student_id');
    }

    public function teachers( ){
        return $this->smeets() ->distinct()->count('user_id');
    }
    public function calendar($i ){
        $res=[[4,8],[8,12],[12,16],[16,20],[20,24]];
        $ar=array();
            $day=null;
            for($b=0;$b<7;$b++){
                $day= \Carbon\Carbon::now()->addDays($b);
                $s=$res[$i][0].':00:00';
                $e=$res[$i][1].':00:00';
                if ($e=='24:00:00'){
                    $e='23:59:59';
                }
                $start=$day->year.'-'.$day->month.'-'.$day->day.' '.$s;
                $end=$day->year.'-'.$day->month.'-'.$day->day.' '.$e;
                $count= $this->meets()->where('student_id',null)->where('start','>',Carbon::now())->where('start','>=',$start)->where('start','<',$end)->count();
                $ar['count'][$i][$b]=$count;
                $w=[   'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه', 'شنبه'];

                $v=verta($day);
                $ar['day'][$i] [$b]=$w[$day->dayOfWeek].' '.$v->year.'/'.$v->month.'/'.$v->day;;

            }
        return $ar;
    }

    public function check_active( ){

            if (($this->languages()->count()==0)
            || !$this->attr('port')
            || !$this->attr('save_expert')
            || !$this->attr('time_plan')
            || !$this->attr('price_plan')
            || !$this->attr('port_vid')
            ){
                return false;
            }

         return true;
    }
    public function check_active_status( ){


            if (($this->languages()->count()==0)
            || !$this->attr('port')
            || !$this->attr('save_expert')
            || !$this->attr('time_plan')
            || !$this->attr('price_plan')
            || !$this->attr('port_vid')
            ){
                return redirect(route('teacher.level'));
            }

         return true;
    }
    public function active_comments( ){
        return $this->comments()->where('active','1')->latest()->get();
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
