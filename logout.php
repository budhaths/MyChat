<?php
include_once('connection/connection.php');
session_start();
/* since the user is logging out we will be deleting his chat history */

    $sql= "DELETE FROM chat_info WHERE username='".$_SESSION['username']."' ";
    $query = mysqli_query($con,$sql);
    
    if($query){
        echo '<script language="javascript">';
        echo 'alert("Logging you out")';
        echo '</script>';
    }

session_unset();
session_destroy();
header("location:index.php");
exit();
?>