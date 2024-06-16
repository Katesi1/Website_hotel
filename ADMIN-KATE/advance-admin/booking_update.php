<?php 
    include("controls.php");

    $tbl_booking = new tbl_booking();
    $tbl_booking->update_status($_GET["id"], $_GET["stt"]);
    if ($_GET["stt"] === 'Đã thanh toán') {
        $booking = $tbl_booking->select_booking($_GET["id"]);
        $tbl_room = new tbl_room();  
        $sum = 0;                                    
        foreach($booking as $booking) { 
            $room = $tbl_room->select_room($booking["room_id"]);
            // Lấy thông tin phòng
            $room_info = $room->fetch_assoc(); // Sử dụng fetch_assoc() để lấy thông tin phòng dưới dạng mảng kết hợp
            $room_price = $room_info["price"]; // Lấy giá của phòng từ mảng kết hợp

            // Tính tổng giá của đặt phòng
            $total_price = $room_price * $booking["nodays"];
            $sum += $total_price;   
        }
        // Prepare data for tbl_payment
        $name = $booking['Name'];
        $email = $booking['email'];
        $Date_payment = $booking['Check_out'];
        $room = $booking['name_room'];
        $price = $sum;

        // Insert into tbl_payment
        $tbl_payment = new tbl_payment();
        $tbl_payment->insert($name, $email, $Date_payment, $room, $price);
    }
    echo "<script> window.location = 'booking_select.php' </script>";

?>