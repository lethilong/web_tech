<?php $this->view("components/header",$data); ?>

	<section id="advertisement">
		<div class="container">
			<!-- <img src="<?=ASSETS?>images/shop/advertisement.jpg" alt="" /> -->
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">

				<?php $this->view("sidebar.inc",$data); ?>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm</h2>

						<?php if(isset($ROWS) && is_array($ROWS)): ?>
						<?php foreach($ROWS as $row): ?>

							<?php $this->view("products/inc",$row); ?>

						<?php endforeach; ?>
						<?php endif; ?>

						<br style="clear: both;">
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

<?php $this->view("components/footer",$data); ?>
