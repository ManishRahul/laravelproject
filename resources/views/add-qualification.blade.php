@extends("layouts.sidenav")

@section("title","Emp-Qualification")

@section("content")
<div class="container-fluid p-0">
<!-- <h1> Can you see the below content? </h1> -->

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<H2>Qualification Info</H2>

<div class="row">
<div class="col-lg-6">
<div id="box">
<a id="button"><i class="fa fa-plus-square-o fa-2x" aria-hidden="true"></i> Add Qualification</a>
<form action="add-qualify" method="POST" id="form">
@csrf
<input type="hidden" id="empid" name="empid" value="{{session('empid')}}" required/> <br>

<div>
<label for="dtype">Degree type: </label>
<input type="text" id="dtype" name="dtype"  />
@error("dtype")
   <span class="error">{{ $message }}</span>
@enderror <br>
</div>

<div>
<p>Pursuing:</p>
<input type="radio" id="yes" name="pursuing" value="yes" />
<label for="yes">Yes</label> <br>
<input type="radio" id="no" name="pursuing" value="no" /> 
<label for="no">No</label><br>
@error("pursuing")
   <span class="error">{{ $message }}</span>
@enderror
</div>

<div>
<label for="college">College: </label>
<input type="text" id="college" name="college"  /> 
@error("college")
   <span class="error">{{ $message }}</span>
@enderror<br>
</div><br>

<div>
<label for="degree">Degree: </label>
<input type="text" id="degree" name="degree"  /> 
@error("degree")
   <span class="error">{{ $message }}</span>
@enderror<br>
</div><br>

<div>
<label for="stream">Stream: </label>
<input type="text" id="stream" name="stream"  /> 
@error("stream")
   <span class="error">{{ $message }}</span>
@enderror<br>
</div><br>

<div>
<label for="marks">Performance: </label>
<input type="text" id="marks" name="marks"  /> 
@error("marks")
   <span class="error">{{ $message }}</span>
@enderror<br> <br>
</div>

<button type="submit" class="btn btn-success">Add</button>

</form>
</div>
</div>

<div class="col-lg-6">
@foreach($qualifications as $qualification)
<h6>{{$qualification->id}}</h6>
<p>{{$qualification->degreetype}}</p>
<p>{{$qualification->degree}}</p>
<p>{{$qualification->college}}</p>
<p>{{$qualification->performance}}</p>
<a href="show-qualification-to-edit/{{$qualification->id}}"><i class="fa fa-pencil" aria-hidden="true">edit</i></a>
<a href="delete-qualification/{{$qualification->id}}"><i class="fa fa-trash" aria-hidden="true">delete</i></a>
@endforeach
</div>

</div>

</section>

</div>
<script>
$("#button").click(function() {  
  $("#box form").toggle("slow");
  return false;
});
</script>
@endsection

