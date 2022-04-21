<?php 
include('includes/header.php');
if(!(isset($_SESSION['state_login'])&& $_SESSION['state_login']== true)){

?>

<script type="text/javascript"> 

    location.replace("index.php");

</script>
<?php } 

$pro_code=$_POST['pro_code'];
$pro_name=$_POST['pro_name'];
$pro_qty=$_POST['pro_qty'];
$pro_price=$_POST['pro_price'];
$total_price = $_POST['total_price'];
$realname=$_POST['realname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$username = $_SESSION['username'];
$query = "insert into orders(id,username,orderdate,pro_code,pro_qty,pro_price,mobile,address,trackcode,state) 
values ('0','$username','".date('y-m-d')."','$pro_code','$pro_qty','$pro_price','$mobile','$address','000000000000000000000000','0')";
$link = mysqli_connect("localhost","root","","shop_db");


if(mysqli_query($link,$query)===true){
    echo("<p style='color:green;'><br><b>سفارش شما با موفقیت در سامانه ثبت شد</b></p>");
    echo("<p style='color:brown;'><br><b>کاربر گرامی اقا/خانم $realname");
    echo("<p style='color:brown;'><br><b>محصول $pro_name با کد $pro_code به تعداد/مقدار $pro_qty با قیمت پایه $pro_price ریال سفارش داده اید ");
    echo("<p style='color:red;'><br><b>مبلغ قابل پرداخت برای سفارش ثبت شده $total_price ریال است </b></p>");
    echo("<p style='color:blue;'><br> <b>پس از بررسی سفارش و تایید ان با شما تماس گرفته خواهد شد </b></p>");
    echo("<p style='color:blue;'><br> <b>محصول سفارش داده شده از طریق پست جمهوری اسلامی ایران طبق ادرس درج شده ارسال خواهد شد</b></p>");
    echo("<p style='color:blue;'><br> <b> در هنگام تحویل گرفتن محصول ان را بررسی  و از صحت و سالم بودن  ان 
     سپس مبلغ کالا  را طبق فاکتور اریه شده به مامور پست تحویل دهید </b></p>");

$query = "update products set pro_code=pro_qty-$pro_qty where pro_code ='$pro_code'";
mysqli($link,$query);
}
else echo("<p style='color:red';><b>خطا در ثبت سفارش</b></p>");
mysqli_close($link);
include('includes/footer.php');
?>
    