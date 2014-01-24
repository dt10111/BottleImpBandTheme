<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 */
?>

<section class="connect-content" <?php if (of_get_option('bipo_main_footer_image')) : ?>style="background: url(<?php echo of_get_option('bipo_main_footer_image', 'no entry'); ?>) no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"<?php endif ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="connect-content-inner col-md-6">
				<h3>Connect</h3>
				<div class="social-block row">
				<?php if (of_get_option('bipo_facebook_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_facebook_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-facebook-light.png" class="social-icon" alt="Facebook"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_twitter_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_twitter_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-twitter-light.png" class="social-icon" alt="Twitter"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_soundcloud_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_soundcloud_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-soundcloud-light.png" class="social-icon" alt="Soundcloud"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_bandcamp_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_bandcamp_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-bandcamp-light.png" class="social-icon" alt="Bandcamp"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_tumblr_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_tumblr_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-tumblr-light.png" class="social-icon" alt="Tumblr"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_googleplus_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_googleplus_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-googleplus-light.png" class="social-icon" alt="Google Plus"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_instagram_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_instagram_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-instagram-light.png" class="social-icon" alt="Instagram"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_spotify_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_spotify_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-spotify-light.png" class="social-icon" alt="Spotify"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_vimeo_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_vimeo_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-vimeo-light.png" class="social-icon" alt="Vimeo"></a>
				</div>
				<?php endif ?>
				<?php if (of_get_option('bipo_youtube_url')) : ?>
				<div class="col-md-2 col-sm-3 col-xs-4 social-icons">
					<a href="<?php echo of_get_option('bipo_youtube_url', 'no entry'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/ico/icon-youtube-light.png" class="social-icon" alt="Youtube"></a>
				</div>
				<?php endif ?>	
				</div>
				<?php if (of_get_option('mailchimp_checkbox')) : ?>
				<h3>Mailing List</h3>
				<form action="<?php echo of_get_option('bipo_mailchimp_form', 'no entry'); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-horizontal" target="_blank" novalidate>
					<fieldset>
						<div class="row">
							<div class="col-md-9 mailchimp-form form-element" for="mce-EMAIL">
								<input id="mce-EMAIL" name="EMAIL" type="email" placeholder="Your Email Address" class="form-control required email" required="">
							</div>
							<div class="col-md-3 mailchimp-button form-element">
								<button id="mc-embedded-subscribe" type="submit" value="Subscribe" name="subscribe" class="btn btn-block btn-white"><i class="fa fa-envelope"></i> Subscribe</button>
							</div>
						</div>
					</fieldset>
				</form>	
				<?php endif ?>	

			
			
			</div>
			<div class="col-md-3"></div>

		</div>
	</div>
</section>


<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="site-footer-inner col-sm-6">
			
				<div class="site-info">
					Bottle Imp Band Theme by <a href="http://danieltuttle.com/" rel="designer">Daniel Tuttle</a>
				</div><!-- close .site-info -->
			
			</div>	
			<div class="site-footer-inner col-sm-6">
			

			
			</div>				
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

<?php if ( is_user_logged_in() ) : ?>
<?php else : ?>
<?php if (of_get_option('bipo_analytics_include')) : ?>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php if (of_get_option('bipo_analytics_id')) : ?><?php echo of_get_option('bipo_analytics_id', 'no entry'); ?><?php endif ?>']);
_gaq.push(['_setDomainName', '<?php

   //Get rid of wwww
$domain_name =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']);

   //output the result
echo $domain_name;

?>']);
_gaq.push(['_trackPageview']);
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>

<?php endif; ?>
<?php endif; ?>


</body>
</html>