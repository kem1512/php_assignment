<?php
include "../classes/user_class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng ký</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/q.css">
    <!--===============================================================================================-->
</head>
<body>
    <?php
    $user = new user_class();
    if (isset($_POST['txtName']) && isset($_POST['txtEmail']) && isset($_POST['txtPass'])) {
        $insert_user = $user->insert_user($_POST['txtName'], $_POST['txtEmail'], $_POST['txtPass']);
    }
    if (isset($insert_user)) {
        echo $insert_user;
        header("refresh: 1;url=userlist.php");
    }
    ?>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" action="useradd.php" method="post">
                    <span class="login100-form-title p-b-49">
                        Đăng ký
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Bạn phải nhập họ và tên">
                        <span class="label-input100">Họ và tên</span>
                        <input class="input100" type="text" name="txtName" placeholder="Nhập họ và tên của bạn">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Bạn phải nhập email">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="txtEmail" placeholder="Nhập email của bạn">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Bạn phải nhập mật khẩu">
                        <span class="label-input100">Mật khẩu</span>
                        <input class="input100" type="password" name="txtPass" placeholder="Nhập mật khẩu của bạn">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <div class="container-login100-form-btn p-t-35">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Đăng ký
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/daterangepicker/moment.min.js"></script>
    <script src="../vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../js/main.js"></script>
</body>
</html>