<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="UTF-8">
<title>CareerBind</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ URL::asset('css/cv.css') }}" />
</head>
<body>
@include('templates.partials.navigation')
<div class="container">
@include('templates.partials.alerts')
@yield('content')
</div>
</body>
</html>