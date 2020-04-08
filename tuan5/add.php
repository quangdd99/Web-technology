<?php
$cat=$_GET['CatID'];
$tit=$_GET['Tit'];
$des=$_GET['Desc'];

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

$com="INSERT INTO `categories`(`Category ID`, `Title`, `Description`) VALUES (".$cat.",'".$tit."','".$des."')";


if(mysqli_query($db,$com)){
    $url='index.php?message=success';
    header( "Location: $url" );
}
else{
    $url='index.php?message=error';
    header( "Location: $url" );
}
mysqli_close($db);

?>