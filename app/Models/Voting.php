<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'sid',
        'bid',
        'voting_date'
    ];
    
    //
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    //
    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
}
