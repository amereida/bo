<?php get_header(); ?>

<section id="content" role="main">
	
	<?php echo edit_post_link( "lapiz" ); ?> 
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">


		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php	if ( has_post_thumbnail() ) {
			echo '<div class="jumbo-foto">'.'<h1>'.get_the_title().'</h1>'.get_the_post_thumbnail().'</div>';
			 }

			 else{
			 	echo '<h1>'.get_the_title().'</h1>';
			 }
			?>
	
			<div class="row">

				
			</div>
			<div class="well">

				<article class="entry-content">
					<?php echo the_content(); ?>
				</article>
			
			<div class="row">
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

					echo '<a href="'.get_page_link($link->ID).'"><div class="col-md-4 img-obra">'.get_the_post_thumbnail($link->ID).'<div class="overtitle"><h3>'.get_the_title($link->ID).'</h3></div></div></a>';
				}
			?>
			</div>

			<div class="row">

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

			</div>

			<div class="row">

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

			</div>

			
				<!-- GeoMashup -->
				<div id="geomashup">
                	<?php echo GeoMashup::map('width=100%'); ?>
       			</div>
			</div>
		</div>

	</div> 
	<div class="row">


	<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>