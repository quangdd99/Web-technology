<?php
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
        if(!$db){
            echo '<b>Business Registration </b> Failed to connect!';
        }
        else{
            echo '<b>Business Registration</b>';
        }
    ?>