




    <!DOCTYPE html>
<html lang="en">
 
<head>
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
                    <tr>
                        <th>Sender id</th>
                        <th>Sender Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
 
                <tbody>
                    <?php
                        include_once('database.php');
                        $a=1;
                        $stmt = $conn->prepare(
                                " select request.sender_id ,user.username,request.status from user inner join request on request.sender_id=uid where reciever_id=101 ;");
                        $stmt->execute();
                        $users = $stmt->fetchAll();
                        foreach($users as $user)
                        {
                    ?>
                    <tr>
                        <td>
                            <?php echo $user['sender_id']; ?>
                        </td>
                        <td>
                            <?php echo $user['username']; ?>
                        </td>
                        <td>
                        <?php echo $user["status"];?>
                        </td>
                       
                      
                    </tr>
                   
                    <?php
                    }
                    ?>
                </tbody>
            </table>
 
            
        </div>
    </div>
</body>
 
</html>