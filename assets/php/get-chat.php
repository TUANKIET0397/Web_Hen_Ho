<?php 
session_start();
if(isset($_SESSION['user_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['user_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";

    // Kiểm tra xem 2 người đã match chưa
    $match_sql = "SELECT ID FROM matches 
                  WHERE (User1ID = $outgoing_id AND User2ID = $incoming_id)
                     OR (User1ID = $incoming_id AND User2ID = $outgoing_id)
                  LIMIT 1";
    $match_query = mysqli_query($conn, $match_sql);

    if(mysqli_num_rows($match_query) > 0){
        $match = mysqli_fetch_assoc($match_query);
        $match_id = $match['ID'];

        // Lấy tin nhắn từ bảng chat theo MatchID
        $sql = "SELECT c.*, u.Avt, u.UserName 
                FROM chat c
                JOIN userinformation u ON u.ID = c.SenderID
                WHERE c.MatchID = $match_id
                ORDER BY c.ID ASC";
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['SenderID'] == $outgoing_id){
                    // Tin nhắn mình gửi
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.htmlspecialchars($row['Messager']).'</p>
                                    </div>
                                </div>';
                }else{
                    // Tin nhắn bạn gửi
                    $avatar = !empty($row['Avt']) ? './assets/img/'.htmlspecialchars($row['Avt']) : './assets/img/default.png';
                    $output .= '<div class="chat incoming">
                                    <img src="'.$avatar.'" alt="">
                                    <div class="details">
                                        <p>'.htmlspecialchars($row['Messager']).'</p>
                                    </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
    }else{
        $output .= '<div class="text">Bạn chưa match với người này nên không thể nhắn tin.</div>';
    }
    echo $output;
}else{
    header("location: ../login.php");
}
?>