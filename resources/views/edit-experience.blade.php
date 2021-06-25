@extends("layouts.sidenav")

@section("title","Emp-Experience")

@section("content")
<div class="container-fluid p-0">
<!-- <h1> Can you see the below content? </h1> -->

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<h2>Edit Experience Info</h2>

<div class="row">

<div class="col-lg-6">
<form action="/edit-experience" method="post">
@csrf
<input type="hidden" id="id" name="id" value="{{$experience->id}}"  /> <br>
<input type="hidden" id="empid" name="empid" value="{{$experience->emp_id}}"  /> <br>

<div>
<label for="role">Role: </label>
<input type="text" id="role" name="role" value="{{$experience->designation}}" /> <br>
</div><br>

<div>
<label for="org">Organization: </label>
<input type="text" id="org" name="org" value="{{$experience->organization}}" /> <br>
</div><br>

<div>
<label for="sdate">Start Date: </label>
<input type="date" id="sdate" name="sdate" value="{{$experience->start_date}}" /> <br>
</div><br>

<div>
<label for="edate">End Date: </label>
<input type="date" id="edate" name="edate" value="{{$experience->end_date}}" /> <br>
</div><br>

<div>
<label for="desc">Description: </label>
<input type="text" id="desc" name="desc" value="{{$experience->description}}" /> <br> <br>
</div><br>

<button type="submit" class="btn btn-success">Update</button>

</form>
</div>


</div>

</section>

</div>
@endsection

