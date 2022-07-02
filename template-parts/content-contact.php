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
		<p><?php esc_html_e('If you like my projects, please contact me!', 'portfolio') ?></p>
		<div class="contact">	
			<a class="contact-btn" href="mailto:mitchiko.h@gmail.com"><?php esc_html_e('Contact', 'portfolio') ?></a>
			<ul class="contact-social-icons">
				<li><a href="https://www.linkedin.com/in/michiko-hasegawa/"><?php get_template_part('images/linkedin'); ?></a></li>
				<li><a href="mailto:mitchiko.h@gmail.com"><?php get_template_part('images/email'); ?></a></li>
				<li><a href="https://github.com/MichikoHasegawa?tab=repositories"><?php get_template_part('images/github'); ?></a></li>
			</ul>
		</div>
	</div><!-- .entry-content -->


	
</section><!-- #post-<?php the_ID(); ?> -->
