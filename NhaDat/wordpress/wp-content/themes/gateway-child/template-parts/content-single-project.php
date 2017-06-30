<?php
/**
 * The template used for displaying page content in single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">

		<div id="primary" class="content-area">

			<div class="large-12 columns">

				<main id="main" class="site-main" role="main">

					<div class="project-name">
						<div class="address">
							<h4><a href="/du-an" title="Dự án">Dự án </a></h4>
							<h4><a href="/du-an" title="Thành phố">› TP. Hồ Chí Minh </a></h4>
							<h4><a href="/tim-kiem/thue?district=Quận+9" title="Quận">› Quận 9 </a></h4>
							<h2 class="title-project"><?php the_title(); ?></h2>
						</div>
					</div>

				</main><!-- #main -->

			</div><!-- .large-12 -->

		</div><!-- #primary -->

	</div><!-- .row -->

	<div class="row post-gallery">
		<?php 

		$galleryid = get_field('galleryid');

		if(isset($galleryid)) {

			$shortcode = "[supsystic-gallery id='$galleryid']";
			echo do_shortcode( $shortcode );
		}

		?>
	</div>

	<div class="row">

		<div id="primary" class="content-area">

			<div class="large-12 columns">

				<div class="table-header-group">
					<div class="table-header">Hình ảnh</div>
					<div class="table-header">Bảng giá</div>
					<div class="table-header">Vị trí</div>
					<div class="table-header">Thông tin</div>
					<div class="table-header">Tiện ích</div>
					<div class="table-header">Bài viết</div>
					<div class="table-header lnk-info"><a href="">Yêu cầu thông tin</a></div>
					<div class="table-header lnk-phone"><a href="tel:028 22488885">028 22488885</a></div>
				</div>

				<div class="table-info">
					<div class="large-3 columns info-content">
						<div class="large-5 columns info-title">Giá (m²):</div>
						<div class="large-7 columns info-value">22.5 triệu - 25 triệu</div>
					</div>
					
					<div class="large-3 columns info-content">
						<div class="large-5 columns info-title">Chủ đầu tư:</div>
						<div class="large-7 columns info-value">Khang Điền</div>
					</div>
					
					<div class="large-3 columns info-content">
						<div class="large-5 columns info-title">Khởi công:</div>
						<div class="large-7 columns info-value">02/2017</div>
					</div>
					
					<div class="large-3 columns info-content">
						<div class="large-5 columns info-title">Hoàn thành:</div>
						<div class="large-7 columns info-value">12/2018</div>
					</div>

					<div class="large-3 columns info-content">
						<div class="large-5 columns info-title">Loại hình:</div>
						<div class="large-7 columns info-value">Căn hộ</div>
					</div>

					<div class="large-3 columns info-content">
						<div class="large-5 columns info-title">Số block:</div>
						<div class="large-7 columns info-value">4</div>
					</div>
					
					<div class="large-3 columns info-content">
						<div class="large-5 columns info-title">Số tầng:</div>
						<div class="large-7 columns info-value">25</div>
					</div>
					
					<div class="large-3 columns info-content">
						<div class="large-5 columns info-title">Số căn:</div>
						<div class="large-7 columns info-value">867</div>
					</div>
				</div>

			</div><!-- .large-12 -->

		</div><!-- #primary -->

	</div><!-- .row -->

</article><!-- #post-## -->