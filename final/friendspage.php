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
    
        <div class="container card chat-app" style="background-color: #ffe066; padding: 55px;">
            <div class="row">
                <div class="container col">
                    <a href="request.php">
                        <button type="button" class="btn btn-dark position-relative float-start">
                            Request
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            </button>
                    </a>
                    <br><br><br>
                    <a href="searchuser.php">
                        <button type="button" class="btn btn-dark position-relative float-start fa fa-plus-square">
                            <br>
                            Add Contacts
                        </button>
                    </a>
                </div>
    
                <div class="container col">
                    <h1>Person's profile</h1>
                </div>
            </div>
        </div>
        <div id="plist" class=" container people-list" style="background-color: beige;">
            <h3 style="font-family: cursive; padding-left: 20px; padding-top: 20px;"> Friends </h3>
            <ul class="list-unstyled chat-list mt-2 mb-0">
                        <?php
                        include_once('database_connection.php');
                        $a=1;
                        $stmt = $conn->prepare(
                                " 
                                SELECT u.username FROM user u
                                JOIN friends f ON (u.uid = f.sender_id OR u.uid = f.reciever_id)
                                WHERE (f.sender_id = 1 OR f.reciever_id = 1) AND u.uid != 1;
                                
                                ;");
                        $stmt->execute();
                        

                        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       
                        foreach($users as $user)
                        {
                    ?>
                    <a href="chatmessage.php">
                    <li>
                    <div class="name"> <?php echo $user['username']; ?></div>
                          
                        </li>
                        </a>
                        
                       
                      
                   
                   
                    <?php
                    }
                    ?>
                        </ul>
                
                
        </div>                               

    
</body>
</html>