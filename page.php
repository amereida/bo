<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section id="content" role="main">
<div class="container">
<div class="row">
	
	<!--EDIT SECTION -->
	<div class='edit'>
		<?php echo edit_post_link( "lapiz" ); ?>
		<?php if ( is_user_logged_in() ) { 
			echo '<a href="'.get_permalink(get_page_by_title('Ayuda')).'" class="link-ayuda"><span class="icn icn-libro"></span> ayuda</a>';
		} ?> 
	</div>

	<!--BREADCUMBS -->

	<div class="col-sm-12 col-lg-10 col-lg-offset-1">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>
	<!-- LÍMITE DEL CONTENIDO -->

	<div class="col-sm-12 col-lg-10 col-lg-offset-1 white">

	<!-- IMAGEN DESTACADA + TÍTULO DE LA PÁGINA -->

		<header>
			<?php	if ( has_post_thumbnail() ) {
			echo get_the_post_thumbnail().'<h1 class="entry-title">'.get_the_title().'</h1>';
			 }

			 else{
			 	echo '<h1 class="entry-title">'.get_the_title().'</h1>';
			 }
			?>
		</header>

	<!-- CONTENIDO DE LA PÁGINA -->

		<div class="well">
			<div class="page-content">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="entry-content">
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</article>
			</div>

			<?php
				$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				if ($children) { ?>
				<h3>Ver más</h3>
				<ul>
				<?php echo $children; ?>
				</ul>
			<?php } ?>
		</div>
	</div>

</div> <!-- ROW -->
</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>