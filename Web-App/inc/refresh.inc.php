<?php
if(isset($_POST['refresh-submit'])){
    require '../header.php';
    require 'database.inc.php';

    $id = $_SESSION['id'];
    $sql = "UPDATE command set refresh='DataUpdate' WHERE idUsers='$id'";
    mysqli_query($conn, $sql);
    sleep(2);
    $sql = "UPDATE command set refresh='NoDataUpdate' WHERE idUsers='$id'";
    mysqli_query($conn, $sql);
    header("Location: ../dashboard.php");
}
else {
    header("Location: ../dashboard.php");
    exit();
}
?>