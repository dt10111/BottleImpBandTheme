<?php header("Content-type: text/css"); ?> <?php require_once('../../../../../wp-load.php'); ?>
<?php if (of_get_option('bipo_link_color')) : ?>
a {
color: <?php echo of_get_option('bipo_link_color', 'no entry'); ?>;
}
<?php endif ?>	
<?php if (of_get_option('bipo_link_hover')) : ?>
a:hover, a:focus {
color: <?php echo of_get_option('bipo_link_hover', 'no entry'); ?>;
}
<?php endif ?>