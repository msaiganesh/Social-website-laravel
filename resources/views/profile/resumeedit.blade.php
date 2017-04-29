@extends('templates.default')

@section('content')



    	<form class="form-vertical" role="form" method="post" action="{{ route('resume.edit') }}">
    <fieldset>
        <legend>Personal Details</legend>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
         <label>Name</label>
        <input type="text" placeholder="Enter your full name here" name="name" size="50" >
             @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif</div>
         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">                       
        <label>  Email</label>
        <input type="email" placeholder="Enter valid email" name="email" size="50" required><br><br>
          @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif</div>
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">     
       <label>  Phone</label>
       <input type="tel" placeholder="phone_number" name="phone" size="12" required>
        @if ($errors->has('phone'))
                                    <span class="help-block">{{ $errors->first('phone') }}</span>
             @endif</div>
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">     

        <label>  Current City</label>
        <input type="text" placeholder="Enter your current city here" name="city" size="60" required><br><br>
           @if ($errors->has('city'))
                                    <span class="help-block">{{ $errors->first('city') }}</span>
             @endif</div>
    </fieldset>

    <fieldset>
     <legend>Education</legend>
         <h5><em>Graduation</em></h5>
         <label>Institution</label>
         <input type="text" placeholder="Enter Institution name" name="college" size="80" required><br><br>
         <label> Start Year</label>
         <input type="date"  name="cdate1" required>
         <label> End Year</label>
         <input type="date"  name="cdate2" required><br><br>
         <label>Degree & Stream</label>
         <input type="text" placeholder="Enter your degree and stream here" name="cstream" size="50" required><br>
         <h5><strong>Performance<strong><h5>
         <select>
             <option value="percentage">Percentage</option>
          
         </select>
         <input type="text" placeholder="Score" name="cper" size="5" required>

         <h5><em>XII</em></h5>
         <label>Institution</label>
         <input type="text" placeholder="Enter Institution name" name="inter" size="80" required><br><br>
       <label> Start Year</label>
         <input type="date"  name="idate1" required>
         <label> End Year</label>
         <input type="date"  name="idate2" required><br><br>
         <label>Degree & Stream</label>
         <input type="text" placeholder="Enter your degree and stream here" name="istream" size="50" required><br>
         <h5><strong>Performance<strong><h5>
         <select>
             <option value="percentage">Percentage</option>
             
         </select>
         <input type="text" placeholder="Score" name="iper" size="5" required>
         <h5><em>X</em></h5>
         <label>Institution</label>
         <input type="text" placeholder="Enter Institution name" name="school" size="80" required><br><br>
       <label> Start Year</label>
         <input type="date"  name="sdate1" required>
         <label> End Year</label>
         <input type="date"  name="sdate2" required><br><br>
         <label>Degree & Stream</label>
         <input type="text" placeholder="Enter your degree and stream here" name="sstream" size="50" required><br><br>
         <h5><strong>Performance<strong><h5>
         <select>
             <option value="percentage">Percentage</option>
          
         </select>
         <input type="text" placeholder="Score" name="sper" size="5" required>
     </fieldset>
     <fieldset>
         <legend>Skills & Interests</legend>
         <label>Skills</label><br>
         <textarea rows="5" cols="50" name="skills" required></textarea><br>
         <legend>Interests & Hobbies</legend><br>
         <textarea rows="5" cols="50" name="interests"></textarea><br>
     </fieldset>
     <fieldset>
         <legend>Work and Expereience</legend>
         <label> Job</label><br>
         <textarea rows="5" cols="50" name="work"></textarea><br>
      </fieldset>
     <fieldset>
        
        <label>Languages Known</label><br>
         <textarea rows="6" cols="30" name="languages"></textarea>
     </fieldset>
     
     <br>
     	<div class="form-group">
						 <center><button type="submit" class="btn btn-default">Update</button></center>
					</div>
     <input type="hidden" name="_token" value="{{ Session::token() }}" >
    </form>
   

@stop