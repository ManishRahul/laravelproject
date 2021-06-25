<!DOCTYPE html>
<html lang="en">
<head>
  <title>Import an Excel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Import Excel file here</h2>
    <form method="POST" enctype="multipart/form-data" action="{{route('employee.import')}}">
    @csrf 
    <div class="form-group">
    <label for="file">Choose an excel file to import Employee details</label>
    <input type="file" id="file" name="file" class="form-control" />
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
</body>
</html>