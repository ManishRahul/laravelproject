<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    /* #box {
  padding:5px;
  width:200px;
  z-index:10;
  position:relative;  
} */
#box form {
 background:#006699;
 padding:5px;
 display:none;
 position:absolute;
 top:27px;
}
/* #button {
  width:75px;
  background:#006699;
  color:#fff;
  padding:3px 10px;
  border:1px solid #006699;  
  margin-bottom:15px;  
  cursor:pointer;
} */
/* input[type="submit"] {
  background:none;
  color:#fff;
  border:none;
  text-align:left;
  cursor:pointer;
} */
</style>
</head>
<body>

<div id="box">
     <span id="button">Login</span>
    <form action="" id="form">
      <p><input type="text" placeholder="username"/></p>
      <p><input type="password" placeholder="password" /></p>
      <p><input type="submit" value="Sign in" /></p>
    </form>
</div>
<h1>hhhhh</h1>
<script>
$("#button").click(function() {  
  $("#box form").toggle("slow");
  return false;
});
</script>
</body>
</html>