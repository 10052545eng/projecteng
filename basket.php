<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php 

$allTableEmpty = getAllTableEmpty();
if(isset($_POST["submit"])){
  $menu_item_id = $_POST["menu_item_id"];
  $quantity = $_POST["quantity"];
  $price = $_POST["price"];
  $remark = $_POST["item_remark"];
  saveOrders($_POST["users_id"],$_POST["order_quantity"],$_POST["order_price"],$menu_item_id,$quantity,$price,$remark,$_POST["eat_type"],$_POST["booking_time"],$_POST["dinnertable"],$_POST["people"]);
  
}
?>
<?php
if(isset($_GET["action"]))  
{  
  if($_GET["action"] == "delete")  
  {  
   foreach($_SESSION["shopping_cart"] as $keys => $values)  
   {  
    if($values["item_id"] == $_GET["id"])  
    {  
     unset($_SESSION["shopping_cart"][$keys]);  
     echo '<script>alert("ลบรายการที่เลือกแล้ว")</script>';  
     echo '<script>window.history.go(-1)</script>';  
   }  
 }  
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

      <div class="text-center wow fadeInUp">
        <h2 class="title-section">รายการที่สั่ง</h2>
        <div class="divider mx-auto"></div>
      </div>
      <form name="register_form" action="" method="post" >
        <input type="hidden" class="form-control" name="users_id" value="<?php echo $_SESSION["id"];?>">
        <div class="row my-5">

          <?php if(!empty($_SESSION["shopping_cart"])){
            $total = 0;
            $amount = 0;
            $i=0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)  {
              $sumPrice = $values["item_price"] * $values["item_amount"];
              $amount += $values["item_amount"];
              $total += $sumPrice;
              $i++;
              ?>
              <div class="col-lg-4 py-3">
                <div class="card-blog"> 

                 <img src="backend/image/food/<?php echo $values["item_picture"];?>" alt="" class="img-fluid">
                 <div class="body">
                  <h5 class="post-title"><?php echo $values["item_name"];?> X <?php echo $values["item_amount"];?></h5><br/>
                  <h5 class="post-title">รวม <?php echo number_format($sumPrice); ?> บาท</h5>
                  <input type="hidden" name="menu_item_id[]" value="<?php echo $values["item_id"];?>">
                  <input type="hidden" name="quantity[]" value="<?php echo $values["item_amount"];?>">
                  <input type="hidden" name="item_remark[]" value="<?php echo $values["item_remark"];?>">
                  <input type="hidden" name="price[]" value="<?php echo $sumPrice;?>">
                  <a href="?action=delete&id=<?php echo $values["item_id"]; ?>" class="cart_quantity_delete">ลบ</a>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>
        <input type="hidden" name="order_quantity" value="<?php echo $i;?>">
        <input type="hidden" name="order_price" value="<?php echo $total;?>">
        

        
      </div>
      <legend>การจองโต๊ะ</legend>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <input type="radio" name="eat_type" id="eat_type" value="กลับบ้าน" required onclick="chkEatType(this.value)"> กลับบ้าน <br/>
              <input type="radio" name="eat_type" id="eat_type" value="ทานที่ร้าน" required onclick="chkEatType(this.value)"> ทานที่ร้าน
            </div>
            <div class="col-md-4 mb-3 mb-md-0" id="time_div" style="display: none">
              <label class="text-black" for="fname">เวลาที่จอง</label>
              <input type="text" id="booking_time" name="booking_time" class="form-control" >
            </div>
            <div class="col-md-4 mb-3 mb-md-0" id="table_div" style="display: none">
              <label class="text-black" for="fname">เลือกโต๊ะ</label>
              <select name="dinnertable" class="form-control" id="table_name">
                <option value="">-- โปรดเลือก --</option>
                <?php foreach($allTableEmpty as $data){ ?>
                  <option value="<?php echo $data['table_name']?>" <?php echo $selected;?>><?php echo $data['table_name']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-4 mb-3 mb-md-0" id="people_div" style="display: none">
              <label class="text-black" for="fname">จำนวนคนที่มา</label>
              <select name="people" class="form-control" >
                  <option value="">-- โปรดระบุ --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              <!--<input type="text" id="people" name="people" class="form-control" >-->
            </div>
          </div>
      <div align="center">
        <input type="submit" name="submit" value="ยืนยันการสั่ง" class="btn btn-primary">
        <input type="button" name="botton" class="btn btn-danger" onClick="javascript:history.go(-1)" value="ยกเลิก">
      </div>
    </form>

      <!--<nav aria-label="Page Navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>-->

    </div>
  </div>

  <?php
  require_once("footer.php");
  ?>
  <script>
    function chkEatType(evt){
      if(evt == "ทานที่ร้าน"){
        $("#people_div").show();
        $("#timming").show();
        $("#time_div").show();
        $("#table_div").show();
      }else{
        $("#people_div").hide();
        $("#time_div").hide();
        $("#table_div").hide();
        $("#timming").hide();
      }
    }
  </script>
  <script>

      $('#booking_time').datetimepicker({
        lang:'th',
        datepicker:false,
        format:'H:i',
        enabledHours: '10'

      });
    </script>

  
</body>
</html>