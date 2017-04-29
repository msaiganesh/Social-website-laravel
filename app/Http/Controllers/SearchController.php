<?php 

namespace CareerBind\Http\Controllers;
use illuminate\Http\Request;
use CareerBind\Models\User;
use CareerBind\Models\Resume;

use DB;
class SearchController extends Controller
{
public function getResults(Request $request)
{

$query=$request->input('query');

if(!$query)
{
	return redirect()->route('home');
}

$resumes=Resume::where('skills','LIKE',"%{$query}%")->get();
$arr=[];
$i=0;
foreach( $resumes as $resume)
{
						$arr[$i++]=$resume->user_id;
			

}
$users=User::Where(DB::raw("CONCAT(firstname,' ',lastname)"),'LIKE',"%{$query}%")->orWhere('username','LIKE',"%{$query}%")->orWhereIn('id',$arr)->get();


return view('search.results')->with('users',$users);

}
}



