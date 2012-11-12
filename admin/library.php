<?php
//
// CheezCap - Cheezburger Custom Administration Panel
// (c) 2008 - 2010 Cheezburger Network (Pet Holdings, Inc.)
// LOL: http://cheezburger.com
// Source: http://code.google.com/p/cheezcap/
// Authors: Kyall Barrows, Toby McKes, Stefan Rusek, Scott Porad
// License: GNU General Public License, version 2 (GPL), http://www.gnu.org/licenses/gpl-2.0.html
//

class Group {
	var $name;
	var $id;
	var $options;
	
	function Group( $_name, $_id, $_options ) {
		$this->name = $_name;
		$this->id = "cap_$_id";
		$this->options = apply_filters('cc_cap_get_options', $_options, $_id);
	}
	
	function WriteHtml() {
			echo '<div class="accordion">';
			for ( $i=0; $i < count( $this->options ); $i++ ) {
				$this->options[$i]->WriteHtml();
			}
			echo '</div>';
	}
}

class Option {
	var $name;
	var $desc;
	var $id;
	var $_key;
	var $std;
	var $accordion;
	var $accordion_name;
	
	function Option( $_name, $_desc, $_id, $_std  ) {
		$this->name = $_name;
		$this->desc = $_desc;
		$this->id = "cap_$_id";
		$this->_key = $_id;
		$this->std = $_std;
	}
	
	function WriteHtml() {
		echo '';
	}
	
	function Reset( $ignored ) {
		update_option( $this->id, $this->std );
	}
	
	function Import( $data ) {
		if ( array_key_exists( $this->id, $data->dict ) )
				$cap = get_option('x2_theme_options');
				$cap[$this->id] = $data->dict[$this->id];
				update_option( 'x2_theme_options', $cap );
	}
	
	function Export( $data ) {
		$cap = get_option('x2_theme_options');
		$data->dict[$this->id] = $cap[$this->id];	
	}

	function get() {
		$value = get_option('x2_theme_options');
		return $value[$this->id];
	}
}

class TextOption extends Option {
	var $useTextArea;

	function TextOption( $_name, $_desc, $_id, $_std = '', $_useTextArea = false, $_accordion = 'on', $_accordion_name = "off"  ) {
		$this->Option( $_name, $_desc, $_id, $_std );
		$this->useTextArea = $_useTextArea;
		$this->accordion = $_accordion;
		$this->accordion_name = $_accordion_name;
	}
	
	function WriteHtml() {

		$stdText = $this->std;
		$value = get_option('x2_theme_options');
    	if ( isset($value[$this->id]) && $value[$this->id] != "" )
            $stdText =  $value[$this->id];
	
			if($this->accordion == 'on' || $this->accordion == 'start'){ ?>	
				<?php if($this->accordion_name != 'off') { ?>
					<h3><a href="#"><?php echo $this->accordion_name; ?></a></h3>
					<div>
					<p><b><?php echo $this->name; ?></b></p>
				<?php } else {?>
					<h3><a href="#"><?php echo $this->name; ?></a></h3>
					<div>
				<?php }?>
			<?php } else { ?>
				<p><b><?php echo $this->name; ?></b></p>
			<?php } ?>
			<?php echo $this->desc.'<br />'; 
			$commentWidth = 2;
			if ( $this->useTextArea ) :
				$commentWidth = 1;
				?>
				<textarea onfocus="jQuery('textarea').elastic();" style="width:100%;height:100%;" name="x2_theme_options[<?php echo $this->id; ?>]" id="<?php echo $this->id; ?>"><?php echo esc_attr( $stdText ); ?></textarea>
				<?php
			else :
				?>
				<input name="x2_theme_options[<?php echo $this->id; ?>]" id="<?php echo $this->id; ?>" type="text" value="<?php echo esc_attr( $stdText ); ?>" size="40" />
				<?php
			endif; 
			
			if($this->accordion == 'on' || $this->accordion == 'end'){ ?>
				</div>
			<?php } ?>
	<?php 
	}

	function get() {
		$value = get_option('x2_theme_options');
		if(isset($value[$this->id])) $value = $value[$this->id]; else $value='';

		if ( empty( $value ) )
			return $this->std;
		return $value;
	}
}

class DropdownOption extends Option {
	var $options;

