<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section id="content" role="main">

<div class="row">
	
	<?php echo edit_post_link("lapiz"); ?>

	<!--BREADCUMBS -->

	<div class="col-sm-12 col-lg-10 col-lg-offset-1 white">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>

	<!-- LÍMITE DEL CONTENIDO -->

	<div class="col-sm-12 col-lg-10 col-lg-offset-1 white">

	<!-- IMAGEN DESTACADA + TÍTULO DE LA PÁGINA -->

		<header>
			<?php	if ( has_post_thumbnail() ) {
			echo get_the_post_thumbnail().'<h1>'.get_the_title().'</h1>';
			 }

			 else{
			 	echo '<h1>'.get_the_title().'</h1>';
			 }
			?>
		</header>

	<!-- CONTENIDO DE LA PÁGINA -->

		<div class="well">
			<div class="page-content">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="entry-content">
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</article>
			</div>
		</div>
	</div>

</div> <!-- ROW -->

</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>