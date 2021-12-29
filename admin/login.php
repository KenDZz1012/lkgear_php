<?php
    require_once(__DIR__ .'/../lib/autoload.php');
?>

<?php 
    if(isset($_SESSION['login'])){
        header("location:./index.php");
    }
    else{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["userName"]) || empty($_POST['password'])){
                echo "<script>alert('KO dc de trong')</script>";
            }else{
                $userName  = $_POST["userName"];
                $password  = md5($_POST["password"]);
    
                $sql = "select * from account where userName = '$userName' and password = '$password' ";
    
                $rs = $db->fetchOne($sql);
                if($rs > 0){
                    echo "Đăng Nhập Thành Công";
                    $_SESSION['login'] = $rs['id'] ."-". $rs['userName'];
                    header("location:./index.php");
                }else{
                    echo "Đăng Nhập Thất Bại";
                }
    
            }
        }
    }
    

?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./../public/admin/assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="./../public/admin/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Đăng Nhập</h4></a>
        
                                <form class="mt-5 mb-5 login-input" action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="userName" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <input type="submit" class="btn login-form__btn submit w-100" value="Sign In">
                                    <!-- <button class="btn login-form__btn submit w-100">Sign In</button> -->
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="./../public/admin/plugins/common/common.min.js"></script>
    <script src="./../public/admin/js/custom.min.js"></script>
    <script src="./../public/admin/js/settings.js"></script>
    <script src="./../public/admin/js/gleek.js"></script>
    <script src="./../public/admin/js/styleSwitcher.js"></script>
</body>
</html>




