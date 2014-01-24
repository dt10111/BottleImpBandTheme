<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
 ?>
<!DOCTYPE html>



<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if (of_get_option('bipo_favicon')) : ?>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo of_get_option('bipo_favicon', 'no entry'); ?>" title="Favicon" />
<?php endif ?>
<?php if (of_get_option('bipo_apple_touch_72')) : ?>
<link rel="apple-touch-icon" href="<?php echo of_get_option('bipo_apple_touch_72', 'no entry'); ?>" sizes="72x72">
<?php endif ?>
<?php if (of_get_option('bipo_apple_touch_114')) : ?>
<link rel="apple-touch-icon" href="<?php echo of_get_option('bipo_apple_touch_114', 'no entry'); ?>" sizes="114x114">
<?php endif ?>
<?php if (of_get_option('bipo_apple_touch_144')) : ?>
<link rel="apple-touch-icon" href="<?php echo of_get_option('bipo_apple_touch_144', 'no entry'); ?>" sizes="144x144">
<?php endif ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>