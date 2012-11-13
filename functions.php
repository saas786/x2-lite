<?php 
require_once( dirname(__FILE__) . '/admin/cheezcap.php');
require_once( dirname(__FILE__) . '/core/loader.php'); 

// hide admin bar if option is set     
if ( $cap->admin_bar_position == "hide" ) { 
	add_filter('show_admin_bar', '__return_false'); 
} 
    	
/** Tell WordPress to run x2_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'x2_setup' );
if ( ! function_exists( 'x2_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * To override x2_setup() in a child theme, add your own x2_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_theme_support('custom-background') To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 * @uses $content_width To set a content width according to the sidebars.
 * @uses BP_DISABLE_ADMIN_BAR To disable the admin bar if set to disabled in the themesettings.
 *
 */
function x2_setup() {
    global $cap, $content_width;

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // This theme uses post thumbnails
    if ( function_exists( 'add_theme_support' ) ) {
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 222, 160, true );
        add_image_size( 'slider-top-large', 1000, 250, true );
		add_image_size( 'slider-top-nivo', 1000, 320, true );
        add_image_size( 'slider-large', 990, 250, true );
        add_image_size( 'slider-middle', 756, 250, true );
        add_image_size( 'slider-thumbnail', 80, 50, true );
        add_image_size( 'post-thumbnails', 222, 160, true );
        add_image_size( 'single-post-thumbnail', 598, 372, true );
    }

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Make theme available for translation
    // Translations can be filed in the /languages/ directory
    load_theme_textdomain( 'cc', get_template_directory() . '/languages' );

    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
        require_once( $locale_file );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'menu_top' => __( 'Header top menu', 'cc' ),
        'primary'  => __( 'Header bottom menu', 'cc' ),
    ) );
    
    // This theme allows users to set a custom background
    if($cap->wp_custom_background == true){
        add_theme_support( 'custom-background' );
    }
    // Your changeable header business starts here
    define( 'HEADER_TEXTCOLOR', '888888' );
    
    // No CSS, just an IMG call. The %s is a placeholder for the theme template directory URI.
    define( 'HEADER_IMAGE', '%s/images/default-header.png' );

    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to x2_header_image_width and x2_header_image_height to change these values.
    define( 'HEADER_IMAGE_WIDTH', apply_filters( 'x2_header_image_width', 1000 ) );
    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'x2_header_image_height', 233 ) );


    // Add a way for the custom header to be styled in the admin panel that controls
    // custom headers. See x2_admin_header_style(), below.
    if($cap->add_custom_image_header == true){
		$defaults = array(
            /*'default-image'          => '',
            'random-default'         => false,
            'width'                  => 0,
            'height'                 => 0,
            'flex-height'            => false,
            'flex-width'             => false,
            'default-text-color'     => '',
            'header-text'            => true,
            'uploads'                => true,*/
            'wp-head-callback'       => 'x2_admin_header_style',
            'admin-head-callback'    => 'x2_header_style',
            'admin-preview-callback' => 'x2_admin_header_image',
        );
        add_theme_support('custom-header',$defaults);
        //add_custom_image_header( 'cc_header_style', 'cc_admin_header_style', 'cc_admin_header_image' );
    }
    
}
endif; 

if ( ! function_exists( 'x2_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 */
function x2_header_style() {
    // If no custom options for text are set, let's bail
    // get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
    if ( HEADER_TEXTCOLOR == get_header_textcolor() )
        return;
    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style type="text/css">
    <?php
        // Has the text been hidden?
        if ( 'blank' == get_header_textcolor() ) :
    ?>
        #blog-description, #header div#logo h1 a, #header div#logo h4 a {
            position: absolute;
            left: -9000px;
        }
    <?php
        // If the user has set a custom color for the text use that
        else :
    ?>
        #blog-description, #header div#logo h1 a, #header div#logo h4 a {
            color: #777777;
            color: #<?php echo get_header_textcolor(); ?> !important;
        }
    <?php endif; ?>
    </style>
    <?php
}
endif;


