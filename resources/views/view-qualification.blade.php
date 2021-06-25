<html>
<body>
@foreach($qualifications as $qualification)
<h1>{{$qualification->id}}</h1>
<p>{{$qualification->degreetype}}</p>
<p>{{$qualification->degree}}</p>
<p>{{$qualification->college}}</p>
<p>{{$qualification->performance}}</p>
<a href="delete-qualification/{{$qualification->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
@endforeach
</body>
</html>