<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use HasFactory, SoftDeletes;

    //db
    protected $fillable = [
        'food_id', 'user_id', 'quantity', 'total', 'status', 'payment_url'
    ];

    //relation food
    public function food()
    {
        return $this->hasOne(Food::class, 'id', 'food_id');
    }

    //relation user
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    //convert date
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
