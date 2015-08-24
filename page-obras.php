<?php get_header(); ?>

<section id="content" role="main">
	
	<?php echo edit_post_link( "lapiz" ); ?> 
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">


		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php	if ( has_post_thumbnail() ) {
			echo '<div class="jumbo-foto">'.'<h1>'.get_the_title().'</h1>'.get_the_post_thumbnail().'</div>';
			 }

			 else{
			 	echo '<h1>'.get_the_title().'</h1>';
			 }
			?>
	
			<div class="row">

				
			</div>
			<div class="well">

				<article class="entry-content">
					<?php echo the_content(); ?>
				</article>

				<h3>Ágoras</h3>

			<ul><?php
				$agoras = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'agoras',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($agoras as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>

			<h3>Esculturas</h3>

			<ul><?php
				$esculturas = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'esculturas',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($esculturas as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>

			<h3>Obras Públicas</h3>

			<ul><?php
				$obraspublicas = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'obras-publicas',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($obraspublicas as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>

			<h3>Hospederías y Vestales</h3>

			<ul><?php
				$hospederias = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'hospederias',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($hospederias as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>

			<h3>Salas y Talleres</h3>

			<ul><?php
				$salas = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'salas-y-talleres',
					'orderby'		=> 'name',
					'order'         => 'asc',
					'posts_per_page'=> '-1'
				));
				foreach($salas as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>
				
				<!-- GeoMashup -->
				<div id="geomashup">
                	<?php echo GeoMashup::map('width=100%'); ?>
       			</div>
			</div>
		</div>

	</div> 
	<div class="row">


	<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>