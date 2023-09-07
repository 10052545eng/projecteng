<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["submit"])){
  saveComplain($_POST["complain_detail"],$_POST["score"]);
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
          <h2 class="title-section">ติชม/ให้คะแนน</h2>
          <div class="divider"></div>
          <form action="" method="post" class="contact-form py-12 px-lg-12">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">การติชม</label>
                <input type="text" id="complain_detail" name="complain_detail" class="form-control">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">คะแนนที่ให้</label>
                <select name="score" class="form-control">
                  <option value="">-- โปรดระบุ --</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                </select>
              </div>
            </div>


            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="ส่งข้อมูล" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="assets/img/complain.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  require_once("footer.php");
  ?>


  
</body>
</html>