
<?php
if ( ! function_exists( 'ligerbots_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function ligerbots_setup() {

    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'strong magenta', 'ligerbots' ),
            'slug' => 'strong-magenta',
            'color' => '#a156b4',
        ),
        array(
            'name' => __( 'very dark gray', 'ligerbots' ),
            'slug' => 'very-dark-gray',
            'color' => '#444',
        ),
    ) );

    add_theme_support( 'wp-block-styles' );
    add_theme_support('editor-styles');

    add_editor_style('editor-style.css');
    add_theme_support( 'align-wide' );
}
endif; // ligerbots_setup
add_action( 'after_setup_theme', 'ligerbots_setup' );

/**
 * Enqueue theme scripts and styles.
 */
function ligerbots_scripts() {
    wp_enqueue_style( 'ligerbots-style', get_stylesheet_uri() );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ligerbots_scripts' );

function ligerbots_relative_to_theme($path){
    bloginfo('template_directory');
    echo $path;
}
/*
from utils.php
*/

function my_setup_postdata( $postId )
{
    global $post;

    $post = get_post( $postId );
    setup_postdata( $postId );
}
$lg_keepReadMore = FALSE;
function custom_excerpt_more( $more ) {
    global $lg_keepReadMore;
    if ( $lg_keepReadMore ) return $more;
	return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );
function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );
function my_the_excerpt( $keepReadMore )
{
    global $lg_keepReadMore;
    $lg_keepReadMore = $keepReadMore;
    the_excerpt();
}

function print_filters_for( $hook = '' ) {
    global $wp_filter;
    if( empty( $hook ) || !isset( $wp_filter[$hook] ) )
        return;

    print '<pre>';
    print_r( $wp_filter[$hook] );
    print '</pre>';
}
//print_filters_for( 'the_content_more_link' );

function get_latest_blog()
{
    $cat = get_category_by_slug( 'blog' );
    $args = array( 'numberposts' => '1',
                   'post_type' => 'post',
                   'post_status' => 'publish',
                   'category' => $cat->term_id );
    $recent_posts = wp_get_recent_posts( $args );
    return get_post( $recent_posts[0][ 'ID' ] );
}

function fetch_the_content( $more_link_text = null, $strip_teaser = false ) {
    $content = get_the_content( $more_link_text, $strip_teaser );
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    return $content;
}

function find_first_image()
{
    $html = fetch_the_content();
    preg_match( '/<img[^>]+src=[\'"](?P<src>.+?)[\'"][^>]*>/i', $html, $result );
    return '<img src="' . $result['src'] . '">';
}

function get_announcements( $count )
{
    $cat = get_category_by_slug( 'announcements' );
    $args = array( 'numberposts' => $count,
                   'post_type' => 'post',
                   'post_status' => 'publish',
                   'category' => $cat->term_id );
    $res = array();
    foreach ( wp_get_recent_posts( $args ) as $p )
    {
        array_push( $res, $p[ 'ID' ] );
    }
    return $res;
}
