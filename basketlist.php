<?php
include_once "./Service/Auto.php";
 
if( empty($_SESSION["UserID"])){
    header("Location: ./index.php");
}else if( $_SESSION["pm_buy"]==0){
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
    <h5 class="card-title text-center h3 mb-5 pt-5 mt-5">ตระกร้าสินค้า</h5>
    <div class="container">
      <div class="row">
        <div class="col-12">
        <table class="table text-center border">
            <thead class="bg-success text-white">
              <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">ชื่อสินค้า</th>
                <th scope="col">ราคา</th>
                <th scope="col">จำนวน</th>
                <th scope="col">รวม</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_SESSION["Basket"]) && is_array($_SESSION["Basket"])){
                        $index=0;
                        foreach ($_SESSION["Basket"] as $key => $value) {
                     
                         
                ?>
                <tr> 
                    <th scope="row"><?php echo ++$index;?></th>
                    <td><?php echo $value["product_name"];?></td>
                    <td><?php echo $value["product_price"];?></td>
                    <td><?php echo $value["amount"];?></td>
                    <td><?php echo $value["product_price"]*$value["amount"]?> ฿</td>
                    <td> <a  href="editbasket.php?ID=<?php echo  $value["product_id"];?>" class="btn btn-primary">แก้ไข</a>
                          <a  href="./Event/DeleteBasket.php?ID=<?php echo  $value["product_id"];?>" class="btn btn-danger">ลบ</a> </td>
                </tr>
                <?php
                        }       
                    }
                ?>
                    <?php
                    if(isset($_SESSION["Basket"]) && is_array($_SESSION["Basket"]) && count($_SESSION["Basket"])>0){

                  ?>
                 <tr class ="text-right"> 
                  <td>สรุป</td>
                  <td colspan="5" class="mr-5 pr-5">
                    <a  href="./Event/Summitbasket.php" class="btn btn-success">ยื่นยันการสั่งซื้อ</a>          
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
            </tbody>
          </table>
        </div>
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