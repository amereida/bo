<?php get_header(); ?>

<div class="row">

	<div class="col-sm-8 col-sm-offset-2 white">
		
		<section id="content" role="main" class='well entry-content'>
			

			<?php 
				$page_id = 83;
				$page_data = get_page( $page_id );
				echo '<h1 class="anti-well-title">'. $page_data->post_title .'</h1>';
				echo apply_filters('the_content', $page_data->post_content);
			?>

		<!-- SECCIÓN DE CONTACTO/DIRECCIÓN -->
			

				
		<!-- LLAMAR ÚLTIMOS POST -->

			<h2>Acontecer</h2>

			<?php
			 $postslist = get_posts('numberposts=4&order=DESC&orderby=date');
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



