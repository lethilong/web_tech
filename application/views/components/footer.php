	<footer id="footer"><!--Footer-->

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">CSKH</a></li>
								<li><a href="#">Liên hệ </a></li>
								<li><a href="#">Trạng thái đơn hàng </a></li>
								<li><a href="#">Thay đổi vị trí</a></li>
								<li><a href="#">Câu hỏi thường gặp </a></li>
								<?php if(isset($data['user_data']) && $data['user_data']->role == 'admin'): ?>
									<li><a href="<?=ROOT?>admin">Quản trị viên</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>E-Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">PC</a></li>
								<li><a href="#">Laptop</a></li>
								<li><a href="#">Điện thoại</a></li>
								<li><a href="#">Máy tính bảng</a></li>
								<li><a href="#">Phụ kiện</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2> Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#"> Chính sách bảo mật</a></li>
								<li><a href="#"> Chính sách hoàn tiền </a></li>
								<li><a href="#"> Chính sách hoá đơn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2> Về chúng tôi</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#"> Thông tin công ty</a></li>
								<li> <a href="#"> Công việc</a></li>
								<li><a href="#"> Địa chỉ cửa hàng</a></li>
								<li><a href="#"> Chương trình tiếp thị</a></li>
								<li><a href="#"> Bản quyền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2> Liên hệ</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="nhập email" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Cập nhật tin tức mới nhất từ chúng tôi</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row" style="text-align: center;">
					<p class="">Copyright © webTech | 2022</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="<?= ASSETS  ?>js/jquery.js"></script>
	<script src="<?= ASSETS  ?>js/bootstrap.min.js"></script>
	<script src="<?= ASSETS  ?>js/jquery.scrollUp.min.js"></script>
	<script src="<?= ASSETS  ?>js/price-range.js"></script>
    <script src="<?= ASSETS  ?>js/jquery.prettyPhoto.js"></script>
    <script src="<?= ASSETS  ?>js/main.js"></script>
</body>
</html>
