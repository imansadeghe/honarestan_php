<?php
include ("includes/header.php");
?>
 
<?php

try{

    $link = mysqli_connect("localhost","root","","shop_db");
    $pro_code =0;
    if(isset($_GET['id'])) $pro_code = $_GET['id'];
    $query = "select * from products where pro_code='$pro_code'";
    $result = mysqli_query($link,$query);
    mysqli_close($link);

}
catch(EXCEPTION $e){
    echo "خطا رخ داده است .$e";
}


?>

<table style="width:100%;" border="1px">
<tr>
<?php  if($row = mysqli_fetch_array($result)) { ?>
<td style="border-style:dotted dashed;vertical-align:top;width:33%;">

<h4 style="color:brown;"><?php echo($row['pro_name']);?></h4>
<img src="images/products/<?php echo($row['pro_image']);?>" alt="" width="480px;">
<br>
قیمت : <?php echo($row['pro_price']); ?> &nbsp;
<br>
تعداد موجودی  : <span style="color:red;"><?php echo($row['pro_qty']); ?> &nbsp;</span>
<br>
توضیحات : <span style="color:green;"><?php echo($row['pro_detail']);?></span>
<br><br>
<b><a href="order.php?id=<?php echo($row['pro_code']);?>" style="text-decoration:none;">
سفارش و خرید پستی
</a></b>
</td>

<?php } ?>
</tr>
</table>

<?php
include ("includes/footer.php");
?>
