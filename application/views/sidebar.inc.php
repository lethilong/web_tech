<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Danh mục</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->

			<?php if(isset($categories) && is_array($categories)):?>
				<?php foreach($categories as $cat):?>


					 <!-- category without children -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a href="<?=ROOT?>product/category/<?=$cat->id?>"><?=$cat->category?></a></h4>
						</div>
					</div>

			 	<?php endforeach; ?>
		 	<?php endif; ?>

		</div>

	</div>
</div>
