<?php
/**
 * The template for displaying Work Archive Aage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Michiko_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			// while ( have_posts() ) :
			// 	the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */

			// 	get_template_part( 'template-parts/content', get_post_type() );

			// endwhile;

			// the_posts_navigation();

			$args = array(
				'post_type'     => 'portfolio-work',
				'post_per_page' => -1,
			);

			$query = new WP_Query( $args );
			if( $query -> have_posts() ) {
				?>
				<section class="work">
				<?php
				while( $query->have_posts()) {
					$query->the_post();

					// Display the Image
					the_post_thumbnail();

					//Display the title
					?>
					<a href="<?php the_permalink(); ?>"><h2><?php the_title() ?></h2></a>
					<?php

					// Diplaying the Tool List
					$tools = get_field('tools');
					if( $tools ): ?>
					<ul>
					<?php foreach( $tools as $tool ): ?>
					<li><?php echo $tool; ?></li>
					<?php endforeach; ?>
					</ul>
					<?php endif; 
				
					// Display See Details Button
					?>
					<a href="<?php the_permalink(); ?>"><?php esc_html_e('See Details', 'portfolio'); ?></a>
					<?php
				}
				echo '</section>';
				wp_reset_postdata();

			};

			get_template_part( 'template-parts/content', 'contact' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
