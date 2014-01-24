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
					<?php
						if ( is_category() ) :
							single_cat_title();
	
						elseif ( is_tag() ) :
							single_tag_title();
	
						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', '_tk' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
	
						elseif ( is_day() ) :
							printf( __( 'Day: %s', '_tk' ), '<span>' . get_the_date() . '</span>' );
	
						elseif ( is_month() ) :
							printf( __( 'Month: %s', '_tk' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
	
						elseif ( is_year() ) :
							printf( __( 'Year: %s', '_tk' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
	
						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', '_tk' );
	
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', '_tk');
	
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', '_tk' );
	
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', '_tk' );
	
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', '_tk' );
	
						else :
							_e( 'Archives', '_tk' );
	
						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
	
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="single-wrap">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<?php if(has_post_thumbnail()) { $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' ); 
						echo '<div class="col-md-5 archiveLeft" style="background: url(' . $image_src[0] . ') no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">'; } ?>
					</div>
					<div class="col-md-7">
						<header class="archive-header">
							<h4 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

							<?php if ( 'post' == get_post_type() ) : ?>
							<div class="entry-meta">
								<?php _tk_posted_on(); ?>
							</div><!-- .entry-meta -->
							<?php endif; ?>
						</header><!-- .entry-header -->

						<?php if ( is_search() || is_archive() ) : // Only display Excerpts for Search and Archive Pages ?>
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->
						<?php else : ?>
						<div class="entry-content">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '_tk' ) ); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
						<?php endif; ?>

						<footer class="entry-meta">
							<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
								<?php
									/* translators: used between list items, there is a space after the comma */
									$categories_list = get_the_category_list( __( ', ', '_tk' ) );
									if ( $categories_list && _tk_categorized_blog() ) :
								?>
								<span class="cat-links">
									<?php printf( __( 'Posted in %1$s', '_tk' ), $categories_list ); ?>
								</span>
								<?php endif; // End if categories ?>

								<?php
									/* translators: used between list items, there is a space after the comma */
									$tags_list = get_the_tag_list( '', __( ', ', '_tk' ) );
									if ( $tags_list ) :
								?>
								<span class="tags-links">
									<?php printf( __( 'Tagged %1$s', '_tk' ), $tags_list ); ?>
								</span>
								<?php endif; // End if $tags_list ?>
							<?php endif; // End if 'post' == get_post_type() ?>


							<?php edit_post_link( __( 'Edit', '_tk' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>  ', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</div>
				</div>
			</article><!-- #post-## -->
			</div>
			<?php endwhile; ?>
	
			<?php _tk_content_nav( 'nav-below' ); ?>
	
		<?php else : ?>
	
			<?php get_template_part( 'no-results', 'archive' ); ?>
	
		<?php endif; ?>
	
	</div><!-- .content-padder -->
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		<!-- close .row -->
	</div><!-- close .container -->
	</div>			

<?php get_footer(); ?>