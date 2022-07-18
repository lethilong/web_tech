
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
				<?php if($ROW):?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <img src="<?=ROOT.$ROW->image?>" alt="">
 										</div>
                    <?php if($ROW->image2) :?>
										<div class="item">
										  <img src="<?=ROOT.$ROW->image2?>" alt="">
 										</div>
                    <?php endif; ?>

                    <?php if($ROW->image3) :?>
										<div class="item">
										  <img src="<?=ROOT.$ROW->image3?>" alt="">
 										</div>
                    <?php endif; ?>
                    <?php if($ROW->image4) :?>
										<div class="item">
										  <img src="<?=ROOT.$ROW->image4?>" alt="">
 										</div>
  				          <?php endif; ?>
									</div>

								  <!-- Controls -->
                  <?php if($ROW->image2 || $ROW->image3 || $ROW->image4) :?>
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
                  <?php endif; ?>
							</div>
							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?=$ROW->name?></h2>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span><?=$ROW->price?> VND</span>
									<label>Số lượng:</label>
									<input type="text" value="1" />

                    <button type="button" class="btn btn-default cart">
                      <a href="<?=ROOT?>cart/add_to_cart/<?=$ROW->id ?>">
                        <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                    </a>
                    </button>

								</span>
                <p><b>Mô tả: </b><?= $ROW->description?></p>
								<p><b>Thương hiệu: </b><?=$ROW->brand ?> </p>
								<p><b>Danh mục: </b><?=$category ?> </p>
                <p><b>Còn hàng: </b><?=$ROW->quantity ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->



					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm được đề xuất</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
                <?php if(isset($ROWS) && is_array($ROWS)): ?>
                <?php foreach($ROWS as $row): ?>
								<div class="item active">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">

					<a href="<?=ROOT?>product/details/<?=$row->slag?>">
													<div style="overflow: hidden;"><img class="product-image" src="<?= ROOT . $row->image?>" alt="" /></div>
</a>
													<h2><?= $row->price?> VND</h2>
													<p><?= $row->name ?></p>
													<button type="button" class="btn btn-default add-to-cart"><a href="<?=ROOT?>cart/add_to_cart/<?=$row->id ?>">
                        <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                    </a></button>
												</div>
											</div>
										</div>
									</div>
								</div>
                <?php endforeach; ?>
                <?php endif; ?>

							</div>
							 <!-- <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a> -->
						</div>
					</div><!--/recommended_items-->

				<!--end product-->
				<?php else: ?>
					<div style="padding: 1em;background-color: grey;color:white;margin:1em;text-align: center;"><h2>That product was not found</h2></div>
				<?php endif; ?>
				</div>
				</div>
			</div>
		</div>
	</section>

<?php $this->view("components/footer",$data); ?>
