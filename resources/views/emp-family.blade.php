@extends("layouts.sidenav")

@section("title","Emp-Family")

@section("content")
<div class="container-fluid p-0">
<!-- <h1> Can you see the below content? </h1> -->

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<H2>Family Info</H2>

<div class="row">
<div class="col-lg-6">
<div id="box">
<a id="button"><i class="fa fa-plus-square-o fa-2x" aria-hidden="true"></i> Add Qualification</a>
<form action="add-family" method="POST">
@csrf
<input type="hidden" id="empid" name="empid" value="{{session('empid')}}" required/> <br>

<div>
<label for="name">Name: </label>
<input type="text" id="name" name="name"  required/> <br>
</div><br>

<div>
<label for="relation">Relation: </label>
<input type="text" id="relation" name="relation"  required/> <br>
</div><br>

<div>
<label for="age">Age: </label>
<input type="text" id="age" name="age"  required/> <br>
</div><br>

<div>
<label for="job">Job: </label>
<input type="text" id="job" name="job"  required/> <br>
</div><br>

<button type="submit" class="btn btn-success">Add</button>

</form>
</div>
</div>

<div class="col-lg-6">
@foreach($relations as $relation)
<h6>{{$relation->id}}</h6>
<p>"{{$relation->name}}", "{{$relation->relation}}"</p>
<p>{{$relation->age}}</p>
<p>{{$relation->job}}</p>
<a href="show-relation-to-edit/{{$relation->id}}"><i class="fa fa-pencil" aria-hidden="true">edit</i></a>
<a href="delete-relation/{{$relation->id}}"><i class="fa fa-trash" aria-hidden="true">delete</i></a> <br>
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

