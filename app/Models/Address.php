<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'address','birth','passport_n','identification_n','user_id','phone','city'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
