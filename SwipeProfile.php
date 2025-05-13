<?php 
  include_once "./assets/php/config.php";
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
                    <form class="chat-side__content-main" name="profile" id="profile" action="#" method="post"
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
                            $us_look="select * from looking";
                            $us_hobby="select * from hobbylist";
                            $kq_us_look = mysqli_query($conn,$us_look);
                            $kq_us_hobby = mysqli_query($conn,$us_hobby);
                        ?>
                        <div class="chat-side__content-filter__lookingfor">
                            <div class="chat-side__content-filter__lookingfor-title">Looking for:</div>
                            <select name="lookingfor" id="lookingfor">
                                <option style="text-align: center;" value="">------ Selection Looking ------</option>
                                <?php 
                                    while($a = mysqli_fetch_array($kq_us_look)) {?>
                                        <option value=" <?php echo $a["ID"] ?>"> <?php echo $a["LookingName"] ?></option>
                                <?php }?>
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
                                <?php 
                                    while($c = mysqli_fetch_array($kq_us_hobby)) {?>
                                        <option value=" <?php echo $c["ID"] ?>"> <?php echo $c["HobbyName"] ?></option>
                                <?php }?>
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

            <!-- Updated Main Content Section -->
            <div class="main-content">
                <div class="swipe-container">
                    <div class="card-container">
                        <div class="card" id="profile-card">
                            <div class="card-pagination" id="card-pagination">
                                <!-- Pagination dots will be added dynamically -->
                            </div>
                            <img src="./assets/img/video-call.png" alt="Profile" class="card-image" id="card-image">
                        </div>
                        <div class="profile-info" id="profile-info" style="display: none;">
                            <div class="info-item">
                                <span class="info-item-icon"><img style="width: 24px; height: 24px;"
                                        src="./assets/img/user_white.png" alt=""></span>
                                <div class="info-item-text">
                                    <span class="info-item-label">Name:</span>
                                    <span class="info-item-content" id="profile-name">Nguyen Minh Thuan</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="info-item-icon"><img src="./assets/img/calendar.png" alt=""></span>
                                <div class="info-item-text">
                                    <span class="info-item-label">Age:</span>
                                    <span class="info-item-content" id="profile-age">18</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="info-item-icon"><img src="./assets/img/calendar.png" alt=""></span>
                                <div class="info-item-text">
                                    <span class="info-item-label">Job:</span>
                                    <span class="info-item-content" id="profile-job">Student</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="info-item-icon"><img src="./assets/img/calendar.png" alt=""></span>
                                <div class="info-item-text">
                                    <span class="info-item-label">Location:</span>
                                    <span class="info-item-content" id="profile-location">HN</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="info-item-icon"><img src="./assets/img/arrow-up-right.png" alt=""></span>
                                <div class="info-item-text">
                                    <span class="info-item-label">Looking for:</span>
                                    <span class="info-item-content" id="profile-looking">realation ship</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="info-item-icon"><img src="./assets/img/award.png" alt=""></span>
                                <div class="info-item-text">
                                    <span class="info-item-label">Story:</span>
                                    <span class="info-item-content" id="profile-story">so cool</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="info-item-icon"><img src="./assets/img/coffee.png" alt=""></span>
                                <div class="info-item-text">
                                    <span class="info-item-label">Hobby:</span>
                                    <span class="info-item-content" id="profile-hobby">Film, listen to music,...</span>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="info-item-icon"><img src="./assets/img/meh.png" alt=""></span>
                                <div class="info-item-text">
                                    <span class="info-item-label">Personally:</span>
                                    <span class="info-item-content" id="profile-personality">extrovert, shy,...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action-buttons">
                        <button class="action-button dismiss-button" id="dismiss-button"><img src="./assets/img/x.png"
                                alt=""></button>
                        <button class="action-button undo-button" id="undo-button"><img src="./assets/img/restore.png"
                                alt=""></button>
                        <button class="action-button profile-button" id="profile-button"><img
                                src="./assets/img/user_white.png" alt=""></button>
                        <button class="action-button like-button" id="like-button"><img src="./assets/img/heart.png"
                                alt=""></button>
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

    <!-- New Swipe Profile Script -->
    <script>
        // Sample profile data
        const profiles = [
            {
                name: "Nguyen Minh Thuan",
                story: "so cool",
                age: 18,
                lookingFor: "realation ship",
                hobby: "Film, listecvbnm,lkjhgvfcdxx cvbhn jmkjnhbgvcxcfvgc hbnjjnhbgvc xcf fsv f sdfg fgf gf f fg g g f f vgbhnjmnhbvcfvgbh njjnhbgvcfvg bhnjjnhb vcvgbhn jbvcvgbhn to music,...",
                personality: "extrovert, shy,vb njmk,lkmjn bvcxfvgbhn jhbgvcfmjnhgb vcx fd fd  f  h hg ghhgh gh h  fg f f  g gh gh xvfbngmh nbcvx cvgbhgn...dvdfvghjk,l ,kmjhngbfvdc sxzxdklkjhgbf vcxcvfgbhj",
                images: [
                    "./assets/img/avt.jpg",
                    "./assets/img/avt-new.jpg",
                    "./assets/img/mew.jpg",
                    "./assets/img/anime.jpg"
                ]
            },
            {
                name: "Tran Hai Yen",
                story: "living my best life",
                age: 22,
                lookingFor: "friendship",
                hobby: "Photography, cooking, hiking",
                personality: "introvert, creative",
                images: [
                    "./api/placeholder/400/600?text=Profile2-1",
                    "./api/placeholder/400/600?text=Profile2-2",
                    "./api/placeholder/400/600?text=Profile2-3"
                ]
            },
            {
                name: "Pham Van Minh",
                story: "adventure seeker",
                age: 25,
                lookingFor: "casual dating",
                hobby: "Travel, sports, gaming",
                personality: "outgoing, spontaneous",
                images: [
                    "./api/placeholder/400/600?text=Profile3-1",
                    "./api/placeholder/400/600?text=Profile3-2",
                    "./api/placeholder/400/600?text=Profile3-3",
                    "./api/placeholder/400/600?text=Profile3-4",
                    "./api/placeholder/400/600?text=Profile3-5"
                ]
            }
        ];

        // DOM elements
        const profileCard = document.getElementById('profile-card');
        const cardImage = document.getElementById('card-image');
        const profileInfo = document.getElementById('profile-info');
        const cardPagination = document.getElementById('card-pagination');

        const profileName = document.getElementById('profile-name');
        const profileStory = document.getElementById('profile-story');
        const profileAge = document.getElementById('profile-age');
        const profileLooking = document.getElementById('profile-looking');
        const profileHobby = document.getElementById('profile-hobby');
        const profilePersonality = document.getElementById('profile-personality');

        const dismissButton = document.getElementById('dismiss-button');
        const undoButton = document.getElementById('undo-button');
        const profileButton = document.getElementById('profile-button');
        const likeButton = document.getElementById('like-button');

        // State variables
        let currentProfileIndex = 0;
        let currentImageIndex = 0;
        let viewingProfile = false;
        let previousProfiles = [];

        // Initialize the profile display
        function initProfiles() {
            showProfile(currentProfileIndex);
        }

        // Display the current profile
        function showProfile(index) {
            const profile = profiles[index];

            // Update profile info
            profileName.textContent = profile.name;
            profileStory.textContent = profile.story;
            profileAge.textContent = profile.age;
            profileLooking.textContent = profile.lookingFor;
            profileHobby.textContent = profile.hobby;
            profilePersonality.textContent = profile.personality;

            // Reset to first image
            currentImageIndex = 0;
            showCurrentImage();

            // Create pagination dots
            createPaginationDots(profile.images.length);
        }

        // Create pagination dots for the current profile
        function createPaginationDots(count) {
            cardPagination.innerHTML = '';

            // Limit to maximum 6 images
            const dotsToCreate = Math.min(count, 6);

            for (let i = 0; i < dotsToCreate; i++) {
                const dot = document.createElement('div');
                dot.className = 'card-pagination-dot';
                dot.dataset.index = i;

                if (i === currentImageIndex) {
                    dot.classList.add('active');
                }

                dot.addEventListener('click', () => {
                    currentImageIndex = parseInt(dot.dataset.index);
                    showCurrentImage();
                });

                cardPagination.appendChild(dot);
            }
        }

        // Update pagination dots
        function updatePaginationDots() {
            const dots = cardPagination.querySelectorAll('.card-pagination-dot');
            dots.forEach((dot, index) => {
                if (index === currentImageIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        // Show the current image
        function showCurrentImage() {
            const profile = profiles[currentProfileIndex];
            cardImage.src = profile.images[currentImageIndex];
            updatePaginationDots();
        }

        // Move to next profile
        function nextProfile() {
            // Store current profile for potential undo
            previousProfiles.push(currentProfileIndex);

            // Move to next profile
            currentProfileIndex = (currentProfileIndex + 1) % profiles.length;

            // Hide profile info if it's visible
            if (viewingProfile) {
                toggleProfileInfo();
            }

            // Show the new profile
            showProfile(currentProfileIndex);
        }

        // Undo profile change
        function undoProfile() {
            if (previousProfiles.length > 0) {
                currentProfileIndex = previousProfiles.pop();

                // Hide profile info if it's visible
                if (viewingProfile) {
                    toggleProfileInfo();
                }

                // Show the previous profile
                showProfile(currentProfileIndex);
            }
        }

        // Toggle profile info display
        function toggleProfileInfo() {
            viewingProfile = !viewingProfile;

            if (viewingProfile) {
                profileInfo.style.display = 'flex';
            } else {
                profileInfo.style.display = 'none';
            }
        }

        // Event listeners
        dismissButton.addEventListener('click', nextProfile);
        undoButton.addEventListener('click', undoProfile);
        profileButton.addEventListener('click', toggleProfileInfo);
        likeButton.addEventListener('click', () => {
            // Follow this profile
            alert(`You liked ${profiles[currentProfileIndex].name}!`);
            nextProfile();
        });

        // Initialize
        initProfiles();
    </script>
</body>

</html>