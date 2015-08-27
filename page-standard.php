<?php get_header(); ?>
<header class="header">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1 class='page-title'><?php echo get_the_title(); ?></h1>
		<?php edit_post_link("lapiz"); ?>
	<?php endwhile; endif; ?>
</header>



<div class="row">
	<?php echo edit_post_link("lapiz"); ?>

	<!--BREADCUMBS -->

	<div class="col-sm-8 col-sm-offset-2">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>
	
	<div class="col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2">
		<section id="content" role="main" class='well'>
			<div class="entry-content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="entry-content">
						<?php the_content(); ?>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</article>
			</div>
		</section>
		<div class='aftershadow'>
			<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>