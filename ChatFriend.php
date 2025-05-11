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
                        <a href="#!" class="dropdown-item">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="textchat_container">
            <!-- Chat side no friend -->
            <div class="chat-side">
                <div class="chat-friend">
                    <button class="chat-friend__filter chat-friend--active">
                        <img src="./assets/img/filter.svg" alt="" class="chat-img">
                        <span class="chat-friend__filter-text">Filter</span>
                    </button>
                    <button class="chat-friend__friend">
                        <img src="./assets/img/users.svg" alt="" class="friend-img">
                        <span class="chat-friend__friend-text">Friends</span>
                    </button>
                </div>
                <!-- Filter -->
                <div class="chat-side__content">
                    <form class="chat-side__content-main" name="profile" id="profile" action="!#" method="post"
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
                        <div class="chat-side__content-filter__lookingfor">
                            <div class="chat-side__content-filter__lookingfor-title">Looking for:</div>
                            <select name="lookingfor" id="lookingfor">
                                <option style="text-align: center;" value="">------ Selection Gender------</option>
                                <option value="Everyone">Everyone</option>
                                <option value="Man">Man</option>
                                <option value="Woman">Woman</option>
                            </select>
                        </div>
                        <div class="chat-side__content-filter__location">
                            <div class="chat-side__content-filter__location-title">Location:</div>
                            <select name="location" id="location">
                                <option style="text-align: center;" value="">------ Selection Location ------</option>
                                <option value="HCM">HCM</option>
                                <option value="HaNoi">HaNoi</option>
                                <option value="DaNang">DaNang</option>
                                <option value="DongNai">DongNai</option>
                                <option value="VungTau">VungTau</option>
                                <option value="BinhPhuoc">BinhPhuoc</option>
                            </select>
                        </div>
                        <div class="chat-side__content-filter__hobby">
                            <div class="chat-side__content-filter__hobby-title">Hobby:</div>
                            <select name="hobby" id="hobby">
                                <option style="text-align: center;" value="">------ Selection Hobby ------</option>
                                <option value="Movies">Movies</option>
                                <option value="Reading">Reading</option>
                                <option value="Travel">Travel</option>
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
                        <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);"></div>
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
                    </button>
                </div>
            </div>

            <div class="main-content">
                <div class="textchat__header">
                    <div class="friendchat-avt-name">
                        <div class="button avatar" style="background-image: url(./assets/img/avt.jpg);"></div>
                        <div class="textchat__username">Lee tuna kaai</div>
                    </div>
                    <div class="textchat__func-box">
                        <button class="textchat__func">
                            <img src="./assets/img/x-circle.png" alt="" class="textchat__func-report-img">
                        </button>
                        <div class="textchat__func-report">
                            <div class="textchat__func-report__title">Report</div>
                            <div class="textchat__func-report-content">
                                <input type="text" placeholder="What is your annoys?" class="report-content__input">
                                <button class="report-content__send">
                                    <img src="./assets/img/send.svg" alt="" class="report-content__send-report">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="friendchat-box">
                    <div class="mess friend-mess">From London</div>
                    <div class="mess my-mess">Hope to see you soon.</div>
                    <div class="mess my-mess">Nice.</div>
                    <div class="mess friend-mess">I'll be there in a week!</div>
                    <div class="mess friend-mess">Have you been to Tower Bridge?</div>
                    <div class="mess my-mess">Not yet, but I'd love to go there!</div>
                </div>
                <div class="textchat__action">
                    <input type="text" class="friendchat__input" placeholder="Type your message...">
                    <button class="textchat__send">
                        <img src="./assets/img/send.svg" alt="" class="textchat__action--send">
                    </button>
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
</body>

</html>