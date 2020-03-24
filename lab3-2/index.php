<?php
    if(isset($_POST['submit'])){
        $num=$_POST['num'];
        $typenum=$_POST['typenum'];
        if($typenum==1){
            $message=$num."degrees = ".$num." radians";
        }
        else if($typenum==2){
            $message=$num." radians = ".$num." degrees";
        }
        else{
            $message="Please enter again because of errors encounter!";
        }
    }

        ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <h1>RADIAN DEGREES CONVERSATION</h1>
        <form action="#" method="post">
            <input type="number" name="num">
            <input type="radio" name="typenum" value="1">degree
            <input type="radio" name="typenum" value="2">radian
            <input type="submit" name="submit">
        </form>
        <?php
        $message="Please enter Data!";
    if(isset($_POST['submit'])){
        $num=$_POST['num'];
        $typenum=$_POST['typenum'];
        $message="Please enter Data!";
        if($typenum==1){
            $message=$num."degrees = ".$num." radians";
        }
        else if($typenum==2){
            $message=$num." radians = ".$num." degrees";
        }
        else{
            $message="Please enter again because of errors encounter!";
        }
        }
        echo "$message";
        ?>

    </body>
    </html>