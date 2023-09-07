<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 
$currentFood = getCurrentFood($_GET["id"]);
?>
<?php 
if(isset($_POST["add_to_cart"]))  
{
  if(isset($_SESSION["shopping_cart"]))  
  {
    //session_destroy();
    //die();
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_POST["menu_item_id"], $item_array_id))  
    {  
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
       'item_id' => $_POST["menu_item_id"],  
       'item_name' => $_POST["item_name"],
       'item_description' => $_POST["description"],
       'item_price' => $_POST["item_price"],
       'item_picture' => $_POST["item_picture"],
       'item_remark' => $_POST["remark"],
       'item_amount' => $_POST["amount"]  
     );
      $_SESSION["shopping_cart"][$count] = $item_array;
      echo '<script>window.history.go(-1)</script>'; 
    }  
    else  
    {  
      echo '<script>alert("รายการนี้มีในตะกร้าแล้ว")</script>';  
      echo '<script>window.history.go(-1)</script>';  
    }  
  }else{
    $item_array = array(  
      'item_id' => $_POST["menu_item_id"],  
      'item_name' => $_POST["item_name"],
      'item_description' => $_POST["description"],
      'item_price' => $_POST["item_price"],
      'item_picture' => $_POST["item_picture"],
      'item_remark' => $_POST["remark"],
      'item_amount' => $_POST["amount"]  
    );  
    $_SESSION["shopping_cart"][0] = $item_array;
    echo '<script>window.history.go(-1)</script>';  
  }
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
          <h2 class="title-section">เมนูอาหาร</h2>
          <div class="divider"></div>
          <form name="register_form" action="" method="post" >
            <input type="hidden" class="form-control" name="menu_item_id" value="<?php echo $currentFood["menu_item_id"];?>">
            <input type="hidden" class="form-control" name="item_name" value="<?php echo $currentFood["item_name"];?>">
            <input type="hidden" class="form-control" name="description" value="<?php echo $currentFood["description"];?>">
            <input type="hidden" class="form-control" name="item_price" value="<?php echo $currentFood["item_price"];?>">
            <input type="hidden" class="form-control" name="item_picture" value="<?php echo $currentFood["item_picture"];?>">

            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ชื่ออาหาร : <?php echo $currentFood["item_name"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">รายละเอียด : <?php echo $currentFood["description"];?></label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ราคา : <?php echo $currentFood["item_price"];?> บาท</label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">จำนวนที่สั่ง</label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2 mb-3 mb-md-0">
                <input type="button" value="-" class="btn btn-danger" onclick="minusNumber()">
              </div>

              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" id="amount" name="amount" class="form-control" value="1" readonly>
              </div>
              <div class="col-md-2 mb-3 mb-md-0">
                <input type="button" value="+" class="btn btn-info" onclick="plusNumber()">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">ความเผ็ด</label>
                <!--<input type="text" id="remark" name="remark" class="form-control">-->
                <select name="remark" class="form-control" >
                  <option value="">-- โปรดระบุ --</option>
                  <option value="เผ็ดน้อย">เผ็ดน้อย</option>
                  <option value="เผ็ดปานกลาง">เผ็ดปานกลาง</option>
                  <option value="เผ็ดมาก">เผ็ดมาก</option>
                </select>
              </div>
            </div>

            <div class="row form-group mt-4">
              <div class="col-md-12">
                <button type="submit" name="add_to_cart" class="btn btn-primary">สั่งอาหาร</button>
                <input type="button" name="botton" class="btn btn-danger" onClick="javascript:history.go(-1)" value="ยกเลิก">
              </div>
            </div>

          </form>
        </div>


        <div class="col-lg-6 py-3">
          <div class="img-fluid py-3 text-center">
            <img src="backend/image/food/<?php echo $currentFood["item_picture"];?>" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">

    $("#amount").keydown(function (e) {
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
          <script>
            function minusNumber(){
              var sum = 0;
              var numAmount = $("#amount").val();
              var sum = numAmount-1;
              if(sum == 0){
                $("#amount").val(1);
              }else{
                $("#amount").val(sum);
              }


            }
            function plusNumber(){
              var sum = 0;
              var numAmount = $("#amount").val();
              var sum = +numAmount + +1;

              $("#amount").val(sum);

            }
          </script>

          <?php
          require_once("footer.php");
          ?>



        </body>
        </html>