	function DropdownOption( $_name, $_desc, $_id, $_options, $_stdIndex = 0, $_accordion = 'on', $_accordion_name = "off" ) {
		$this->Option( $_name, $_desc, $_id, $_stdIndex );
		$this->options = $_options;
		$this->accordion = $_accordion;
		$this->accordion_name = $_accordion_name;
		$this->stdIndex = $_stdIndex;
		// echo '<pre>';
		// print_r($this->options);
		// echo '</pre>';
	}
	
	function WriteHtml() {

			if($this->accordion == 'on' || $this->accordion == 'start'){ ?>	
				<?php if($this->accordion_name != 'off') { ?>
					<h3><a href="#"><?php echo $this->accordion_name; ?></a></h3>
					<div>
					<p><b><?php echo $this->name; ?></b></p>
				<?php } else {?>
					<h3><a href="#"><?php echo $this->name; ?></a></h3>
					<div>
				<?php }?>
			<?php } else { ?>
				<div class="<?php echo $this->id; ?>" ><p><b><?php echo $this->name; ?></b></p></div>
			<?php } ?>
				<div class="<?php echo $this->id; ?>" ><?php echo $this->desc; ?></div>
				<select class="<?php echo $this->id; ?>" name="x2_theme_options[<?php echo $this->id; ?>]" id="<?php echo $this->id; ?>">
				<?php
				
				foreach( $this->options as $option ) :
					// If standard value is given
			
					$value = get_option('x2_theme_options');
                    
					$value = (isset($value[$this->id]))? $value[$this->id] : '';
					
					if($this->stdIndex != "" && $value == ""){
						$value = $this->stdIndex;
					}
					
					if( $this->std != "" ){
						?>
						<option<?php if ( $value == $option || ( ! $value && (isset($this->options[ $this->std ]))? $this->options[ $this->std ] : '' == $option )) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
						<?php
					}else{ 
						?>
						<option<?php if ( $value == $option ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php }
				endforeach;
				?>
				</select>
			<?php if( $this->accordion == 'on' || $this->accordion == 'end'){ ?>
				</div>
			<?php } ?>
			<?php
	}

	function get() {
		$value = get_option('x2_theme_options');
		$value = $value[$this->id];
		//echo $value;
	     	if ( strtolower( $value ) == 'disabled' )
			return false;
		return $value;
	}
}

class DropdownCatOption extends Option {
	var $options;

	function DropdownCatOption( $_name, $_desc, $_id, $_options, $_stdIndex = 0, $_accordion = 'on', $_accordion_name = "off" ) {
		$this->Option( $_name, $_desc, $_id, $_stdIndex );
		$this->options = $_options;
		$this->accordion = $_accordion;
		$this->accordion_name = $_accordion_name;
	}
	
	function WriteHtml() {

			if($this->accordion == 'on' || $this->accordion == 'start'){ ?>	
				<?php if($this->accordion_name != 'off') { ?>
					<h3><a href="#"><?php echo $this->accordion_name; ?></a></h3>
					<div>
					<p><b><?php echo $this->name; ?></b></p>
				<?php } else {?>
					<h3><a href="#"><?php echo $this->name; ?></a></h3>
					<div>
				<?php }?>
			<?php } else { ?>
				<p><b><?php echo $this->name; ?></b></p>
			<?php } ?>
				<?php echo $this->desc; ?></br>
				<select name="x2_theme_options[<?php echo $this->id; ?>]" id="<?php echo $this->id; ?>">
				<?php
				
				foreach( $this->options as $option ) :
					// If standard value is given
			
					$value = get_option('x2_theme_options');
					$value = (isset($value[$this->id]))? $value[$this->id] : '';
					if( $this->std != "" ){
						?>
						<option<?php if ( $value == $option['slug'] || ( ! $value && $this->options[ $this->std ] == $option['slug'] )) { echo ' selected="selected"'; } ?> value="<?php echo $option['slug'] ?>"><?php echo $option['name']; ?></option>
						<?php
					}else{ 
						?>
						<option<?php if ( $value == $option['slug'] ) { echo ' selected="selected"'; } ?> value="<?php echo $option['slug'] ?>"><?php echo $option['name']; ?></option>
					<?php }
				endforeach;
				?>
				</select>
			<?php if( $this->accordion == 'on' || $this->accordion == 'end'){ ?>
				</div>
			<?php } ?>
			<?php
	}

	function get() {
		$value = get_option('x2_theme_options');
		$value = $value[$this->id];
		//echo $value;
	     	if ( strtolower( $value ) == 'disabled' )
			return false;
		return $value;
	}
}


class BooleanOption extends DropdownOption {
	var $default;

