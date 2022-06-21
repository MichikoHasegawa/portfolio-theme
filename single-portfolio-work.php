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
			
			if (get_field('live')) {
				$liveLink = get_field('live');

				if($liveLink){
					$live_url = $liveLink['url'];
					$live_title = $liveLink['title'];
					$live_target = $liveLink['target'] ? $liveLink['target'] : '_self';
				}
			}
			?>
			<!-- Display the thumbnail -->
			<section>
				<a  href="<?php echo esc_url($live_url); ?>"target="<?php echo esc_attr($live_target); ?>"><?php the_post_thumbnail('work-single-img'); ?></a>

				<!-- Display the title -->
				<h1><a href="<?php echo esc_url($live_url); ?>"target="<?php echo esc_attr($live_target); ?>"><?php the_title(); ?></a></h1>

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

				// Displaying the Links
				if (get_field('github')) {
					$githubLink = get_field('github');

					// GitHub Link
					if($githubLink){
						$github_url = $githubLink['url'];
						$github_title = $githubLink['title'];
						$github_target = $githubLink['target'] ? $githubLink['target'] : '_self';
					?>
						<div class="link">
						<a href="<?php echo esc_url($github_url); ?>"target="<?php echo esc_attr($github_target); ?>"><?php echo esc_html($github_title); ?></a>
						<?php
					}
				}
					?>
					<!-- Live Site Link -->
						<a  href="<?php echo esc_url($live_url); ?>"target="<?php echo esc_attr($live_target); ?>"><?php echo esc_html($live_title); ?></a>
						</div>
						<?php

					// Display Discriptions
					if (function_exists ( 'get_field')) {
						if (get_field('description')) {
							echo '<p>'.get_field('description');
							'<p>';
						}
						}
				?>
				</section>
<!------------------------------------------------------------------>
				<section>
					<div>
					<?php
						if (get_field('wireframe_img') && get_field('wireframe_link')) {
							?>
							<!-- Display Heading: Wireframe -->
							<h2><?php esc_html_e( 'Wireframe', 'michiko-portfolio' ); ?></h2>
							<?php
							
							// Display Wireframe Image (ID)
							$image = get_field('wireframe_img');
							$size = 'work-archive-img';
							$WireframeLink = get_field('wireframe_link');
							
							if($WireframeLink){
								$wireframe_url = $WireframeLink['url'];
								$wireframe_title = $WireframeLink['title'];
								$wireframe_target = $WireframeLink['target'] ? $WireframeLink['target'] : '_self';
							}
							
							if( $image ) {
								?>
								<a href="<?php echo esc_url($wireframe_url); ?>"><?php echo wp_get_attachment_image( $image, $size ); ?></a>
								<?php
							}
							
							// Display Wireframe Link
							?>
							<div class="link">
									<a href="<?php echo esc_url($wireframe_url); ?>"target="<?php echo esc_attr($wireframe_target); ?>"><?php echo esc_html($wireframe_title); ?></a>
							</div>
							<?php
							} 
							?>
						</div>

						<div>
						<?php
						if (get_field('prototype_img') && get_field('prototype_link')) {
							?>
							<!-- Display Heading: Prototypr -->
							<h2><?php esc_html_e( 'Prototype', 'michiko-portfolio' ); ?></h2>
							<?php
							
							// Display Prototypr Image (ID)
							$PrototypeLink = get_field('prototype_link');
							
							if($PrototypeLink){
								$Prototype_url = $PrototypeLink['url'];
								$Prototype_title = $PrototypeLink['title'];
								$Prototype_target = $PrototypeLink['target'] ? $PrototypeLink['target'] : '_self';
							}
							
							if( $image ) {
								?>
								<a href="<?php echo esc_url($Prototype_url); ?>"><?php echo wp_get_attachment_image( $image, $size ); ?></a>
								<?php
							}
							
							// Display Wireframe Link
							?>
							<div class="link">
									<a href="<?php echo esc_url($Prototype_url); ?>"target="<?php echo esc_attr($Prototype_target); ?>"><?php echo esc_html($Prototype_title); ?></a>
							</div>
							<?php
							} 
							?>
						</div>
					</section>
					<?php
				
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
