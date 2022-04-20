<?php
include ("includes/header.php");
if(  $_SESSION['user_type'] != "admin"){
    ?>

    <script type="text/javascript"> 
    
        location.replace("index.php");
    
    </script>
    <?php } ?>

    
<form name="add_product" action="action_admin_products.php" method="POST" enctype="multipart/form-data">
<table style="width:100%;margin-left:auto;margin-right:auto;"border="0">
<tr>
    <td style="width:22%;">کدکالا <span style="color:red;">*</span></td>
    <td style="width:78%"><input type="text"id="pro_code"name="pro_code"></td>
</tr>
<tr>
    <td >نام کالا<span style="color:red;"></span></td>
    <td ><input type="text" style="text-align:right;" id="pro_name" name="pro_name"></td>
</tr>
<tr>
    <td >موجودی کالا <span style="color:red">*</span></td>
    <td ><input type="text" style="text-align:right;" id="pro_qty" name="pro_qty"></td>
</tr>
<tr>
    <td >قیمت کالا <span style="color:red">*</span></td>
    <td ><input type="text" style="text-align:left;" id="pro_price" name="pro_price">ریال</td>
</tr>
<tr>
    <td >اپلود تصویر کالا <span style="color:red">*</span></td>
    <td ><input type="file" style="text-align:left;" id="pro_image" name="pro_image"></td>
</tr>
<tr>
    <td >توضیحات تکمیلی کالا <span style="color:red">*</span></td>
    <td ><textarea name="pro_detail" id="pro_detail" cols="45" rows="10" wrap="virtual"></textarea></td>
</tr>
<tr>
    <td ><br><br></td>
    <td ><input type="submit" value="افزودن کالا">&nbsp;&nbsp;&nbsp;<input type="reset" value="جدید"></td>
</tr>

</table>

</form>

<?php 
include ("includes/footer.php");
?>
