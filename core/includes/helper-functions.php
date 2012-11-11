<?php function waypoints_js(){ ?>
        <script type="text/javascript">
        jQuery(document).ready(function() {
            
            jQuery('.top').addClass('hidden');
            jQuery.waypoints.settings.scrollThrottle = 300;
            jQuery('#outerrim').waypoint(function(event, direction) {
                jQuery('.top').toggleClass('hidden', direction === "up");
            }, {
                offset: '-100%'
            }).find('#access').waypoint(function(event, direction) {
                jQuery('#access').toggleClass('sticky', direction === "down");
                jQuery('#header').toggleClass('sticky', direction === "down");
                event.stopPropagation();
            });
        
        });
        </script>

<?php } 

// this function adds the needed class "icon-white" if color scheme is dark or black..   
function white_icon_class() {
	if ( x2_get_color_scheme() == 'dark' || x2_get_color_scheme() == 'black' ) {
		echo 'icon-white';
	}
}

function add_home_to_nav(){ ?>
	    <div id="nav-logo">
	         <ul>
				<li id="nav-home"<?php if ( is_home() ) : ?> class="page_item current-menu-item"<?php endif; ?>>
					<a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'cc' ) ?>"><i class="icon-home <?php white_icon_class() ?>"></i></a>
				</li>
			</ul>
	    </div>
<?php }

function out_of_site_widget(){ 
    global $cap; 
    
    if($cap->out_of_content_widget == false) { ?>
        
        <script>
            var name = "#out_of_site_widget";
            var menuYloc = null;
            jQuery(document).ready(function(){
                    menuYloc = parseInt(jQuery(name).css("top").substring(0,jQuery(name).css("top").indexOf("px")))
                    jQuery(window).scroll(function () { 
                        offset = menuYloc+jQuery(document).scrollTop()+"px";
                            jQuery(name).animate({top:offset},{duration:1000,queue:false});
                        });
                });
        </script>
        
    <?php } ?>   
    
    <style>
       #out_of_site_widget { position:absolute; width:192px; top:229px; right:0; display:none;}
        @media (min-width: 1422px) { 
            #out_of_site_widget{
            display:block;
        }
       }
    </style>   
           
    <div id="out_of_site_widget" class=".visible-desktop">
        <?php dynamic_sidebar( 'out_of_content' )?>
    </div>
<?php }



// body badge function, if the option is set
function body_badge(){
    global $cap;    
                
    if ( $cap->body_badge_show != "hide" ) {
        
        // add a link around if a url is set    
        if ( $cap->body_badge_link != "" ) {  
            ?><a class="body_badge_link" href="<?php echo $cap->body_badge_link; ?>" title="yo"><?php 
        }
        
        // only the badge body will be added anyway 
        ?><div class="badge_body"><?php 
        
        // add the text only if something != "just my image" is set 
        if ( $cap->body_badge_show != "just my image" ) { 
            ?><div class="badge_text"><?php echo $cap->body_badge_text; ?></div><?php
        }
        
        // close the badge body anyway 
        ?></div><?php 
        
        // close the link around if a url was set   
        if ( $cap->body_badge_link != "" ) {
        ?></a><?php 
        }
    }
}

