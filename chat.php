<?php
    include_once("connection/connection.php");
    session_start();
?> 
 
<!--Displaying messages on chat screen -->

<ol class="chat">
    
    <?php
     
    $query = "SELECT * FROM chat_info ORDER BY id DESC LIMIT 30;";
    $query_run   = mysqli_query($con,$query);
    
    while($query_row = mysqli_fetch_assoc($query_run)):?>   
        
    <?php if ($query_row['username']!= $_SESSION['username']){?>    
    
    <li class="other">
        <div class="avatar"><img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
            <div class="msg">
                <p><?php echo $query_row['username'].' : '; ?></p>
                <p><?php echo $query_row['msg']; ?> </p>
                <time><?php echo formatDate($query_row['date']); ?></time>
            </div>    
    </li>
    
    <?php } ?>
        
    <?php if ($query_row['username']== $_SESSION['username']){?> 
    
    <li class="self">
        <div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>
            <div class="msg">
                <p>You:</p>
                <p><?php echo $query_row['msg']; ?> </p>
                <time><?php echo formatDate($query_row['date']); ?></time>
        </div>
    </li>
    
    <?php } ?>
        
    <?php endwhile; ?>
        
    </ol>