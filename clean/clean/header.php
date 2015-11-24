<?php
/**
 * The header for our theme.
 * @package clean
 */
?><!DOCTYPE html><html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
    <body>
        <header id="masthead" class="site-header" role="banner">
		    <div class="site-side-panel">
                <div class="site-branding site-cell">
                      <a href="/">TOMORROWKINGS</a>
		        </div>
            
                <div class="vibrant-color-palette site-cell">
                    <div class="Vibrant"></div>
                    <div class="Muted"></div>
                    <div class="DarkVibrant"></div>
                    <div class="DarkMuted"></div>
                    <div class="LightVibrant"></div>
                    <!--<div class="LightMuted"></div>-->
                </div>

                <div class="site-paging site-cell">
                    <?php
                        $blog_count = wp_count_posts();
                        $blog_count_published= str_pad($blog_count->publish, 3, '0', STR_PAD_LEFT);
                        $cquery = new WP_Query(array('date_query' => array('before' => get_the_time("Y-m-d H:i:s")),'posts_per_page' => -1));
                        $current_count = $cquery->post_count + 1;
                        $current_count = str_pad($current_count, 3, '0', STR_PAD_LEFT);
                    ?>
                    <span class="blog-count-current">
                        <?php
                            echo $current_count;
                        ?>
                   </span>
                    <span class="blog-count-spacer"> / </span>
                        <?php
                        
                        echo "<span>".$blog_count_published."</span>";
                     ?>
                    
                </div>               
                <div class="site-navigation site-cell">
                    <?php
                        the_post_navigation( array(
                            'screen_reader_text' => false,
				            'next_text' => '<span class="post-title" title="%title"> > </span>',
				            'prev_text' => '<span class="post-title" title="%title"> < </span>',
			            ) );
                    ?>

                </div>
            </div>
	    </header>