<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section id="content" role="main">
<div class="container">
<div class="row">
	
	<!--EDIT SECTION -->
	<div class='edit'>
		<?php echo edit_post_link( "lapiz" ); ?>
		<?php if ( is_user_logged_in() ) { 
			echo '<a href="'.get_permalink(get_page_by_title('Ayuda')).'" class="link-ayuda"><span class="icn icn-libro"></span> ayuda</a>';
		} ?> 
	</div>
	
	<!--BREADCUMBS -->

	<div class="col-sm-12 col-lg-10 col-lg-offset-1">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>

	<!-- LÍMITE DEL CONTENIDO -->

	<div class="col-sm-12 col-lg-10 col-lg-offset-1 white">

	<!-- IMAGEN DESTACADA + TÍTULO DE LA PÁGINA -->

		<header>
			<?php	if ( has_post_thumbnail() ) {
			echo get_the_post_thumbnail().'<h1 class="entry-title">'.get_the_title().'</h1>';
			 }
			 else{
			 	echo '<h1 class="entry-title">'.get_the_title().'</h1>';
			 }
			?>
		</header>

	<!-- CONTENIDO DE LA PÁGINA -->
	
		<div class="well">
			<div class="page-content">
				<article class="entry-content">
					<?php echo the_content(); ?>
				</article>
			</div>
			
			<div class="row"> <!-- OBRAS INTERIORES -->
			<h2>Interiores</h2>

			<?php
				$interiores = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'interiores',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($interiores as $link){

					echo '<a href="'.get_page_link($link->ID).'"><div class="col-md-4 img-obra">'.get_the_post_thumbnail($link->ID, large).'<div class="overtitle"><h3>'.get_the_title($link->ID).'</h3></div></div></a>';
				}
			?>
			</div> <!-- OBRAS INTERIORES -->

			<div class="row"> <!-- OBRAS EXTERIORES -->

			<h2>Exteriores</h2>

			<?php
				$exteriores = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'exteriores',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($exteriores as $link){
					echo '<a href="'.get_page_link($link->ID).'"><div class="col-md-4 img-obra">'.get_the_post_thumbnail($link->ID).'<div class="overtitle"><h3>'.get_the_title($link->ID).'</h3></div></div></a>';
				}
			?>

			</div> <!-- OBRAS EXTERIORES -->

			<div class="row"> <!-- ESCULTURAS -->

			<h2>Esculturas</h2>

			<?php
				$esculturas = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'esculturas',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($esculturas as $link){
					echo '<a href="'.get_page_link($link->ID).'"><div class="col-md-4 img-obra">'.get_the_post_thumbnail($link->ID).'<div class="overtitle"><h3>'.get_the_title($link->ID).'</h3></div></div></a>';
				}
			?>

			</div> <!-- ESCULTURAS -->

			
			<!-- GeoMashup -->
			<div id="geomashup">
               	<?php echo GeoMashup::map('width=100%'); ?>
       		</div>

		</div>
	</div> <!-- COLUMNAS -->
</div> <!-- ROW -->
</div>


<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>