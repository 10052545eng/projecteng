<?php 
$user = getUser($_SESSION["id"]);
$currentRestuarantDetail = getCurrentRestuarantDetail();

if (isset($_GET['logout'])) {
  logout();
}
?>
<footer class="page-footer bg-image" style="background-image: url(assets/img/footer_img.jpg);">
  <div class="container">
    <?php if($_SESSION["id"] != "" && !empty($_SESSION["id"])){ ?>
      <p class="text-right" id="copyright" style="color:black;">ร้าน : <?php echo $currentRestuarantDetail["name"];?></p>
      <p class="text-right" id="copyright" style="color:black;">เวลาเปิด-ปิด : <?php echo $currentRestuarantDetail["opening_time"];?></p>
      <p class="text-right" id="copyright" style="color:black;">คุณ : <a href="profile.php"><?php echo $user["username"];?></a></p>
      <p class="text-right" id="copyright">
        <a href='?logout=true' class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการออกจากระบบ');" style="color:black;">ออกจากระบบ</a>
      </p>
    <?php }else{ ?>
      <p class="text-right" id="copyright" style="color:black;">คุณยังไม่ได้เข้าสู่ระบบ</p>
    <?php } ?>

  </div>
</footer>