<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regforms extends Model
{
    use HasFactory;

    protected $table = "regforms";
     protected $fillable = array(
            'name'     ,
            'gender'    ,
            'company' ,
            'role'     ,
            'email'    ,
            'mobile' ,
            'whatsapp'  ,   
            'date_commencing'   
    );
}
