	
@extends('templates.default')

@section('content')

	<h3>Timeline</h3>

	<div class="row">
	    <div class="col-lg-6">
			<form role='form' action="{{route('status.post')}}" method="post" >
			<div class="form-group{{$errors->has('status')? ' has-error':' '}}">
			<textarea placeholder="whats's up ?" name="status" class="form-control" tows="2"></textarea>
			@if($errors->has('status'))
			<span class="help-block">{{$errors->first('status')}}</span>
			@endif
			</div>

			<button type="submit" class="btn btn-default">update status</button>
			 <input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
			<hr>
	    </div>
	</div>

	<div class="row">
	    <div class="col-lg-5">
		
<!-- shows statuses and replies plus reply forms for each status -->

@if (!$statuses->count())
	<p>There is nothing in this timeline, yet.</p>
@else
	@foreach ($statuses as $status)
		<hr>
		<div class="media">
		    <a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
		        <img class="media-object" alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user()->first()->getAvatarUrl() }}">
		    </a>
		    <div class="media-body">
		        <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user()->first()->username]) }}">{{ $status->user()->get()->first()->getNameOrUsername() }}</a></h4>
		        <p>{{ $status->body }}</p>
		        <ul class="list-inline">
		            <li>{{ $status->created_at->diffForHumans() }}</li>
                    @if ( $status->user_id !== Auth::user()->id&&Auth::user()->isFriendsWith($status->user) )
		            	<li><a href="{{route('status.like',['statusId'=>$status->id])}}">Like</a></li>
		            	
	            	@endif
		            <li>{{$status->likes->count()}} {{str_plural('like',$status->likes->count())}}</li>
		        </ul>

		        @foreach ( $status->replies()->get() as $reply )
			        <div class="media">
			            <a class="pull-left" href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
			                <img class="media-object" alt="{{ $reply->user->getNameOrUsername() }}" src="{{ $reply->user->getAvatarUrl() }}">
			            </a>
			            <div class="media-body">
			                <h5 class="media-heading"><a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">{{ $reply->user->getNameOrUsername() }}</a></h5>
			                <p>{{ $reply->body }}</p>
			                <ul class="list-inline">
			                    <li>{{ $reply->created_at->diffForHumans() }}.</li>
			                    @if( $reply->user_id !== Auth::user()->id&&Auth::user()->isFriendsWith($reply->user) )
			                    	<li><a href="{{route('status.like',['statusId'=>$reply->id])}}">Like</a></li>
			                     
			                    @endif
			                    <li>{{$reply->likes->count()}} {{str_plural('like',$reply->likes->count())}}</li>
			                </ul>
			            </div>
			        </div>
		        @endforeach

		     
		        <!-- show input textarea to reply to this status -->
		       
			        <form role="form" action="{{route('status.reply',['statusId'=>$status->id])}}" method="post">
			           <div class="form-group{{$errors->has("reply-{$status->id}")? ' has-error':' '}}">
			                <textarea name="reply-{{ $status->id }}" class="form-control" rows="2" 
		                	 	 placeholder="Reply to this status"></textarea>
		                	 	 @if($errors->has("reply-{$status->id}"))
		                	 	 <span class="help-block">{{$errors->first("reply-{$status->id}")}}</span>
		                	 	 @endif	
			              
			            </div>
			            <input type="submit" value="Reply" class="btn btn-default btn-sm">
			            <input type="hidden" name="_token" value="{{ Session::token() }}">
			        </form>
		        

		    </div>
		</div>
	@endforeach

	{!! $statuses->render() !!}

@endif

	    </div>
	</div>


@stop