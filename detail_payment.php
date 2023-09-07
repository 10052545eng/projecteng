<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$currentFood = getCurrentFood($_GET["id"]);
?>
<?php 
if(isset($_POST["submit"])){
    saveUploadSlipt($_POST["orders_id"],$_POST["amount_payment"],$_FILES["slipt_image"]["name"]);
}

?>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <?php
    require_once("nav.php");
    ?>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-6 py-3">
          <h2 class="title-section">ยืนยันการชำระ</h2>
          <span style="color:red;">หากท่านไม่ส่งหลักฐานการชำระ ทางร้านจะขอยกเลิกการจองของท่าน</span>
          <div class="divider"></div>
          <form name="register_form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="orders_id" value="<?php echo $_GET["order_id"];?>">

            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">จำนวนเงินที่ต้องชำระ</label>
                <input type="text" id="amount_payment" name="amount_payment" class="form-control" value="<?php echo $_GET["amount_payment"];?>" readonly>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">หลักฐานการชำระ</label>
                <input type="file" name="slipt_image" id="slipt_image" class="form-control" required>
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <button type="submit" name="submit" class="btn btn-primary">ส่งหลักฐาน</button>
              </div>
            </div>

          </form>
        </div>


        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="backend/image/qr_code.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">

        $("#amount_payment").keydown(function (e) {
              // Allow: backspace, delete, tab, escape, enter and .
              if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                   // Allow: Ctrl+A, Command+A
                   (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                   // Allow: home, end, left, right, down, up
                   (e.keyCode >= 35 && e.keyCode <= 40)) {
                       // let it happen, don't do anything
                     return;
                   }
              // Ensure that it is a number and stop the keypress
              if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
              }
            });

        </script>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>