
<?php

    include_once("connection/connection.php");
    session_start();
?>

<!DOCTYPE html>
<html>
    
    <head>
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

                <!-- jQuery library -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <!-- Popper JS -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

                <!-- Latest compiled JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        
                <!-- Import css file -->
                <link rel="stylesheet" href="css/chat.css">
                <link rel="stylesheet" href="css/chatbox.css">
    </head>

<!--execute ajax function immediately after the page has been loaded-->
<body onload= "ajax();">
   
<!--menu bar that shows the logged user name and logout button-->    
    <div class="menu">
            <div class="back"> <img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
            <div class="name"><?php echo $_SESSION['username']; ?></div>
            <button onclick="window.location.href='logout.php'"style="float:right; margin-top:10px;" >Logout</button>
        </div>
   
    <div id="chat">
    </div>
    
  <!-- Chat message form-->  
    <form name="myform" action="#" method="post">    
    <input class="textarea" name="message" type="text" placeholder="Type here!"/><div class="emojis"></div>
    </form>
    
   <!-- js script for submitting the form when user hits the enter key-->   
    
    <script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.myform.submit();
        }
            }
    </script>
    
    <!-- php script to insert the form data into database-->
    
    <?php
    if(($_POST['message'])!=""){
        $name = $_SESSION['username'];
                      
                        $message = $_POST['message'];
                    
                        $sql = "INSERT INTO chat_info (username,msg,date) VALUES ('$name','$message',CURRENT_TIMESTAMP)";
                        $query = mysqli_query($con,$sql);
                
                        if($query)
                        {
                            echo "<audio src = 'sound/134332-facebook-chat-sound.mp3' hidden = 'true' autoplay = 'true' /></audio>";
                        }

    }
    ?>

    </body>
    <script src="script.js"></script>

</html>