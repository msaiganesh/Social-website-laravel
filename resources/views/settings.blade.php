@extends('templates.default')

@section('content')

<div>
<ul>
                 
                      
                      <li><a href="{{route('profile.edit')}}">update profile</a></li>
                      <li><a href="{{route('password.edit')}}">change password</a></li>
                    
                      
                      </ul></div>
@stop