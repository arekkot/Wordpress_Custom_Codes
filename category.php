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
							'order'         => 'ASC',
							'hierarchical'  => true,
							'pad_counts' => 0
						));
					}
					
					if (sizeof($subkategorie)>0){
						echo '<h3>subkategorie</h3><ul>';
						foreach($subkategorie as $kategoria){
							echo '<li><a href="'.get_term_link($kategoria).'">'.$kategoria->name.'</a></li>';
						}
						echo '</ul>';
					}
					else {
						echo '<h3>posty '.$cur_cat.'</h3>';
						$myposts = get_posts(array('numberposts' => 5, 'offset' => 0, 'category' => $cur_cat, 'post_type' => 'any', 'post_status'=>'publish'));
						print_r($myposts);
						foreach($myposts as $post){
							print_r($post);
							
						}
					}
					//wp_pagenavi();
					
				}
			?>	
			<section class="col-xs-6 custom-xs-12 singleAktualnosc">
				<div class="wiadomoscSingleListWrapperImg">
				
					<img src="" alt="">
		
					<img src="" alt="">
			
				</div>
				<div class="singleAktualnoscInfoBox">
					<time datetime="" class="singleAktualnoscInfoBoxTime"></time>
					<h2 class="singleAktualnoscInfoBoxTitle"></h2>
					<p class="singleAktualnoscInfoBoxExcerpt"></p>
					<a href="" class="singleAktualnoscInfoBoxMore">więcej &gt;</a>
				</div>
			 </section>
			 
			<div class="col-xs-12 paginationWrapper"></div>

        </div>
      </div>
      <div class="col-sm-6 col-md-2 col-md-pull-8 aktualnosciSidebar">
        <h3 class="mainTitle">Województwo</h3>
        <ul class="aktualnosciSidebarUl">
          <li><a href="">Lorem ipsum</a></li>
          <li><a href="">Lorem ipsum</a></li>
          <li class="active"><a href="">Lorem ipsum</a></li>
          <li><a href="">Lorem ipsum</a></li>
        </ul>
        <h3 class="mainTitle">Filtruj</h3>
          <form action="" class="filterForm">
		  <fieldset>
			<legend class="hidden">Filtrowanie</legend>
			<label for="sejmik" class="hidden">Sejmik</label>
              <p><input type="checkbox" name="vehicle" id="sejmik" value="jeden"> Sejmik</p>
			  <label for="Urzad" class="hidden">Sejmik</label>
              <p><input type="checkbox" name="vehicle" id="Urzad" value="dwa" checked="checked"> Urząd</p>
			  <label for="Zarzad" class="hidden">Sejmik</label>
              <p><input type="checkbox" name="vehicle" id="Zarzad" value="trzy"> Zarząd</p>
			  <label for="sejmik1" class="hidden">Sejmik</label>
              <p><input type="checkbox" name="vehicle" id="sejmik1" value="cztery"> Sejmik</p>
			  <label for="Urzad2" class="hidden">Sejmik</label>
              <p><input type="checkbox" name="vehicle" id="Urzad2" value="piec" checked="checked"> Urząd</p>
			  <label for="Zarzad3" class="hidden">Sejmik</label>
              <p><input type="checkbox" name="vehicle" id="Zarzad3" value="szejsc"> Zarząd</p>
              <input type="submit" value="SZUKAJ">
			  </fieldset>
          </form>
      </div>
      <div class="col-sm-6 col-md-2 aktualnosciSidebarRight">
        <div class="archiveBox">
          <a href="#">Archiwum<br>Wiadomości</a>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-12">
            <div class="archiveBoxSingle">
              <div>
                <p>Lorem Ipsum Dolor</p>
              <span>Sit amet snbsbdkjnfsdk  kj bkj  njdskfnsjdkf njsnjk fnsd jkdsn kjnsdskjd fnso iio</span>
              </div>
            </div>
          
          
        </div>
        <div class="col-xs-6 col-sm-12">
          <div class="archiveBoxSingle">
            <img src="./images/aktualnosciArchive.jpg" alt="">
            <div>
              <p>Lorem Ipsum Dolor</p>
            <span>Sit amet snbsbdkjnfsdk  kj bkj  njdskfnsjdkf njsnjk fnsd jkdsn kjnsdskjd fnso iio</span>
            </div>
          </div>
        </div>
          
          
        </div>
        
      </div>
    </div>
  </main>





<?php get_footer(); ?>
