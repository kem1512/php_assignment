<?php 
    $filepatch = realpath(dirname(__FILE__));
    include ($filepatch.'/../lib/database.php');
?>

<?php
    class user_class{
        public $db;
        public function __construct()
        {
            //Tạo đối tượng db là thể hiện của lớp database
            $this -> db = new database();
        }
        //Chức năng đăng nhập
        public function login($adminEmail,$adminPass){
            $query = "Select * from tbl_users where adminEmail = '$adminEmail' and adminPass = '$adminPass' limit 1";
            $result = $this -> db -> select($query);
            if($result){
                $row = $result -> fetch_assoc();
                //Thiết lập session
                $_SESSION['isLogin'] = true;
                $_SESSION['adminName'] = $row['adminName'];
                //-------------------
                header("Location: index.php");
            }else{
                return "Tài khoản hoặc mật khẩu không chính xác";
            }
        }
        //Hiển thị danh sách người dùng
        public function show_users(){
            $query = "Select * from tbl_users order by adminId asc";
            $result = $this -> db -> select($query);
            return $result;
        }
        //Xóa người dùng
        public function del_user($id){
            $query = "Delete from tbl_users where adminId = '$id'";
            $result = $this -> db -> exec($query);
            if($result){
                return "Đã xóa người dùng thành công";
            }else{
                return "Không thành công";
            }
        }
        //Sửa người dùng
        public function update_user($adminName,$adminEmail,$id){
            $query = "Update tbl_users Set adminName = '$adminName',adminEmail = '$adminEmail' where adminId = '$id'";
            $result = $this -> db -> exec($query);
            if($result){
                return "Update thành công";
            }else{
                return "Update không thành công";
            }
        }
        //Thêm người dùng
        public function insert_user($adminName,$adminEmail,$adminPass){
            $query = "Insert into tbl_users values('','$adminName','$adminEmail','$adminPass')";
            $result = $this -> db -> exec($query);
            if($result){
                return "Thêm thành công";
            }else{
                return "Thêm không thành công";
            }
        }
    }
?>