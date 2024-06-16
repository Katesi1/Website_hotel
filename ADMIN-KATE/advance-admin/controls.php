<?php 
    include("connect.php");
    // ====================================CONTACT=========================================
    class tbl_contact{
        public function insert_contact($Full_name, $Email, $Phone, $Message) {
            global $conn;
            $sql = "INSERT INTO contact(Full_name, Email, Phone, Message) 
                    VALUES('$Full_name','$Email','$Phone','$Message')";

            return mysqli_query($conn, $sql);
        }
        public function insert_letter($Email) {
            global $conn;
            $sql = "INSERT INTO newsletter(Email) 
                    VALUES('$Email')";

            return mysqli_query($conn, $sql);
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM contact";
            return mysqli_query($conn, $sql);
        }
        public function delete($contact_id) {
            global $conn;

            $sql = "DELETE FROM contact WHERE contact_id=$contact_id";
            return mysqli_query($conn, $sql);
        }
    }
    // ==================================CATEGORY======================================
    class tbl_category{
        public function insert_cate($name, $mota) {
            global $conn;

            $sql = "INSERT INTO category(name_category, mota) 
                    VALUES('$name','$mota')";
            return mysqli_query($conn, $sql);
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM category";
            return mysqli_query($conn, $sql);
        }
        public function select_category($id) {
            global $conn;

            $sql = "SELECT * FROM category WHERE ID_category = '$id'";

            return mysqli_query($conn, $sql);
        }
        
        public function delete($id) {
            global $conn;

            $sql = "DELETE FROM category WHERE ID_category = '$id'";

            return mysqli_query($conn, $sql);
        }

        public function update($id, $name_cate, $mota) {
            global $conn;

            $sql = "UPDATE category  
                    SET name_category = '$name_cate', 
                        mota = '$mota' 
                    WHERE ID_category = '$id'";

            return mysqli_query($conn, $sql);
        }
    }

    // ===============================PRODUCT========================================
    class tbl_room {
        public function insert_room($name, $type, $price, $category,$image) {
            global $conn;

            $sql = "INSERT INTO room(name_room, type_room, price, category,Hinh_Anh) 
                    VALUES('$name','$type','$price','$category','$image')";
            return mysqli_query($conn, $sql);
        }    
        public function delete_by_category($name_cate) {
            global $conn;

            $sql = "DELETE FROM room WHERE category = '$name_cate'";

            return mysqli_query($conn, $sql);
        }
        public function select_all(){
            global $conn;
            $sql = "SELECT * FROM room";
            return mysqli_query($conn,$sql);
        }
        public function select_room($room_id) {
            global $conn;

            $sql = "SELECT * FROM room WHERE room_id='$room_id'";

            return mysqli_query($conn, $sql);
        }
        public function select_room_payment_user($room_id) {
            global $conn;
            $sql = "SELECT * FROM room INNER JOIN booking ON room.room_id = booking.room_id WHERE room.room_id='$room_id' ";

            return mysqli_query($conn, $sql);
            
        }
       
        public function update_room($room_id,$name, $type, $price, $category,$image) {
            global $conn;
            $sql = "UPDATE room 
                    SET name_room = '$name', 
                        type_room = '$type',
                        price     = '$price', 
                        category  = '$category', 
                        Hinh_Anh  = '$image' 
                    WHERE room_id = '$room_id'";
            return mysqli_query($conn, $sql);
        }
        public function delete_room($id) {
            global $conn;

            $sql = "DELETE FROM room WHERE room_id=$id";
            return mysqli_query($conn, $sql);
        }
    }
    class tbl_booking{
        public function insert_booking($Name, $Email, $Cin, $Cout,$adult,$children,$name_room,$room_id,$user_id) {
            global $conn;
            $news = "Đợi Xác Nhận";
            $sql = "INSERT INTO booking(Name, email, Check_in, Check_Out,adult,children,name_room,star,nodays,room_id,user_id) 
                    VALUES('$Name','$Email','$Cin','$Cout','$adult','$children','$name_room','$news',datediff('$Cout', '$Cin'),'$room_id','$user_id')";
            return mysqli_query($conn, $sql);
        }
        public function select_booking($ID_booking) {
            global $conn;

            $sql = "SELECT * FROM booking WHERE ID_booking='$ID_booking'";

            return mysqli_query($conn, $sql);
        }  
        public function is_checkin_valid($room_id, $checkin_date) {
            global $conn;       
            // Lấy ngày check-out của đặt phòng gần nhất
            $sql = "SELECT Check_out
                    FROM booking
                    WHERE room_id = '$room_id'
                    ORDER BY Check_out DESC
                    LIMIT 1";
            $result = mysqli_query($conn, $sql);       
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $last_checkout_date = $row['Check_out'];
                // So sánh ngày check-in mới với ngày check-out của đặt phòng gần nhất
                if (strtotime($checkin_date) > strtotime($last_checkout_date)) {
                    // Ngày check-in hợp lệ
                    return true;
                } else {
                    // Ngày check-in không hợp lệ
                    return false;
                }
            } else {
                // Nếu không có đặt phòng trước đó cho phòng này, ngày check-in luôn hợp lệ
                return true;
            }
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT* FROM booking INNER JOIN room ON booking.room_id = room.room_id";
            return mysqli_query($conn, $sql);
        }
        public function select_booking_user($user_id) {
            global $conn;

            $sql = "SELECT user.*,booking.* FROM user INNER JOIN booking ON booking.user_id = user.user_id WHERE user.user_id = '$user_id'";
            return mysqli_query($conn, $sql);
        }
        public function update_status($id, $status) {
            global $conn;

            $sql = "UPDATE booking SET star = '$status' WHERE ID_booking = '$id'";

            return mysqli_query($conn, $sql);
        }
        
        public function select_booking_room($ID) {
            global $conn;

            $sql = "SELECT room.*, booking.nodays FROM room INNER JOIN booking ON room.room_id = booking.room_id
            WHERE ID_booking = '$ID'";
            return mysqli_query($conn, $sql);
        }
    }
    class tbl_user {
        public function insert($username, $password, $email, $gender, $avatar_path, $address) {
            global $conn;

            $sql = "INSERT INTO user(username, password, email, gender, avatar_path,address) 
                    VALUES('$username','$password','$email','$gender','$avatar_path','$address')";
            return mysqli_query($conn, $sql);
        }
        public function select_user($username) {
            global $conn;

            $sql = "SELECT * FROM user WHERE username='$username'";

            return mysqli_query($conn, $sql);
        }
        public function select_email($email) {
            global $conn;

            $sql = "SELECT * FROM user WHERE email='$email'";

            return mysqli_query($conn, $sql);
        }
        public function select_user_id($id) {
            global $conn;

            $sql = "SELECT * FROM user WHERE user_id='$id'";

            return mysqli_query($conn, $sql);
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM user";

            return mysqli_query($conn, $sql);
        }
        public function update($id, $password, $email, $Phone,$gender,$image,$address) {
            global $conn;

            $sql = "UPDATE user SET 
            password = '$password',
            email     = '$email', 
            Phone  = '$Phone', 
            gender = '$gender',
            avatar_path  = '$image',
            address = '$address'
            WHERE user_id = '$id'";
            return mysqli_query($conn, $sql);
        }
        public function update_password($password, $email) {
            global $conn;

            $sql = "UPDATE user SET 
            password = '$password'
            WHERE email = '$email'";
            return mysqli_query($conn, $sql);
        }
    }
    class tbl_payment{
        public function insert($name, $email, $Date_payment, $room, $price) {
            global $conn;

            $sql = "INSERT INTO payment(Name, email, date_payment, room, price) 
                    VALUES('$name','$email','$Date_payment','$room','$price')";
            return mysqli_query($conn, $sql);
        }
        public function select_all() {
            global $conn;

            $sql = "SELECT * FROM payment";
            return mysqli_query($conn, $sql);
        }
    }
?>  