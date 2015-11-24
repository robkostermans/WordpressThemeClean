<?php
/**
 * @package clean
 */
?>
<article class="article-main">
	<header class="article-header">
	 	<div class="bg-img"><?php the_post_thumbnail(); ?></div>
		<div class="title">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<canvas id="myCanvas" width="800" height="700"></canvas>
		</div>
        
	</header>
   
    <section>
        <p class="subline"><?php the_time('d F Y'); ?></p>
        <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
    </section>
        
	<section id="post-<?php the_ID(); ?>" class="article-body" >
        
    	<?php the_content(); ?>
	</section>
    <footer class="article-footer">
         <?php
        if ( comments_open() || get_comments_number() ) :
				comments_template();
		endif;
    ?>
    </footer>
</article>