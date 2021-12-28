<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable=['name','img','active','en'];
    public function users(){
        return $this->belongsToMany(User::class,)->withPivot(['status','level']);;
    }
}
