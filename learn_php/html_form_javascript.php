
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
        <div class="body-content" style="height:700px;">
        <h2>Getting data from text box by js</h2>
      

       <script>
        function formfunction(){
            var name = document.myform.username.value;
        document.getElementById("output").innerHTML =  name ;

        var genleng = document.myform.gender.length;
        var i;
        for(i=0;i<genleng;i++){
            var checkRes = document.myform.gender[i].checked;
            if(checkRes){
                var gen = document.myform.gender.value;
            }
        }
        document.getElementById("output1").innerHTML =  gen ;

        var skileng = document.myform.skill.length;
        $res = "";
        for(var i=0;i<skileng;i++){
            var checkdRes = document.myform.skill[i].checked;
            if(checkdRes){
                $res += document.myform.skill[i].value;
                if(i+1<skileng){
                    $res += ",";
                }
            }
        }
        document.getElementById("output2").innerHTML =  $res;


        var index = document.myform.country.selectedIndex;
        var value = document.myform.country.options[index].value;
        document.getElementById("output3").innerHTML =  value ;
        }
        

       </script>

       <table class="tablone" border="1">
        <tr>
            <td colspan="2" align="center">Output</td>
        </tr>
        <tr>
            <td>Name</td>
            <td id="output"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td id="output1"></td>
        </tr>
        <tr>
            <td>Language</td>
            <td id="output2"></td>
        </tr>
        <tr>
            <td>Country</td>
            <td id="output3"></td>
        </tr>
       </table>
        
        <form action="" method="post" name="myform" id="myform" onsubmit="formfunction(); return false;" >
            <table>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" name="username" required="1"></td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td>
                        <input type="radio" name="gender" value="male">male
                        <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="other">Other
                    </td>
                </tr>
                <tr>
                    <td>Skill :</td>
                    <td>
                        <input type="checkbox" name="skill" value="HTML">HTML
                        <input type="checkbox" name="skill" value="CSS">CSS
                        <input type="checkbox" name="skill" value="JS">JS
                        <input type="checkbox" name="skill" value="PHP">PHP
                    </td>
                </tr>
                <tr>
                    <td>Country : </td>
                    <td>
                        <select name="country" id="country">
                            <option>Select one</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="America">America</option>
                            <option value="India">India</option>
                            <option value="Brazil">Brazil</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="submit">
                        <input type="reset" value="clear">
                    </td>
                </tr>
            </table>
        </form>
        <hr>
        </div>
        <footer>All rights reserved farjana-dipa.com</footer>
    </section>
</body>
</html>