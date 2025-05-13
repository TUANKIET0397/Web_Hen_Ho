<?php
// Kết nối cơ sở dữ liệu
$link = @mysqli_connect("localhost", "root", "", "dating_app") or die("Không thể kết nối cơ sở dữ liệu");

// Lấy thông tin người dùng (giả sử UserID = 1)
$userID = 1;
$sql = "SELECT * FROM userinformation WHERE ID = $userID";
$result = mysqli_query($link, $sql);
$user = mysqli_fetch_assoc($result);

// Lấy danh sách ảnh
$sqlImages = "SELECT imgPath FROM images WHERE UserID = $userID AND IsActive = 1 ORDER BY ID ASC";
$resultImages = mysqli_query($link, $sqlImages);
$images = [];
while ($row = mysqli_fetch_assoc($resultImages)) {
    $images[] = $row['imgPath'];
}

// Đảm bảo mảng $images có đủ 6 phần tử
while (count($images) < 6) {
    $images[] = './assets/img/default-image.jpg'; // Thêm ảnh mặc định
}

// Lấy danh sách sở thích
$sqlHobbies = "SELECT HobbyName FROM hobbylist INNER JOIN userhobbby ON hobbylist.ID = userhobbby.HobbyID WHERE userhobbby.UserID = $userID";
$resultHobbies = mysqli_query($link, $sqlHobbies);
$hobbies = [];
while ($row = mysqli_fetch_assoc($resultHobbies)) {
    $hobbies[] = $row['HobbyName'];
}

// Lấy danh sách tính cách
$sqlPersonally = "SELECT PersonallyName FROM personallylist INNER JOIN userpersonally ON personallylist.ID = userpersonally.PersonallyID WHERE userpersonally.UserID = $userID";
$resultPersonally = mysqli_query($link, $sqlPersonally);
$personally = [];
while ($row = mysqli_fetch_assoc($resultPersonally)) {
    $personally[] = $row['PersonallyName'];
}

// Lấy thông tin công việc
$sqlJob = "SELECT JobName FROM joblist INNER JOIN userjob ON joblist.ID = userjob.JobID WHERE userjob.UserID = $userID";
$resultJob = mysqli_query($link, $sqlJob);
$job = mysqli_fetch_assoc($resultJob)['JobName'];

