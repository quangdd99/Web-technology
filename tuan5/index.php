<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="main_page">
        <table border="0">
                <tr style="background-color: grey;height:35px">
                    <td>
                        Cat ID
                    </td>
                    <td>
                        Title
                    </td>
                    <td>
                        Description
                    </td>
                </tr>
                <?php
                include 'showcat.php';
                ?>    
            <form action="add.php">
            <tr>
                <td><input type="number" name="CatID" style="width: 100%;height:30px"></td>
                <td><input type="text" name="Tit" style="width: 100%;height:30px"></td>
                <td><input type="text" name="Desc" style="width: 100%;height:30px"></td>
            </tr>
            </table>
            <input type="submit" value="Add Category" style="width: 33%; height:35px">
            
            </form>
            <?php
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    if ($message == "success") {
         echo "<p>Add Category Success!</p>";
    } else {
         echo "<p>Error! Try again!</p>";
    }
}
?>
</div>




</body>
</html>