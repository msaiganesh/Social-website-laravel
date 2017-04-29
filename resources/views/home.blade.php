
@extends('templates.default')


@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/check.css') }}" />

    <h1><font color="#ededed">Welcome to CareerBind</font></h1>
    <div class="sun">
        <div class="circle"></div>
        <div class="eyes">
            <span class="left"></span>
            <span class="right"></span>
        </div>
        <div class="sunrays">
            <span />
            <span />
            <span />
        </div>
    </div>

    <div class="content-item">

        <div class="overlay"></div>

        <div class="corner-overlay-content">Info</div>

        <div class="overlay-content">
            <h2>CareerBind</h2>
            <p>CareerBind or CB is an online platform that is used by people to build social networks or social relations with other people who share similar personal or career interests, activities, backgrounds or real-life connections.</p>
        </div>

    </div>

@stop