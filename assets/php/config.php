 <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dating_app";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
        echo "Database connection error" . mysqli_connect_error();
    }
 ?>