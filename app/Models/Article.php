<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'body', 'user_id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function getRouteKeyName()
    {
        return 'title';
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
