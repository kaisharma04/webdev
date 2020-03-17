<?php ob_start();?>
<!doctype html>
<html lang="en">
  <head>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>
  <div class="cont" >
      <div class="row" style="background-color:darkcyan; width: 100% ; height:100%; margin-left:0px ; padding-left:0px;">
          <div class="col-md-2" ><img src="sos.png" alt="" style="width:100% ;height:100% ;padding:0px "></div>
          <div class="col-md-4"></div>
          <div class="col-md-6">
            <form class="form-inline " style="margin-top: 20px" >
              
              <div class="form-group">
                
                <label for="email"></label>email:</label>
                <br>
                <input type="email" class="form-control" name="n">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <br>
                <input type="password" class="form-control" name="p">
              </div>
              
              &nbsp;&nbsp;<input type="submit" name="login"  class="btn btn-primary" value="Login">
            </form>
            
          </div>
      </div>

      <div class="row" style="background-color: lightgray;">
        <div class="col-md-5">
          <center><h1>About SOS</h1>
          <br>
          <p1>A social hub for the students created by students.<p1>
          <p2>
            Follow community Guidlines.
            Dont be rude.Post and open group chats will be moderated.
          </p2>
          </center>
          
        </div>
        
        <div class="col-md-7">
          <center><h1>Create new Account</h1></center>
          <center><h3>Its quick and easy</h3></center>
         <center>
          <div class="col-md-6">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                  <label> Username</label>
                  <input type="text" class="form-control" name="uname">
              </div>
              <div class="row">
                <label>Email</label>
                <input type="text " class="form-control" name="ep"> 
            </div>
              <div class="row">
                  <label>Password</label>
                  <input type="text " class="form-control" name="pass"> 
              </div>
              <div class="row">
                <label>BirthDate</label>
                <input type="date" class="form-control" name="birth">
              </div>
              <div class="row" style="margin-top: 20px;">
                <label >Gender:</label>
                &nbsp;&nbsp;&nbsp;
                  <label class="radio-inline">
                    <input type="radio" name="gender" value="Male">Male
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="gender" value="Female">Female
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="gender" value="custom">Custom
                  </label>
                
              </div>
              <br>
              <div class="row">
                  <label>image</label>
                  <input type="file" class="form-control" name="image"> 
              </div>
              <div class="row">
                  <label>Country</label>
                  <input type="text " class="form-control" name="count"> 
              </div>
              <div class="row">
                  <label>Bio</label>
                  <input type="text " class="form-control" name="bi"> 
              </div>
              <div class="row">
                  <label>Education</label>
                  <input type="text " class="form-control" name="ed"> 
              </div>
              <div class="row">
                  <label>Hobbies</label>
                  <input type="text " class="form-control" name="ho"> 
              </div>
            <br>
              <div class="form-group" >
              <input type="submit" name="submit" class="btn btn-primary " value="signup" >
          </div>
          </div>
</form>
         </center>
          
         </div>

  </div>
  <div class="row" style="height:100% ; width:100% ">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h1>Footer space

      </h1>
    </div>
    <div class="col-md-2"></div>
  </div>
 </div>
 <?php
if(isset($_REQUEST['submit'])){
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'sos');

    $a=$_REQUEST['uname'];
    $b=$_REQUEST['ep'];
    $c=$_REQUEST['pass'];
    $d=$_REQUEST['birth'];
    $e=$_REQUEST['gender'];
    $f=$_FILES['image']['name'];
    $g=$_REQUEST['count'];
    $h=$_REQUEST['bi'];
    $i=$_REQUEST['ed'];
    $j=$_REQUEST['ho'];

    if(move_uploaded_file($_FILES['image']['tmp_name'],"images//$f"))
{
$q="insert into signup(uname,email,password,birthdate,gender,image,country,bio,education,hobbies)values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')"or die("Unable to exeucte".mysqli_error($con));
$x=mysqli_query($con,$q);
if($x>0)
header('location:signup.php');
else
echo "unable to insert";
}
else{
    echo "<br>unable to upload" ;
}

}

if(isset($_REQUEST['login']))
{
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'sos');
$n=$_REQUEST['n'];
$p=$_REQUEST['p'];
$q="select * from signup where email='$n' and password='$p'";
$x=mysqli_query($con,$q)or die("Unable to execute query ".mysqli_error($con));;
$r=mysqli_num_rows($x);
if($r>0)
{
session_start();
$_SESSION['loguser']=$n;
header('location:home.php');
echo "<br>LOgin Sucess";
}
else
echo "<h1>Invalid user Name or Password</h1>";
}
?>
  </body>
</html>