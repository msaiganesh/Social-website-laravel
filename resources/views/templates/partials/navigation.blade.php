<link rel="stylesheet" href="{{ URL::asset('css/header.css') }}" />
<nav class="navbar navbar-default header " role="navigation">
        <div class="container">
             <div class="navbar-header">
             <a class="navbar-brand" href="{{route('home')}}">CareerBind</a>
             </div>

             <div class="collapse navbar-collapse">
             @if(Auth::check())
             <ul class= "nav navbar-nav">
             <li><a href="{{route('home')}}">Timeline</a></li>
             <li><a href="{{route('friends.index')}}"> Friends</a></li>
             </ul>
             <form class="navbar-form navbar-left" role="search" action="{{route('search.results')}}">
             <div class="form-group">
             <input type="text" name="query" class="form-control" placeholder="find  people">
             </div>
             <button type="submit" class="btn btn-default">Search</button>
             </form>
             @endif
             <ul class="nav navbar-nav navbar-right">
                      @if(Auth::check())
                      <li><a href="{{route('profile.index',['username'=>Auth::User()->username])}}">{{Auth::User()->getNameorUsername()}}</a></li>
                      <li><a href="{{route('settings.get')}}">settings</a></li>
                      <li><a href="{{route('resume.edit')}}">update resume</a></li>
                      <li><a href="{{route('auth.signout')}}">signout</a></li>
                      @else
                      <li><a href="{{route('auth.signup')}}">sign up</a></li>
                      <li><a href="{{route('auth.signin')}}">sign in</a></li>
                      @endif
                      </ul>
                      </div>
                      </div>
                      </nav>
                      



