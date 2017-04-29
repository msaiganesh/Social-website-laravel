<?php

namespace CareerBind\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Status extends Model{

protected $table='statuses';


protected $fillable=[
'body'
];


public function user()
{

	return $this->belongsTo('CareerBind\Models\User','user_id');
}
public function scopeNotReply($query)
{
return $query->whereNull('parent_id');

} 
public function replies()
{
	return $this->hasMany('CareerBind\Models\Status','parent_id');
}
public function likes()
{

   return $this->morphMany('CareerBind\Models\Like','likeable');

}

}