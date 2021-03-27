<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "root1234";
    $db_name = "testdb";
    $mysqli = new my sqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8")

//check connection error
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")"
}else{
    //connect success, do nothing
    //echo "Connect success. ";
}

$kw = $_GET('kw');
//$kw = $_POST('kw');
$sql = "SELECT *
        FROM registers
        WHERE name LIKE '%$kw%' OR email LIKE '%$kw%';
$result = $mysqli->query($sql);

$arr = array();
if ($result->num_rows > 0){
    // Convert MySQL Result Set to PHP Array of object
    while($row = $result->fetch_object())
    {
        $arr[] = $row;
    }
}else{
    //echo "Not found.";
}

echo json_encode ($arr);