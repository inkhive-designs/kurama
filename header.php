<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kurama
 */
?>
<?php get_template_part('modules/header/head'); ?>


<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kurama' ); ?></a>
	
	<?php get_template_part('modules/header/jumbosearch'); ?>
	<div class="head-full">
		
		<?php get_template_part('modules/header/top-bar'); ?>

		<div id="head" class="container-fluid">
			<?php get_template_part('modules/header/masthead'); ?>
			<?php get_template_part('modules/header/header-image'); ?>

		
	</div>	
	</div>
	<?php get_template_part('featured', 'area1'); ?>
	
	
	<div class="mega-container">
						
		<div id="content" class="site-content container">