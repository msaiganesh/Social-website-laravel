@extends('templates.default')


@section('content')
 @include('User.partials.userblock')

@if(!$resume)
<h4>no resume available</h4>

    @else	
    <fieldset>
        <legend>Personal Details</legend>
         <label>Name</label>
        <p>{{$resume->name}}</p>
        <label>  Email</label>
     <p>{{$resume->email}}</p>
       <label>  Phone</label>
       <p>{{$resume->phone}}</p>
        <label>  Current City</label>
      <p>{{$resume->city}}</p>
        
    </fieldset>

    <fieldset>
     <legend>Education</legend>
         <h4><strong>Graduation</strong></h4>
         <h5><strong>Institution</strong></h5>
          <p>{{$resume->college}}</p>
         <h5><strong> Start Year</strong></h5>
          <p>{{$resume->cdate1}}</p>
         <h5><strong>End Year</strong></h5>
          <p>{{$resume->cdate2}}</p>
         <h5><strong>Degree & Stream</strong></h5>
        <p>{{$resume->cstream}}</p>
         <h5><strong>Percentage</strong></h5>
     
       <p>{{$resume->cper}}</p>

       <h4><strong>XII</strong></h4>
         <h5><strong>Institution</strong></h5>
          <p>{{$resume->inter}}</p>
         <h5><strong> Start Year</strong></h5>
          <p>{{$resume->idate1}}</p>
         <h5><strong>End Year</strong></h5>
          <p>{{$resume->idate2}}</p>
         <h5><strong>Degree & Stream</strong></h5>
        <p>{{$resume->istream}}</p>
         <h5><strong>Percentage</strong></h5>
     
       <p>{{$resume->iper}}</p>
         <h4><strong>X</strong></h4>
         <h5><strong>Institution</strong></h5>
          <p>{{$resume->school}}</p>
         <h5><strong> Start Year</strong></h5>
          <p>{{$resume->sdate1}}</p>
         <h5><strong>End Year</strong></h5>
          <p>{{$resume->sdate2}}</p>
         <h5><strong>Degree & Stream</strong></h5>
        <p>{{$resume->sstream}}</p>
         <h5><strong>Percentage</strong></h5>
     
       <p>{{$resume->sper}}</p>
     </fieldset>
     <fieldset>
         <legend>Skills & Interests</legend>
         <label>Skills</label><br>
         <p>{{$resume->skills}}</p><br>
         <legend>Interests & Hobbies</legend><br>
            <p>{{$resume->interests}}</p><br><br>
     </fieldset>
     <fieldset>
         <legend>Work and Experience</legend>
         <label> Job</label><br>
             <p>{{$resume->work}}</p><br><br>
      </fieldset>
     <fieldset>
        
        <legend>Languages Known</legend>
           <p>{{$resume->languages}}</p>
     </fieldset>
     
     <br>
     
@endif
@stop