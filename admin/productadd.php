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
    <title>Quản lý người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    $list_product = new product();
    $categories = $list_product->show_categories();
    ?>
    <?php
    if (isset($_POST['txtName'])) {
        $name = $_POST['txtName'];
        $desc = $_POST['txtDesc'];
        $price = $_POST['txtPrice'];
        if (isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $fileName = $file['name'];
            move_uploaded_file($file['tmp_name'], 'upload/' . $fileName);
        }
        $cat = $_POST['id_cat'];
        $add_product = $list_product->add_product($name, $desc, $price, $fileName, $cat);
    }
    if (isset($add_product)) {
        echo $add_product;
        header("refresh: 1,url=productlist.php");
    }
    ?>
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        session_destroy();
        header('Location: index.php');
    }
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
                        <a class="nav-link" href="tables.php">
                            <i class="fab fa-elementor me-2"></i>Quản lý danh mục
                        </a>
                        <a class="nav-link" href="tables.php">
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
                                <a class="nav-link" href="tables.php">
                                    <i class="fas fa-user-circle me-2"></i>
                                    Đăng ký
                                </a>
                                <a class="nav-link" href="tables.php">
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
                    <h1 class="mt-4">Thêm sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Tên sản phẩm</th>
                                            <th class="text-center">Mô tả</th>
                                            <th class="text-center">Giá tiền</th>
                                            <th class="text-center">Ảnh sản phẩm</th>
                                            <th class="text-center">Thể loại</th>
                                            <th class="text-center">Xử lý</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">Tên sản phẩm</th>
                                            <th>Mô tả</th>
                                            <th>Giá tiền</th>
                                            <th class="text-center">Ảnh sản phẩm</th>
                                            <th>Thể loại</th>
                                            <th class="text-center">Xử lý</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="txtName">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="txtDesc">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="txtPrice">
                                            </td>
                                            <td>
                                                <input type="file" class="form-control" name="image">
                                            </td>
                                            <td class="align-middle">
                                                <select name="id_cat" id="input" class="form-control">
                                                    <option value="">Loại hàng</option>
                                                    <?php foreach ($categories as $key => $value) { ?>
                                                        <option value="<?php echo $value['catId'] ?>"><?php echo $value['catName'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <button type="submit" class="btn btn-primary">Thêm</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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