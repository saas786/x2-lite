<?php
class x2{
	
	/**
	 * PHP 4 constructor
	 *
	 * @package x2
	 * @since 1.0
	 */
	function x2() {
		$this->__construct();
	}

	/**
	 * PHP 5 constructor
	 *
	 * @package x2
	 * @since 1.0
	 */	
	function __construct() {
		global $Theme_Generator;
			
		// Load predefined constants first thing
		add_action( 'x2_init', array( $this, 'load_constants' ), 2 );
		
		// Includes necessary files
		add_action( 'x2_init', array( $this, 'includes' ), 100, 4 );
		
		// Includes the necessary js
		add_action('wp_enqueue_scripts', array( $this, 'enqueue_script' ), 2 );
		add_action('wp_footer', array( $this, 'x2_footer_js' ), 99);
        
        // Includes the necessary css
        add_action('wp_enqueue_scripts', array( $this, 'enqueue_style' ), 2 );
         
        
		// Let plugins know that x2 has started loading
		$this->init_hook();

		// Let other plugins know that x2 has finished initializing
		$this->loaded();
		
		if ( function_exists( 'bp_is_active' ) )
			BPUnifiedsearch::get_instance();
		
		if(!is_admin())
			$Theme_Generator = new x2_Theme_Generator();
        
    }
	
	/**
	 * defines x2 init action
	 *
	 * this action fires on WP's init action and provides a way for the rest of x2,
	 * as well as other dependend plugins, to hook into the loading process in an
	 * orderly fashion.
	 *
	 * @package x2
	 * @since 1.0
	 */	
	function init_hook() {
		do_action( 'x2_init' );
	}
	
	/**
	 * defines x2 action
	 *
	 * this action tells x2 and other plugins that the main initialization process has
	 * finished.
	 * 
	 * @package x2
	 * @since 1.0
	 */	
	function loaded() {
		do_action( 'x2_loaded' );
	}
	
	/**
	 * defines constants needed throughout the theme.
	 *
	 * these constants can be overridden in bp-custom.php or wp-config.php.
	 *
	 * @package x2
	 * @since 1.0
	 */		
	function load_constants() {
		
		// The slug used when deleting a doc
		if ( !defined( 'x2_TEMPLATE_PATH' ) )
			define( 'x2_TEMPLATE_PATH', 'x2_TEMPLATE_PATH' );
			
	}	
	
	/**
	 * includes files needed by x2
	 *
	 * @package x2
	 * @since 1.0
	 */	
	function includes() {
			
        require_once($this->require_path('/_inc/ajax.php'));
        
		// helper functions
		require_once($this->require_path('/core/includes/helper-functions.php'));
        
        // HOOKS
        require_once($this->require_path('/x2-hooks.php'));

		// theme layout specific functions
		require_once($this->require_path('/core/includes/theme-generator/style.php'));
		require_once($this->require_path('/core/includes/theme-generator/theme-generator.php'));
		
		// wordpress specific functions
		require_once($this->require_path('/core/includes/shortcodes.php'));
		
        // widgets
		require_once($this->require_path('/core/includes/widgets/list-posts-widget.php'));
        require_once($this->require_path('/core/includes/widgets/carousel-posts-widget.php'));
        require_once($this->require_path('/core/includes/widgets/widgets.php'));

		// buddypress specific functions
		if(defined('BP_VERSION')){
			require_once($this->require_path('/core/includes/bp/templatetags.php'));
			require_once($this->require_path('/core/includes/bp/buddydev-search.php'));	
		}
		
		// themekraft framework specific functions
		require_once($this->require_path('/core/includes/wp-detect/detect.php'));
        
        // Nivo Slider
        require_once($this->require_path('/core/includes/sliders/wp-nivo-slider.php'));
        
        // Flux Slider
        require_once($this->require_path('/core/includes/sliders/wp-flux-slider.php'));
    }

	###  js
 	function enqueue_script() {
 	    global $cap;
	     if( is_admin() )
	        return;
	
		// on single blog post pages with comments open and threaded comments
		if(defined('BP_VERSION')){
			if ( is_singular() && bp_is_blog_page() && get_option( 'thread_comments' ) ) {
		    // enqueue the javascript that performs in-link comment reply fanciness
	        wp_enqueue_script( 'comment-reply' ); 
	    	}
	    } else {
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
	        // enqueue the javascript that performs in-link comment reply fanciness
	        wp_enqueue_script( 'comment-reply' ); 
	    	}
	    }
	        
