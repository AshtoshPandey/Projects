<?php
   include 'db_connection.php';
   $room= $_POST["room"];
   $sql="SELECT * from messages where Room=(:room)";
   $stmt= $pdo->prepare($sql);
   $stmt->execute(array(':room'=>$room));
   $res="";
   if($stmt)
   {
     while($row = $stmt->fetch(PDO::FETCH_ASSOC))
     {
       $res= $res . '<div class="container">';
       $res= $res . $row["IP"];
       $res= $res . " says <p>" . $row["Msg"];
       $res= $res . '</p> <span class="time-right">' . $row["Msg_Time"] . '</span></div>';
     }
   }
   echo $res;
?>
