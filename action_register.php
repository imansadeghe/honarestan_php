<?php 
include("includes/header.php");

if(
    isset($_POST['realname']) && !empty($_POST['realname']) &&
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['repassword']) && !empty($_POST['repassword']) &&
    isset($_POST['email']) && !empty($_POST['email']) 
){

$realname=$_POST['realname'];
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$email = $_POST['email'];

}
else
exit("برخی فیلد ها مقدار دهی نشده است ");


if($password != $repassword) exit("کلمه عبور و تکرار ان مشابه نیست . ");
if(filter_var($email,FILTER_VALIDATE_EMAIL) === false) exit("پست الکترونیکی وارد شده صحیح نیست");

try{
$link = mysqli_connect("localhost","root","","shop_db");
echo "اتصال به پایگاه داده با موفقیت انجام شد .";
$query = "insert into users(realname,username,password,email,type) values ('$realname','$username','$password','$email','0')";
if (mysqli_query($link,$query) === true)
echo("<p style='color:green;'><b>".$realname.
"گرامی عضویت شما".$username.
"در فروشگاه با موفقیت انجام شد"."</p></b>"
);
else 
    echo "<p style='color:red'><b>عضویت شما در فروشگاه انجام نشد </b></p>";
mysqli_close();
}
catch(EXCEPTION $e){
echo "خطا رخ داده است .$e";
}


?>




<?php 
include("includes/footer.php")
?>