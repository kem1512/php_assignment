<?php
    $filepatch = realpath(dirname(__FILE__));
    // include "../config/config.php";
    include ($filepatch.'/../config/config.php');
?>
<!-- Kết nối cơ sở dữ liệu -->
<?php
    class database{
        //Thao tác với cơ sở dữ liệu hướng đối tượng trong PHP
        public $host = DB_HOST;
        public $user = DB_USER;
        public $pass = DB_PASS;
        public $dbname = DB_NAME;

        public $link;
        public $erorr;
        //Phương thức khởi tạo
        public function __construct(){
            $this -> connectDB();
        }
        //Phương thức kết nối dữ liệu
        public function connectDB(){
            $this -> link = new mysqli($this -> host, $this -> user, 
                                       $this -> pass, $this -> dbname);
            mysqli_set_charset($this->link,'UTF8');
            if($this ->  link){
                $this -> error = "Lỗi kết nối". $this -> link -> connect_error;
                return false;
            }
        }
        //Phương thức Select dữ liệu
        public function select($query){
            $result = $this -> link -> query($query);
            if($result -> num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }
        //Phương thức Insert, Update, Delete
        public function exec($query){
            $result = $this -> link -> query($query);
            if($result){
                return $result;
            }else{
                return false;
            }
        }
    }
?>