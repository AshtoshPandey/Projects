<?php
   $host= "localhost";
   $user= "root";
   $password= "";
   $db= "chatroom";
   try
   {
     $pdo= new PDO("mysql:host=$host; port=3306; dbname=$db", $user, $password);
   }catch(PDOException $err){
     die("Failed to connect ".$err);
   }
?>
