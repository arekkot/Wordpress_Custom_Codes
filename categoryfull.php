
<?php get_header(); ?>

<main class="container" role="main" id="main">
    <div class="row">
		<div class="col-sm-12 col-md-8 col-md-push-2">
			<div class="row">
				<?php
					$subkategorie = array();
					if (is_category()){
						$cur_cat = get_query_var('cat');
						
						if ($cur_cat){
							$subkategorie = get_categories(array(
								'parent' => $cur_cat,
								'depth' => 1,
								'orderby'       => 'name',
								'paged' 		=> $paged,
								'order'         => 'ASC',
								'hierarchical'  => true,
								'pad_counts' => 0
							));
						}
						
						if (sizeof($subkategorie)>0){
							foreach($subkategorie as $kategoria){
								?>
								
								<article class="col-xs-6 custom-xs-12 singleAktualnosc">
									<div class="singleElementPodzial">
										<h3 class="singleAktualnoscInfoBoxTitle"><?php echo $kategoria->name;?></h3>
										<a href="<?php echo get_term_link($kategoria); ?>" class="singleAktualnoscInfoBoxMore" title="<?php echo $kategoria->name;?>">więcej &gt;</a>
									</div>
								</article>

								<?php
								
							}
						} 
						else {

							function wpdocs_custom_excerpt_length( $length ) {
							    return 20;
							}
							add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
							
							$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1; $args = array( 'posts_per_page' => get_option('posts_per_page'), 'paged' => $paged, );
							$myposts = new WP_Query(
									array(
									'posts_per_page' => 20, 
									'paged' => $paged, 
									'cat' => $cur_cat, 
									'post_type' => 'any', 
									'post_status'=>'publish',
									'total' => $wp_query->max_num_pages
									));
								while($myposts->have_posts()): $myposts->the_post(); ?> 
								<article class="col-xs-6 custom-xs-12 singleAktualnosc singleAktualnoscHeight">
									<div class="wiadomoscSingleListWrapperImg">
										<?php if(has_post_thumbnail()){ ?>
											<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $imgAlt; ?>">
										<?php }else{ ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/logo_zastepcze.png" alt="Obraz zastępczy">
										<?php } ?>
									</div>
									<div class="singleElementPodzial">
										<h3 class="singleAktualnoscInfoBoxTitle"><?php the_title();?></h3>
										<p class="singleAktualnoscInfoBoxExcerpt"><?php the_excerpt(); ?></p>
										<a href="<?php the_permalink();?>" class="singleAktualnoscInfoBoxMore displayBlock">więcej &gt;</a>
									</div>
								</article> 
																				
								<?php 
								endwhile;?>
	 
							<?php						
								wp_pagenavi( array( 'query' => $myposts ) );
								wp_reset_postdata();
								remove_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length');	
						}
					}
				?>				 
				<div class="col-xs-12 paginationWrapper"></div>
			</div>
		</div>
		<div class="col-sm-6 col-md-2 col-md-pull-8 aktualnosciSidebar">
			<?php dynamic_sidebar( 'aktualnosc_left' ); ?>
		</div>
		<div class="col-sm-6 col-md-2 aktualnosciSidebarRight">
			<div class="archiveBox">
			  <a href="#">Archiwum<br>Wiadomości</a>
			</div>
			<div class="row">
			  <?php dynamic_sidebar( 'aktualnosc_right' ); ?>
			</div>
        </div>
      </div>
    </div>
  </main>





<?php get_footer(); ?>
