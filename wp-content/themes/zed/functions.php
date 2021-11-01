<?php

/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://developer.wordpress.org/plugins/
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if (!isset($content_width)) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if (version_compare($GLOBALS['wp_version'], '3.6', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twentyfourteen_setup')) :
	/**
	 * Twenty Fourteen setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 * @since Twenty Fourteen 1.0
	 */
	function twentyfourteen_setup()
	{

		/*
		 * Make Twenty Fourteen available for translation.
		 *
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfourteen
		 * If you're building a theme based on Twenty Fourteen, use a find and
		 * replace to change 'twentyfourteen' to the name of your theme in all
		 * template files.
		 */
		load_theme_textdomain('twentyfourteen');

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style(array('css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css'));

		// Load regular editor styles into the new block-based editor.
		add_theme_support('editor-styles');

		// Load default block styles.
		add_theme_support('wp-block-styles');

		// Add support for responsive embeds.
		add_theme_support('responsive-embeds');

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __('Green', 'twentyfourteen'),
					'slug'  => 'green',
					'color' => '#24890d',
				),
				array(
					'name'  => __('Black', 'twentyfourteen'),
					'slug'  => 'black',
					'color' => '#000',
				),
				array(
					'name'  => __('Dark Gray', 'twentyfourteen'),
					'slug'  => 'dark-gray',
					'color' => '#2b2b2b',
				),
				array(
					'name'  => __('Medium Gray', 'twentyfourteen'),
					'slug'  => 'medium-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __('Light Gray', 'twentyfourteen'),
					'slug'  => 'light-gray',
					'color' => '#f5f5f5',
				),
				array(
					'name'  => __('White', 'twentyfourteen'),
					'slug'  => 'white',
					'color' => '#fff',
				),
			)
		);

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support('automatic-feed-links');

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(672, 372, true);
		add_image_size('twentyfourteen-full-width', 1038, 576, true);

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary'   => __('Top primary menu', 'twentyfourteen'),
				'secondary' => __('Secondary menu in left sidebar', 'twentyfourteen'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See https://wordpress.org/support/article/post-formats/
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'audio',
				'quote',
				'link',
				'gallery',
			)
		);

		// This theme allows users to set a custom background.
		add_theme_support(
			'custom-background',
			/**
			 * Filters Twenty Fourteen custom-background support arguments.
			 *
			 * @since Twenty Fourteen 1.0
			 *
			 * @param array $args {
			 *     An array of custom-background support arguments.
			 *
			 *     @type string $default-color Default color of the background.
			 * }
			 */
			apply_filters(
				'twentyfourteen_custom_background_args',
				array(
					'default-color' => 'f5f5f5',
				)
			)
		);

		// Add support for featured content.
		add_theme_support(
			'featured-content',
			array(
				'featured_content_filter' => 'twentyfourteen_get_featured_posts',
				'max_posts'               => 6,
			)
		);

		// This theme uses its own gallery styles.
		add_filter('use_default_gallery_style', '__return_false');

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support('customize-selective-refresh-widgets');
	}
