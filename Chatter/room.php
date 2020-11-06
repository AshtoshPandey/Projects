<?php
   $roomname= $_GET["roomname"];
   include 'db_connection.php';
   $sql= "Select * from rooms WHERE Room_Name=(:rno)";
   $stmt= $pdo->prepare($sql);
   $stmt->execute(array(':rno'=>$roomname));
   $row= $stmt->fetch();
   if(!$row)
   {
     header("Location: index.php");
   };
?>
<html>
  <head>
    <title>Chat Room- <?php echo "$roomname";?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet "href="style/product.css">
    <link rel="stylesheet" href="style/chat.css">
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Chatter</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Home</a>
        <a class="p-2 text-dark" href="#">About</a>
        <a class="p-2 text-dark" href="#">Contact</a>
      </nav>
    </div>
      <h2>Chat Messages</h2>
      <div class="container">
        <div class="anyclass">
        <!--<img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">-->
          
        </div>
      </div>
        <input type="text" id="chatmsg" name="chatmsg" class="form-control" placeholder="Send Message"><br>
        <button class="btn btn-primary" id="sendchat" value="sendchat" name="sendchat" >Send</button>
        <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript">

            setInterval(runFunction,1000);
            function runFunction()
            {
              $.post("htcont.php",{room: '<?php echo $roomname ?>'},
                function(data, status){
                     document.getElementsByClassName('anyclass')[0]. innerHTML= data;
                }
              )
            }

            var input = document.getElementById("chatmsg");
            input.addEventListener("keyup", function(event) {
              if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("sendchat").click();
              }
            });

           $("#sendchat").click(function(){
             var clientmsg = $("#chatmsg").val();
             $.post("postmsg.php",{text: clientmsg, room: '<?php echo $roomname ?>', ip: '<?php echo ($_SERVER['REMOTE_ADDR'])?>'},
             function(data , status){
               document.getElementsByClassName('anyclass')[0].innerHTML= data;});
               $("#chatmsg").val("");
               return false;
             });
        </script>
</body>
</html>
