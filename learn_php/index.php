
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
          
            background-color: #efeaea;
            padding:30px;
        }
        footer{
            background:black;
            color:white;
            text-align:center;
            padding:20px 0px;
        }
        table.tablone{
            width:400px;
            border:1px solid #fff;
            margin:20px 0px;
        }
        table.tablone tr:nth-child(2n+1){
            background:#fff;
            height:30px;
        }
        table.tablone tr:nth-child(2n){
            background: #f1f1f1;
            height:30px;
        }
        table.tablone td{
            padding:5px 10px;
        }
    </style>
</head>
<body>
    <section class="main-content">
        <nav>
            <h3>PHP training with live project.</h3>
        </nav>
        <div class="body-content">
        <h2>Array Search</h2>
       
        
            <?php
            $color = array("red","green","blue","dark","white");

            if(isset($_POST['text'])){
                global $txt;
                $txt = $_POST['text'];
                $res = array_search($txt,$color);
                echo "You search $txt and your match key is : $res";
            }

            ?>

            <form action="" method="post">
                <input type="text" name="text" >
                <input type="submit" value="submit">
            </form>
            <hr>

            <h2>Array Shift</h2>
            <?php
                $color = array("red","green","blue","white");
                array_shift($color);
                echo "<pre>";
                print_r($color);
                echo "</pre>";
            ?>
            <hr>

            <h2>Array Slice</h2>
            <?php
                $color = array("red","green","blue","white");
                $x = array_slice($color,1,3);
                echo "<pre>";
                print_r($x);
                echo "</pre>";
                $x = array_slice($color,-3,2);
                echo "<pre>";
                print_r($x);
                echo "</pre>";
            ?>
            <hr>

            <h2>Array Sum</h2>
            <?php
                $color = array(
                    "a"=>10,
                    "b"=>20,
                    "c"=>50,
                    "d"=>10
                );
                $x = array_sum($color);
                echo $x . "<br>";
                
            ?>
            <hr>

            <h2>Array Unique</h2>
            <?php
                $color = array(
                    "a"=>10,
                    
                    "b"=>10,
                    "c"=>50,
                    "d"=>10,
                    "a"=>30,
                    
                    "e"=>12,
                    "d"=>10
                );
                $x = array_unique($color);
                echo "<pre>";
                print_r($x);
                echo "</pre>";
                
            ?>
            <hr>

            <h2>Array Walk</h2>
            <?php

            function myfunction($dept,$name){
                echo $name . " comes from " . $dept . "<br>";
            }
                $color = array(
                   "Akbor"=>"CSE",
                   "Mamun"=>"MME",
                   "Sojib"=>"EEE"
                );
               
                array_walk($color,"myfunction");
                
            ?>
            <hr>

            <h2>Array Sort</h2>
            <?php

            
                $color = array(
                   "Akbor"=>"CSE",
                   "Mamun"=>"MME",
                   "Sojib"=>"EEE"
                );
               
                asort($color);
                echo "<pre>";
                print_r($color);
                echo "</pre>";


                arsort($color);
                echo "<pre>";
                print_r($color);
                echo "</pre>";

            ?>
            <hr>


            <h2>Array Current</h2>
            <?php

            
                $color = array(
                   "Akbor"=>"CSE",
                   "Mamun"=>"MME",
                   "Sojib"=>"EEE",
                   "meraz"=>"CSE",
                   "khadiza"=>"CE",
                   "dipa"=>"CSE"
                );
               
                echo "Current value is : " . current($color) . "<br>";
                echo "Next value is : " . next($color) . "<br>";
                echo "End value is : " . end($color) . "<br>";
                echo "Previous value is : " . prev($color) . "<br>";


            ?>
            <hr>


            <h2>IN_ARRAY</h2>
            <?php

            
                $name = array(
                   "Akbor",
                   "Mamun",
                   "Sojib",
                   "meraz",
                   "khadiza",
                   "dipa"
                );


                if(isset($_POST['username'])){
                    $txt = $_POST['username'];
                  if(in_array($txt,$name)){
                    echo "$txt is exist";
                  } 
                  else{
                    echo "$txt is not exist";
                  }
                }

                echo "<pre>";
                print_r($name);
                echo "</pre>";

            ?>
            <form action="index.php" method="post">
                <input type="text" name="username">
                <input type="submit" value="submit">
            </form>
            <hr>

            <h2>Shuffle</h2>
            <?php

            
                $name = array(
                   "Akbor",
                   "Mamun",
                   "Sojib",
                   "meraz",
                   "khadiza",
                   "dipa"
                );

                echo "<pre>";
                print_r($name);
                echo "</pre>";

                shuffle($name); 

                echo "<pre>";
                print_r($name);
                echo "</pre>";

            ?>


        </div>
        <footer>All rights reserved farjana-dipa.com</footer>
    </section>
</body>
</html>