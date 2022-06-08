<?php
include_once "./Service/Auto.php";
 
if( empty($_SESSION["UserID"])){
    header("Location: ./index.php");
}else if( $_SESSION["pm_buy"]==0){
    header("Location: ./index.php");
}else if(!isset($_GET["ID"])||! is_numeric($_GET["ID"])){
    header("Location: ./index.php");
}
$result = $genaral->GetProduct($_GET["ID"]);
if(!$result["status"] ){
    echo "<script>
          alert(`ไม่พบข้อมูลสินค้า`);
          window.location.href='./index.php';
          </script>";
}
$amount =0;
foreach ($_SESSION["Basket"] as $key => $value) {
    if($value["product_id"]==$_GET["ID"]){
        $amount = $value["amount"];
    }
}
echo $amount;
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
    <h5 class="card-title text-center h3 mb-5 pt-5 mt-5">เพิ่มรายการลงตะกร้าสินค้า</h5>
      <div class="row justify-content-center mr-2 ml-2 "> 
        <div class="col-sm-12 col-md-5  "> 
            <form action="./Event/Editbasket.php?ID=<?php echo $result["data"]["product_ID"]?>&GrouplistiD=<?php echo $result["data"]["GrouplistiD"]?>" method="post">
                <div class="form-row">
                <img src="./Event/Photos/Product/<?php echo $result["data"]["product_file_path"] ;?>" class="img-thumbnail"  >
                <div class="col-sm-12 col-md-6 mt-2">
                        <label for="nameproduct">ชื่อสินค้า</label>
                        <input type="text" disabled  value="<?php echo $result["data"]["product_name"] ;?>" class="form-control" placeholder="กรุณากรอกชื่อสินค้า">
                        <input type="hidden"    value="<?php echo $result["data"]["product_name"] ;?>" name="nameproducts" >
                    </div>
                    <div class="col-sm-12 col-md-6 mt-2">
                        <label for="prict">ราคา</label>
                        <input type="number" disabled value="<?php echo $result["data"]["product_price"] ;?>"  class="form-control" placeholder="กรุณากรอกราคา">
                        <input type="hidden"    value="<?php echo $result["data"]["product_price"] ;?>" name="price" >
                      </div>
                    <div class="col-sm-12 col-md-6 mt-2">
                        <label for="totalproduct">คงเหลือจำนวน</label>
                        <input type="number" disabled value="<?php echo $result["data"]["product_amout"] ;?>"   class="form-control" placeholder="กรุณากรอกจำนวนสินค้า">
                    </div>
                    <div class="col-sm-12 col-md-6 mt-2">
                        <label for="detailproduct">รายละเอียดสินค้า</label>
                        <input type="text" disabled value="<?php echo $result["data"]["product_details"] ;?>"  class="form-control" placeholder="กรุณากรอกรายละเอียดสินค้า">
                    </div>
                    <div class="col-sm-12 col-md-12 mt-2">
                        <label for="totalbuy">ระบุจํานวนสินค้า (ที่ต้องการ)</label>
                        <input type="number"  require   min="1" max="<?php echo $result["data"]["product_amout"] ;?>"  value="<?php echo $amount ;?>" name="totalbuy" class="form-control" placeholder="กรุณากรอกจำนวนที่ต้องการซื้อ">
                    </div>
                </div>  
                <div class="form-row mt-5">
                    <div class="col text-center">  
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <a href="productlist.php?ID=<?php echo $result["data"]["GrouplistiD"] ; ?>" class="btn btn-warning">ยกเลิก</a>      
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