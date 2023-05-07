<?php

include('database_connection.php');

session_start();
?>

<!--
<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Chat Application using PHP Ajax Jquery</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">Chat Application Login</div>
    <div class="panel-body">
     <form   method="post">
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       <label>Enter Username</label>
       <input type="text" name="username" id="username" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Enter Password</label>
       <input type="password" name="userpassword" id="userpassword" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>
  </div>
    </body>  
</html>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat_Application</title>

    <!--Bootstrap links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body style="padding-left: 500px; padding-right: 500px; padding-top: 200px; background-image: url(https://www.ilovewallpaper.com/images/buzzy-bees-wallpaper-white-p8721-35735_medium.jpg); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <h1 style="font-family: cursive;">LOGIN PAGE</h1>
        <div class="card text-center mb-3" style="width: 250; font-family: cursive; opacity: 90%; background-color: #ffe066;">
            <div class="card-body">
              <h5 class="card-title">Welcome to user login</h5>
              <form method="post">
              <div class="mb-4">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control border-success" name="username" id="username" placeholder="Name">
              </div>
              <div class="mb-4">
                <label for="userpassword" class="form-label">Password</label>
                <input type="password" class="form-control border-success" name="userpassword" id="userpassword" placeholder="Password">
              </div>
              
              <a class="icon-link icon-link-hover" style="--bs-link-hover-color-rgb: 25, 135, 84;" href="registration.php">
                Don't have account? Register here -->
                <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
              </a>
              <br><br>
              <!--<a  class="btn btn-primary">Login</a>
              href="chatpage.html"-->
              <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="Login" />
       <?php
       $message = '';

       // if(isset($_SESSION['uid']))
       // {
       //  header('location:chatpage.php');
       // }
       
       if(isset($_POST['username']) && isset($_POST['userpassword']))
       {
       $username=$_POST['username'];
        $query = "
          SELECT * FROM user 
           WHERE username = :username
        ";
        $statement = $conn->prepare($query);
        $statement->bindParam(':username',$_POST['username']);
        $statement->execute();
       $result=$statement->fetch(PDO::FETCH_ASSOC);
       
       
       
       
       $count = $statement->rowCount();
       if($count > 0)
       
       {
         
       $hash=password_hash($result['userpassword'],PASSWORD_DEFAULT);
       
         
             if(password_verify($_POST['userpassword'],$hash))
             {
               $_SESSION['uid'] = $result['uid'];
               $_SESSION['username'] = $result['username'];
               $sub_query = "
               INSERT INTO login_details 
               (uid) 
               VALUES ('".$result['uid']."')
               ";
               $statement = $conn->prepare($sub_query);
               $statement->execute();
               $_SESSION['login_details_id'] = $conn->lastInsertId();
               header("location:friendspage.php");
             }
             else
             {
            
             }
           
        }
        else
        {
         $message = "<label>Wrong Username</labe>";
        }
       }
       
       ?>
      </div>
            </form>
            </div>
          </div>
    </div>
</body>
</html>