<?php 

namespace CareerBind\Http\Controllers;
use illuminate\Http\Request;
use CareerBind\Models\User;
use Auth;
class AuthController extends Controller
{
public function getSignup()
{
return view('auth.signup');
}
public function postSignup(Request $request)
{
 $this->validate($request,[
 	'email'=>'required|unique:users|email|max:255','username'=>'required|unique:users|alpha_dash|max:20','password'=>'required|min:6',
           ]);
 user::create([
    'email'=>$request->input('email'),
    'username'=>$request->input('username'),
    'password'=>bcrypt($request->input('password')),
    

 	]);
 return redirect()
			->route('home')
			->withInfo( 'Your account has been created and you can now sign in.'
				);}
public function getSignin()
{

return view('auth.signin');

}
public function postSignin(Request $request)
{
 $this->validate($request ,['email'=>'required','password'=>'required']);
 if(!Auth::attempt($request->only(['email','password']),$request->has('remember')))
 {
      return redirect()->back()->withInfo('could not sign you in');

 }
return redirect()->route('home')->withInfo('you are signed in');

}
public function getSignout()
{
	Auth::logout();

	return redirect()->route('home');


}

}

