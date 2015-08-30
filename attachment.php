<?php get_header(); ?>
<div class="container">
<div class="row">
	
	<div class="col-md-10 col-md-offset-1">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>

	<div class="col-md-10 col-md-offset-1">

	<?php global $post; ?>
	<section id="content" role="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link("edit"); ?>
			<!--<?php get_template_part( 'entry', 'meta' ); ?>-->
		</header>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<!--
			<header class="header">
				<nav id="nav-above" class="navigation" role="navigation">
					<div class="nav-previous"><?php previous_image_link( false, '&larr;' ); ?></div>
					<div class="nav-next"><?php next_image_link( false, '&rarr;' ); ?></div>
				</nav>
			</header>
			-->
		<section class="entry-content">
			<div class="well">
					<?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, "large" ); ?>

						<!--<p class="attachment">-->
							<a href="<?php echo wp_get_attachment_url( $post->ID ); ?>" title="<?php the_title(); ?>" rel="attachment">
								<img src="<?php echo $att_image[0]; ?>" width="<?php echo $att_image[1]; ?>" height="<?php echo $att_image[2]; ?>" class="size-large" alt="<?php $post->post_excerpt; ?>" />
							</a>
						<!--</p>-->

					<?php else : ?>
					<a href="<?php echo wp_get_attachment_url( $post->ID ); ?>" title="<?php echo esc_html( get_the_title( $post->ID ), 1 ); ?>" rel="attachment"><?php echo basename( $post->guid ); ?></a>
				<?php endif; ?>

				<div class="entry-caption wp-caption">
					<p class="wp-caption-text"><?php echo get_the_excerpt(); ?></p>
				</div>
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			</div>
		</section>
		</article>

	<?php endwhile; endif; ?>
	</section>

	</div>

</div>
</div>
<?php get_footer(); ?>