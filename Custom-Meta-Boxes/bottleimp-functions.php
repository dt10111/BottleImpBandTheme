<?php

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	$meta_boxes[] = array(
		'title' => 'Additional Album Details',
		'pages' => 'album',
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		
		'fields' => array(
			array( 'id' => 'bip_album_artist',  'name' => 'Artist or Artists', 'type' => 'text', 'cols' => 3 ),			
			array( 'id' => 'bip_album_name',  'name' => 'Name of Album', 'type' => 'text', 'cols' => 3 ),		
			array( 'id' => 'bip_album_type', 'name' => 'Choose album format', 'type' => 'select', 'options' => array( 'lp' => 'Full Length', 'ep' => 'EP', 'appear' => 'Remix / Split / Appearance' ), 'allow_none' => false, 'cols' => 3 ),	
			array( 'id' => 'bip_album_release_date', 'name' => 'Release Date', 'type' => 'date', 'cols' => 3 ),				
			array( 'id' => 'bip_record_label',  'name' => 'Record Label this album was released on', 'type' => 'text', 'cols' => 3 ),
			array( 'id' => 'bip_record_label_url',  'name' => 'Link to record label website', 'type' => 'text', 'cols' => 3 ),			
			array( 'id' => 'bip_catalog_number',  'name' => 'Catalog number', 'type' => 'text', 'cols' => 3 ),		
			array( 'id' => 'bip_album_genre',  'name' => 'Primary Genre', 'type' => 'text', 'cols' => 3 ),
			array( 'id' => 'bip_spotify-disc',  'name' => 'Link to Spotify', 'type' => 'text', 'cols' => 3 ),
			array( 'id' => 'bip_itunes',  'name' => 'Link to iTunes', 'type' => 'text', 'cols' => 3 ),
			array( 'id' => 'bip_amazon',  'name' => 'Link to Amazon', 'type' => 'text', 'cols' => 3 ),	
			array( 'id' => 'bip_bandcamp',  'name' => 'Link to Bandcamp', 'type' => 'text', 'cols' => 3 ),			
			array( 'id' => 'bip_summary',  'name' => 'This summary will appear on the front page', 'type' => 'wysiwyg', 'options' => array( 'editor_height' => '100' ), 'cols' => 6 ),	
			array( 'id' => 'bip_emeddedaudio-front',  'name' => 'Copy and paste embed audio code, e.g. Bandcamp, Soundcloud, etc', 'type' => 'wysiwyg', 'options' => array( 'editor_height' => '100' ), 'cols' => 6 ),
			array( 'id' => 'bip_tracklisting',  'name' => 'Format your tracklisting as a list', 'type' => 'wysiwyg', 'options' => array( 'editor_height' => '100' ), 'cols' => 12 ),					
			array( 'id' => 'bip_cover-image', 'name' => 'Cover Image, should be 1200px by 1200px', 'type' => 'image', 'repeatable' => false, 'cols' => 3 ),
			array( 'id' => 'bip_additional-image-1', 'name' => 'Additonal Image, should be 800px bx 800px or larger', 'type' => 'image', 'repeatable' => false, 'cols' => 3 ),
			array( 'id' => 'bip_additional-image-2', 'name' => 'Additonal Image, should be 800px bx 800px or larger', 'type' => 'image', 'repeatable' => false, 'cols' => 3 ),	
			array( 'id' => 'bip_additional-image-3', 'name' => 'Additonal Image, should be 800px bx 800px or larger', 'type' => 'image', 'repeatable' => false, 'cols' => 3 ),

			
			array( 'id' => 'bip_tracklist', 'name' => 'Tracklist Builder', 'type' => 'group', 'style' => 'background: #f1f1f1; border-radius: 4px; border: 1px solid //#e2e2e2; margin-bottom: 10px; padding: 10px', 'repeatable' => true, 'fields' => array(
				array( 'id' => 'bip_tracklist_number', 'name' => 'Track Number', 'type' => 'text', 'cols' => 2, 'readonly' => false ),
				array( 'id' => 'bip_tracklist_artist', 'name' => 'Artist Name, leave blank if single artist release. ', 'type' => 'text', 'cols' => 4, 'readonly' => false ),
				array( 'id' => 'bip_tracklist_name', 'name' => 'Track Name', 'type' => 'text', 'cols' => 4, 'readonly' => false ),				
				array( 'id' => 'bip_tracklist_time_minute', 'name' => 'Track Length (minutes, i.e. fill in X for X:30)', 'type' => 'text', 'cols' => 1, 'readonly' => false ),				
				array( 'id' => 'bip_tracklist_time_second', 'name' => 'Track Length (seconds, i.e. fill in XX for 4:XX)', 'type' => 'text', 'cols' => 1, 'readonly' => false )


			) )

		),
		

	);
	$meta_boxes[] = array(
		'title' => 'Photos',
		'pages' => 'photo',
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		
		'fields' => array(
			array( 'id' => 'bip_photo', 'name' => 'Add Photos', 'type' => 'group', 'style' => 'background: #f1f1f1; border-radius: 4px; border: 1px solid //#e2e2e2; margin-bottom: 10px; padding: 10px', 'repeatable' => true, 'fields' => array(
				array( 'id' => 'bip_photo_title', 'name' => 'Photo Title', 'type' => 'text', 'cols' => 12, 'readonly' => false ),
				array( 'id' => 'bip_photo_image', 'name' => 'Image', 'type' => 'image', 'repeatable' => false, 'cols' => 12 )

			) )

		),
		

	);	
	$meta_boxes[] = array(
		'title' => 'Additional Review Details',
		'pages' => 'review',
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		
		'fields' => array(
			array( 'id' => 'bip_review_quote',  'name' => 'Quote to highlight from review', 'type' => 'textarea', 'cols' => 12 ),
			array( 'id' => 'bip_review_album', 'name' => 'Select album that was reviewed', 'type' => 'post_select', 'cols' => 12, 'use_ajax' => true, 'query' => array( 'post_type' => 'album','showposts' => -1 ) ),			
			array( 'id' => 'bip_review_author',  'name' => 'Author of review', 'type' => 'text', 'cols' => 6 ),			
			array( 'id' => 'bip_review_url',  'name' => 'Direct link to the review', 'type' => 'text', 'cols' => 6 ),				
			array( 'id' => 'bip_review_publication',  'name' => 'Name of the publication review appears on', 'type' => 'text', 'cols' => 6 ),		
			array( 'id' => 'bip_review_publication_url',  'name' => 'Link to the publication site', 'type' => 'text', 'cols' => 6 )

		),
		

	);	
		$meta_boxes[] = array(
		'title' => 'Additional Video Details',
		'pages' => 'video',
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		
		'fields' => array(
	
			array( 'id' => 'bip_video_embed', 'name' => 'Input the video embed code', 'type' => 'textarea', 'cols' => 6, 'readonly' => false )
				),
		);
	return $meta_boxes;

}


add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );