<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['submit_post'])) {
            $name = array();
            $tmp_name = array();
            $error = array();
            $ext = array();
            $size = array();
            $date = array();
            foreach ($_FILES['file']['name'] as $file) {
                $name[] = $file;
            }
            foreach ($_FILES['file']['tmp_name'] as $file) {
                $tmp_name[] = $file;
            }
            foreach ($_FILES['file']['error'] as $file) {
                $error[] = $file;
            }
            foreach ($_FILES['file']['type'] as $file) {
                $ext[] = $file;
            }
            foreach ($_FILES['file']['size'] as $file) {
                $size[] = round($file / 1024, 2);
            } //Phần này lấy giá trị ra từng mảng nhỏ
            
            echo "Tổng số file được tải lên: " . count($name) . " file";
            ?>
            <table>
                <tr>
                    <th>Tên File</th>
                    <th>Loại</th>
                    <th>Kích Thước</th>
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
                    if (file_exists($upload_file)) {
                        echo 'File đã tồn tại';
                    } else {
                        if (move_uploaded_file($tmp_name[$i], $upload_file)) {
                            echo "<tr>";
                                echo "<td><p>" . $name[$i] . "</p></td>";
                                echo "<td><p>" . $ext[$i] . "</p></td>";
                                echo "<td><p>" . $size[$i] . " kB</p></td>";
                                $date[$i] = date('H:i:s d-m-Y', time());
                                echo "<td><p>" . $date[$i] . "</p></td>";
                                echo "<td><p>" . $upload_file . "</p></td>";
                            echo "</tr>";
                        } else{
                            echo 'Lỗi! Không lưu được vào đường dẫn';
                        } 
                    }
                       
            }
            echo '</table>';
        }
    }
    ?>



    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
        <input multiple="multiple" name="file[]" size="141" type="file" />
        <input name="submit_post" type="submit" value="Upload" />
    </form>

</body>
</html>

