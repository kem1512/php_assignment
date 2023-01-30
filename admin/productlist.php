<?php
include '../lib/session.php';
session::checkSession();
?>
<?php
include "../classes/product.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        session_destroy();
        header('Location: index.php');
    }
    ?>
    <?php
    $list_product = new product();
    if (isset($_GET['delId'])) {
        $delId = $list_product->delete_product($_GET['delId']);
    }
    if (isset($delId)) echo $delId;
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Deep Web</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="?action=logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Trang chủ</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Trang chủ
                        </a>
                        <div class="sb-sidenav-menu-heading">Quản lý</div>
                        <a class="nav-link" href="userlist.php">
                            <i class="far fa-address-book me-2"></i>Quản lý người dùng
                        </a>
                        <a class="nav-link" href="productlist.php">
                            <i class="fas fa-chart-bar me-2"></i>
                            Quản lý sản phẩm
                        </a>
                        <a class="nav-link" href="categorieslist.php">
                            <i class="fab fa-elementor me-2"></i>Quản lý danh mục
                        </a>
                        <a class="nav-link" href="orderslist.php">
                            <i class="fas fa-clipboard-list me-2"></i>Quản lý đơn hàng
                        </a>
                        <div class="sb-sidenav-menu-heading">Tài khoản</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <i class="fas fa-book-open me-2"></i>
                            Tài khoản
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="index.php">
                                    <i class="fas fa-user-circle me-2"></i>
                                    Đăng ký
                                </a>
                                <a class="nav-link" href="index.php">
                                    <i class="fas fa-pastafarianism me-2"></i>
                                    Quên mật khẩu
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Quản lý sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="productadd.php" class="btn btn-success w-100">Thêm sản phẩm</a>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th class="text-center">Tên sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Giá tiền</th>
                                        <th class="text-center">Ảnh sản phẩm</th>
                                        <th>Thể loại</th>
                                        <th class="text-center">Xử lý</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th class="text-center">Tên sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Giá tiền</th>
                                        <th class="text-center">Ảnh sản phẩm</th>
                                        <th>Thể loại</th>
                                        <th class="text-center">Xử lý</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $product = $list_product->show_product();
                                    if ($product) {
                                        while ($row = $product->fetch_assoc()) {
                                    ?>
                                            <tr style="font-size: 16px;">
                                                <td class="align-middle text-center"><?php echo $row['productId'] ?></td>
                                                <td class="align-middle"><?php echo $row['productName'] ?></td>
                                                <td class="align-middle"><?php echo $row['product_desc'] ?></td>
                                                <td class="align-middle"><?php echo number_format($row['price'],0,",",".") ?></td>
                                                <td class="align-middle text-center">
                                                    <p><?php echo "<div id='img_div'><img width='317px' src='upload/" . $row['image'] . "' ></div>"; ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <?php 
                                                        $show_cate = $list_product -> show_name($row['catId']);
                                                        if($show_cate){
                                                            while($row1 = $show_cate -> fetch_assoc()){
                                                                echo $row1['catName'];
                                                            }
                                                        }
                                                    ?>          
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a class="btn btn-primary mb-2" href="productedit.php?idEdit=<?php echo $row['productId'] ?>&nameEdit=<?php echo $row['productName'] ?>&desc=<?php echo $row['product_desc'] ?>&price=<?php echo $row['price'] ?>&image=<?php echo $row['image'] ?>&catId=<?php echo $row['catId'] ?>">Sửa sản phẩm</a>
                                                    <a class="btn btn-danger" onclick="return confirm ('Bạn có chắc chắn muốn xóa sản phẩm này không?');" href="productlist.php?delId=<?php echo $row['productId'] ?>">Xóa sản phẩm</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>