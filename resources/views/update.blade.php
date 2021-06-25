@extends("layouts.sidenav")

@section("title","Emp-Update")

@section("content")
<h1>Employee's Profile</h1> <br>

@if(session()->has("success"))
   <h3>{{ session("success")}}</h3>
@endif

<form action='/update-emp' method="post">
@csrf

<input type="hidden" value="{{$emp_update->id}}" name="emp_id" /> 

<label for="fname">FirstName: </label>
<input type="text" id="fname" name="fname" value="{{$emp_update->fname}}" required/> <br>

<label for="lname">LastName: </label>
<input type="text" id="lname" name="lname" value="{{$emp_update->lname}}" required/> <br>

<p>Gender</p>
<input type="radio" id="male" name="gender" value="male" {{ ($emp_update->gender=="male")? "checked" : "" }} />
<label for="male">male</label> <br>
<input type="radio" id="female" name="gender" value="female" {{ ($emp_update->gender=="female")? "checked" : "" }}/> 
<label for="female">female</label><br>
<input type="radio" id="others" name="gender" value="others" {{ ($emp_update->gender=="others")? "checked" : "" }}/> 
<label for="others">others</label><br>

<label for="email">Email: </label>
<input type="text" id="email" name="email" value="{{$emp_update->email}}" /> <br>

<label for="phone">Phone: </label>
<input type="text" id="phone" name="phone" value="{{$emp_update->phone}}" /> <br>

<label for="desig">Designation: </label>
<input type="text" id="desig" name="desig" value="{{$emp_update->designation}}" /> <br>

<label for="sal">Salary: </label>
<input type="text" id="sal" name="sal" value="{{$emp_update->salary}}" /> <br>

<button type="submit">Update</button>

</form>

@endsection