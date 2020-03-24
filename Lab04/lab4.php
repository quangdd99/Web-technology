<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file</title>
    <style>
        .content {
            justify-content: center;
            align-items: center;
            margin: auto;
            width: 60%;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px #ccc; 
            border-radius: 1%;
            line-height: 50px;
        }
        table{
            width: 100%;
        }
        input[type="submit"]{
            border-radius: 30px;
            cursor: pointer;
            width: 20%;
            color: azure;
            background-color: darkblue;
            height: 30px;
            box-shadow: 0px 0px 5px 0px black;
        }
        input[type="file"]{
            width: 50%;
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
        select{
            height: 30px;
            padding: 5px;
            margin: 0px 5px 0px 5px;
        }
        td{
            padding : 10px 0px 10px 5px;
        }
    </style>
</head>
<body>
    <div class="content">
        <font size="5" color="blue" style="margin: auto">Enter your number of files you want to upload</font>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
            <strong>Choose your number:</strong>
            <select name="num_file" required>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <input type="submit" name="sm_get" value="Ready">
        </form>
    
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(!empty($_GET['sm_get'])){
                $num_file = $_GET['num_file'];
                echo '<strong>You have allow to upload ' . $num_file . ' file.</strong>';
    ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
                <?php
                    for($i =0; $i < $num_file ; $i++){
                        echo '<input name="file[]" type="file" /><br>';
                    }
                ?>    
                    <input type="submit" name="sm_post" value="Upload">
                </form>
    <?php        
            }
        }
    ?>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (!empty($_POST['sm_post'])) {
                $name = array();
                $tmp_name = array();
                $error = array();
                $ext = array();
                $size = array();
                $date = array();
                $info = array();
                $detail = array();

                foreach ($_FILES['file']['name'] as $file_name) {
                    $name[] = $file_name;
                }
                foreach ($_FILES['file']['tmp_name'] as $file_tmp_name) {
                    $tmp_name[] = $file_tmp_name;
                }
                foreach ($_FILES['file']['error'] as $file_err) {
                    $error[] = $file_err;
                }
                foreach ($_FILES['file']['type'] as $file_ext) {
                    $ext[] = $file_ext;
                }
                foreach ($_FILES['file']['size'] as $file_size) {
                    $size[] = round($file_size / 1024, 2);
                }
                
                echo "<br><strong>Tổng số file tải lên: " . count($name) . " file</strong>";
                ?>
                <table border="1">
                    <tr>
                        <th>Tên File</th>
                        <th>Kích Thước</th>
                        <th>Loại</th>
                        <th>Thời Điểm Upload</th>
                        <th>Thư Mục</th>
                    </tr>
                <?php
                for ($i = 0; $i < count($name); $i++) {
                    if ($error[$i] < 0) {
                        echo "Lỗi: " . $error[$i];
                    } else
                        $temp = preg_split('/[\/\\\\]+/', $name[$i]);
                        $filename = $temp[count($temp) - 1];
                        $upload_dir = 'upload/';
                        $upload_file = $upload_dir . $filename;
                        // if (file_exists($upload_file)) {
                        //     echo '<p style="color:red">File đã tồn tại</p>';
                        // } else {
                            if (move_uploaded_file($tmp_name[$i], $upload_file)) {
                                echo "<tr>";
                                    echo "<td><p>" . $name[$i] . "</p></td>";
                                    echo "<td><p>" . $size[$i] . " kB</p></td>";
                                    echo "<td><p>" . $ext[$i] . "</p></td>";
                                    $date[$i] = date('H:i:s d-m-Y', time());
                                    echo "<td><p>" . $date[$i] . "</p></td>";
                                    echo "<td><p>" . $upload_file . "</p></td>";
                                echo "</tr>";
                                $info[$i] = [ $name[$i], $size[$i], $ext[$i], $date[$i], $upload_file ]; 
                            } else{
                                echo 'Lỗi! Không lưu được vào đường dẫn';
                            } 
                        // }  
                }
                echo '</table>';
                // print_r($info);
                sort($info);
                ?>
                <br>
                <strong>Sau khi sắp xếp theo tên:</strong>
                <table border="1">
                    <tr>
                        <th>Tên File</th>
                        <th>Kích Thước</th>
                        <th>Loại</th>
                        <th>Thời Điểm Upload</th>
                        <th>Thư Mục</th>
                    </tr>
                        <?php
                            foreach ($info as $item) {
                                echo '<tr>';
                                foreach ($item as $value) {
                                    echo "<td><p>" . $value . "</p></td>";
                                }
                                echo '</tr>';
                            }
                        ?>
                </table>
                <?php
            }
            
        }
    ?>
    </div>
</body>
</html>