<?php $this->view("components/header",$data); ?>
<?php $this->view("slider",$data); ?>
<br></br>
<div class="zalo-chat-widget" data-oaid="4461409502325086296" data-welcome-message="Xin chào!" data-autopopup="0" data-width="" data-height=""></div>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<section>
		<div class="container">
			<div class="row">
				
				<?php $this->view("sidebar.inc",$data); ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm</h2>
						
						<?php if(is_array($ROWS)): ?>
						<?php foreach($ROWS as $row): ?>

							<?php $this->view("products/inc",$row); ?>

						<?php endforeach; ?>
						<?php endif; ?>

					</div><!--features_items-->
                </div>
            </div>
        </div>
</section>
<?php $this->view("components/footer",$data); ?>

