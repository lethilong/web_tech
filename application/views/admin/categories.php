<?php $this->view("admin/header", $data); ?>

<?php $this->view("admin/sidebar", $data); ?>

<style type="text/css">
	.add_new {

		width: 500px;
		height: auto;
		background-color: #eae8e8;
		box-shadow: 0px 0px 10px #aaa;
		position: absolute;
		padding: 6px;
	}

	.edit_category {

		/* width: 500px;
			height:300px; */
		background-color: #eae8e8;
		box-shadow: 0px 0px 10px #aaa;
		/* position: absolute; */
		padding: 6px;
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 25%;
	}

	.popup {
		background-color: #eae8e8;
		box-shadow: 0px 0px 10px #aaa;
		/* position: absolute; */
		padding: 6px;
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 250px;
	}

	.title_pu {
		text-align: center;
	}

	.show {
		display: block;
	}

	.hide {
		display: none;
	}
</style>
<div class="row mt">
	<div class="col-md-12">
		<div class="content-panel">
			<table class="table table-striped table-advance table-hover">
				<h4>Danh mục <button class="btn btn-primary btn-xs" onclick="show_add_new(event)"><i class="fa fa-plus"></i> Thêm danh mục</button></h4>

				<!--add new category-->
				<div class="add_new hide">

					<h4 class="mb">Thêm mới danh mục sản phẩm</i> </h4>
					<form class="form-horizontal style-form" method="post">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Danh mục</label>
							<div class="col-sm-10">
								<input id="category" name="category" type="text" class="form-control" autofocus>
							</div>
						</div>
						<br><br style="clear: both;"><br>
						<button type="button" class="btn btn-warning" onclick="show_add_new(event)" style="position:absolute;bottom:10px; left:10px;">Đóng</button>
						<button type="button" class="btn btn-primary" onclick="collect_data(event)" style="position:absolute;bottom:10px; right:10px;">Lưu</button>

					</form>

					<br><br>
				</div>
				<!--add new category end-->

				<div class="popup hide">

					<h4 class="title_pu">Xóa sản danh mục ?</h4>

					<button type="button" class="btn btn-warning" onclick="close_popup(false)" style="position:absolute;bottom:10px; left:10px; width: 80px">Đóng</button>
					<button type="button" class="btn btn-primary" onclick="close_popup(true)" style="position:absolute;bottom:10px; right:10px; width: 80px">Xóa</button>



					<br><br>
				</div>

				<!--edit category-->
				<div class="edit_category hide">

					<h4 class="mb">Chỉnh sửa danh mục sản phẩm</h4>
					<form class="form-horizontal style-form" method="post">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Danh mục</label>
							<div class="col-sm-10">
								<input id="category_edit" name="category" type="text" class="form-control" autofocus>
							</div>
						</div>
						<br><br style="clear: both;"><br>
						<button type="button" class="btn btn-warning" onclick="show_edit_category(0,'',event)" style="position:absolute;bottom:10px; left:10px;">Đóng</button>
						<button type="button" class="btn btn-primary" onclick="collect_edit_data(event)" style="position:absolute;bottom:10px; right:10px;">Lưu</button>

					</form>

					<br><br>
				</div>
				<!--edit category end-->

				<hr>

				<thead>
					<tr>
						<th>Danh mục</th>
						<th><i class=" fa fa-edit"></i>  Tùy chọn</th>
					</tr>
				</thead>
				<tbody id="table_body">
					<!-- <tr>
									<td>
										<button onclick="console.log('Hello')"></button>
									</td>
								</tr> -->
					<?= $tbl_rows ?>

				</tbody>
			</table>
		</div><!-- /content-panel -->
	</div><!-- /col-md-12 -->
</div><!-- /row -->

<script type="text/javascript">
	var EDIT_ID = 0;

	function show_add_new() {
		var show_edit_box = document.querySelector(".add_new");
		var category_input = document.querySelector("#category");

		if (show_edit_box.classList.contains("hide")) {

			show_edit_box.classList.remove("hide");
			category_input.focus();
		} else {

			show_edit_box.classList.add("hide");
			category_input.value = "";
		}


	}

	function show_edit_category(id, e) {
		console.log(id)
		if (id == 0) {
			EDIT_ID = id;
		}
		var show_add_box = document.querySelector(".edit_category");
		// show_add_box.style.right = (e.clientX - 700) + "px";
		// show_add_box.style.top = (e.clientY - 120) + "px";

		var category_input = document.querySelector("#category_edit");
		category_input.value = "";

		// var parent_input = document.querySelector("#parent_edit");
		// parent_input.value = parent;
		if (!show_add_box.classList.contains("hide") && id == EDIT_ID) {

			show_add_box.classList.add("hide");
			category_input.value = "";

		} else {

			show_add_box.classList.remove("hide");
			category_input.focus();
		}
		EDIT_ID = id;


	}

	function collect_data(e) {

		var category_input = document.querySelector("#category");
		if (category_input.value.trim() == "" || !isNaN(category_input.value.trim())) {
			alert("Please enter a valid category name");
		}

		var category = category_input.value.trim();
		// var parent = parent_input.value.trim();
		send_data({
			category: category,
			// parent:parent,
			data_type: 'add_category'
		});
	}


	function collect_edit_data(e) {

		var category_input = document.querySelector("#category_edit");
		if (category_input.value.trim() == "" || !isNaN(category_input.value.trim())) {
			alert("Please enter a valid category name");
		}

		var category = category_input.value.trim();

		send_data({
			id: EDIT_ID,
			category: category,
			data_type: 'edit_category'
		});
	}



	function send_data(data = {}) {

		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange', function() {

			if (ajax.readyState == 4 && ajax.status == 200) {
				handle_result(ajax.responseText);
			}
		});

		ajax.open("POST", "<?= ROOT ?>ajax_category", true);
		ajax.send(JSON.stringify(data));
	}

	function handle_result(result) {

		if (result != "") {
			var obj = JSON.parse(result);

			if (typeof obj.data_type != 'undefined') {

				if (obj.data_type == "add_new") {
					if (obj.message_type == "info") {
						alert(obj.message);
						show_add_new();

						var table_body = document.querySelector("#table_body");
						table_body.innerHTML = obj.data;
					} else {
						alert(obj.message);
					}
				} else
				if (obj.data_type == "edit_category") {

					show_edit_category(0, '', '', false);

					var table_body = document.querySelector("#table_body");
					table_body.innerHTML = obj.data;

				} else
				if (obj.data_type == "disable_row") {

					var table_body = document.querySelector("#table_body");
					table_body.innerHTML = obj.data;

				} else
				if (obj.data_type == "delete_row") {

					var table_body = document.querySelector("#table_body");
					table_body.innerHTML = obj.data;

					alert(obj.message);
				}


			}
		}
	}

	function edit_row(id) {

		send_data({
			data_type: ""
		});
	}

	function close_popup(action) {
		var popup = document.querySelector(".popup");
		if (!popup.classList.contains('hide')) {
			popup.classList.add("hide");
		} else {
			popup.classList.remove("hide")
		}
		if (action == true) {
			send_data({
				data_type: "delete_row",
				id: EDIT_ID
			});
		}
	}

	function get_id_delete(id) {
		EDIT_ID = id
		var popup = document.querySelector(".popup");
		if (!popup.classList.contains('hide')) {
			popup.classList.add("hide");
		} else {
			popup.classList.remove("hide")
		}
		// popup.classList.add("hide");


	}
</script>

<?php $this->view("admin/footer", $data); ?>