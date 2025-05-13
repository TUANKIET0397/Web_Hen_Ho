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
    <title>User-Profile-2-Admin-Page</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- Admin Page user profile css -->
    <link rel="stylesheet" href="./assets/css/style_user-profile-2-admin-page.css">
</head>

<body>
    <div class="container">
        <!-- wrap nav -->
        <aside class="aside">
            <!-- Logo -->
            <div class="logo">
                <img src="./assets/img/logo.svg" alt="Flirt Zone">
                <div class="logo-desc">
                    <img src="./assets/img/logo-desc1.svg" alt="Flirt Zone">
                    <img src="./assets/img/logo-desc2.svg" alt="Flirt Zone">
                </div>
            </div>

            <!-- Mangage -->
            <h2 class="title">Manage</h2>

            <!-- nav -->
            <nav class="nav">
                <div class="nav-item">
                    <div class="icon">
                        <img src="./assets/img/dash board.svg" alt="Dash board">
                    </div>
                    <p><a class="task" style="text-decoration: none;" href="adminpage.php">Dash board</a></p>
                </div>

                <div class="nav-item">
                    <div class="icon">
                        <img src="./assets/icons/taskAdmin2.svg" alt="User profile">
                    </div>
                    <p><a class="task" style="text-decoration: none;" href="adminprofileuser.php">User
                            profile</a></p>
                </div>

                <div class="nav-item">
                    <div class="icon">
                        <img src="./assets/icons/taskAdmin3.svg" alt="Bin">
                    </div>
                    <p><a class="task" style="text-decoration: none;" href="adminbin.php">Bin</a></p>
                </div>
            </nav>
        </aside>

        <!-- wrap content -->
        <div class="wrap">
            <!-- Header -->
            <header class="header">
                <div class="title-intro">
                    <h1 class="title">Hey there!😘</h1>
                    <p class="desc">Here’s what happen your stored today</p>
                </div>
                <form class="bar-search">
                    <input type="text" size="31" placeholder="what are you looking for?" class="looking" id="word"
                        name="word">
                    <button>
                        <img src="./assets/icons/search.svg" alt="Search" class="icon-search">
                    </button>
                </form>
            </header>

            <div class="main-content">
                <div class="fixe-box_profile">
                    <div class="profile-header">
                        <div class="user-avt-profile" id="avatarPreview" style="background-image: url('<?php echo !empty($user['Avt']) ? $user['Avt'] : './assets/img/default-avatar.jpg'; ?>');"></div>
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
                                            <div class="image-preview" id="imagePreview<?php echo $index + 1; ?>"
                                                style="background-image: url('<?php echo isset($images[$index]) ? $images[$index] : './assets/img/default-image.jpg'; ?>');">
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
                                    <!-- <div class="profile-actions">
                                        <button type="submit" class="action-button save-button" disabled>Save</button>
                                        <button type="reset" class="action-button cancel-button" disabled>Cancel</button>
                                    </div> -->
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>


            <!-- <section class="content-section">
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-info">
                            <img class="profile-image" src="./assets/img/Profile.svg" alt="Profile" />
                            <div class="profile-details">
                                <p class="profile-name">Anasik Waterman</p>
                                <p class="profile-status">Online</p>
                            </div>
                        </div>
                        <div class="profile-status-icons">
                            <img src="./assets/img/Status Icons.svg" alt="Status Icons" class="status-icons" />
                        </div>
                    </div>

                    <div class="main-area"></div>
                    <div class="card-grid">
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                        <div class="card bg-[#444444]"></div>
                    </div>

                    <div class="info-fields">
                        <div class="info-field"><span class="info-label">ID</span>
                            <span class="info-value">097586</span>
                        </div>
                        <div class="info-field">
                            <div class="info-label">Name</div>
                            <div class="info-value">Jasa Mark</div>
                        </div>
                        <div class="info-field"><span class="info-label">Date</span><span
                                class="info-value">25/03/2003</span></div>
                        <div class="info-field"><span class="info-label">Email</span><span
                                class="info-value">jack2302@gmail.com</span></div>
                        <div class="info-field"><span class="info-label">Hooby💕</span><span class="info-value">don't
                                have</span></div>
                        <div class="info-field"><span class="info-label">Looking for</span><span
                                class="info-value">don't have</span></div>
                    </div>
                </div>
        </div>
        </section> -->
            </main>
</body>

</html>