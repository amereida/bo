<?php get_header(); ?>

<section id="content" role="main">
	
	<?php echo edit_post_link( "lapiz" ); ?> 
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">

			<ul><?php
				$agoras = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'agoras',
					'orderby'		=> 'name',
					'order'         => 'asc'
				));
				foreach($agoras as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>

			<ul><?php
				$esculturas = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'esculturas',
					'orderby'		=> 'name',
					'order'         => 'asc'
				));
				foreach($esculturas as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>

			<ul><?php
				$obraspublicas = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'obras-publicas',
					'orderby'		=> 'name',
					'order'         => 'asc'
				));
				foreach($obraspublicas as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>

			<ul><?php
				$hospederias = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'hospederias',
					'orderby'		=> 'name',
					'order'         => 'asc'
				));
				foreach($hospederias as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>

			<ul><?php
				$publicas = get_posts(array(
					'post_type'	    => 'page',
					'category_name'	=> 'obras-publicas',
					'orderby'		=> 'name',
					'order'         => 'asc'
				));
				foreach($publicas as $link){
					echo '<li><a href="'.get_page_link($link->ID).'">'.$link->post_title.'</a></li>';
				}
			?></ul>
		<!--	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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
				</article>-->
				
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