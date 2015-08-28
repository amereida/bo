<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section id="content" role="main">



<div class="row">
	<?php echo edit_post_link( "lapiz" ); ?>
	<!--BREADCUMBS -->

	<div class="col-sm-8 col-sm-offset-2">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>

	<!-- LÍMITE DEL CONTENIDO -->

	<div class="col-sm-8 col-sm-offset-2 white">

	<!-- IMAGEN DESTACADA + TÍTULO DE LA PÁGINA -->

	<header>
		<?php	if ( has_post_thumbnail() ) {
			echo the_post_thumbnail();
			}
			else {
			echo '<img class="full-width" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
			}
		?>
		<h1><?php echo get_the_title(); ?></h1>
	</header>

	<!-- CONTENIDO DE LA PÁGINA -->

		<div class="well">

			<article class="entry-content">
				<div class="fecha">
					<?php the_time(get_option('date_format')) ?>
				</div>
				<?php echo the_content(); ?>
			</article>
				
			<!-- GeoMashup -->
			<div id="geomashup">
               	<?php echo GeoMashup::map('width=100%'); ?>
       		</div>

       		<!-- ARCHIVADO EN (MUESTRA ETIQUETAS DEL POST) -->

			<div class="labels pull-right">Archivado en: 
				<?php
					$posttags = get_the_tags();
					if ($posttags) {
						foreach($posttags as $tag) {
							echo "<a class='label' href=\"";
							echo get_tag_link($tag->term_id);
							echo "\">".$tag->name."</a>";
						}
					}
				?>
			</div>

		</div> <!-- WELL -->
	</div> <!-- COLUMNAS -->

	<!-- POST RELACIONADOS -->

	<div class="col-sm-8 col-sm-offset-2">
		<div class="well">
			<?php related_posts(); ?>
		</div>
	</div>

</div> <!-- ROW -->

</section>

<?php endwhile; endif; ?>	

<?php get_footer(); ?>