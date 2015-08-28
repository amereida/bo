<?php get_header(); ?>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>

	<!-- LÍMITE DEL CONTENIDO -->

	<div class="col-sm-8 col-sm-offset-2">
		<?php if ( have_posts() ) : ?>
				<header>
					<h1 class="entry-title"><?php printf( __( 'Resultados de búsqueda: %s', 'bo' ), get_search_query() ); ?></h1>
				</header>
		<div class="well">
		<section id="content" role="main">
				
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'entry' ); ?>
			<?php endwhile; ?>
			<?php get_template_part( 'nav', 'below' ); ?>
			<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<header class="header">
						<h2 class="entry-title"><?php _e( 'Nothing Found', 'bo' ); ?></h2>
					</header>
					<section class="entry-content">
						<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'bo' ); ?></p>
						<?php get_search_form(); ?>
					</section>
				</article>
			<?php endif; ?>
		</section>
		</div>
	</div>
</div>


<?php get_footer(); ?>