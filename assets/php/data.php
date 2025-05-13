<?php
// Kết nối và lấy ID user hiện tại
include_once "config.php";
session_start();
$outgoing_id = $_SESSION['user_id'];
$output = "";

// Lấy danh sách bạn bè đã match với user hiện tại
$sql = "SELECT 
            m.ID as MatchID,
            IF(m.User1ID = $outgoing_id, m.User2ID, m.User1ID) as FriendID,
            u.UserName,
            u.Avt,
            u.IsActive
        FROM matches m
        JOIN userinformation u ON u.ID = IF(m.User1ID = $outgoing_id, m.User2ID, m.User1ID)
        WHERE m.User1ID = $outgoing_id OR m.User2ID = $outgoing_id";
$query = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($query)){
    $friend_id = $row['FriendID'];
    $match_id = $row['MatchID'];

    // Lấy tin nhắn cuối cùng giữa 2 người trong bảng chat
    $sql2 = "SELECT * FROM chat 
             WHERE MatchID = $match_id 
             ORDER BY ID DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    if(mysqli_num_rows($query2) > 0){
        $row2 = mysqli_fetch_assoc($query2);
        $msg = $row2['Messager'];
        $you = ($row2['SenderID'] == $outgoing_id) ? "Bạn: " : "";
    } else {
        $msg = "Chưa có tin nhắn";
        $you = "";
    }
    // Trạng thái online/offline
    $offline = ($row['IsActive']) ? "" : "offline";

    // Hiển thị bạn bè
    $output .= '<a href="chat.php?user_id='. $friend_id .'">
                    <div class="content">
                        <img src="./assets/img/'. htmlspecialchars($row['Avt']) .'" alt="">
                        <div class="details">
                            <span>'. htmlspecialchars($row['UserName']) .'</span>
                            <p>'. $you . htmlspecialchars($msg) .'</p>
                        </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
}
echo $output;
?>