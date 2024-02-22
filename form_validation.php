<?php
    $errname=$errmail=$errgender=$errsite="";

    $name=$mail=$website=$msg=$gender="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){

            if(empty($_POST['name'])){
            $errname =  "<span style='color:red;'>Name field is required.</span>";
            }
            else{
                $name      = validate($_POST['name']);
            }

            if(empty($_POST['mail'])){
            $errmail =  "<span style='color:red;'>Email field is required.</span>";
            }
            elseif(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                $errmail =  "<span style='color:red;'>Invalid Email Format.</span>";
            }
            else{
                $mail      = validate($_POST['mail']);
            }


            if(empty($_POST['site'])){
                $errsite =  "<span style='color:red;'>Website field is required.</span>";
                }
                elseif(!filter_var($_POST['site'], FILTER_VALIDATE_URL)){
                    $errsite =  "<span style='color:red;'>Invalid website url.</span>";
                }
                else{
                    $website   = validate($_POST['site']);
                }

            

            if(empty($_POST['gender'])){
                $errgender =  "<span style='color:red;'>Gender field is required.</span>";
            }
            else{
                $gender    = validate($_POST['gender']);
            }

   
   
           
            $msg       = validate($_POST['comment']);
   


            /*echo "Name is : " . $name . "<br>";
            echo "Email is : " . $mail . "<br>";
            echo "Website is : " . $website . "<br>";
            echo "Comment is : " . $msg . "<br>";
            echo "Gender is : " . $gender . "<br>";*/
    }

            function validate($data){
                $x = trim($data);
                $y = htmlspecialchars($data);
                $z = stripcslashes($data);
                return $z;
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main-content{
            width:70%;
            margin:auto;
            height:100vh;
            
            top:0;
            padding:0;
        }
        nav{
            background:black;
            color:white;
            text-align:center;
            padding:20px 0px;
        }
        .body-content{
            height:700px;
            background-color: #efeaea;
            padding:30px;
        }
        footer{
            background:black;
            color:white;
            text-align:center;
            padding:20px 0px;
        }
    </style>
</head>
<body>
    <section class="main-content">
        <nav>
            <h3>PHP training with live project.</h3>
        </nav>
        <div class="body-content">
            <p style="color:red;">* Required field.</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="name">*<?php echo $errname; ?></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="mail">*<?php echo $errmail; ?></td>
                </tr>
                <tr>
                    <td>Website : </td>
                    <td><input type="text" name="site">*<?php echo $errsite; ?></td>
                </tr>
                <tr>
                    <td>Comments : </td>
                    <td><textarea name="comment" id="" cols="30" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Gender : </td>
                    <td><input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female *
                    <?php echo $errgender; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="submit"></td>
                </tr>

            </table>
        </form>
           

        </div>
        <footer>All rights reserved farjana-dipa.com</footer>
    </section>
</body>
</html>