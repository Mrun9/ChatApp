<!DOCTYPE html>
<html lang="en">
 
<head>
<style>
table {
  
  
  width: 100%;
}
th{
    text-align: center;
}

td {
  
  padding: 10px 20px;
}

td:nth-child(odd) {
  background-color: #ffe066;
}

td:nth-child(even) {
  background-color: #ffe066;
  text-align: left;
}

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Attendance Page</title>
</head>
 
<body style="background-image: url(https://www.ilovewallpaper.com/images/buzzy-bees-wallpaper-white-p8721-35735_medium.jpg);">
    <div class="container">
        <div class="row">
         
            <table class="table table-hover">
                <thead>
                <tr style="background-color: #f6962e;">
                        <th>Sender id</th>
                        <th>Sender Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
 
                <tbody>
                    <?php
                       
                        include_once('database_connection.php');
                        session_start();
                        //$_SESSION['uid']=2;
                        $receiver_id=0;
                        if(isset($_SESSION['uid'])){
                            //echo"is set";
                            $receiver_id=$_SESSION['uid'];
                        }
                        
                        $query=" select DISTINCT request.sender_id ,user.username,request.status from user inner join request on request.sender_id=uid where reciever_id=:receiver_id and status='pending'";
                        $stmt = $conn->prepare($query);
                        $stmt->execute([':receiver_id'=>$receiver_id]);
                        //echo "query executed";
                        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        //print_r($users);
                        $output="";
                        foreach($users as $arr)
                        {
                    
                      $output .="<tr>
                        <td>
                            ".$arr['sender_id']."
                        </td>
                        <td>
                             ".$arr['username']."
                        </td>
                        <td>
                         ".$arr['status']."
                        </td>
                       </tr>";
                    // echo $output;
                    
                    }
                    echo $output;
                    ?>
                </tbody>
            </table>
 
            
        </div>
    </div>
</body>
 
</html>
