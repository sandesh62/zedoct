<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
			<li class="active">Blog</li>
		</ul>
	</div>
</section>
<!-- end breadcrumbs-->
<!-- start press and award tab-->
<section class="our-exp-wrapper media-award-wrapper">
	<div class="our-exp-top-container">
		<div class="container">
			<div class="text-panel w-100">
				<h2>
					<span class="blue display-inline">BlueMagic </span>
					<span class="black display-inline">News</span>
				</h2>
			</div>
			<div class="blog-list-inner-wrapper">
				<div class="blog-list-left">
					<div class="blog-list-left-post-wrapper">
						<?php
						if (isset($_GET)) {
							$b = $_GET['b'];
						} else {
							$b = '';
						}
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array(
							'post_type' => 'post',
							's' => $b,
							'paged' => $paged,
							'posts_per_page' => 4 // this will retrive all the post that is published 
						);
						$resultt = new WP_Query($args);

						$i = 1;
						if ($resultt->have_posts()) {
							while ($resultt->have_posts()) : $resultt->the_post();
								$ID = get_the_ID();
								?>
								<div class="box-list-item">
									<span class="blog-image">
										<img src="<?php echo get_the_post_thumbnail_url($ID); ?>" alt="Blog" />
									</span>
									<div class="d-flex">
										<span class="blog-date"><?php echo get_the_time('M d, Y', $ID); ?></span>
										<span class="blog-category"><?= get_the_category($ID)[0]->name; ?></span>
									</div>
									<h4><?php echo get_the_title($ID); ?></h4>
									<a href="<?= get_the_permalink($ID); ?>">Read more <i class="fa fa-long-arrow-right"></i></a>
								</div>
							<?php
									$i++;
								endwhile;
							} else {
								?>
							<p class="text-center">No blog found.</p>
						<?php
						}

						wp_reset_postdata();
						?>
					</div>
					<?php
					if (function_exists("pagination")) {
						pagination($resultt->max_num_pages);
					}
					?>
				</div>
				<div class="blog-list-right">
					<div class="search-wrapper">
						<form name="search" method="get">
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
