@extends('templates.default')

@section('content')

	<h3>Update your profile</h3>

	<div class="row">
			<div class="col-lg-6">


				<form class="form-vertical" role="form" method="post" action="{{ route('profile.edit') }}">

					<div class="row">

						<div class="col-lg-6">
							<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
								<label for="firstname" class="control-label">First name</label>
								<input type="text" name="firstname" class="form-control" id="firstname" value="{{ old('firstname') ?: Auth::user()->firstname }}">
				                @if ($errors->has('firstname'))
				                	<span class="help-block">{{ $errors->first('firstname') }}</span>
				                @endif
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
								<label for="lastname" class="control-label">Last name</label>
								<input type="text" name="lastname" class="form-control" id="lastname" value="{{  old('lastname') ?: Auth::user()->lastname }}">
				                @if ($errors->has('lastname'))
				                	<span class="help-block">{{ $errors->first('lastname') }}</span>
				                @endif
							</div>
						</div>

					</div>

					<div class="form_group{{ $errors->has('location') ? ' has-error' : '' }}">
						<label for="location" class="control-label">Location</label>
						<input type="text" name="location" class="form-control" id="location" value="{{ old('location') ?: Auth::user()->location }}">
		                @if ($errors->has('location'))
		                	<span class="help-block">{{ $errors->first('location') }}</span>
		                @endif
					</div><br>

					<div class="form-group">
						<button type="submit" class="btn btn-default">Update</button>
					</div>

					<input type="hidden" name="_token" value="{{ Session::token() }}" >

				</form>


			</div>
		</div>	

@stop