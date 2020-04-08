<?php

    //VARIABLE GET
    $name=$_GET["bus-name"];
    $address=$_GET["address"];
    $city=$_GET["city"];
    $tel=$_GET["tel"];
    $url=$_GET["url"];
    //END VARIABLE GET

    //SQL CONNECT
    $config = [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'dbname' => 'newdb'
    ];
    $db = new mysqli(
        $config['host'],
        $config['user'],
        $config['pass'],
        $config['dbname']
    );
    //END SQL CONNECT

    // SQL COMMAND START
    $com1='select Category ID from categories where Title='.$_GET["categories-name"];
    $com='INSERT INTO Businesses(Business ID,Name, Address, City, Telephone, URL) value=(name,name,address,city,tel,url)';
    // SQL COMMAND END

    //SQL START EXECUTED
        if(mysqli_query($db,$com)){
            $url='show_business.php?message=success';
            header( "Location: $url" );
        }
        else{
            $url='show_business.php?message=error';
            header( "Location: $url" );

        }
    //SQL END EXECUTED

    //SQL CLOSE CONNECT
    mysqli_close($db);
?>