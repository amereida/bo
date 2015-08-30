<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<section id="content" role="main">
		<div class="container">
			<div class="row">

				<?php echo edit_post_link("lapiz"); ?>

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

								echo '<a href="'.get_page_link($doc->ID).'" class="doc" ><h3>'.get_the_title($doc->ID).'</h3></a>'.get_the_author($doc->ID);
							}
							?>

							<?php
							$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );

							echo '<ul>';
							foreach ( $mypages as $page ) {
								  	$option = '<li><a href=' . get_page_link( $page->ID ) . '">';
									$option .= $page->post_title;
									$option .= '</a></li>';
									echo $option;
								  }
							echo '</ul>';
							?>

</div>

</div>
</div> <!-- COLUMNAS -->
</div> <!-- ROW -->
</div>



<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>