function list_posts_template_builder_js($featured_id,$pagination_ajax_effect){
    $tmp_js = '';
    $tmp_js .= '<script type="text/javascript">'. chr(13);
    $tmp_js .= 'jQuery(document).ready(function(){'. chr(13);
    $tmp_js .= 'boxgrid();'. chr(13);
    $tmp_js .= 'jQuery(\'.navigation'.$featured_id. ' a, #navigation'.$featured_id.' a\').live(\'click\', function(e){'. chr(13);
    $tmp_js .= '    e.preventDefault();'. chr(13);
    $tmp_js .= '    var link = jQuery(this).attr(\'href\');'. chr(13);
    $tmp_js .= '    jQuery.fx.interval = 100;'. chr(13);
  
   // echo $pagination_ajax_effect;
   
    switch ($pagination_ajax_effect) {
        case 'hide_show':
                $tmp_js .=  'jQuery(\'#featured_posts'.$featured_id.'\').hide(600).load(link + \' #list_posts'.$featured_id.'\', function(){ jQuery(\'#featured_posts'.$featured_id.'\').show(400);'. chr(13);      
            break;
        case 'fadeOut_fadeIn':
                $tmp_js .=  'jQuery(\'#featured_posts'.$featured_id.'\').fadeOut(\'slow\').load(link + \' #list_posts'.$featured_id.'\', function(){ jQuery(\'#featured_posts'.$featured_id.'\').fadeIn(400);'. chr(13);            
             break;
        case 'slideUp_slidedown':
                $tmp_js .=  'jQuery(\'#featured_posts'.$featured_id.'\').slideUp(400).load(link + \' #list_posts'.$featured_id.'\', function(){ jQuery(\'#featured_posts'.$featured_id.'\').slideDown(300);'. chr(13);         
            break;
        case 'slide_left_slide_right':
                $tmp_js .=  'jQuery(\'#featured_posts'.$featured_id.'\').animate({ width: \'hide\', opacity: \'hide\'}, \'slow\').load(link + \' #list_posts'.$featured_id.'\', function(){ jQuery(\'#featured_posts'.$featured_id.'\').animate({ width: \'show\', opacity: \'show\'}, \'slow\');'. chr(13);         
            break;    
        default:
                $tmp_js .=  'jQuery(\'#featured_posts'.$featured_id.'\').hide(600).load(link + \' #list_posts'.$featured_id.'\', function(){ jQuery(\'#featured_posts'.$featured_id.'\').show(400);'. chr(13);      
           break;
    }
    $tmp_js .= 'boxgrid();'. chr(13);
    $tmp_js .=  '});'. chr(13);
    $tmp_js .= '});'. chr(13);
    $tmp_js .= '        function boxgrid(){'. chr(13);
    $tmp_js .= '    jQuery(\'.boxgrid.captionfull\').hover(function(){'. chr(13);
    $tmp_js .= '        jQuery(\'.cover\', this).stop().animate({top:\'-90px\'},{queue:false,duration:160});'. chr(13);
    $tmp_js .= '    }, function() {'. chr(13);
    $tmp_js .= '        jQuery(".cover", this).stop().animate({top:"0px"},{queue:false,duration:160});'. chr(13);
    $tmp_js .= '    });'. chr(13);
    $tmp_js .= '}'. chr(13);
    $tmp_js .= '});'. chr(13);
    $tmp_js .= '</script>'. chr(13);

    return  $tmp_js;
}

function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}

/**
 * check if it's a child theme or parent theme and return the correct path
 *
 * @package x2
 * @since 1.0
 */
function x2_require_path($path){
	x2::require_path($path);
}
	
/**
 * get the right img for the slideshow shadow
 *
 * @package x2
 * @since 1.0
 */
function x2_slider_shadow() {
	global $cap;
	if ($cap->slideshow_shadow == "shadow") { 
		return "slider-shadow.png"; 
	} else { 
		return "slider-shadow-sharp.png"; 
	}
}  

/**
 *  define new excerpt length
 *
 * @package x2
 * @since 1.0
 */
function x2_excerpt_length() {
	global $cap;
	$excerpt_length = 30;
	if($cap->excerpt_length){
		$excerpt_length = $cap->excerpt_length;
	}
	return $excerpt_length;
}

/**
 * change the profile tab order
 *
 * @package x2
 * @since 1.0
 */
add_action( 'bp_init', 'x2_change_profile_tab_order' );
function x2_change_profile_tab_order() {
	global $bp, $cap;

	if($cap->bp_profiles_nav_order == ''){
		$cap->bp_default_navigation = true;
		return;
	}
	$order = $cap->bp_profiles_nav_order;
	$order = str_replace(' ','',trim($order)); 
	$order = explode(",", $order);
	$i = 1;
	
	$bp->bp_nav = x2_filter_custom_menu($bp->bp_nav, $order);
	
	foreach($order as $item) {
		// check this such component actually exists
		if(!bp_is_active($item)){
			continue;
		}
		$bp->bp_nav[$item]['position'] = $i;
		$i ++;
	}
}

