<?php
function clean_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	//load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'clean_setup' );

/**
 * Enqueue scripts and styles.
 */
function clean_scripts() {
	wp_enqueue_style( 'clean-style', get_template_directory_uri() . '/style/clean.min.css' );
    wp_enqueue_script( 'clean-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js', array(), '2.1.4', true);
    wp_enqueue_script( 'clean-vibrant', 'https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'clean-scripts', get_template_directory_uri() . '/js/clean.min.js', array(), '1.0.0', true ); 
}
add_action( 'wp_enqueue_scripts', 'clean_scripts' );




/**
 * Load inline style
 */
function color_palette() {
    ?>
    <style id="clean_color_palette">
        body.vibrant-applied .vibrant-color-palette > div.Vibrant{background-color:{paletteVibrant};}
        body.vibrant-applied .vibrant-color-palette > div.Muted{background-color:{paletteMuted};}
        body.vibrant-applied .vibrant-color-palette > div.DarkVibrant{background-color:{paletteDarkVibrant};}
        body.vibrant-applied .vibrant-color-palette > div.DarkMuted{background-color:{paletteDarkMuted};}
        body.vibrant-applied .vibrant-color-palette > div.LightVibrant{background-color:{paletteLightVibrant};}
        
        body.vibrant-applied a:{color:{primaryColor};}
        body.vibrant-applied a:visited{color:{primaryColorVisited};}
        body.vibrant-applied a:hover{color:{primaryColorHover};}
       
    </style>
    <?php
}
add_action( 'wp_head', 'color_palette' ); 







/**
 * Load html5shiv
 */
function clean_html5shiv() {
    //echo '<!--[if lt IE 9]>' . "\n";
    //echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    //echo '<![endif]-->' . "\n";
}
//add_action( 'wp_head', 'clean_html5shiv' ); 
?>