<?php

$sName = "localhost";
$uname = "quentin";
$pass = "root";
$db_name = "to_do_list";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name;port=8889",
                    $uname, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "connexion failed :" . $e->getMessage();
}
