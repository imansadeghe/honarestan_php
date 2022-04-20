<?php
include ("includes/header.php");
?>
    
محصولات  
<?php

try{

    $link = mysqli_connect("localhost","root","","shop_db");
   
    $query = "select * from products";
    $result = mysqli_query($link,$query);
    mysqli_close($link);

}
catch(EXCEPTION $e){
    echo "خطا رخ داده است .$e";

}
?>


<table style="width:100%" border="1px">
<tr>
<?php
$counter =0 ;
while($row = mysqli_fetch_array($result)){
$counter++;
?>
<td style="border-style:dotted dashed;vertical-align:top;width:33%;">
<h4 style="color:brown"><?php echo($row['pro_name']); ?></h4>
<a href="product_detail.php?id=<?php echo($row['pro_code']);?>">
<img src="images/products/<?php echo($row['pro_image'])?>" width="250px" height="250px"alt=""></a>
<br>
قیمت : <?php echo($row['pro_price']); ?> &nbsp;
<br>
تعداد موجودی  : <span style="color:red"><?php echo($row['pro_qty']); ?> &nbsp;</span>
<br>
توضیحات : <span style="colro:green"><?php echo(substr($row['pro_detail'],0,120));?></span>
<br><br>
<b>
    <a href="product_detail.php?id=<?php echo $row['pro_code']?>" style="text-decoration:none">
توضیحات تکمیلی و خرید </a>
</b>
</td>
<?php if($counter %3 ==0)
echo ("</tr><tr>");

}
if ($counter %3 !=0) 
echo ("</tr>")
?>

</table>




<?php
include ("includes/footer.php");
?>
