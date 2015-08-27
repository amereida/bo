<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section id="content" role="main">

<div class="row">

	<?php echo edit_post_link("lapiz"); ?>

	<!--BREADCUMBS -->

	<div class="col-sm-8 col-sm-offset-2">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>

	<!-- LÍMITE DEL CONTENIDO -->

	<div class="col-sm-8 col-sm-offset-2">

	<!-- IMAGEN DESTACADA + TÍTULO DE LA PÁGINA -->

		<header>
			<?php	if ( has_post_thumbnail() ) {
			echo '<div class="jumbo-foto">'.'<h1>'.get_the_title().'</h1>'.get_the_post_thumbnail().'</div>';
			 }
			 else{
			 	echo '<h1>'.get_the_title().'</h1>';
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
			
			<div class="row"> 
			<h2>Documentos</h2>

			<?php
				$documentos = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'documentos',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($documentos as $link){

					echo '<a href="'.get_page_link($link->ID).'"><div class="col-md-4 docs">'.get_the_post_thumbnail($link->ID).'<div class="overtitle"><h3>'.get_the_title($link->ID).'</h3></div></div></a>';
				}
			?>
			</div>

		</div>
	</div> <!-- COLUMNAS -->
</div> <!-- ROW -->



<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>