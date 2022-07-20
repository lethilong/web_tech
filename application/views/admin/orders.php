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

	<thead>
		<tr><th>Mã đơn hàng</th><th>Khách hàng</th><th>Ngày đặt hàng</th><th>Tổng tiền</th><th>Người nhận</th><th>Số điện thoại</th><th>Địa chỉ nhận hàng</th><th>...</th></tr>
	</thead>
	<tbody onclick="show_details(event)">
		<?php foreach($orders as $order):?>

			<tr style="position: relative;"><td><?=$order->id?></td><td><a href="#"><?=$order->user->name?></a></td><td><?=date("jS M Y H:i a",strtotime($order->date))?></td><td><?=number_format($order->total_price)?></td><td><?=$order->delivery_name?></td><td><?=$order->delivery_phone?></td><td><?=$order->delivery_address?></td>
				<td>
					<i class="fa fa-arrow-down"></i>
					<div class="js-order-details details hide" >
						<a style="float: right;cursor: pointer;">Close</a>
						<h3>Đơn hàng #<?=$order->id?></h3>
						<h4>Khách hàng: <?=$order->user->name?></h4>
						
						<!--order details-->
						<div style="display: flex;">
							<table class="table" style="flex: 1;margin: 4px;">

								<tr><th>Người nhận</th><td><?=$order->delivery_name?></td></tr>
								<tr><th>Số điện thoại</th><td><?=$order->delivery_phone?></td></tr>
							</table>
							<table class="table" style="flex: 1;margin: 4px;">
								<tr><th>Địa chỉ nhận hàng</th><td><?=$order->delivery_address?></td></tr>
								<tr><th>Date</th><td><?=$order->date?></td></tr>
								
							</table>
						</div>
						<hr>
						<h4>Chi tiết đơn hàng</h4>
						<table class="table">
							<thead>
								<tr><th>Sản phẩm</th><th>Số lượng</th><th>Đơn giá</th><th>Tổng tiền</th></tr>
							</thead>	
							<?php if(isset($order->details) && is_array($order->details)):?>
								<?php foreach($order->details as $detail):?>
									<tbody>
										<tr><td><?=$detail->productId?></td><td><?=$detail->qty?></td><td><?=number_format($detail->amount)?></td><td><?=number_format($detail->total)?></td></tr>
									</tbody>
										
								<?php endforeach;?>

							<?php else: ?>
								<div>Không có mặt hàng nào trong đơn hàng này</div>
							<?php endif;?>
						</table>
						<h3 class="pull-right">Thành tiền: <?=number_format($order->grand_total)?></h3>
					</div>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>

</table>


<script type="text/javascript">
	
	function show_details(e){

		var row = e.target.parentNode;
		if(row.tagName != "TR")
			row = row.parentNode;

		var details = row.querySelector(".js-order-details");
		
		//get all rows
		var all = e.currentTarget.querySelectorAll(".js-order-details");
		for (var i = 0; i < all.length; i++) {
			if(all[i] != details){
				all[i].classList.add("hide");
			}
		}

		if(details.classList.contains("hide")){
			details.classList.remove("hide");
		}else{
			details.classList.add("hide");
		}
	}

</script>

<?php $this->view("admin/footer",$data); ?>