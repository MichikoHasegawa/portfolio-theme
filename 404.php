<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Michiko_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'michiko-portfolio' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Please go back to home or view my work!.' ); ?></p>
			</div><!-- .page-content -->

			<div>
				<h2 class="page-title"><?php esc_html_e( 'View My Work', 'michiko-portfolio' ); ?></h2>
				<div class="work-content">
					<?php
				$args = array(
					'post_type'     => 'portfolio-work',
					'post_per_page' => -1,
				);

				$query = new WP_Query( $args );
				if( $query -> have_posts() ) {
					?>
					<?php
					while( $query->have_posts()) {
						$query->the_post();
						?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
							
							<?php
					} ?>
				</div>
				<?php
				
				wp_reset_postdata();

				};
		?>
			</div>
		</section><!-- .error-404 -->
	</main><!-- #main -->
<?php
get_footer();
