<?php $this->view("components/header",$data); ?>
<div>Home page</div>
<br></br>
<section?>
		<div class="container">
			<div class="row">
				
				<?php $this->view("sidebar.inc",$data); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Items</h2>
						
						<?php if(is_array($ROWS)): ?>
						<?php foreach($ROWS as $row): ?>

							<?php $this->view("product.inc",$row); ?>

						<?php endforeach; ?>
						<?php endif; ?>

					</div><!--features_items-->
                </div>
            </div>
        </div>
</section>
<?php $this->view("components/footer",$data); ?>

