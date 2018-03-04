<?php get_header(); ?>

<?php
	$slider = get_field( 'dodaj_nowy_slider', 'option' );
	echo '<pre>';
print_r($slider);
echo '</pre>';
	?>
    <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
                <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
                    <div class="slotholder"></div>
                    <ul><!-- SLIDE  -->
					
					<?php if ( have_rows( 'dodaj_nowy_slider', 'option' ) ) : ?>
						<?php while ( have_rows( 'dodaj_nowy_slider', 'option' ) ) : the_row(); ?>
							<?php if ( get_sub_field( 'dodaj_obraz' ) ) { ?>
							
							<li data-index="rs-3049" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">                        

                            <!-- MAIN IMAGE -->
                            <img src="<?php the_sub_field( 'dodaj_obraz' ); ?>"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
							</li>

							<?php } ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>                      
                    </ul>
                </div>
    </div><!-- END REVOLUTION SLIDER -->

    <!-- Offer -->
    <section class="flat-row what-we-do offer" id="services">        
        <div class="container">            
            <div class="row">
			
			<?php if ( have_rows( 'dodaj_nowa_usluge', 'option' ) ) : ?>
				<?php while ( have_rows( 'dodaj_nowa_usluge', 'option' ) ) : the_row(); ?>
				
				 <div class="col-md-4">
                    <div class="iconbox-item">
                        <div class="iconbox left style3">  
							<?php if ( get_sub_field( 'obrazek_uslugi' ) ) { ?>						
								<img src="<?php the_sub_field( 'obrazek_uslugi' ); ?>" alt="serives"> 
							<?php } ?>
							<div class="box-content">
                                <div class="box-title">
                                    <a href="#"><?php the_sub_field( 'nazwa_uslugi' ); ?></a>
                                </div>  
                                <?php the_sub_field( 'tekst_uslugi' ); ?>
                                <a href="<?php the_sub_field( 'czytaj_wiecej_-_wybierz_strone' ); ?>" class="box-redmore"><?php the_field( 'czytaj_wiecej', 'option' ); ?> </a>
                            </div>
                            
                        </div><!-- /.iconbox -->
                    </div><!-- /.iconbox-item -->
                </div>	
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
            </div>  
        </div><!-- /.container -->   
    </section>        

    <!-- Portfolio -->
    <section class="flat-row portfolio-style2" id="work">  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section color-white">
                        <h1 class="title"><?php the_field( 'ostatnie_realizacje', 'option' ); ?></h1>                                  
                    </div>
                </div><!-- /.col-md-12 -->
            </div>
			
			
			
		<div class="row">	
		<div class="col-md-12">    		
		<ul class="portfolio-filter">
		    <li class="active"><a data-filter="*" href="#">Wszystkie realizacje</a></li>
                <?php $wcatTerms = get_terms('realization_types', array('hide_empty' => 0)); 
                foreach($wcatTerms as $wcatTerm) : 
                ?>
			<li>
				<a data-filter="<?php echo $wcatTerm->slug; ?>"><?php echo $wcatTerm->name; ?></a>
			</li>		  
		    <?php 
		    endforeach; 
		   ?>
			</ul>		
		    </div> 	  
			</div> 
			
        </div> 
        <div class="flat-portfolio v4">             
            <div class="portfolio-wrap clearfix">
			<?php
			$the_query = new WP_Query( array(
				'post_type' => 'realization',
				'posts_per_page' => 8,
			) );
			while ( $the_query->have_posts() ) :	$the_query->the_post(); ?>
			<?php $post_terms = get_the_terms( get_the_ID(), 'realization_types' ); ?>
                <div class="item <?php foreach($post_terms as $post_term): echo $post_term->slug .' '; endforeach; ?>">                                
                    <div class="featured-images">
                        <?php the_post_thumbnail(); ?>
                        <h3 class="project-title"><?php the_title(); ?></h3>
                        <div class="overlay">  
                            <ul class="portfolio-details">
                                <li><a class="popup-gallery" href="<?php echo get_template_directory_uri(); ?>/images/portfolio/1.jpg">
                                    <i class="fa fa-search"></i></a>
                                </li>
                                <li><a href="<?php the_permalink(); ?>"><i class="fa fa-external-link"></i></a></li>
                            </ul>                      
                        </div>                       
                    </div><!-- /.featured-images -->                                              
                </div><!-- /.portfolio-item -->
				<?php endwhile;
			wp_reset_postdata(); ?>
			</div><!-- /.portfolio-wrap -->
		</div><!-- /.portfolio-wrap -->

    </section>     
      </div>

    <!-- Map -->
    <div class="flat-row map">
        <form id="contactform" class="flat-contact-form  inner-map style2 bg-dark height-small" method="post" action="./contact/contact-process.php">
                <div class="field clearfix">      
                    <div class="wrap-type-input">                    
                        <div class="input-wrap name">
                            <input type="text" value="" tabindex="1" placeholder="<?php the_field( 'imie', 'option' ); ?>" name="name" id="name" required>
                        </div>
                        <div class="input-wrap email">
                            <input type="email" value="" tabindex="2" placeholder="<?php the_field( 'e-mail', 'option' ); ?>" name="email" id="email" required>
                        </div>                               
                    </div>
                    <div class="textarea-wrap">
                        <textarea class="type-input" tabindex="3" placeholder="<?php the_field( 'wiadomosc', 'option' ); ?>" name="message" id="message-contact" required></textarea>
                    </div>
                </div>
                <div class="submit-wrap">
                    <button class="flat-button bg-theme"><?php the_field( 'wyslij_wiadomosc', 'option' ); ?></button>
                </div>
            </form><!-- /.comment-form -->    
        <div id="flat-map">  
        </div>        
    </div><!-- /.flat-row -->

    <!-- Flat client style1 -->
    <section class="flat-row background-client">
        <div class="container">
            <div class="row">       
                <div class="col-md-12">
                    <div class="flat-client style1" data-item="6" data-nav="false" data-dots="false" data-auto="true" data-margin="0">
					<?php if ( have_rows( 'dodaj_nowego_klienta', 'option' ) ) : ?>
						<?php while ( have_rows( 'dodaj_nowego_klienta', 'option' ) ) : the_row(); ?>
							<?php if ( get_sub_field( 'dodaj_logo_firmy' ) ) { ?>
								<div class="item"><img src="<?php the_sub_field( 'dodaj_logo_firmy' ); ?>" alt="<?php the_sub_field( 'dodaj_tekst_alternatywny' ); ?>"></div>
							<?php } ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
                    </div><!-- /.flat-client -->      
                </div>
            </div>
        </div>             
    </section>    

    <!-- Mail Chimp -->
    <section class="flat-row mail-chimp">        
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="text">
                        <h3><?php the_field( 'potrzebujesz_wiecej_informacji', 'option' ); ?></h3>
                        <p><?php the_field( 'zostaw_swoj_email_bediemy_cie_informowac_o_nowosciach_na_biezaco', 'option' ); ?></p>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="subscribe">
                        <form method="post" id="subscribeForm" class="subscribe-form" action="./contact/subscribe-process.php">
                            <label>
                                <input type="email" id="emailsubscribe" name="email" placeholder="<?php the_field( 'wpisz_swoj_email', 'option' ); ?>" value="" required="required" title="<?php the_field( 'wpisz_swoj_adres_email', 'option' ); ?>">
                            </label>
                            <input type="submit" class="submit" value="<?php the_field( 'wyslij', 'option' ); ?>">
                        </form>
                    </div>
                </div>
            </div> 
        </div><!-- /.container -->   
    </section>
<?php get_footer(); ?>
