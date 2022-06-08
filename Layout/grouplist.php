<?php

$resultGroup = $genaral->GrouplistMainPage();
    if(count( $resultGroup)>0){
?>
    <h5 class="card-title text-center h3 mb-5">กลุ่มสมาชิกเกษตรกร</h5>
<?php
    }else{
?>
    <h5 class="card-title text-center h3 mb-5">ยังไม่มีสินค้าลงทะเบียนจากกลุ่มสมาชิกเกษตรกร</h5>
<?php       
    }
?>
<div class="row">
    <?php 
      
    if(count( $resultGroup)>0){
        foreach ($resultGroup as $key_Group => $value_Group) {
    ?>
        <div class="col-lg-4 ">
            <div class="card bg-light h-100">
                <img src="./Event/Photos/G<?php  echo $value_Group["GrouplistiD"]; ?>.jpg"   class="card-img-top" style="height:200px!important;">
                <h5 class="card-title mt-4"><?php echo $value_Group["Groupname"]; ?></h5>
           
                <div class="card-body">
                <p class="card-text"> <?php echo $value_Group["GroupDetails"]; ?></p>
                <?php   if(!empty($_SESSION["UserID"])  ){ ?>
                    <p class="card-text"> <a class="btn btn-secondary" href="productlist.php?ID=<?php echo $value_Group['GrouplistiD'];?>">รายการสินค้า</a></p>
                <?php } ?>
                </div>
            </div>
        </div>
    <?php 
        }
    }
    ?>
</div>