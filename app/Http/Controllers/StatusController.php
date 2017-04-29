<?php 

namespace CareerBind\Http\Controllers;
use illuminate\Http\Request;
use CareerBind\Models\User;
use CareerBind\Models\Status;
use Auth;

class StatusController extends Controller
{
public function postStatus(Request $request)
{
    $this->validate($request,[
    	'status'=>'required|max:1000']);
    
    Auth::user()->statuses()->create(['body'=>$request->input('status')]);

    return redirect()->route('home')->withInfo(' your status is posted');

	

}


public function postReply(Request $request,$statusId)
{

 $this->validate($request,[
    	"reply-{$statusId}"=>'required|max:1000'],['required'=>'reply body is required']);
 $status=Status::notReply()->where('id',$statusId)->first();
 if(!$status)
 {
 	return redirect()->route('home');
 }

if(!Auth::user()->isFriendsWith($status->user()->first()) && Auth::user()->id!==$status->user->id)
 {
 	return redirect()->route('home');
 }
 $reply= Auth::user()->statuses()->create(['body'=>$request->input("reply-{$statusId}")]);
 $status->replies()->save($reply);

return redirect()->route('home');
}
public function getLike($statusId)
{

$status=Status::find($statusId);
if(!$status)
{
	return redirect()->route('home');
}
if(!Auth::user()->isFriendsWith($status->user))
{
return redirect()->route('home');

}
if(Auth::user()->hasLikedStatus($status))
{
	return redirect()->back();
}
	
Auth::user()->likes()->save($status->likes()->create([]));
return redirect()->back();
}
}

