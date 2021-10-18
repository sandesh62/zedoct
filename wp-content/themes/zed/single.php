<?php

/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<!-- start  breadcrumbs-->
<section class="breadcrumbs">
	<div class="container">
		<ul>
			<li><a href="<?= BASE_URL; ?>">Home <i class="fa fa-angle-right"></i></a></li>
			<li><a href="<?= BASE_URL; ?>blog/">Blog <i class="fa fa-angle-right"></i></a></li>
			<li class="active"><?php echo get_the_title($ID); ?></li>
		</ul>
	</div>
</section>
<?php $ID = get_the_ID(); ?>
<!-- end breadcrumbs-->
<!-- start press and award tab-->
<section class="our-exp-wrapper">
	<div class="our-exp-top-container">
		<div class="container">
			<!-- <div class="text-panel w-100">
				<h2>
					<span class="blue display-inline">BlueMagic </span>
					<span class="black display-inline">News</span>
				</h2>
			</div> -->
			<div class="blog-list-inner-wrapper">
				<div class="blog-list-left">
					<div class="blog-detail-wrapper">
						<div class="blog-detail">
							<span class="blog-image">
								<img src="<?php echo get_the_post_thumbnail_url($ID); ?>" alt="Blog" />
							</span>
							<div class="social-media-icon">
								<span>Share</span>
								<?php
								$postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
								?>
								<ul>
									<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $postUrl; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://twitter.com/share?url=<?= $postUrl; ?>/&amp;text=<?php echo get_the_title($ID); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="mailto:?Subject=<?php echo get_the_title($ID); ?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?= $postUrl; ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
									<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $postUrl; ?>&amp;title=<?php echo get_the_title($ID); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							<div class="d-flex">
								<span class="blog-date"><i class="fa fa-calendar"></i> <?php echo get_the_time('M d, Y', $ID); ?></span>
								<?php
								$allgets = get_the_tags($ID);
								if ($allgets) {
									foreach ($allgets as $tagss) {
										$atags[] = $tagss->name;
									}
									$atagsc = implode(",", $atags);
								} else {
									$atagsc = '';
								}
								?>
								<span class="blog-category"><?php $author_id = $post->post_author; ?><?= get_the_author_meta('display_name', $author_id) ?></span>
								<?php
								if ($atagsc) {
									?>
									<span class="blog-category"><i class="fa fa-folder"></i> <?= $atagsc; ?></span>
								<?php
								}
								?>
							</div>
							<h2><?php echo get_the_title($ID); ?></h2>

							<p><?php echo get_the_content($ID); ?></p>

						</div>
						<div class="f-btn-grp">
							<?php
							$cats = get_the_category($ID);
							foreach ($cats as $c) {
								?>
								<button class="btn btn-default filter-button active"><?= $c->name; ?></button>
							<?php
							}
							$previous = get_previous_post();
							$next = get_next_post();
							?>
						</div>
						<div class="blog-pagination">
							<?php
							if ($previous) {
								?>

								<div class="blog-text previous-blog">
									<a href="<?= $previous->guid; ?>">Previous Post</a>
									<p><?php echo get_the_title($previous) ?></p>
								</div>
							<?php
							}
							if ($next) {
								?>

								<div class="blog-text next-blog">
									<a href="<?= $next->guid; ?>">Next Post</a>
									<p><?php echo get_the_title($next) ?></p>
								</div>
							<?php
							}
							?>
						</div>
					</div>

					<?php
					// Related Posts by tag
					$categories = get_the_category($ID);
					if ($categories) {
						$categories_array = [];
						foreach ($categories as $category) {
							$cat = get_term($category);
							$categories_array[] = $cat->term_id;
						}
					}
					$ccategory = implode(",", $categories_array);
					// echo '<pre>';
					// print_r($ccategory);
					// echo '</pre>';
					$args = array(
						// 'post__not_in' 	=> array($ID),
						'post_type' => 'post',
						'cat' => $ccategory,
						'posts_per_page' => 2 // this will retrive all the post that is published 
					);
					$resulttc = new WP_Query($args);

					if ($resulttc->have_posts()) {
						?>
						<h3 class="related-post">Related Post</h3>
						<div class="blog-list-left-post-wrapper">
							<?php
								while ($resulttc->have_posts()) : $resulttc->the_post();
									$IDr = get_the_ID();
									?>
								<div class="box-list-item">
									<span class="blog-image">
										<img src="<?php echo get_the_post_thumbnail_url($IDr); ?>" alt="Blog" />
									</span>
									<div class="d-flex">
										<span class="blog-date"><?php echo get_the_time('M d, Y', $IDr); ?></span>
									</div>
									<h4><?php echo get_the_title($IDr); ?></h4>
									<a href="<?= get_the_permalink($IDr); ?>">Read more <i class="fa fa-long-arrow-right"></i></a>
								</div>
							<?php
								endwhile;
								?>
						</div>
					<?php
					}

					?>


				</div>

				<div class="blog-list-right">
					<div class="search-wrapper">
						<form name="search" action="<?= BASE_URL ?>blog/" method="get">
							<div class="form-group">
								<input class="form-control" name="b" value="<?= $b; ?>" placeholder="Search here" />
								<i class="fa fa-search"></i>
								<button class="btn btn-primary">Search</button>
							</div>
						</form>
					</div>
					<div class="category-box">
						<h5>Categories</h5>
						<ul>
							<?php
							$args = array(
								'type'                     => 'post',
								'child_of'                 => 0,
								'parent'                   => '',
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => 1,
								'hierarchical'             => 1,
								'pad_counts'               => false
							);
							$teamcats = get_categories($args);
							$i = 1;
							foreach ($teamcats as $t_post) :
								if ($t_post->term_id == 1) {
									unset($t_post);
								} else if ($t_post->term_id == 2) {
									unset($t_post);
								} else if ($t_post->term_id == 3) {
									unset($t_post);
								} else {

									$args = array(
										'cat' => $t_post->term_id,
										'post_type' => 'post',
										'posts_per_page' => -1 // this will retrive all the post that is published 
									);
									$result = new WP_Query($args);
									$cc = $result->the_post();
									$category_link = get_category_link($t_post->term_id);
									?>
									<li>
										<i class="fa fa-angle-right"></i>
										<span><a class="newcatli" href="<?= $category_link; ?>"><?= $t_post->name; ?> (<?= $result->post_count; ?>)</a></span>
									</li>
							<?php
								}
								$i++;
							endforeach;
							?>
						</ul>
					</div>
					<div class="category-box article-box">
						<h5>Recent Articles</h5>
						<ul>
							<?php

							$args = array(
								'post_type' => 'post',
								'posts_per_page' => 4 // this will retrive all the post that is published 
							);
							$resultt = new WP_Query($args);
							$i = 1;
							while ($resultt->have_posts()) : $resultt->the_post();
								$ID = get_the_ID();
								?>
								<li>
									<a href="<?= get_the_permalink($ID); ?>">
										<?php echo get_the_title($ID); ?>
									</a>
								</li>
							<?php
								$i++;
							endwhile;
							?>
						</ul>
					</div>
					<div class="call-now">
						<span class="call-text">Call for an Emergency Service!</span>
						<span class="call-number"><?php echo esc_attr(get_option('phonenumber')); ?></span>
						<a href="tel:<?php echo esc_attr(get_option('phonenumber')); ?>" class="btn btn-call">Call Now</a>
					</div>
				</div>

			</div>
		</div>
</section>
<!-- end press and award tab-->
<!-- start free consultant section-->
<section class="free-consultant-wrapper">
	<div class="container">
		<div class="text-wrapper">
			<h2 class="white-color">Get your FREE CONSULTATION!</h2>
			<p class="white-color">Curious to know how your hair transplant would go? Connect with us today and let us help you understand each and everything with the help of a free consultation.  & let us give you complete details with the help of a free consultation.</p>
		</div>
		<a href="https://bluemagiclinic.com/software/form_step1" target="_blank" class="conultant-btn">
			<span>
				<i class="profile"><img src="<?php echo bloginfo('template_directory'); ?>/images/blu-bg.png" alt="Profie" /></i>
				<span class="text">Get free consultation</span>
				<i class="fa fa-chevron-right"></i>
			</span>
		</a>
	</div>
</section>
<!--end free consultant section-->
<?php
get_footer();
