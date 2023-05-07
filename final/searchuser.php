<?php
include('database_connection.php');

session_start();

if(isset($_SESSION['uid'])&& isset($_POST['username']))
{
$sender_id=$_SESSION['uid'];
$username=$_POST['username'];
$query1 = "
   SELECT * FROM user 
    WHERE username = :username
 ";
 $statement = $connect->prepare($query1);
 $statement->bindParam(':username',$_POST['username']);
 $statement->execute();
 $result=$statement->fetch(PDO::FETCH_ASSOC);
if($result<>NULL){
echo $result['uid']."   ".$result['username'];
$receiver_id=$result['uid'];

$request_button='<button type="button" id="btn" onclick="send_request()" > Request </button>
<script>

    function send_request() {
        document.getElementById("btn").innerHTML="Requested";
       
    }
</script>';
echo $request_button;
if(isset($request_button)){
$query2 = "
   insert into request(sender_id,reciever_id,status) values(:sender_id,:receiver_id,'pending')
 ";
 $statement = $connect->prepare($query2);
 //$statement->bindParam([':sender_id',$_SESSION['uid']],[':receiver_id',$result['uid']]);
 $statement->execute([':sender_id'=> $sender_id,':receiver_id'=>$receiver_id]);
 echo "request sent successfully.";
}
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <!--Bootstrap links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="style.css">


</head>
<body style="padding: 15px; opacity:75%; background-image: url(https://www.ilovewallpaper.com/images/buzzy-bees-wallpaper-white-p8721-35735_medium.jpg); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
   
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app" style="background-color: #ffe066; padding: 15px;">
                    <div id="plist" class="people-list">
                    <div class="input-group mb-3">
    <form method="post">
  <input type="text" class="form-control" name="username" id="username" placeholder="Type a name" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-secondary fa fa-search" type="button" id="button-addon2">  Search</button>
  </form>
</div>
                        
                    </div>
                   
                    </div>
                </div>
            </div>
        </div>
        </div>
</body>
</html>


