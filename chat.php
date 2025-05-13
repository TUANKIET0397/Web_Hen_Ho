<?php
    session_start();
    include_once "./assets/php/config.php";
    if (!isset($_SESSION['user_id'])) {
        header("location: ChatFriend.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT REALTIME PHP</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="./assets/css/chat.css">
</head>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>

                <?php
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

                    $sql = mysqli_query($conn, "SELECT * FROM userinformation WHERE ID = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    } else {
                        header("location: ChatFriend.php");
                    }
                ?>

                <a href="ChatFriend.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="./assets/img/callvideo_all.svg" alt="">
                <div class="details">
                    <span> <?php echo $row['UserName'] ?> </span>
                    <p><?php
                    $ol = $row['IsActive'] ? "Online" : "Offline"; 
                    if ($ol == "Online") {
                        echo "<span class='online' style='color:green'>".$ol."</span>";
                    } else {
                        echo "<span class='offline' style='color:red'>".$ol."</span>";
                    }
                    ?></p>
                </div>
            </header>

            <div class="chat-box">

            </div>

            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value=" <?php echo $user_id ?>" hidden>
                <input type="text" class="input-field" name="message" placeholder="Type a message here..."
                    autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>

            </form>
        </section>
    </div>
    <script type="text/javascript" src="./assets/js/chat.js"></script>

</body>

</html>