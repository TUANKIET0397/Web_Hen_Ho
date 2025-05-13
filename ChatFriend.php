<?php
    session_start();
    include_once "./assets/php/config.php";

    if (!isset($_SESSION['user_id'])) {
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flirt Zone - Chat Friend</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- chat friend page -->
    <link rel="stylesheet" href="./assets/css/ChatFriend.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="./assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <div class="box_textchatpage">
        <header class="header fixed-header">
            <div class="body">
                <!-- logo -->
                <div class="logo">
                    <img style="margin-bottom: 7px;" src="./assets/img/logo.svg" alt="Flirt Zone">
                    <div class="logo-desc" style="margin-bottom: 1px;">
                        <img src="./assets/img/logo-desc1.svg" alt="Flirt Zone">
                        <img src="./assets/img/logo-desc2.svg" alt="Flirt Zone">
                    </div>
                </div>
                <!-- nav -->
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#!">About</a>
                    </li>
                    <li>
                        <a href="support.php">Support</a>
                    </li>
                    <li>
                        <a href="SwipeProfile.php" style="color: red;">Swipe</a>
                    </li>
                </ul>
                <!-- action to call -->
                <div class="action">
                    <a href="#!" class="button avatar" style="background-image: url(./assets/img/avt.jpg);"></a>
                    <div class="menu-nav-avt" id="userMenu">
                        <a href="Profileuser.php" class="dropdown-item">Xem trang cá nhân</a>
                        <a href="./assets/php/logout.php" class="dropdown-item">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="textchat_container">
            <!-- Chat side no friend -->
            <div class="chat-side">
                <div class="chat-friend">
                    <a href="swipeProfile.php" style="margin-left: 24px;">
                        <button class="chat-friend__filter ">
                            <img src="./assets/img/filter.svg" alt="" class="chat-img">
                            <span class="chat-friend__filter-text">Filter</span>
                        </button>
                    </a>
                    <button class="chat-friend__friend chat-friend--active" style="margin-left: -24px">
                        <img src="./assets/img/users.svg" alt="" class="friend-img">
                        <span class="chat-friend__friend-text">Friends</span>
                    </button>
                </div>
                <!-- Friend -->
                <div class="wrapper">
                    <section class="users">
                        <header>
                            <div class="content">

                                <?php
                        $sql = mysqli_query($conn, "SELECT * FROM userinformation WHERE ID = {$_SESSION['user_id']}");

                        if (mysqli_num_rows($sql) > 0) {
                            $row = mysqli_fetch_assoc($sql);
                        }
                        ?>
                            </div>
                        </header>
                        <!-- danh sach friend chat -->
                        <div class="users-list">
                            <?php
        // Lấy ID user hiện tại
        $currentUserId = $_SESSION['user_id'];
        // Lấy danh sách matches
        $sql_matches = mysqli_query($conn, "
            SELECT 
                m.ID as MatchID,
                IF(m.User1ID = $currentUserId, m.User2ID, m.User1ID) as FriendID,
                u.UserName,
                u.Avt,
                u.IsActive
            FROM matches m
            JOIN userinformation u ON u.ID = IF(m.User1ID = $currentUserId, m.User2ID, m.User1ID)
            WHERE m.User1ID = $currentUserId OR m.User2ID = $currentUserId
        ");
        if (mysqli_num_rows($sql_matches) > 0) {
            while ($friend = mysqli_fetch_assoc($sql_matches)) {
                ?>
                            <div class="user" data-friend-id="<?php $friend['FriendID']; ?>"
                                onclick="window.location.href='chat.php?user_id=<?php echo $friend['FriendID']; ?>'">
                                <div class="avatar"
                                    style="background-image: url('./assets/img/<?php echo htmlspecialchars($friend['Avt']); ?>');">
                                </div>
                                <div class="details">
                                    <span>
                                        <?php echo htmlspecialchars($friend['UserName']); ?>
                                    </span>
                                    <p>
                                        <?php 
                                        $ol = $row['IsActive'] ? "Online" : "Offline"; 
                    if ($ol == "Online") {
                        echo "<span class='online' style='color:green'>".$ol."</span>";
                    } else {
                        echo "<span class='offline' style='color:red'>".$ol."</span>";
                    }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                            }
                            } else {
                            echo "<div class='no-friends'>Bạn chưa có bạn nào.</div>";
                            }
                            ?>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Script choose friend to chat
    const chat_side__content_friends = document.querySelectorAll('.chat-side__content-friends');
    const main_content = document.querySelector('.main-content');

    chat_side__content_friends.forEach(button => {
        button.addEventListener('click', () => {
            chat_side__content_friends.forEach(btn => btn.classList.remove(
                'chat-side__content-friends--active'));
            button.classList.add('chat-side__content-friends--active');
        });
    });

    // Script report
    const reportBtn = document.querySelector('.textchat__func');
    const report_modal = document.querySelector('.textchat__func-report');

    reportBtn.addEventListener('click', () => {
        report_modal.classList.toggle('textchat__func-report--show');
    });

    // Script choose chat-friend
    const chat = document.querySelector('.chat-friend__filter');
    const friend = document.querySelector('.chat-friend__friend');
    const chat_side_content = document.querySelector('.chat-side__content');
    const chat_side__content_friend = document.querySelector('.chat-side__content-friend');

    chat.addEventListener('click', () => {
        chat.classList.add('chat-friend--active');
        friend.classList.remove('chat-friend--active');
        chat_side_content.classList.remove('chat-side__content--hide');
        chat_side__content_friend.classList.remove('chat-side__content-friend--show');
    });

    friend.addEventListener('click', () => {
        friend.classList.add('chat-friend--active');
        chat.classList.remove('chat-friend--active');
        chat_side__content_friend.classList.add('chat-side__content-friend--show');
        chat_side_content.classList.add('chat-side__content--hide');
    });

    // Add functionality to send messages
    const textInput = document.querySelector('.friendchat__input');
    const sendButton = document.querySelector('.textchat__send');
    const chatBox = document.querySelector('.friendchat-box');

    sendButton.addEventListener('click', () => {
        if (textInput.value.trim() !== '') {
            const message = document.createElement('div');
            message.classList.add('mess', 'my-mess');
            message.textContent = textInput.value;
            chatBox.appendChild(message);
            textInput.value = '';
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    });

    textInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && textInput.value.trim() !== '') {
            const message = document.createElement('div');
            message.classList.add('mess', 'my-mess');
            message.textContent = textInput.value;
            chatBox.appendChild(message);
            textInput.value = '';
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    });
    </script>

    <!-- Script Filter -->
    <script>
    const filterAgeMinInput = document.getElementById('filterAgeMin');
    const filterAgeMaxInput = document.getElementById('filterAgeMax');
    const ageMinDisplay = document.querySelector('.chat-side__content-filter__age-first-value');
    const ageMaxDisplay = document.querySelector('.chat-side__content-filter__age-second-value');

    function applyFilters() {
        const ageMin = parseInt(filterAgeMinInput.value);
        const ageMax = parseInt(filterAgeMaxInput.value);

        filteredUsers = allUsers.filter(user => {
            let passes = true;
            if (user.age < ageMin || user.age > ageMax) passes = false;
            return passes;
        });
    }


    // Update display for range sliders
    if (filterAgeMinInput && ageMinDisplay) {
        filterAgeMinInput.addEventListener('input', (e) => {
            ageMinDisplay.textContent = e.target.value;
            if (parseInt(filterAgeMaxInput.value) < parseInt(e.target.value)) {
                filterAgeMaxInput.value = e.target.value;
                ageMaxDisplay.textContent = e.target.value;
            }
        });
    }
    if (filterAgeMaxInput && ageMaxDisplay) {
        filterAgeMaxInput.addEventListener('input', (e) => {
            ageMaxDisplay.textContent = e.target.value;
            if (parseInt(filterAgeMinInput.value) > parseInt(e.target.value)) {
                filterAgeMinInput.value = e.target.value;
                ageMinDisplay.textContent = e.target.value;
            }
        });
    }
    if (filterDistanceInput && distanceDisplay) {
        filterDistanceInput.addEventListener('input', (e) => {
            distanceDisplay.textContent = `${e.target.value} km`;
        });
    }
    </script>

    <script>
    //nut avt
    const avatar = document.querySelector('.avatar');
    const menu = document.getElementById('userMenu');
    const items = document.querySelectorAll('.dropdown-item');

    avatar.addEventListener('click', (e) => {
        e.stopPropagation();
        menu.style.display = (menu.style.display === 'flex') ? 'none' : 'flex';
    });

    document.addEventListener('click', () => {
        menu.style.display = 'none';
    });

    menu.addEventListener('click', (e) => {
        e.stopPropagation();
    });
    items.forEach(item => {
        item.addEventListener('click', () => {
            menu.style.display = 'none';
        });
    });
    </script>
    <script type="text/javascript" src="./js/users.js"></script>

</body>

</html>