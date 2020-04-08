<?php
        $config = [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'dbname' => 'newdb'
        ];
    
        // require_once('db_login.php');
        $db = new mysqli(
            $config['host'],
            $config['user'],
            $config['pass'],
            $config['dbname']
        );

        if(!$db){
            echo '<b>Category Administrator </b> Failed to connect!';
        }
        else{
            echo '<b>Category Administrator</b>';
        }

            $command="select * from categories";
            $result=$db-> query($command);
            if(!empty($result) && $result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>".$row["Category ID"]."</td><td>".$row["Title"]."</td><td>".$row["Description"]."</td></tr>";
                }
            }
            mysqli_close($db);

    ?>