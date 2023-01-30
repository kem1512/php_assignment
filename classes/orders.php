<?php
$filepatch = realpath(dirname(__FILE__));
include($filepatch . '/../lib/database.php');
?>
<?php
class orders
{
    public $db;
    public function __construct()
    {
        $this->db = new database();
    }
    public function add_orders($productId, $quantity, $date, $phone, $address)
    {
        $query = "INSERT INTO `tbl_orders` (`id`, `productId`, `quantity`, `date_order`, `phone`, `address`) VALUES (NULL, '$productId', '$quantity', '$date', '$phone', '$address');";
        $result = $this->db->exec($query);
        if ($result) {
            return "Đặt hàng thành công";
        } else {
            return "Đặt hàng không thành công";
        }
    }
    public function delete_orders($id)
    {
        $query = "Delete from tbl_orders where id = $id";
        $result = $this->db->exec($query);
        if ($result) {
            return "Xóa thành công";
        } else {
            return "Xóa không thành công";
        }
    }
    public function show_orders()
    {
        $query = "Select * from tbl_orders order by id asc";
        $result = $this->db->select($query);
        return $result;
    }
}
?>