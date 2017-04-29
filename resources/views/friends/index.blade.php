@extends('templates.default')

@section('content')
 <div class="row">
 <div class="col-lg-6">
      <h3>your friends</h3>
 @if(!$friends->count())
       <p>you have no friends</p>
       @else
       @foreach($friends as $user)
       @include('User.partials.userblock')
       @endforeach
       @endif
      </div>
      <div class="col-lg-6">
       <h4>friend requests</h4>
       @if(!$requests->count())
       <p>you have no friend requests</p>
       @else
       @foreach($requests as $user)
       @include('User.partials.userblock')
       @endforeach
       @endif

       </div>
       </div>
  @stop