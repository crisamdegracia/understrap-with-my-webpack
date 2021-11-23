<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper skwaku skwama" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<!-- Do the left sidebar check and opens the primary div -->
		<?php /* get_template_part( 'global-templates/left-sidebar-check' );  */?>

		<main class="site-main " id="main">

			<div class="site-main__container">
				<?php
				if ( have_posts() ) {
					// Start the Loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );

						
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}

				?>

			</div><!-- .row -->


			<div class="second-container">
				<?php 
				
				$query  = new WP_Query(array(
					// 'category_name' => 'fashion',
					// 'cat' => get_the_category($query->ID),
					'post_status' => 'publish',
					'post_type' => 'post',
					'posts_per_page' => 6,
					)); ?>

				<ul class="nav nav-tabs">



					<?php
					
					function catTitleFix($name){
						
					$catFirstLetterSmall = strtolower( $name );
					$catChangeSpace = str_replace(' ', '-', $catFirstLetterSmall);
						
					return $catChangeSpace; 
					}
				while( $query->have_posts() ){
					$query->the_post();
					

					foreach((get_the_category()) as $category){

					// $catFirstLetterSmall = strtolower( $category->name );
					// $catChangeSpace = str_replace(' ', '_', $catFirstLetterSmall);
		
					?>

					<li class="nav-item">
						<a class="nav-link nav-link-trigger active  post-<?php echo $post->ID ?>  " id="<?php echo catTitleFix($category->name) ?>-tab"
							#<?php echo catTitleFix($category->name)  ?>><?php echo $category->name ?></a>
					</li>

					<?php
				}	 // foreach
						
					// echo category_description($category);

					?>

					<?php
					} // while ?>
				</ul>

				<div class="tab-content" id="myTabContent">
					<?php
							while($query->have_posts()){
							$query->the_post();

							foreach((get_the_category()) as $category){
							?>
					<div class="tab-pane-trigger fade show  post-<?php echo $post->ID ?> " id="<?php echo catTitleFix($category->name) ?>" role="tabpanel"
						aria-labelledby="<?php echo catTitleFix($category->name)  ?>-tab">
						<p><?php the_content() ?></p>
					</div>

					<?php 	 ?>


					<?php		
							} //foreach
						} //while
			 	?>
				</div>


			</div>

		</main><!-- #main -->

		<!-- The pagination component -->
		<?php understrap_pagination(); ?>

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>



	</div><!-- #content -->




</div><!-- #index-wrapper -->

<?php
get_footer();