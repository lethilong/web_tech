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
<form method="post" enctype="multipart/form-data">
	<table class="table table-striped table-advance table-hover">

		<?php if($type == "socials"):?>

			<thead>
				<tr><th> Cài đặt</th><th> Thông tin</th></tr>
			</thead>
			<tbody>
				<?php if(isset($settings) && is_array($settings)):?>
					<?php foreach($settings as $setting):?>

						<tr>
							<td><?=ucwords(str_replace("_", " ", $setting->setting))?></td>
							<td>
								<?php if($setting->type == "" || $setting->type == "text"):?>
									<input placeholder="<?=ucwords(str_replace("_", " ", $setting->setting))?>" name="<?=$setting->setting?>" class="form-control" type="text" value="<?=$setting->value?>" />
								<?php elseif($setting->type == "textarea"):?>
									<textarea placeholder="<?=ucwords(str_replace("_", " ", $setting->setting))?>" name="<?=$setting->setting?>" class="form-control" ><?=$setting->value?></textarea>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>
			<input type="submit" value="Save Settings" class="btn btn-warning pull-right" >

		<?php elseif($type == "slider_images"):?>

			<?php if($action == "show"):?>
				<thead>
					<tr><th> Tiêu đề 1</th><th> Tiêu đề 2</th><th> Thông tin</th><th> Link sản phẩm</th><th> Hình ảnh</th><th> Hết hạn</th><th> Tuỳ chọn </th></tr>
				</thead>
				<tbody>
					<?php if(isset($rows) && is_array($rows)):?>
						<?php foreach($rows as $row):?>

							<tr>
								<td><?=$row->header1_text?></td>
								<td><?=$row->header2_text?></td>
								<td><?=$row->text?></td>
								<td><?=$row->link?></td>
								<td><img src="<?=ROOT. $row->image?>" style="width:100px;" /></td>
								<td><?=$row->disabled ? "Yes":"No";?></td>
							</tr>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
				<a href="<?=ROOT?>admin/settings/slider_images?action=add">
					<input type="button" value="Thêm" class="btn btn-warning pull-left" >
				</a>
			<?php elseif($action == "add"):?>

				<h2> Thêm</h2>
				<div class="form-group">
					<label for="header1_text"> Tiêu đề 1</label>
					<input autofocus id="header1_text" type="text" value="<?=(isset($POST['header1_text'])) ? $POST['header1_text']: '';?>" class="form-control" name="header1_text" placeholder="">
				</div>

				<div class="form-group">
					<label for="header2_text"> Tiêu đề 2</label>
					<input id="header2_text" type="text" value="<?=(isset($POST['header2_text'])) ? $POST['header2_text']: '';?>" class="form-control" name="header2_text" placeholder="">
				</div>

				<div class="form-group">
					<label for="text"> Thông tin</label>
 					<textarea name="text" id="text" class="form-control"><?=(isset($POST['text'])) ? $POST['text']: '';?></textarea>
				</div>

				<div class="form-group">
					<label for="link">Link sản phẩm</label>
					<input id="link" type="text" value="<?=(isset($POST['link'])) ? $POST['link']: '';?>" class="form-control" name="link" placeholder="e.g http://yourwebsite.com/your_product">
				</div>

				<div class="form-group">
					<label for="image"> Ảnh quảng cáo</label>
					<input id="image" type="file" class="form-control" name="image">
				</div>
				<input type="submit" value="Add" class="btn btn-primary">
			<?php endif;?>
		<?php endif;?>

	</table>
</form>

<?php $this->view("admin/footer",$data); ?>
