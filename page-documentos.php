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
							echo '<div class="jumbo-foto">'.'<h1 class="entry-title">'.get_the_title().'</h1>'.get_the_post_thumbnail().'</div>';
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

						<div class="row"> 

							<?php
							$documentos = get_posts(array(
								'post_type'	    => 'page',
								'category_name'	=> 'documentos',
								'orderby'		=> 'name',
								'order'         => 'asc',
								'posts_per_page'=> '-1'
								));
							foreach($documentos as $doc){

								echo '<div class="docs"><a href="'.get_page_link($doc->ID).'"><span class="doc-title">'.get_the_title($doc->ID).'</span></a>'.'<span class="fecha">'.get_the_date($doc->ID).'</span></div>';
							}
							?>

						</div>

					</div>
				</div> <!-- COLUMNAS -->
			</div> <!-- ROW -->
		</div>



	<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>