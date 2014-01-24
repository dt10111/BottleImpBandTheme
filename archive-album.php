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
					<?php if (of_get_option('bipo_band_name')) : ?><?php echo of_get_option('bipo_band_name', 'no entry'); ?><?php endif ?> Discography
				</h1>
			</header><!-- .page-header -->

			<div class="row discogDivision">
			<?php
				$wp_query = new WP_Query(array(
							'post_type' => 'album', 
							'posts_per_page' => 30,
							'meta_key' => 'bip_album_type',
							'meta_value' => 'lp', 
							'cat' => $cat_id, 
							'post_status' => 'publish'));			
				if ( $wp_query->have_posts() ) {
				echo '<h3 style="margin-right: 15px; margin-left: 15px;">LPs</h3>';
				};
				$order = 0;
				?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					

					
						<div class="col-md-3 col-sm-4 col-xs-6 post_thumbnail thumbeffect" style="padding-bottom: 15px;">
							<a href="<?php the_permalink(); ?>">
						<?php 
						$attachment_id = get_post_meta( get_the_ID(), 'bip_cover-image', true );
						echo wp_get_attachment_image( $attachment_id,'full' ); ?></a>								
						</div>
						
				<?php endwhile; ?>	
			</div>
			
			<div class="row discogDivision">
			<?php
				$wp_query = new WP_Query(array(
							'post_type' => 'album', 
							'posts_per_page' => 30,
							'meta_key' => 'bip_album_type',
							'meta_value' => 'ep', 
							'cat' => $cat_id, 
							'post_status' => 'publish'));			
				if ( $wp_query->have_posts() ) {
				echo '<h3 style="margin-right: 15px; margin-left: 15px;">EPs</h3>';
				};
				$order = 0;
				?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					

					
						<div class="col-md-2 col-sm-4 col-xs-6 post_thumbnail thumbeffect" style="padding-bottom: 15px;">
							<a href="<?php the_permalink(); ?>">
						<?php 
						$attachment_id = get_post_meta( get_the_ID(), 'bip_cover-image', true );
						echo wp_get_attachment_image( $attachment_id,'full' ); ?></a>								
						</div>
						
				<?php endwhile; ?>	
			</div>
			
			<div class="row discogDivision">
			<?php
				$wp_query = new WP_Query(array(
							'post_type' => 'album', 
							'posts_per_page' => 30,
							'meta_key' => 'bip_album_type',
							'meta_value' => 'appear', 
							'cat' => $cat_id, 
							'post_status' => 'publish'));			
				if ( $wp_query->have_posts() ) {
				echo '<h3 style="margin-right: 15px; margin-left: 15px;">Appearances / Remixes / Collaborations</h3>';
				};
				$order = 0;
				?>
				
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					

					
						<div class="col-md-2 col-sm-4 col-xs-6 post_thumbnail thumbeffect" style="padding-bottom: 15px;">
							<a href="<?php the_permalink(); ?>">
						<?php 
						$attachment_id = get_post_meta( get_the_ID(), 'bip_cover-image', true );
						echo wp_get_attachment_image( $attachment_id,'full' ); ?></a>								
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
