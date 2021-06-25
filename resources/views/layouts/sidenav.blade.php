<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield("title")</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{asset('asset/css/form_appear.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .dropdown-container {
  display: none;
  background-color: #9e340b;
  padding-left: 8px;
}

    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('asset/css/resume.min.css') }}" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="about-company">About</a>
          </li>

         
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="profile">My Profile</a>
          </li>

          <!-- <li class="nav-item" data-target="#bio">
            <a class="nav-link js-scroll-trigger" href="#skills">My Bio</a>
          </li>

          <ul class="sub-menu nav-item collapse" id="bio">
                    <li class="nav-item active"><a href="#" class="nav-link js-scroll-trigger">CSS3 Animation</a></li>
                    <li class="nav-item"><a href="#" class="nav-link js-scroll-trigger">General</a></li>
                    <li class="nav-item"><a href="#" class="nav-link js-scroll-trigger">Buttons</a></li>
          </ul> -->
          
          <li class="nav-item">
          <a class="dropdown-btn nav-link js-scroll-trigger">My Bio 
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="dropdown-container">
            <a class="nav-link js-scroll-trigger" href="emp-qualification">Qualification</a><br>
            <a class="nav-link js-scroll-trigger" href="emp-experience">Experiences</a><br>
            <a class="nav-link js-scroll-trigger" href="emp-fam">Family Details</a><br>
          </div>
          </li>

            @can("admin")

            <li class="nav-item">
          <a class="dropdown-btn nav-link js-scroll-trigger">Admin Access 
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="dropdown-container">
            <a class="nav-link js-scroll-trigger" href="fetchemp">View Employees</a><br>
            <a class="nav-link js-scroll-trigger" href="display-qualifications_to_admin">View Employee Qualification</a><br>
            <a class="nav-link js-scroll-trigger" href="display-experiences_to_admin">View Employee Experience</a><br>
            <a class="nav-link js-scroll-trigger" href="display-family_to_admin">View Employee Family</a><br>

          </div>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="addemp">Add Employee</a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#awards">Admin Access</a>
          </li> -->
          
            @endcan
        </ul>
      </div>
    </nav>

    @yield("content")

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('asset/js/resume.min.js') }}"></script>

    <!--This script is to add a Dropdown button to the sidenav -->
    <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

  </body>

</html>