/**
 * change the groups tab order
 *
 * @package x2
 * @since 1.0
 */
add_action('bp_init', 'x2_change_groups_tab_order');
function x2_change_groups_tab_order() {
	global $bp, $cap;

	
	// In BP 1.3, bp_options_nav for groups is keyed by group slug instead of by 'groups', to
	// differentiate it from the top-level groups directories and the groups subtab of member
	// profiles
	$group_slug = isset( $bp->groups->current_group->slug ) ? $bp->groups->current_group->slug : false;
	
	
	if($cap->bp_groups_nav_order == ''){
		$cap->bp_default_navigation = true;
		return;
	}

		
	$order = $cap->bp_groups_nav_order;
	$order = str_replace(' ','',$order); 
	$order = explode(",", $order);
	$i = 1;
    
	$bp->bp_options_nav[$group_slug] = cc_filter_custom_menu($bp->bp_options_nav[$group_slug], $order);
	if(!empty($bp->bp_options_nav[$group_slug])){
		foreach($order as $item) {
			if(!array_key_exists($item, $bp->bp_options_nav[$group_slug])){
				continue;
			}
			$bp->bp_options_nav[$group_slug][$item]['position'] = $i;
			$i ++;
		}
	}
}
/**
 * Remove menu items wihich not included to custom list
 * @param array $menu default menu
 * @param array $custom_items list of items
 * @return array new menu items
 */
function x2_filter_custom_menu($menu, $custom_items){
	if(is_array($custom_items) && is_array($menu)){
		return array_intersect_key($menu, array_flip($custom_items));
	}
	return $menu;
}


/**
 * This function here defines the defaults for the main theme colors - if no other specific color is set ;)  
 * It's used only one time - in the beginning of style.php.
 *
 * @package x2
 * @since 0.1
 */
	