endif; // twentyfourteen_setup()
add_action('after_setup_theme', 'twentyfourteen_setup');

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_content_width()
{
	if (is_attachment() && wp_attachment_is_image()) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action('template_redirect', 'twentyfourteen_content_width');

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts()
{
	/**
	 * Filters the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters('twentyfourteen_get_featured_posts', array());
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts()
{
	return !is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_widgets_init()
{
	require get_template_directory() . '/inc/widgets.php';
	register_widget('Twenty_Fourteen_Ephemera_Widget');

	register_sidebar(
		array(
			'name'          => __('Primary Sidebar', 'twentyfourteen'),
			'id'            => 'sidebar-1',
			'description'   => __('Main sidebar that appears on the left.', 'twentyfourteen'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	register_sidebar(
		array(
			'name'          => __('Content Sidebar', 'twentyfourteen'),
			'id'            => 'sidebar-2',
			'description'   => __('Additional sidebar that appears on the right.', 'twentyfourteen'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	register_sidebar(
		array(
			'name'          => __('Footer Widget Area', 'twentyfourteen'),
			'id'            => 'sidebar-3',
			'description'   => __('Appears in the footer section of the site.', 'twentyfourteen'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
}
add_action('widgets_init', 'twentyfourteen_widgets_init');

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url()
{
	$font_url = '';
	/*
	 * translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ('off' !== _x('on', 'Lato font: on or off', 'twentyfourteen')) {
		$query_args = array(
			'family'  => urlencode('Lato:300,400,700,900,300italic,400italic,700italic'),
			'subset'  => urlencode('latin,latin-ext'),
			'display' => urlencode('fallback'),
		);
		$font_url   = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_scripts()
{
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style('twentyfourteen-lato', twentyfourteen_font_url(), array(), null);

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3');

	// Load our main stylesheet.
	wp_enqueue_style('twentyfourteen-style', get_stylesheet_uri(), array(), '20190507');

	// Theme block stylesheet.
	wp_enqueue_style('twentyfourteen-block-style', get_template_directory_uri() . '/css/blocks.css', array('twentyfourteen-style'), '20190102');

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array('twentyfourteen-style'), '20140701');
	wp_style_add_data('twentyfourteen-ie', 'conditional', 'lt IE 9');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (is_singular() && wp_attachment_is_image()) {
		wp_enqueue_script('twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20150120');
	}

	if (is_active_sidebar('sidebar-3')) {
		wp_enqueue_script('jquery-masonry');
	}

	if (is_front_page() && 'slider' === get_theme_mod('featured_content_layout')) {
		wp_enqueue_script('twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), '20150120', true);
		wp_localize_script(
			'twentyfourteen-slider',
			'featuredSliderDefaults',
			array(
				'prevText' => __('Previous', 'twentyfourteen'),
				'nextText' => __('Next', 'twentyfourteen'),
			)
		);
	}

	wp_enqueue_script('twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20171218', true);
}
add_action('wp_enqueue_scripts', 'twentyfourteen_scripts');

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_admin_fonts()
{
	wp_enqueue_style('twentyfourteen-lato', twentyfourteen_font_url(), array(), null);
}
add_action('admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts');

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fourteen 1.9
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function twentyfourteen_resource_hints($urls, $relation_type)
{
	if (wp_style_is('twentyfourteen-lato', 'queue') && 'preconnect' === $relation_type) {
		if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '>=')) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter('wp_resource_hints', 'twentyfourteen_resource_hints', 10, 2);

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Twenty Fourteen 2.3
 */
function twentyfourteen_block_editor_styles()
{
	// Block styles.
	wp_enqueue_style('twentyfourteen-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20190102');
	// Add custom fonts.
	wp_enqueue_style('twentyfourteen-fonts', twentyfourteen_font_url(), array(), null);
}
add_action('enqueue_block_editor_assets', 'twentyfourteen_block_editor_styles');

if (!function_exists('twentyfourteen_the_attached_image')) :
	/**
	 * Print the attached image with a link to the next attached image.
	 *
	 * @since Twenty Fourteen 1.0
	 */
	function twentyfourteen_the_attached_image()
	{
		$post = get_post();
		/**
		 * Filters the default Twenty Fourteen attachment size.
		 *
		 * @since Twenty Fourteen 1.0
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 *     @type int $height Height of the image in pixels. Default 810.
		 *     @type int $width  Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters('twentyfourteen_attachment_size', array(810, 810));
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts(
			array(
				'post_parent'    => $post->post_parent,
				'fields'         => 'ids',
				'numberposts'    => -1,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'menu_order ID',
			)
		);

		// If there is more than 1 attachment in a gallery...
		if (count($attachment_ids) > 1) {
			foreach ($attachment_ids as $idx => $attachment_id) {
				if ($attachment_id == $post->ID) {
					$next_id = $attachment_ids[($idx + 1) % count($attachment_ids)];
					break;
				}
			}

			if ($next_id) {
				// ...get the URL of the next image attachment.
				$next_attachment_url = get_attachment_link($next_id);
			} else {
				// ...or get the URL of the first image attachment.
				$next_attachment_url = get_attachment_link(reset($attachment_ids));
			}
		}

		printf(
			'<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url($next_attachment_url),
			wp_get_attachment_image($post->ID, $attachment_size)
		);
	}
endif;

if (!function_exists('twentyfourteen_list_authors')) :
	/**
	 * Print a list of all site contributors who published at least one post.
	 *
	 * @since Twenty Fourteen 1.0
	 */
	function twentyfourteen_list_authors()
	{
		$contributor_ids = get_users(
			array(
				'fields'  => 'ID',
				'orderby' => 'post_count',
				'order'   => 'DESC',
				'who'     => 'authors',
			)
		);

		foreach ($contributor_ids as $contributor_id) :
			$post_count = count_user_posts($contributor_id);

			// Move on if user has not published a post (yet).
			if (!$post_count) {
				continue;
			}
			?>

			<div class="contributor">
				<div class="contributor-info">
					<div class="contributor-avatar"><?php echo get_avatar($contributor_id, 132); ?></div>
					<div class="contributor-summary">
						<h2 class="contributor-name"><?php echo get_the_author_meta('display_name', $contributor_id); ?></h2>
						<p class="contributor-bio">
							<?php echo get_the_author_meta('description', $contributor_id); ?>
						</p>
						<a class="button contributor-posts-link" href="<?php echo esc_url(get_author_posts_url($contributor_id)); ?>">
							<?php
										/* translators: %d: Post count. */
										printf(_n('%d Article', '%d Articles', $post_count, 'twentyfourteen'), $post_count);
										?>
						</a>
					</div><!-- .contributor-summary -->
				</div><!-- .contributor-info -->
			</div><!-- .contributor -->

<?php
		endforeach;
	}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes($classes)
{
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	if (get_header_image()) {
		$classes[] = 'header-image';
	} elseif (!in_array($GLOBALS['pagenow'], array('wp-activate.php', 'wp-signup.php'), true)) {
		$classes[] = 'masthead-fixed';
	}

	if (is_archive() || is_search() || is_home()) {
		$classes[] = 'list-view';
	}

	if ((!is_active_sidebar('sidebar-2'))
		|| is_page_template('page-templates/full-width.php')
		|| is_page_template('page-templates/contributors.php')
		|| is_attachment()
	) {
		$classes[] = 'full-width';
	}

	if (is_active_sidebar('sidebar-3')) {
		$classes[] = 'footer-widgets';
	}

	if (is_singular() && !is_front_page()) {
		$classes[] = 'singular';
	}

	if (is_front_page() && 'slider' === get_theme_mod('featured_content_layout')) {
		$classes[] = 'slider';
	} elseif (is_front_page()) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter('body_class', 'twentyfourteen_body_classes');

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes($classes)
{
	if (!post_password_required() && !is_attachment() && has_post_thumbnail()) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter('post_class', 'twentyfourteen_post_classes');

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title($title, $sep)
{
	global $paged, $page;

	if (is_feed()) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo('name', 'display');

	// Add the site description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if (($paged >= 2 || $page >= 2) && !is_404()) {
		/* translators: %s: Page number. */
		$title = "$title $sep " . sprintf(__('Page %s', 'twentyfourteen'), max($paged, $page));
	}

	return $title;
}
add_filter('wp_title', 'twentyfourteen_wp_title', 10, 2);


/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Fourteen 2.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyfourteen_widget_tag_cloud_args($args)
{
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter('widget_tag_cloud_args', 'twentyfourteen_widget_tag_cloud_args');


// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if (!class_exists('Featured_Content') && 'plugins.php' !== $GLOBALS['pagenow']) {
	require get_template_directory() . '/inc/featured-content.php';
}

/**
 * Add an `is_customize_preview` function if it is missing.
 *
 * Enables installing Twenty Fourteen in WordPress versions before 4.0.0 when the
 * `is_customize_preview` function was introduced.
 */
if (!function_exists('is_customize_preview')) :
	function is_customize_preview()
	{
		global $wp_customize;

		return ($wp_customize instanceof WP_Customize_Manager) && $wp_customize->is_preview();
	}
endif;



// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu()
{
    //create new top-level menu
    add_menu_page('Manage Campaigns', 'Manage Campaigns', 'manage_options', 'manage-campaigns', 'my_cool_plugin_settings_page', 'dashicons-schedule', 5);
}

function my_cool_plugin_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Manage Campaigns</h1>

        <?php
            global $wpdb;

            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 10;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $resultscount = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE (admin_approved = 0 OR admin_approved = 2)", OBJECT);

            $total_rows = count($resultscount);
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE (admin_approved = 0 OR admin_approved = 2) ORDER BY id desc LIMIT $offset, $no_of_records_per_page", OBJECT);
            ?>
        <table class="form-table" border="1">
            <tr valign="top">
                <td><b>Image</b></td>
                <td><b>Title</b></td>
                <td><b>User Details</b></td>
                <td><b>Goal Amount</b></td>
                <td><b>Detail</b></td>
                <td><b>Action</b></td>
            </tr>
            <?php
                if ($results) {
                    foreach ($results as $res) {
                        $shareurl = BASE_URL . 'campaign-detail-admin/?id=' . $res->id;
                        if ($res->campaign_typeId == 2) {
                            $fundtitle = $res->item_name;
                        } else if ($res->campaign_typeId == 3) {
                            $fundtitle = $res->product_name;
                        } else {
                            $fundtitle = $res->fundraiser_title;
                        }

                        if ($res->campaign_typeId == 2) {
                            $goal_amount = $res->item_qty;
                            $currency = 'QTY';
                        } else if ($res->campaign_typeId == 3) {
                            $goal_amount = $res->product_price * $res->product_qty;
                            $currency = $res->currency;
                        } else {
                            $goal_amount = $res->goal_amount;
                            $currency = $res->currency;
                        }

                        $userId = $res->userId;
                        $resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
                        $all_meta_for_user = get_user_meta($resultsusers[0]->ID);

                        if ($res->image) {
                            $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
                        } else {
                            $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
                            $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                        }

                        ?>
                    <tr valign="top">
                        <td><img width="100" height="100" src="<?php echo $iimage; ?>" /></td>
                        <td><?php echo $fundtitle; ?></td>
                        <td>
                            <span><b>Name: </b><?= $resultsusers[0]->display_name; ?></span><br />
                            <span><b>Email: </b><?= $resultsusers[0]->user_email; ?></span><br />
                            <span><b>Phone Number: </b><?= $all_meta_for_user['billing_phone'][0]; ?></span>
                        </td>
                        <td><?php echo $currency; ?> <?php echo $goal_amount; ?></td>
                        <td><a href="<?php echo $shareurl; ?>" target="_blank">View</a></td>
                        <?php
                                    if ($res->admin_approved == 2) {
                                        ?>
                            <td>
                                -
                            </td>
                        <?php
                                    } else {
                                        ?>
                            <td>
                                <div id="acceptdivmain<?php echo $res->id; ?>">
                                    <button type="button" class="btn btn-success align-middle" onclick="acceptcamp('<?php echo $res->id; ?>');">Accept</button>
                                    <button type="button" class="btn btn-success align-middle" onclick="verifiedcamp('<?php echo $res->id; ?>');">ZED Verified</button>
                                    <button type="button" class="btn btn-success align-middle" onclick="rejectcamp('<?php echo $res->id; ?>');">Decline</button>
                                </div>

                                <div style="display:none" id="loadingdiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">Loading..</button>
                                </div>

                                <div style="display:none" id="acceptdiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">Accepted</button>
                                </div>

                                <div style="display:none" id="verifieddiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">ZED Verified</button>
                                </div>

                                <div style="display:none" id="declinediv<?php echo $res->id; ?>">
                                    <button type="button" class="btn btn-danger align-middle">Declined</button>
                                </div>

                            </td>
                        <?php
                                    }
                                    ?>
                    </tr>
                <?php }
                    } else {
                        ?>
                <tr valign="top">
                    <td colspan="6"><b>No record found.</b></td>
                </tr>
            <?php
                }
                ?>
        </table>

        <?php
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $pagLink = "<br/><ul class='pagination'>";
            if ($total_pages > 1) {
                for ($i = 1; $i <= $total_pages; $i++) {
                    $pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: white;margin-left: 10px;padding: 15px;background-color: #999;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
                }
            }

            echo $pagLink . "</ul>";
            ?>

        <script>
            function acceptcamp(id) {
                // showLoadingBar();
                jQuery('#loadingdiv' + id).css('display', '');
                jQuery('#acceptdivmain' + id).css('display', 'none');
                jQuery.ajax({
                    url: '<?php echo BASE_URL . 'acceptcamp.php' ?>',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery('#acceptdiv' + id).css('display', '');
                        jQuery('#declinediv' + id).css('display', 'none');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    },
                    error: function(jqXHR, exception) {
                        jQuery('#acceptdiv' + id).css('display', '');
                        jQuery('#declinediv' + id).css('display', 'none');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    }

                });
            }

            function verifiedcamp(id) {
                // showLoadingBar();
                jQuery('#loadingdiv' + id).css('display', '');
                jQuery('#acceptdivmain' + id).css('display', 'none');
                jQuery.ajax({
                    url: '<?php echo BASE_URL . 'verifiedcamp.php' ?>',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery('#verifieddiv' + id).css('display', '');
                        jQuery('#declinediv' + id).css('display', 'none');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    },
                    error: function(jqXHR, exception) {
                        jQuery('#verifieddiv' + id).css('display', '');
                        jQuery('#declinediv' + id).css('display', 'none');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    }

                });
            }

            function rejectcamp(id) {
                // showLoadingBar();
                jQuery('#loadingdiv' + id).css('display', '');
                jQuery('#acceptdivmain' + id).css('display', 'none');
                jQuery.ajax({
                    url: '<?php echo BASE_URL . 'rejectcamp.php' ?>',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery('#acceptdiv' + id).css('display', 'none');
                        jQuery('#declinediv' + id).css('display', '');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    },
                    error: function(jqXHR, exception) {
                        jQuery('#acceptdiv' + id).css('display', 'none');
                        jQuery('#declinediv' + id).css('display', '');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    }

                });
            }
        </script>
    </div>
<?php }


// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu2');

function my_cool_plugin_create_menu2()
{
    //create new top-level menu
    add_menu_page('Approved Campaigns', 'Approved Campaigns', 'manage_options', 'admin-analytics', 'my_cool_plugin_settings_page2', 'dashicons-schedule', '5');
}

function my_cool_plugin_settings_page2()
{
    ?>
    <div class="wrap">
        <h1>Approved Campaigns</h1>

        <?php
            global $wpdb;

            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 10;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $resultscount = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", OBJECT);

            $total_rows = count($resultscount);
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 ORDER BY id desc LIMIT $offset, $no_of_records_per_page", OBJECT);
            
			$resultsedit = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaignsedit WHERE update_status = 0 ORDER BY id desc LIMIT $offset, $no_of_records_per_page", OBJECT);

			
			?>
        <table class="form-table" border="1">
            <tr valign="top">
                <td><b>Image</b></td>
                <td><b>Title</b></td>
                <td><b>User Details</b></td>
                <td><b>Goal Amount</b></td>
                <td><b>Achieve Amount</b></td>
                <td><b>Detail</b></td>
				<td><b>Update</b></td>
                <td><b>Action</b></td>
            </tr>

			<?php
                if ($resultsedit) {
                    foreach ($resultsedit as $res1) {
                        $shareurlold = BASE_URL . 'campaign-detail/?id=' . $res1->campaignedit_id;
                        $shareurl = BASE_URL . 'update-details-admin/?id=' . $res1->campaignedit_id;
                        
                        if ($res1->campaign_typeId == 2) {
                            $fundtitle = $res1->item_name;
                        } else if ($res1->campaign_typeId == 3) {
                            $fundtitle = $res1->product_name;
                        } else {
                            $fundtitle = $res1->fundraiser_title;
                        }

                        if ($res1->campaign_typeId == 2) {
                            $goal_amount = $res1->item_qty;
                            $currency = 'QTY';
                        } else if ($res1->campaign_typeId == 3) {
                            $goal_amount = $res1->product_price * $res1->product_qty;
                            $currency = $res1->currency;
                        } else {
                            $goal_amount = $res1->goal_amount;
                            $currency = $res1->currency;
                        }

                        $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res1->id . ")", ARRAY_A);
                        $achieve_amount = 0;
                        foreach ($resultsdonacc as $tt) {
                            if ($tt['campaign_typeId'] == 3) {
                                $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res1->product_price ? $res1->product_price : 0) : 0;
                            } else {
                                $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                            }
                            $achieve_amount += $achieve_amountn;
                        }

                        $userId = $res1->userId;
                        $resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
                        $all_meta_for_user = get_user_meta($resultsusers[0]->ID);

                        if ($res1->image) {
                            $iimage = BASE_URL . 'fundraiserimg/' . $res1->image;
                        } else {
                            $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res1->video);
                            $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                        }

                        ?>
                    <tr valign="top">
                        <td><img width="100" height="100" src="<?php echo $iimage; ?>" /></td>
                        <td><?php echo $fundtitle; ?></td>
                        <td>
                            <span><b>Name: </b><?= $resultsusers[0]->display_name; ?></span><br />
                            <span><b>Email: </b><?= $resultsusers[0]->user_email; ?></span><br />
                            <span><b>Phone Number: </b><?= $all_meta_for_user['billing_phone'][0]; ?></span>
                        </td>
                        <td><?php echo $currency; ?> <?php echo $goal_amount; ?></td>
                        <td><?php echo $currency; ?> <?= $achieve_amount; ?></td>
                        <td><a href="<?php echo $shareurlold; ?>" target="_blank">View</a></td>
						<td>
							<div style="padding: 3px;"><a href="<?php echo $shareurl; ?>" target="_blank">View Request</a></div>
						</td>
                        
                            <td>
                            <div style="padding: 3px;">
                            <button type="button" class="btn btn-success align-middle" onclick="approveUpdateReq('<?php echo $res1->id; ?>');">Approve</button>
                            </div>
							<div style="padding: 3px;">
                            <button type="button" class="btn btn-success align-middle" onclick="rejectUpdateReq('<?php echo $res1->id; ?>');">Reject</button>
                             </div>

                            </td>
                        

                    </tr>
                <?php }
                    } else {
                        ?>
                <tr valign="top">
                    <td colspan="7"><b>No new update record.</b></td>
                </tr>
            <?php
                } ?>

