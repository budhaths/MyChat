<?php
error_reporting(1);
include_once("connection/connection.php");

/* php code to insert registartion form data into DATABASE */
    
if(isset($_POST['register'])) {
    
	$id= $_POST['id'];
    $password=$_POST['pwd'];
    
    $sql= "INSERT INTO login VALUES ('$id','$password')";
	$query=mysqli_query($con,$sql);
       if ($query) {
                    $message = "User id created please login";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    
                    }else{
                            $msg = "Unsucessfull account creation";
                            echo "<script type='text/javascript'>alert('$msg');</script>";
                                    }
    
                    header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MyChat</title>
        <link rel="stylesheet" type="text/css" href ="./css/login.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../index.php">MyChat</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
 <div class="container">
    <div class="row">
        <div class="form_bg">
            
            <form action="regis.php" method="post" >
                 <h2 class="text-center"> Sign Up </h2> <br/>
               
                <div class="form-group">
                 Enter your desired username:
                    <input type="username" class="form-control" id="userid" placeholder="User id" name="id" required>
                </div>
                
                <div class="form-group">
                    Enter your desired password:
                    <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" required>
                </div> <br/>
               
                <div class="align-center">
                    <button type="submit" class="btn btn-default" id="login" name="register">Register</button>
                </div>    
                
            </form>
            
            <?php echo @$err; ?>
            
        </div>
    </div>
</div>

</body>
</html>