<?php include 'inc/header.php'; 
    include 'lib/user.php';
?>
<?php
    $user = new user();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
        $userReg = $user->userRegistration($_POST);
        
    }

?>
<div class="panel panel-default">
    <div style="max-width:600px;margin:0 auto;">
    <div class="panel-heading">
        <h2>User Login</h2>
    </div>
    <div class="panel-body">

    <?php
        if(isset($userReg)){
            echo $userReg . "<br>";
        }

    ?>
        <form action="" method="POST">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="username" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" />
            </div>
            <button class="btn btn-success" type="submit" name="register">Register</button>
        </form>
    </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>
