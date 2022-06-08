<?php
include_once "./Service/Auto.php";

if(!empty($_SESSION["UserID"])){
    header("Location: ./index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <meta name="generator" content="Hugo 0.88.1" />
        <?php include_once('./Layout/title.php') ?>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="./assets/css/carousel.css" rel="stylesheet" />
  </head>
  <body>
    <header>
     <?php include_once('./Layout/navbar.php') ?>
    </header>
    <div class="card p-5 ฺborder-0">
        <h5 class="card-title text-center h3 ">เข้าสู่ระบบ</h5>
        <div class="row justify-content-center mt-5  ">
            <div class="col-sm-8 col-md-4 border border-primary p-5"> 
                <form action="./Event/Login.php" method="post">
                    <div class="form-group">
                        <label for="email">อีเมล์</label>
                        <input type="email" class="form-control"  placeholder="กรุณากรอกอีเมล์" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">รหัสผ่าน</label>
                        <input type="password" class="form-control"  placeholder="กรุณากรอกรหัสผ่าน" name ="password">
                    </div>
                    <div class="form-group text-center pt-3">
                        <button type="submit" class="btn btn-primary ">เข้าสู่ระบบ</button>
                        <button type="reset" class="btn btn-warning   ">ล้างข้อมูล</button>      
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer fixed-bottom text-center">
       
       <p>
         &copy; Test
     
       </p>
     </footer>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>