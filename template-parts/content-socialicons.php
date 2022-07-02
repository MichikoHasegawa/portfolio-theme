<?php
/**
 * Template part for Contact
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Michiko_Portfolio
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="contact-wrapper">
		<a href="https://www.linkedin.com/in/michiko-hasegawa/"><?php get_template_part('images/linkedin'); ?></a>
		<a href="mailto:mitchiko.h@gmail.com"><?php get_template_part('images/email'); ?></a>
		<a href="https://github.com/MichikoHasegawa?tab=repositories"><?php get_template_part('images/github'); ?></a>
	</div><!-- .entry-content -->


	
</section><!-- #post-<?php the_ID(); ?> -->
