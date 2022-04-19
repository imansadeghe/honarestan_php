<?php include ("includes/header.php"); 

if(isset($_SESSION['state_login'])&& $_SESSION['state_login']== true){

?>

<script type="text/javascript"> 

    location.replace("index.php");

</script>
<?php } ?>

<form action="action_register.php" name="register" method="POST">
    <table style="width:50%;margin-left:auto;margin_right:auto;" border="0">
        <tr>
            <td style="width:40%;">نام واقعی<span style="color:red">*</span></td>
            <td style="width:60%;"><input type="text" id="realname"name="realname"></td>
        </tr>
        <tr>
            <td>نام کاربری <span style="color:red">*</span></td>
            <td><input type="text" style="text-align:left;" id="username"name="username"></td>
        </tr>
        <tr>
            <td>کلمه عبور<span style="color:red">*</span></td>
            <td><input  stype="text-align:left;"type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td>تکرار کلمه عبود <span style="color:red;">*</span></td>
            <td><input style="text-align:left;"type="password" name="repassword" id="repassword"></td>
        </tr>
        <tr>
            <td>پست الکترونیکی<span style="color:red">*</span></td>
            <td><input type="text" id="email" name="email" style ="text-align:left"></td>
        </tr>
        <tr>
            <td><br><br></td>
            <td><input type="button"value="ثبت نام" onclick="check_empty();"> 
            &nbsp;&nbsp;&nbsp;
            <input type="reset" value="جدید">
        </td>
        </tr>
    </table>

</form>

<script>
    function check_empty(){
        var username='';
        username = document.getElementById('username').value;
        if(username=='') alert("وارد کردن نام کاربری الزامی است ");
        else{
            var r = confirm("ایا از صحت اطلاعات وارد شده اطمینان دارید؟");
            if (r == true) document.register.submit();
        }
    }
</script>
<?php include ("includes/footer.php"); ?>