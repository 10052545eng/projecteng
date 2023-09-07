<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
$allTableEmpty = getAllTableEmpty();
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
        <h2 class="title-section">โต๊ะอาหาร</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
        <?php if(empty($allTableEmpty)){ ?>
          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
        <?php }else{?>
          <?php $i=1;?>
          <?php foreach($allTableEmpty as $dataTable){ ?>
            <div class="col-lg-3 py-3">
              <div class="card-blog">
                <img src="backend/image/tables/<?php echo $dataTable["table_image"];?>" alt="" class="img-fluid">
                <div class="body">
                  <h5 class="post-title"><?php echo $dataTable["table_name"];?></h5>
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