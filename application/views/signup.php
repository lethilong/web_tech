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
				<input name = "name" type="text" placeholder="Họ và tên"/>
			</div>
			<div class="input-box">
				<input name = "email" type="email" placeholder="Email"/>
			</div>
			<div class="input-box">
				<input name = "phone" type="text" placeholder="Số điện thoại"/>
			</div>
			<div class="input-box">
				<input name = "address" type="text" placeholder="Địa chỉ" />
			</div>
			<div class="input-box">
				<input name = "password" type="password" placeholder="Mật khẩu"/>
			</div>
			<div class="input-box">
				<input name = "password2" type="password" placeholder="Xác nhận mật khẩu"/>
			</div>
			<div class="input-box btn">
				<input type="submit" value="Đăng ký" >
			</div>
			<span><?php check_error() ?></span>		
		</form>
	</div>
</body>
</html>

