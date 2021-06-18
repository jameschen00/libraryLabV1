<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'sid',
        'title',
        'author',
        'publisher',
        'ISBN',
        'price',
        'ready',
        'pub_date',
        'photo_path'
    ];
    
    //
    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
}
