<?php $this->view("admin/header",$data); ?>

<?php $this->view("admin/sidebar",$data); ?>

<style type="text/css">
	
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

<table class="table table-striped table-advance table-hover">
	<?php if(isset($data['page_title']) && $data['page_title'] == "Admin - Admins"): ?>
	<h4>Quản trị viên <button class="btn btn-primary btn-xs" onclick="show_add_new(event)"><i class="fa fa-plus"></i> Thêm quản trị viên</button></h4>

	<!--add new category-->
	<div class="add_new hide">

		<h4 class="mb">Thêm mới quản trị viên</i> </h4>
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
	<?php endif; ?>
	<thead>
		<tr><th>Mã tài khoản</th><th>Tên</th><th>Email</th><th>Ngày tạo</th>
		<!-- <th>Orders count</th><th>...</th> -->
	</tr>
	</thead>
	<tbody>
		<?php if(isset($users) && is_array($users)):?>
			<?php foreach($users as $user):?>

				<tr style="position: relative;"><td><?=$user->id?></td><td><a href="<?=ROOT?>profile/<?=$user->token?>"><?=$user->name?></a></td><td><?=$user->email?></td><td><?=date("jS M Y H:i a",strtotime($user->date))?></td>

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
 

<?php $this->view("admin/footer",$data); ?>