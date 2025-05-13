<?php
include_once "config.php";

if (isset($_POST['todolist_id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['todolist_id']);
    $sql = "delete FROM todolist WHERE ID = '{$id}'";
    if (mysqli_query($conn, $sql)) {
        echo "Delete Successfully";
    } else {
        echo "Error during deleting: " . mysqli_error($conn);
    }
} else {
    echo "Cannot get ID";
}
?>
