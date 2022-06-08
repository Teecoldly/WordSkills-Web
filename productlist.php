<?php
include_once "./Service/Auto.php";
if(!isset($_GET['ID']) && !is_numeric($_GET['ID'])){
    header("Location: ./index.php");
}else if( empty($_SESSION["UserID"])){
  header("Location: ./index.php");
} 
$result = $genaral->ProductlistGroup($_GET['ID']);
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
    <h5 class="card-title text-center h3 mb-5 pt-5 mt-5">รายการสินค้า</h5>
    <?php
      if(count($result)==0){
    ?>
      <div class="row justify-content-center ">
        <div class="col-4">
          <div class="alert alert-danger text-center" role="alert">
            “ไม่มีสินค้าประกาศขาย”
          </div>
        </div>
      </div>
    <?php
      }
    ?>
    <div class="container">
      <div class="row">
        <?php
          foreach ($result as $key => $value) {
        ?>
        <div class="col-sm-12 col-md-4 mt-3">
          <div class="card bg-light h-100">
            <img src="./Event/Photos/Product/<?php echo $value["product_file_path"]; ?>" class="card-img-top" style="height:200px!important;" >
            <div class="card-body">
              <h5 class="card-title"><?php echo $value["product_name"];  ?></h5>
              <p class="card-text">รายละเอียด:<?php echo $value["product_details"];  ?></p>
              <hr/>
              <p class="card-text">จำนวนคงเหลือ:<?php echo $value["product_amout"];   ?>  </p>
              <p class="card-text">ราคา:<?php echo $value["product_price"];  ?>฿</p>
              <?php   if(!empty($_SESSION["UserID"]) && $_SESSION["pm_buy"]==1){
              ?> 
              <a href="./addbasket.php?ID=<?php echo $value["product_ID"];  ?>" class="btn btn-primary">ซื้อสินค้า</a>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
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