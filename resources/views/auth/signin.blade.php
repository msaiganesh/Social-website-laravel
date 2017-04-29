@extends('templates.default')

@section('content')
	<link rel="stylesheet" href="{{ URL::asset('css/all.css') }}" />

	<h3 class="main">Sign in</h3>

	<div class="row">
	    <div class="col-lg-6">


	        <form class="form-vertical" role="form" method="post" action="{{ route('auth.signin') }}">

	            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                <label for="email" class="control-label"><h4 class="main">Email</h4></label>
	                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
	                @if ($errors->has('email'))
	                	<span class="help-block">{{ $errors->first('email') }}</span>
	                @endif
	            </div>



	            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                <label for="password" class="control-label"><h4 class="main">Password</h4></label>
	                <input type="password" name="password" class="form-control" id="password" value="">
	                @if ($errors->has('password'))
	                	<span class="help-block">{{ $errors->first('password') }}</span>
	                @endif
	            </div>

	            <div class="checkbox">
	            	<label>
	            		<input type="checkbox" name="remember" id="remember"{{ old('remember') ? ' checked' : '' }}><h4 class="main">Remember me</h4>
	            	</label>
	            </div>

	            <div class="form-group">
                    <button class="btn btn-orange btn-large f4 btn-block" type="submit">Sign in for CarrerBind</button>
	            </div>

	            <input type="hidden" name="_token" value="{{ Session::token() }}">

	        </form>

	        
	    </div>
	</div>

@stop