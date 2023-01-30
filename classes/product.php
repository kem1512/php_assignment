<?php 
    $filepatch = realpath(dirname(__FILE__));
    include ($filepatch.'/../lib/database.php');
?>

<?php
    class product{
        public $db;
        public function __construct()
        {
            $this -> db = new database();
        }
        //hiển thị
        public function show_product(){
            $query = "Select * from tbl_products order by productId asc";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function delete_product($id){
            $query = "Delete from tbl_products where productId = '$id'";
            $result = $this -> db -> exec($query);
            if($result){
                return "Đã xóa sản phẩm thành công";
            }else{
                return "Không thành công";
            }
        }
        public function update_product($name,$desc,$price,$image,$category,$id){
            $query = "Update tbl_products Set productName = '$name',product_desc = '$desc',price = '$price',image = '$image',catId = $category where productId = '$id'";
            $result = $this -> db -> exec($query);
            if($result){
                return "Update thành công";
            }else{
                return "Update không thành công";
            }
        }
        public function add_product($name,$desc,$price,$img,$cat){
            $query = "Insert into tbl_products value('','$name','$desc','$price','$img','$cat')";
            $result = $this -> db -> exec($query);
            if($result){
                return "Thêm thành công";
            }else{
                return "Thêm không thành công";
            }
        }
        public function show_categories(){
            $query = "Select * from tbl_categories order by catId asc";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function show_categories_vip($id){
            $query = "Select * from tbl_products where catId = $id order by catId asc";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function show_product_categories($catid,$a,$b){
            $query = "Select * from tbl_products where catId = $catid order by productId asc limit $a offset $b";
            $result = $this -> db -> select($query);
            return $result;
        } 
        public function top($catid,$per_page,$offset){
            $query = "Select * from tbl_products where catId = $catid order by productId asc limit $per_page offset $offset";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function show_name($id){
            $query = "Select * from tbl_categories where catId = $id";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function show_product_vip($id){
            $query = "Select * from tbl_products where productId = $id";
            $result = $this -> db -> select($query);
            return $result;
        }
    }
?>