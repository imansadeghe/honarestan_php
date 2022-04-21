
<?php
include('includes/header.php');
if(  $_SESSION['user_type'] != "admin"){
    ?>

    <script type="text/javascript"> 
    
        location.replace("index.php");
    
    </script>
    <?php } 


    if(
    isset($_POST['pro_code']) && !empty($_POST['pro_code']) &&
    isset($_POST['pro_name']) && !empty($_POST['pro_name']) &&
    isset($_POST['pro_qty']) && !empty($_POST['pro_qty']) &&
    isset($_POST['pro_price']) && !empty($_POST['pro_price']) &&
    isset($_POST['pro_detail']) && !empty($_POST['pro_detail']) || $_GET['action'] == 'DELETE'
){
$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$pro_qty = $_POST['pro_qty'];
$pro_price = $_POST['pro_price'];
$pro_image = $_FILES["pro_image"]["name"];
$pro_detail = $_POST['pro_detail'];


if(isset($_GET['action'])){
    $id = $_GET['id'];
    $link = mysqli_connect("localhost","root","","shop_db");
    switch($_GET['action']){
        
        case 'EDIT':
            
            $query="update products set pro_code ='$pro_code',pro_name='$pro_name',
            pro_qty='$pro_qty',pro_price='$pro_price',pro_detail='$pro_detail'
            where pro_code='$id'";
            if(mysqli_query($link,$query)===true) echo("<p style='color:green'><b>ویرایش محصولات با موفقیت انجام شد</b></p>");
            else echo ("<p style='color:red'><b>خطا در ویرایش محصولات</b></p>");
            break;
        case 'DELETE':
            $query = "delete from products where pro_code='$id'";
             mysqli_query($link,$query);
             echo 'حذف با موفقیت انجام شد .';
            break;
        }
        mysqli_close($link);
        include('includes/footer.php');
        exit();



}
$target_dir = "images/products/";
$target_file = $target_dir.$_FILES['pro_image']['name'];
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$check = getimagesize($_FILES['pro_image']['tmp_name']);
if($check != false){echo "پرونده انتخابی یک تصویر از نوع ".$check['mime']."است <br/>";
$uploadOk=1;}else{echo "پرونده انتخاب شده تصویر نیست .<br/>";
$uploadOk=0;}
if(file_exists($target_file)){
    echo "پرونده ای با همین نام در سرویس دهنده میزبان وجود دارد<br/>";
    $uploadOk=0;
}
if($_FILES['pro_image']['size']>(500*1024)){
    echo "اندازه پرونده انتخابی بیشتر از ۵۰۰ کیلوبایت است .<br/>";
    $uploadOk = 0 ;
}
$imageFileType != Strtolower($imageFileType);
if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType != "gif"){
    echo "فقط پسوند های JPG , JPEG , PNG & GIF برای پرونده مجاز هستند . <br/>";
    $uploadOk = 0;
}
if($uploadOk == 0){
    echo "پرونده انتخاب شده به سرویس دهنده میزبان ارسال نشد .<br/>";
}else {
    if(move_uploaded_file($_FILES['pro_image']['tmp_name'],$target_file)){
        echo "پرونده ".$_FILES['pro_image']['name']."با موفقیت به سرویس دهنده انتقال یاقت
		<br/>";
	


        } 

        if($uploadOk ==1){
            $link = mysqli_connect("localhost","root","","shop_db");
        
            $query = "insert into products(pro_code,pro_name,pro_qty,pro_price,pro_image,pro_detail) values
 ('$pro_code','$pro_name','$pro_qty','$pro_price','$pro_image','$pro_detail')";
        if(mysqli_query($link,$query) === true){
            echo("<p style='color:green;'><b>کالا با موفقیت به انبار اضافه شد</b></p>");
        }
        else
            echo("<p style='color:red;'><b>خطا در ثبت مشخصات کالا درانبار</b></p>");

        }else{echo("<p style='color:red;'><b>خطا در ثبت مشخصات کالا درانبار</b></p>");
    
    }

    mysqli_close($link);
    }}


else exit("برخی فیلد ها مقدار دهی نشده اند");
