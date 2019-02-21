<?php

$hostname = "localhost";
$username = "root";
$password= "";
$database_name = "chat";

    $con = new mysqli($hostname,$username,$password,$database_name);

    function formatDate($date)
    {
        return date('g:i a',strtotime($date));
    }


?>
