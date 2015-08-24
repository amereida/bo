<?php get_header(); ?>


<?php edit_post_link("lapiz"); ?>

<div class="row">
	<!--
	<div class="col-sm-6 hidden-xs">
		<div class="well">
			<div class="anti-well">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('large');
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
					}
				?>
			</div>
		</div>
		<div class='row'>
			<?php dynamic_sidebar( 'for pages' ); ?>
		</div>
	</div>
	-->
	<div class="col-sm-8 col-sm-offset-2 white">
		<header>
			<?php	if ( has_post_thumbnail() ) {
			echo '<div class="jumbo-foto">'.'<h1>'.get_the_title().'</h1>'.get_the_post_thumbnail().'</div>';
			 }

			 else{
			 	echo '<h1>'.get_the_title().'</h1>';
			 }
			?>
			<!--
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 class='page-title'><?php echo get_the_title(); ?></h1>
					<?php edit_post_link("lapiz"); ?>
				<?php endwhile; endif; ?>

			-->
		</header>
		<section id="content" role="main" class='well'>
			<div class="page-content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="entry-content">
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</article>
			</div>
		</section>
		
		
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>