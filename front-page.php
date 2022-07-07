<?php
/**
 * The template for displaying Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Michiko_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content', 'page' );
		?>	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
				<div class="home-title">
					<h1 class="home-h1">
						<?php the_title(); ?>
					</h1>
				</div>
				<div class="home-content">
					<?php
					the_content();
				
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'michiko-portfolio' ),
							'after'  => '</div>',
						)
					);
					
					get_template_part( 'template-parts/content', 'socialicons' ); ?>
				</div>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php the_ID(); ?> -->


			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
<?php
get_footer();