<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="<?= ASSETS?>css/style.css" rel="stylesheet">
</head>
<body>
	<div class="form-container">
		<form method="post">
			<div class="input-box">
				<input name = "email" type="email" placeholder="Email"/>
			</div>
			
			<div class="input-box">
				<input name = "password" type="password" placeholder="Mật khẩu"/>
			</div>
			<div class="input-box btn">
				<input type="submit" value="Đăng nhập" >
			</div>
			<span><?php check_error() ?></span>
			<div class="text sign-up-text">
				<h3>
					Bạn chưa có tài khoản?
					<a href ="<?=ROOT?>user/signup">Đăng ký</a>
				</h3>
			</div>		
		</form>
		
		
	</div>
</body>
</html>
