@extends("layouts.sidenav")

@section("title","Emp-Add")

@section("content")
<div class="container-fluid p-0">

@if(session()->has("success"))
   <h3>{{ session("success")}}</h3>
@endif



<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<H2>Add an Employee</H2>

<div class="row">
<div class="col-lg-6">
<form action="storeemp" method="post">
@csrf
<label for="fname">FirstName: </label>
<input type="text" id="fname" name="fname" /> <br>
@error("fname")
   <span class="error">{{ $message }}</span>
@enderror
 
<br>
<label for="lname">LastName: </label>
<input type="text" id="lname" name="lname" /> <br>
@error("lname")
   <span class="error">{{ $message }}</span>
@enderror

<p>Gender:</p>
<input type="radio" id="male" name="gender" value="male" />
<label for="male">male</label> <br>
<input type="radio" id="female" name="gender" value="female" /> 
<label for="female">female</label><br>
<input type="radio" id="others" name="gender" value="others" /> 
<label for="others">others</label><br>
@error("gender")
   <span class="error">{{ $message }}</span>
@enderror
<br>

<label for="email">Email: </label>
<input type="text" id="email" name="email"  /> <br>
@error("email")
   <span class="error">{{ $message }}</span>
@enderror
<br>

<label for="phone">Phone: </label>
<input type="text" id="phone" name="phone"  /> <br>
@error("phone")
   <span class="error">{{ $message }}</span>
@enderror
<br>

<label for="desig">Designation: </label>
<input type="text" id="desig" name="desig"  /> <br>
@error("desig")
   <span class="error">{{ $message }}</span>
@enderror
<br>

<label for="sal">Salary: </label>
<input type="text" id="sal" name="sal"  /> <br>
@error("sal")
   <span class="error">{{ $message }}</span>
@enderror
<br>

<button type="submit" class="btn btn-success">Save</button>
<a href="/import-form" class="btn btn-secondary">Import</a>

</form>
</div>
</div>

</section>

</div>
@endsection