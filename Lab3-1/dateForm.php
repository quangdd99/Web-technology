<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .content {
            justify-content: center;
            align-items: center;
            margin: auto;
            width: 50%;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px #ccc; 
            border-radius: 1%;
        }
        body, div, form, input, select{ 
            padding: 0;
            margin: 0;
            outline: none;
            color: #111;
            line-height: 22px;
        }
        td{
            padding : 10px 0px 10px 5px;
        }
        select{
            margin : 0px 5px 0px 0px;
            width: 54px;
        }
        input[type="text"] {
            width: 95%;
        }
        input, select{
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input:hover, select:hover{
            border: 1px solid #095484;
            outline: none;
        }
        #submit {
            border-radius: 30px;
            cursor: pointer;
            width: 100%;
            color: azure;
            background-color: darkblue;
            height: 30px;
            box-shadow: 0px 0px 5px 0px black;
        }
        #reset {
            border-radius: 30px;
            cursor: pointer;
            width: 35%;
            color: azure;
            background-color: red;
            height: 30px;
            box-shadow: 0px 0px 5px 0px black;
        }
        .note{
            display: flex;
            /* flex-wrap: wrap; */
            flex-direction: column;
        }
    </style>
    <title>Date Time Processing</title>
</head>
<body>
    <div class="content">
        <font size="5" color="blue">Enter your name and select date and time for the appointment</font>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                $err = false;
                $dayOfMonth = 31; 
                // if(array_key_exists("name", $_GET)){
                if(!empty($_GET["name"])){
                    $name = $_GET["name"];
                    $hour = $_GET["hour"];   
                    $minute = $_GET["minute"];   
                    $second = $_GET["second"];   
                    $day = $_GET["day"];
                    $month = $_GET["month"];   
                    $year = $_GET["year"];
                    $dayOfMonth = getDayOfMonth($month, $year);
                    if($day > $dayOfMonth){
                        $err = true;
                        $errStr = '<small style="color: red";>Tháng đã chọn có số ngày nhỏ hơn hoặc bằng ' . $dayOfMonth . '!</small><br>';
                    }
                    // $dayOfMonth = 31; 
                } else {
                    $name = "";
                    $hour = 0;   
                    $minute = 0;   
                    $second = 0;   
                    $day = 1;
                    $month = 1;   
                    $year = 2020;   
                    $dayOfMonth = 31;
                }
            }
                
            ?>
            <?php
                function ckLaNamNhuan($year){
                    $chk = false;
                    if($year % 4 == 0 && $year % 100 != 0){
                        $chk = true;
                    } else if($year % 4 == 0 && $year % 400 == 0){
                        $chk = true;
                    }
                    return $chk;
                }

                function getDayOfMonth($month, $year){
                    $dayOfMonth = 31;
                    if($month == 4 || $month == 6 || $month == 9 || $month == 11 ) $dayOfMonth = 30;
                    else if($month == 2){
                        if(ckLaNamNhuan($year)) $dayOfMonth = 29;
                        else $dayOfMonth = 28;
                    }
                    return $dayOfMonth;
                }
            ?>
            <table>
                <tr>
                    <td>Your name: </td>
                    <td><input type="text" name="name" placeholder="Enter your name..." required></td>
                </tr>
                <tr>
                    <td class="note">Date: <small><i >(yyyy/MM/dd)</i></small> </td>
                    <td>
                        <select name="year" required>
                            <?php
                                for($i = 1000; $i < 4000 ; $i ++){
                                    if($year == $i){
                                        echo $year;
                                        echo "<option selected> $i</option>";
                                    }else{
                                        echo "<option > $i</option>";
                                    }
                                }
                            ?>
                        </select>
                        <?php
                        echo '<select name="month" required>';

                            for($i = 1; $i < 13 ; $i ++){
                                if($month == $i){
                                    echo "<option selected> $i</option>";
                                }else{
                                    echo "<option > $i</option>";
                                }
                            }
                        echo "</select>";

                        // $dayOfMonth = getDayOfMonth($month, $year);
                        echo '<select name="day" style= "margin-left:3.5px" required>';

                            for($i = 1; $i <= 31 ; $i ++){
                                if($day == $i){
                                    echo "<option selected> $i</option>";
                                }else{
                                    echo "<option > $i</option>";
                                }
                            }
                    
                        echo '</select><br>';
                        if($err){
                            echo $errStr;
                        }
                        ?>
                    
                    </td>
                     
                </tr>
                <tr>
                    <td class="note">Time: <small><i>(giờ/phút/giây)</i></small></td>
                    <td>
                        <select name="hour" required>
                            <?php

                                for($i = 0; $i < 24 ; $i ++){
                                    if($hour == $i){
                                        echo "<option selected> $i</option>";
                                    }else{
                                        echo "<option > $i</option>";
                                    }
                                    
                                }
                            ?>
                        </select>
                        <select name="minute" required>
                            <?php

                                for($i = 0; $i < 60 ; $i ++){
                                    if($minute == $i){
                                        echo "<option selected> $i</option>";
                                    }else{
                                        echo "<option > $i</option>";
                                    }
                                    
                                }
                            ?>
                        </select>
                        <select name="second" required>
                            <?php

                                for($i = 0; $i < 60 ; $i ++){
                                    if($second == $i){
                                        echo "<option selected> $i</option>";
                                    }else{
                                        echo "<option > $i</option>";
                                    }
                                    
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" id="submit" value="submit"></td>
                    <td align="left"><input type="reset" id="reset" value="reset" ></td>
                </tr>
            </table>
            <table>
                <?php
                // if(array_key_exists("name", $_GET)){
                    if(!empty($_GET["name"]) && !$err ){
                        echo "Hi, $name!<br>";
                        echo "You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year<br>";
                        echo "More information<br>";
                        if($hour >=0 && $hour <=11){
                            echo "You have choose to have an appointment on $hour:$minute:$second AM, $day/$month/$year<br>";
                        } else if($hour == 12){
                            echo "You have choose to have an appointment on $hour:$minute:$second PM, $day/$month/$year<br>";
                        } else {
                            $hour12 = $hour-12;
                            echo "You have choose to have an appointment on $hour12:$minute:$second PM, $day/$month/$year<br>";
                        }
                        
                        echo "This Month has $dayOfMonth days!";
                    }
                ?>
            </table>
        </form>
    </div>
</body>
</html>