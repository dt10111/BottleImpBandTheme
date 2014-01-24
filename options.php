<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}



/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Test data
	$color_array = array(
		'white_on_black' => __('White On Black', 'options_framework_theme'),
		'black_on_white' => __('Black On White', 'options_framework_theme')
	);	
	

		
	// album data
	$number_array = array(
		'1' => __('1', 'options_framework_theme'),
		'2' => __('2', 'options_framework_theme'),		
		'3' => __('3', 'options_framework_theme')
	);		
	

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Array
	$sections_array = array(
		'one' => __('Videos', 'options_framework_theme'),
		'two' => __('Reviews', 'options_framework_theme'),
		'three' => __('Tour', 'options_framework_theme')
	);	

	// Multicheck Defaults
	$sections_defaults = array(
		'one' => '1',
		'two' => '1'
	);
	
	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$args = array (
		'sort_order' => 'ASC',
	'sort_column' => 'post_title',
	'numberposts' => 10,
	'post_type' => 'album'
	);
	$options_pages_obj = get_posts($args);
	$options_pages[''] = 'Select an album:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
	
	$options[] = array(
	'name' => __('Theme Setup', 'options_framework_theme'),
	'type' => 'heading');
	
	$options[] = array(
		'name' => __('Band Name', 'options_framework_theme'),
		'desc' => __('Band Name', 'options_framework_theme'),
		'id' => 'bipo_band_name',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Short Description', 'options_framework_theme'),
		'desc' => __('Short description of the band/artist', 'options_framework_theme'),
		'id' => 'bipo_band_description_short',
		'std' => 'Short description, 140 characters or less',
		'type' => 'text');	
	$options[] = array(
		'name' => __('Site Design', 'options_framework_theme'),
		'desc' => __('This section designs the site', 'options_framework_theme'),
		'type' => 'info');		
	$options[] = array(
		'name' => __('Color Scheme', 'options_framework_theme'),
		'desc' => __('Select the color scheme used', 'options_framework_theme'),
		'id' => 'bipo_color_scheme',
		'std' => 'black_on_white',
		'type' => 'select',
		'options' => $color_array);		

	$options[] = array(
		'name' => __('Link Color', 'options_framework_theme'),
		'desc' => __('Color for Links', 'options_framework_theme'),
		'id' => 'bipo_link_color',
		'std' => '#4f292b',
		'type' => 'color' );	
		
	$options[] = array(
		'name' => __('Link Hover Color', 'options_framework_theme'),
		'desc' => __('Color for Links on hover', 'options_framework_theme'),
		'id' => 'bipo_link_hover',
		'std' => '#4c3239',
		'type' => 'color' );	
		
	$options[] = array(
		'name' => __('Logo', 'options_framework_theme'),
		'desc' => __('This will be the Logo centered on front page. Should be PNG with alpha transparency preserved.', 'options_framework_theme'),
		'id' => 'bipo_main_logo_image',
		'type' => 'upload');		

	$options[] = array(
		'name' => __('Main Image', 'options_framework_theme'),
		'desc' => __('This will be the fullsized image on top of home page. 1900px x 1425px recommended', 'options_framework_theme'),
		'id' => 'bipo_main_header_image',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Footer Image', 'options_framework_theme'),
		'desc' => __('This will be the fullsized image on top of home page. 1900px x 1425px recommended', 'options_framework_theme'),
		'id' => 'bipo_main_footer_image',
		'type' => 'upload');		
		
	$options[] = array(
		'name' => __('Sections', 'options_framework_theme'),
		'desc' => __('Check which sections to show on Home Page', 'options_framework_theme'),
		'id' => 'sections_multicheck',
		'std' => $sections_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $sections_array);		

	$options[] = array(
		'name' => __('Select an Album', 'options_framework_theme'),
		'desc' => __('Select the album to feature on front page', 'options_framework_theme'),
		'id' => 'bipo_album_feature',
		'type' => 'select',
		'options' => $options_pages);		
	
	$options[] = array(
		'name' => __('Number of Albums', 'options_framework_theme'),
		'desc' => __('Number of Albums to display on Home Page', 'options_framework_theme'),
		'id' => 'bipo_number_albums',
		'type' => 'select',
		'options' => $number_array);	

	$options[] = array(
		'name' => __('Google Analytics', 'options_framework_theme'),
		'desc' => __('Check to include Google Analytics tracking', 'options_framework_theme'),
		'id' => 'bipo_analytics_include',
		'std' => '0',
		'type' => 'checkbox');	
		
	$options[] = array(
		'name' => __('Analytics ID', 'options_framework_theme'),
		'desc' => __('Your Google Analytics tracking ID, e.g. UA-XXXXXXX-X', 'options_framework_theme'),
		'id' => 'bipo_analytics_id',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('MailChimp Form', 'options_framework_theme'),
		'desc' => __('Check to Include MailChimp sign up in Footer', 'options_framework_theme'),
		'id' => 'mailchimp_checkbox',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('MailChimp Form Action URL', 'options_framework_theme'),
		'desc' => __('MailChimp Form Action URL - See documentation for details', 'options_framework_theme'),
		'id' => 'bipo_mailchimp_form',
		'std' => '',
		'type' => 'text');	
	
		
	$options[] = array(
	'name' => __('Social Media Settings', 'options_framework_theme'),
	'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'desc' => __('Full URL to Facebook page, http://facebook.com/yourname', 'options_framework_theme'),
		'id' => 'bipo_facebook_url',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('Full URL to Twitter page, http://twitter.com/yourname', 'options_framework_theme'),
		'id' => 'bipo_twitter_url',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Soundcloud', 'options_framework_theme'),
		'desc' => __('Full URL to Soundcloud page, http://soundcloud.com/yourname', 'options_framework_theme'),
		'id' => 'bipo_soundcloud_url',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Bandcamp', 'options_framework_theme'),
		'desc' => __('Full URL to Bandcamp page, http://yourname.bandcamp.com', 'options_framework_theme'),
		'id' => 'bipo_bandcamp_url',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Tumblr', 'options_framework_theme'),
		'desc' => __('Full URL to Tumblr page, http://yourname.tumblr.com/', 'options_framework_theme'),
		'id' => 'bipo_tumblr_url',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Google Plus', 'options_framework_theme'),
		'desc' => __('Full URL to Google Plus page, http://plus.google.com/yourname/', 'options_framework_theme'),
		'id' => 'bipo_googleplus_url',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Instagram', 'options_framework_theme'),
		'desc' => __('Full URL to Instagram page, http://instagram.com/yourname/', 'options_framework_theme'),
		'id' => 'bipo_instagram_url',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Spotify', 'options_framework_theme'),
		'desc' => __('Full URL to Spotify page, http://open.spotify.com/artist/yourlink', 'options_framework_theme'),
		'id' => 'bipo_spotify_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Vimeo', 'options_framework_theme'),
		'desc' => __('Full URL to Vimeo page, http://vimeo/yourname', 'options_framework_theme'),
		'id' => 'bipo_vimeo_url',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Youtube', 'options_framework_theme'),
		'desc' => __('Full URL to Youtube page, http://www.youtube.com/user/yourname', 'options_framework_theme'),
		'id' => 'bipo_youtube_url',
		'std' => '',
		'type' => 'text');	
		
