<?php
require '../models/user.php';
session_start();
if(isset($_SESSION['email']) && $_SESSION['role'] != 3){ ?>
<?php
$user = new User();
if (isset($_POST['emailsend'])) {
    $_SESSION['emailsend'] = $_POST['emailsend'];
    $getMessage = $user->getMessage($_SESSION['email'], $_SESSION['emailsend']);
} 
else if(isset($_SESSION['emailsend'])){
    $getMessage = $user->getMessage($_SESSION['email'], $_SESSION['emailsend']);
}
else{
    $getMessage = null;
}

$allUser = $user->getAllUser();
?>

<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;
        var pusher = new Pusher('7db1eaf43eca75e7d009', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {});
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
    <style>
        .customcontainer {
            width: 50%;
        }

        .chatbox {
            height: 500px;
            min-height: 500px;
            border: 1px solid #dfdede;
            padding: 10px;
        }

        .joinedmsg {
            background: #181553;
            text-align: left;
            border-radius: 3px;
            color: #267e4e;
            padding: 5px 0px 5px 10px;
            font-size: 13px;
            font-weight: 700;
            margin-top: 2px;
            color: #fff;
        }

        .sendmsg {
            background: #3B35CF;
            text-align: right;
            border-radius: 3px;
            color: #267e4e;
            padding: 5px 0px 5px 10px;
            font-size: 13px;
            font-weight: 700;
            margin-top: 2px;
            color: #fff;
            padding: 5px;
        }
    </style>
    <link type="text/css" href="../css/swipe.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3 col-md-3 mt-5">
            <div class="sidebar">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link bg-dark">
                            <p style="color: #fff;">
                                Dashboard
                            </p>
                        </a>
                    </li>
                    
                </ul>
            </div>
                <h5>Danh sách người dùng</h5>
                <div class="chatbox " style="overflow: auto;">
                    <?php
                    foreach ($allUser as $valueuser) {
                    ?>
                        <form action="chat.php" method="post">
                            <input type="hidden" id="emailsend" name="emailsend" value="<?php echo $valueuser['email'] ?>" />
                            <button class="btn btn-primary mt-2" type="submit""><?php echo $valueuser['email'] ?></button>
                    </form>
                <?php }
                ?>
                </div>
            </div>
            <div class=" col-9 col-md-9">
                                <div class="container customcontainer mt-5">
                                    <?php if (isset($_SESSION['emailsend'])) { ?>
                                        <h5>Đang chat với: <?php echo $_SESSION['emailsend'] ?></h5>
                                        <div style="overflow: auto;" class="chatbox">
                                            <?php
                                            foreach ($getMessage as $message) {
                                                if ($message['email'] === $_SESSION['email']) { ?>
                                                    <div class="sendmsg" id="mess"><?php echo $message['message'] ?></div>
                                                <?php } else { ?>
                                                    <div class="joinedmsg"><?php echo $message['message'] ?></div>
                                            <?php }
                                            }
                                            ?>
                                            <div id="chat"></div>
                                            <script>
                                                Pusher.logToConsole = true;

                                                var pusher = new Pusher('7db1eaf43eca75e7d009', {
                                                    cluster: 'ap1'
                                                });

                                                var channel = pusher.subscribe('my-channel');
                                                channel.bind('my-event', function(data) {
                                                    var message = data["message"];
                                                    $("<div class='joinedmsg'>" + message + "</div>").appendTo("#chat");
                                                });
                                            </script>
                                        </div>
                                        <form action="../process/chat_handler.php" method="post">
                                            <div class="mb-3">
                                                <input type="hidden" id="emailsend" name="emailsend" value="<?php echo $_SESSION['emailsend']; ?>" />
                                                <input type="text" class="form-control" id="message" name="message" placeholder="Type your message here....">
                                            </div>
                                            <button class="btn btn-primary" type="submit"">Send</button>
                                        </form>
                                </div>
            </div>
                                   <?php } ?>
    </div>
        </div>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

<?php }
?>