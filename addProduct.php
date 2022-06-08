<?php
include_once "./Service/Auto.php";
 
if( empty($_SESSION["UserID"])){
    header("Location: ./index.php");
}else if( $_SESSION["pm_sell"]==0){
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
    <h5 class="card-title text-center h3 mb-5 pt-5 mt-5">เพิ่มรายการสินค้า</h5>
      <div class="row justify-content-center mr-2 ml-2 "> 
        <div class="col-sm-12 col-md-5  "> 
            <form action="./Event/AddProduct.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <label for="productimg">รูปภาพสินค้า</label>
                            <input type="file" name="productimg"  class="form-control-file" accept="  image/jpeg, image/png"  >
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 mt-2">
                        <label for="nameproduct">ชื่อสินค้า</label>
                        <input type="text" name="nameproduct" class="form-control" placeholder="กรุณากรอกชื่อสินค้า">
                    </div>
                    <div class="col-sm-12 col-md-12 mt-2">
                        <label for="prict">ราคา</label>
                        <input type="number" name="prict" class="form-control" placeholder="กรุณากรอกราคา">
                    </div>
                    <div class="col-sm-12 col-md-12 mt-2">
                        <label for="totalproduct">จำนวน</label>
                        <input type="number" name="totalproduct" class="form-control" placeholder="กรุณากรอกจำนวนสินค้า">
                    </div>
                    <div class="col-sm-12 col-md-12 mt-2">
                        <label for="detailproduct">รายละเอียดสินค้า</label>
                        <input type="text" name="detailproduct" class="form-control" placeholder="กรุณากรอกรายละเอียดสินค้า">
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
    </div>
    <footer class="footer fixed-bottom text-center">
       
       <p>
         &copy; Test
     
       </p>
     </footer>
    <script script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>