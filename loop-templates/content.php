<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="site-main__content">


	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<header class="entry-header">
			<div class="entry-category">
				<?php the_category(
			sprintf( '<h3 class="entry-category"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>'
				);	 ?>

			</div>

			<div class="entry-title">
				<?php
					the_title(
						sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></h2>'
						);
				?>
			</div>
			<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on_v2(); ?>
			</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->

		<figure>
			<?php echo get_the_post_thumbnail( $post->ID); ?>	
		</figure>
		
	</article><!-- #post-## -->
	
</div>
