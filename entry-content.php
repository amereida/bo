<section class="entry-content">
	
	<div class="jumbo-foto">
		<h1><?php echo get_the_title(); ?></h1>
		<img class="full-width" src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail('small'); } ?>">
	</div>
	

<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>