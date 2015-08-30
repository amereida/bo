<?php
/*
Template name: Archives Page
*/
?>

<?php get_header(); ?>

<div class="row">

	<!--BREADCUMBS -->

	<div class="col-sm-8 col-sm-offset-2">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>

<div class="col-sm-8 col-sm-offset-2 white">

<!-- <h1><?php the_title(); ?></h1> -->

<?php
			 $postslist = get_posts('numberposts=-1&order=DESC&orderby=date');
			 foreach ($postslist as $post) :
			    setup_postdata($post);
			 ?>
			 <div class="col-md-6">
				 <div class="thumbnail">
				 	<a href="<?php the_permalink(); ?>">
				 	<div class="thumbnail-img">
				 		<?php	if ( has_post_thumbnail() ) {
						the_post_thumbnail();
						}
						else{
							echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
						}
					?>
				 	</div>
				 <div class="caption">
					 <h3><?php the_title(); ?></h3>
					 <div class="fecha"><?php the_time(get_option('date_format')) ?></div>
					 <p><?php
						  $excerpt = get_the_excerpt();
						  echo string_limit_words($excerpt,35);
						?> ... <span class="vermas">[seguir leyendo]</span></p>
				 </div>
				</a>
				 </div>
			 </div>
			 <?php endforeach; ?>

</div>
</div>

<?php get_footer(); ?>