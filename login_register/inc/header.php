<?php
    $filepath = realpath(dirname(__FILE__));
    //echo $filepath ;
    include_once $filepath . '/../lib/Session.php';
    Session::init();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register System PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">

        <?php
            if(isset($_GET['action']) && ($_GET['action']=="logout")){
                Session::destroy();
            }

        ?>
        <!--navbar section-->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">Login Register System PHP & PDO</a>
                </div>
                <ul class="nav navbar-nav pull-right">
                <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="?action=logout" class="nav-link">Logout</a></li>
                    <?php
                        $id = Session::get("id");
                        $login = Session::get("login");
                       
                    ?>
                   
                   
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
                   
                </ul>
            </div>
        </nav>

</body>
</html>