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
						<a href="<?php echo home_url(); ?>"><img src="<?php echo of_get_option('bipo_main_logo_image', 'no entry'); ?>" class="single-logo" alt="<?php if (of_get_option('bipo_band_name')) : ?><?php echo of_get_option('bipo_band_name', 'no entry'); ?><?php endif ?>"></a>
				<?php endif ?>						
			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
<?php require get_template_directory() . '/includes/nav.php'; ?>
<div class="main-content">	
	<div class="container">
		
		<div class="row">
			<div class="main-content-inner col-md-8">
			<div class="single-wrap" >
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
					<!-- #masthead -->
					<article itemscope itemtype="http://schema.org/MusicAlbum" id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin: 0 15px 5% 15px;">
					
					<div class="row albumBlock">
							<div class="category_title innerPadding">
								<h1 itemprop="name" style="font-size: 1.1rem; display: inline;"><?php if (get_post_meta( get_the_ID(), 'bip_album_name' )) : ?><?php echo get_post_meta( get_the_ID(), 'bip_album_name', true ); ?><?php endif ?></h1> by <h2 itemprop="byArtist" style="font-size: 1.1rem; display: inline;"><?php if (get_post_meta( get_the_ID(), 'bip_album_artist' )) : ?><?php echo get_post_meta( get_the_ID(), 'bip_album_artist', true ); ?><?php endif ?></h2>
								
								<?php
										if (get_post_meta( get_the_ID(), 'bip_album_genre' )) {
										echo '<meta content="' . get_post_meta( get_the_ID(), 'bip_album_genre', true ) . '" itemprop="genre" />';
										};
									?>	
							</div>					
						<div class="col-md-4 post_thumbnail thumbeffect">
							<a href="<?php the_permalink(); ?>">
						<img src="<?php 
						$attachment_id = get_post_meta( get_the_ID(), 'bip_cover-image', true );
						echo wp_get_attachment_url( $attachment_id,'full' ); ?>" class="img-responsive" itemprop="image"></a>
							<?php if (get_post_meta( get_the_ID(), 'bip_emeddedaudio-front' )) : ?>
								<div class="discogEmbed">
									<?php echo get_post_meta( get_the_ID(), 'bip_emeddedaudio-front', true ); ?>
								</div>
							<?php endif ?>	
							<div class="row musicStoreIcons">
							<?php if (get_post_meta( get_the_ID(), 'bip_itunes' )) : ?>
							<div class="col-md-3 col-xs-3 social-icons">
								<a rel="nofollow" target="itunes_store" href="<?php echo get_post_meta( get_the_ID(), 'bip_itunes', true ); ?>?at=10l4TT&ct=frontpage" onClick="_gaq.push(['_trackEvent', 'Music Store', 'iTunes', 'iTunes', 1, false]);"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-itunes-dark.png" alt="iTunes"></a>
							</div>
							<?php endif ?>							
							<?php if (get_post_meta( get_the_ID(), 'bip_amazon' )) : ?>
							<div class="col-md-3 col-xs-3 social-icons">
								<a rel="nofollow" target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'bip_amazon', true ); ?>" onClick="_gaq.push(['_trackEvent', 'Music Store', 'Amazon', 'Amazon', 1, false]);"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-amazon-dark.png" alt="Amazon"></a>
							</div>
							<?php endif ?>							
							<?php if (get_post_meta( get_the_ID(), 'bip_spotify-disc' )) : ?>
							<div class="col-md-3 col-xs-3 social-icons">
								<a rel="nofollow" target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'bip_spotify-disc', true ); ?>" onClick="_gaq.push(['_trackEvent', 'Music Store', 'Spotify', 'Spotify', 1, false]);"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-spotify-dark.png" alt="Spotify"></a>
							</div>
							<?php endif ?>
							<?php if (get_post_meta( get_the_ID(), 'bip_bandcamp' )) : ?>
							<div class="col-md-3 col-xs-3 social-icons">
								<a target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'bip_bandcamp', true ); ?>" onClick="_gaq.push(['_trackEvent', 'Music Store', 'Bandcamp', 'Bandcamp', 1, false]);"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-bandcamp-dark.png" alt="Bandcamp"></a>
							</div>
							<?php endif ?>
							</div>		

									<?php
										if (get_post_meta( get_the_ID(), 'bip_record_label' )) {
											echo '<span class="discogMeta">';
											if (get_post_meta( get_the_ID(), 'bip_record_label_url' )) {
											echo '<a href="' . get_post_meta( get_the_ID(), 'bip_record_label_url', true ) . '" target="_blank">' . get_post_meta( get_the_ID(), 'bip_record_label', true ) . '</a>';
											}
											else {
												echo get_post_meta( get_the_ID(), 'bip_record_label', true );
											};
											
											echo '</span>';
												};								
									?>
									<?php
										if (get_post_meta( get_the_ID(), 'bip_catalog_number' )) {
										echo '<span class="discogMeta"><i class="fa fa-headphones"></i> ' . get_post_meta( get_the_ID(), 'bip_catalog_number', true ) . '</span>';
										};
									?>
									<?php
										if (get_post_meta( get_the_ID(), 'bip_album_genre' )) {
										echo '<span class="discogMeta"><i class="fa fa-tag"></i> ' . get_post_meta( get_the_ID(), 'bip_album_genre', true ) . '</span>';
										};
									?>		
									<?php
										if (get_post_meta( get_the_ID(), 'bip_album_release_date' )) {
										echo '<span class="discogMeta"><i class="fa fa-calendar"></i> ' . get_post_meta( get_the_ID(), 'bip_album_release_date', true ) . '</span>';
										};
									?>											
							
						</div>
								
						<div class="col-md-8">
							<div class="entry-content">
							<?php the_content(); ?>
							</div><!-- .entry-content -->
							
						<div class="row">
								
								<div class="col-md-12" id="tracklist">
									<?php if (get_post_meta( get_the_ID(), 'bip_tracklist' )) {
										echo '<h3 style="border-bottom: 1px solid #000;">Tracklist</h3>';
										$playlists = get_post_meta( $post->ID, 'bip_tracklist'); 
										foreach( $playlists as $playlist){
											echo '<div itemprop="track" tracknumber="' . $playlist['bip_tracklist_number'] .  '"><span>' . $playlist['bip_tracklist_number'] .  '. </span>';
											if ($playlist['bip_tracklist_artist']) {
												echo '<span>' . $playlist['bip_tracklist_artist'] .  ' - </span>';
													};											
											
											echo '<span itemprop="name">' . $playlist['bip_tracklist_name'] .  '</span>';
											if ($playlist['bip_tracklist_time_minute']) {
												echo ' <meta content="PT' . $playlist['bip_tracklist_time_minute'] .  'M' . $playlist['bip_tracklist_time_second'] .  'S" itemprop="duration" />(' . $playlist['bip_tracklist_time_minute'] .  ':' . $playlist['bip_tracklist_time_second'] .  ')';
													};
											echo '</div>';		
										}
										}
									?>									
								
								<div id="tracklistDisplay">
								</div>
								</div>
							</div>
					<div class="row"  style="margin-top: 5%;">
						<div class="review-content-inner col-md-12">


					<?php
					$album = get_the_ID();
					$wp_query = new WP_Query(array(
								'post_type' => 'review', 
								'posts_per_page' => 3, 
								'meta_key' => 'bip_review_album',
								'meta_value' => $album, 
								'cat' => $cat_id, 
								'post_status' => 'publish'));	
						if ( $wp_query->have_posts() ) {
						echo '<h3>Reviews</h3>';
						};								
					?>

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

								<p>"<?php if (get_post_meta( get_the_ID(), 'bip_review_quote' )) : ?><?php if (get_post_meta( get_the_ID(), 'bip_review_url' )) : ?><a target="_blank" href="<?php echo get_post_meta( get_the_ID(), 'bip_review_url', true ); ?>"><?php endif ?><?php echo get_post_meta( get_the_ID(), 'bip_review_quote', true ); ?><?php if (get_post_meta( get_the_ID(), 'bip_review_quote' )) : ?></a><?php endif ?><?php endif ?>"</p>
								<div class="quote-author"><p>— <?php if (get_post_meta( get_the_ID(), 'bip_review_author' )) : ?><?php echo get_post_meta( get_the_ID(), 'bip_review_author', true ); ?> from <?php endif ?><?php if (get_post_meta( get_the_ID(), 'bip_review_publication' )) : ?><?php echo get_post_meta( get_the_ID(), 'bip_review_publication', true ); ?><?php endif ?></p></div>
							</blockquote>
						</li>				

					<?php endwhile; ?>				  
						  <?php wp_reset_query(); ?>
	
						</div>
					</div>	
							
<?php edit_post_link( __( 'Edit', '_tk' ), '<span class="edit-link">', '</span>' ); ?>

						</div>
						


					</div>

	


								
													
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
									'after'  => '</div>',
								) );
							?>
						



							

					</article><!-- #post-## -->
					
					<div class="innerPadding">


					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template();
					?>
					</div>
				<?php endwhile; // end of the loop. ?>

			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
			</div>
		</div><!-- close .row -->
		<div class="col-md-4">
		

			<?php
				$wp_query = new WP_Query(array(
							'post_type' => 'album', 
							'posts_per_page' => 14,
							'cat' => $cat_id, 
							'post_status' => 'publish'));			
				if ( $wp_query->have_posts() );
				$order = 0;
				?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					

					
						<div class="col-xs-6 post_thumbnail thumbeffect" style="padding-bottom: 15px;">
							<a href="<?php the_permalink(); ?>">
						<?php 
						$attachment_id = get_post_meta( get_the_ID(), 'bip_cover-image', true );
						echo wp_get_attachment_image( $attachment_id,'full' ); ?></a>								
						</div>
						
				<?php endwhile; ?>	

		</div>

	</div><!-- close .container -->

</div><!-- close .main-content -->
<?php get_footer(); ?>