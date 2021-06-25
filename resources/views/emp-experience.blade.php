@extends("layouts.sidenav")

@section("title","Emp-Experience")

@section("content")
<div class="container-fluid p-0">
<!-- <h1> Can you see the below content? </h1> -->

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<h2>Experience</h2>

<div class="row">

<div class="col-lg-6">

<div id="box">
<a id="button"><i class="fa fa-plus-square-o fa-2x" aria-hidden="true"></i> Add Experience</a>
<form action="add-experience" method="post">
@csrf
<input type="hidden" id="empid" name="empid" value="{{session('empid')}}"  /> <br>

<div>
<label for="role">Role: </label>
<input type="text" id="role" name="role"  /> <br>
</div><br>

<div>
<label for="org">Organization: </label>
<input type="text" id="org" name="org"  /> <br>
</div><br>

<div>
<label for="sdate">Start Date: </label>
<input type="date" id="sdate" name="sdate"  /> <br>
</div><br>

<div>
<label for="edate">End Date: </label>
<input type="date" id="edate" name="edate"  /> <br>
</div><br>

<div>
<label for="desc">Description: </label>
<input type="text" id="desc" name="desc"  /> <br> <br>
</div><br>

<button type="submit" class="btn btn-success">Save</button>

</form>
</div>
</div>

<div class="col-lg-6">
@foreach($experiences as $experience)
<h6>{{$experience->id}}</h6>
<p>'{{$experience->organization}}', '{{$experience->designation}}'</p>
<p>from '{{$experience->start_date}}' to '{{$experience->end_date}}'</p>
<p>{{$experience->description}}</p>
<a href="show-experience-to-edit/{{$experience->id}}"><i class="fa fa-pencil" aria-hidden="true">edit</i></a>
<a href="delete-experience/{{$experience->id}}"><i class="fa fa-trash" aria-hidden="true">delete</i></a>
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

