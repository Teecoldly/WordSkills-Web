<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="./">EDM</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarCollapse"
          aria-controls="navbarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF'])=='index.php'?"active":"" ?>">
              <a class="nav-link" href="./"
                >หน้าแรก</a
              >
            </li>
            
            <?php
             if(!empty($_SESSION["UserID"]) && $_SESSION["pm_buy"]==1){
              ?>
              <li class="nav-item <?php echo basename($_SERVER['PHP_SELF'])=='basketlist.php'?"active":"" ?>">
                <a class="nav-link" href="./basketlist.php">ตระกร้าสินค้า</a>
              </li>

              <li class="nav-item <?php echo basename($_SERVER['PHP_SELF'])=='orderbuy.php'?"active":"" ?>">
                <a class="nav-link" href="./orderbuy.php">สินค้าที่ได้สั่งซื้อ</a>
              </li>
              <?php } ?>
            <?php
            if(!empty($_SESSION["UserID"]) && $_SESSION["pm_sell"]==1){
            ?>
            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF'])=='sell_product.php'?"active":"" ?>">
              <a class="nav-link" href="./sell_product.php">ลงขายสินค้า</a>
            </li>


            <li class="nav-item <?php echo basename($_SERVER['PHP_SELF'])=='ordersell.php'?"active":"" ?>">
              <a class="nav-link" href="./ordersell.php">สินค้าที่ถูกสั่งซื้อ</a>
            </li>
            <?php } ?>
        
          </ul>
          <?php
          if(!empty($_SESSION["UserID"])){
          ?>
           <button  class="btn btn-outline-primary border-0 my-2 my-sm-0 mr-3"  >
              ยินดีต้อนรับคุณ <?php echo $_SESSION["name"] ;?>
            </button>
          <a  href="./Event/Logout.php"class="btn btn-outline-success   my-2 my-sm-0" type="submit">
              ออกจากระบบ
            </a>
          <?php
          }else{
          ?>
               <a  href="./login.php"class="btn btn-outline-primary my-2 my-sm-0 mr-3" type="submit">
              เข้าสู่ระบบ
            </a>
            <a  href="./register.php"class="btn btn-outline-success my-2 my-sm-0" type="submit">
              สมัครสมาชิก
            </a>
          <?php
          }
          ?>
    </div>
</nav>