$options[] = array(
	'name' => __('Icons', 'options_framework_theme'),
	'type' => 'heading');
			
	$options[] = array(
		'name' => __('Favicon', 'options_framework_theme'),
		'desc' => __('Favicon. Must be 16x16 or 32x32 and in PNG, GIF or ICO format', 'options_framework_theme'),
		'id' => 'bipo_favicon',
		'type' => 'upload');		

	$options[] = array(
		'name' => __('Apple Touch - non-retina iPhone pre iOS 7', 'options_framework_theme'),
		'desc' => __('Must be 57x57 pixels, PNG format', 'options_framework_theme'),
		'id' => 'bipo_apple_touch_57',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Apple Touch - iPad pre iOS 7', 'options_framework_theme'),
		'desc' => __('Must be 72x72 pixels, PNG format', 'options_framework_theme'),
		'id' => 'bipo_apple_touch_72',
		'type' => 'upload');			

		
	$options[] = array(
		'name' => __('Apple Touch - retina iPhone pre iOS 7', 'options_framework_theme'),
		'desc' => __('Must be 114x114 pixels, PNG format', 'options_framework_theme'),
		'id' => 'bipo_apple_touch_114',
		'type' => 'upload');			
			
		
	$options[] = array(
		'name' => __('Apple Touch - iPad pre iOS 7', 'options_framework_theme'),
		'desc' => __('Must be 144x144 pixels, PNG format', 'options_framework_theme'),
		'id' => 'bipo_apple_touch_144',
		'type' => 'upload');			
		
		
		
	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */


	return $options;
}