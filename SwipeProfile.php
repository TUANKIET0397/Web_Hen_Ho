<?php

include_once "./assets/php/config.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

// Lấy dữ liệu từ form lọc
$userID = $_SESSION["user_id"];
$sql = "SELECT * FROM userinformation WHERE ID = $userID";
$result = mysqli_query($conn, $sql);

$user = null;
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}
$filterAgeMin = isset($_POST['filterAgeMin']) ? (int)$_POST['filterAgeMin'] : 18;
$filterAgeMax = isset($_POST['filterAgeMax']) ? (int)$_POST['filterAgeMax'] : 99;
$filterLookingFor = isset($_POST['lookingfor']) ? (int)$_POST['lookingfor'] : null;
$filterLocation = isset($_POST['location']) ? (int)$_POST['location'] : null;
$filterHobby = isset($_POST['hobby']) ? (int)$_POST['hobby'] : null;

// Tạo truy vấn SQL với các điều kiện lọc
$query = "SELECT u.ID, u.UserName, u.Age, u.UserAddress AS Location,
                 GROUP_CONCAT(DISTINCT h.HobbyName SEPARATOR ', ') AS Hobby,
                 GROUP_CONCAT(DISTINCT p.PersonallyName SEPARATOR ', ') AS Personality,
                 GROUP_CONCAT(DISTINCT l.LookingName SEPARATOR ', ') AS LookingFor,
                 GROUP_CONCAT(DISTINCT j.JobName SEPARATOR ', ') AS Job
          FROM userinformation u
          LEFT JOIN userhobbby uh ON u.ID = uh.UserID
          LEFT JOIN hobbylist h ON uh.HobbyID = h.ID
          LEFT JOIN userpersonally up ON u.ID = up.UserID
          LEFT JOIN personallylist p ON up.PersonallyID = p.ID
          LEFT JOIN userlooking ul ON u.ID = ul.UserID
          LEFT JOIN looking l ON ul.LookingID = l.ID
          LEFT JOIN userjob uj ON u.ID = uj.UserID
          LEFT JOIN joblist j ON uj.JobID = j.ID
          WHERE u.Age BETWEEN $filterAgeMin AND $filterAgeMax
           AND u.ID != $userID";

if ($filterLookingFor) {
    $query .= " AND ul.LookingID = $filterLookingFor";
}
if ($filterLocation) {
    $query .= " AND u.UserAddress = '" . mysqli_real_escape_string($conn, $filterLocation) . "'";
}
if ($filterHobby) {
    $query .= " AND uh.HobbyID = $filterHobby";
}

$query .= " GROUP BY u.ID";

$result = mysqli_query($conn, $query);

// Lấy danh sách người dùng phù hợp
$users = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
} else {
    $users = null; // Không có người dùng phù hợp
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flirt Zone - Swipe</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- swipe page -->
    <link rel="stylesheet" href="./assets/css/SwipeProfile.css">
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
    <div class="box_swipepage">
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
                        <a href="#!" style="color: red;">Swipe</a>
                    </li>
                </ul>
                <!-- action to call -->
                <div class="action">
                    <a href="#!" class="button avatar"
                        style="background-image: url('<?php echo !empty($user['Avt']) ? htmlspecialchars($user['Avt']) : './assets/img/default-avatar.jpg'; ?>');">
                    </a>
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
                    <button class="chat-friend__filter chat-friend--active">
                        <img src="./assets/img/filter.png" alt="" class="chat-img">
                        <span class="chat-friend__filter-text">Filter</span>
                    </button>
                    <button class="chat-friend__friend">
                        <img src="./assets/img/users.svg" alt="" class="friend-img">
                        <span class="chat-friend__friend-text">Friends</span>
                    </button>
                </div>
                <!-- Filter -->
                <div class="chat-side__content">
                    <form class="chat-side__content-main" name="profile" id="profile" action="SwipeProfile.php" method="post"
                        enctype="multipart/form-data" autocomplete="off">
                        <div class="chat-side__content-filter__age">
                            <div class="chat-side__content-filter__age-title">AGE:</div>
                            <input type="range" id="filterAgeMin" name="filterAgeMin" min="18" max="99" value="18"
                                class="chat-side__content-filter__age-line1">
                            <input type="range" id="filterAgeMax" name="filterAgeMax" min="18" max="99" value="35"
                                class="chat-side__content-filter__age-line2">
                            <div class="chat-side__content-filter__age-text">
                                <div class="chat-side__content-filter__age-first-value">13</div>
                                <div class="chat-side__content-filter__age-text"> - </div>
                                <div class="chat-side__content-filter__age-second-value">24 </div>
                                <div class="chat-side__content-filter__age-text"> years old</div>
                            </div>
                        </div>
                        <?php
                        $us_look = "select * from looking";
                        $us_hobby = "select * from hobbylist";
                        $us_location = "SELECT DISTINCT UserAddress as Address FROM userinformation";
                        $kq_us_location = mysqli_query($conn, $us_location);
                        $kq_us_look = mysqli_query($conn, $us_look);
                        $kq_us_hobby = mysqli_query($conn, $us_hobby);
                        ?>
                        <div class="chat-side__content-filter__lookingfor">
                            <div class="chat-side__content-filter__lookingfor-title">Looking for:</div>
                            <select name="lookingfor" id="lookingfor">
                                <option style="text-align: center;" value="">------ Selection Looking ------</option>
                                <?php
                                while ($a = mysqli_fetch_array($kq_us_look)) { ?>
                                    <option value=" <?php echo $a["ID"] ?>"> <?php echo $a["LookingName"] ?></option>
                                <?php } ?>
                                <?php
                                while ($a = mysqli_fetch_array($kq_us_look)) { ?>
                                    <option value=" <?php echo $a["ID"] ?>"> <?php echo $a["LookingName"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="chat-side__content-filter__location">
                            <div class="chat-side__content-filter__location-title">Location:</div>
                            <select name="location" id="location">
                                <option style="text-align: center;" value="">------ Selection Location ------</option>
                                <?php
                                while ($c = mysqli_fetch_array($kq_us_location)) { ?>
                                <option value=" <?php echo $c["ID"] ?>"> <?php echo $c["Address"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="chat-side__content-filter__hobby">
                            <div class="chat-side__content-filter__hobby-title">Hobby:</div>
                            <select name="hobby" id="hobby">
                                <option style="text-align: center;" value="">------ Selection Hobby ------</option>
                                <?php
                                while ($c = mysqli_fetch_array($kq_us_hobby)) { ?>
                                    <option value=" <?php echo $c["ID"] ?>"> <?php echo $c["HobbyName"] ?></option>
                                <?php } ?>
                                <?php
                                while ($c = mysqli_fetch_array($kq_us_hobby)) { ?>
                                    <option value=" <?php echo $c["ID"] ?>"> <?php echo $c["HobbyName"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="chat-side__content-btn">
                            <button type="submit" class="apply-btn">Apply</button>
                            <button type="reset" class="reset-btn">Reset</button>
                        </div>
                    </form>

                </div>
                <!-- Friend -->
                <div class="chat-side__content-friend">
                    <button class="chat-side__content-friends">
                        <<<<<<< HEAD=======<div class="chatavt button avatar"
                            style="background-image: url(./assets/img/avt.jpg);">
                </div>
                <div class="listfriend">
                    <div class="listfriend__name">Lee tuna kaai</div>
                    <div class="listfriend__seen">seen. 2 hours</div>
                </div>
                </button>
                <button class="chat-side__content-friends">
                    <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);"></div>
                    <div class="listfriend">
                        <div class="listfriend__name">John Smith</div>
                        <div class="listfriend__seen">seen. 5 hours</div>
                    </div>
                </button>
                <button class="chat-side__content-friends">
                    <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);"></div>
                    <div class="listfriend">
                        <div class="listfriend__name">Jane Doe</div>
                        <div class="listfriend__seen">seen. 1 day</div>
                    </div>
                    >>>>>>> 73a2a45652e9cf2aea0d381597ad19e1c89f4c67
                </button>

            </div>
        </div>

        <!-- Updated Main Content Section -->
        <div class="main-content">
            <div class="swipe-container">
                <div class="card-container">
                    <?php if ($users): ?>
                    <?php foreach ($users as $user): ?>
                    <?php
                                // Lấy tất cả ảnh của user này
                                $userId = $user['ID'];
                                $queryImg = "SELECT imgPath FROM images WHERE UserID = $userId AND IsActive = 1";
                                $resultImg = mysqli_query($conn, $queryImg);
                                $images = [];
                                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                                    $images[] = $rowImg['imgPath'];
                                }
                                // Phân trang ảnh cho user này
                                $imagesPerPage = 1;
                                $totalImages = count($images);
                                $totalPages = max(1, ceil($totalImages / $imagesPerPage));
                                $imgPageParam = "imgpage_" . $userId;
                                $currentPage = isset($_GET[$imgPageParam]) ? (int)$_GET[$imgPageParam] : 1;
                                $currentPage = max(1, min($currentPage, $totalPages));
                                $startIndex = ($currentPage - 1) * $imagesPerPage;
                                $currentImages = array_slice($images, $startIndex, $imagesPerPage);
                                ?>
                    <div class="card" id="profile-card-<?php echo $userId; ?>">
                        <div class="card-images-container">
                            <div class="card-wrapper">
                                <div class="card-images">
                                    <!-- Hiển thị ảnh của user -->
                                    <?php if ($images): ?>
                                    <?php foreach ($images as $idx => $image): ?>
                                    <img src="<?php echo htmlspecialchars($image); ?>" alt="Profile Image"
                                        class="card-image"
                                        style="display: <?php echo $idx === 0 ? 'block' : 'none'; ?>;"
                                        data-index="<?php echo $idx; ?>">
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <img src="./assets/img/default-profile.jpg" alt="Profile Image" class="card-image"
                                        style="display: block;">
                                    <?php endif; ?>
                                </div>
                                <!-- Phân trang ảnh -->
                                <div class="pagination-buttons">
                                    <button class="pagination-button prev-img-btn"
                                        style="display:none;">Previous</button>
                                    <button class="pagination-button next-img-btn"
                                        <?php if (count($images) <= 1) echo 'style="display:none;"'; ?>>Next</button>
                                </div>
                            </div>
                            <!-- Thông tin user -->
                            <div class="profile-info" id="profile-info-<?php echo $userId; ?>" style="display: none;">
                                <div class="info-item">
                                    <span class="info-item-icon"><img style="width: 24px; height: 24px;"
                                            src="./assets/img/user_white.png" alt=""></span>
                                    <div class="info-item-text">
                                        <span class="info-item-label">Name:</span>
                                        <span
                                            class="info-item-content"><?php echo htmlspecialchars($user['UserName']); ?></span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-item-icon"><img src="./assets/img/calendar.png" alt=""></span>
                                    <div class="info-item-text">
                                        <span class="info-item-label">Age:</span>
                                        <span
                                            class="info-item-content"><?php echo htmlspecialchars($user['Age']); ?></span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-item-icon"><img src="./assets/img/calendar.png" alt=""></span>
                                    <div class="info-item-text">
                                        <span class="info-item-label">Job:</span>
                                        <span
                                            class="info-item-content"><?php echo htmlspecialchars($user['Job']); ?></span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-item-icon"><img src="./assets/img/calendar.png" alt=""></span>
                                    <div class="info-item-text">
                                        <span class="info-item-label">Location:</span>
                                        <span
                                            class="info-item-content"><?php echo htmlspecialchars($user['Location']); ?></span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-item-icon"><img src="./assets/img/arrow-up-right.png"
                                            alt=""></span>
                                    <div class="info-item-text">
                                        <span class="info-item-label">Looking for:</span>
                                        <span
                                            class="info-item-content"><?php echo htmlspecialchars($user['LookingFor']); ?></span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-item-icon"><img src="./assets/img/coffee.png" alt=""></span>
                                    <div class="info-item-text">
                                        <span class="info-item-label">Hobby:</span>
                                        <span
                                            class="info-item-content"><?php echo htmlspecialchars($user['Hobby']); ?></span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-item-icon"><img src="./assets/img/meh.png" alt=""></span>
                                    <div class="info-item-text">
                                        <span class="info-item-label">Personality:</span>
                                        <span
                                            class="info-item-content"><?php echo htmlspecialchars($user['Personality']); ?></span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <span class="info-item-icon"><img src="./assets/img/award.png" alt=""></span>
                                    <div class="info-item-text">
                                        <span class="info-item-label">Story:</span>
                                        <span
                                            class="info-item-content"><?php echo htmlspecialchars($user['Story']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Nút hành động -->
                        <div class="card-action-buttons">
                            <button class="action-button dismiss-button" id="dismiss-button-<?php echo $userId; ?>"><img
                                    src="./assets/img/x.png" alt=""></button>
                            <button class="action-button undo-button" id="undo-button-<?php echo $userId; ?>"><img
                                    src="./assets/img/restore.png" alt=""></button>
                            <button class="action-button profile-button" id="profile-button-<?php echo $userId; ?>"><img
                                    src="./assets/img/user_white.png" alt=""></button>
                            <button class="action-button like-button" id="like-button-<?php echo $userId; ?>"><img
                                    src="./assets/img/heart.png" alt=""></button>
                        </div>
                    </div>

                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="no-results">
                        <p>No profiles match your filters.</p>
                    </div>
                    <?php endif; ?>
                </div>
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
                chat_side__content_friends.forEach(btn => btn.classList.remove('chat-side__content-friends--active'));
                button.classList.add('chat-side__content-friends--active');
            });
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
    </script>

    <script>
        // Avatar dropdown menu
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
    <script>
        const cards = document.querySelectorAll('.card-container .card');
        let currentIndex = 0;

        function showCard(index) {
            cards.forEach((card, i) => {
                card.style.display = (i === index) ? 'flex' : 'none';
            });
        }
        showCard(currentIndex);

        // Xử lý nút trong từng card
        cards.forEach((card, i) => {
            const userId = card.id.replace('profile-card-', '');
            const dismissBtn = card.querySelector(`#dismiss-button-${userId}`);
            const likeBtn = card.querySelector(`#like-button-${userId}`);
            const undoBtn = card.querySelector(`#undo-button-${userId}`);
            const profileBtn = card.querySelector(`#profile-button-${userId}`);
            const profileInfo = card.querySelector(`#profile-info-${userId}`);

            // Hiện/ẩn thông tin profile
            if (profileBtn && profileInfo) {
                profileBtn.addEventListener('click', () => {
                    profileInfo.style.display = (profileInfo.style.display === 'none' || profileInfo.style.display === '') ? 'flex' : 'none';
                });
            }

            // Like: gửi like và chuyển card tiếp theo
            if (likeBtn) {
                likeBtn.addEventListener('click', () => {
                    fetch('like.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `likedUserId=${userId}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('You liked this profile!');
                                nextCard();
                            } else {
                                alert('Error: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            }

            // Dismiss: chuyển card tiếp theo
            if (dismissBtn) {
                dismissBtn.addEventListener('click', () => {
                    nextCard();
                });
            }

            // Undo: quay lại card trước đó
            if (undoBtn) {
                undoBtn.addEventListener('click', () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        showCard(currentIndex);
                    }
                });
            }
        });

        function nextCard() {
            if (currentIndex < cards.length - 1) {
                currentIndex++;
                showCard(currentIndex);
            } else {
                // Hết card, có thể hiện thông báo hoặc reload lại trang
                cards.forEach(card => card.style.display = 'none');
                const container = document.querySelector('.swipe-container');
                if (container) {
                    container.innerHTML = '<div class="no-results"><p>No more profiles.</p></div>';
                }
            }
        }
    </script>
    <script>
        document.querySelectorAll('.card').forEach(card => {
            const images = card.querySelectorAll('.card-image');
            const prevBtn = card.querySelector('.prev-img-btn');
            const nextBtn = card.querySelector('.next-img-btn');
            let current = 0;

            function updateButtons() {
                if (images.length <= 1) {
                    prevBtn.style.display = 'none';
                    nextBtn.style.display = 'none';
                } else {
                    prevBtn.style.display = current === 0 ? 'none' : 'inline-block';
                    nextBtn.style.display = current === images.length - 1 ? 'none' : 'inline-block';
                }
            }

            function showImage(idx) {
                images.forEach((img, i) => {
                    img.style.display = (i === idx) ? 'block' : 'none';
                });
                current = idx;
                updateButtons();
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    if (current > 0) showImage(current - 1);
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    if (current < images.length - 1) showImage(current + 1);
                });
            }

            showImage(0);
        });
    </script>
</body>

</html>