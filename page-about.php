<?php
/**
 * The template for displaying all pages
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
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			// if( get_field('about_me_description')) {
			// 		echo '<p>'.get_field('about_me_description'); '</p>';
			// }
		endwhile; // End of the loop.






		$args = array(
			'pagename'     => 'about',
		);

		$query = new WP_Query( $args );
		if( $query -> have_posts() ) {
			?>
			<section class="work">
			<?php
			while( $query->have_posts()) {
				$query->the_post();
				
				if (function_exists ( 'get_field')) {
		
					if(get_field('name')) {
						echo '<h1>'.get_field('name'). '</h1>';
					};

					if(get_field('about_me_description')) {
						echo '<p class="about-description">'.get_field('about_me_description'). '</p>';
					};
				}
				?>
				<section>
				<!-- Diplaying the Development Tool  -->
					<div>
					<?php
					if ( function_exists ( 'get_field' )) {
						if ( get_field('development_tools')) {
							echo '<h2>' .get_field('development_tools').'</h2>';
						}
					}
					// Diplaying the Development Tool List
					$tools = get_field('development_tool_items');
					if( $tools ): ?>
						<ul class="tool-list">
						<?php foreach( $tools as $tool ): ?>
							<li><?php echo $tool; ?></li>
						<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>

					<!-- Diplaying the Design Tool  -->
					<div>
					<?php
					if ( function_exists ( 'get_field' )) {
						if ( get_field('design_items')) {
							echo '<h2>' .get_field('design_items').'</h2>';
						}
					}

					// Diplaying the Design Tool List
					$tools = get_field('design_tool_itmes');
					if( $tools ): ?>
						<ul class="tool-list">
						<?php foreach( $tools as $tool ): ?>
							<li><?php echo $tool; ?></li>
						<?php endforeach; ?>
						</ul>
						<?php endif; 
						?>
					</div>
			<?php } ?>

			</section>

			<?php
			echo '</section>';
			wp_reset_postdata();

		};

			
	

	// else :

	// 	get_template_part( 'template-parts/content', 'none' );

	// endif;



	get_template_part( 'template-parts/content', 'contact' );
		
		
		
	
		?>

	</main><!-- #main -->

<?php
get_footer();
