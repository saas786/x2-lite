<?php function get_pro() { 
	
	if( defined('is_pro') ): 	
		return; 

	else: ?>
		 <div id="cap_getpro">
			<div class="getpro_content">
				<br />
			    <a href="http://themekraft.com/shop/x2-premium-wordpress-theme/" title="Get the full version here." target="_blank">
			    	<img src="<?php echo get_template_directory_uri(); ?>/_inc/images/get-pro.jpg" width="861" height="587" />
			    </a>
			    <br />
			</div>
		</div>
		
		<div class="spacer"></div> 
	<?php endif; 

} ?>