<?php get_header(); ?>

<div class="row">

	<div class="col-sm-8 col-sm-offset-2 white">
		
		<section id="content" role="main" class='well'>
			

			<?php 
				$page_id = 83;
				$page_data = get_page( $page_id );
				echo '<h1>'. $page_data->post_title .'</h1>';
				echo apply_filters('the_content', $page_data->post_content);
			?>

			<h2>Acontecer</h2>
<ul>
<?php
	$recent_posts = wp_get_recent_posts();
	foreach( $recent_posts as $recent ){
		echo '<div class="thumbnail"><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_thumbnail"].  $recent["post_title"].'</a> </div> ';
	}
?>
</ul>

		</section>


		<!-- ESTO ES LO QUE HIZO EL HERBERT
		<div class="col-sm-6 hidden-xs">
			<?php dynamic_sidebar( 'wide' ); ?>
			<?php dynamic_sidebar( 'clean' ); ?>
			<?php get_sidebar(); ?>
		</div>


		<div class="col-sm-6">
			<section id="content" role="main" class='row'>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				get_template_part( 'entry-small' );
				comments_template();
				endwhile; endif; ?>
				<?php get_template_part( 'nav', 'below' ); ?>
			</section>
		</div>
		-->
	</div>
</div>

<?php get_footer(); ?>



