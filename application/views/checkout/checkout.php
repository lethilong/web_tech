<?php $this->view("components/header",$data); ?>
 
<?php 

	if(isset($errors) && count($errors) > 0){

		echo "<div>";
		foreach($errors as $error){

			echo "<div class='alert alert-danger' style='padding:5px;max-width:500px;margin:auto;text-align:center;'>$error</div>";
		}
		echo "</div>";
	}

?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?=ROOT?>home">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
					<div class="register-req">
						<p style="text-align: center;">Xác nhận đơn hàng</p>
					</div>
					<div class="js-order-details details" >
   									
						<!--order details-->
						<div style="display: flex;">
							<table class="table" style="flex: 1;margin: 4px;">
								<tr><th>Người nhận</th><td><input value="<?=$data['user_data']->name ?>" id="delivery_receiver" /></td></tr>
								<tr><th>Điện thoại</th><td><input value="<?=$data['user_data']->phone?>" id="delivery_phone"/></td></tr>									
							</table>
							<table class="table" style="flex: 1;margin: 4px;">
								<tr><th>Địa chỉ</th><td><input value="<?=$data['user_data']->address?>" id="delivery_address"/></td></tr>	
							</table>
						</div>
						<!-- <table style="width: 100%;background-color: #eee"><tr><td style="text-align: center;padding: 1em;"><?=$order->message?></td></tr></table> -->

						<hr>
						<h4>Chi tiết đơn hàng</h4>
							<table class="table">
								<thead>
									<tr><th>Sản phẩm</th><th>Số lượng</th><th>Đơn giá</th><th>Tổng tiền</th></tr>
								</thead>	
								<?php if(isset($order_details) && is_array($order_details)):?>
									<?php foreach($order_details as $detail):?>
										<tbody>
											<tr><td><?=$detail->name?></td><td><?=$detail->cart_qty?></td><td><?=number_format($detail->price)?></td><td><?=number_format($detail->cart_qty * $detail->price)?></td></tr>
										</tbody>
													
									<?php endforeach;?>

								<?php else: ?>
									<div style="text-align: center;">Không có mặt hàng nào trong đơn hàng</div>
								<?php endif;?>
							</table>
							<h3 class="pull-right">Thành tiền: <?=number_format($sub_total)?></h3>
						</div>
							
						<hr style="clear: both;">
			<a href="<?=ROOT?>cart">
				<input type="button" class="btn btn-warning pull-left" value="Huỷ" name="">
			</a>
			<form method="post">
				<input type="button" class="btn btn-warning pull-right" value="Đặt hàng" name="" onclick="send_delivery_data()">
			</form>
		</div>
	</section> <!--/#cart_items-->

	<script type="text/javascript">

		function send_delivery_data() {
			var receiver_input = document.querySelector("#delivery_receiver").value;
			var phone_input = document.querySelector("#delivery_phone").value;
			var address_input = document.querySelector("#delivery_address").value;
			console.log(receiver_input);
			send_data({
				delivery_name: receiver_input,
				delivery_phone: phone_input,
				delivery_address: address_input
			})
			

		}

		function send_data(data = {}) {

			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange', function() {

				if (ajax.readyState == 4 && ajax.status == 200) {
					handle_result(ajax.responseText);
				}
			});
			console.log(data);

			ajax.open("POST", "<?= ROOT?>checkout/ajax_checkout", true);
			ajax.send(JSON.stringify(data));
		}

		function handle_result(result) {

			if (result != "") {
				alert("Tạo đơn hàng thành công!");
				window.location="<?=ROOT?>";
			}
		}

	</script>
<?php $this->view("components/footer",$data); ?>