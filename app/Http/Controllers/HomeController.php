<?php 

namespace CareerBind\Http\Controllers;
use Auth;
use CareerBind\Models\Status;

class HomeController extends Controller
{
public function index()
{


	if(Auth::check()){

		$statuses=Status::notReply()->where(function($query){
			return $query->where('user_id',Auth::user()->id)->orWhereIn('user_id',Auth::user()->friends()->pipe(function ($users){ $arr=[];
				$i=0;
				foreach($users as $user)
				{
					$arr[$i++]=$user->id;
				}

                 return $arr;
			}));

		})->orderBy('created_at','desc')->paginate(10);
	

	
		return view('timeline.index')->with('statuses',$statuses);
	}
return view('home');

}
}






