<?php
/**
 * The Template for displaying all single posts.

 */

get_header(); ?>
<header id="masthead" class="main-header" role="banner" <?php if (of_get_option('bipo_main_header_image')) : ?>style="background: url(<?php echo of_get_option('bipo_main_header_image', 'no entry'); ?>) no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"<?php endif ?>>
	<div class="container">
		<div class="row">
			<div class="site-header-inner col-sm-12">					
				<?php if (of_get_option('bipo_main_logo_image')) : ?>
					<h1>
						<a href="<?php echo home_url(); ?>"><img src="<?php echo of_get_option('bipo_main_logo_image', 'no entry'); ?>" class="single-logo" alt="<?php if (of_get_option('bipo_band_name')) : ?><?php echo of_get_option('bipo_band_name', 'no entry'); ?><?php endif ?>"></a>
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
			<div class="main-content-inner col-md-12">
			<div class="single-wrap">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
					<!-- #masthead -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin: 0 15px;">
					
					<div class="row">
							<div class="category_title innerPadding">
								<h2><?php the_title(); ?></h2>
							</div>					


						


					</div>

						<div class="entry-content">
							<?php the_content(); ?>
							<div class="row">
							<?php if (get_post_meta( get_the_ID(), 'bip_photo' )) {
										$playlists = get_post_meta( $post->ID, 'bip_photo'); 
										foreach( $playlists as $playlist){
											echo '<div class="col-md-3 col-sm-4 col-xs-6 galleryPhoto"><a href="' . wp_get_attachment_url( $playlist['bip_photo_image'],'full' ) .  '" class="expandImg" title="' . $playlist['bip_photo_title'] . '">' . wp_get_attachment_image( $playlist['bip_photo_image'],'photo-gallery' ) .  '</a></div>';
											}
										}
										?>
							</div>			
								
													

						</div><!-- .entry-content -->

						<?php edit_post_link( __( 'Edit', '_tk' ), '<span class="edit-link">', '</span>' ); ?>
					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
			</div>
		</div><!-- close .row -->

	</div><!-- close .container -->

</div><!-- close .main-content -->
<?php get_footer(); ?>