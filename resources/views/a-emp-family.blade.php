<!DOCTYPE html>
<html lang="en">
<head>
  <title>Family Details</title>
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
  <h2>Family Details</h2>

  @if(session()->has("success"))
    <div class="alert alert-success">
      {{ session("success") }}
    </div>
  @endif   
  <br></br>
  <table class="table table-striped" id="tbl-list-emps">
    <thead>
      <tr>
        <th>ID</th>
        <th>Emp_ID</th>
        <th>Employee</th>
        <th>Name</th>
        <th>Relation</th>
        <th>Age</th>
        <th>Job</th>
      </tr>
    </thead>
    <tbody>
    @foreach($e_relations as $e_relation)
      <tr>
        <td>{{$e_relation->id}}</td>
        <td>{{$e_relation->emp_id}}</td>
        <td>{{$e_relation->fname}}</td>
        <td>{{$e_relation->name}}</td>
        <td>{{$e_relation->relation}}</td>
        <td>{{$e_relation->age}}</td>
        <td>{{$e_relation->job}}</td>
    </tr>
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
