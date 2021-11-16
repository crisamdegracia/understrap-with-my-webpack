<ul class="nav navbar-nav">
	<?php /* Get the ID of the parent page if meron. */
                            //   global $post;
                            // $parentPageID  = wp_get_post_parent_id(  get_the_ID() ); 
                            // it will return zero if there is no parent page 
                            // $pageCurrentID = get_the_ID();
                          
                            //checking if theres a children
                        //    $fashionChildCount = get_posts( array( 'post_parent' => 100, 'post_type' => $post->post_type)  );
                        //    $gadgetsChildCount = get_posts( array( 'post_parent' => 110, 'post_type' => $post->post_type)  );
                        //    $lifestyleChildCount = get_posts( array( 'post_parent' => 112, 'post_type' => $post->post_type)  );
                    
						// if ( ! count( $fashionChildCount) > 0 )  {
                            
                            // wp_list_pages( array(
                            //     //title_li is empty -- pag meron neto lalabas ung "pages" anoyying
                            //     //child_of - numerical ID of a certain page or post
                            //     //sort_column => 'menu_order' we can choose the order output of link -
                            //     // ^ you can control this on right panel and choose the order number
                            //     'title_li' => NULL,
                            //     'child_of' => get_the_ID(),
                            //     'sort_column' => 'menu_order'
                    
                    
                            // ));
								
							$fashionCategory = get_the_category_by_ID('22'); // get the category name from id
							$category = get_the_category(); 
							$category_parent_id = $category[0]->category_parent;

							// echo $category_parent_id;
							// echo $fashionCategory;
							

						
                            ?>



	<li class="nav-item <?php if( is_page('news') ) echo 'current-menu-item' ?> ">
		<a href="<?php echo site_url('/news')?>" class="nav-link">news</a>
	</li>

	<?php	

							
								// $num_cats  = wp_count_terms('fashion');

								$term_id = 22; // use get_queried_object()->term_id; to get the current term id 
								$taxonomy_name = 'category'; // use use get_queried_object()->taxonomy; to get the current taxonomy name
								$countchildren = count (get_term_children( $term_id, $taxonomy_name ));
							

								if( $countchildren > 0 ) {

									$query = new WP_Query( array (
										'category_name' => get_term( $term_id )->name 
									)); ?>

	<li class="nav-item custom-dropdown <?php if( is_page('fashion') ) echo 'current-menu-item' ?> ">
		<a href="<?php echo site_url('/fashion')?>" class="nav-link">Fashion2 <span><i
					class="fas fa-sort-down"></i></span></a>
		<div class="container">
			<div class="row">
				<div class="col-md-3">

					<?php
												while($query->have_posts()){
													$query->the_post(); ?>
					<?php the_category(); ?>


					<?php } //while loop
											wp_reset_postdata();	
											 ?>
				</div>
				<div class="col-md-4 ">
					<?php
												while($query->have_posts()){
													$query->the_post(); ?>
					<?php the_title(); ?>
					<?php }?>
				</div>
			</div>
		</div>
	</li>
	<?php } else { ?>
	<li class="nav-item <?php if( is_page('fashion') ) echo ' current-menu-item' ?> ">
		<a href="<?php echo site_url('/fashion')?>" class="nav-link">Fashion</a>
	</li>
	<?php } ?>
</ul>