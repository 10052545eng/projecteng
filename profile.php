<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$currentUser = getCurrentUser($_SESSION["id"]);
if(isset($_POST["submit"])){
  editProfile($_POST["id"],$_POST["username"],$_POST["password"],$_POST["email"],$_POST["address"],$_POST["phone_number"]);
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
          <h2 class="title-section">Profile</h2>
          <div class="divider"></div>
          <form action="#" method="post" class="contact-form py-12 px-lg-12">
            <input type="hidden" id="id" name="id" value="<?php echo $currentUser['id'];?>">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อผู้ใช้งาน </label>
                <input type="text" id="username" name="username" id="username" class="form-control" required value="<?php echo $currentUser['username'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">รหัสผ่าน <span style="color:red;">(กรุณากรอก 4-9 ตัวอักษร)</span></label>
                <input type="password" id="password" name="password" class="form-control" maxlength="9" required value="<?php echo $currentUser['password'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">อีเมล์</label>
                <input type="email" id="fname" name="email" class="form-control" value="<?php echo $currentUser['email'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ที่อยู่</label>
                <input type="text" id="fname" name="address" class="form-control" value="<?php echo $currentUser['address'];?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">เบอร์โทรศัพท์</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" maxlength="10" required value="<?php echo $currentUser['phone_number'];?>">
              </div>
            </div>
            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="assets/img/profile.png" alt="">
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