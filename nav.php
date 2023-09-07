<?php 
$allCategory = getAllCategory();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
  <div class="container">
    <a href="#" class="navbar-brand">ร้านครัวกาญ</a>

    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarContent">
      <ul class="navbar-nav ml-auto">


        <li class="nav-item">
          <a class="nav-link" href="index.php">หน้าหลัก</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ประเภทอาหาร
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if(empty($allCategory)){ ?>
              <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
            <?php }else{?>
              <?php foreach($allCategory as $dataCate){ ?>
                <a class="dropdown-item" href="category.php?menu_id=<?php echo $dataCate["menu_id"];?>"><?php echo $dataCate["menu_name"];?></a>
              <?php } ?>
            <?php } ?>
            
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="best_sale.php">เมนูขายดี</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.php">โต๊ะอาหาร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">สั่งอาหาร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="basket.php">รายการที่สั่ง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="payment.php">ชำระเงิน</a>
        </li>

      </ul>
    </div>

  </div>
</nav>

<div class="container">
  <div class="page-banner">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-6">
        <h1 class="text-center" style="color:black;">ร้านครัวกาญ</h1>
      </div>
    </div>
  </div>
</div>