	function BooleanOption( $_name, $_desc, $_id, $_default = false, $_accordion = 'on', $_accordion_name = "off"   ) {
		$this->default = $_default;
		$this->DropdownOption( $_name, $_desc, $_id, array( 'Disabled', 'Enabled' ), $_default ? 1 : 0 );
		$this->accordion = $_accordion;
		$this->accordion_name = $_accordion_name;
        $this->stdIndex = $_default;
        
	}

	function get() {
		$value = get_option('x2_theme_options');
		if(isset($value[$this->id])) $value = $value[$this->id]; else $value='';
		
		if($this->stdIndex != "" && $value == ""){
            $value = $this->stdIndex;
        }
            
        
		if ( is_bool( $value ) )
			return $value;
		switch ( strtolower( $value ) ) {
			case 'true':
			case 'enable':
			case 'enabled':
				return true;
			default:
				return false;
		}
	}
}

class ColorOption extends Option
{

	function ColorOption( $_name, $_desc, $_id, $_std = "", $_accordion = 'on', $_accordion_name = "off"   )
	{
        $this->Option( $_name, $_desc, $_id, $_std );
        $this->accordion = $_accordion;
		$this->accordion_name = $_accordion_name;
	}
	
	function WriteHtml(){
	
		$stdText = $this->std;
		$value = get_option('x2_theme_options');
    	if ( $value[$this->id] != "" )
            $stdText =  $value[$this->id];

			if($this->accordion == 'on' || $this->accordion == 'start'){ ?>	
				<?php if($this->accordion_name != 'off') { ?>
					<h3><a href="#"><?php echo $this->accordion_name; ?></a></h3>
					<div>
					<p><b><?php echo $this->name; ?></b></p>
				<?php } else {?>
					<h3><a href="#"><?php echo $this->name; ?></a></h3>
					<div>
				<?php }?>
			<?php } else { ?>
				<p><b><?php echo $this->name; ?></b></p>
			<?php } ?>
			<?php echo $this->desc.'<br />'; ?>
        	<input name="x2_theme_options[<?php echo $this->id; ?>]" id="<?php echo $this->id ?>" type="text" value="<?php echo htmlspecialchars($stdText) ?>" size="40" />
			<?php 
        	if($this->accordion == 'on' || $this->accordion == 'end'){ ?>
				</div>
			<?php } ?>

			<script type="text/javascript">
				jQuery('#<?php echo $this->id ?>').ColorPicker({
					onSubmit: function(hsb, hex, rgb, el) {
					jQuery(el).val(hex);
						jQuery(el).ColorPickerHide();
					},
					onBeforeShow: function () {
						jQuery(this).ColorPickerSetColor(this.value);
					}
				})
				.bind('keyup', function(){
					jQuery(this).ColorPickerSetColor(this.value);
				});
		
		</script>
	<?php 
	}

    function get()
    {
		$value = get_option('x2_theme_options');
    	$value = $value[$this->id];
        if (!$value)
            return $this->std;
        return $value;
    }
}


class FileOption extends Option
{

	function FileOption( $_name, $_desc, $_id, $_std = "", $_accordion = 'on', $_accordion_name = "off"  )
	{
        $this->Option( $_name, $_desc, $_id, $_std);
        $this->accordion = $_accordion;
		$this->accordion_name = $_accordion_name;
	}
	
	function WriteHtml()
	{

		$stdText = $this->std;
		$value = get_option('x2_theme_options');
    	if ( isset($value[$this->id]) && $value[$this->id] != "" )
            $stdText =  $value[$this->id];
		   
			if($this->accordion == 'on' || $this->accordion == 'start'){ ?>	
				<?php if($this->accordion_name != 'off') { ?>
					<h3><a href="#"><?php echo $this->accordion_name; ?></a></h3>
					<div>
					<p><b><?php echo $this->name; ?></b></p>
				<?php } else {?>
					<h3><a href="#"><?php echo $this->name; ?></a></h3>
					<div>
				<?php }?>
			<?php } else { ?>
				<p><b><?php echo $this->name; ?></b></p>
			<?php } ?>
			<?php echo $this->desc.'<br />'; ?>
			
			<div class="option-inputs">

				<label for="image1">
				<input id="#upload_image<?php echo $this->id ?>" type="text" size="36" name="x2_theme_options[<?php echo $this->id; ?>]" value="<?php echo htmlspecialchars($stdText) ?>" />
				<input class="upload_image_button" type="button" value="Browse.." /><br></br>
				<img class="x2_image_preview" id="image_<?php echo $this->id ?>" src="<?php echo htmlspecialchars($stdText);  ?>" style="max-width: 100px"/>
				
				</label>

			</div> 
		<?php 	if($this->accordion == 'on' || $this->accordion == 'end'){ ?>
				</div>
			<?php } ?>
		<?php 
	}

