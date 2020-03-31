<?php
// khai báo thuộc tính database
$username = 'root';
$password = '';
$server   = 'localhost';
$db       = 'student';

// connect db
$connectDB = mysqli_connect($server, $username, $password, $db);
if (!$connectDB) {
    die('Ket noi that bai! Error: ' . mysqli_connect_error());
    exit();
}
echo "Ket noi thanh cong! <br>";

// Perform a query selecting five articles 
$sql    = 'SELECT ID, Name, Address FROM tblstudent LIMIT 0,5';
$result = $connectDB->query($sql); // Creates a MySQLResult object 
// Display the results 
if ($result->num_rows > 0) {
    echo "<br>Danh sach cac ban ghi: <br>";
    while ($row = $result->fetch_array()) {
        // Display results here 
        echo 'Sinh vien: ' . $row['Name'] . ' - MSSV: ' . $row['ID'] . ' - Que quan: ' . $row['Address'];
        echo "<br>";
    }
} else {
    echo 'Không có bản ghi nào!';
}

// ngat ket noi db
$connectDB->close();

?>