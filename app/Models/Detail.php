<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['realname', 'surname', 'city', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
