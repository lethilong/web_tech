<?php $this->view("admin/header",$data); ?>

<?php $this->view("admin/sidebar",$data); ?>

<style type="text/css">
	.add_new {

		width: 500px;
		height: auto;
		background-color: #eae8e8;
		box-shadow: 0px 0px 10px #aaa;
		position: absolute;
		padding: 6px;
	}
	
	.details{

		background-color: #eee;
		box-shadow: 0px 0px 10px #aaa;
		width: 100%;
		position: absolute;
		min-height: 100px;
		left: 0px;
		padding: 10px;
		z-index: 2;
	}

</style>
<div class="row mt">
	<div class="col-md-12">
		<div class="content-panel">
		<table class="table table-striped table-advance table-hover">
			<?php if(isset($data['page_title']) && $data['page_title'] == "Admin - Admins"): ?>
			<h4>Quản trị viên <button class="btn btn-primary btn-xs" onclick="show_add_new(event)"><i class="fa fa-plus"></i> Thêm quản trị viên</button></h4>

			<!--add new category-->
			<div class="add_new hide">

				<h4 class="mb">Thêm mới quản trị viên</i> </h4>
				<form class="form-horizontal style-form" method="post">
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Tên</label>
						<div class="col-sm-10">
							<input id="name" name="name" type="text" class="form-control" autofocus>
						</div>
						
					</div>
					<br><br style="clear: both;">
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input id="email" name="email" type="text" class="form-control" autofocus>
						</div>
					</div>
					<br><br style="clear: both;">
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Mật khẩu</label>
						<div class="col-sm-10">
							<input id="password" name="password" type="password" class="form-control" autofocus>
						</div>
					</div>
					<br><br style="clear: both;"><br>
					<button type="button" class="btn btn-warning" onclick="show_add_new(event)" style="position:absolute;bottom:10px; left:10px;">Đóng</button>
					<button type="button" class="btn btn-primary" onclick="collect_data(event)" style="position:absolute;bottom:10px; right:10px;">Lưu</button>

				</form>

				<br><br>
			</div>
			<?php endif; ?>
			<hr>
			<thead>
				<tr><th>Mã tài khoản</th><th>Tên</th><th>Email</th><th>Ngày tạo</th>
				<!-- <th>Orders count</th><th>...</th> -->
			</tr>
			</thead>
			<tbody>
				<?php if(isset($users) && is_array($users)):?>
					<?php foreach($users as $user):?>

						<tr ><td><?=$user->id?></td><td><a href="<?=ROOT?>user/profile/<?=$user->token?>"><?=$user->name?></a></td><td><?=$user->email?></td><td><?=date("jS M Y H:i a",strtotime($user->date))?></td>

							<!-- <td>
								<?=$user->orders_count?>
							</td> -->
							<td>
								
							</td>
							
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>

		</table>
	</div>
	</div>
</div>



<script type="text/javascript">
	var EDIT_ID = 0;

	function show_add_new() {
		var show_edit_box = document.querySelector(".add_new");
		var name_input = document.querySelector("#name");
		var email_input = document.querySelector("#email");
		var password_input = document.querySelector("#password");


		if (show_edit_box.classList.contains("hide")) {

			show_edit_box.classList.remove("hide");
			email_input.focus();
		} else {

			show_edit_box.classList.add("hide");
			name_input="";
			email_input.value = "";
			password_input.value ="";
		}


	}

	function collect_data(e) {

		var name_input = document.querySelector("#name");
		var email_input = document.querySelector("#email");
		var password_input = document.querySelector("#password");
		if (name_input.value.trim() == "" || !isNaN(name_input.value.trim())) {
			alert("Vui lòng nhập tên hợp lệ");
		}

		if (email_input.value.trim() == "" || !isNaN(email_input.value.trim())) {
			alert("Vui lòng nhập email hợp lệ");
		}
		if (password_input.value.trim() == "") {
			alert("Vui lòng nhập mật khẩu hợp lệ");
		}

		var name = name_input.value.trim();
		var email = email_input.value.trim();
		var password = password_input.value.trim();

		send_data({
			name: name,
			email: email,
			password: password,
			data_type: 'add_admin'
		});
	}

	function send_data(data = {}) {

		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange', function() {

			if (ajax.readyState == 4 && ajax.status == 200) {
				handle_result(ajax.responseText);
			}
		});

		ajax.open("POST", "<?= ROOT ?>ajax_admin", true);
		ajax.send(JSON.stringify(data));
	}

	function handle_result(result) {
		console.log(result);

		if (result != "") {
			var obj = JSON.parse(result);
			console.log(obj.message);

			// if (typeof obj.data_type != 'undefined') {

			// 	if (obj.data_type == "add_new") {
			// 		if (obj.message_type == "info") {
			// 			alert(obj.message);
			// 		}
			// 	}
			// }
		}
	}		

	





	// function collect_data(e) {

	// var category_input = document.querySelector("#name");
	// if (category_input.value.trim() == "" || !isNaN(category_input.value.trim())) {
	// 	alert("Please enter a valid category name");
	// }

	// var category = category_input.value.trim();
	// // var parent = parent_input.value.trim();
	// send_data({
	// 	category: category,
	// 	// parent:parent,
	// 	data_type: 'add_category'
	// });
	// }
</script>	
 

<?php $this->view("admin/footer",$data); ?>