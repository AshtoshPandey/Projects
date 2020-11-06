<?php
  include 'db_connection.php';
  $msg= $_POST["text"];
  $room= $_POST["room"];
  $ip= $_POST["ip"];
  $sql= "INSERT into messages(Msg, Room, IP) values(:msg,:room,:ip)";
  $stmt=$pdo->prepare($sql);
  $stmt->execute(array(':msg'=>$msg, ':room'=>$room, ':ip'=>$ip));
?>
