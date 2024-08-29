<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable =['user_id','position','gender','shift','image','experience','phone_number','department_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function department()
    { //each doctor belongs to one department
        return $this->belongsTo(Department::class);//many to one
    }
    public function appointments()
    {
         //1 doctor has many appointment
        return $this->hasMany(Appointment::class);//one to many
    }
}
