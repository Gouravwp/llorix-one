<?php
/**
 * @package llorix-one
 */
?>

<article itemscope itemprop="blogPosts" itemtype="http://schema.org/BlogPosting" itemtype="http://schema.org/BlogPosting" <?php post_class('border-bottom-hover'); ?> title="<?php printf( esc_html__( 'Blog post: %s', 'llorix-one' ), get_the_title() )?>">
	<header class="entry-header">

			<div class="post-img-wrap">
			 	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

					<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					?>
						<?php 
							$image_id = get_post_thumbnail_id();
							$image_url_big = wp_get_attachment_image_src($image_id,'parallax-one-post-thumbnail-big', true);
							$image_url_mobile = wp_get_attachment_image_src($image_id,'parallax-one-post-thumbnail-mobile', true);
						?>
				 		<picture itemscope itemprop="image">
							<source media="(max-width: 600px)" srcset="<?php echo esc_url($image_url_mobile[0]); ?>">
							<img src="<?php echo esc_url($image_url_big[0]); ?>" alt="<?php the_title_attribute(); ?>">
						</picture>
					<?php
						} else {
					?>
				 		<picture itemscope itemprop="image">
							<source media="(max-width: 600px)" srcset="<?php echo llorix_one_get_file('/images/no-thumbnail-mobile.jpg');?> ">
							<img src="<?php echo llorix_one_get_file('/images/no-thumbnail.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
						</picture>
					<?php } ?>

				</a>
				<div class="parallax-one-post-meta" itemprop="datePublished" datetime="<?php the_time( 'Y-m-d\TH:i:sP' ); ?>" title="<?php the_time( _x( 'l, F j, Y, g:i a', 'post time format', 'llorix-one' ) ); ?>">
					<?php echo get_the_date('F j, Y');?>
				</div>
				<div class="post-date entry-published updated">
					<span class="post-date-day"><?php the_time('d'); ?></span>
					<span class="post-date-month"><?php the_time('M'); ?></span>
				</div>
			</div>
			
			<div class="entry-meta list-post-entry-meta">
				<span itemscope itemprop="author" itemtype="http://schema.org/Person" class="entry-author post-author">
					<span  itemprop="name" class="entry-author author vcard">
					<i class="icon-man-people-streamline-user" aria-hidden="true"></i><a itemprop="url" class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" rel="author"><?php the_author(); ?> </a>
					</span>
				</span>
				<span class="posted-in entry-terms-categories" itemprop="articleSection">
					<i class="icon-basic-elaboration-folder-check" aria-hidden="true"></i><?php _e('Posted in','llorix-one'); ?> 
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( esc_html__( ', ', 'llorix-one' ) );
						$pos = strpos($categories_list, ',');
						if ( $pos ) {
							echo substr($categories_list, 0, $pos);
						} else {
							echo $categories_list;
						}
					?>
				</span>
				<a href="<?php comments_link(); ?>" class="post-comments">
					<i class="icon-comment-alt" aria-hidden="true"></i><?php comments_number( esc_html__('No comments','llorix-one'), esc_html__('One comment','llorix-one'), esc_html__('% comments','llorix-one') ); ?>
				</a>
			</div><!-- .entry-meta -->

		<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div class="colored-line-left"></div>
		<div class="clearfix"></div>

	</header><!-- .entry-header -->
	<div itemprop="description" class="entry-content entry-summary">
		<?php
			$ismore = @strpos( $post->post_content, '<!--more-->');
			if($ismore) : the_content( sprintf( esc_html__('Read more %s ...','llorix-one'), '<span class="screen-reader-text">'.esc_html__('about ', 'llorix-one').get_the_title().'</span>' ) );
			else : the_excerpt();
			endif;
		
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'llorix-one' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->