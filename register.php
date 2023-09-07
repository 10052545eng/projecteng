<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["submit"])){
  saveRegister($_POST["username"],$_POST["password"],$_POST["email"],$_POST["address"],$_POST["phone_number"]);
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
          <h2 class="title-section">สมัครสมาชิก</h2>
          <div class="divider"></div>
          <form action="" method="post" class="contact-form py-12 px-lg-12">
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่อผู้ใช้งาน </label>
                <input type="text" id="username" name="username" id="username" class="form-control" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">รหัสผ่าน </label>
                <input type="password" id="password" name="password" class="form-control" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">อีเมล์</label>
                <input type="email" id="fname" name="email" class="form-control">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ที่อยู่</label>
                <input type="text" id="fname" name="address" class="form-control">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">เบอร์โทรศัพท์</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" maxlength="10" required>
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <input type="submit" name="submit" value="สมัครสมาชิก" class="btn btn-primary" onclick="return Validate()">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="assets/img/read.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $("#username").keypress(function(event){
      var ew = event.which;
      if(ew == 32)
        return true;
      if(48 <= ew && ew <= 57)
        return true;
      if(65 <= ew && ew <= 90)
        return true;
      if(97 <= ew && ew <= 122)
        return true;
      return false;
    });
  </script>
  <script>
    $("#password").keypress(function(event){
      var ew = event.which;
      if(ew == 32)
        return true;
      if(48 <= ew && ew <= 57)
        return true;
      if(65 <= ew && ew <= 90)
        return true;
      if(97 <= ew && ew <= 122)
        return true;
      return false;
    });
  </script>

  <script type="text/javascript">
    function Validate() {


      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      var phone_number = document.getElementById("phone_number").value;
      var lenUsername = username.length;
      var lenPassword = password.length;
      var lenPhone = phone_number.length;
      if (lenUsername < 4) {
        alert("กรุณากรอกมากกว่า 4 ตัวอักษร");
        return false;
      }
      if (lenPassword < 4) {
        alert("กรุณากรอกมากกว่า 4 ตัวอักษร");
        return false;
      }
      if (lenPhone < 10) {
        alert("หมายเลขโทรศัพท์ไม่ถูกต้อง");
        return false;
      }
      return true;
    }
  </script>
  <script type="text/javascript">

    $("#phone_number").keydown(function (e) {
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