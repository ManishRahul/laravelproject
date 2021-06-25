@extends("layouts.sidenav")

@section("title","Edit Family Info")

@section("content")
<div class="container-fluid p-0">
<!-- <h1> Can you see the below content? </h1> -->

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<H2>Edit Family Info</H2>

<div class="row">
<div class="col-lg-6">

<form action="/edit-relation" method="POST">
@csrf
<input type="hidden" id="id" name="id" value="{{$relation->id}}" required/> <br>
<input type="hidden" id="empid" name="empid" value="{{$relation->emp_id}}" required/> <br>

<div>
<label for="name">Name: </label>
<input type="text" id="name" name="name" value="{{$relation->name}}" required/> <br>
</div><br>

<div>
<label for="relation">Relation: </label>
<input type="text" id="relation" name="relation" value="{{$relation->relation}}" required/> <br>
</div><br>

<div>
<label for="age">Age: </label>
<input type="text" id="age" name="age" value="{{$relation->age}}" required/> <br>
</div><br>

<div>
<label for="job">Job: </label>
<input type="text" id="job" name="job" value="{{$relation->job}}" required/> <br>
</div><br>

<button type="submit" class="btn btn-success">Update</button>

</form>
</div>


</div>
</section>

</div>

@endsection

