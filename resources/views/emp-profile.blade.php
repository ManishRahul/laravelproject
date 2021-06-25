@extends("layouts.sidenav")

@section("title","Emp-Profile")

@section("content")
<div class="container-fluid p-0">
<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
<h6>{{session('empid')}}</h6>

<H2>Your Profile</H2><br>
<div>
<label>Fullname: </label>
<input type="text" readOnly="true" value="{{$empObj->fname}} {{$empObj->lname}}" />
</div><br>
<div>
<label>Email: </label>
<input type="text" readOnly="true" value="{{$empObj->email}}" />
</div><br>
<div>
<label>Phone: </label>
<input type="text" readOnly="true" value="{{$empObj->phone}}" />
</div><br>
<div>
<label>Designation: </label>
<input type="text" readOnly="true" value="{{$empObj->designation}}" />
</div><br>
<div>
<label>Salary: </label>
<input type="text" readOnly="true" value="{{$empObj->salary}}" />
</div><br>

</section>
</div>
@endsection
