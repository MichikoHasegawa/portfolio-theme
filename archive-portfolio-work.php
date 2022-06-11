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

					the_post_thumbnail();
					?>
					<a href="<?php the_permalink(); ?>"><h2><?php the_title() ?></h2></a>
					<?php
					// Deplaying the Tool List
					if (function_exists ( 'get_field')) {
						if (get_field('tool_list')) {
							echo '<p>'.get_field('tool_list');
							'<p>';
						}
					}

					// Displaying the Links
					if (get_field('github')) {
						$githubLink = get_field('github');

						if($githubLink){
							$github_url = $githubLink['url'];
							$github_title = $githubLink['title'];
							$github_target = $githubLink['target'] ? $githubLink['target'] : '_self';
						
						?>
						<a class="github-link" href="<?php echo esc_url($github_url); ?>"target="<?php echo esc_attr($github_target); ?>"><?php echo esc_html($github_title); ?></a>
						<?php
						}
					}

					if (get_field('live')) {
						$liveLink = get_field('live');

						if($liveLink){
							$live_url = $liveLink['url'];
							$live_title = $liveLink['title'];
							$live_target = $liveLink['target'] ? $liveLink['target'] : '_self';
						?>
						<a class="live-link" href="<?php echo esc_url($live_url); ?>"target="<?php echo esc_attr($live_target); ?>"><?php echo esc_html($live_title); ?></a>
						<?php
						}
					}
					// Displaying the Description 
					if (function_exists ( 'get_field')) {
						if (get_field('description')) {
							echo '<p>'.get_field('description');
							'<p>';
						}
					}
				}?>

				<?php
				echo '</section>';
				wp_reset_postdata();

			};

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
