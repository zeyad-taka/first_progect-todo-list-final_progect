<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // لازم تضيف كل الحقول اللي هتبعتها من Postman هنا
    protected $fillable = ['title', 'description', 'status', 'user_id'];
}