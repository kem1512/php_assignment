<?php
include '../lib/session.php';
session::checkSession();
?>
<?php
include "../classes/user_class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sửa người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    $list_user = new user_class();
    ?>
    <?php
    if (isset($_GET['idEdit'])) {
        $id = $_GET['idEdit'];
        $name = $_GET['nameEdit'];
        $email = $_GET['emailEdit'];
    }
    if (isset($_POST['txtName']) && isset($_POST['txtEmail'])) {
        $update_user = $list_user->update_user($_POST['txtName'], $_POST['txtEmail'], $id);
    }
    if (isset($update_user)) {
        echo $update_user;
        header("refresh: 1,url=userlist.php");
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
                    <h1 class="mt-4">Sửa người dùng</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa người dùng</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="useradd.php" class="btn btn-success w-100">Thêm người dùng</a>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Chỉnh sửa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Chỉnh sửa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group justify-content-center">
                                                    <span class="input-group-text" id="basic-addon1"><?php if (isset($_GET['idEdit'])) echo $id ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1"><?php if (isset($_GET['idEdit'])) echo $name ?></span>
                                                    <input name="txtName" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1"><?php if (isset($_GET['idEdit'])) echo $email ?></span>
                                                    <input name="txtEmail" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                            <td><button type="submit" class="btn btn-primary">Xác nhận</button></td>
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