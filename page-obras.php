<?php get_header(); ?>

<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<div class="row">
		<div class="col-sm-12">
		
		<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('large');
			}
			else {
				echo '<img class="full-width" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
			}

		?>
		
		<h1 class='post-title'><?php echo get_the_title(); ?></h1>
				<span class='post-date'><?php the_time('F j, Y'); ?></span> 
				<!-- <?php get_template_part( 'entry', 'meta' ); ?> -->
		</div>
		
	</div>
	<?php echo edit_post_link( "lapiz" ); ?> 
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
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