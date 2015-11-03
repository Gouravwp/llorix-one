
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package llorix-one
 */

	get_header(); 
?>

	</div>
	<!-- /END COLOR OVER IMAGE -->
</header>
<!-- /END HOME / HEADER  -->

<?php
	$parallax_one_blog_header_image = get_theme_mod( 'parallax_one_blog_header_image', parallax_get_file('/images/background-images/background-blog.jpg') );
	$parallax_one_blog_header_title = get_theme_mod( 'parallax_one_blog_header_title', esc_html__('BLOG','llorix-one')  );
	$parallax_one_blog_header_subtitle = get_theme_mod( 'parallax_one_blog_header_subtitle', esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis risus augue. Cras at mollis eros. Sed porttitor quam eget aliquam mattis. Fusce leo nibh, ornare at volutpat ut, luctus dictum elit. Mauris non vehicula eros, ac lacinia lorem. Quisque fermentum purus ac scelerisque suscipit. Morbi et iaculis tellus. Proin ut urna ac purus suscipit iaculis. Aliquam erat volutpat. Donec at viverra magna. Fusce efficitur eros a nunc volutpat ultrices. Aenean mattis purus lectus, quis fermentum diam placerat in.','llorix-one') );
	
	if( !empty($parallax_one_blog_header_image) || !empty($parallax_one_blog_header_title) || !empty($parallax_one_blog_header_subtitle) ):
		
		if( !empty($parallax_one_blog_header_image) ):
			echo '<div class="archive-top" style="background-image: url('.$parallax_one_blog_header_image.');">';
		else:
			echo '<div class="archive-top">';
		endif;
				echo '<div class="section-overlay-layer">';
					echo '<div class="container">';

						if( !empty($parallax_one_blog_header_title) ):
							echo '<p class="archive-top-big-title">'.$parallax_one_blog_header_title.'</p>';
							echo '<p class="colored-line"></p>';							
						endif;
						
						if( !empty($parallax_one_blog_header_subtitle) ):
							echo '<p class="archive-top-text">'.$parallax_one_blog_header_subtitle.'</p>';
						endif;	

					echo '</div>';
				echo '</div>';
			echo '</div>';
		
	endif;
	
?>


<div role="main" id="content" class="content-warp">
	<div class="container">
		<div id="primary" class="content-area col-md-8 post-list">
			<main <?php if(have_posts()) echo 'itemscope itemtype="http://schema.org/Blog"'; ?> id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>
				
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php the_posts_navigation(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div>
</div><!-- .content-wrap -->

<?php get_footer(); ?>
