<?php 

namespace CareerBind\Http\Controllers;
use illuminate\Http\Request;
use CareerBind\Models\User;
use Auth;

class FriendsController extends Controller
{


public function getIndex()
{

$friends=Auth::user()->friends();
$requests=Auth::user()->friendRequests();


return view('friends.index')->with('friends',$friends)->with('requests',$requests );

}
public function getAdd($username)
{

	$user=User::where('username',$username)->first();
	if(!$user)
	{
		return redirect()->route('home')->withInfo('no such user exists');
	}

	if(Auth::user()->id===$user->id)
	{
		return redirect()->route('home');
	}
	if(Auth::user()->hasFriendRequestPending($user)||Auth::user()->hasFriendRequestRecieved($user))
	{

return redirect()->route('profile.index',['username'=>$user->username])->withInfo('friend request is pending');

	}
		if(Auth::user()->isFriendsWith($user))
	{

return redirect()->route('profile.index',['username'=>$user->username])->withInfo('you are already Friends');

	}
	Auth::user()->addFriend($user);

return redirect()->route('profile.index',['username'=>$user->username])->withInfo('friend request sent');	
}

public function getAccept($username)
{

	$user=User::where('username',$username)->first();
	if(!$user)
	{
		return redirect()->route('home')->withInfo('no such user exists');
	}
	if(!Auth::user()->hasFriendRequestRecieved($user))
	{
		return redirect()->route('home');


	}

	Auth::user()->acceptFriendRequest($user);
	return redirect()->route('profile.index',['username'=>$user->username])->withInfo('you are now friends');	

}
public function getDelete($username)
{
$user=User::where('username',$username)->first();

if(!Auth::user()->isFriendsWith($user))
	{

return redirect()->back();

	}

	Auth::user()->deleteFriend($user);
	return redirect()->back();
}


}