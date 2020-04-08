<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin-left: 10%">
    <div class="Business-top-page">
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
    </div>
    <form action="add.php">    

                <div class="page">
    <div class="left-page">
        <label for="cars">Click on one, or ctrl+click on multiple categories:</label>
        <br>
        <select id="cars" multiple name="categories-name">
                <?php
                $command="select Title from categories";
                    $result=$db-> query($command);
                    if(!empty($result) && $result->num_rows > 0){
                        while($row = $result-> fetch_assoc()){
                            echo '<option value="'.$row["Title"].'">'.$row["Title"].'</option>';
                        }
                    }
                    mysqli_close($db);
                ?>

        </select>        
    </div>
    <div class="right-page">
    <table>
            <tr>
                <td>
                    Business Name:
                </td>
                <td>
                    <input type="text" name="bus-name">
                </td>
            </tr>
            <tr>
                <td>
                    Address:
                </td>
                <td>
                    <input type="text" name="address">
                </td>
            </tr>
            <tr>
                <td>
                    City:
                </td>
                <td>
                    <input type="text" name="city">
                </td>
            </tr>
            <tr>
                <td>
                    Telephone:
                </td>
                <td>
                    <input type="number" name="tel">
                </td>
            </tr>
            <tr>
                <td>
                    URL:
                </td>
                <td>
                    <input type="text" name="url">
                </td>
            </tr>
        </table>
            
    </div>
    
                </div>
                <input type="submit" value="Add business">
        </form>
</body>
</html>