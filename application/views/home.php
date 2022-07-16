<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    This is the home page
</body>
<!-- <button href="<? ROOT?>user/logout"> -->
    <!-- Logout
</button> -->

<a href ="<?=ROOT?>user/login">Login</a>
<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); print_r(date("Y-m-d H:i:s")) ?>


</html>
=======
<?php $this->view("components/header",$data); ?>
<div>Home page</div>
<?php $this->view("components/footer",$data); ?>
>>>>>>> 899329932137a1820f994969b8febc21010df2a8

