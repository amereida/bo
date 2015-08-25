<?php get_header(); ?>
<section id="content" role="main">
	<article id="post-0" class="post not-found">
		<header class="header">
			<!-- <h1 class="huge-entry-title"><?php _e( 'Not Found', 'bo' ); ?></h1> -->
		</header>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 white">
				<section class="entry-content">
					<div class="well">
						<div style='padding: 3em 0'>
							<h1 class='tcenter huge'><?php _e( 'el camino no es el camino', 'bo' ); ?></h1>
						</div>
						
					</div>
				</section>
				<div class="well">
					<div class="anti-well">
						<?php echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />'; ?>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>