if ( ! function_exists( 'x2_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in x2_setup().
 *
 */
function x2_admin_header_style() {
?>
    <style type="text/css">
    .appearance_page_custom-header #headimg {
        background: #<?php echo get_background_color(); ?>;
        border: none;
        text-align: center;
    }
    #headimg h1,
    #desc {
        font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
    }
    #headimg h1 {
        margin: 0;
    }
    #headimg h1 a {
        font-size: 36px;
        letter-spacing: -0.03em;
        line-height: 42px;
        text-decoration: none;
    }
    #desc {
        font-size: 18px;
        line-height: 31px;
        padding: 0 0 9px 0;
    }
    <?php
        // If the user has set a custom color for the text use that
        if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
    ?>
        #site-title a,
        #site-description {
            color: #<?php echo get_header_textcolor(); ?>;
        }
    <?php endif; ?>
    #headimg img {
        max-width: 990px;
        width: 100%;
    }
    </style>
<?php
}
endif;

if ( ! function_exists( 'x2_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in x2_setup().
 *
 */
function x2_admin_header_image() { ?>
    <div id="headimg">
        <?php
        if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
            $style = ' style="display:none;"';
        else
            $style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
        ?>
        <h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
        <img src="<?php esc_url ( header_image() ); ?>" alt="" />
    </div>
<?php }
endif;

add_filter('widget_text', 'do_shortcode');
add_action('widgets_init', 'x2_widgets_init');
function x2_widgets_init(){
    register_sidebars( 1,
        array(
            'name'          => 'sidebar right',
            'id'            => 'sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'sidebar left',
            'id'            => 'leftsidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
	register_sidebars( 1,
        array(
            'name'          => 'home top',
            'id'            => 'home_top',
            'before_widget' => '<div id="%1$s" class="widget %2$s fullwidth">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h2 class="widgettitle home">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'home left',
            'id'            => 'home_left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h2 class="widgettitle home">',
            'after_title'   => '</h3>'
        )
    );
	register_sidebars( 1,
        array(
            'name'          => 'home center',
            'id'            => 'home_center',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h2 class="widgettitle home">',
            'after_title'   => '</h3>'
        )
    );
	register_sidebars( 1,
        array(
            'name'          => 'home right',
            'id'            => 'home_right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h2 class="widgettitle home">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'header full width',
            'id'            => 'headerfullwidth',
            'before_widget' => '<div id="%1$s" class="widget %2$s fullwidth">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'header left',
            'id'            => 'headerleft',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'header center',
            'id'            => 'headercenter',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'header right',
            'id'            => 'headerright',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'footer full width',
            'id'            => 'footerfullwidth',
            'before_widget' => '<div id="%1$s" class="widget %2$s fullwidth">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'footer left',
            'id'            => 'footerleft',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'footer center',
            'id'            => 'footercenter',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'footer right',
            'id'            => 'footerright',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'member header',
            'id'            => 'memberheader',
            'before_widget' => '<div id="%1$s" class="widget %2$s fullwidth">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'member header left',
            'id'            => 'memberheaderleft',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'member header center',
            'id'            => 'memberheadercenter',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'member header right',
            'id'            => 'memberheaderright',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'member sidebar left',
            'id'            => 'membersidebarleft',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'member sidebar right',
            'id'            => 'membersidebarright',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'group header',
            'id'            => 'groupheader',
            'before_widget' => '<div id="%1$s" class="widget %2$s fullwidth">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'group header left',
            'id'            => 'groupheaderleft',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'group header center',
            'id'            => 'groupheadercenter',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'group header right',
            'id'            => 'groupheaderright',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'group sidebar left',
            'id'            => 'groupsidebarleft',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'group sidebar right',
            'id'            => 'groupsidebarright',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 1,
        array(
            'name'          => 'widget flay out of content',
            'id'            => 'out_of_content',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebars( 15,
        array(
            'name'          => 'shortcode %1$s',
            'id'            => 'shortcode',
            'before_widget' => '<div id="%1$s" class="widget %2$s shortcode_widgetarea">',
            'after_widget'  => '</div><div class="clear"></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>'
        )
    );

}
if($cap->buddydev_search == true && defined('BP_VERSION') && function_exists('bp_is_active')) {
        
    //* Add these code to your functions.php to allow Single Search page for all buddypress components*/
    //    Remove Buddypress search drowpdown for selecting members etc
    add_filter("bp_search_form_type_select", "x2_remove_search_dropdown"  );
    function x2_remove_search_dropdown($select_html){
        return '';
    }
    
    remove_action( 'init', 'bp_core_action_search_site', 5 );//force buddypress to not process the search/redirect
    add_action( 'init', 'x2_bp_buddydev_search', 10 );// custom handler for the search
    
    function x2_bp_buddydev_search(){
    global $bp;
        if ( $bp->current_component == BP_SEARCH_SLUG )//if thids is search page
            bp_core_load_template( apply_filters( 'bp_core_template_search_template', 'search-single' ) );//load the single searh template
    }
    add_action("advance-search","x2_show_search_results",1);//highest priority
    
    /* we just need to filter the query and change search_term=The search text*/
    function x2_show_search_results(){
        //filter the ajaxquerystring
         add_filter("bp_ajax_querystring","x2_global_search_qs",100,2);
    }
    
    //show the search results for member*/
    function x2_show_member_search(){ ?>
        <div class="memberss-search-result search-result">
            <h2 class="content-title"><?php _e("Members Results","cc");?></h2>
            <?php locate_template( array( 'members/members-loop.php' ), true ) ;  ?>
            <?php global $members_template;
            if($members_template->total_member_count>1 && !empty($_REQUEST['search-terms'])):?>
                <a href="<?php echo bp_get_root_domain().'/'.BP_MEMBERS_SLUG.'/?s='.$_REQUEST['search-terms']?>" ><?php _e("View all matched Members","cc");?></a>
            <?php endif; ?>
        </div>
        <?php    
    }
    
    //Hook Member results to search page
    add_action("advance-search","x2_show_member_search",10); //the priority defines where in page this result will show up(the order of member search in other searchs)
    function x2_show_groups_search(){?>
        <div class="groups-search-result search-result">
        <h2 class="content-title"><?php _e("Group Search","cc");?></h2>
        <?php locate_template( array('groups/groups-loop.php' ), true ) ;  ?>
        <?php if(!empty($_REQUEST['search-terms'])) :?>
            <a href="<?php echo bp_get_root_domain().'/'.BP_GROUPS_SLUG.'/?s='.$_REQUEST['search-terms']?>" ><?php _e("View All matched Groups","cc");?></a>
        <?php endif;?>
    </div>
        <?php
     //endif;
      }
    
    //Hook Groups results to search page
     if(bp_is_active( 'groups' ))
        add_action("advance-search","x2_show_groups_search",10);
    
    /**
     *
     * Show blog posts in search
     */
    function x2_show_site_blog_search(){
        ?>
     <div class="blog-search-result search-result">
     
      <h2 class="content-title"><?php _e("Blog Search","cc");?></h2>
       
       <?php locate_template( array( 'search-loop.php' ), true ) ;  ?>
        <?php if(!empty($_REQUEST['search-terms'])):?>
            <a href="<?php echo bp_get_root_domain().'/?s='.$_REQUEST['search-terms']?>" ><?php _e("View All matched Posts","cc");?></a>
        <?php endif; ?>
    </div>
       <?php
      }
    
    //Hook Blog Post results to search page
     add_action("advance-search","x2_show_site_blog_search",10);
    
    //show forums search
    function x2_show_forums_search(){
        ?>
     <div class="forums-search-result search-result">
       <h2 class="content-title"><?php _e("Forums Search","cc");?></h2>
      <?php locate_template( array( 'forums/forums-loop.php' ), true ) ;  ?>
      <?php if(!empty($_REQUEST['search-terms'])):?>
            <a href="<?php echo bp_get_root_domain().'/'.BP_FORUMS_SLUG.'/?s='.$_REQUEST['search-terms']?>" ><?php _e("View All matched forum posts","cc");?></a>
      <?php endif; ?>
    </div>
      <?php
      }
    
    //Hook Forums results to search page
    if ( bp_is_active( 'forums' ) && bp_is_active( 'groups' ) && ( function_exists( 'bp_forums_is_installed_correctly' )))
        add_action("advance-search","x2_show_forums_search",20);
    
    
    //show blogs search result
    
    function x2_show_blogs_search(){
    
    if(!is_multisite())
        return;
        
        ?>
      <div class="blogs-search-result search-result">
      <h2 class="content-title"><?php _e("Blogs Search","cc");?></h2>
      <?php locate_template( array( 'blogs/blogs-loop.php' ), true ) ;  ?>
      <a href="<?php echo bp_get_root_domain().'/'.BP_BLOGS_SLUG.'/?s='.$_REQUEST['search-terms']?>" ><?php _e("View All matched Blogs","cc");?></a>
     </div>
      <?php
      }
    
    //Hook Blogs results to search page if blogs comonent is active
     if(bp_is_active( 'blogs' ))
        add_action("advance-search","x2_show_blogs_search",10);
    
    
     //modify the query string with the search term
    function x2_global_search_qs(){
        if(empty($_REQUEST['search-terms']))
            return;
    
        return "search_terms=".$_REQUEST['search-terms'];
    }
    
    function x2_is_advance_search(){
    global $bp;
    if($bp->current_component == BP_SEARCH_SLUG)
        return true;
    return false;
    }
    remove_action( 'bp_init', 'bp_core_action_search_site', 7 );
        
}

// WooCommerce 
/* Remove Wrapper  */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/* Add CC Wrapper  */
add_action('woocommerce_before_main_content', create_function('', 'echo "   <div id=\"content\"><div class=\"padder\">";'), 10);
add_action('woocommerce_after_main_content', create_function('', 'echo "</div></div>";'), 10);


function remove_sidebar_left(){
    remove_action( 'sidebar_left', 'sidebar_left', 2 );
}

function remove_sidebar_right(){
    remove_action( 'sidebar_right', 'sidebar_right', 2 );
}
// list posts
function x2_list_posts($atts,$content = null) {
    global $post, $x2_js, $the_lp_query, $tmp;
    
    $tmp = $tmp_js = '';
    $this_post = $post;
    
    extract(shortcode_atts(array(
        'featured_id'                   => '',
        'amount'                        => '12',
        'posts_per_page'                => '4',
        'category_name'                 => '0',
        'page_id'                       => '',
        'post_type'                     => 'post',
        'orderby'                       => '',
        'order'                         => '',
        'featured_posts_show_sticky'    => 'off',
        'img_position'                  => 'mouse_over',
        'height'                        => 'auto',
        'show_pagination'               => 'show',
        'pagination_ajax_effect'        => 'fadeOut_fadeIn',
        'featured_posts_image_width'    => '222', 
        'featured_posts_image_height'   => '160',
    ), $atts));
    
    if( $featured_id == '')                                     $featured_id = substr(md5(rand()), 0, 10);
    if( $category_name == 'all-categories')                     $category_name = '0';
    if( $page_id != '')                                         $page_id = explode(',',$page_id);
    if( $height != 'auto' )                                     $height = $height.'px'; 
    if ( $img_position == 'posts-img-between-title-content' )   $margintop = 'margin-top: 10px;';
    
    switch ($img_position){
        case 'image left':
            $img_position = 'posts-img-left-content-right';
        break;
        case 'image right':
            $img_position = 'posts-img-right-content-left';
        break;
        case 'image top':
            $img_position = 'posts-img-over-content';
        break;
        case 'image bottom':
            $img_position = 'posts-img-under-content';
        break;
        case 'image only':
            $img_position = 'boxgrid';
        break;
        case 'widget style - with description':
            $img_position = 'posts-img-left-content-right widget';
        break;
        case 'widget style - no description':
            $img_position = 'posts-img-left-content-right widget no-desc';
        break;
    }
    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    // Get IDs of sticky posts
    $sticky_posts = get_option( 'sticky_posts' );

    // Get the sticky posts query
    $most_recent_sticky_post = array( 
        'post__in'              => $sticky_posts, 
        'ignore_sticky_posts'   => 1, 
        'category_name'         => $category_name,
        'orderby'               => $orderby,
        'posts_per_page'        => $posts_per_page,
        'amount'                => $amount,
        'orderby'               => $orderby,
        'order'                 => $order,
        'post_type'             => $post_type,
        'paged'                 => get_query_var('paged'),
        
    );
    
    // Get the normal query    
    $list_post_query_args = array(
        'amount'                => $amount,
        'posts_per_page'        => $posts_per_page,
        'orderby'               => $orderby,
        'order'                 => $order,
        'post_type'             => $post_type,
        'post__in'              => $page_id,
        'category_name'         => $category_name,
        'paged'                 => get_query_var('paged'),
        'ignore_sticky_posts'   => 1, 
    );  
    
    $list_post_query_args = $featured_posts_show_sticky == 'on' ? $most_recent_sticky_post : $list_post_query_args;
    
    $tmp_js .= list_posts_template_builder_js( $featured_id, $pagination_ajax_effect );    // hier muss das js für mause over noch rauß geholt werden
         
    remove_all_filters('posts_orderby');
    
    $list_post_query[$featured_id] = new WP_Query( $list_post_query_args );
    
    $the_lp_query = $list_post_query[$featured_id];
   
    if ($list_post_query[$featured_id]->have_posts()) : 
        while ($list_post_query[$featured_id]->have_posts()) : $list_post_query[$featured_id]->the_post();
            switch ($img_position) {
                case 'bubble':
                    get_template_part('the-loop-item');
                break;
                case 'boxgrid':
                    
                        $thumb   = get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
                        $pattern = "/(?<=src=['|\"])[^'|\"]*?(?=['|\"])/i";
                        preg_match($pattern, $thumb, $thePath); 
                        if(!isset($thePath[0])){
                            $thePath[0] = get_template_directory_uri().'/images/slideshow/noftrdimg-222x160.jpg';
                        }
                        $tmp .= '<div class="boxgrid captionfull" style="background: transparent url('.$thePath[0].') repeat scroll 0 0; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; " title="'. get_the_title().'">';
                        $tmp .= '<a href="'. get_permalink().'" title="'. get_the_title().'"><img src="'.$thePath[0].'" /></a>';
                        $tmp .= '<div class="cover boxcaption">';
                        $tmp .= '<h3 style="padding-left:8px;"><a href="'. get_permalink().'" title="'. get_the_title().'">'. get_the_title().'</a></h3>';
                        $tmp .= '<p><a href="'. get_permalink().'" title="'. get_the_title().'">'.substr(get_the_excerpt(), 0, 100).'...</a></p>';
                        $tmp .= '</div>';
                        $tmp .= '</div>'; 
                    
                break;
                default:
                      $tmp .= '<a class="clickable" href="'. get_permalink() .'" title="'. get_the_title() .'">';
                        $tmp .= '<div class="listposts '.$img_position.'">';
                        if($img_position == "posts-img-left-content-right widget" || $img_position == "posts-img-left-content-right widget no-desc") {
                            $tmp .= '<span class="link">'.get_the_post_thumbnail($post->ID, 'slider-thumbnail').'</span>';
                        } elseif ( $img_position != 'posts-img-under-content' ) {
                            $tmp .= '<span class="link">'.get_the_post_thumbnail().'</span>';
                        } 
                        $tmp .= '<h3><span class="link">'.get_the_title().'</span></h3>';
                        if($height != 'auto') $height = str_replace('px','',$height).'px'; 
                        if($img_position == 'posts-img-under-content' || $img_position == 'posts-img-over-content') $height = '48px; overflow: hidden';
                        if($img_position == 'posts-img-left-content-right widget') $height = '95px; overflow: hidden';
                        if($img_position != "posts-img-left-content-right widget no-desc") $tmp .= '<p style="height:'.$height.';">'. get_the_excerpt().'</p><span class="link more">'.__('read more','cc').'</span>';
                        if($img_position == 'posts-img-under-content') $tmp .= '<span class="link">'.get_the_post_thumbnail().'</span>';
                        $tmp .= '</div></a>';
                        if($img_position == 'posts-img-left-content-right' || $img_position == 'posts-img-right-content-left' || $img_position == 'posts-img-left-content-right widget' || $img_position == 'posts-img-left-content-right widget no-desc' ) $tmp .= '<div class="clear"></div>';    
                break;
            }
        endwhile; 
    endif;
    
    $tmp .='<div class="clear"></div>';
    
    // Pagination starts
    if($show_pagination == 'show'){
        $tmp .='<div id="navigation'.$featured_id.'">';
        $tmp .='<div class="alignleft">'. get_next_posts_link('&laquo; Older Entries',$list_post_query[$featured_id]->max_num_pages) .'</div>';
        $tmp .='<div class="alignright">' . get_previous_posts_link('Newer Entries &raquo;') .'</div>';
        $tmp .='</div><!-- End navigation -->';
    }
        
    if($show_pagination == 'pagenavi' ){
        if(function_exists('wp_pagenavi')){
            ob_start();
                wp_pagenavi( array( 'query' => $list_post_query[$featured_id]) );
                $tmp_wp_pagenavi = ob_get_clean();
                $tmp_wp_pagenavi = str_replace("wp-pagenavi", "wp-pagenavi navigation".$featured_id, $tmp_wp_pagenavi);
                
                // $page_on_front = get_option('page_on_front') ;
                // $page_for_posts = get_option('page_for_posts') ;
    
                // if(is_home() || is_front_page() && $this_post->ID == $page_on_front)
                     // $tmp_wp_pagenavi = str_replace("/page/", "/home/page/", $tmp_wp_pagenavi);                         
                $tmp .= $tmp_wp_pagenavi;
        }
    }
    
    if($img_position == 'boxgrid'){
        $x2_js['list_posts'] = true;
    }

    wp_reset_query();
    $post = $this_post;
    
    return $tmp_js.'<div id="featured_posts'.$featured_id.'"><div id="list_posts'.$featured_id.'" class="list-posts-all">'.$tmp.'</div></div>';   

}

function cc_get_pro_version(){
   $pro_enabler = get_template_directory() . DIRECTORY_SEPARATOR . '_pro' . DIRECTORY_SEPARATOR . 'pro-enabler.php';
   if(file_exists($pro_enabler)){
       require_once $pro_enabler;
   }
}
function cc_add_free_text(){
    if(!defined('is_pro')){
        echo '<div class="free-version-message">This is the free version of x2. Get the <a href="http://themekraft.com/shop/x2-premium-wordpress-theme/" target="_blank" title="Get the full version of x2 WordPress Theme.">full version here.</a></div>';
    }
}
add_action('cc_after_help_buttons', 'cc_add_free_text');

/**
 * Add admin styles
 */

function cc_add_admin_styles(){
    wp_enqueue_style('admin_x2', get_template_directory_uri() . '/_inc/css/admin.css');
}

add_action('admin_init', 'cc_add_admin_styles');
?>