<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Patient",
 *     type="object",
 *     title="Patient",
 *     required={"address", "number", "age", "birth_date", "gender"},
 *     @OA\Property(property="id", type="integer", format="int64"),
 *     @OA\Property(property="user_id", type="integer", format="int64"),
 *     @OA\Property(property="address", type="string"),
 *     @OA\Property(property="number", type="string"),
 *     @OA\Property(property="age", type="integer", format="int32"),
 *     @OA\Property(property="birth_date", type="string", format="date"),
 *     @OA\Property(property="gender", type="string"),
 *     @OA\Property(property="description", type="string")
 * )
 */
class Patient extends Model
{
    use HasFactory;
    protected $guarded =[];
    // protected $fillable =['user_id','address','number','age','birth_date','gender','description'];
    public function user():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function appointments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
