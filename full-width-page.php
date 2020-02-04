<?php
/**
 * Exit if accessed directly.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
 * Template Name:  Full Width Page (no sidebar)
 *
 * @file           full-width-page.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/full-width-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>
<?php responsive_wrapper_top(); // before wrapper content hook. ?>
<div id="wrapper" class="site-content clearfix">
	<div class="content-outer container">
		<div class="row">
			<?php responsive_in_wrapper(); // wrapper hook. ?>
			<div id="content-full" class="grid col-940">
			<?php get_template_part( 'loop-header', get_post_type() ); ?>

			<?php if ( have_posts() ) : ?>

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<?php responsive_entry_before(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php responsive_entry_top(); ?>

						<?php get_template_part( 'post-meta', get_post_type() ); ?>

						<div class="post-entry">
							<?php responsive_page_featured_image(); ?>
							<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
							<?php
							wp_link_pages(
								array(
									'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ),
									'after'  => '</div>',
								)
							);
							?>
						</div>
						<!-- end of .post-entry -->

						<?php get_template_part( 'post-data', get_post_type() ); ?>

						<?php responsive_entry_bottom(); ?>
					</div><!-- end of #post-<?php the_ID(); ?> -->
					<?php responsive_entry_after(); ?>

					<?php responsive_comments_before(); ?>
					<?php comments_template( '', true ); ?>
					<?php responsive_comments_after(); ?>

					<?php
				endwhile;

				get_template_part( 'loop-nav', get_post_type() );

				else :

					get_template_part( 'loop-no-posts', get_post_type() );

			endif;
				?>

		</div><!-- end of #content-full -->
		</div>
	</div>
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
</div> <!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook. ?>
<?php get_footer(); ?>
