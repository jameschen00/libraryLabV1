<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

//class Student extends Model
class Student extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    //
    protected $fillable = [
        'name',
        'pw',
        'email',
        'gentle',
        'sid'     
    ];
    //
    protected $hidden = [
        'pw'
    ];

    // 改變驗證欄位：若無適當對應的預設欄位名稱
    public function findForPassport($username)
    {
       return $this->where('name', $username)->first(); // 欄位: name
    }
    //   
    public function validateForPassportPasswordGrant($password)
    {
       return Hash::check($password, $this->pw);  //欄位: pw
    }
    //
}
