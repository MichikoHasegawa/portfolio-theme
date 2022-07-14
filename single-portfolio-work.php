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
			<section class="single-work-descriotion">
				<?php the_post_thumbnail('work-single-img'); ?>

				<!-- Display the title -->
				<h1><?php the_title(); ?></h1>

				<?php
				
				// Diplaying the Tool List
				$tools = get_field('tools');
					if( $tools ): ?>
					<ul>
					<?php foreach( $tools as $tool ): ?>
						<li><?php echo $tool; ?></li>
					<?php endforeach; ?>
					</ul>
					<?php endif; ?>

					<div class="link">
					<?php
				// Displaying the Links
				if (get_field('github')) {
					$githubLink = get_field('github');

					// GitHub Link
					if($githubLink){
						$github_url = $githubLink['url'];
						$github_title = $githubLink['title'];
						$github_target = $githubLink['target'] ? $githubLink['target'] : '_self';
					?>
						<!-- <div class="link"> -->
							<a href="<?php echo esc_url($github_url); ?>"target="<?php echo esc_attr($github_target); ?>"><?php esc_html_e( 'GitHub', 'michiko-portfolio' ); ?></a>
							<?php
					}
				}
					?>
					<!-- Live Site Link -->
					<?php
						if (get_field('live')) {
							?>
							<a  href="<?php echo esc_url($live_url); ?>"target="<?php echo esc_attr($live_target); ?>"><?php esc_html_e( 'Live Site', 'michiko-portfolio' ); ?></a>
						<!-- </div> -->
						<?php
						}
						?>
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
				<section class="single-work-steps">
					
					<!-- ------------------------ -->
					<?php
						if (get_field('wireframe_img') || get_field('wireframe_link')) {
							?>
							<!-- Display Heading: Wireframe -->
							<div class="single-work-step">
								<h2><?php esc_html_e( 'Wireframe', 'michiko-portfolio' ); ?></h2>
								<?php
							
								// Display Wireframe Image (ID)
								$wireframe_img = get_field('wireframe_img');
								$size = 'work-archive-img';
								$wireframe_link = get_field('wireframe_link');
								
								if($wireframe_link){
									$wireframe_url = $wireframe_link['url'];
									$wireframe_title = $wireframe_link['title'];
									$wireframe_target = $wireframe_link['target'] ? $wireframe_link['target'] : '_self';
								}
								
								if( $wireframe_img ) {
									?>
									<?php echo wp_get_attachment_image( $wireframe_img, $size ); ?>
									<?php
								}
							
								// Display Wireframe Link
								?>
								<div class="link">
										<a href="<?php echo esc_url($wireframe_url); ?>"target="<?php echo esc_attr($wireframe_target); ?>"><?php esc_html_e( 'View Wireframe', 'michiko-portfolio' ); ?></a>
								</div>
							</div>
							<?php
							} 
						
						if (get_field('prototype_img') || get_field('prototype_link')) {
							?>
							<!-- ----------------------------------- -->
							<!-- Display Heading: Prototype -->
							<div class="single-work-step">
								<h2><?php esc_html_e( 'Prototype', 'michiko-portfolio' ); ?></h2>
								<?php
								
								// Display Prototypr Image (ID)
								$prototype_link = get_field('prototype_link');
								$prototype_img = get_field('prototype_img');
								$prototype_img_size = 'work-archive-img';
								
								if($prototype_link){
									$prototype_url = $prototype_link['url'];
									$Prototype_title = $prototype_link['title'];
									$Prototype_target = $prototype_link['target'] ? $prototype_link['target'] : '_self';
								}
								
								if( $prototype_img ) {
									?>
									<?php echo wp_get_attachment_image( $prototype_img, $prototype_img_size ); ?>
									<?php
								}
								
								// Display Prototype Link
								?>
								<div class="link">
										<a href="<?php echo esc_url($prototype_url); ?>"target="<?php echo esc_attr($Prototype_target); ?>"><?php esc_html_e( 'View Prototype', 'michiko-portfolio' ); ?></a>

										
    									<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $Prototype_target ); ?>"><?php echo esc_html( $Prototype_title ); ?></a>
								</div>
							</div>
							<?php
						} 
						
						// ---------------------------
						if (get_field('style_img') || get_field('style_link')) {
							?>
							<!-- Display Heading: Style Guide -->
							<div class="single-work-step">
								<h2><?php esc_html_e( 'Style Guide', 'michiko-portfolio' ); ?></h2>
								<?php
							
								// Display Style Guide Image (ID)
								$style_img = get_field('style_img');
								$style_size = 'work-archive-img';
								$style_link = get_field('style_link');
								
								if($style_link){
									$style_url = $style_link['url'];
									$style_title = $style_link['title'];
									$style_target = $style_link['target'] ? $style_link['target'] : '_self';
								}
								
								if( $style_img ) {
									?>
									<?php echo wp_get_attachment_image( $style_img, $style_size ); ?>
									<?php
								}
							
								// Display Style Link
								?>
								<div class="link">
										<a href="<?php echo esc_url($style_url); ?>"target="<?php echo esc_attr($style_target); ?>"><?php esc_html_e( 'View Style Guide', 'michiko-portfolio' ); ?></a>
								</div>
							</div>
							<?php
							} 

							// ------------------------------------
						if (get_field('development_img')) {
						?>
						<div class="single-work-step">
								<h2><?php esc_html_e( 'Development', 'michiko-portfolio' ); ?></h2>
								<?php
								
								// Display Development Image (ID)
								$development_img = get_field('development_img');
								$development_img_size = 'work-archive-img';
								
								if( $development_img ) {
									?>
									<?php echo wp_get_attachment_image( $development_img, $development_img_size ); 
								}
								
								// Display GitHub Link
								?>
								<div class="link">
									<a href="<?php echo esc_url($github_url); ?>"target="<?php echo esc_attr($github_target); ?>"><?php esc_html_e( 'Github', 'michiko-portfolio' ); ?></a>
								
									<!-- Live Site Link -->
									<a  href="<?php echo esc_url($live_url); ?>"target="<?php echo esc_attr($live_target); ?>"><?php esc_html_e( 'Live Site', 'michiko-portfolio' ); ?></a>
								</div>	
						</div>
						<?php 
						} ?>
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
