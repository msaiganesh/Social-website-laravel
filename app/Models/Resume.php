<?php

namespace CareerBind\Models;

use CareerBind\Models\Status;
use CareerBind\Models\Like;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Resume extends Model implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resumes';

 protected $fillable = [
        'email', 'phone','name','city','college','cdate1','cdate2','cstream','cper','inter','idate1','idate2','istream','iper','school','sdate1','sdate2','sstream','sper','skills','interests','work','languages'
      
    ];

}
