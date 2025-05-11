<?php include_once "header.php"; ?>

<body>
    <div class="box_profile-page">
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
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="#!">About</a>
                    </li>
                    <li>
                        <a href="support.html">Support</a>
                    </li>
                    <li>
                        <a href="SwipeProfile.html" style="color: red;">Swipe</a>
                    </li>
                </ul>
                <!-- action to call -->
                <div class="action">
                    <a href="#!" class="button avatar" style="background-image: url(./assets/img/avt.jpg);"></a>
                    <div class="menu-nav-avt" id="userMenu">
                        <a href="Profileuser.html" class="dropdown-item">Xem trang cá nhân</a>
                        <a href="#!" class="dropdown-item">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="textchat_container">
            <!-- Chat side no friend -->
            <div class="chat-side">
                <div class="chat-friend">
                    <button class="chat-friend__friend">
                        <img src="./assets/img/users.svg" alt="" class="friend-img">
                        <span class="chat-friend__friend-text">Friends</span>
                    </button>
                </div>
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
                <div class="fixe-box_profile">
                    <div class="edit-profile">Edit Profile</div>
                    <div class="profile-header">
                        <div class="user-avt-profile" id="avatarPreview"></div>
                        <form id="avatarForm" enctype="multipart/form-data">
                            <input type="file" id="avatarUpload" name="avatar" class="avatar-upload" accept="image/*">
                            <button type="button" class="btn-upload" id="uploadBtn">Change Avatar</button>
                            <div id="message" class="message" style="display: none;"></div>
                        </form>
                        <h2 class="profile-name">Nguyen Minh Thuan</h2>
                        <h3 class="profile-location">29 year old, Ho Chi Minh</h3>
                    </div>

                    <form name="profile" id="profile" action="save_profile.php" method="post"
                        enctype="multipart/form-data" autocomplete="off">
                        <table class="profile-table"
                            style="width: 100%; border-collapse: separate; border-spacing: 20px;">
                            <tr class="libaryimg">
                                <td class="imguser">
                                    <div class="image-upload-container active-upload">
                                        <div class="image-preview" id="imagePreview1"></div>
                                        <label for="imageUpload1" class="upload-label">
                                            <span>+ Add Photo</span>
                                        </label>
                                        <input type="file" id="imageUpload1" name="image1" accept="image/*" disabled
                                            class="image-upload">
                                    </div>
                                </td>
                                <td class="imguser">
                                    <div class="image-upload-container locked-upload">
                                        <div class="image-preview" id="imagePreview2"></div>
                                        <label for="imageUpload2" class="upload-label">
                                            <span class="locked-text">Locked</span>
                                            <span class="active-text">+ Add Photo</span>
                                        </label>
                                        <input type="file" id="imageUpload2" name="image2" accept="image/*" disabled
                                            class="image-upload">
                                    </div>
                                </td>
                                <td class="imguser">
                                    <div class="image-upload-container locked-upload">
                                        <div class="image-preview" id="imagePreview3"></div>
                                        <label for="imageUpload3" class="upload-label">
                                            <span class="locked-text">Locked</span>
                                            <span class="active-text">+ Add Photo</span>
                                        </label>
                                        <input type="file" id="imageUpload3" name="image3" accept="image/*" disabled
                                            class="image-upload">
                                    </div>
                                </td>

                            </tr>
                            <tr class="libaryimg">
                                <td class="imguser">
                                    <div class="image-upload-container locked-upload">
                                        <div class="image-preview" id="imagePreview4"></div>
                                        <label for="imageUpload4" class="upload-label">
                                            <span class="locked-text">Locked</span>
                                            <span class="active-text">+ Add Photo</span>
                                        </label>
                                        <input type="file" id="imageUpload4" name="image4" accept="image/*" disabled
                                            class="image-upload">
                                    </div>
                                </td>
                                <td class="imguser">
                                    <div class="image-upload-container locked-upload">
                                        <div class="image-preview" id="imagePreview5"></div>
                                        <label for="imageUpload5" class="upload-label">
                                            <span class="locked-text">Locked</span>
                                            <span class="active-text">+ Add Photo</span>
                                        </label>
                                        <input type="file" id="imageUpload5" name="image5" accept="image/*" disabled
                                            class="image-upload">
                                    </div>
                                </td>
                                <td class="imguser">
                                    <div class="image-upload-container locked-upload">
                                        <div class="image-preview" id="imagePreview6"></div>
                                        <label for="imageUpload6" class="upload-label">
                                            <span class="locked-text">Locked</span>
                                            <span class="active-text">+ Add Photo</span>
                                        </label>
                                        <input type="file" id="imageUpload6" name="image6" accept="image/*" disabled
                                            class="image-upload">
                                    </div>
                                </td>

                            </tr>
                            <tr class="infomation">
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">ID:</h3>
                                        <h3 class="info-value">0992478</h3>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Name:</h3>
                                        <input type="text" name="name" value="Nguyen Minh Thuan" required disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Gender:</h3>
                                        <select name="gender" disabled>
                                            <option value="women">Women</option>
                                            <option value="men" selected>Men</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr class="infomation">
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Age:</h3>
                                        <span id="age-display">......</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Location:</h3>
                                        <select name="Location" disabled>
                                            <option value="HCM">HCM</option>
                                            <option value="HN" selected>HN</option>
                                            <option value="QB">QB</option>
                                            <option value="TB">TB</option>
                                            <option value="AG">AG</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">B/D:</h3>
                                        <input type="date" id="dob" name="dob" value="1996-05-15" required disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr class="infomation">
                                <td colspan="2">
                                    <div class="info-item">
                                        <h3 class="info-label">Hobby:</h3>
                                        <input type="text" name="hobby" value="Swimming, Reading, Photography" disabled>
                                    </div>
                                </td>
                                <td rowspan="2">
                                    <div class="info-item" style="flex-direction: column;">
                                        <h3 class="info-label">Looking for:</h3>
                                        <select class="infor__looking-friend" name="looking-forfor" id="" disabled>
                                            <option value="1">UnKnown</option>
                                            <option value="2">AnyThing</option>
                                            <option value="3">My Lover</option>
                                            <option value="4">My Friend</option>
                                            <option value="5">Friend Confide</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr class="infomation">
                                <td colspan="2">
                                    <div class="info-item">
                                        <h3 class="info-label">Personally:</h3>
                                        <input type="text" name="Personally" value="Swimming, Reading, Photography"
                                            disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr class="infomation">
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Job:</h3>
                                        <select name="job" disabled>
                                            <option value="student">Student</option>
                                            <option value="business" selected>Business</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="worker">Worker</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Email:</h3>
                                        <input type="email" name="email" value="thuannguyen@example.com" required
                                            disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Phone:</h3>
                                        <input type="tel" name="phone" value="0987654321" pattern="^0[0-9]{9}$" required
                                            disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="profile-actions">
                                        <button type="submit" class="action-button save-button" disabled>Save</button>
                                        <button type="reset" class="action-button cancel-button"
                                            disabled>Cancel</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatarPreview = document.getElementById('avatarPreview');
        const avatarUpload = document.getElementById('avatarUpload');
        const uploadBtn = document.getElementById('uploadBtn');
        const avatarForm = document.getElementById('avatarForm');
        const message = document.getElementById('message');

        // Khi nhấp vào avatar hoặc nút upload
        avatarPreview.addEventListener('click', function() {
            avatarUpload.click();
        });

        uploadBtn.addEventListener('click', function() {
            avatarUpload.click();
        });

        // Khi một file được chọn
        avatarUpload.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                // Kiểm tra nếu file là ảnh
                if (file.type.match('image.*')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Hiển thị preview trước khi upload
                        avatarPreview.style.backgroundImage = `url(${e.target.result})`;

                        // Tự động upload file đến server
                        uploadAvatarToServer(file);
                    };

                    reader.readAsDataURL(file);
                } else {
                    showMessage('Vui lòng chọn một file ảnh!', 'error');
                }
            }
        });
    });
    </script>


    <script>
    function calculateAge(dateString) {
        // Chuyển đổi từ định dạng yyyy-mm-dd sang Date object
        const birthDate = new Date(dateString);
        const today = new Date();

        let age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();

        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        return age;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const dobInput = document.getElementById('dob');
        const ageDisplay = document.getElementById('age-display');

        if (dobInput && ageDisplay) {
            const dobValue = dobInput.value;
            if (dobValue) {
                const age = calculateAge(dobValue);
                ageDisplay.textContent = age + ' tuổi';
                ageDisplay.style.fontSize = '2rem';
                ageDisplay.style.fontFamily = 'Heebo';
            }
        }
    });
    </script>




    <script>
    // Toggle edit mode for the profile
    document.querySelector('.edit-profile').addEventListener('click', function(e) {
        e.preventDefault();
        const formElements = document.querySelectorAll('input, select, button.action-button');
        formElements.forEach(input => {
            input.disabled = false;
        });

        // Only enable the first image upload initially
        document.querySelectorAll('.image-upload-container').forEach((container, index) => {
            if (index === 0) {
                container.classList.add('active-upload');
                container.classList.remove('locked-upload');
            } else {
                container.classList.add('locked-upload');
                container.classList.remove('active-upload');
            }
        });

        // Show notification
        alert('You can now edit your profile. Upload images in sequence. Don\'t forget to save changes.');
    });

    // Sequential image upload functionality
    const imageUploads = document.querySelectorAll('.image-upload');

    // Function to unlock the next image upload
    function unlockNextImageUpload(currentIndex) {
        if (currentIndex < 5) { // Only 3 images total (index 0, 1, 2)
            const nextContainer = document.querySelectorAll('.image-upload-container')[currentIndex + 1];
            nextContainer.classList.remove('locked-upload');
            nextContainer.classList.add('active-upload');
        }
    }

    // Handle image uploads
    imageUploads.forEach((input, index) => {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                const container = this.closest('.image-upload-container');

                reader.onload = function(e) {
                    const previewId = `imagePreview${index + 1}`;
                    document.getElementById(previewId).style.backgroundImage =
                        `url(${e.target.result})`;

                    // Mark as having an image
                    container.classList.add('has-image');

                    // Unlock next image upload
                    unlockNextImageUpload(index);
                }
                reader.readAsDataURL(file);
            }
        });
    });

    // Handle label clicks for image upload
    document.querySelectorAll('.upload-label').forEach((label, index) => {
        label.addEventListener('click', function(e) {
            const container = this.closest('.image-upload-container');

            // Only proceed if this is an active upload container
            if (!container.classList.contains('active-upload')) {
                e.preventDefault();

                if (container.classList.contains('locked-upload')) {
                    alert('Please upload the previous image first.');
                }
                return;
            }

            const inputId = `imageUpload${index + 1}`;
            const input = document.getElementById(inputId);

            if (!input.disabled) {
                input.click();
            } else {
                e.preventDefault();
                alert('Please click "Edit Profile" to enable image uploads.');
            }
        });
    });

    // Handle form submission
    document.getElementById('profile').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Profile saved successfully!');

        // Disable form elements after save
        const formElements = document.querySelectorAll('input, select, button.action-button');
        formElements.forEach(input => {
            input.disabled = true;
        });
    });

    // Handle cancel button
    document.querySelector('.cancel-button').addEventListener('click', function() {
        const formElements = document.querySelectorAll('input, select, button.action-button');
        formElements.forEach(input => {
            input.disabled = true;
        });
    });
    </script>
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
    // Script choose chat-friend
    const friend = document.querySelector('.chat-friend__friend');
    const chat_side__content_friend = document.querySelector('.chat-side__content-friend');

    friend.addEventListener('click', () => {
        friend.classList.toggle('chat-friend--active');
        chat_side__content_friend.classList.toggle('chat-side__content-friend--show');
    });

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