// Lấy thông tin "Looking For"
$sqlLooking = "SELECT LookingName FROM looking INNER JOIN userlooking ON looking.ID = userlooking.LookingID WHERE userlooking.UserID = $userID";
$resultLooking = mysqli_query($link, $sqlLooking);
if ($resultLooking && mysqli_num_rows($resultLooking) > 0) {
    $lookingFor = mysqli_fetch_assoc($resultLooking)['LookingName'];
} else {
    $lookingFor = ""; // Hoặc một giá trị mặc định khác
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flirt Zone - Profile</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- profile user page -->
    <link rel="stylesheet" href="./assets/css/Profileuser.css">
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="./index.php">About</a>
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
                            <!-- <div class="listfriend__seen">seen. 2 hours</div> -->
                        </div>
                    </button>
                    <button class="chat-side__content-friends">
                        <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);"></div>
                        <div class="listfriend">
                            <div class="listfriend__name">John Smith</div>
                            <!-- <div class="listfriend__seen">seen. 5 hours</div> -->
                        </div>
                    </button>
                    <button class="chat-side__content-friends">
                        <div class="chatavt button avatar" style="background-image: url(./assets/img/avt.jpg);"></div>
                        <div class="listfriend">
                            <div class="listfriend__name">Jane Doe</div>
                            <!-- <div class="listfriend__seen">seen. 1 day</div> -->
                        </div>
                    </button>
                </div>
            </div>

            <div class="main-content">
                <div class="fixe-box_profile">
                    <div class="edit-profile">Edit Profile</div>
                    <div class="profile-header">
                        <div class="user-avt-profile" id="avatarPreview" style="background-image: url('<?php echo !empty($user['Avt']) ? $user['Avt'] : './assets/img/default-avatar.jpg'; ?>');"></div>
                        <form id="avatarForm" action="upload_avatar.php" method="post" enctype="multipart/form-data">
                            <input type="file" id="avatarUpload" name="avatar" class="avatar-upload" accept="image/*">
                            <button type="submit" class="btn-upload" id="uploadBtn">Change Avatar</button>
                            <div id="message" class="message" style="display: none;"></div>
                        </form>
                        <h2 class="profile-name"><?php echo $user['UserName']; ?></h2>
                        <h3 class="profile-location"><?php echo $user['Age']; ?> years old, <?php echo $user['UserAddress']; ?></h3>
                    </div>

                    <form name="profile" id="profile" action="save_profile.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <table class="profile-table" style="width: 100%; border-collapse: separate; border-spacing: 20px;">
                            <!-- Thư viện ảnh chia thành 2 hàng -->
                            <?php for ($row = 0; $row < 2; $row++): ?>
                                <tr class="libaryimg">
                                    <?php for ($col = 0; $col < 3; $col++): ?>
                                        <?php $index = $row * 3 + $col; ?>
                                        <td class="imguser">
                                            <div class="image-upload-container <?php echo $index === 0 ? 'active-upload' : 'locked-upload'; ?>">
                                                <div class="image-preview" id="imagePreview<?php echo $index + 1; ?>"
                                                    style="background-image: url('<?php echo isset($images[$index]) ? $images[$index] : './assets/img/default-image.jpg'; ?>');">
                                                </div>
                                                <label for="imageUpload<?php echo $index + 1; ?>" class="upload-label">
                                                    <span>
                                                        <?php echo $index === 0 ? '+ Add Photo' : 'Locked'; ?>
                                                    </span>
                                                </label>
                                                <input type="file" id="imageUpload<?php echo $index + 1; ?>" name="image<?php echo $index + 1; ?>" accept="image/*" class="image-upload" disabled>
                                            </div>
                                        </td>
                                    <?php endfor; ?>
                                </tr>
                            <?php endfor; ?>
                            <tr class="infomation">
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">ID:</h3>
                                        <h3 class="info-value"><?php echo $user['ID']; ?></h3>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Name:</h3>
                                        <input type="text" name="name" value="<?php echo $user['UserName']; ?>" required disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Gender:</h3>
                                        <select name="gender" disabled>
                                            <option value="Men" <?php echo ($user['Gender'] == 'Men') ? 'selected' : ''; ?>>Men</option>
                                            <option value="Women" <?php echo ($user['Gender'] == 'Women') ? 'selected' : ''; ?>>Women</option>
                                            <option value="Other" <?php echo ($user['Gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr class="infomation">
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Age:</h3>
                                        <span id="age-display"><?php echo $user['Age']; ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Location:</h3>
                                        <input type="text" name="location" value="<?php echo $user['UserAddress']; ?>" required disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">B/D:</h3>
                                        <input type="date" id="dob" name="dob" value="<?php echo $user['BirthDate']; ?>" required disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr class="infomation">
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Hobby:</h3>
                                        <div class="hobby-container">
                                            <span id="hobby-display" class="hobby-display" onclick="toggleHobbyOptions()">
                                                <?php echo !empty($hobbies) ? implode(', ', $hobbies) : 'Chọn sở thích'; ?>
                                            </span>
                                            <div id="hobby-options" class="hobby-options">
                                                <?php
                                                $allHobbies = mysqli_query($link, "SELECT HobbyName FROM hobbylist");
                                                while ($row = mysqli_fetch_assoc($allHobbies)) {
                                                    $checked = in_array($row['HobbyName'], $hobbies) ? 'checked' : '';
                                                    echo "<label><input type='checkbox' name='hobby[]' value='{$row['HobbyName']}' $checked disabled> {$row['HobbyName']}</label><br>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Personally:</h3>
                                        <div class="personally-container">
                                            <span id="personally-display" class="personally-display" onclick="togglePersonallyOptions()">
                                                <?php echo !empty($personally) ? implode(', ', $personally) : 'Chọn tính cách'; ?>
                                            </span>
                                            <div id="personally-options" class="personally-options">
                                                <?php
                                                $allPersonally = mysqli_query($link, "SELECT PersonallyName FROM personallylist");
                                                while ($row = mysqli_fetch_assoc($allPersonally)) {
                                                    $checked = in_array($row['PersonallyName'], $personally) ? 'checked' : '';
                                                    echo "<label><input type='checkbox' name='personally[]' value='{$row['PersonallyName']}' $checked disabled> {$row['PersonallyName']}</label><br>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Looking for:</h3>
                                        <select name="looking-for" disabled>
                                            <?php
                                            $allLooking = mysqli_query($link, "SELECT LookingName FROM looking");
                                            while ($row = mysqli_fetch_assoc($allLooking)) {
                                                $selected = ($row['LookingName'] == $lookingFor) ? 'selected' : '';
                                                echo "<option value='{$row['LookingName']}' $selected>{$row['LookingName']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr class="infomation">
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Job:</h3>
                                        <select name="job" disabled>
                                            <?php
                                            $allJobs = mysqli_query($link, "SELECT JobName FROM joblist");
                                            while ($row = mysqli_fetch_assoc($allJobs)) {
                                                $selected = ($row['JobName'] == $job) ? 'selected' : '';
                                                echo "<option value='{$row['JobName']}' $selected>{$row['JobName']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Email:</h3>
                                        <input type="email" name="email" value="<?php echo $user['Email']; ?>" required disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="info-item">
                                        <h3 class="info-label">Phone:</h3>
                                        <input type="tel" name="phone" value="<?php echo $user['PhoneNumber']; ?>" pattern="^0[0-9]{9}$" required disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr class="infomation">
                                <td colspan="3">
                                    <div class="info-item">
                                        <h3 class="info-label">Story:</h3>
                                        <textarea name="story" id="story" placeholder="Write something about yourself..." disabled><?php echo $user['bio']; ?></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="profile-actions">
                                        <button type="submit" class="action-button save-button" disabled>Save</button>
                                        <button type="reset" class="action-button cancel-button" disabled>Cancel</button>
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
        document.addEventListener('DOMContentLoaded', () => {
            let isEditMode = false;

            // DOM Elements
            const avatarPreview = document.getElementById('avatarPreview');
            const avatarUpload = document.getElementById('avatarUpload');
            const uploadBtn = document.getElementById('uploadBtn');
            const menu = document.getElementById('userMenu');
            const hobbyDisplay = document.getElementById('hobby-display');
            const hobbyOptions = document.getElementById('hobby-options');
            const hobbyCheckboxes = document.querySelectorAll('#hobby-options input[type="checkbox"]');
            const personallyDisplay = document.getElementById('personally-display');
            const personallyOptions = document.getElementById('personally-options');
            const personallyCheckboxes = document.querySelectorAll('#personally-options input[type="checkbox"]');
            const formElements = document.querySelectorAll('input, select, textarea, button.action-button');
            const imageUploads = document.querySelectorAll('.image-upload');
            const editProfileBtn = document.querySelector('.edit-profile');
            const cancelButton = document.querySelector('.cancel-button');
            const saveButton = document.querySelector('.save-button');
            const friendButton = document.querySelector('.chat-friend__friend');
            const chatSideContentFriend = document.querySelector('.chat-side__content-friend');
            const chatFriends = document.querySelectorAll('.chat-side__content-friends');
            const avatar = document.querySelector('.avatar');
            const imageContainers = document.querySelectorAll('.image-upload-container');


            // Helper Functions
            const toggleOptions = (options) => {
                if (isEditMode) options.classList.toggle('show');
            };

            const updateDisplay = (checkboxes, displayElement, defaultText) => {
                const selectedValues = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                displayElement.textContent = selectedValues.length > 0 ? selectedValues.join(', ') : defaultText;
            };

            const enableEditMode = () => {
                isEditMode = true;
                formElements.forEach(input => input.disabled = false);
                editProfileBtn.style.display = 'none';
                saveButton.disabled = false;
                cancelButton.disabled = false;
            };

            const disableEditMode = () => {
                isEditMode = false;
                formElements.forEach(input => input.disabled = true);
                updateDisplay(hobbyCheckboxes, hobbyDisplay, 'Chọn sở thích');
                updateDisplay(personallyCheckboxes, personallyDisplay, 'Chọn tính cách');
                editProfileBtn.style.display = 'block';
                saveButton.disabled = true;
                cancelButton.disabled = true;
            };

            const unlockNextImageUpload = (currentIndex) => {
                if (currentIndex < imageUploads.length - 1) {
                    const nextContainer = document.querySelectorAll('.image-upload-container')[currentIndex + 1];
                    nextContainer.classList.remove('locked-upload');
                    nextContainer.classList.add('active-upload');
                    const nextInput = document.getElementById(`imageUpload${currentIndex + 2}`);
                    nextInput.disabled = false;
                }
            };

            const showMessage = (message, type = 'success') => {
                const messageBox = document.getElementById('message');
                messageBox.textContent = message;
                messageBox.className = `message ${type}`;
                messageBox.style.display = 'block';
                setTimeout(() => {
                    messageBox.style.display = 'none';
                }, 3000);
            };

            const uploadAvatarToServer = (file) => {
                // Fake server upload logic
                setTimeout(() => {
                    showMessage('Avatar uploaded successfully!', 'success');
                }, 1000);
            };

            // Event Listeners
            avatarPreview.addEventListener('click', () => {
                if (!isEditMode) {
                    alert('Please click "Edit Profile" to change your avatar.');
                    return;
                }
                avatarUpload.click();
            });

            uploadBtn.addEventListener('click', () => {
                if (!isEditMode) {
                    alert('Please click "Edit Profile" to change your avatar.');
                    return;
                }
                avatarUpload.click();
            });

            avatarUpload.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    if (file.type.match('image.*')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            avatarPreview.style.backgroundImage = `url(${e.target.result})`;
                            uploadAvatarToServer(file);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        showMessage('Please select a valid image file!', 'error');
                    }
                }
            });

            hobbyDisplay.addEventListener('click', () => toggleOptions(hobbyOptions));
            personallyDisplay.addEventListener('click', () => toggleOptions(personallyOptions));

            hobbyOptions.addEventListener('click', () => updateDisplay(hobbyCheckboxes, hobbyDisplay, 'Chọn sở thích'));
            personallyOptions.addEventListener('click', () => updateDisplay(personallyCheckboxes, personallyDisplay, 'Chọn tính cách'));

            editProfileBtn.addEventListener('click', enableEditMode);
            cancelButton.addEventListener('click', disableEditMode);

            // Hàm kiểm tra và mở khóa các ô dựa trên ảnh đã tồn tại
            const unlockImageUploads = () => {
                imageContainers.forEach((container, index) => {
                    const preview = container.querySelector('.image-preview');
                    const backgroundImage = preview.style.backgroundImage;

                    // Kiểm tra nếu ô hiện tại đã có ảnh (không phải ảnh mặc định)
                    if (backgroundImage && !backgroundImage.includes('default-image.jpg')) {
                        container.classList.add('has-image');
                        container.querySelector('.upload-label').style.display = 'block';
                        nextLabel = container.querySelector('.upload-label span');
                        if (nextLabel) {
                            nextLabel.textContent = '+ Add Photo'; // Cập nhật nội dung
                        }

                        // Mở khóa ô tiếp theo
                        if (index < imageContainers.length - 1) {
                            const nextContainer = imageContainers[index + 1];
                            nextContainer.classList.remove('locked-upload');
                            nextContainer.classList.add('active-upload');
                            // Hiển thị nút "Add Photo" cho ô tiếp theo
                            const nextLabel = nextContainer.querySelector('.upload-label span');
                            if (nextLabel) {
                                nextLabel.textContent = '+ Add Photo'; // Cập nhật nội dung
                            }
                            const nextInput = nextContainer.querySelector('.image-upload');
                            nextInput.disabled = false;
                        }
                    }
                });
            };
            unlockImageUploads();

            imageUploads.forEach((input, index) => {
                input.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        if (file.type.match('image.*')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const preview = document.getElementById(`imagePreview${index + 1}`);
                                preview.style.backgroundImage = `url(${e.target.result})`;

                                // Đánh dấu ô hiện tại đã có ảnh
                                const container = preview.closest('.image-upload-container');
                                container.classList.add('has-image');
                                container.querySelector('.upload-label').style.display = 'none';

                                // Mở khóa ô tiếp theo
                                if (index < imageUploads.length - 1) {
                                    const nextContainer = document.querySelectorAll('.image-upload-container')[index + 1];
                                    nextContainer.classList.remove('locked-upload');
                                    nextContainer.classList.add('active-upload');

                                    // Hiển thị nút "Add Photo" cho ô tiếp theo
                                    const nextLabel = nextContainer.querySelector('.upload-label span');
                                    if (nextLabel) {
                                        nextLabel.textContent = '+ Add Photo'; // Cập nhật nội dung
                                    }

                                    const nextInput = document.getElementById(`imageUpload${index + 2}`);
                                    nextInput.disabled = false;
                                }
                            };
                            reader.readAsDataURL(file);
                        } else {
                            alert('Please select a valid image file!');
                        }
                    }
                });
            });

            document.querySelectorAll('.upload-label').forEach((label, index) => {
                label.addEventListener('click', function(e) {
                    const container = this.closest('.image-upload-container');
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

            saveButton.addEventListener('click', (e) => {
                e.preventDefault();
                const form = document.getElementById('profile');
                const formData = new FormData(form);
                fetch('save_profile.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        showMessage('Profile saved successfully!', 'success');
                        disableEditMode();
                    })
                    .catch(error => {
                        showMessage('Error saving profile!', 'error');
                    });
            });

            cancelButton.addEventListener('click', () => {
                disableEditMode();
            });

            // Chat functionality
            friendButton.addEventListener('click', () => {
                friendButton.classList.toggle('chat-friend--active');
                chatSideContentFriend.classList.toggle('chat-side__content-friend--show');
            });

            chatFriends.forEach(friend => {
                friend.addEventListener('click', () => {
                    chatFriends.forEach(f => f.classList.remove('chat-side__content-friends--active'));
                    friend.classList.add('chat-side__content-friends--active');
                });
            });

            // Avatar menu functionality
            avatar.addEventListener('click', (e) => {
                e.stopPropagation();
                menu.style.display = (menu.style.display === 'flex') ? 'none' : 'flex';
            });

            document.addEventListener('click', (e) => {
                if (!menu.contains(e.target) && !avatar.contains(e.target)) {
                    menu.style.display = 'none';
                }
            });

            // Hide dropdowns and inputs when clicking outside
            document.addEventListener('click', (e) => {
                if (!hobbyOptions.contains(e.target) && !hobbyDisplay.contains(e.target)) {
                    hobbyOptions.classList.remove('show');
                }
                if (!personallyOptions.contains(e.target) && !personallyDisplay.contains(e.target)) {
                    personallyOptions.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>