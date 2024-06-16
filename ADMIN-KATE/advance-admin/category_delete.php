<?php 
    include("controls.php");

    $tbl_category = new tbl_category();
    $tbl_room = new tbl_room();

    if($tbl_category->delete($_GET["id"]) && $tbl_room->delete_by_category($_GET["name_category"])) {
        echo "<script> alert('Xóa thành công!!') </script>";
        header("location:category_select.php");
    } else {
        echo "<script> alert('Lỗi!!') </script>";
    }