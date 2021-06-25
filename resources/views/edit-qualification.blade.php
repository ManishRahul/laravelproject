@extends("layouts.sidenav")

@section("title","Edit-Qualification")

@section("content")
<div class="container-fluid p-0">
<!-- <h1> Can you see the below content? </h1> -->

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<H2>Edit Qualificaiton Info</H2>

<div class="row">
<div class="col-lg-6">
<form action="/edit-qualification" method="POST">
@csrf
<input type="hidden" id="id" name="id" value="{{$qualification->id}}" required/> <br>
<input type="hidden" id="empid" name="empid" value="{{$qualification->emp_id}}" required/> <br>

<div>
<label for="dtype">Degree type: </label>
<input type="text" id="dtype" name="dtype" value="{{$qualification->degreetype}}" required/> <br>
</div>

<div>
<p>Pursuing:</p>
<input type="radio" id="yes" name="pursuing" value="yes" {{ ($qualification->pursuing=="yes")? "checked" : "" }} />
<label for="yes">Yes</label> <br>
<input type="radio" id="no" name="pursuing" value="no" {{ ($qualification->pursuing=="no")? "checked" : "" }} /> 
<label for="no">No</label><br>
</div>

<div>
<label for="college">College: </label>
<input type="text" id="college" name="college" value="{{$qualification->college}}" required/> <br>
</div><br>

<div>
<label for="degree">Degree: </label>
<input type="text" id="degree" name="degree" value="{{$qualification->degree}}" required/> <br>
</div><br>

<div>
<label for="stream">Stream: </label>
<input type="text" id="stream" name="stream" value="{{$qualification->stream}}" required/> <br>
</div><br>

<div>
<label for="marks">Performance: </label>
<input type="text" id="marks" name="marks" value="{{$qualification->performance}}" required/> <br> <br>
</div>

<button type="submit" class="btn btn-success">Update</button>

</form>
</div>


</div>

</section>

</div>
@endsection

