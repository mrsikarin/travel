<?php
include 'config.php';
if (empty($_GET['id'])) {
    header("Location:index.php");
} else {
    $id = $_GET['id'];
    $sql = "DELETE FROM `listtravel` WHERE `t_id` = '$id'";
    $myquery = mysqli_query($conn, $sql);
    if($myquery)
    {
        header("Location:index.php");
    }else{
        echo "เกิดข้อผิดพลาดในการลบ";
    }
}