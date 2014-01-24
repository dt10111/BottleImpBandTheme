<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tk
 */

get_header(); ?>
<header id="masthead" class="main-header" role="banner" <?php if (of_get_option('bipo_main_header_image')) : ?>style="background: url(<?php echo of_get_option('bipo_main_header_image', 'no entry'); ?>) no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"<?php endif ?>>
	<div class="container">
		<div class="row">
			<div class="site-header-inner col-sm-12">					
				<?php if (of_get_option('bipo_main_logo_image')) : ?>
					<h1>
						<a href="<?php echo home_url(); ?>"><img src="<?php echo of_get_option('bipo_main_logo_image', 'no entry'); ?>" class="home-logo" alt="<?php if (of_get_option('bipo_band_name')) : ?><?php echo of_get_option('bipo_band_name', 'no entry'); ?><?php endif ?>"></a>
					</h1>
				<?php endif ?>						
			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
<?php require get_template_directory() . '/includes/nav.php'; ?>
<div class="main-content">	
	<div class="container">
		
		<div class="row">
	<div class="content-padder">
		
		<?php if ( have_posts() ) : ?>
	
			<header class="page-header">
				<h1 class="page-title">
					<?php if (of_get_option('bipo_band_name')) : ?><?php echo of_get_option('bipo_band_name', 'no entry'); ?><?php endif ?> Videos
				</h1>
			</header><!-- .page-header -->

			<div class="row">
			<?php
				$wp_query = new WP_Query(array(
							'post_type' => 'video', 
							'posts_per_page' => 10,
							'cat' => $cat_id, 
							'post_status' => 'publish'));			
				if ( $wp_query->have_posts() ) {

				};
				$order = 0;
				?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					

					
						<div class="col-md-6 col-sm-4" style="padding-bottom: 15px;">
							
						<?php if (get_post_meta( get_the_ID(), 'bip_video_embed' )) {
							echo get_post_meta( get_the_ID(), 'bip_video_embed', true );
							}; 
							?>							
						</div>
						
				<?php endwhile; ?>	
			</div>
			

			
		<?php else : ?>
	
			<?php get_template_part( 'no-results', 'archive' ); ?>
	
		<?php endif; ?>
	
	</div><!-- .content-padder -->
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		<!-- close .row -->
	</div><!-- close .container -->
	</div>			

<?php get_footer(); ?>
