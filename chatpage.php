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
                            <input type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary fa fa-search" type="button" id="button-addon2"></button>
                          </div>
                          <ul class="list-unstyled chat-list mt-2 mb-0">
                        <?php
                        include_once('database.php');
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
                    
                        <li>
                            <?php echo $user['username']; ?>
                        </li>
                        
                       
                      
                   
                   
                    <?php
                    }
                    ?>
                        </ul>
                    </div>
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">Aiden Chavez</h6>
                                        <small>Last seen: 2 hours ago</small>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <a href="request.php"><button type="button" class="btn btn-dark position-relative float-end">
                                        Request</a>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                          99+
                                          <span class="visually-hidden">unread messages</span>
                                        </span>
                                      </button>
                                </div>
                            </div>
                        </div>                        
                        <div class="chat-history">
                            <ul class="m-b-0">
                                <li class="clearfix">
                                    <div class="message-data text-right">
                                        <span class="message-data-time">10:10 AM, Today</span>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                    </div>
                                    <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                                </li>
                                <li class="clearfix">
                                    <div class="message-data">
                                        <span class="message-data-time">10:12 AM, Today</span>
                                    </div>
                                    <div class="message my-message">Are we meeting today?</div>                                    
                                </li>                               
                                <li class="clearfix">
                                    <div class="message-data">
                                        <span class="message-data-time">10:15 AM, Today</span>
                                    </div>
                                    <div class="message my-message">Project has been already finished and I have results to show you.</div>
                                </li>
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <div class="input-group mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type something.." aria-label="Recipient's message with two button addons">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More</button>
                                    <ul class="dropdown-menu outline-primary" style="padding: 2px;">
                                        <li><a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"> Camera</i></a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"> Image</i></a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <a href="javascript:void(0);" class="btn btn-outline-danger"><i class="fa fa-music"> Music</i></a>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-file-pdf-o"> File</i></a></li>
                                      </ul>
                                    <button class="btn btn-success fa fa-send" type="button">  Send</button>
                                  </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</body>
</html>