<?php
/**
 * The template for displaying the Work Single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Michiko_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			the_post_thumbnail();
			//Display the title
			?>
			<a href="<?php the_permalink(); ?>"><h2><?php the_title() ?></h2></a>
			<?php
			// Diplaying the Tool List
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
				}
			}
			// Displaying the Description 
			if (function_exists ( 'get_field')) {
				if (get_field('description')) {
					echo '<p>'.get_field('description');
					'<p>';
				}
			}

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'michiko-portfolio' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'michiko-portfolio' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			endwhile; // End of the loop.
		

			get_template_part( 'template-parts/content', 'contact' );
			?>

	</main><!-- #main -->

<?php
get_footer();
