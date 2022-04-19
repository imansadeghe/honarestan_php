<!doctype html>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>php هنرستان</title>
<style>
.set_style_link{
    text-decoration:none;
    font-weight:bold;
}
</style>
</head>
    <?php
    session_start();
    ?>
<body>
<div class="divTable">
    <div class="divTableRow">
        <div class="divTableCell">
            <header class="divTabel">
                <div class="divTableRow">
                    <div class="divTableCell">لوگوی سایت</div>
                </div>
            </header>
            <nav class="divTable">
                <ul class="divTableRow">
                    <li class="divTableCell"><a href="index.php" class="set_style_link">صفحه اصلی</a></li>
                    <li class="divTableCell"><a href="register.php" class="set_style_link">عضویت در سایت</a></li>
                    <?php 
                        if(isset($_SESSION['state_login'])&& $_SESSION['state_login']== true)
                        { 
                    ?>
                    <li class="divTableCell"><a href="logout.php" class="set_style_link">خروج از سایت
                        <?php echo("{{$_SESSION['realname']}}");?>
                    </a></li>
                    <?php } else{ ?>  
                    <li class="divTableCell"><a href="login.php" class="set_style_link">ورود به سایت</a></li>
                    <?php }?>
                    <li class="divTableCell"><a href="https://instagram.com/swimming_to_light" class="set_style_link">درباره ما</a></li>
                    <li class="divTableCell"><a href="#" class="set_style_link">ارتباط با ما</a></li>
                </ul>
            </nav>
            <section class="divTable">
                <section class="divTableRow">
                    <aside class="divTableCell" style="width:25%;">بخش امکانات سایت</aside>
                    <section class="divTableCell" style="width:75%;">