<script>
    function approveUpdateReq(id){
      jQuery.ajax({
          type: "POST",
          url: '../approveUpdateReq.php',
          data: {
                    id: id
                 },
          success: function(response)
          {
            
                  window.location.reload(true);
              
          }
      });
    }
    function rejectUpdateReq(id){
      jQuery.ajax({
          type: "POST",
          url: '../rejectUpdateReq.php',
          data: {
                    id: id
                 },
          success: function(response)
          {
            
                  window.location.reload(true);
              
          }
      });
    }
</script>











            <?php
                if ($results) {
                    foreach ($results as $res) {
                        $shareurl = BASE_URL . 'campaign-detail/?id=' . $res->id;
                        if ($res->campaign_typeId == 2) {
                            $fundtitle = $res->item_name;
                        } else if ($res->campaign_typeId == 3) {
                            $fundtitle = $res->product_name;
                        } else {
                            $fundtitle = $res->fundraiser_title;
                        }

                        if ($res->campaign_typeId == 2) {
                            $goal_amount = $res->item_qty;
                            $currency = 'QTY';
                        } else if ($res->campaign_typeId == 3) {
                            $goal_amount = $res->product_price * $res->product_qty;
                            $currency = $res->currency;
                        } else {
                            $goal_amount = $res->goal_amount;
                            $currency = $res->currency;
                        }

                        $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res->id . ")", ARRAY_A);
                        $achieve_amount = 0;
                        foreach ($resultsdonacc as $tt) {
                            if ($tt['campaign_typeId'] == 3) {
                                $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res->product_price ? $res->product_price : 0) : 0;
                            } else {
                                $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                            }
                            $achieve_amount += $achieve_amountn;
                        }

                        $userId = $res->userId;
                        $resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
                        $all_meta_for_user = get_user_meta($resultsusers[0]->ID);

                        if ($res->image) {
                            $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
                        } else {
                            $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
                            $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                        }

                        ?>
                    <tr valign="top">
                        <td><img width="100" height="100" src="<?php echo $iimage; ?>" /></td>
                        <td><?php echo $fundtitle; ?></td>
                        <td>
                            <span><b>Name: </b><?= $resultsusers[0]->display_name; ?></span><br />
                            <span><b>Email: </b><?= $resultsusers[0]->user_email; ?></span><br />
                            <span><b>Phone Number: </b><?= $all_meta_for_user['billing_phone'][0]; ?></span>
                        </td>
                        <td><?php echo $currency; ?> <?php echo $goal_amount; ?></td>
                        <td><?php echo $currency; ?> <?= $achieve_amount; ?></td>
                        <td><a href="<?php echo $shareurl; ?>" target="_blank">View</a></td>
						<td><a href="<?php echo $shareurl; ?>" target="_blank">update</a></td>
                        <?php
                                    if ($res->zed_verified) {
                                        ?>
                            <td>
                                <div>
                                    <b>ZED Verified</b>
                                </div>
                            </td>
                        <?php
                                    } else {
                                        ?>
                            <td>
                                <div id="acceptdivmain<?php echo $res->id; ?>">

                                    <button type="button" class="btn btn-success align-middle" onclick="verifiedcamp('<?php echo $res->id; ?>');">ZED Verified</button>

                                </div>

                                <div style="display:none" id="loadingdiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">Loading..</button>
                                </div>

                                <div style="display:none" id="verifieddiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">ZED Verified</button>
                                </div>

                            </td>
                        <?php
                                    }
                                    ?>

                    </tr>
                <?php }
                    } else {
                        ?>
                <tr valign="top">
                    <td colspan="7"><b>No record found.</b></td>
                </tr>
            <?php
                } ?>
        </table>
        <?php
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $pagLink = "<br/><ul class='pagination'>";
            if ($total_pages > 1) {
                for ($i = 1; $i <= $total_pages; $i++) {
                    $pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: white;margin-left: 10px;padding: 15px;background-color: #999;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
                }
            }

            echo $pagLink . "</ul>";
            ?>
        <script>
            function verifiedcamp(id) {
                // showLoadingBar();
                jQuery('#loadingdiv' + id).css('display', '');
                jQuery('#acceptdivmain' + id).css('display', 'none');
                jQuery.ajax({
                    url: '<?php echo BASE_URL . 'verifiedcamp.php' ?>',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery('#verifieddiv' + id).css('display', '');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    },
                    error: function(jqXHR, exception) {
                        jQuery('#verifieddiv' + id).css('display', '');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    }

                });
            }
        </script>
    </div>
<?php }

/* add_action( 'wp', 'sc_capture_before_login_page_url' );
function sc_capture_before_login_page_url(){
    if( !is_user_logged_in() ):
    $prev_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $_SESSION['referer_url'] = $prev_url;
    endif;
} */

function aasort($array, $key) 
{
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=array_values($ret);
    return $array;
}