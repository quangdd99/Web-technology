<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date and time</title>
</head>
<body>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo $_POST["date1"];
        echo '<br>New format<br>';
        $time1 = strtotime($_POST["date1"]);//Y-m-d
        echo date('d-m-Y', $time1);
        echo '<br>'; 
    }
    ?>
    <?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $birthday = '1993-12-30';
        $diff = date_diff(date_create(), date_create($_POST["date1"]));
        $age = $diff->format('%Y');

        echo $age;
    ?>
    <?php

        function show($name1, $name2, $date1, $date2){
            if(!empty($name1) && !empty($name2) && !empty($date1) && !empty($date2)){
            ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Date Of Birth</th>
                    <th>Age</th>
                </tr>
            </table>
            <?php
            }
        }
    ?>
</body>
</html>