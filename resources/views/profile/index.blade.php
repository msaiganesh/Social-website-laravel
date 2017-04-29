@extends('templates.default')

@section('content')

<div class="row">
 <div class="col-lg-5  "> 
 @include('User.partials.userblock')
 
<h4> <a href="{{route('resume.view',['username'=>$user->username])}}" class="btn btn-primary">view resume</a></h4>

 @if (!$statuses->count())
      <p>{{$user->getNameorUsername()}} has'nt posted anything in this timeline, yet.</p>
@else
      @foreach ($statuses as $status)
            <hr>
            <div class="media">
                <a class="pull-left" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
                    <img class="media-object" alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user()->first()->getAvatarUrl() }}">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user()->first()->username]) }}">{{ $status->user()->first()->getNameOrUsername() }}</a></h4>
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
                                      @if ( $status->user_id !== Auth::user()->id&&Auth::user()->isFriendsWith($reply->user) )
                                          <li><a href="{{route('status.like',['statusId'=>$reply->id])}}">Like</a></li>                                         
                                           
                                      @endif
                                      
                                       <li>{{$reply->likes->count()}} {{str_plural('like',$reply->likes->count())}}</li>
                                  </ul>
                              </div>
                          </div>
                    @endforeach

                 
                    <!-- show input textarea to reply to this status -->
                    @if(Auth::user()->isFriendsWith($user)||Auth::user()->id==$status->user->id)
                   
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
                    

                        
                @endif
                 </div>
            </div>
      @endforeach


@endif
 </div>


<div class = "col-lg-4 col-lg-offset-3 ">
      @if (Auth::user()->hasFriendRequestPending($user))
      <p>waiting for {{$user->getNameorUsername()}} to accept your friend request</p>
      @elseif(Auth::user()->hasFriendRequestRecieved($user))
      <a href="{{route('friends.accept',['username'=>$user->username])}}" class="btn btn-primary">accept as friend</a>
      @elseif(Auth::user()->isFriendsWith($user))
      <p>you and {{$user->getNameorUsername()}} are friends</p>
          <a href="{{route('friends.delete',['username'=>$user->username])}}" class="btn btn-primary">delete as friend</a>
        @elseif(Auth::user()->id!==$user->id)
      <a href="{{route('friends.add',['username'=>$user->username])}}" class="btn btn-primary">add as friend</a>
      @endif
       <h4>{{$user->getNameorUsername()}}'s friends</h4>
       @if(!$user->friends()->count())
       <p>{{$user->getNameorUsername()}} has no friends</p>
       @else
       @foreach($user->friends() as $user)
       @include('User.partials.userblock')
       @endforeach
       @endif
       </div>
       </div>
     
       
       @stop   
