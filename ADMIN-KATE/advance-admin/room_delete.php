<?php
    include("controls.php");
    $tbl_room = new tbl_room();
    if($tbl_room->delete_room($_GET["id"])){
        echo"<script> alert('Xóa Phòngthành công')</script>";
        header('location:room_select.php');
    }else{
        echo"<script> alert('Xóa Phòng kh thành công')</script>";
    }
?>