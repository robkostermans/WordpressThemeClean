<?php get_header(); ?>
    <?php if ( have_posts() ) : ?>
        <?php
            if ( is_home() ) {
			    query_posts('showposts=1');
            };
            ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content','single'); ?>
        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>
