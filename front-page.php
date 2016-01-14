<?php
/*
Template name: Front Page
*/
?>

<?php get_header(); ?>

<div class="container">
<div class="row">

	<div class="col-md-10 col-md-offset-1">
			
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<!--EDIT SECTION -->
		<div class='edit'>
			<?php echo edit_post_link( "lapiz" ); ?>
			<?php if ( is_user_logged_in() ) { 
				echo '<a href="'.get_permalink(get_page_by_title('Ayuda')).'" class="link-ayuda"><span class="icn icn-libro"></span> ayuda</a>';
			} ?> 
		</div>
			
		<section id="content" role="main" class='well entry-content'>

					<div class="page-content">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<section class="entry-content">
								<?php the_content(); ?>
								<div class="entry-links"><?php wp_link_pages(); ?></div>
							</section>
						</article>
					</div>

			<?php endwhile; endif; ?>


		<!-- SECCIÓN DE CONTACTO/DIRECCIÓN -->
		<div rel="address" class="direccion" style="display: block; margin: 0 auto; text-align: center;">
			<div style="color: #FFF; padding: 0 30%">
					<span class="icn icn-mapa"></span> Km. 4 Camino Concon - Quintero<br>
					<span class="icn icn-mapa"></span> Matta 12, Recreo, Viña del Mar<br>
					Valparaíso, Chile<br>
					+56 32 666 510<br>
					<br>
					<a class="btn btn-primary btn-center" href="<?php echo get_permalink( get_page_by_path( 'Contacto' ) ) ?>" role="button">Escríbenos</a>
			</div>
		</div>	

				
		<!-- LLAMAR ÚLTIMOS POST -->

			<h2>Acontecer</h2>

			<div class="row">

			<?php
			 $postslist = get_posts('numberposts=6&order=DESC&orderby=date');
			 foreach ($postslist as $post) :
			    setup_postdata($post);
			 ?>
			 <div class="col-lg-4 col-md-6 col-sm-12">
			 <div class="thumbnail">
			 	<a href="<?php the_permalink(); ?>">
			 	<div class="thumbnail-img">
			 		<?php	if ( has_post_thumbnail() ) {
					the_post_thumbnail('thumbnail');
					}
					else{
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img-rotate/rotate.php" />';
					}
				?>
			 	</div>
			 <div class="caption">
					<h3><?php the_title(); ?></h3>
				 <div class="fecha"><?php the_time('j')?> <span class='mes'><?php the_time('M'); ?></span></div>
				 <p><?php
					  $excerpt = get_the_excerpt();
					  echo string_limit_words($excerpt,35);
					?> &hellip; <span class="vermas">[seguir leyendo]</span></p>
			 </div>
				</a>
			 </div>
			 </div>
			 
			 <?php endforeach; ?>

			</div>

			 <p class="aligncenter">
			 	<a class="btn btn-primary btn-center" href="<?php
				    // Get the ID of a given category
				    $category_id = get_cat_ID( 'Noticias' );

				    // Get the URL of this category
				    $category_link = get_category_link( $category_id );?> <?php echo esc_url( $category_link ); ?>" role="button">leer +</a>
			 </p>


		</section>

	</div>
</div>
</div><!--contenedor-->

<?php get_footer(); ?>