	    wp_deregister_script( 'ep-jquery-css' );
	        
	    wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui' );	
		wp_enqueue_script( 'jquery-ui-tabs' );
		
		// wp_register_script('reflection',get_template_directory_uri() . '/_inc/js/reflection.js','','' );
        // wp_enqueue_script('reflection');
		
		wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/core/includes/bootstrap/js/bootstrap.min.js', array('jquery') );
        
        if($cap->menue_waypoints == true) {
            wp_enqueue_script('waypoints', get_template_directory_uri().'/core/includes/waypoints/waypoints.min.js', array('jquery'), '1.4.4', true );
            add_action('wp_footer', 'waypoints_js', 1 );
        }
        
    }

    ### add css
    function enqueue_style() {
    	wp_register_style( 'font-style', 'http://fonts.googleapis.com/css?family=Ubuntu' );
		wp_register_style( 'font-style', 'http://fonts.googleapis.com/css?family=Fjord+One' );
        wp_enqueue_style( 'font-style' );
        wp_enqueue_style('bootstrapwp', get_template_directory_uri().'/core/includes/bootstrap/css/bootstrap.css', false ,'0.90', 'all' );
        wp_enqueue_style('waypoints', get_template_directory_uri().'/core/includes/waypoints/css/waypoints.css', false ,'0.90', 'all' );
        
	}
    
	/** check if it's a child theme or parent theme and return the correct path */
	function require_path($path){
	if( get_template_directory() != get_stylesheet_directory() && is_file(get_stylesheet_directory() . $path) ): 	
        return STYLESHEETPATH . $path;
    else:
        return TEMPLATEPATH . $path;
    endif;
	}
    
    
    /**
     * Display shortcode and other page specific js in the footer only if required
     * 
     * @package x2
     * @since 1.0
     */
   
   function x2_footer_js(){
        global $x2_js;
        $js = '';
        ob_start(); ?>
    
        <?php
        
        $js .= ob_get_contents();
        
        if(empty($x2_js))
            return;
    
        if(!empty($x2_js) && count($x2_js) > 0){
            $js .= '<script type="text/javascript">';
    
            // Slideshow or slider
            if(isset($x2_js['slideshow'])){
                foreach ($x2_js['slideshow'] as $key => $params) {
                    $js .= 'jQuery("#featured'.$params['id'].'").tabs({fx:{opacity: "toggle"}}).tabs("rotate", '.$params['time_in_ms'].', true);
                            jQuery("#featured'.$params['id'].'").hover(
                                function(){jQuery("#featured'.$params['id'].'").tabs("rotate",0,true);},
                                function(){jQuery("#featured'.$params['id'].'").tabs("rotate",'.$params['time_in_ms'].',true);
                            });';
                }
            }
    
            // Image effects (reflects)
            if(isset($x2_js['img_effect'])){
                foreach ($x2_js['img_effect'] as $key => $params) {
                    $js .= 'jQuery("#img_effect'.$params['id'].'").reflect({height:'.$params['rheight'].',opacity:'.$params['ropacity'].'});';
                }
            }
    
            // Accordion
            if(isset($x2_js['accordion'])){
                foreach ($x2_js['accordion'] as $key => $params) {
                    $js .= 'jQuery("#accordion'.$params['id'].' div.swap'.$params['id'].'").hide();
                            jQuery("#accordion'.$params['id'].' h3").click(function(){
                                jQuery(this).nextUntil("h3", "div.swap'.$params['id'].'").slideToggle("slow").siblings("div.swap'.$params['id'].':visible").slideUp("slow");
                                jQuery(this).toggleClass("active");
                                jQuery(this).siblings("h3").removeClass("active");
                            });';
                }
            }
    
            // List posts
            if(isset($x2_js['list_posts'])){
                if ($x2_js['list_posts'] === true){
                    $js .= 'jQuery(".boxgrid.captionfull").hover(function(){
                                jQuery(".cover", this).stop().animate({top:"-90px"},{queue:false,duration:160});
                            }, function(){
                                jQuery(".cover", this).stop().animate({top:"0px"},{queue:false,duration:160});
                            });';
                }
            }
    
            $js .= '</script>';
        }
 
        echo $js;
 
    }
        
    
}

?>