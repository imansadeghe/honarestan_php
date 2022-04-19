<?php
include ("includes/header.php");

    
    if(

    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password']) 
    
){

    $username=$_POST['username'];
    $password=$_POST['password'];
}
else
exit("برخی فیلد ها مقدار دهی نشده است ");
try{
    $link = mysqli_connect("localhost","root","","shop_db");
    echo "اتصال به پایگاه داده با موفقیت انجام شد .";
    $query = "select * from users where username='$username' and password='$password'";
    $result =mysqli_query($link,$query);
    $row = mysqli_fetch_array($result);
    if($row){
        echo("<p style='color:green;'><b>{$row['realname']}به فروشگاه ایرانیان خوش امدید</b></p>");
    }
    else
        echo("<p style='color:red;'><b>نام کاربری یا کلمه عبور یافت نشد </b></p>");

    mysqli_close();
    }
    catch(EXCEPTION $e){
    echo "خطا رخ داده است .$e";
    }
include ("includes/footer.php");
?>
