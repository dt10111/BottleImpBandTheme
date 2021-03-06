<?php
/**
 * Template Name: Home Template
 *
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
<section class="description-content">
	<div class="container">
		<div class="row">
			<div class="music-content-inner col-md-12">	
			<?php if (of_get_option('bipo_band_description_short')) : ?>
				<h2><?php echo of_get_option('bipo_band_description_short', 'no entry'); ?></h2>
			<?php endif ?>				
			</div>
		</div>
	</div>
</section>
<section class="music-content">
	<div class="container">
		<div class="row">
			<div class="music-content-inner col-md-12">
				<h3>Music</h3>
				<?php
				$number_album = of_get_option('bipo_number_albums', 1);
				$wp_query = new WP_Query(array('post_type' => 'album', 'posts_per_page' => $number_album, 'cat' => $cat_id, 'post_status' => 'publish'));			
				if ( $wp_query->have_posts() );
				$order = 0;
				?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					
					<div class="row music-row">
					
						<div class="col-md-4 col-sm-4 post_thumbnail thumbeffect">
							<a href="<?php the_permalink(); ?>">
						<?php 
						$attachment_id = get_post_meta( get_the_ID(), 'bip_cover-image', true );
						echo wp_get_attachment_image( $attachment_id,'full' ); ?></a>
	
							<?php if (get_post_meta( get_the_ID(), 'bip_emeddedaudio-front' )) : ?>
								<?php echo get_post_meta( get_the_ID(), 'bip_emeddedaudio-front', true ); ?>
							<?php endif ?>									
						</div>
								
						<div class="col-md-8 col-sm-8">
							<div class="category_title">
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
							</div>
							<?php if (get_post_meta( get_the_ID(), 'bip_summary' )) : ?>
								<?php echo get_post_meta( get_the_ID(), 'bip_summary', true ); ?>
							<?php endif ?>	
							<?php if (get_post_meta( get_the_ID(), 'bip_tracklisting' )) : ?>					
								<?php echo get_post_meta( get_the_ID(), 'bip_tracklisting', true ); ?>
							<?php endif ?>		
							<div class="row musicStoreIcons">
							<?php if (get_post_meta( get_the_ID(), 'bip_itunes' )) : ?>
							<div class="col-md-3 col-xs-3 social-icons">
								<a rel="nofollow" target="itunes_store" href="<?php echo get_post_meta( get_the_ID(), 'bip_itunes', true ); ?>?at=10l4TT&ct=frontpage"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-itunes-dark.png" alt="iTunes"></a>
							</div>
							<?php endif ?>							
							<?php if (get_post_meta( get_the_ID(), 'bip_amazon' )) : ?>
							<div class="col-md-3 col-xs-3 social-icons">
								<a target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'bip_amazon', true ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-amazon-dark.png" alt="Amazon"></a>
							</div>
							<?php endif ?>							
							<?php if (get_post_meta( get_the_ID(), 'bip_spotify-disc' )) : ?>
							<div class="col-md-3 col-xs-3 social-icons">
								<a target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'bip_spotify-disc', true ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-spotify-dark.png" alt="Spotify"></a>
							</div>
							<?php endif ?>
							<?php if (get_post_meta( get_the_ID(), 'bip_bandcamp' )) : ?>
							<div class="col-md-3 col-xs-3 social-icons">
								<a target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'bip_bandcamp', true ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-bandcamp-dark.png" alt="Bandcamp"></a>
							</div>
							<?php endif ?>
							</div>
						</div>
						


					</div>
				<?php endwhile; ?>	
			</div>
		</div>
	</div>
</section>
<?php $videocheck = of_get_option('sections_multicheck');
	if ( $videocheck['one'] == '1' ) : ?>
<section class="video-content">
	<div class="container">
		<div class="row">
			<div class="video-content-inner col-md-12">
				<h3 style="font-family: 'Montserrat', sans-serif !important;">Video</h3>
				<?php
				$wp_query = new WP_Query(array('post_type' => 'video', 'posts_per_page' => 1, 'cat' => $cat_id, 'post_status' => 'publish'));			
				if ( $wp_query->have_posts() );
				$order = 0;
				?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					
					<div class="row">
						<div class="col-md-12">
						<?php if (get_post_meta( get_the_ID(), 'bip_video_url' )) : ?>
						<iframe src="//player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'bip_vimeo_number', true ); ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						<?php endif ?>															
						</div>
					</div>
				<?php endwhile; ?>	
			</div>
		</div>
	</div>
</section>
<?php endif ?>	
<?php $reviewcheck = of_get_option('sections_multicheck');
	if ( $reviewcheck['two'] == '1' ) : ?>
<section class="review-content">
	<div class="container">
		<div class="row">
			<div class="review-content-inner col-md-12">
			<h3>Reviews</h3>
			<div class="quotes">
			  <ul>
				<?php
				$wp_query = new WP_Query(array('post_type' => 'review', 'posts_per_page' => 4, 'cat' => $cat_id, 'post_status' => 'publish'));			
				if ( $wp_query->have_posts() );
				$order = 0;
				?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<li>
						<blockquote>
							<p>"<?php if (get_post_meta( get_the_ID(), 'bip_review_quote' )) : ?><a href="<?php the_permalink(); ?>"><?php echo get_post_meta( get_the_ID(), 'bip_review_quote', true ); ?></a><?php endif ?>"</p>
							<div class="quote-author"><p>— <?php if (get_post_meta( get_the_ID(), 'bip_review_author' )) : ?><?php echo get_post_meta( get_the_ID(), 'bip_review_author', true ); ?> from <?php endif ?><?php if (get_post_meta( get_the_ID(), 'bip_review_publication' )) : ?><?php echo get_post_meta( get_the_ID(), 'bip_review_publication', true ); ?><?php endif ?></p></div>
						</blockquote>
					</li>				

				<?php endwhile; ?>				  
			  
			  </ul>
			</div><!-- .quotes -->			
			</div>
		</div>
	</div>
</section>
<?php endif ?>	
<?php $tourcheck = of_get_option('sections_multicheck');
	if ( $tourcheck['three'] == '1' ) : ?>
<section class="tour-content">
	<div class="container">
		<div class="row">
			<div class="tour-content-inner col-md-12">
			<h3>Tour</h3>
				<a href="http://www.songkick.com/artists/409329" class="songkick-widget" data-theme="light">Tour dates</a>

			</div>
		</div>
	</div>
</section>
<?php endif ?>	
<div class="main-content">	
	<div class="container">
		<div class="row">
			<div class="main-content-inner col-md-12">

			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->





<?php get_footer(); ?>