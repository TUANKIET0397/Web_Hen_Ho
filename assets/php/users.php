<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM userinformation WHERE NOT ID = {$outgoing_id} ORDER BY ID DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "./assets/php/data.php";
    }
    echo $output;
?>