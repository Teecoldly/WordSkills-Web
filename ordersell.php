<?php
include_once "./Service/Auto.php";
 
if( empty($_SESSION["UserID"])){
    header("Location: ./index.php");
}else if( $_SESSION["pm_sell"]==0){
    header("Location: ./index.php");
}
$result = $orderproduct ->GetOrdersell();
 
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
    <h5 class="card-title text-center h3 mb-5 pt-5 mt-5">รายการสินค้าที่ถูกสั่งซื้อ</h5>
    <div class="container">
      <div class="row">
        <div class="col-12">
        <table class="table text-center border">
            <thead class="bg-success text-white">
              <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">ชื่อสินค้า</th>
                <th scope="col">จํานวน</th>
                <th scope="col">ราคาต่อหน่วย</th>
                <th scope="col">ราคารวม</th>
                <th scope="col">ผู้ขาย</th>
                <th scope="col">วันที่สั่งซื้อ</th>
                <th scope="col">สถานะการจัดส่งสินค้า</th>
              
              </tr>
            </thead>
            <tbody>
                <?php
                $index=0;
                foreach ($result as $key => $value) {
                ?>
                <tr> 
                  <th scope="row"><?php echo ++$index;?></th>
                  <th  ><?php echo $value["product_name"];?></th>
                  <th  ><?php echo $value["orderProduct_totalbuy"];?></th>
                  <th  ><?php echo $value["product_price"];?></th>
                  <th  ><?php echo $value["orderProduct_totalbuy"]*$value["product_price"];?></th>
                  <th  ><?php echo $value["name"];?></th>
                  <th  ><?php echo $genaral->PrintDate( $value["order_at"]);?></th>
                  <th  ><?php if(!$value["Order_send"]){ ?>
                        <a  href="./Event/EditSendStatus.php?ID=<?php echo $value["OrderProduct_ID"];?>" class="btn btn-primary">ยื่นยันสถานะการจัดส่ง</a>
                        <?php }else{ echo $genaral->PrintStausSend($value["Order_send"]);  }?>

                         
                 </th>
                </tr>
              <?php } ?>  
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