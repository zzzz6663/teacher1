<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable= ['user_id','parent_id','seen','comment','active','rate', 'img' , 'submit' ,  'name' , 'email' , 'commentable_type', 'commentable_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function commentable()
    {
        return $this->morphTo();
}






    public function child(){
        return $this ->hasMany(Comment::class,'parent_id', 'id');
    }
}
