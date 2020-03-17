
<html>
    <head>
        <title>PHP-Example</title>
    </head>
    <body>
        <?php
            $name = $_POST["name"];
            $class = $_POST["class"];
            $university = $_POST["university"];
            
            $hobbies = array();
            if(!empty($_POST["hob1"])) array_push($hobbies, $_POST["hob1"] ); // if(isset($_POST[hob1]) && $_POST[hob1] != "")
            if(!empty($_POST["hob2"])) array_push($hobbies, $_POST["hob2"] );
            if(!empty($_POST["hob3"])) array_push($hobbies, $_POST["hob3"] );
            if(!empty($_POST["other"])) array_push($hobbies, $_POST["other"] );
            // var_dump($_POST["hob1"]);
            if(!empty($_POST["contact"])){
                $contact = $_POST["contact"];
            } else{
                $contact = "YES";
            }
            
            echo "<br> Hello, $name";
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
            
            echo "<br> Contact preference is $contact";
        ?>
    </body>
</html>