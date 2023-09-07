<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
$allFood = getAllFoodInCategory($_GET["menu_id"]);
?>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <?php
    require_once("nav.php");
    ?>
  </header>

  <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <h2 class="title-section">เมนูอาหาร</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
        <?php if(empty($allFood)){ ?>
          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
        <?php }else{?>
          <?php $i=1;?>
          <?php foreach($allFood as $dataFood){ ?>
            <div class="col-lg-3 py-3">
              <div class="card-blog">
                <img src="backend/image/food/<?php echo $dataFood["item_picture"];?>" alt="" class="img-fluid">
                <div class="body">
                  <h5 class="post-title">
                    <?php if($dataFood["item_status"] == 0){ ?>
                      <a href="detail_food.php?id=<?php echo $dataFood["menu_item_id"];?>"><?php echo $dataFood["item_name"];?></a>
                    <?php }else{ ?>
                      <?php echo $dataFood["item_name"];?><span style="color:red;">(หมด)</span>
                    <?php } ?>
                  </h5>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>



  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>