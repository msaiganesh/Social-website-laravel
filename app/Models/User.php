<?php

namespace CareerBind\Models;

use CareerBind\Models\Status;
use CareerBind\Models\Like;
use CareerBind\Models\Resume;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'location', 
        'firstname', 
        'lastname', 
        'email', 
        'password'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName()
    {

        if($this->firstname&&$this->lastname)
        {
            return "{$this->firstname} {$this->lastname}";
        }
        if($this->firstname)
        {
             return $this->firstname;
        }

}
public function getNameorUsername()
{
return $this->getName()?:$this->username;



}

public function getAvatarurl()
{
    return "https://www.gravatar.com/avatar/{{md5($this->email)}}?d=mm&s=40";
}

public function statuses()
{
    return $this->hasMany('CareerBind\Models\Status','user_id');
}
    
public function friendsOfMine()
{
    return $this->belongsToMany('CareerBind\Models\User','friends','user_id','friend_id'); 
}

public function friendOf()
{
    return $this->belongsToMany('CareerBind\Models\User','friends','friend_id','user_id'); 
}
public function friends()
{
    return $this->friendsOfMine()->wherePivot('accepted',true)->get()->merge($this->friendOf()->wherePivot('accepted',true)->get()); 
}


public function friendRequests()
{
  return $this->friendsOfMine()->wherePivot('accepted',false)->get();


}
public function friendRequestPending()

{

return $this->friendOf()->wherePivot('accepted',false)->get();


}
 public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestPending()->where('id', $user->id)->count();
    }
public function hasFriendRequestRecieved(User $user)

{

return (bool) $this->friendRequests()->where('id',$user->id)->count();


}
public function addFriend( $user)
{

return $this->friendOf()->attach($user->id);

}
public function deleteFriend( $user)
{

 $this->friendOf()->detach($user->id);
 $this->friendsOfMine()->detach($user->id);

}
public function acceptFriendRequest(User $user)

{

return  $this->friendRequests()->where('id',$user->id)->first()->pivot->update(['accepted'=>true]);


}
public function isFriendsWith(User $user)
{  

 return (bool) $this->friends()->where('id',$user->id)->count();
}

public function hasLikedStatus(Status $status)
{


return (bool) $status->likes->where('user_id',$this->id)->count();

}

public function likes()
{
return $this->hasMany('CareerBind\Models\Like','user_id');

}
public function resumes()
{
return $this->hasOne('CareerBind\Models\Resume','user_id');

}


}


