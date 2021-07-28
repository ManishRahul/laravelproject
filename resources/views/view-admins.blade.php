<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Admins</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container-fluid">
  <h2>Admins are listed here</h2>

  @if(session()->has("success"))
    <div class="alert alert-success">
      {{ session("success") }}
    </div>
  @endif   
  
  <br></br>
  <table class="table table-striped" id="tbl-list-emps">
    <thead>
      <tr>
        <th>Sl.no</th>
        
        <th>Role</th>
        <th>Actions</th>
        
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        {{$users_roles = $user->roles}}
        @foreach($users_roles as $user_role)
        @if($user_role->role_name == "SuperAdmin"|| $user_role->role_name == "Admin")
      <tr>
        <td>{{$user_role->id}}</td>
        <td>{{$user_role->role_name}}</td>
        
        
        <td>
        <a href="show-role-to-edit/{{$role->id}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="delete-role" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
    </tr>
    @endif
    @endforeach
    @endforeach
    </tbody>
  </table>
</div>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tbl-list-emps').DataTable();
} );
</script>
</body>
</html>
