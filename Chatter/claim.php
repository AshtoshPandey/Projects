<?php
   $room= $_POST["room"];
   if(strlen($room)>20 or strlen($room)<2)
   {
      $message="Room Name must be between 2 and 20 characters.";
      echo '<script language="javascript">';
      echo 'alert("'.$message.'");';
      echo 'window.location="http://localhost/Chatter"';
      echo '</script>';
   }
   else if(! ctype_alnum($room))
   {
     $message="Room Name must be alphanumeric.";
     echo '<script language="javascript">';
     echo 'alert("'.$message.'");';
     echo 'window.location="http://localhost/Chatter"';
     echo '</script>';
   }
   else
   {
     include 'db_connection.php';
   }
   $sql= "Select * from rooms WHERE Room_Name=(:rno)";
   $stmt= $pdo->prepare($sql);
   $stmt->execute(array(':rno'=>$room));
   $row= $stmt->fetch();
   if($row)
   {
     $message="Room can not be made as it already exists.";
     echo '<script language="javascript">';
     echo 'alert("'.$message.'");';
     echo 'window.location="http://localhost/Chatter"';
     echo '</script>';
   }
   else
   {
     $sql1= "INSERT into rooms(Room_Name) values(:rno)";
     $stmt1= $pdo->prepare($sql1);
     $stmt1->execute(array(':rno'=>$room));
     $message="Room created successfully.";
     echo '<script language="javascript">';
     echo 'alert("'.$message.'");';
     echo 'window.location="http://localhost/Chatter/room.php?roomname='.$room.'";';
     echo '</script>';
   }
?>
