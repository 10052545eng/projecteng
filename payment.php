<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
$allOrderTable = getAllOrderTable();


if(isset($_POST["submit"])){
  updatePayment($_POST["order_id"],$_POST["payment_method"],$_POST["amount_payment"]);
}
$cook_map = array( 0=>'<a style="color:red">กำลังปรุง</a>',1=>'<a style="color:green">เรียบร้อย</a>');
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
        <h2 class="title-section">ชำระค่าอาหาร</h2>
        <div class="divider mx-auto"></div>
      </div>
      <form action="#" method="post" class="contact-form py-12 px-lg-12">
        <input type="hidden" id="order_id" name="order_id" value="<?php echo $_GET['order_id'];?>">
        <div class="row mt-5">


          <table class="table">
            <thead class=" text-primary">
              <th style="width:50%;">เมนู</th>
              <th style="width:10%;text-align: center;">จำนวน</th>
              <th style="width:10%;text-align: center;">สถานะ</th>
              <th style="width:10%;text-align: center;">หน่วยละ</th>
              <th style="width:20%;text-align: right;">รวม</th>
            </thead>
            <tbody>
              <?php if(empty($allOrderTable)){ ?>
              <?php }else{?>
                <?php $total = 0;?>
                <?php $discount = 0;?>
                <?php foreach($allOrderTable as $data){ ?>
                  <?php $total += $data["price"];?>
                  
                  <tr>
                    <td>
                      <?php echo $data["item_name"];?>
                    </td>
                    <td style="text-align: right;"><?php echo $data["quantity"];?></td>
                    <td style="text-align: right;"><?php echo $cook_map[$data["cook"]];?></td>
                    <td style="text-align: right;"><?php echo number_format($data["item_price"]);?></td>
                    <td style="text-align: right;"><?php echo number_format($data["price"]);?></td>
                  </tr>
                <?php } ?>
              <?php } ?>
              <tr>
                <td colspan="4">รวมราคา</td>
                <td style="text-align:right;"><?php echo number_format($total);?></td>
              </tr>
            </tbody>
          </table>
          

          <legend>จัดการการชำระเงิน</legend>
          <div class="row form-group">
            <div class="col-md-12 mb-6 mb-md-0">
              <input type="radio" name="payment_method" id="payment_method" value="โอนจ่าย" required> โอนจ่าย<br/>
              <input type="radio" name="payment_method" id="payment_method" value="เงินสด" required> เงินสด
            </div>
            <div class="col-md-12 mb-6 mb-md-0" id="timming" style="display: none">
              <span style="color:red;">กรุณามาก่อนเวลา 1 ชั่วโมง</span>
            </div>
          </div>

          
        </div>

        <div align="center">
          <input type="hidden" id="amount_payment" name="amount_payment" value="<?php echo $total;?>">
          <input type="submit" name="submit" value="ยืนยันการชำระเงิน" class="btn btn-primary">
          <input type="button" name="botton" class="btn btn-danger" onClick="javascript:history.go(-1)" value="ยกเลิก">
        </div>

      </form>
    </div>
  </div>



  <?php
  require_once("footer.php");
  ?>
  
  
</body>
</html>