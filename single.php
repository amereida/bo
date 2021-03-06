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
	<div class="col-md-10 col-md-offset-1">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>

	<!-- LÍMITE DEL CONTENIDO -->

	<div class="col-md-10 col-md-offset-1">

	<!-- IMAGEN DESTACADA + TÍTULO DE LA PÁGINA -->

	<header>
		<?php	if ( has_post_thumbnail() ) {
			echo the_post_thumbnail();
			}
			else {
			echo '<img class="full-width" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
			}
		?>

		<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
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

	<div class="col-sm-12 col-lg-10 col-lg-offset-1">
		<div class="well">
			<?php 
				//Esta función no existe
				//related_posts(); 
			?>
		</div>
	</div>

</div> <!-- ROW -->
</div>
<?php endwhile; endif; ?>	
</section>

<?php get_footer(); ?>