    function get()
    {
		$value = get_option('x2_theme_options');
		$value = $value[$this->id];
    if (!$value)
            return $this->std;
        return $value;
    }
}

// This class is the handy short cut for accessing config options
// 
// $cap->post_ratings is the same as get_bool_option("cap_post_ratings", false)
//

class autoconfig {
	private $data = false;
	private $cache = array();

	function init() {
		if ( $this->data )
			return;

		$this->data = array();
		$options = cap_get_options();

		foreach ($options as $group) {
			foreach($group->options as $option) {
				$this->data[$option->_key] = $option;
			}
		}
	}

	public function __get( $name ) {
		$this->init();

		if ( array_key_exists( $name, $this->cache ) )
			return $this->cache[$name];

		if ( empty($this->data[$name]) )
			return ''; 
		
		$option = $this->data[$name];
		$value = $this->cache[$name] = $option->get();
		return $value;
	}
}

function cap_admin_css() {

	wp_enqueue_style('thickbox');

	wp_enqueue_style( 'colorpicker-css', get_template_directory_uri().'/admin/css/colorpicker.css', false );
	//wp_enqueue_style( 'fileuploader-css', get_template_directory_uri().'/admin/css/fileuploader.css' );
	wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri().'/admin/css/jquery-ui.css' );
	
}

function cap_admin_js_libs() {
	
	wp_enqueue_script( 'jquery-ui' );	
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'jquery-ui-widget' );
	wp_enqueue_script( 'jquery-color' );
	
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_template_directory_uri() . '/admin/js/uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
	
	wp_register_script( 'jquery-ui-accordion', get_template_directory_uri() . '/admin/js/jquery.ui.accordion.js', array( 'jquery' ), '1.8.9', true );
	wp_enqueue_script( 'jquery-ui-accordion' );	
	
	wp_enqueue_script( 'colorpicker-js', get_template_directory_uri()."/admin/js/colorpicker.js", array(), true );
	wp_enqueue_script( 'autogrow-textarea', get_template_directory_uri()."/admin/js/jquery.autogrow-textarea.js", array(), true );

}

function cap_admin_js_footer() {
?>

<script type="text/javascript">
jQuery(document).ready(function($) {

    jQuery('.cap_slideshow_effect').hide();
    jQuery('.cap_slideshow_autoplay').hide();
    jQuery('.cap_slideshow_pagination').hide();
    jQuery('.cap_slideshow_controls').hide();


    if (jQuery('#cap_slideshow_style').val() == 'flux slider') {
            jQuery('.cap_slideshow_effect').show();
            jQuery('.cap_slideshow_autoplay').show();
            jQuery('.cap_slideshow_pagination').show();
            jQuery('.cap_slideshow_controls').show();
            jQuery('.cap_slideshow_shadow').hide();
            
    }

   

    jQuery('#cap_slideshow_style').change(function() {
        var e = document.getElementById("cap_slideshow_style");
        var strUser = e.options[e.selectedIndex].value;
        if (jQuery('#cap_slideshow_style').val() == 'flux slider') {
            jQuery('.cap_slideshow_effect').show();
            jQuery('.cap_slideshow_autoplay').show();
            jQuery('.cap_slideshow_pagination').show();
            jQuery('.cap_slideshow_controls').show();
            jQuery('.cap_slideshow_shadow').hide();
        } else {
            jQuery('.cap_slideshow_effect').hide();
            jQuery('.cap_slideshow_autoplay').hide();
            jQuery('.cap_slideshow_pagination').hide();
            jQuery('.cap_slideshow_controls').hide();
             jQuery('.cap_slideshow_shadow').show();
        }
        
    });




    // jQuery('#cap_slideshow_style').click(function() {
        // jQuery('#cap_slideshow_caption').fadeToggle(400);
    // });
//     
    // alert(jQuery('#cap_slideshow_style').val());
//     
    // var e = document.getElementById("cap_slideshow_style");
// 
    // var strUser = e.options[e.selectedIndex].value;
// 
    // alert(strUser);
//     
    // if (jQuery('#cap_slideshow_style').val() == 'nivo slider') {
        // jQuery('#cap_slideshow_caption').show();
    // }

});
</script>

<script type="text/javascript">
/* <![CDATA[ */
	jQuery(document).ready(function($) {
		jQuery("#config-tabs").tabs();
		jQuery(".accordion").accordion({ header: "h3", active: false, autoHeight: false, collapsible:true });
});
/* ]]> */
</script>
<?php
}

