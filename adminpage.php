<?php 
    include_once "./assets/php/config.php";
    session_start();
    if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Reset -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <!-- fonts -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <!-- AdminPage css -->
    <link rel="stylesheet" href="./assets/css/adminpage.css">
</head>

<body>
    <?php 
        // Online
        $ad_onl = "select isActive from userinformation";
        $kq_ad_onl = mysqli_query($conn,$ad_onl);
        $total_onl = 0;
        while($tt = mysqli_fetch_array($kq_ad_onl))
        {
            if($tt["isActive"] == 1)
            {
                $total_onl +=1;
            }
        }
        //  Name and follow
        $ad_us="select ID,UserName,isActive,Avt from userinformation";
        $ad_fl="select * from followers";
        $kq_ad_us = mysqli_query($conn,$ad_us);
        $kq_ad_fl = mysqli_query($conn,$ad_fl);

        $listfollowers = [];
        while($sub_fl = mysqli_fetch_array($kq_ad_fl)) {
            $listfollowers[] = $sub_fl;
        }

        // Report
        $us_rpt = 
        "
            select distinct userinformation.UserName, userinformation.ID
            from userreport
            inner join userinformation ON userreport.ReportedID = userinformation.id
        ";
        $ad_rp = 
        "
            select userreport.ReportedID,
            case 
                when count(*) >= 2 then max(userreport.ReportDate)  
                else min(userreport.ReportDate)
            end as LatestReportDate
            from userreport
            group by userreport.ReportedID
        ";
        $kq_us_rpt = mysqli_query($conn,$us_rpt);
        $kq_ad_rp = mysqli_query($conn,$ad_rp);

        $listreports = [];
        while($sub_rp = mysqli_fetch_array($kq_ad_rp)) {
            $listreports[] = $sub_rp;
        }
        // Total Report
        $tt_rp = "select * from userreport order by ID desc limit 1";
        $kq_tt_rp = mysqli_query($conn,$tt_rp);
        $total_rp = mysqli_fetch_array($kq_tt_rp);

        $tt_rp = "select * from userreport";
        $kq_tt_rp = mysqli_query($conn,$tt_rp);
        $total_rp = 0;
        
        $rp_count_tt=[];
        while($sub_ttrp = mysqli_fetch_array($kq_tt_rp))
        {
            $rp_count_tt[] = $sub_ttrp;
        }
        foreach($rp_count_tt as $rp) {
            $total_rp +=1;
        }   

        // To do list
        $dolist = "select * from todolist";
        $kq_dolist = mysqli_query($conn,$dolist);
    ?>

    
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
                        <img src="./assets/icons/taskAdmin1.svg" alt="Dash board">
                    </div>
                    <p><a class="task" style="text-decoration: none;" href="adminpage.php">Dash board</a></p>
                </div>

                <div class="nav-item">
                    <div class="icon">
                        <img src="./assets/icons/taskAdmin2.svg" alt="User profile">
                    </div>
                    <p><a class="task" style="text-decoration: none;" href="adminprofileuser.php">User profile</a></p>
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

            <!-- main -->
            <main class="main">
                <!-- content left -->
                <div class="main-left">
                    <!-- index online and report -->
                    <div class="access">
                        <div class="items">
                            <img src="./assets/img/decr.svg" alt="Online People" class="item-img">
                            <div class="item-wrap">
                                <p class="desc">Online People</p>
                                <p class="total"><?php echo $total_onl ?></p>
                            </div>
                        </div>


                        <div class="items">
                            <img src="./assets/img/incr.svg" alt="Total report" class="item-img">
                            <div class="item-wrap">
                                <p class="desc">Total report</p>
                                <p class="total"> <?php echo $total_rp ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Report -->
                    <div class="wrap-report">

                        <a href="adminreport.php" class="title">Report</a>
                        <!-- detail report -->
                        <div class="frame-report">
                            <?php 
                            while($q = mysqli_fetch_array($kq_us_rpt)) {?>
                                <div class="detail">
                                    <img src="./assets/img/avt.jpg" alt="" class="avt-user">
                                    <div class="info">
                                        <h3 class="name"> <?php echo $q["UserName"]?> </h3>
                                        <p class="user-desc">
                                            <?php
                                                    $fl_count = 0;                                               
                                                    foreach($listfollowers as $fl) {
                                                    if ($fl["FollowerID"] == $q["ID"]) {
                                                        $fl_count += 1;
                                                    } 
                                                }
                                                echo $fl_count . " followers"
                                            ?>
                                        </p>
                                    </div>
                                    <span class="day-re">
                                        <?php 
                                            foreach($listreports as $rp) {
                                                if ($rp["ReportedID"] == $q["ID"]) {
                                                    echo $rp["LatestReportDate"];
                                                } 
                                            }
                                        ?>
                                    </span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
                

                <!-- content right -->
                <div class="main-right">
                    <div class="to-do-list">
                        <div class="wrap-list">
                            <h4 class="list">To do List</h4>
                            <?php 
                            while($td = mysqli_fetch_array($kq_dolist)) {?>
                            <form class="add-value" method="POST">
                                <input type="hidden" name="todolist_id" value="<?php echo $td["ID"]; ?>">
                                <input type="checkbox" class="check">
                                <input type="text" name="todolist" value="<?php echo $td["Remind"]; ?>" class="write" disabled> 
                            </form>
                            <?php }?>
                            <div class="add-value2">
                                <button class="write" id="add-task">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="profile">
                        <div class="wrap-pro">
                            <a href="adminprofileuser.php" class="user-pro">User Profile</a>
                            <?php 
                                while($a = mysqli_fetch_array($kq_ad_us))
                                { ?>
                                    <div class="detail">
                                        <img src="./assets/img/avt-new.jpg" alt="" class="avt-user">
                                        <div class="info">
                                            <h3 class="name"><?php echo $a["UserName"] ?></h3>
                                            <p class="user-desc">
                                                <?php
                                                    $fl_count = 0;                                               
                                                    foreach($listfollowers as $b) {
                                                    if ($b["FollowerID"] == $a["ID"] ) {
                                                        $fl_count += 1;
                                                    } 
                                                }
                                                echo $fl_count . " followers"
                                                ?>
                                            </p>
                                        </div>
                                            <?php 
                                                if ($a["isActive"] == 1) { ?>
                                                    <div class="tick-green"></div>
                                                <?php } else { ?>
                                                    <div class="tick-gray"></div>
                                             <?php } ?>
                                    </div>
                               <?php }?>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>

    
    <script>
    // Xóa To Do List 
    document.querySelectorAll('.check').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                const form = checkbox.closest('form');
                const todolistId = form.querySelector('input[name="todolist_id"]').value;

                // Gửi Ajax để xóa
                fetch('./assets/php/delete_todo.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'todolist_id=' + encodeURIComponent(todolistId)
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data); // in thông báo server trả về (tuỳ chọn)
                    // Xóa form khỏi DOM
                    form.remove();
                })
                .catch(error => console.error('Lỗi:', error));
            }
        });
    });
    // Thêm form để nhập TD List
    document.getElementById("add-task").addEventListener("click", function () {
    // Tạo phần tử form mới
    const form = document.createElement("form");
    form.className = "add-value";
    form.method = "POST";
    form.action = "./assets/php/add_todo.php";

    // Tạo checkbox
    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.className = "check";

    // Tạo ô nhập văn bản
    const input = document.createElement("input");
    input.type = "text";
    input.name = "todolist";
    input.placeholder = "Add...";
    input.className = "write";

    // Thêm các phần tử vào form
    form.appendChild(checkbox);
    form.appendChild(input);

    // Thêm form vào danh sách trước nút "+"
    const addButtonDiv = document.querySelector(".add-value2");
    addButtonDiv.parentElement.insertBefore(form, addButtonDiv);
    input.focus();
});
</script>

</body>

</html>