<?php get_header(); ?>

<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
			
		<!--<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('large');
			}
			else {
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
			}
		?>
		<h1 class='post-title'><?php echo get_the_title(); ?></h1>
				<span class='post-date'><?php the_time('F j, Y'); ?></span> 
				<!-- <?php get_template_part( 'entry', 'meta' ); ?> 
		</div> -->
		

	<?php echo edit_post_link( "lapiz" ); ?> 
	<div class="row">
		<!--
		<div class="col-sm-6">
			<div class="well">
					<div class="anti-well-with-text">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('large');
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
							}
						?>
					</div>
				<h1 class='huge'><?php echo get_the_title(); ?></h1>
				<?php get_template_part( 'entry', 'meta' ); ?> 
			</div>
			<div class='row hidden-xs'>
				<?php dynamic_sidebar( 'for singles' ); ?>
			</div>
		</div>
		-->
		<div class="col-sm-8 col-sm-offset-2">

			<div class="jumbo-foto">
				<h1><?php echo get_the_title(); ?></h1>


				<?php	if ( has_post_thumbnail() ) {
				echo the_post_thumbnail();
				}
				else {
				echo '<img class="full-width" src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
				}
				?>
			</div>

			<div class="well">

				<article class="entry-content">
					<?php echo the_content(); ?>
				</article>
				
				<!-- GeoMashup -->
				<div id="geomashup">
                	<?php echo GeoMashup::map('width=100%'); ?>
       			</div>

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

			</div>

		</div>

	</div>

	</section>

	<?php endwhile; endif; ?>

	<div class="col-sm-8 col-sm-offset-2">
		<div class="well">
			<?php related_posts(); ?>
		</div>
	</div>



<!--
<footer class="footer">
	<?php get_template_part( 'nav', 'below-single' ); ?>
</footer>
-->

<?php get_footer(); ?>