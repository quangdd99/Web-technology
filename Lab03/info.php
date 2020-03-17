
<html>
    <head>
        <title>PHP-Example</title>
        <style>
            .content {
                justify-content: center;
                align-items: center;
                margin: auto;
                width: 60%;
                padding: 20px;
                background: #fff;
                box-shadow: 0 2px 5px #ccc; 
                border-radius: 2%;
            }
        </style>
    </head>
    <body>
        <div class="content">
        <?php
            $name = $_POST["name"];
            $email = $_POST["email"];
            $birth = $_POST["birth"];
            $sex = $_POST["sex"];
            $class = $_POST["class"];
            $university = $_POST["university"];
            $opinion = "";
            
            $hobbies = array();
            if(!empty($_POST["hob1"])) array_push($hobbies, $_POST["hob1"] ); // if(isset($_POST[hob1]) && $_POST[hob1] != "")
            if(!empty($_POST["hob2"])) array_push($hobbies, $_POST["hob2"] );
            if(!empty($_POST["hob3"])) array_push($hobbies, $_POST["hob3"] );
            if(!empty($_POST["other"])) array_push($hobbies, $_POST["other"] );
            // var_dump($_POST["hob1"]);
            if(!empty($_POST["opinion"])){
                $opinion = $_POST["opinion"];
            }
            // var_dump($_POST["opinion"]);
            echo "<h1>Detail Information</h1>";
            echo "<br> Hello, $name";
            echo "<br> Your date of birth: $birth";
            echo "<br> Your sex is $sex";
            echo "<br> Your email: $email";
            echo "<br> You are studying at class $class - $university";
            echo "<br> Your hobies is: <br>";
            if(sizeof($hobbies)){
                echo "<ol>";
                foreach ($hobbies as $value) {
                    // if($value)
                    echo "<li>$value</li>";
                }
                echo "</ol>";
            } else{
                echo "<i>Ohm! May be you don't want share your hobbies</i>";
            }
            if(!empty($_POST["opinion"])){
                echo "<br> Some opinions are:  $opinion ";
            }
            
            echo "<br>";
            echo "<h3>Please, contact us as soon as possible</h3>";
        ?>
        </div>
        
    </body>
</html>