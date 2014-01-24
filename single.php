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
			<div class="main-content-inner col-md-7">
			<div class="single-wrap">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
					<?php if(has_post_thumbnail()) { $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' ); 
						echo '<header id="single-header" class="main-header" role="banner" style="background: url(' . $image_src[0] . ') no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">'; } ?>

				</header><!-- #masthead -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin: 0 15px;">
					
					
						<header class="page-header">
							<h1 class="page-title"><?php the_title(); ?></h1>

							<div class="entry-meta">
								<?php _tk_posted_on(); ?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->

						<footer class="entry-meta">
							<?php
								/* translators: used between list items, there is a space after the comma */
								$category_list = get_the_category_list( __( ', ', '_tk' ) );

								/* translators: used between list items, there is a space after the comma */
								$tag_list = get_the_tag_list( '', __( ', ', '_tk' ) );

								if ( ! _tk_categorized_blog() ) {
									// This blog only has 1 category so we just need to worry about tags in the meta text
									if ( '' != $tag_list ) {
										$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '_tk' );
									} else {
										$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '_tk' );
									}

								} else {
									// But this blog has loads of categories so we should probably display them here
									if ( '' != $tag_list ) {
										$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '_tk' );
									} else {
										$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '_tk' );
									}

								} // end check for categories on this blog

								printf(
									$meta_text,
									$category_list,
									$tag_list,
									get_permalink(),
									the_title_attribute( 'echo=0' )
								);
							?>

							<?php edit_post_link( __( 'Edit', '_tk' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</article><!-- #post-## -->
					<div class="innerPadding">
					<?php _tk_content_nav( 'nav-below' ); ?>

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
		<div class="main-content-inner col-md-5">
				<div class="sidebar-padder">

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
	
				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>
	
				<aside id="archives" class="widget widget_archive">
					<h3 class="widget-title"><?php _e( 'Archives', '_tk' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>
	
				<aside id="meta" class="widget widget_meta"> 
					<h3 class="widget-title"><?php _e( 'Meta', '_tk' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
	
			<?php endif; ?>
			
		</div><!-- close .sidebar-padder -->
		</div>
	</div><!-- close .container -->

</div><!-- close .main-content -->
<?php get_footer(); ?>