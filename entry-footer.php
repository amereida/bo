<footer class="entry-footer">
<span class="cat-links"><?php _e( 'Categories: ', 'bo' ); ?><?php the_category( ', ' ); ?></span>
<span class="tag-links">
	<?php
		$posttags = get_the_tags();
		if ($posttags) {
			echo 'Tags: ';
			foreach($posttags as $tag) {
				echo '<a href="';echo bloginfo(url);
				echo '/?tag=' . $tag->slug . '" class=" label ' . $tag->slug . '">' . $tag->name . '</a>';
			}
		}
	?>
</span>
<?php if ( comments_open() ) { 
echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'bo' ) ) . '</a></span>';
} ?>
</footer> 