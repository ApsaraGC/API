<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable =[
        'doctor_id',
        'available_from',
        'available_to',
    ];
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
