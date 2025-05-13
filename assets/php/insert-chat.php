<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['user_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Tìm MatchID
        $match_sql = "SELECT ID FROM matches 
                      WHERE (User1ID = $outgoing_id AND User2ID = $incoming_id)
                         OR (User1ID = $incoming_id AND User2ID = $outgoing_id)
                      LIMIT 1";
        $match_query = mysqli_query($conn, $match_sql);
        if(mysqli_num_rows($match_query) > 0 && !empty($message)){
            $match = mysqli_fetch_assoc($match_query);
            $match_id = $match['ID'];
            // Lưu tin nhắn
            $insert_sql = "INSERT INTO chat (MatchID, SenderID, Messager) VALUES ($match_id, $outgoing_id, '$message')";
            mysqli_query($conn, $insert_sql);
        }
    }else{
        header("location: ../login.php");
    }
?>