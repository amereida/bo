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
				
				<!-- GeoMashup -->
				<div id="geomashup">
                	<?php echo GeoMashup::map('width=100%'); ?>
       			</div>
			</div>
		</div>
	</div>

	<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>