function x2_switch_css(){
	global $cap;
		
		if(isset( $_GET['show_style']))
            $cap->style_css = $_GET['show_style'];
        
		switch ($cap->style_css){
	        case 'dark':
				if( $cap->bg_body_color == '' ) $cap->bg_body_color  =  '393939';
				if( $cap->bg_container_color == '' ) $cap->bg_container_color  =  '393939';
				if( $cap->bg_container_alt_color == '' ) $cap->bg_container_alt_color  =  '232323';
				if( $cap->bg_details_color == '' ) $cap->bg_details_color  =  '282828';
				if( $cap->bg_details_hover_color == '' ) $cap->bg_details_hover_color  =  '333333';
				if( $cap->font_color == '' ) $cap->font_color  =  'aaaaaa';
				if( $cap->font_alt_color == '' ) $cap->font_alt_color  =  '777777';
				if( $cap->link_color == '' ) $cap->link_color  =  'b7c366';
		    break;
	        case 'white':
				if( $cap->bg_body_color == '' ) $cap->bg_body_color  =  'ffffff';
				if( $cap->bg_container_color == '' ) $cap->bg_container_color  =  'ffffff';
				if( $cap->bg_container_alt_color == '' ) $cap->bg_container_alt_color  =  'e3e3e3';
				if( $cap->bg_details_color == '' ) $cap->bg_details_color  =  'f1f1f1';
				if( $cap->bg_details_hover_color == '' ) $cap->bg_details_hover_color  =  'f9f9f9';
				if( $cap->font_color == '' ) $cap->font_color  =  '777777';
				if( $cap->font_alt_color == '' ) $cap->font_alt_color  =  'aaaaaa';
				if( $cap->link_color == '' ) $cap->link_color  =  '6ba090';
			break;
	        case 'black':
				if( $cap->bg_body_color == '' ) $cap->bg_body_color  =  '040404';
				if( $cap->bg_container_color == '' ) $cap->bg_container_color  =  '040404';
				if( $cap->bg_container_alt_color == '' ) $cap->bg_container_alt_color  =  '222222';
				if( $cap->bg_details_color == '' ) $cap->bg_details_color  =  '121212';
				if( $cap->bg_details_hover_color == '' ) $cap->bg_details_hover_color  =  '181818';
				if( $cap->font_color == '' ) $cap->font_color  =  '696969';
				if( $cap->font_alt_color == '' ) $cap->font_alt_color  =  '444444';
				if( $cap->link_color == '' ) $cap->link_color  =  '2b9c83';
	        break;
			case 'light':
				if( $cap->bg_body_color == '' ) $cap->bg_body_color  =  'f9f9f9';
				if( $cap->bg_container_color == '' ) $cap->bg_container_color  =  'f9f9f9';
				if( $cap->bg_container_alt_color == '' ) $cap->bg_container_alt_color  =  'dedede';
				if( $cap->bg_details_color == '' ) $cap->bg_details_color  =  'e7e7e7';
				if( $cap->bg_details_hover_color == '' ) $cap->bg_details_hover_color  =  'f1f1f1';
				if( $cap->font_color == '' ) $cap->font_color  =  '777777';
				if( $cap->font_alt_color == '' ) $cap->font_alt_color  =  'aaaaaa';
				if( $cap->link_color == '' ) $cap->link_color  =  '74a4a3';
	        break;
			case 'natural':
				if( $cap->bg_body_color == '' ) $cap->bg_body_color  =  'e9e6d8';
				if( $cap->bg_container_color == '' ) $cap->bg_container_color  =  'e9e6d8';
				if( $cap->bg_container_alt_color == '' ) $cap->bg_container_alt_color  =  'cec7ab';
				if( $cap->bg_details_color == '' ) $cap->bg_details_color  =  'dcd6bd';
				if( $cap->bg_details_hover_color == '' ) $cap->bg_details_hover_color  =  'e3dec8';
				if( $cap->font_color == '' ) $cap->font_color  =  '79735d';
				if( $cap->font_alt_color == '' ) $cap->font_alt_color  =  '999177';
				if( $cap->link_color == '' ) $cap->link_color  =  'c3874a';
	        break;
			default: 
				if( $cap->bg_body_color == '' ) $cap->bg_body_color  =  'f9f9f9';
				if( $cap->bg_container_color == '' ) $cap->bg_container_color  =  'f9f9f9';
				if( $cap->bg_container_alt_color == '' ) $cap->bg_container_alt_color  =  'dedede';
				if( $cap->bg_details_color == '' ) $cap->bg_details_color  =  'e7e7e7';
				if( $cap->bg_details_hover_color == '' ) $cap->bg_details_hover_color  =  'f1f1f1';
				if( $cap->font_color == '' ) $cap->font_color  =  '777777';
				if( $cap->font_alt_color == '' ) $cap->font_alt_color  =  'aaaaaa';
				if( $cap->link_color == '' ) $cap->link_color  =  '74a4a3';
	        break;
		}

	return TRUE;
}
	
/**
 * find out the right color scheme and create the array of css elements with the hex codes
 *
 * @package x2
 * @since 1.0
 */
function x2_color_scheme(){
	echo x2_get_color_scheme();
}
	function x2_get_color_scheme(){
		global $cap;
		if(isset( $_GET['show_style']))
			$cap->style_css = $_GET['show_style']; 
			
		switch ($cap->style_css){
	        case 'dark':
				$color = 'dark';
	        	break;
	        case 'light':
				$color = 'light';
	        	break;
	        case 'white':
				$color = 'white';
	        	break;
	        case 'black':
				$color = 'black';
	        	break;
			case 'natural':
				$color = 'natural';
	        	break;
	        default:
				$color = 'white';
	        	break;
	        }
	        return $color;  
	}

?>