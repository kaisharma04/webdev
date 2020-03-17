
<!doctype html>
<html lang="en">
  <head>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
  <body>
  <div class="cont" >
      <div class="row" style="background-color:darkcyan; width: 100% ; height:20%; margin-left:0px ; padding-left:0px;">
          <div class="col-md-2" ><img src="sos.png" alt="" style="width:70% ;height:100% ;padding:0px "></div>
          <div class="col-md-10" >
            <nav class="navbar navbar-expand-lg navbar-light bg-darkcyan ">
              <?php
              session_start();
              if(isset($_SESSION['loguser'])){
                $con=mysqli_connect('localhost','root','');
                mysqli_select_db($con,'sos');
                $u=$_SESSION['loguser'];
                $q="select * from signup where email='$u'";
                $rs=mysqli_query($con,$q);
                $x=mysqli_fetch_array($rs);
               
              }
              else
              header('location:home.php');
              ?>

              <a class="navbar-brand" href="#"><img src="images\\<?php echo $x[6]?>" height="50" width="50"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
                  </li>
                  <!--<li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>-->
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Home
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Home</a>
                      <a class="dropdown-item" href="#">All</a>
                      <a class="dropdown-item" href="#">Popular</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Top communities</a>
                    </div>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </nav>
                    
             
          </div>
          
      </div>

      <div class="row" style=" margin-top:20px ;">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="border:2px solid;">
            
    <form method="post" enctype="multipart/form-data">
         <div class="input-group mb-3">
            <textarea rows="1" cols="2" name="data" class="form-control" style="margin-top:20px" placeholder="Create Post"></textarea>
              <div class="input-group-append">
                    <input type="file" name="file" class="form-control" style="margin-top:20px">
                     <input type="submit" value="Post" name="submit" class="form-control" style="margin-top:20px">
               </div>
          </div>  
    </form>
            
           
            <?php
               if(isset($_REQUEST['submit']))
               
               {
                $con=mysqli_connect('localhost','root','');
                mysqli_select_db($con,'sos');

                $cnt=$_REQUEST['data'];
                $f=$_FILES['file']['name'];
                $u=$_SESSION['loguser'];
$dt=date('d-m-y');
$t=date('h:i:s');
$d=$dt."  ".$t;

$t="";
                
                if($f!="")
{
  if(move_uploaded_file($_FILES['file']['tmp_name'],"postmedia//$f"))
  {
$q="insert into post(uname,ptype,content,date)values('$u','media','$f','$d')";
mysqli_query($con,$q);
echo "Media Uploaded";

  
}

}               else
{
  $q="insert into post(uname,ptype,content,date)values('$u','text','$cnt','$d')";
  mysqli_query($con,$q);
  echo "data Uploaded";
  } 
              }  
            ?>
              
            </div>
            <div class="col-md-2">
              
           
           

            </div>
         </div>

  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
              <div class="row">
            <div class="col-md-3">Image</div>

            <div class="col-md-5">Image</div>
            <div class="col-md-4">Date</div>
            
          </div>
            <div class="row">
            <div class="col-md-12"></div>
            </div>
            

    </div>

            </div>
 </div>
  </body>
</html>