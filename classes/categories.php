<?php
$filepatch = realpath(dirname(__FILE__));
include($filepatch . '/../lib/database.php');
?>

<?php
class categories
{
    public $db;
    public function __construct()
    {
        $this->db = new database();
    }
    //hiển thị
    public function show_categories()
    {
        $query = "Select * from tbl_categories order by catId asc";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_categories($id)
    {
        $query = "Delete from tbl_categories where catId = '$id'";
        $result = $this->db->exec($query);
        if ($result) {
            return 'Xóa thành công';
        } else {
            return 'Xóa thất bại';
        }
    }
    public function update_categories($catName, $id)
    {
        $query = "Update tbl_categories Set catName = '$catName' where catId = '$id'";
        $result = $this->db->exec($query);
        if ($result) {
            return 'Update thành công';
        } else {
            return 'Update thất bại';
        }
    }
    public function add_categories($adminName)
    {
        $query = "Insert into tbl_categories values('','$adminName')";
        $result = $this->db->exec($query);
        if ($result) {
            return "Thêm thành công";
        } else {
            return "Thêm không thành công";
        }
    }
}
?>