function top_level_settings() {
	global $themename;
	
		if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;
	
	
	
	if ( isset( $_REQUEST['saved'] ) )
		echo "<div id='message' class='updated fade'><p><strong>Theme options saved.</strong></p></div>";
	if ( isset( $_REQUEST['reset'] ) )
		echo "<div id='message' class='updated fade'><p><strong>All theme options reset.</strong></p></div>";
	?>

	<div class="wrap">
		<div id="icon-themes" class="icon32"><br></div>
		<h2>x2<?php if(!defined('is_pro')){ echo " lite"; } ?> - Theme Options</h2>
		<p style="margin: 30px 0; font-size: 15px;">
			
			Need help? <a class="button secondary" href="http://support.themekraft.com/categories/20065392-x2" target="_blank">Browse the Documentation</a> <a class="button secondary" href="http://themekraft.com/shop/premium-support" target="_blank" title="Get personal help by our product experts.">Get Premium Support</a>
			<span style="font-size: 13px; float:right;">Proudly brought to you by <a href="http://themekraft.com/" target="_blank">Themekraft</a>.</span></p> 
            <?php do_action('cc_after_help_buttons');?>
		<form method="post" action="options.php">
		<?php settings_fields( 'x2_options' ); ?>
	
		<div id="config-tabs">
			<ul>
				<?php // Add all the tabs
				$groups = cap_get_options();
				foreach( $groups as $group ) : 
				?>
					<li><a href='#<?php echo $group->id; ?>'><?php echo $group->name; ?></a></li>
				<?php endforeach; 
				
				// Add the last tab "Get the Pro" here now
				if(!defined('is_pro')){
	                $cap_getpro = __('Get the Pro','cc');
					echo "<li><a href='#cap_getpro'>$cap_getpro</a></li>";
				} ?>
			</ul>
			<?php
			foreach( $groups as $group ) : ?>
				<div id='<?php echo $group->id;?>'>
					<?php $group->WriteHtml(); ?>
				</div>
			<?php
			endforeach; 
			get_pro();
			?>
		</div>
		
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options','cc' ); ?>" />
			</p>
			
		</form>
		<form enctype="multipart/form-data" method="post"> 
			<div style="padding-top: 5px; border-top: 1px solid #DFDFDF;">
				<div style="float: left; margin-right: 100px;">
					<h2 style="color:#888; font-size: 18px;">Reset all.</h2> 
					<span class="submit"><input name="action" type="submit" value="Reset" /></span>
				</div>
				<div style="float:left;">
					<div style="float: left; margin-right: 40px;">
						<h2 style="color:#888; font-size: 18px;">Export or...</h2>
						<span class="submit"><input name="action" type="submit" value="Export" /></span>
					</div>
					<div style="float: left;">
						<h2 style="color:#888; font-size: 18px;">Import theme options.</h2>
						<input type="file" name="file" />
						<span class="submit"><input name="action" type="submit" value="Import" /></span>
					</div>
				</div>
			</div>
		</form>
		<div class="clear"></div>
		<!-- <h2>Preview (updated when options are saved)</h2>
		<iframe src="<?php echo home_url( '?preview=true' ); ?>" width="100%" height="600" ></iframe> -->
	</div>
	<?php
}

class ImportData {
	var $dict = array();
}

function cap_serialize_export( $data ) {
	header( 'Content-disposition: attachment; filename=theme-export.txt' );
	echo serialize( $data );
	exit();
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function x2_theme_options_validate( $input ) {

$cap_options = cap_get_options();

$cap_options_types = Array();

foreach( $cap_options as $cap_option ) :
	$cap_option_arr = (Array) $cap_option;
	foreach ($cap_option_arr['options'] AS $option){
		$cap_options_types[$option->id] = get_class($option);
	}
endforeach;

foreach($input as $key => $value) :
	
	switch($cap_options_types[$key]){
		case 'BooleanOption':
			if( $input[$key] == 1 ? 1 : 0);
		break;
		default:
			if(!is_string($input[$key])){
				$input[$key] = '';
			}
		break;
	}
endforeach;

 return $input;
}