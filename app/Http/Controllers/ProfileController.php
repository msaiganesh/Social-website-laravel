<?php 

namespace CareerBind\Http\Controllers;
use illuminate\Http\Request;
use CareerBind\Models\User;
use CareerBind\Models\Resume;
use Auth;

class ProfileController extends Controller
{
	public function getProfile($username)
	{

$user = User::Where('username',$username)->first();
if(!$user)
{
 abort(404);

}
$statuses=$user->statuses()->notReply()->get();
 return view('profile.index')->with('user',$user)->with('statuses',$statuses);


	}
public function getEdit()
{
return view('profile.edit');


}
public function postEdit(Request $request)
{
 
$this->validate($request,[
'firstname'=>'alpha|max:50',
'lastname'=>'alpha|max:50',
'location'=>'max:20'

	]);

Auth::user()->update([
'firstname'=>$request->input('firstname'),
'lastname'=>$request->input('lastname'),
'location'=>$request->input('location'),


	]);
return redirect()->route('profile.edit')->withInfo('your profile has been updated');


	
}

	public function viewResume($username)
	{
		$user = User::Where('username',$username)->first();
if(!$user)
{
 abort(404);

}
		$resume=$user->resumes()->first();
		
return view('profile.resume')->with('resume',$resume)->with('user',$user);

	}

	public function getResume()
	{
		
return view('profile.resumeedit');

	}

public function postResume(Request $request)
{
	$this->validate($request,[
'name'=>'required',
'phone'=>'required|numeric',
'email'=>'required|email',
'city'=>'required',
'college'=>'required',
'cdate1'=>'required',
'cdate2'=>'required',
'cstream'=>'required',
'cper'=>'required',
'inter'=>'required',
'idate1'=>'required',
'idate2'=>'required',
'istream'=>'required',
'iper'=>'required',
'school'=>'required',
'sdate1'=>'required',
'sdate2'=>'required',
'sstream'=>'required',
'sper'=>'required',
'skills'=>'required',
'interests'=>'required',
'work'=>'required',
'languages'=>'required',
	]);

 
if(!Auth::user()->resumes()->count())
{Auth::user()->resumes()->create([
'name'=>$request->input('name'),
'phone'=>$request->input('phone'),
'email'=>$request->input('email'),
'city'=>$request->input('city'),
'college'=>$request->input('college'),
'cdate1'=>$request->input('cdate1'),
'cdate2'=>$request->input('cdate2'),
'cstream'=>$request->input('cstream'),
'cper'=>$request->input('cper'),
'inter'=>$request->input('inter'),
'idate1'=>$request->input('idate1'),
'idate2'=>$request->input('idate2'),
'istream'=>$request->input('istream'),
'iper'=>$request->input('iper'),
'school'=>$request->input('school'),
'sdate1'=>$request->input('sdate1'),
'sdate2'=>$request->input('sdate2'),
'sstream'=>$request->input('sstream'),
'sper'=>$request->input('sper'),
'skills'=>$request->input('skills'),
'interests'=>$request->input('interests'),
'work'=>$request->input('work'),
'languages'=>$request->input('languages'),
	]);}else {
	Auth::user()->resumes()->update([
'name'=>$request->input('name'),
'phone'=>$request->input('phone'),
'email'=>$request->input('email'),
'city'=>$request->input('city'),
'college'=>$request->input('college'),
'cdate1'=>$request->input('cdate1'),
'cdate2'=>$request->input('cdate2'),
'cstream'=>$request->input('cstream'),
'cper'=>$request->input('cper'),
'inter'=>$request->input('inter'),
'idate1'=>$request->input('idate1'),
'idate2'=>$request->input('idate2'),
'istream'=>$request->input('istream'),
'iper'=>$request->input('iper'),
'school'=>$request->input('school'),
'sdate1'=>$request->input('sdate1'),
'sdate2'=>$request->input('sdate2'),
'sstream'=>$request->input('sstream'),
'sper'=>$request->input('sper'),
'skills'=>$request->input('skills'),
'interests'=>$request->input('interests'),
'work'=>$request->input('work'),
'languages'=>$request->input('languages'),
	]);
		
	}
return redirect()->route('resume.edit')->withInfo('your resume has been updated');


	
}


public function settingsGet()
{

return view('settings');

}
public function getPasswordEdit()
{
return view('profile.password');


}
public function postPasswordEdit(Request $request)
{
 
$this->validate($request,[
 	'password1'=>'required|min:6',
 	'password2'=>'required|min:6',
           ]);
if($request->input('password1')==$request->input('password2'))
{
	$error=false;
}
else
{$error=true;
}
if(!$error){
Auth::user()->update([
 'password'=>bcrypt($request->input('password1'))


	]);}else
{
	return redirect()->route('password.edit')->withInfo('both passwords should match');
}
return redirect()->route('home')->withInfo('your password has been updated');


	
}



}