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

 
    <link href="./assets/css/carousel.css" rel="stylesheet" />
  </head>

 <body>
    <!-- start navbar -->
    <?php include_once('./Layout/navbar.php') ?>
    <!-- end navbar -->
    <!-- formevent -->
    <div class="card p-5 ฺborder-0">
    <h5 class="card-title text-center h3 mb-5">สมัครสมาชิก</h5>
        <form action="./Event/Register.php" method="post">
            <div class="form-row">
                <div class="col-sm-12 col-md-6 mt-2">
                    <label for="name">ชื่อ</label>
                    <input type="text" name="name" class="form-control" placeholder="กรุณากรอกชื่อ">
                </div>
                <div class="col-sm-12 col-md-6 mt-2">
                <label for="lastname">นามสกุล</label>
                    <input type="text" name="lastname"  class="form-control" placeholder="กรุณากรอกนามสกุล">
                </div>
                <div class="col-sm-12 col-md-6 mt-2">
                    <label for="telphone">เบอร์มือถือ</label>
                    <input type="text" name="telphone" class="form-control" placeholder="กรุณากรอกเบอร์มือถือ">
                </div>
                <div class="col-sm-12 col-md-6 mt-2">
                    <label for="email">อีเมล์</label>
                    <input type="email" name="email" class="form-control" placeholder="กรุณากรอก อีเมล์">
                </div>
                <div class="col-sm-12 col-md-6 mt-2">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password"name="password"  class="form-control" placeholder="กรุณากรอกรหัสผ่าน">
                </div>
                <div class="col-sm-12 col-md-6 mt-2">
                    <label for="password">ยืนยันรหัสผ่าน</label>
                    <input type="password"  name="password_again" class="form-control" placeholder="กรุณากรอกยืนยันรหัสผ่าน">
                </div>
                <div class="col-sm-12 col-md-6 mt-2">
                    <label for="group">กลุ่มสมาชิกเกษตรกร</label>
                    <select class="form-control" name="group">
                        <?php
                            foreach ($genaral->Grouplist() as $key => $value) {?>
                            <option value="<?php echo  $value["GrouplistiD"];  ?>"><?php  echo   $value["Groupname"];?> </option>
                        <?php } ?>
                    
                    </select>
                </div>
                <div class="col-sm-12 col-md-6 mt-2">
                    <label for="permission">สิทธิ์การใช้งาน</label>
                    <div class="form-check">
                        <input class="form-check-input" name="permissionbuy" type="checkbox" value="1" id="permissionbuy">
                        <label class="form-check-label" for="permissionbuy">
                            ผู้ซื้อสินค้า
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="permissionsell" type="checkbox" value="1" id="permissionsell">
                        <label class="form-check-label" for="permissionsell">
                            ผู้ขายสินค้า
                        </label>
                    </div>  
                </div>   
            </div>  
            <div class="form-row mt-5">
                <div class="col text-center">  
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <button type="reset" class="btn btn-warning">ล้างข้อมูล</button>      
                </div>
            </div> 
        </form>
    </div>
    <footer class="footer fixed-bottom text-center">
       
       <p>
         &copy; Test
     
       </p>
     </footer>
    <!-- end formevent -->
    <script script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>