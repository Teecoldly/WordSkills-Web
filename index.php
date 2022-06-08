<?php
include_once "./Service/Auto.php";

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

    <main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
 
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
 
        </ol>
        <div class="carousel-inner">
  
          <div class="carousel-item active">
            <img class="bd-placeholder-img"    
              src="./Event/Photos/BGtitle.jpg"  >
        

            <div class="container">
              <div class="carousel-caption">
                <h1>E-Commerce ของสมาชิกเกษตรกร</h1>
                <p>
                การประชาสัมพันธ์และส่งเสริมเกษตรแปลงใหญ่ (Collaborative Farming) พร้อมจัดทําระบบซื้อ-ขายสินค้าทางการเกษตรของกลุ่มสมาชิก
                </p>
               
              </div>
            </div>
          </div>
    
        </div>
    
      </div>

    

      <div class="container marketing">
      
      <?php

      include_once('./Layout/grouplist.php');
      ?>
  

 

        <hr class="featurette-divider" />

     
 
      </div>
      <!-- /.container -->

      <!-- FOOTER -->
      <footer class="footer fixed-bottom text-center">
       
        <p>
          &copy; Test
      
        </p>
      </footer>
    </main>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
