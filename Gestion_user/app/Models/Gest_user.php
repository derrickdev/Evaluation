<?php

namespace App\Models;
namespace App\Models;
use HasApiTokens, HasFactory, Notifiable;
use Illuminate\Database\Eloquent\Model;



class Gest_user extends Model
{
    //
     protected $fillable = [
        'gender',
        'title',
        'first',
        'last',
        'location',
        'city',
        'state',
        'country',
        'postcode',
        'coordinates',
        'timezone',
        'email',
        'login',
        'registered',
        'phone',    
        
     ];
}
