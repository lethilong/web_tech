<!--one product-->
<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
				<div class="productinfo text-center">
					<h2><?=$data->name?></h2>
					<a href="<?=ROOT?>product/details/<?=$data->slag?>">
					<div style="overflow: hidden;"><img class="product-image" src="<?= ROOT . $data->image?>" alt="" /></div>
					</a>
					<h3><?=$data->price?>VND</h3>
					<p><?=$data->description?></p>
					<a href="<?=ROOT?>cart/add_to_cart/<?=$data->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>

		</div>

	</div>
</div>
<!--end one product-->
