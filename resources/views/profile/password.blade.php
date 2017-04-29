@extends('templates.default')

@section('content')

	<h3>change your password</h3>

	<div class="row">
			<div class="col-lg-6">


				<form class="form-vertical" role="form" method="post" action="{{ route('password.edit') }}">

					<div class="row">

						<div class="col-lg-6">
							<div class="form-group{{ $errors->has('password1') ? ' has-error' : '' }}">
								<label for="password1" class="control-label">enter your new password</label>
								<input type="password" name="password1" class="form-control"  >
				                @if ($errors->has('password1'))
				                	<span class="help-block">{{ $errors->first('password1') }}</span>
				                @endif
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group{{ $errors->has('password2') ? ' has-error' : '' }}">
								<label for="password2" class="control-label">reenter your new password</label>
								<input type="password" name="password2" class="form-control"  >
				                @if ($errors->has('password2'))
				                	<span class="help-block">{{ $errors->first('password2') }}</span>
				                @endif
							</div>
						</div>

					</div>

					
					<div class="form-group">
						<button type="submit" class="btn btn-default">change</button>
					</div>

					<input type="hidden" name="_token" value="{{ Session::token() }}" >

				</form>


			</div>
		</div>	

@stop