@extends("layouts.sidenav")

@section("title","Emp-Profile")

@section("content")
<div class="container-fluid p-0">

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<h2>Create new Roles</h2>

<form action="add-role" method="post">
@csrf
<div>
<label for="create">Enter a new Role : </label><br>
<input type="text" id="role" name="role" />
</div>
<br>
<div>
<input type="checkbox" id="create" name="permissions[]" value="1">
<label for="create">Create</label><br>
<input type="checkbox" id="edit" name="permissions[]" value="2">
<label for="edit">Edit</label><br>
<input type="checkbox" id="delete" name="permissions[]" value="3">
<label for="delete">Delete</label><br>
<input type="checkbox" id="v_list" name="permissions[]" value="4">
<label for="v_list">View Employee list</label><br>
<input type="checkbox" checked="true" id="v_list" name="permissions[]" value="5">
<label for="v_profile">View Profile</label><br>
</div>
<br>
<div>
<input type="submit" value="Add" />
</div>
</form>


</section>
</div>
@endsection