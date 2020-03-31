<?php
    class MySQL {

        function MySQL($db_host, $db_user, $db_pass, $dn_name){
            $connection = mysqli_connect($db_host, $db_user, $db_pass, $dn_name);
            return $connection;
        }
    }
?>