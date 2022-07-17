<!--one product-->
<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
				<div class="productinfo text-center">
					<a href="<?=ROOT?>product/details/<?=$data->slag?>">
					<div style="overflow: hidden;"><img class="product-image" src="<?= ROOT . $data->image?>" alt="" /></div>
					</a>
					<h2><?=$data->price?> VND</h2>
					<p><?=$data->name?></p>
					<a href="<?=ROOT?>cart/add_to_cart/<?=$data->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
				</div>

		</div>

	</div>
</div>
<!--end one product-->
