@extends("layouts.sidenav")

@section("title","Edit-Role")

@section("content")
<div class="container-fluid p-0">

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<h2>Edit Role</h2>

<form action="/edit-role" method="post">
@csrf
<div>

<input type="hidden" readOnly="true" name="role_id" value="{{$role->id}}" />

<label for="create">Edit the Role : </label><br>
<input type="text" id="role" name="role" value="{{$role->role_name}}" />
</div>
<br>

<div>
@foreach($permissions as $permission)
@foreach($rolepermissions as $rolepermission)
<input type="checkbox" id="create" name="permissions[]" value="{{$permission->id}}" {{ ($rolepermission->id==$permission->id)? "checked" : "" }} />
<label for="create">{{$permission->permission_name}}</label><br>
@endforeach
@endforeach
</div>

<br>
<div>
<input type="submit" value="Update" />
</div>
</form>

</section>
</div>
@endsection