<?php 

require 'DbConnect.php';

function register($firstname, $lastname,  $dob, $religion,$presentaddress, $permanentaddress, $phone ,$email,$username, $password, $personalweblink) {
$conn = connect();
$sql = $conn->prepare("INSERT INTO USERS (firstname, lastname, dob, religion,presentaddress, permanentaddress, phone ,email, personalweblink,username, password) VALUES(?, ?,?,?,?,?,?,?,?,?,?)");
$sql->bind_param("sssssssssss", $firstname, $lastname,  $dob, $religion,$presentaddress, $permanentaddress, $phone ,$email,$username, $password, $personalweblink);
return $sql->execute();
}

?>