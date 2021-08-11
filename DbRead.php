<?php 

require 'DbConnect.php';

function login($username, $password) {
$conn = connect();
$sql = $conn->prepare("SELECT * FROM USERS Where username = ? and password = ?");
$sql->bind_param("ss", $username, $password);
$sql->execute();
$res = $sql->get_result();

return $res->num_rows === 1;
 }


function getAllUsers(){
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM USERS");
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
  }
  
?> 