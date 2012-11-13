<?php
function dynamic_css() {
	global $cap; x2_switch_css();
	
	ob_start(); ?>
	<style type="text/css">
			
	/* Global Elements ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		body {
			width: 100%;
			min-width: 100%;
			max-width: 100%;
			margin: 0 auto;
			padding-top: 0 !important;
			background: none #<?php echo $cap->bg_body_color; ?>;
			color: #<?php echo $cap->font_color; ?>;
			font-family: <?php echo $cap->font_style; ?>;
			font-size: <?php echo $cap->font_size; ?>px;
			line-height:160%;
			<?php switch ($cap->bg_body_img_pos) {
			    	case 'left': echo 'background-position: left top;';	
			       		break;
			        case 'right': echo 'background-position: right top;';  	
			       		break;
			        case 'center': echo 'background-position: center top;'; 
			        	break;
					default:  echo 'background-position: center top;';  	
			        	break;
			    } ?>
			<?php if( $cap->bg_body_img_fixed ){ ?>
				background-attachment: fixed;
			<?php } ?>
		}
		#outerrim {
			margin: 0 auto;
			width: 100%;
		}
		#innerrim, div.inner {
			margin: 0 auto;
			max-width: 1000px;
			min-width: 1000px;
		}
		.v_line {
		    border-right: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		    height: 100%;
		    position: absolute;
		    width: 0;
		}
		.v_line_left { margin-left: 223px; } 
		.v_line_right { right: 320px; } 
		h1, h2 { margin: 0 0 25px 0; font-weight: normal; line-height: 130%; }
		h3, h4, h5, h6 { margin: 0 0 20px 0; font-weight: normal; line-height: 160%; }
		h1, h1 a, h1 a:hover, h1 a:focus { font-size: 34px; }
		h2, h2 a, h2 a:hover, h2 a:focus { font-size: 31px; }
		h3, h3 a, h3 a:hover, h3 a:focus { font-size: 25px; }
		h4, h4 a, h4 a:hover, h4 a:focus { font-size: 21px; }
		h5, h5 a, h5 a:hover, h5 a:focus { font-size: 19px; }
		h6, h6 a, h6 a:hover, h6 a:focus { font-size: 17px; } 
		a, span.link { 
			font-style: normal; 
			color: #<?php echo $cap->link_color; ?>; 
			text-decoration: none; 
			padding: 1px 0; 
			-webkit-transition: all 400ms ease-out;  
		       -moz-transition: all 400ms ease-out;  
		         -o-transition: all 400ms ease-out;  
		            transition: all 400ms ease-out; 
		}
		a:hover, a:active, a:focus, span.link:hover, a.clickable:hover >  div span.link { color: #<?php echo $cap->font_color; ?>; outline: none; text-decoration: none; }
		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, 
		h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, 
		h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus { 
			text-decoration: none;  
		} 
		input[type="text"], input[type="password"], textarea {
			background: #f9f9f9;
			color: #<?php echo $cap->font_color; ?>;
		}
		input[type="text"]:focus, textarea:focus {
			background: #ffffff;
			color: #<?php echo $cap->font_color; ?>;
		}
		select { height: 24px; }
		p, em {
			margin-bottom: 20px;
		}
		em { font-style: italic; } 
		p:last-child { margin-bottom: 0; }
		a.button i, input i, button i, a.btn i { margin-right: 3px; }
		sub, sup {
			line-height: 100%;
			font-size: 60%;
			font-family: Arial, Helvetica, sans-serif;
		}
		sub { vertical-align: bottom; }
		sup { vertical-align: top; }
		hr {
			background-color:#<?php echo $cap->bg_container_alt_color; ?>;
			border:0 none;
			clear:both;
			height:1px;
			margin: 20px 0;
		}
		blockquote {
			quotes: none;
			padding: 10px 20px; 
			margin-bottom: 20px;
			background-color: #<?php echo $cap->bg_details_hover_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			font-family: georgia, times, serif; 
			font-size: 16px; 
			font-style:italic; 
			line-height: 170%;
		}
		span.x2_blockquote {
			width:30%; 
			padding:2%; 
			background-color: #<?php echo $cap->bg_container_alt_color; ?>;
		}
		span.x2_blockquote_left { float: left; }
		span.x2_blockquote_right { float: right; }
		span.x2_blockquote, span.x2_blockquote p, span.x2_blockquote a {
			font-family: georgia, times, serif;
			font-size: 19px;
			font-style: italic;
		}
		.left { float:left; }
		.right { float: right; }
		.padder { padding: 20px; }
		.clear { clear: both; height: 0px; overflow: hidden; }
		.border { border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; }
		ol { list-style: decimal outside none; margin: 0 0 15px 20px; } 
		ul { list-style: circle outside none; margin: 0 0 15px 20px; }
		ol ol { list-style: upper-alpha outside none; }

		img.avatar {
			float:left; 
			<?php if ($cap->avatar_circles == "circles" ) { 
				// the border radius is set so high so it also works when custom avatar size for profiles or groups is up to 600px ?>
				-moz-border-radius: 300px;
				-webkit-border-radius: 300px;
				border-radius: 300px;
				box-shadow: 0 0 2px rgba(0, 0, 0, .6);
				-webkit-box-shadow: 0 0 2px rgba(0, 0, 0, .6);
				-moz-box-shadow: 0 0 2px rgba(0, 0, 0, .6);
				margin: 1px;
			<?php } else { ?>
				border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			<?php } ?>
		}
		
		<?php if(defined('is_pro')): ?>
			/* the badge in the upper corner, if activated in the theme settings */ 
			.badge_body {
				position: absolute;
				left: 0;
				<?php if ( $cap->admin_bar_position == "hide" ) { ?>
					top: 0; 
				<?php } else { ?>
					top: 28px; 
				<?php } ?>	 
				width: 150px;
				height: 150px;
				background: url('<?php 
					if ( $cap->body_badge_img != "" ) { echo $cap->body_badge_img; } 
					else { echo get_template_directory_uri().'/images/badge.png'; } 
					?>') no-repeat scroll top left transparent;
			}
			.badge_text {
				margin: 50px 10px 0 -13px;
				text-align: center;
				color: #<?php echo $cap->badge_text_color; ?>;
				  -webkit-transform: rotate(-45deg);  /* Safari 3.1+, Chrome */
				     -moz-transform: rotate(-45deg);  /* Firefox 3.5-15 */
				      -ms-transform: rotate(-45deg);  /* IE9+ */
				       -o-transform: rotate(-45deg);  /* Opera 10.5-12.00 */
				          transform: rotate(-45deg);  /* Firefox 16+, Opera 12.50+ */			
				/* ie7 and 8 */
				margin: 7px 10px 0px 3px\9;
				/* ie8 */
			    -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(M11=0.70710678, M12=0.70710678, M21=-0.70710678, M22=0.70710678,sizingMethod='auto expand')"; /* IE8 */
				/* ie7 */
				filter: progid:DXImageTransform.Microsoft.Matrix(M11=0.70710678, M12=0.70710678, M21=-0.70710678, M22=0.70710678,sizingMethod='auto expand');
			}
			.badge_text:hover {
				color: #<?php echo $cap->badge_text_color_hover; ?>;
			}
			@media only screen and (max-width: 1150px) {
				/* hide the body badge */
				.body_badge_link, .badge_body {display:none;}
			}
		<?php endif; ?>
		
		nav ul li {
			list-style: none;
		}
		
	/* Admin Bar ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		body #wp-admin-bar .padder {
			max-width:100%;
			min-width:100%;
		}
		#wp-admin-bar {
			font-size: <?php echo $cap->font_alt_size; ?>px;
			height:25px;
			left:0;
			position:fixed;
			top:0;
			width:100%;
			z-index:1000;
		}
		#wp-admin-bar a { background-color: transparent; text-decoration: none; }
		
        .free-version-message{
            position: absolute;
            top: 105px;
        }	
        
	/* Header :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		#header {
			position: relative;
			<?php if($cap->header_bg_color != ''){?>
				background-color: #<?php echo $cap->header_bg_color; ?>;
			<?php } ?>
			-moz-border-radius-bottomleft: 6px;
			-webkit-border-bottom-left-radius: 6px;
			border-bottom-left-radius: 6px;
			-moz-border-radius-bottomright: 6px;
			-webkit-border-bottom-right-radius: 6px;
			border-bottom-right-radius: 6px;
			margin-bottom: 12px;
			min-height: 50px;
			height:auto !important;
			padding-top: 10px; 
			background-repeat: no-repeat; 
		}
		#header.sticky { 
			<?php if( $cap->header_height != "" ) {
					$newheight = 38 + $cap->header_height; 
				} else {
					$newheight = 158; 
				} ?>
			min-height: <?php echo $newheight; ?>px;
			height: <?php echo $newheight; ?>px;
		}
		#header #search-bar {
			position: absolute;
			top: 28px;
			right: 0;
		}
		#header #search-bar input[type="text"], 
		#header #search-bar input[type="submit"] {
			vertical-align: top;
		}
		#header #search-bar .padder {
			padding: 10px;
		}
		#logo{
			position: absolute;
			left: 28px;
			top: 14px;
		}
		#header div#logo h1, #header div#logo h4 {
			top: 35px;
			left: 20px;
			margin-bottom: 0;
		}
		#header div#logo h1 a, #header div#logo h4 a {
			font-size: 59px;
			line-height: 120%;
			text-shadow: -1px -1px 1px rgba(0,0,0,0.7);
		}
		label.accessibly-hidden { display: none; }
		
			
	/* Content ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		#container {
			width:100%;
			position:relative;
			overflow:hidden;
			background-color: #<?php echo $cap->bg_container_color; ?>;
			background-image:none; 
			border:none;
			<?php if ($cap->container_corner_radius == "rounded") { ?>
				-webkit-border-radius:6px;
				-moz-border-radius:6px;
				border-radius:6px;
			<?php } ?>
		}
		#content {
			width:100%;
			float:left;
			<?php if ($cap->container_corner_radius == "rounded") { ?>
				-moz-border-radius:6px;
				-webkit-border-radius:6px;
				border-radius:6px;
			<?php } ?>
		}
		#content .padder {
			-moz-border-radius: 0px;
			border-left: none;
			border-right: none;
			margin-left: <?php echo $cap->leftsidebar_width ?>px;
			margin-right: <?php echo $cap->rightsidebar_width ?>px;
			min-height: 300px;
			padding-top: 30px;
			overflow: hidden;
		}
		#content .left-menu { width: 170px; float: left; }
		#content .main-column { margin-left: 190px; }


	/* Sidebars and Widgetareas :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		#sidebar {
			<?php if ($cap->container_corner_radius == "rounded") { ?>
				-moz-background-clip:border;
				-moz-background-inline-policy:continuous;
				-moz-background-origin:padding;
				-moz-border-radius-topright:6px;
				-webkit-border-top-right-radius:6px;
				border-top-right-radius:6px;
			<?php } ?>
			background:transparent;
			border-left:none;
			float:right;
			margin-left:-320px;
			margin-top: 0px;
			width:320px;
		}
		#leftsidebar {
			<?php if ($cap->container_corner_radius == "rounded") { ?>
				-moz-background-inline-policy:continuous;
				-moz-border-radius-topleft:6px;
				-webkit-border-top-left-radius:6px;
				border-top-left-radius:6px;
			<?php } ?>
			background:transparent;
			border-left:0 none;
			border-right:none;
			float:left;
			margin-right:-225px;
			margin-top: 0px;
			position:relative;
			width:225px;
		}
		.widgetarea {
			float:none;
			overflow-x: hidden; 
		}
		.paddersidebar, .right-sidebar-padder, .left-sidebar-padder { padding: 30px 15px 30px 20px; }
		
		
	/* Widgets ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */ 
		
		/* the widgettitles */
		.widgettitle {
			background:none repeat scroll 0 0 #<?php echo $cap->bg_container_alt_color; ?>;
			clear:left;
			margin: 0 0 12px -20px; 
			padding: 5px 22px 5px 20px;
		}
		.widgettitle a {
			color:#<?php echo $cap->font_color; ?>;
			background-color: transparent; 
			text-decoration: none; 
		}
		#content .widgettitle, #content .widgettitle a, 
		.fullwidth .widgettitle, .fullwidth .widgettitle a {
			background: none repeat scroll 0 0 transparent;
			margin: 0 0 10px 0;
			padding: 5px 0;
		}
		
		/* the widget styles */
		.widget { 
			margin-bottom: 30px; 
		}
		.widget_search input[type="text"] {
			width: 140px;
			height: 15px;
			margin-top: 9px;
		}
		#community-login h4 { 
			margin: 0 0 8px 0; 
		}
		#community-login img.avatar { 
			float: left; 
			margin: 3px 13px 20px 0; 
		}
		#login-text { margin-bottom: 10px; }
		#community-login span.add-on i { filter:alpha(opacity=60);  opacity: 0.6; }
		.login-options { float: none; overflow: auto; margin-bottom: 10px; width: 92%; }
		.lostpassword { float: left; font-size: <?php echo $cap->font_alt_size; ?>px; }
		p.forgetmenot { float: right;}
		p.forgetmenot label {
			font-size: <?php echo $cap->font_alt_size; ?>px;
			margin: 0 !important;
		}
		p.forgetmenot input { 
			margin-top: -2px; 
		}
		.widgetarea ul#bp-nav { 
			clear: left; 
			margin: 15px -16px; 
		}
		.widgetarea ul#bp-nav li { 
			padding: 10px 15px; 
		}
		.widget span.activity {
			float:left;
			margin: 0 2px 5px 0;
			padding: 3px 0;
			display:inline-block;
			background: transparent;
			color:#<?php echo $cap->font_alt_color; ?>;
			font-size: <?php echo $cap->font_alt_size; ?>px;
			font-weight:normal;
		}
		#leftsidebar #item-header-avatar img.avatar, 
		#sidebar #item-header-avatar img.avatar { 
			margin-bottom: 20px;
		} 
		.widgetarea ul.item-list img.avatar {
			width: 25px;
			height: 25px;
			margin-right: 10px;
		}
		.widgetarea div.item-avatar img {
			width: 40px;
			height: 40px;
		}
		.widgetarea .avatar-block{ overflow: hidden; } 
		.avatar-block img.avatar { margin-right: 4px; }
		.widgetarea div.item-options {
			background:none repeat scroll 0 0 transparent;
			font-size: <?php echo $cap->font_alt_size; ?>px;
			margin:-12px 0 10px -14px;
			padding:5px 15px;
			text-align:left;
		}
		.widgetarea div.item-meta, .widgetarea div.item-content {
			font-size: <?php echo $cap->font_alt_size; ?>px;
		}
		.widgetarea ul {
			text-align:left;
			margin-left: 0;
		}
		.widgetarea ul ul {
			margin-left: 10px;
		}
		.widget li.current-cat a, .widget ul li.current_page_item a {
			color:#<?php echo $cap->link_color; ?>;
		}
		.widget li.current-cat, div.widget ul li.current_page_item {
			background:transparent;
			margin-left:-8px;
			padding:2px 8px 0 8px;
			width:100%;
		}
		.item-options a.selected {
			color:#<?php echo $cap->font_color; ?>;
		}
		.widget ul li {
			background:none repeat scroll 0 0 transparent;
			border-bottom:medium none;
			min-height:20px;
			list-style: none outside none;
		}
		.widget ul.item-list li { 
			padding: 2px 0; 
			border: none; 
		}
		.widget ul#groups-list li{
			height: auto;
			overflow: auto;
			width: auto;
			margin-bottom: 0;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		.widget ul#members-list li {
			height: auto;
			overflow: auto;
			width: auto;
			margin-bottom: 0;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		ul#groups-list li { padding:20px 0; }
		.widget ul li.vcard a { float: none; }
		li.vcard, .widget ul#groups-list li { padding: 6px 0 0 0 !important; }
		.widget_calendar td, .widget_calendar th { border: none; text-align: center; }
		.widgetarea div.tags div#tag-text { padding-top: 10px; }
		
		/* footer widget styles */ 
		#footer .cc-widget {
			float:left;
			text-align:left !important;
			<?php if($cap->bg_footer_widget_border == true) { ?>
				border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
				margin:20px 1.7% 30px 0 !important;
			<?php } else { ?>
				margin:20px 2% 20px 0 !important;
			<?php } ?>
			<?php if($cap->container_corner_radius == "rounded") { ?>
				-moz-border-radius: 6px;
				-webkit-border-radius: 6px;
				border-radius: 6px;
			<?php } ?>
			width:30% !important;
			padding:1% !important;
			overflow: hidden;
		}
		#footer .cc-widget-right{
			margin:20px 0 30px !important;
			float:right !important;
		}
		#footer .widgetarea .widgettitle, 
		#header .widgetarea .widgettitle {
			width:100%;
			-moz-border-radius:0;
			-webkit-border-radius:0;
			border-radius:0;
			margin:0 0 12px 0;
			padding:5px 0 5px 0;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			background: transparent; 
			font-size: 20px;
		}
		#footer .widgetarea .widgettitle a, 
		#header .widgetarea .widgettitle a {
			background: transparent; 
			font-size: 20px;
		}
		
		
	/* Homepage :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div.home-sidebar {
			height: auto;
			<?php if ( $cap->widget_homepage_widgetarea_style != 'simple' ) { ?>
				background: #<?php echo $cap->bg_details_hover_color; ?>;
				border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			<?php } ?>
		}
		div.home-sidebar.fullwidth {
			padding: 1%;
			margin: 5px 0; 
			width: 97.799%;
		}
		div.home-sidebar.threecolumns {
			padding: 1%;
			margin: 5px 1% 5px 0; 
			width: 30.466%;
			float: left;
			<?php if ( $cap->widget_homepage_height != "" ) { ?>
				min-height: <?php echo $cap->widget_homepage_height; ?>px;
				overflow: hidden;
			<?php } ?>
		}
		div.home-sidebar.threecolumns.right {
			padding: 1%;
			margin: 5px 0 5px 0; 
			width: 30.466%;
			float: left;
		}
		div.home-sidebar .widgettitle {
			margin-top: 5px !important;
			margin-bottom: 15px !important;
			font-size: 20px;
			line-height: 150%;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			border-radius: 0;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
		}
		
		
	/* Item Headers (Profiles, Groups) ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div#item-header {
			overflow: hidden;
		}
		div#content div#item-header {
			margin-top:0;
			overflow:hidden;
		}
		body.bp-user div#item-header div#item-header-content { 
			<?php if ($cap->bp_profiles_avatar_size) { ?>
				margin-left: <?php $newmargin = $cap->cap_bp_groups_avatar_size + 20; echo $newmargin; ?>px;
			<?php } else { ?> 
				margin-left: 170px;
			<?php } ?> 
		}
		body.groups div#item-header div#item-header-content { 
			<?php if ($cap->bp_groups_avatar_size != "") { ?>
				margin-left: 320px;
			<?php } else { ?> 
				margin-left: 170px;
			<?php } ?> 
		}
		div#item-header h2 {
			margin: -5px 0 15px 0;
			line-height: 120%;
		}
		div#item-header img.avatar {
			float: left;
			margin: 1px 15px 25px 1px;
		}
		div#item-header h2 { margin-bottom: 5px; }
		
		div#item-header span.activity, div#item-header span.highlight {
			color: #<?php echo $cap->font_alt_color; ?>;
			margin: 0;
			padding: 5px 5px 5px 0;
			width: auto;
		}
		
		<?php if($cap->bp_groups_header_style == "slim") { ?>
		body.groups div#item-header div#item-actions, 
		body.groups div#item-header span.activity, 
		body.groups div#item-header span.highlight {
			display: none; 
		}
		<?php } ?>
		
		<?php if($cap->bp_profile_header_style == "slim") { ?>
		body.bp-user div#item-header div#item-actions, 
		body.bp-user div#item-header span.activity, 
		body.bp-user div#item-header span.highlight {
			display: none; 
		}
		<?php } ?>
		
		div#item-header h2 span.highlight { font-size: 16px; }
		div#item-header h2 span.highlight span {
			position: relative;
			top: -2px;
			right: -2px;
			font-weight: bold;
			font-size: <?php echo $cap->font_alt_size; ?>px;
			background: #<?php echo $cap->link_color; ?>;
			color: #<?php echo $cap->bg_body_color; ?>;
			padding: 1px 4px;
			margin-bottom: 2px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			vertical-align: middle;
			cursor: pointer;
			display: none;
		}
		div#item-header div#item-meta {
			padding-bottom: 25px;
			overflow: hidden;
			margin: 15px 0 5px 0;
		}
		div#item-header div#item-actions {
			float: right;
			width: 20%;
			margin: 0 0 15px 15px;
			text-align: right;
		}
		#item-actions li{
		    float: right !important;
		    list-style: none outside none;
		}
		div#item-header ul {
			overflow: hidden;
			margin-bottom: 15px;
		}
		div#item-header ul h5, div#item-header ul span, div#item-header ul hr {
			display: none;
		}
		div#item-header ul li {
			float: none;
		}
		div#item-header ul img.avatar, div#item-header ul.avatars img.avatar {
			width: 30px;
			height: 30px;
			margin: 2px;
		}
		div#item-header div.generic-button, div#item-header a.button {
			float: left;
			margin: 10px 5px 0 0;
		}
		div#item-header div#message.info {
			line-height: 80%;
		}
		
		
	/* Item Lists (Activity, Friend, Group lists, Widgets) ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		.activity-meta a {
			margin: 0 10px 0 0;
		}
		div.widget-title ul.item-list li{
			background:none;
			border-bottom:medium none;
			margin-bottom:8px;
			padding:0;
		}
		div.widget-title ul.item-list li.selected {
			background:none;
			border:none;
			color:#<?php echo $cap->link_color; ?>;
		}
		div.widget-title ul.item-list li.selected a {
			color:#<?php echo $cap->font_color; ?>;
		}
		ul.item-list {
			width: auto;
		}
		ul.item-list li {
			position: relative;
			padding: 15px 0 20px 0;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			list-style: none outside none; 
		}
		#subnav.item-list-tabs ul li label {
			display: inline;
			margin-right: 10px;
		}
		div.item-list-tabs ul li.filter select,
		div.item-list-tabs ul li.last select {
			height: 23px;
			max-width: 175px;
		}
		body.activity-permalink ul.item-list li { padding-top: 0; border-bottom:none; }
		ul.single-line li { border: none; }
		
		ul.item-list li img.avatar {
			float: left;
			margin: 3px 10px 10px 2px;
		}
		div.widget ul.item-list li img.avatar {
			width:25px;
			height:25px;
			margin-top: 5px;
		}
		ul.item-list li div.item-title, 
		ul.item-list li h4 {
			float:none;
			font-weight:normal;
			margin:0;
			width:auto;
		}
		.widget ul.item-list li div.item-title, 
		.widget  ul.item-list li h4 {
			float:none;
			width:100%;
		}
		ul.item-list li div.item-title span {
			margin-left: 5px;
		}
		ul.item-list li div.item-desc {
			margin: 0 0 0 63px;
			font-size: <?php echo $cap->font_alt_size; ?>px;
			width: auto;
			clear: both;
		}
		ul#groups-list li div.item-desc {
			display: none;
		}
		ul.item-list li div.action {
			position: absolute;
			top: 15px;
			right: 15px;
			text-align: right;
			width: 34%;
		}
		ul.item-list li div.action div.generic-button {
		    margin-bottom: 12px;
		}
		.item-meta{
			float:left;
		}
		ul.item-list li div.meta {
			font-size: <?php echo $cap->font_alt_size; ?>px;
			margin-top: 4px;
			color: #<?php echo $cap->font_alt_color; ?>;
		}
		ul.item-list li h5 span.small {
			font-weight: normal;
			font-size: <?php echo $cap->font_alt_size; ?>px;
		}
		
		
	/* Item Tabs ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div.item-list-tabs {
			background:none repeat scroll 0 0 transparent;
			clear: both;
			margin: 0 0 0 -20px;
			overflow:hidden;
			padding-top:5px;
		}
		div.item-list-tabs ul {
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; 
			margin-bottom: 10px;
			height: 28px;
		}
		div.item-list-tabs ul li {
			float: left;
			margin: 0px;
			list-style-type: none;
		}
		div.item-list-tabs#subnav ul li {
			margin-top: 0;
		}
		div.item-list-tabs ul li:first-child {
			margin-left: 20px;
		}
		div.item-list-tabs ul li.last {
			float: right;
			margin: 5px 10px 0 5px;
		}
		div.item-list-tabs ul li a,
		div.item-list-tabs ul li span {
			display: block;
			padding: 4px 8px;
		}
		div.item-list-tabs ul li a {
		    text-decoration: none;
		    background-color: transparent; 
		}
		div.item-list-tabs ul li a span {
		    background: none repeat scroll 0 0 #<?php echo $cap->bg_container_alt_color; ?>;
		    border-radius: 3px 3px 3px 3px;
		    -moz-border-radius: 3px; 
		    -webkit-border-radius: 3px;
		    color: inherit;
		    display: inline;
		    font-size: <?php echo $cap->font_alt_size; ?>px;
		    padding: 2px 4px;
		}
		div.item-list-tabs ul li.selected a span {
		    background: none repeat scroll 0 0 #<?php echo $cap->bg_details_color; ?>;
		}
		div.item-list-tabs ul li.selected a, div.item-list-tabs ul li.current a {
			-moz-border-radius-topleft:6px;
			-moz-border-radius-topright:6px;
			-webkit-border-top-left-radius:6px;
			-webkit-border-top-right-radius:6px;
			border-top-left-radius:6px;
			border-top-right-radius:6px;
			background-color:#<?php echo $cap->bg_container_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			border-bottom: none;
			color:#<?php echo $cap->font_color; ?> !important;
			font-weight: normal;
			margin-top:0;
		}
		ul li.loading a {
			background-image: url(<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif );
			background-position: 92% 50%;
			background-repeat: no-repeat;
			padding-right: 30px !important;
			z-index: 1000;
		}
		
		div.loading {
            background-image: url(<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif );
            background-position: center 50%;
            background-repeat: no-repeat;
            z-index: 1000;
        }
        
		form#send_message_form input#send:focus,
		div.ac-reply-content input.loading,
		div#whats-new-submit input#aw-whats-new-submit.loading {
			background-image: url(<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif );
			background-position: 5% 50%;
			background-repeat: no-repeat;
			padding-left: 20px;	
		}
		div#item-nav ul li.loading a {
			background-position: 88% 50%;
		}
		div.item-list-tabs#object-nav {
			margin-top: 0;
		}
		div#subnav.item-list-tabs {
			min-height: 26px;
			overflow: auto;
			margin-bottom: 20px;
		}
		div#subnav.item-list-tabs ul li.selected a, div#subnav.item-list-tabs ul li.current a  {
			background-color:#<?php echo $cap->bg_container_color; ?>;
		}
		div.item-list-tabs ul li.feed a {
			background: url(<?php echo get_template_directory_uri() ?>/_inc/images/rss.png ) center left no-repeat;
			padding-left: 20px;
		}
		
		
	/* Item Body ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		.item-body {
			margin: 20px 0;
		}
		.activity{
			width:100%;
		}
		span.activity, div#message p {
			background:none;
			border:none;
			color:#<?php echo $cap->font_alt_color; ?>;
			display:inline-block;
			font-weight:normal;
			margin-top:6px;
			padding:3px 0 3px 0;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			line-height: 120%;
		}
		
		
	/* Directories (Members, Groups, Blogs, Forums) :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		.dir-form {
			overflow: auto;
		}
		div.dir-search {
			float: right;
			margin-left: 20px;
		}
		div.dir-search input[type=text] {
			padding: 4px;
			line-height: 130%;
			font-size: 13px;
			width: 150px;
		}
		.dir-list .item-title a {
			font-size: 130%;
		}
		.readmore{
			float:right;
		}
		body.forum #subnav{
		    padding-top: 10px !important;
		}
		body.forum #subnav ul li{
		    margin-top: -6px !important;
		}
		
		
	/* Pagination :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div.pagination {
			border-bottom:medium none;
			font-size: <?php echo $cap->font_alt_size; ?>px;
			height:16px;
			margin:-20px -20px 9px;
			padding:10px 20px;
		}
		div.pagination#user-pag, .friends div.pagination,
		.mygroups div.pagination, .myblogs div.pagination, noscript div.pagination {
			background: none;
			border: none;
			padding: 8px 15px;
		}
		div.pagination .pag-count {
			float: left;
		}
		div.pagination .pagination-links {
			float: right;
		}
		div.pagination .pagination-links span,
		div.pagination .pagination-links a {
			font-size: <?php echo $cap->font_alt_size; ?>px;
			padding: 0 5px;
		}
		div.pagination .pagination-links a:hover {
			font-weight: bold;
		}
		div#pag-bottom {
			background:none repeat scroll 0 0 transparent;
			margin-top:0;
		}
		div.wp-pagenavi {
		    clear: both;
		    margin: 10px 0;
		}
		div.wp-pagenavi span.pages {
			border: none; 
		}
		div.wp-pagenavi span.current {
		    border: 1px solid #<?php echo $cap->font_color; ?>;
		}
		.wp-pagenavi a {
		    border: 1px solid #<?php echo $cap->link_color; ?>;
		}
		.wp-pagenavi a:hover {
		    border: 1px solid #<?php if($cap->link_color_hover != "") { echo $cap->link_color_hover; } else { echo $cap->font_color; } ?>;
		}
		
		
	/* Error / Success Messages :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div#message {
			margin: 15px 0;
		}
		div#message p {
			padding: 10px 15px;
			font-size: 15px;
			display:block;
		}
		div#message.error p {
			background: #e41717;
			color: #ffffff;
			border-color: #a71a1a;
			clear: left;
		}
		form.standard-form#signup_form div div.error {
			color: #ffffff;
			background: #e41717;
			padding: 6px;
			width: 90%;
			margin: 0 0 10px 0;
		}
		div#message.updated { clear: both; }
		
		
	/* Buttons ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */


		button,  
		a.button, 
		input[type="submit"], 
		a.comment-edit-link, 
		a.comment-reply-link,   
		ul.button-nav li a, 
		div.generic-button a {
		  display: inline-block;
		  *display: inline;
		  padding: 3px 9px;
		  margin-bottom: 0;
		  *margin-left: .3em;
		  font-size: 12px;
		  line-height: 18px;
		  *line-height: 18px;
		  color: #333333;
		  text-align: center;
		  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
		  vertical-align: middle;
		  cursor: pointer;
		  background-color: #f5f5f5;
		  *background-color: #e6e6e6;
		  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
		  background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
		  background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
		  background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
		  background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
		  background-repeat: repeat-x;
		  border: 1px solid #c5c5c5;
		  *border: 0;
		  border-color: rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.25);
		  -webkit-border-radius: 4px;
		     -moz-border-radius: 4px;
		          border-radius: 4px;
		  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
		  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
		  *zoom: 1;
		  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
		     -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
		          box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);	
		}
		button:hover, button:focus,  
		a.button:hover, a.button:focus, 
		input[type="submit"]:hover, input[type="submit"]:focus,
		a.comment-edit-link:hover, a.comment-edit-link:focus, a.comment-reply-link:hover, a.comment-reply-link:focus, 
		ul.button-nav li a:hover, div.generic-button a:hover, ul.button-nav li a:focus, div.generic-button a:focus {
		  color: #333333;
		  background-color: #e6e6e6;
		  /* Buttons in IE7 don't get borders, so darken on hover */
		  *background-color: #d9d9d9;
		  background-position: 0 -15px;
		  -webkit-transition: background-position 0.1s linear;
		     -moz-transition: background-position 0.1s linear;
		       -o-transition: background-position 0.1s linear;
		          transition: background-position 0.1s linear;				
		}
		
		/* Buttons that are disabled */
		div.pending a, a.disabled, a.requested {
			border-bottom:1px solid #888888;
			border-right:1px solid #888888;
			border-top:none;
			border-left:none;
			color: #<?php echo $cap->font_alt_color; ?>;
			background:none repeat scroll 0 0 #<?php echo $cap->container_alt_color; ?>;
			cursor:default;
		}
		div.pending a:hover, a.disabled:hover, a.requested:hover {
			border-bottom:1px solid #888888;
			border-right:1px solid #888888;
			border-top:none;
			border-left:none;
			color:#<?php echo $cap->font_alt_color; ?>;
			background: #<?php echo $cap->container_alt_color; ?>;
			cursor:default;
		}
		div.accept, div.reject {
			float: left;
			margin-left: 10px;
		}
		ul.button-nav li {
			float: left;
			margin: 0 10px 10px 0;
			list-style: none;
		}
		ul.button-nav li.current a {
			background-color: #<?php echo $cap->bg_container_alt_color; ?>;
			padding: 4px;
		}
		div#item-buttons div.generic-button {
		    margin: 0 12px 12px 0;  
		    padding: 10px 0; 
		}
		
		
	/* AJAX Loaders :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		.ajax-loader {
			background: url(<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif ) center left no-repeat !important;
			padding: 8px;
			display: none;
			z-index: 1000;
		}
		a.loading {
			background-image: url(<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif ) !important;
			background-position: 95% 50% !important;
			background-repeat: no-repeat !important;
			padding-right: 25px !important;
			z-index: 1000;
		}
		
		
	/* Input Forms ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		form.standard-form select {
			padding: 3px;
		}
		form.standard-form label, form.standard-form span.label {
			margin: 15px 0 5px 0;
		}
		form.standard-form div.checkbox label,
		form.standard-form div.radio label {
			font-weight: normal;
			margin: 5px 0 0 0;
			color: #<?php echo $cap->font_color; ?>;
		}
		form.standard-form #basic-details-section input[type=password],
		form.standard-form #blog-details-section input#signup_blog_url {
			width: 35%;
		}
		form.standard-form#signup_form input[type=text],
		form.standard-form#signup_form textarea {
			width: 90%;
		}
		form.standard-form#signup_form div.submit { float: right; }
		div#signup-avatar img { margin: 0 15px 10px 0; }
		
		form.standard-form textarea {
			width: 75%;
			height: 120px;
		}
		form.standard-form textarea#message_content {
			height: 200px;
		}
		form.standard-form#send-reply textarea {
			width: 97.5%;
		}
		form.standard-form p.description {
			font-size: <?php echo $cap->font_alt_size; ?>px;
			color: #888;
			margin: 5px 0;
		}
		form.standard-form div.submit {
			padding: 15px 0;
			clear: both;
		}
		form.standard-form div.submit input {
			margin-right: 15px;
		}
		form.standard-form div.radio ul {
			margin: 10px 0 15px 38px;
			list-style: disc;
		}
		form.standard-form div.radio ul li {
			margin-bottom: 5px;
		}
		form.standard-form a.clear-value {
			display: block;
			margin-top: 5px;
			outline: none;
		}
		form.standard-form #basic-details-section, form.standard-form #blog-details-section,
		form.standard-form #profile-details-section {
			float: left;
			width: 48%;
		}
		form.standard-form #profile-details-section { float: right; }
		form.standard-form #blog-details-section {
			clear: left;
		}
		form.standard-form input:focus, form.standard-form textarea:focus, form.standard-form select:focus {
			background: #fafafa;
			color: #666666;
		}
		form#send-invite-form {
			margin-top: 20px;
		}
		div#invite-list {
			height: 400px;
			overflow: scroll;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			padding: 5px;
			width: 160px;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			margin: 10px 0;
		}
		form#signup_form div.register-section select{
			width:245px !important;
		}
		
		
	/* Data Tables ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		table {
			width: 100%;
			margin: 0 0 15px 0;
		}
		table thead tr {
			background: #<?php echo $cap->bg_container_alt_color; ?>;
		}
		table#message-threads {
			margin: 0 -20px;
			width: auto;
		}
		table.profile-fields { margin-bottom: 20px; }
		
		div#sidebar table , div.widgetarea table {
			margin: 0 0;
			width: 100%;
		}
		table tr td, table tr th {
			text-align:left;
			padding: 7px;
			vertical-align: top;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		table tr td.label {
			border-right: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			font-weight: bold;
			width: 25%;
		}
		table tr td.thread-info p { margin: 0; }
		
		table tr td.thread-info p.thread-excerpt {
			color: #<?php echo $cap->font_alt_color; ?>;
			font-size: <?php echo $cap->font_alt_size; ?>px;
			margin-top: 3px;
		}
		div#sidebar table td, table.forum td , div.widgetarea table td, table.forum td { text-align: center; }
		
		table tr.alt, table tr th {
			background: #<?php echo $cap->bg_container_alt_color; ?>;
		}
		table.notification-settings {
			margin-bottom: 20px;
			text-align: left;
		}
		table.notification-settings th.icon, table.notification-settings td:first-child { display: none; }
		table.notification-settings th.title { width: 80%; }
		table.notification-settings .yes, table.notification-settings .no { width: 40px; text-align: center; }
		
		table.forum {
			margin: -1px -20px 20px -20px;
			width: auto;
		}
		table.forum tr:first-child {
			background: #<?php echo $cap->bg_details_hover_color; ?>;
		}
		table.forum tr.sticky td {
			background: #<?php echo $cap->bg_details_color; ?>;
			border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		table.forum tr.closed td.td-title {
			padding-left: 35px;
			background-image: url(<?php echo get_template_directory_uri() ?>/_inc/images/closed.png);
			background-position: 15px 50%;
			background-repeat: no-repeat;
		}
		table.forum td p.topic-text {
			font-size: <?php echo $cap->font_alt_size; ?>px;
		}
		table.forum tr > td:first-child, table.forum tr > th:first-child {
			padding-left: 15px;
		}
		table.forum tr > td:last-child, table.forum tr > th:last-child {
			padding-right: 15px;
		}
		table.forum tr th#th-title, table.forum tr th#th-poster,
		table.forum tr th#th-group, table.forum td.td-poster,
		table.forum td.td-group, table.forum td.td-title { 
			text-align: left; 
		}
		table.forum td.td-freshness {
			font-size: <?php echo $cap->font_alt_size; ?>px;
			color: #888888;
			text-align: center;
		}
		table.forum tr th#th-freshness{
			text-align: center;
		}
		table.forum td img.avatar {
			margin-right: 5px;
		}
		table.forum td.td-poster, table.forum td.td-group  {
			min-width: 130px;
		}
		table.forum th#th-title {
			width: 40%;
		}
		table.forum th#th-postcount {
			width: 1%;
		}
		
		
	/* Activity Stream Posting ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		form#whats-new-form {
			margin-top: 0;
			margin-bottom: 20px;
			background-color: #<?php echo $cap->bg_details_hover_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			overflow: hidden;
			padding: 20px;
		}
		.home-page form#whats-new-form {
			border-bottom: none;
			padding-bottom: 0;
		}
		form#whats-new-form h5 {
			margin: 0;
			font-weight: normal;
			font-size: 15px;
			margin: -5px 0 0 76px;
			padding: 0 0 3px 0;
		}
		form#whats-new-form #whats-new-avatar {
			float: left;
			margin: 2px;
		}
		form#whats-new-form #whats-new-content {
			margin-left: 54px;
			padding-left: 22px;
		}
		form#whats-new-form textarea {
			width: 96.5%;
			height: 60px;
			color: #555;
			background: #fafafa;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			margin-bottom: 10px;
			padding: 8px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px; 
			-webkit-transition: background-color 400ms ease-out;  
			   -moz-transition: background-color 400ms ease-out;  
			     -o-transition: background-color 400ms ease-out;  
			        transition: background-color 400ms ease-out; 
		}
		form#whats-new-form textarea:focus { 
			background: #ffffff; 
		}
		form#whats-new-form #whats-new-options select {
			max-width: 200px;
			margin-left: 5px;
		}
		form#whats-new-form #whats-new-submit {
			float: right;
			margin: 0;
		}
		
		
	/* Activity Stream Listing ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */	
	
		.activity-list {
			overflow: auto;
		}
		ul.activity-list li {
			padding: 20px 0;
			overflow: hidden;
		}
		ul.activity-list > li:first-child {
			padding-top: 5px;
		}
		ul.activity-list li.has-comments {
			padding-bottom: 15px;
		}
		.activity-list li.mini {
			position: relative;
			min-height: 35px;
			padding: 20px 0;
		}
		body.activity-permalink .activity-list li .activity-avatar img.avatar,
		body.activity-permalink .activity-list li .activity-avatar img.FB_profile_pic {
			width: 100px;
			height: 100px;
		}
		.activity-list li.mini .activity-content {
			margin-right: 0;
			padding: 0;
		}
		.activity-list li.mini .activity-content p {
			margin: 0;
			float: left;
		}
		.activity-list li.mini .activity-meta {
			margin: 10px 0 20px 0;
			position: relative;
			clear: none;
		}
		body.activity-permalink .activity-list li.mini .activity-meta {
			position:absolute;
			right:5px;
			top:45px;
		}
		.activity-list li.mini .activity-comments {
			clear: left;
			margin-top: 8px;
		}
		.activity-list li .activity-inreplyto {
			display:none;
			background:none;
			color:#<?php echo $cap->font_alt_color; ?>;
			margin-bottom:15px;
			margin-left:80px;
			padding-left:0;
		}
		.activity-list li .activity-inreplyto > p {
			margin: 0;
			display: inline;
		}
		.activity-list li .activity-inreplyto blockquote,
		.activity-list li .activity-inreplyto div.activity-inner {
			background: none;
			border: none;
			display: inline;
			padding: 0;
			margin: 0;
			overflow: hidden;
		}
		body.activity-permalink .activity-list .activity-avatar img {
			margin-top:22px;
			width: 100px;
			height: 100px;
		}
		.activity-list .activity-content {
			-moz-border-radius:6px 6px 6px 6px;
			-webkit-border-radius:6px;
			border-radius:6px;
			background:none;
			margin-bottom:8px;
			margin-left:80px;
			min-height:15px;
			padding-bottom:8px;
		}
		body.activity-permalink .activity-list li .activity-header > p {
			background: none;
			margin-left: -35px;
			padding: 0 0 0 38px;
			height: auto;
			margin-bottom: 0;
		}
		.activity-list .activity-content .activity-header, .activity-list .activity-content .comment-header {
			line-height: 170%;
			float: none;
			margin: 0 0 10px 0 !important;
			height: auto;
			overflow: auto;
			min-height: 30px;
		}
		.activity-list .activity-content .activity-header img.avatar {
			float: none !important;
			margin: 0 5px -8px 0 !important;
		}
		span.highlight:hover {
			background:none !important;
			border:none;
		}
		.activity-list .activity-content span.activity-header-meta a {
			background: none;
			padding: 0;
			margin: 0;
			border: none;
		}
		.activity-list .activity-content .activity-inner, .activity-list .activity-content blockquote {
			background-color: #<?php echo $cap->bg_details_hover_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			margin:15px 0;
			padding:10px;
			color:#<?php echo $cap->font_color; ?>;
			overflow:hidden;
		}
		body.activity-permalink .activity-content .activity-inner,
		body.activity-permalink .activity-content blockquote {
			background-color: #<?php echo $cap->bg_details_hover_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			margin:15px 0;
			padding:10px;
		}
		
		/* Backwards compatibility. */
		.activity-inner > .activity-inner { margin: 0 !important; }
		.activity-inner > blockquote { margin: 0 !important; }
		
		.activity-list .activity-content img.thumbnail {
			float: left;
			margin: 0 10px 5px 0;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		.activity-list li.load-more {
			-moz-border-radius:4px 4px 4px 4px;
			-webkit-border-radius:4px;
			border-radius:4px;
			background: #<?php echo $cap->bg_details_hover_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			margin:15px 0 !important;
			padding:10px 15px !important;
			text-align:left;
		}
		.activity-list li.load-more a {
			color: #<?php echo $cap->link_color; ?>;
			font-size: 15px;
			font-weight: bold;
		}
		
		/* - additional to activity- */
		.activity-list .activity-content .comment-header {
			line-height:170%;
			margin: 0;
			min-height:16px;
			padding-top:4px;
		}
		div.activity-meta {
			clear:left;
			margin:0 0 3px 3px;
		}
		.activity-filter-selector {
			text-align: right;
		}
		
		
	/* Activity Stream Comments :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div.activity-meta {
			clear:left;
			margin:0;
		}
		div.activity-comments {
			margin:0 0 0 70px;
			overflow:hidden;
			position:relative;
		}
		body.activity-permalink div.activity-content, 
		body.activity-permalink div.activity-comments {
			margin-left: 120px;
		}
		div.activity-comments ul, div.activity-comments ul li {
			list-style: none;
			margin-left: 0;
		}
		div.activity-comments ul {
		    background-color: #<?php echo $cap->bg_details_hover_color; ?>;
		    border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		    clear: left;
		}
		div.activity-comments ul ul { background-color: #<?php echo $cap->bg_container_color; ?>; }
		div.activity-comments ul ul ul { background-color: #<?php echo $cap->bg_details_hover_color; ?>; }
		div.activity-comments ul li {
			margin-bottom:8px;
			padding:10px;
			margin-left: 1%;
			border: none;
		}
		body.activity-permalink div.activity-comments ul li {
			border-width: 1px;
			padding: 10px;
		}
		div.activity-comments > ul > li:first-child {
			border-top: none;
		}
		div.activity-comments ul li:last-child {
			margin-bottom: 0;
		}
		div.activity-comments ul li p:last-child {
			margin-bottom: 0;
		}
		div.activity-comments ul li > ul {
		    margin-left: 54px;
		    margin-top: 5px;
		}
		div.acomment-avatar img {
			float:left;
			margin-right:10px;
		}
		div.activity-comments div.acomment-content {
			font-size: <?php echo $cap->font_alt_size; ?>px;
			background:none repeat scroll 0 0 transparent;
			margin:10px 10px 10px 0;
			overflow:hidden;
			padding:4px 0;
		}
		div.acomment-options {
		    margin-left: 63px;
		}
		div.acomment-content .time-since { display: none; }
		div.acomment-content .activity-delete-link { display: none; }
		div.acomment-content .comment-header { display: none; }
		
		div.activity-comments form.ac-form {
			display: none;
			margin: 10px 0 10px 33px;
			background:none repeat scroll 0 0 #<?php echo $cap->bg_details_color; ?>;
			border:medium none;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			border-radius: 4px;
			padding: 10px;
		}
		div.activity-comments li form.ac-form {
			margin-right: 15px;
		}
		div.activity-comments form.root {
			margin-left: 0;
		}
		div.activity-comments div#message {
			margin-top: 15px;
			margin-bottom: 0;
		}
		div.activity-comments form.loading {
			background-image: url(<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif);
			background-position: 2% 95%;
			background-repeat: no-repeat;
		}
		div.activity-comments form textarea {
			width: 85%;
			border: 1px inset #cccccc;
			margin-bottom: 10px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			min-height: 40px;
			padding: 8px;
		}
		div.activity-comments form input {
			margin-top: 5px;
		}
		div.activity-comments form div.ac-reply-content {
			margin-left: 44px;
			padding-left: 15px;
			font-size: <?php echo $cap->font_alt_size; ?>px;
		}
		div.activity-comments div.acomment-avatar img {
			float:left;
			margin-right:10px;
		}
		
		
	/* Private Messages and Friends Lists :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		table#message-threads tr.unread td {
			background: #<?php echo $cap->bg_container_color; ?>;
			border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			font-weight: bold;
		}
		table#message-threads tr.unread td span.activity {
			background: #<?php echo $cap->bg_container_alt_color; ?>;
		}
		li span.unread-count, tr.unread span.unread-count {
			background: #<?php echo $cap->bg_container_color; ?>;
			padding: 2px 8px;
			font-weight: bold;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
		}
		div.item-list-tabs ul li a span.unread-count {
			padding: 1px 6px;
		}
		div.messages-options-nav {
			font-size: <?php echo $cap->font_alt_size; ?>px;
			background: #<?php echo $cap->bg_container_color; ?>;
			text-align: right;
			margin: 0 -20px;
			padding: 5px 15px;
		}
		div#message-thread div.message-box {
			margin: 0 -20px;
			padding: 15px;
		}
		div#message-thread div.alt {
			background: #<?php echo $cap->bg_container_color; ?>;
		}
		div#message-thread p#message-recipients {
			margin: 10px 0 20px 0;
		}
		div#message-thread img.avatar {
			float: left;
			margin: 0 10px 0 0;
			vertical-align: middle;
		}
		div#message-thread strong {
			margin: 0;
			font-size: 16px;
		}
		div#message-thread strong span.activity {
			margin: 4px 0 0 10px;
		}
		div#message-thread div.message-metadata {
			overflow: hidden;
		}
		div#message-thread div.message-content {
			margin-left: 45px;
		}
		div#message-thread div.message-options {
			text-align: right;
		}
		.messages-notices span.activity {
			font-size: <?php echo $cap->font_alt_size; ?>px;
		}
		ul#friend-list li {
			height: 53px;
		}
		ul#friend-list li div.item-meta {
			width: 70%;
		}
		
		
	/* Group Forum Topics :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		ul#topic-post-list {
			margin: 15px -20px;
			width: auto;
		}
		ul#topic-post-list li {
			padding: 15px;
			position: relative;
		}
		ul#topic-post-list li.alt {
			background: #<?php echo $cap->bg_details_color; ?>;
		}
		ul#topic-post-list li div.poster-meta {
			margin-bottom: 10px;
		}
		ul#topic-post-list li div.post-content {
			margin-left: 54px;
		}
		div.admin-links {
			position: absolute;
			top: 15px;
			right: 25px;
			font-size: <?php echo $cap->font_alt_size; ?>px;
		}
		div#topic-meta div.admin-links {
			bottom: 0;
			margin-top: -45px;
			right: 0;
		}
		div#topic-meta {
			position: relative;
			padding: 5px 0;
		}
		div#topic-meta h3 {
			padding-bottom: 20px;
		}
		div#new-topic-post {
			margin: 0;
			padding: 1px 0 0 0;
		}
		
		
	/* WordPress Blog Styles ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div.post {
			margin:2px 0 20px 0;
			overflow: hidden;
		}
		div.post h2.pagetitle, div.post h2.posttitle {
			margin: 0px 0 25px 0;
			line-height: 120%;
		}
		.navigation, .paged-navigation, .comment-navigation {
			overflow: hidden;
			font-style:normal;
			font-weight:normal;
			padding: 5px 0;
			margin: 5px 0 25px 0;
		}
		div.post dl { margin-left: 0; }
		div.post dt {
			border-bottom:1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			font-weight:bold;
			overflow:hidden;
		}
		div.post dd {
			line-height: 110%;
			margin:0 0 15px;
			padding:4px;
		}
		div.post pre, div.post code p {
			margin: 10px 0 20px 0;
			padding: 15px;
			background: #<?php echo $cap->bg_details_hover_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.post code { font-family: "Monaco", courier, sans-serif; }
		
		div.post table {
			border-collapse:collapse;
			border-spacing:0;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.post table th { border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; text-align: left; }
		div.post table td { border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; }
		
		div.post-content {
			margin-left: <?php if( $cap->posts_lists_hide_avatar == 'hide' ) { echo '8px'; } else { echo '94px'; } ?>;
		}
		.single div.post-content {
			margin-left: <?php if( $cap->single_post_hide_avatar == 'hide' ) { echo '8px'; } else { echo '94px'; } ?>;
		}
		div.post p.date, div.post p.postmetadata, div.comment-meta {
			color: #<?php echo $cap->font_alt_color; ?>;
			padding: 3px 0;
			margin: 10px 0;
			border-bottom: none;
			border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.post p.date em {
			font-style: normal;
		}
		div.post p.postmetadata {
			margin-top: 15px;
			clear: left;
			overflow: hidden;
		}
		div.post .tags { float: left; }
		div.post .comments { float: right; }
		div.post img { margin: 15px 0; border: none; border: none !important; }
		div.post img.wp-smiley { padding: 0 !important; margin: 0 !important; border: none; float: none !important; clear: none !important; }
		
		div.post img.centered, img.aligncenter {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		div.post img.alignright {
			padding: 4px;
			margin: 0 0 2px 7px;
			display: inline;
		}
		div.post img.alignleft {
			padding: 0 12px 12px 0;
			margin: 0 7px 2px 0;
			display: inline;
		}
		div.post .aligncenter, div.post div.aligncenter {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		div.post .wp-caption {
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.post .wp-caption img {
			margin: 0;
			padding: 0;
			border: 0 none;
		}
		div.post img.size-full {
		   height: auto;
		   max-width: 100%;
		}
		div.author-box, div.comment-avatar-box {
			width:50px; 
			float:left; 
		} 
		div.author-box p, 
		div.author-box a,
		div.comment-avatar-box p,  
		div.comment-avatar-box a {
			font-size: 10px;
			font-style: normal;
			line-height: 120%;
			margin: 5px 0 0;	
			text-align: center;
			width: 50px;
			overflow: visible; 
		}
		div.post div.author-box img {
			float: none;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			margin: 1px;
			background:none repeat scroll 0 0 transparent;
			float: none;
			padding:0;
			width:50px;
		}
		
		
	/* WordPress & BuddyPress Comment Styles ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div#comments nav {
			height: auto;
			overflow: auto;
			padding-bottom: 15px;
		}
		div.nav-previous {
			width: 50%; 
			float: left; 
			text-align: left; 
		}
		div.nav-next {
			float: left;
			width: 50%;  
			text-align: right; 
		}
		div.comment-avatar-box img {
			float: none;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			margin: 16px 0 0 4px;
			background:none repeat scroll 0 0 transparent;
			float: none;
			padding:0;
		}
		div.comment-content {
			margin-left: 75px;
			min-height: 110px;
		}
		#trackbacks {
			margin-top: 30px;
		}
		.commentlist { 
			list-style: none outside none; 
			margin-left: 0; 
		}
		.commentlist ul { 
			list-style: none outside none; 
			margin-left: 20px; 
			padding-bottom: 12px;
		}
		.commentlist li {
			margin: 0 0 20px 0;
			border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		.commentlist ul li {
			padding: 0 12px; 
			background: #<?php echo $cap->bg_details_hover_color; ?>;
		}
		.commentlist ul ul li {
			padding: 0 12px; 
			background: #<?php echo $cap->bg_container_color; ?>;
		}
		.commentlist ul ul ul li {
			padding: 0; 
		}
		div.comment-meta {
			border-top: none;
			padding-top: 0;
		}
		div.comment-meta em {
			float: right;
		}
		.commentlist div.comment-content ol {
			list-style: decimal outside none;
			margin-bottom: 0;
			padding-bottom: 6px;
		}
		.commentlist div.comment-content ul {
			list-style: circle outside none;
			margin-bottom: 0;
			padding-bottom: 6px;
		}
		.commentlist div.comment-content li {
			border: none; 
			margin-bottom: 0;
		}
		p.form-allowed-tags {
			display: none;
		}
		#comments textarea {
			width: 98%;
		}
		div.comment-author img.avatar {
			margin: 4px 12px 12px -45px;
		}
		div.comment-body div.commentmetadata {
			margin-top:0;
		}
		div.comment-body div.comment-author {
			padding-top:6px;
		}
		div.reply {
			height: 32px;
		}
		div.comment-body {
			margin-bottom: 12px;
			margin-left: 45px;
		}
		div.commentmetadata a.comment-edit-link {   
			float:right; 
			line-height: 120%;
			padding: 3px 5px;
		}
		ul.children li.comment { 
			margin-left: 26px;
		}
		.commentlist div.comment-body ol {
			list-style: decimal outside none;
			margin-bottom: 0;
			padding-bottom: 6px;
		}
		.commentlist div.comment-body ul {
			list-style: circle outside none;
			margin-bottom: 0;
			padding-bottom: 6px;
		}
		.commentlist div.comment-body li {
			border:none;
			margin: 0;
		}
		
		
	/* Footer :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		#footer{
			background: #<?php echo $cap->bg_details_hover_color; ?>;
			<?php if( $cap->bg_footer_border != false ) { ?>
				border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			<?php } ?>
			text-align:left;
			text-shadow:none; 
			margin-top:20px;
			-moz-border-radius: 6px;
			-webkit-border-radius: 6px;
			border-radius: 6px;
			padding: 10px 0; 
		}
		#footer div.credits { 
			text-align: right; 
			padding-right: 1%;
			color: #<?php echo $cap->font_alt_color; ?>; 
		}
		#footer a.credits { 
			text-decoration: underline; 
			color: #<?php echo $cap->font_alt_color; ?>; 
		}
		#footer a.credits:hover, 
		#footer a.credits:focus { 
			text-decoration: none; 
			color: #<?php echo $cap->font_color; ?>; 
		}
				
		
	/* Menu :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		#access {
			background:#<?php echo $cap->bg_body_color; ?>;
			display:block;
			float:left;
			margin-top: 120px;
			padding-top:0;
			width: 100%;
		}
		#access div.menu {
			-webkit-transition: all 300ms ease-in-out;
			-moz-transition: all 300ms ease-in-out;
			-ms-transition: all 300ms ease-in-out;
			-o-transition: all 300ms ease-in-out;
			transition: all 300ms ease-in-out;
			<?php if( $cap->menue_disable_home != true ){ ?>
				margin-left: -38px;
			<?php } ?>
		}
		#access.sticky div.menu {
			margin-left: 12px;
		}
		#access.sticky {
			<?php  if(!defined('is_pro')) { ?>
				top: 28px;
			<?php } else { ?>
		    	top: <?php if( $cap->admin_bar_position == "show") { echo '28'; } else { echo '0'; } ?>px;
		    <?php } ?> 
			position: fixed;
			z-index: 99999;
			background: #<?php echo $cap->bg_body_color; ?>;
			margin-top: 0;
			width: <?php echo $cap->website_width; ?>px;
			border-top: none;
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		#nav-logo {
			display: block;
			float: left;
			overflow: hidden; 
			width: 47px; 
			margin-right: 4px;
		}
		#access.sticky #nav-logo {
			overflow: hidden;
		}
		<?php  if( $cap->menue_disable_home != true ){ ?>
			#nav-logo li#nav-home {
				margin-left: -47px;
			}
			#access.sticky #nav-logo li#nav-home {
				margin-left: 0px; 
			}
		<?php } ?>
		#access #nav-logo a {
			-webkit-transition: all 100ms ease-in;
			-moz-transition: all 100ms ease-in;
			-ms-transition: all 100ms ease-in;
			-o-transition: all 100ms ease-in;
			transition: all 100ms ease-in;
			<?php  if( $cap->menue_disable_home != true ){ ?>
				filter: alpha(opacity=0); /* IE 5-7 */
				opacity: 0; /* CSS3 Standard */
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
			<?php } ?>
		}
		#access.sticky #nav-logo a {
			filter: alpha(opacity=100); /* IE 5-7 */
			opacity: 1.0; /* CSS3 Standard */
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
		}
		#access ul li a {
			-webkit-transition: none;
			-moz-transition: none;
			-ms-transition: none;
			-o-transition: none;
			transition: none;
		}
		#access .menu-header,
		div.menu {
			margin-left: 12px;
			width: 100%;
		}
		#access .menu-header ul,
		div.menu ul {
			list-style: none;
			margin: 0;
		}
		div.menu ul {
			float:left;
		}
		#access .menu-header li,
		div.menu li {
			float: left;
			position: relative;
			list-style:none outside none;
			margin:4px 4px 0 0;
			-moz-border-radius-topleft: 6px;
			-moz-border-radius-topright: 6px;
			-webkit-border-top-left-radius:6px;
			-webkit-border-top-right-radius:6px;
			border-top-left-radius:6px;
			border-top-right-radius:6px;
		}
		#access a {
			color: #<?php echo $cap->font_color; ?>;
			display: block;
			line-height: 30px;
			padding: 0 15px 2px 15px;
			-moz-border-radius:6px 6px 0 0;
			-webkit-border-top-left-radius:6px;
			-webkit-border-top-right-radius:6px;
			border-top-left-radius:6px;
			border-top-right-radius:6px;
			text-decoration: none; 
			background-color: transparent;
		}
		#access ul ul {
			-moz-box-shadow:0 3px 3px rgba(0, 0, 0, 0.2);
			-webkit-box-shadow:0 3px 3px rgba(0, 0, 0, 0.2);
			box-shadow:0 3px 3px rgba(0, 0, 0, 0.2);
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			border-top: none;
			display:none;
			float:left;
			left:0;
			position:absolute;
			top:27px;
			z-index:1000000;
		}
		#access ul li ul li {
			min-width: 180px;
			z-index:1000000;
			margin-top:0px !important;
			margin-right: 0;
		}
		#access ul ul ul {
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			left: 100%;
			top: 0;
		}
		#access ul ul a {
			-moz-border-radius:0px !important;
			-webkit-border-radius:0px !important;
			border-radius:0px !important;
			background: #<?php echo $cap->bg_body_color; ?>;
			color: #<?php echo $cap->font_color; ?>;
			line-height: 1em;
			padding: 10px 15px;
			width: 180px;
			height: auto;
		}
		#access li:hover > a,
		#access ul ul li:hover > a {
			background: #<?php echo $cap->bg_body_color; ?>;
			color: #<?php echo $cap->font_color; ?>;
		}
		#access ul ul.children li:hover > a,
		#access ul ul.sub-menu li:hover > a {
			background: #<?php echo $cap->link_color; ?> !important;
			color: #<?php echo $cap->bg_body_color; ?> !important;
			-moz-border-radius:0px;
			-webkit-border-radius:0px;
			border-radius:0px;
		}
		#access ul li:hover > ul {
			display: block;
		}
		#access ul li.current_page_item > a,
		#access ul li.current-menu-ancestor > a,
		#access ul li.current-menu-item > a,
		#access li.selected > a,
		#access ul li.current-menu-parent > a,
		#access ul li.current_page_item > a:hover,
		#access ul li.current-menu-item > a:hover {
			background:none repeat scroll 0 0 #<?php echo $cap->bg_body_color; ?>;
			color:#<?php echo $cap->font_color; ?>;
		}
		* html #access ul li.current_page_item a,
		* html #access ul li.current-menu-ancestor a,
		* html #access ul li.current-menu-item a,
		* html #access ul li.current-menu-parent a,
		* html #access ul li a:hover {
			color: #<?php echo $cap->font_color; ?>;
		}
		
		/* the standard navigation when no custom menu is selected */
		ul#nav {
			background: transparent;
			bottom:2px;
			list-style:none outside none;
			margin:15px 0 0;
			max-width:100%;
			min-width:100%;
			padding:45px 0 5px 0;
			position:relative;
			left: 20px;
			right: 15px;
		}
		ul#nav li {
			float:left;
			margin:0;
			padding:6px 28px 0 0;
		}
		ul#nav li a {
			-moz-background-inline-policy:continuous;
			-moz-border-radius-topleft:3px;
			-moz-border-radius-topright:3px;
			-webkit-border-top-left-radius:3px;
			-webkit-border-top-right-radius:3px;
			border-top-left-radius:3px;
			border-top-right-radius:3px;
			background:none repeat scroll 0 0 transparent;
			display:block;
			font-weight:bold;
			padding:0;
		}
		ul#nav li.selected, ul#nav li.selected a, ul#nav li.current_page_item a {
			background:none repeat scroll 0 0;
			color: #<?php echo $cap->font_color; ?>;
		}
		ul#nav a:focus { outline: none; }
		#nav-home { float: <?php if($cap->menu_x =="right"){ echo "right"; } else { echo "left"; } ?>; }
		#nav-community { float:left; }
		
		/* Menu Top */
		div#header div.menu-top {
			margin-left: 12px;
			position: absolute;
			width: 100%;
		}
		div.menu-top.menu ul {
			list-style: none;
			margin: 0;
			float: right; 
		}
		div.menu-top li {
			float: left;
			position: relative;
			list-style:none outside none;
			margin:4px 4px 0 0;
		}
		div.menu-top a {
			color: #<?php echo $cap->link_color; ?>;
			display: block;
			line-height: 30px;
			padding: 0 10px 2px 10px;
			text-decoration: none; 
			background-color: transparent;
		}
		div.menu-top ul ul {
			display:none;
			float:left;
			left:0;
			position:absolute;
			top:27px;
			width:180px;
			z-index:1000000;
		}
		div.menu-top ul li ul li {
			min-width: 180px;
			z-index:1000000;
			margin-top:0px !important;
		}
		div.menu-top ul ul ul {
			left: 100%;
			top: 0;
		}
		div.menu-top ul ul a {
			background: #<?php echo $cap->bg_body_color; ?>;
			color: #<?php echo $cap->link_color; ?>;
			line-height: 1em;
			padding: 10px 15px;
			width: 160px;
			height: auto;
		}
		div.menu-top li:hover > a,
		div.menu-top ul ul:hover > a {
			color: #<?php echo $cap->font_color; ?>;
		}
		div.menu-top ul.children li:hover > a,
		div.menu-top ul.sub-menu li:hover > a {
			background: #<?php echo $cap->bg_details_hover_color; ?> !important;
			color: #<?php echo $cap->font_color; ?>;
			border-radius:0px;
		}
		div.menu-top ul li:hover > ul {
			display: block;
		}
		div.menu-top ul li.current_page_item > a,
		div.menu-top ul li.current-menu-ancestor > a,
		div.menu-top ul li.current-menu-item > a,
		div.menu-top li.selected > a,
		div.menu-top ul li.current-menu-parent > a,
		div.menu-top ul li.current_page_item > a:hover,
		div.menu-top ul li.current-menu-item > a:hover {
			background:none repeat scroll 0 0 #<?php echo $cap->bg_body_color; ?>;
			color:#<?php echo $cap->font_color; ?>;
		}
		* html div.menu-top ul li.current_page_item a,
		* html div.menu-top ul li.current-menu-ancestor a,
		* html div.menu-top ul li.current-menu-item a,
		* html div.menu-top ul li.current-menu-parent a,
		* html div.menu-top ul li a:hover {
			color: #<?php echo $cap->font_color; ?>;
		}
		
			
	/* Slideshow - default slideshow ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		div#x2_slider-top {
			-moz-border-radius:6px;
			-webkit-border-radius:6px;
			border-radius:6px;
			background-color:#<?php echo $cap->bg_details_hover_color; ?>;
			background-repeat:repeat-y;
			border:medium none;
			overflow:hidden;
			padding:0;
			margin-bottom: 12px;
		}
		div.x2_slider {
			margin-bottom: 0;
			overflow: hidden;
		}
		div.x2_slider.x2_slider_shortcode {
			margin-bottom: 12px;
		}
		div.x2_slider .featured{
			width:100%;
			padding-right:248px;
			position:relative;
			height:250px;
			float: left;
			background:#<?php echo $cap->bg_details_hover_color; ?>;
			margin-bottom: 20px;
		}
		div.x2_slider div.featured{
			margin-bottom: 0px;
		}
		div.x2_slider ul.ui-tabs-nav {
		    list-style: none outside none;
		    margin: 0;
		    padding: 1px 0;
		    position: absolute;
		    right: 0;
		    top: 0;
		    width: <?php if ($cap->website_width != '' && $cap->website_width_unit == 'px' ) { $width = $cap->website_width; $i = $width - 756; echo $i; echo 'px'; } else { echo '244px'; } ?>;
		    background: #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.x2_slider ul.ui-tabs-nav li{
			padding: 0;
			color:#<?php echo $cap->font_color; ?>; 
			height: 60px; 
			background:none transparent; 
			border: none; 
			float:none;   
			margin: 0;
			padding: 0;
			border-bottom: 1px solid #<?php echo $cap->bg_container_color; ?>;
			border-top: 1px solid #<?php echo $cap->bg_details_hover_color; ?>;
			border-right: 1px solid #<?php echo $cap->bg_container_color; ?>;
		}
		div.x2_slider ul.ui-tabs-nav li img {
			float:left; 
			margin:2px 5px 2px 0;
			background:#<?php echo $cap->bg_container_color; ?>;
			padding:2px;
			border:1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.x2_slider ul.ui-tabs-nav li span{
			line-height:135%; 
		}
		div.x2_slider li.ui-tabs-nav-item a {
			display:block;
			height:60px;
			color:#<?php echo $cap->font_color; ?> !important;
		    <?php bg_fade($cap->bg_details_hover_color, $cap->bg_details_color); ?>
			-webkit-transition: none; -moz-transition: none; -o-transition: none; transition: none;
			border-radius: 0; -moz-border-radius: 0; -webkit-border-radius: 0;
			font-weight: normal;
			line-height:20px;
			padding: 0 2px; 
			width:100%;
			text-shadow: -1px 1px 0 #<?php echo $cap->bg_details_hover_color; ?>;
		}
		div.x2_slider a, div.x2_slider a:hover, div.x2_slider a:focus { 
			text-decoration: none; 
		}
		div.x2_slider li.ui-tabs-nav-item a:hover{
			background: #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.x2_slider ul.ui-tabs-nav li.ui-tabs-selected a{
			background: #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.x2_slider .featured .ui-tabs-panel{
			width: 716px; 
			height: 250px;
			overflow:hidden; 
			background:#<?php echo $cap->bg_details_hover_color; ?>; 
			position:relative; 
			padding:0;  
			border: medium none; 
			border-radius: 0 0 0 0;
		}
		div#x2_slider-top div.x2_slider .featured .ui-tabs-panel{
			width: 756px;
		}
		div.x2_slider .featured .ui-tabs-panel .info{
			position:absolute;
			top:170px; left:0;
			height:80px;
			background: url(<?php echo get_template_directory_uri() ?>/images/slideshow/transparent-bg.png);
			width:100%;
		}
		div.x2_slider .featured .info h2 > a{
			font-size:18px;
			color: #ffffff; 
			color: #ffffff !important; 
			overflow:hidden; 
			font-family: Helvetica, Arial, sans-serif;
		}
		div.x2_slider .featured .info h2 {
			padding:2px 2px 0 5px;
			margin:0;
			line-height:100%;
			overflow:hidden;
			text-shadow: 1px 1px 1px #000000;
		}
		div.x2_slider .featured .info p{
			height: 44px;
			overflow: hidden;
			margin:0 5px;
			font-size:12px;
			line-height:14px;
			font-family: Helvetica, Arial, sans-serif;
			color:#ffffff;
			text-shadow: 1px 1px 1px #000000;
		}
		div.x2_slider .featured .info a{
			color:#ffffff; color:#ffffff !important;
			padding-left:0;
		}
		div.x2_slider .featured .ui-tabs-hide{
			display:none;
		}
		div.x2_slider .ui-tabs {
			padding: 0;
			position: relative;
		}
		div.x2_slider .ui-corner-all {
			border: medium none;
			border-radius: 0 0 0 0;
		}
		div.x2_slider .ui-widget-header {
			background: none repeat scroll 0 0 transparent;
			border: medium none;
			font-weight: normal;
		} 
			
	/* List Post Templates ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */	
			
		/* that's the post entry */
		.listposts {
			width: auto;
		}
		
		/* that's the wrap around */
		.list-posts-all {
		    width: 100%;
		    height: auto;
		    overflow-y: auto;
		    margin-bottom: 5px;
		}
		.widget.widget_x2_list_posts_widget {
			margin-bottom: 0; 
		}
	
		/* the featured image always gets a border */ 
		div.listposts img.wp-post-image {
			border: solid 1px #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.listposts.widget img.wp-post-image {
			border: solid 1px #<?php echo $cap->bg_container_alt_color; ?>;
			margin-right: 10px;
		}
		
		/* clickable boxes */
		a.clickable:hover,
		a.clickable:focus {
			text-decoration: none; 
		}
		a.clickable div.listposts {
		    border: solid 1px #<?php echo $cap->bg_container_alt_color; ?>; 
		    padding: 1.5%;
		    margin: 0 1% 1% 0;
		    width: 95%;
		    overflow: auto; 
			<?php bg_fade($cap->bg_details_hover_color, $cap->bg_details_color); ?>
		}	
		a.clickable:hover div.listposts {
			background: #<?php echo $cap->bg_details_color; ?>; 
		}	
		a.clickable div.listposts.widget {
			margin-bottom: 10px;
		}	
		a.clickable div.listposts p {
			color: #<?php echo $cap->font_color; ?>; 
			line-height: 124%;  
			margin-bottom: 5px;	
		}		
		a.clickable div.listposts.widget span.more {
			display: none;
		}	
		a.clickable div.listposts.widget h3, a.clickable div.listposts.widget h3 span.link { 
			font-size: 15px; 
			line-height: 120%;
			margin-bottom: 14px; 
		}	
		div.widget_x2_list_posts_widget ul {
			list-style: none;
			margin: 0 0 10px 0px;
		}
		
		/* carousel posts special */ 
		.carousel a.clickable div.listposts {
			margin: 0;
			width: 97%;
		}
		
		/* list posts img mouse over effect */
		.boxgrid {
			width: 222px;
			height: 160px;
			float: left;
			background: #111111;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			overflow: hidden;
			position: relative;
			float:left;
			margin: 10px;
		}
		#content .boxgrid img {
			position: absolute;
			top: 0;
			left: 0;
			border: 0;
		}
		.boxgrid p {
			padding: 0 0 0 10px;
			line-height: 110%;
		}
		.boxgrid p a {
			color: #ffffff;
			font: 11px Arial, sans-serif;
			text-decoration: none;
			text-shadow: 1px 1px 0 #000000;
		}
		div.boxgrid h3 > a { color:#ffffff; font:12px Arial, sans-serif; letter-spacing:0; font-weight: bold; padding-left:0px; text-shadow: 1px 1px 0 #000000; }
		.boxgrid h3 { margin: 0 5px 2px 0px; line-height: 110%; }
		
		.boxcaption {
			float: left;
			position: absolute;
			background: #111111;
			height: 80px;
			width: 100%;
			opacity: .8;
			/* For IE 5-7 */
			filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
			/* For IE 8 */
			-MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
		}
		.captionfull .boxcaption {
			top: 0;
			left: 0;
		}
		.caption .boxcaption {
			top: 0;
			left: 0;
		}
		.cover{
			margin-top:170px;
		}
			
		/* list posts - posts-img-left-content-right */	
		div.posts-img-left-content-right {
			padding:20px 0 0 0;
		}
		div.posts-img-left-content-right img.wp-post-image {
			float:left;
			margin-bottom:0;
			margin-right:25px;
			margin-top:2px;
		}
		
		/* list posts - posts-img-right-content-left */
		
		div.posts-img-right-content-left {
			padding:20px 0 0 0;
			float:right;
		}
		div.posts-img-right-content-left img.wp-post-image {
			float:right;
			margin-bottom:0;
			margin-top:2px;
			margin-left:25px;
		}
		
		/* list posts - posts-img-over-content and under-content */	
		a.clickable div.listposts.posts-img-under-content, 
		a.clickable div.listposts.posts-img-over-content {
			float:left;
		    padding: 15px 20px 20px 20px;
		    margin: 0 2% 2% 0;
		    width: 236px;
		    overflow: hidden;
		}
		a.clickable div.listposts.posts-img-under-content img.wp-post-image,
		a.clickable div.listposts.posts-img-over-content img.wp-post-image {
			margin-bottom:0;
			margin-right:25px;
			margin-top:5px;
			padding: 6px; 
			background-color: #<?php echo $cap->bg_details_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; 
		} 
		div.posts-img-under-content h3 {
			width:236px;
			max-width:236px;
			padding-top:8px;
			padding-bottom: 12px;
			border-bottom: solid 1px #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.posts-img-over-content h3 {
			width:236px;
			max-width:236px;
			padding-top:10px;
			margin-top:10px;
			border-top:1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		}
		div.posts-img-over-content p,
		div.posts-img-under-content p {
			padding-right:0;
			width:236px;
		}	
	
		
	/* Column Shortcodes ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
	
		.full_width_col {
			width:99.6%;
			margin:0 0.4% 30px 0 !important;
		}
		.half_col_left {
			float:left;
			margin:0 1.4% 30px 0 !important;
			padding:0;
			width:48%;
		}
		.half_col_right {
			float:right;
			margin:0 0.4% 30px 1.4% !important;
			padding:0;
			width:48%;
		}
		.third_col {
			float:left;
			margin:0 3.2% 30px 0 !important;
			padding:0;
			width:31%;
		}
		.third_col_right {
			float:right;
			margin:0 0.4% 30px 0 !important;
			padding:0;
			width:31%;
		}
		.two_third_col {
			float:left;
			margin:0 2.6% 30px 0 !important;
			padding:0;
			width:64.6%;
			overflow: hidden;
		}
		.two_third_col_right {
			float:right;
			margin:0 0.4% 30px 0 !important;
			padding:0;
			width:64.6%;
		}
		.fourth_col {
			float:left;
			margin:0 2.6% 30px 0 !important;
			padding:0;
			width:22.5%;
			overflow: hidden;
		}
		.fourth_col_right {
			float:right;
			margin:0 0.4% 30px 0 !important;
			padding:0;
			width:22.5%;
		}
		.three_fourth_col {
			float:left;
			margin:0 2.6% 30px 0 !important;
			padding:0;
			width:69.8% !important;
		}
		.three_fourth_col_right {
			float:right;
			margin:0 0.4% 30px 0 !important;
			padding:0;
			width:69.8% !important;
		}
		div.post img.attachment-slider-full {
			margin:0;
		}
		
		
	/* Accordion ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		.accordion {
			width: 100%;
			border-bottom: solid 1px #<?php echo $cap->bg_container_alt_color; ?>;
			clear:both;
			margin-top: 10px; 
			margin-bottom: 30px;
			overflow: hidden;
		}
		.accordion h3 {
			background:url(<?php echo get_template_directory_uri() ?>/images/arrow-square.gif) no-repeat scroll 4px 50% #<?php echo $cap->bg_container_color; ?>;
			border-color:#<?php echo $cap->bg_container_alt_color; ?>;
			border-style:solid solid none;
			border-width:1px 1px medium;
			cursor:pointer;
			margin:0;
			padding: 2px 24px;
			font-size: 145%;
		}
		.accordion h3.small {
			font-size: 110%;
		}
		.accordion h3:hover {
			background-color: #<?php echo $cap->bg_details_hover_color; ?>;
		}
		.accordion h3.active {
			background:url('<?php echo get_template_directory_uri() ?>/images/arrow-square-on.gif') no-repeat scroll #<?php echo $cap->bg_details_hover_color; ?>;
			background-position:4px 50%;
		}
		.accordion p {
			margin-bottom: 0;
		}
		.accordion div {
			background: #<?php echo $cap->bg_container_color; ?>;
			margin: 0px;
			padding: 20px;
			border-left: solid 1px #<?php echo $cap->bg_container_alt_color; ?>;
			border-right: solid 1px #<?php echo $cap->bg_container_alt_color; ?>;
		}
		.accordion div div {
			background: #<?php echo $cap->bg_container_color; ?>;
			margin: 15px 0 0;
			padding: 0;
			border-left: none;
			border-right: none;
		}
		.accordion h4{
			line-height:170%;
			background-color: transparent;
			border:1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			padding:2px 5px;
		}
		.accordion div p{
			margin-bottom: 10px;
		}
		.accordion br{ 
			line-height: 0px;
		}
		.accordion br:last-of-type{
			display: none;
		}
		div.announcement {
			float:right;
			height:60px;
			padding:10px;
			position:absolute;
			right:354px;
			text-align:center;
			top:120px;
			width:230px;
			font-size:30px;
			line-height:170%;
		}
		div.announcement a {
			font-size:30px;
			line-height:170%;
		}
	
		
	/* Images :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		#content .gallery {
			margin: 0 auto 18px;
		}
		#content .gallery .gallery-item {
			float: left;
			margin-top: 0;
			text-align: center;
			width: 33%;
		}
		#content .gallery img {
			border: none;
			margin-top:20px;
		}
		#content .gallery .gallery-caption {
			color: #<?php echo $cap->font_alt_color; ?>;
			font-size: <?php echo $cap->font_alt_size; ?>px;
			margin: 0 0 20px;
		}
		#content .gallery dl {
			margin: 0;
		}
		#content .gallery br+br {
			display: none;
		}
		
		/* single attachment images should be centered */
		#content .attachment img { 
			display: block;
			margin: 0 auto;
		}
		
		
	/* Search View ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */ 
		
		body.search div.author-box { display: none; } 
		
		body.search div#message p { 
			padding: 10px 0; 
		} 
		body.search #content ul.item-list li div.item-title {
			font-size: 21px;
			font-weight: normal;
			font-family: <?php echo $cap->title_font_style; ?>;
		}
		div.search-result, 
		body.search div.hentry, 
		body.search div.post {
		    background-color: #<?php echo $cap->bg_details_hover_color; ?>;
			border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
		    margin-bottom: 20px;
		    padding: 20px;
		}
		body.search div.post {
		    background-color: #<?php echo $cap->bg_container_color; ?>;
		}
		textarea { resize: vertical; }
		
		body.search div.post h3.post-title { 
			padding-bottom: 20px; 
			margin-bottom: 15px; 
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;  
		}
		body.search div.post div.post-content, body.search div.comment-content {
		    margin-left: 0; 
		}
		body.search h2.content-title {
			border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; 
		}
		
	
	/* 404 Error Page :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */ 

	<?php if($cap->errorpage_style != 'normal'): ?>		
		body.error404 {
		-webkit-transition: all 0.4s ease-out;  /* Safari 3.2+, Chrome */
		   -moz-transition: all 0.4s ease-out;  /* Firefox 4-15 */
		     -o-transition: all 0.4s ease-out;  /* Opera 10.5–12.00 */
		        transition: all 0.4s ease-out;  /* Firefox 16+, Opera 12.50+ */
	   	-webkit-transform: rotate(180deg);  /* Safari 3.1+, Chrome */ 
		   -moz-transform: rotate(180deg);  /* Firefox 3.5-15 */
		    -ms-transform: rotate(180deg);  /* IE9+ */
		     -o-transform: rotate(180deg);  /* Opera 10.5-12.00 */
		        transform: rotate(180deg);  /* Firefox 16+, Opera 12.50+ */
		}
		body.error404 input, 
		body.error404 input[type="submit"] {
			padding: 10px 20px;
		}
		body.error404 input:focus {
		padding-right: 60px;
		}
		body.error404 #header {
		margin-top: 150px;
	   	-webkit-transform: rotate(210deg);  /* Safari 3.1+, Chrome */ 
		   -moz-transform: rotate(210deg);  /* Firefox 3.5-15 */
		    -ms-transform: rotate(210deg);  /* IE9+ */
		     -o-transform: rotate(210deg);  /* Opera 10.5-12.00 */
		        transform: rotate(210deg);  /* Firefox 16+, Opera 12.50+ */		
		}
		#title404 {
			float: left;
			clear: right;
			font-size: 79px;
		}
		#gohome {
			position: absolute;
			bottom: 10px;
			left: 10px;
		   	-webkit-transform: rotate(180deg);  /* Safari 3.1+, Chrome */ 
			   -moz-transform: rotate(180deg);  /* Firefox 3.5-15 */
			    -ms-transform: rotate(180deg);  /* IE9+ */
			     -o-transform: rotate(180deg);  /* Opera 10.5-12.00 */
			        transform: rotate(180deg);  /* Firefox 16+, Opera 12.50+ */
		}
		.help404 { 
		position: absolute;
		bottom: 50px;
		right: 300px;
	   	-webkit-transform: rotate(187.5deg);  /* Safari 3.1+, Chrome */ 
		   -moz-transform: rotate(187.5deg);  /* Firefox 3.5-15 */
		    -ms-transform: rotate(187.5deg);  /* IE9+ */
		     -o-transform: rotate(187.5deg);  /* Opera 10.5-12.00 */
		        transform: rotate(187.5deg);  /* Firefox 16+, Opera 12.50+ */		
		}
		.wrong {
			margin-top: 100px;
			-webkit-transform: rotate(150deg);  /* Safari 3.1+, Chrome */ 
			     -moz-transform: rotate(150deg);  /* Firefox 3.5-15 */
			      -ms-transform: rotate(150deg);  /* IE9+ */
			       -o-transform: rotate(150deg);  /* Opera 10.5-12.00 */
			          transform: rotate(150deg);  /* Firefox 16+, Opera 12.50+ */		
		}
		body.error404 #wpadminbar, 
		body.error404 #access, 
		body.error404 #header #search-bar, 
		div.menu-top, 
		body.error404 #header .widgetarea, 
		body.error404 .badge_body, 
		body.error404 .body_badge_link {
			display: none !important;
		}
		body.error404 div.padder, 
		body.error404 #container, 
		body.error404 #innerrim, 
		#content.error404 {
			overflow: auto;
		}
		body.error404 #innerrim {
		}
	<?php else: ?>
		#title404, .wrong, #gohome { display: none; }
	<?php endif; ?>	
	
	/* Secret Specials ;) */
	.copymagic {
		width: 96%;
		height: auto;
		padding: 10px 2% 0 2%;
		color: #<?php echo $cap->font_color; ?>;
		font-family: 'courier new', courier, arial, sans-serif;
		resize: none;
	}
	.hint {
		float: right;
		color: #<?php echo $cap->font_alt_color; ?>;
		font-style: italic;
		font-size: 11px;
		margin-right: -150px;
		-webkit-transition: all 700ms ease-in-out;  
	       -moz-transition: all 700ms ease-in-out;  
	         -o-transition: all 700ms ease-in-out;  
	            transition: all 700ms ease-in-out; 
	}
	.accordion:hover .hint {
		color: #<?php echo $cap->link_color; ?>;
		margin-right: 0;
	}

		
	/* THEME OPTIONS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */		
	/* > new styles and overwrites ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
		
		<?php if($cap->website_width != ''): ?>
			/** website width  **/
			#innerrim, div.inner {
				max-width: <?php echo $cap->website_width; echo $cap->website_width_unit; ?>;
				min-width: <?php echo $cap->website_width; echo $cap->website_width_unit; ?>;
			} 
		<?php endif; ?>	
		
		<?php if($cap->bg_body_color || $cap->bg_body_img):?>
			/** body background colour, image and repeat  **/
			body {
			<?php if($cap->bg_body_color){?>
				background-color: <?php if($cap->bg_body_color != 'transparent') { ?>#<?php } ?><?php echo $cap->bg_body_color?>;
			<?php } ?>
			<?php if($cap->bg_body_img){?>
				background-image:url(<?php echo $cap->bg_body_img?>);	
			<?php } ?>
			<?php switch ($cap->bg_body_img_repeat) {
			    case 'no repeat': ?>background-repeat: no-repeat;<?php	
			    	break;
			    case 'x': ?>background-repeat: repeat-x;<?php	
			    	break;
			    case 'y': ?>background-repeat: repeat-y;<?php	
			    	break;
			    case 'x+y': ?>background-repeat: repeat;<?php	
			    	break;
			    } ?>
			} 
		<?php endif; ?>
			
		<?php if($cap->bg_container_nolines == 'hide' ) { ?>
			/** hide the vertical lines in the container  **/
			.v_line { display: none; }	
		<?php }?>
		
		<?php if($cap->bg_container_color != '' || $cap->bg_container_img != '' || $cap->container_corner_radius != ''): ?>
			/** container background image, repeat and corner radius  **/
			div#container, body.activity-permalink div#container {
				<?php if($cap->bg_container_img){?>
					background-image:url(<?php echo $cap->bg_container_img?>);	
					<?php switch ($cap->bg_container_img_repeat) {
					        case 'no repeat':
								?>background-repeat: no-repeat;<?php	
					        	break;
					        case 'x':
								?>background-repeat: repeat-x;<?php	
					        	break;
					        case 'y':
								?>background-repeat: repeat-y;<?php	
					        	break;
					        case 'x+y':
								?>background-repeat: repeat;<?php	
					        	break;
					        } ?>
				<?php } ?>	
						 
				<?php if($cap->container_corner_radius =='not rounded' ) { ?>
					-moz-border-radius: 0px;
					-webkit-border-radius: 0px; 
					border-radius: 0px; 
				<?php } ?>
				
			}
		<?php endif; ?>	
		
		<?php if($cap->bg_container_color != '' || $cap->bg_container_img != '' || $cap->container_corner_radius != ''): ?>
			/** adapting header, footer, widgets, sidebars, etc. to container background colour, image, repeat and corner radius - if it is NOT specified extra for the footer! **/
			<?php if($cap->bg_container_img && !$cap->bg_footer_img){?>
				div#footer .cc-widget, div#header .cc-widget , #footer .cc-widget-right, #header .cc-widget-right {
					background-image:url(<?php echo $cap->bg_container_img?>);	
						<?php switch ($cap->bg_container_img_repeat) {
					        case 'no repeat':
								?>background-repeat: no-repeat;<?php	
					        	break;
					        case 'x':
								?>background-repeat: repeat-x;<?php	
					        	break;
					        case 'y':
								?>background-repeat: repeat-y;<?php	
					        	break;
					        case 'x+y':
								?>background-repeat: repeat;<?php	
					        	break;
				        } ?>		 
				}
			<?php } ?>
		
			<?php if($cap->container_corner_radius == 'not rounded' ) { ?>
				div#sidebar, div#leftsidebar, div#content, div#x2_slider-top, div.slider-wrapper,  
				div#footer, div#footer .cc-widget, #footer .cc-widget-right, div#header, div#header .cc-widget, #header .cc-widget-right {
					-moz-border-radius: 0px;
					-webkit-border-radius: 0px; 
					border-radius: 0px; 
				}
			<?php } ?>
			
			<?php if($cap->container_corner_radius == 'rounded' ) { ?>
				div#x2_slider-top, .slider-wrapper, .nivoSlider, .nivoSlider img, .home-sidebar, div.boxgrid, div.boxgrid img,  
				div#footer, div#footer .cc-widget, #footer .cc-widget-right, div#header, div#header .cc-widget, #header .cc-widget-right {
					-moz-border-radius: 6px;
					-webkit-border-radius: 6px; 
					border-radius: 6px; 
				}
			<?php } ?>	
		<?php endif; ?>	
		
		<?php if($cap->bg_footer_color != '' || $cap->bg_footer_img != '' || $cap->footer_height != ''): ?>
			/** footer WIDGETS and header WIDGETS - height, bg_color, image and repeat  **/
			#footer .cc-widget, #header .cc-widget{
				<?php if($cap->bg_footer_color) { ?>
					background-color: <?php if($cap->bg_footer_color != 'transparent') { ?>#<?php } echo $cap->bg_footer_color;?> !important; 
				<?php } ?>
				<?php if($cap->bg_footer_img) { ?>
					background-image:url(<?php echo $cap->bg_footer_img; ?>);
					<?php 
					switch ($cap->bg_footer_img_repeat)
			        {
			        case 'no repeat':
						?>background-repeat: no-repeat;<?php	
			        	break;
			        case 'x':
						?>background-repeat: repeat-x;<?php	
			        	break;
			        case 'y':
						?>background-repeat: repeat-y;<?php	
			        	break;
			        case 'x+y':
						?>background-repeat: repeat;<?php	
			        	break;
			        }
					?>		
				<?php } ?>
				<?php if($cap->footer_height) { ?>
					height:<?php echo $cap->footer_height; ?>px; 
				<?php } ?>
			}
		<?php endif; ?>	
		
		<?php if($cap->bg_footerall_color != '' || $cap->bg_footerall_img != '' || $cap->footerall_height != ''): ?>
			/** footer - height, color, image and repeat  **/
			#footer {
				<?php if($cap->bg_footerall_color) { ?>
					background-color: <?php if($cap->bg_footerall_color != 'transparent') { ?>#<?php } echo $cap->bg_footerall_color;?>; 
				<?php } ?>
				<?php if($cap->bg_footerall_img) { ?>
					background-image:url(<?php echo $cap->bg_footerall_img; ?>);
					<?php 
					switch ($cap->bg_footerall_img_repeat)
			        {
			        case 'no repeat':
						?>background-repeat: no-repeat;<?php	
			        	break;
			        case 'x':
						?>background-repeat: repeat-x;<?php	
			        	break;
			        case 'y':
						?>background-repeat: repeat-y;<?php	
			        	break;
			        case 'x+y':
						?>background-repeat: repeat;<?php	
			        	break;
			        }
					?>		
				<?php } ?>
				<?php if($cap->footerall_height) { ?>
					height:<?php echo $cap->footerall_height; ?>px; 
				<?php } ?>
			}
		<?php endif; ?>	
				
		<?php if($cap->title_font_style != "" || $cap->title_size != "" || $cap->title_color != "" || $cap->title_weight != ""):?>
			/** title font style, size, weight and colour  **/
			h1, h2, h1 a, h2 a, h1 a:hover, h1 a:focus, h2 a:hover, h2 a:focus {
				<?php if($cap->title_font_style){?>
					font-family: <?php echo $cap->title_font_style?>;
				<?php } ?>
				<?php if($cap->title_size){?>
					font-size: <?php echo $cap->title_size?>px;
				<?php } ?>
				<?php if($cap->title_weight){?>
					font-weight:<?php echo $cap->title_weight?>;
				<?php } ?>
			}
			
			<?php if($cap->title_color){?>
				h1, h2, h1 a, h2 a, h1 span.link, h2 span.link {
					color:#<?php echo $cap->title_color?>;
				}
			<?php } ?>
		<?php endif; ?>
		
		<?php if($cap->subtitle_font_style != "" || $cap->subtitle_color != "" || $cap->subtitle_weight != ""):?>
			/** subtitle font style, weight and colour  **/
			h3, h4, h5, h6, h3 a, h4 a, h5 a, h6 a,
			h3 span.link, h4 span.link, h5 span.link, h6 span.link {
				<?php if($cap->subtitle_font_style){?>
					font-family: <?php echo $cap->subtitle_font_style?>;
				<?php } ?>
				<?php if($cap->subtitle_color){?>
					color:#<?php echo $cap->subtitle_color?>;
				<?php } ?>
				<?php if($cap->subtitle_weight){?>
					font-weight:<?php echo $cap->subtitle_weight?>;
				<?php } ?>
			}
		<?php endif; ?>
		
		<?php if($cap->link_color_hover != ""):?>
			/** link colour hover  **/
			a:hover, 
			a:focus, 
			div#sidebar div.item-options a.selected:hover, 
			div#leftsidebar div.item-options a.selected:hover, 
			form.standard-form input:focus, 
			form.standard-form select:focus, 
			.activity-header a:hover,   
			div.post p.date a:hover, 
			div.post p.postmetadata a:hover, 
			div.comment-meta a:hover, 
			div.comment-options a:hover, 
			div.widget ul li a:hover, 
			div.widget ul li.recentcomments a:hover,  
			div.widget-title ul.item-list li a:hover {
				color:#<?php echo $cap->link_color_hover ?>;
			}
			<?php if ( $cap->link_color_subnav_adapt == "link colour and hover colour" ) { ?> 
				#subnav a:hover, #subnav a:focus, div.item-list-tabs ul li a:hover, div.item-list-tabs ul li a:focus {
					color:#<?php echo $cap->link_color_hover ?>;
				} 	
			<?php } ?>		
		<?php endif; ?>
		
		<?php if($cap->link_underline != "never" && $cap->link_underline != "" ): 
			if($cap->link_underline == "just for mouse over"){ 
				$stylethis = 'a:hover, a:focus'; 
			} else {		
				if($cap->link_underline == "always") { 
				$stylethis = 'a, a:hover, a:focus';
				} else { 
					$stylethis = 'a:hover, a:focus { text-decoration: none; } a';
				}
			} ?>
			/** link underline  **/
			<?php echo $stylethis ?> {
				text-decoration: underline;
			} 		
		<?php endif; ?>
				
		<?php if($cap->posts_lists_hide_avatar == "hide"){?>
			/** archive pages: hide avatar **/
			div.post div.post-content, 
			div.comment-content {
			    margin-left: 0;
			}
			div.post div.author-box {
			    display: none;
			}
		<?php } ?>
		
		<?php if($cap->posts_lists_style == "bubbles"){?>
			/** list posts bubble styles **/
			.bubbles div.post h2.posttitle {
			    line-height: 120%;
			    margin: 0 0 12px;
			} 
			.bubbles span.marker {
			    width: 20px;
			    height: 20px;
			    position: absolute;
			    margin: 17px 0 0 -26px;
			    background: none repeat scroll 0 0 #<?php echo $cap->bg_details_hover_color; ?>;
			    border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			    border-right: none;
				border-top: none;  
			    -moz-transform: rotate(45deg);
			    -webkit-transform: rotate(45deg);
			    -o-transform: rotate(45deg);
			    -ms-transform: rotate(45deg);
			}
				<?php // hide the markers when avatars are hidden anyway
				if( $cap->posts_lists_hide_avatar == "hide") { ?>
					span.marker { display: none; }
				<?php } ?>
			.bubbles div.post div.post-content {
				border-radius: 11px;
				-moz-border-radius: 11px;
				-webkit-border-radius: 11px; 
			    background-color: #<?php echo $cap->bg_details_hover_color; ?>;
			    border: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; 
			    margin-left: 85px;
			    padding: 15px 15px 5px 15px;
			    margin-bottom:8px;
			}
			.bubbles div.post p.date { 
			    border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>;
			    border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; 
			}
			.bubbles div.post p.postmetadata { 
			    border-top: 1px solid #<?php echo $cap->bg_container_alt_color; ?>; 
			}
			.bubbles div.post div.author-box {
			    margin-top: 20px;
			    display: block;	
			}
		<?php } ?>
		
		<?php if($cap->posts_lists_hide_date == "hide"){?>
			/** list posts: hide date, category and author**/
			body.archive div.post p.date, 
			body.home div.post p.date { display: none; }
		<?php } ?>
		
		<?php if($cap->header_height){?>
			/** header height / navigation position **/
			#access { margin-top:<?php echo $cap->header_height; ?>px; }
		<?php } ?> 
		
		<?php if($cap->header_img != ''){?>
			/** header image, repeat  **/
			#header {
				background-image:url(<?php echo $cap->header_img?>);	
					<?php switch ($cap->header_img_repeat) {
				        case 'no repeat': 
				        	?>background-repeat: no-repeat;<?php	
				        	break;
				        case 'x':
							?>background-repeat: repeat-x;<?php	
				        	break;
				        case 'y':
							?>background-repeat: repeat-y;<?php	
				        	break;
				        case 'x+y':
							?>background-repeat: repeat;<?php	
				        	break;
						default:
							?>background-repeat: no-repeat;<?php	
				        	break;
			       	} ?>
				<?php if($cap->header_img_x == 'center' ){?>
					background-position: center <?php if($cap->header_img_y){ echo $cap->header_img_y; } else { echo '0'; }?>px;
				<?php } elseif($cap->header_img_x == 'right' ){?>
					background-position: right <?php if($cap->header_img_y){ echo $cap->header_img_y; } else { echo '0'; }?>px;
				<?php }?>  
				<?php if((!$cap->header_img_x || $cap->header_img_x == 'left') && $cap->header_img_y){?>
					background-position: left <?php echo $cap->header_img_y ?>px;
				<?php } ?>
			}
			<?php } elseif ( get_header_image() != '' && $cap->add_custom_image_header == true ) { ?>
				#header {
				background-image:url(<?php echo header_image(); ?>);	
					<?php 
					switch ($cap->header_img_repeat)
			        {
			        case 'no repeat':
						?>background-repeat: no-repeat;<?php	
			        	break;
			        case 'x':
						?>background-repeat: repeat-x;<?php	
			        	break;
			        case 'y':
						?>background-repeat: repeat-y;<?php	
			        	break;
			        case 'x+y':
						?>background-repeat: repeat;<?php	
			        	break;
					default:
						?>background-repeat: no-repeat;<?php	
			        	break;
			       	}
					?>
				<?php if($cap->header_img_x == 'center' ){?>
					background-position: center <?php if($cap->header_img_y){ echo $cap->header_img_y; } else { echo '0'; }?>px;
				<?php } elseif($cap->header_img_x == 'right' ){?>
					background-position: right <?php if($cap->header_img_y){ echo $cap->header_img_y; } else { echo '0'; }?>px;
				<?php }?>  
				<?php if((!$cap->header_img_x || $cap->header_img_x == 'left') && $cap->header_img_y){?>
					background-position: left <?php echo $cap->header_img_y ?>px;
				<?php } ?>
			}
		<?php } ?>
		
		<?php if ( $cap->header_text == 'off' ) { ?>
			#header div#logo h1, #header #desc, #header div#logo h4, div#blog-description { display: none; }
		<?php } ?>
		
		<?php if ( $cap->header_text_color) { ?>
			#header div#logo h1 a, #header div#logo h4 a, #desc, div#blog-description { color:#<?php echo $cap->header_text_color ?>; }
		<?php } ?>			
		
		<?php if($cap->searchbar_x != "" || $cap->searchbar_y != ""): ?>
			/** header search bar position  **/
			<?php if($cap->searchbar_y){?>
				#header #search-bar { 
					top:<?php echo $cap->searchbar_y; ?>px !important;
				}
			<?php } ?>
			
			<?php if($cap->searchbar_x == 'left'){?>
				#header #search-bar { 
					left:0; 
				}
				#header #search-bar {
				    text-align: left;
				}
			<?php } ?>
		<?php endif; ?>
		 
		<?php if($cap->bg_menu_style != "tab style"): ?>
			/** menu style  **/ 
			<?php if($cap->bg_menu_style == 'closed style'){?>
				#access ul li.current_page_item > a, #access ul li.current-menu-ancestor > a, 
				#access ul li.current-menu-item > a, #access li.selected > a, #access ul li.current-menu-parent > a, 
				#access ul li.current_page_item > a:hover, #access ul li.current-menu-item > a:hover,
				#access ul li.current_page_item, #access ul li.current-menu-item, #access li.selected, 
				#access li:hover > a {
					-moz-border-radius: 6px; -webkit-border-radius:6px; border-radius:6px; 	
				} 
				#access ul li {
					margin-bottom: 4px; 
				}
				#access ul ul li {
					margin-bottom: 0px; 
				}
				#access ul ul a {
					margin-bottom: 0px;
				}	
			<?php } ?>
			<?php if($cap->bg_menu_style == 'simple'){?>
				div#access {
					background-color: transparent;
				}	
				#access .menu-header, div.menu {
			    margin-left: 0; 
			    padding-left: 0;
			    }
			    #access a {
			    padding: 0 12px 2px 12px;
				}
				div#access div.menu ul li a:hover, div#access div.menu ul li a:focus, 
				#access ul ul :hover > a, #access ul.children li:hover > a, #access ul.sub-menu li:hover > a, 
				#access ul li.current_page_item > a, #access ul li.current-menu-ancestor > a, 
				#access ul li.current_page_item > a:hover, #access ul li.current-menu-item > a:hover, 
				#access ul li.current-menu-item > a, #access li.selected > a, #access ul li.current-menu-parent > a { 
					color: #<?php echo $cap->link_color ?>; 
				}
			<?php } ?>
			<?php if($cap->bg_menu_style == 'bordered'){?>
				div#access {
					background-color: transparent;
					border-top: 1px solid #<?php echo $cap->bg_container_alt_color ?>;
					border-bottom: 1px solid #<?php echo $cap->bg_container_alt_color ?>;
					-moz-border-radius:0px;
					-webkit-border-radius:0px;
					border-radius:0px;
				}	
				div#access div.menu ul li a:hover, div#access div.menu ul li a:focus, 
				#access ul ul :hover > a, #access ul.children li:hover > a, #access ul.sub-menu li:hover > a, 
				#access ul li.current_page_item > a, #access ul li.current-menu-ancestor > a, 
				#access ul li.current_page_item > a:hover, #access ul li.current-menu-item > a:hover, 
				#access ul li.current-menu-item > a, #access li.selected > a, #access ul li.current-menu-parent > a { 
					color: #<?php echo $cap->link_color ?>; 
				}
			<?php } ?>
		<?php endif; ?>
		
		<?php if($cap->menu_x == 'right'){?>
			/** menu x-position  **/
			div.menu ul { float: right; }
		<?php } ?>
		
		<?php if($cap->menue_link_color	) { ?>
			/** menu font colour  **/
			#access a, #access ul ul a, #access ul.children li.selected > a, 
			#access ul li:hover > a, #access ul ul :hover > a, 
			#access ul.children li:hover > a, #access ul.sub-menu li:hover > a, 
			#access ul li.current_page_item > a, #access ul li.current-menu-ancestor > a, 
			#access ul li.current-menu-item > a, #access li.selected > a, #access ul li.current-menu-parent > a  {
				color: #<?php echo $cap->menue_link_color?>;
			}
		<?php } ?>
		
		<?php if($cap->menue_link_color_current	) { ?>
			/** menu font colour current and mouse over **/ 
			div#access div.menu ul li a:hover, 
			div#access div.menu ul li a:focus, 
			#access ul ul *:hover > a, 
			#access ul.children li:hover > a, 
			#access ul.sub-menu li:hover > a, 
			#access ul li.current_page_item > a, 
			#access ul li.current-menu-ancestor > a, 
			#access ul li.current_page_item > a:hover, 
			#access ul li.current-menu-item > a:hover, 
			#access ul li.current-menu-item > a, 
			#access ul li.current-menu-parent > a, 
			#access li.selected > a {
				color: #<?php echo $cap->menue_link_color_current?>;
			} 
			/** IE browser hack for menu font colour current and mouse over  **/ 
			* html #access ul li.current_page_item a,
			* html #access ul li.current-menu-ancestor a,
			* html #access ul li.current-menu-item a,
			* html #access ul li.current-menu-parent a,
			* html #access ul li a:hover {
				color: #<?php echo $cap->menue_link_color_current?>;
			} 
		<?php } ?>
		
		<?php if($cap->bg_menue_link_color != "" || $cap->menu_underline != "" || $cap->bg_menu_img != ""):?>
			/** menu background colour, border-bottom, image and repeat  **/ 
			#access, #access.sticky {
			<?php if($cap->bg_menue_link_color	){?>
				background-color: <?php if ( $cap->bg_menue_link_color != 'transparent' ) { echo '#'; } echo $cap->bg_menue_link_color; ?>;
			<?php } ?>
			<?php if($cap->menu_underline ){?>
				border-bottom: 1px solid #<?php echo $cap->menu_underline?>;
			<?php } ?>
			<?php if($cap->bg_menu_img){?>
				background-image:url(<?php echo $cap->bg_menu_img?>);	
			<?php } ?>
			<?php 
					switch ($cap->bg_menu_img_repeat)
			        {
			        case 'no repeat':
						?>background-repeat: no-repeat;<?php	
			        	break;
			        case 'x':
						?>background-repeat: repeat-x;<?php	
			        	break;
			        case 'y':
						?>background-repeat: repeat-y;<?php	
			        	break;
			        case 'x+y':
						?>background-repeat: repeat;<?php	
			        	break;
			        } ?>
			} 
		<?php endif; ?>
		
		<?php if($cap->menu_corner_radius != ""):?>
			/** menu corner radius  **/ 
			#access {
			<?php if($cap->menu_corner_radius == 'just the bottom ones'){?>
				-moz-border-radius-bottomleft:6px;
				-moz-border-radius-bottomright:6px;
				-webkit-border-bottom-left-radius:6px;
				-webkit-border-bottom-right-radius:6px;
				border-bottom-left-radius:6px;
				border-bottom-right-radius:6px;
			<?php } ?> 
			<?php if($cap->menu_corner_radius == 'all rounded'){?>
				-moz-border-radius:6px;
				-webkit-border-radius:6px;
				border-radius:6px;
			<?php } ?> 
			}
		<?php endif; ?>
		
		<?php if($cap->bg_menue_link_color_current	){?>
			/** menu background colour, image and repeat of current  **/ 
			#access ul li.current_page_item > a, #access ul li.current-menu-ancestor > a, 
			#access ul li.current-menu-item > a, #access li.selected > a, #access ul li.current-menu-parent > a, 
			#access ul li.current_page_item, #access ul li.current-menu-item, #access li.selected {
				background-color: <?php if ( $cap->bg_menue_link_color_current != 'transparent' ) { echo '#'; } echo $cap->bg_menue_link_color_current; ?>;
				<?php if($cap->bg_menu_img_current){?>
				background-image:url(<?php echo $cap->bg_menu_img_current?>);	
				<?php } ?>
				<?php if($cap->bg_menu_img_current) {
					switch ($cap->bg_menu_img_current_repeat) {
			        case 'no repeat':
						?>background-repeat: no-repeat;<?php	
			        break;
			        case 'x':
						?>background-repeat: repeat-x;<?php	
			        break;
			        case 'y':
						?>background-repeat: repeat-y;<?php	
			        break;
			        case 'x+y':
						?>background-repeat: repeat;<?php	
			        break;
			        } 
				} ?>	        
			} 
		<?php } ?>
		
		<?php if($cap->bg_menue_link_color_hover){?>
			/** menu background colour hover and drop down list  **/ 
			#access ul li.current_page_item a:hover, 
			#access ul li.current-menu-item a:hover,  
			#access li:hover > a, #access ul ul:hover > a, 
			#access ul ul li, #access ul ul a {
				background-color: <?php if ( $cap->bg_menue_link_color_hover != 'transparent' ) { echo '#'; } echo $cap->bg_menue_link_color_hover; ?> !important;
			}
		<?php } ?> 
		
		<?php if($cap->bg_menue_link_color_dd_hover	){?>
			/** menu background colour drop down menu item hover  **/ 
			#access ul ul.children li:hover > a,
			#access ul ul.sub-menu li:hover > a {
				background: #<?php echo $cap->bg_menue_link_color_dd_hover?> !important;
			} 
			#access ul ul { border: none !important; }
		<?php } ?>
		
		<?php if ( $cap->leftsidebar_width != "") { ?>
			/** left sidebar width  **/ 
			div#leftsidebar {
				width: <?php echo $cap->leftsidebar_width ?>px;
				margin-right: -<?php echo$cap->leftsidebar_width ?>px;
			} 
			div.v_line_left {
				margin-left: <?php echo $cap->leftsidebar_width ?>px;
			}
			<?php // change the width of the widget titles, which is always 41px less because of its padding.. 
			$old = $cap->leftsidebar_width; $wdth = $old - 41; ?>
			 
			#leftsidebar .widgettitle { 
				width: <?php echo $wdth ?>px;
			}	
		<?php } ?>
		
		<?php if ( $cap->bg_leftsidebar_color != "" || $cap->bg_leftsidebar_img != "") { ?>
			/** left sidebar background colour  **/ 
			div#leftsidebar {
				<?php if ( $cap->bg_leftsidebar_color != "" ) { ?>background-color: #<?php echo $cap->bg_leftsidebar_color; } ?>;
				
				<?php if($cap->bg_leftsidebar_img != ""){ ?>
					background-image:url(<?php echo $cap->bg_leftsidebar_img ?>);	
				
					<?php switch ($cap->bg_leftsidebar_img_repeat)
					        {
					        case 'no repeat':
								?>background-repeat: no-repeat;<?php	
					        	break;
					        case 'x':
								?>background-repeat: repeat-x;<?php	
					        	break;
					        case 'y':
								?>background-repeat: repeat-y;<?php	
					        	break;
					        case 'x+y':
								?>background-repeat: repeat;<?php	
					        	break;
					        } ?>
				<?php } ?>
			
			} 
		<?php } ?>
		
		<?php if ( $cap->rightsidebar_width != "") { ?>
			/** right sidebar width  **/ 
			div#sidebar {
				width: <?php echo $cap->rightsidebar_width ?>px;
				margin-left: -<?php echo$cap->rightsidebar_width ?>px;
			} 
			div.v_line_right {
				right: <?php echo $cap->rightsidebar_width ?>px;
			}
			<?php // change the width of the widget titles, which is always 41px less because of its padding.. 
			$old = $cap->rightsidebar_width; $wdth = $old - 41; ?>
			 
			#sidebar .widgettitle { 
				width: <?php echo $wdth ?>px;
			}
		<?php } ?>
		
		<?php if ( $cap->bg_rightsidebar_color != "" || $cap->bg_rightsidebar_img != "") { ?>
		/** right sidebar background colour  **/ 
		div#sidebar {
			<?php if ( $cap->bg_rightsidebar_color != "" ) { ?>background-color: #<?php echo $cap->bg_rightsidebar_color; } ?>;
			<?php if($cap->bg_rightsidebar_img != ""){ ?>
				background-image:url(<?php echo $cap->bg_rightsidebar_img ?>);	
				<?php switch ($cap->bg_rightsidebar_img_repeat) {
				        case 'no repeat': ?>background-repeat: no-repeat;<?php	
				        	break;
				        case 'x': ?>background-repeat: repeat-x;<?php	
				        	break;
				        case 'y': ?>background-repeat: repeat-y;<?php	
				        	break;
				        case 'x+y': ?>background-repeat: repeat;<?php	
				        	break;
				        } ?>
			<?php } ?>
		} 
		<?php } ?>
		
		<?php if($cap->bg_widgettitle_style != "" || $cap->bg_widgettitle_color != "" || $cap->bg_widgettitle_img != "" ): ?>
			/** sidebars: widget title style, background colour and image  **/ 
			.widgetarea .widgettitle {
			<?php switch ($cap->bg_widgettitle_style) {
			        case 'rounded': ?>-moz-border-radius:4px 4px 4px 4px; -webkit-border-radius:4px 4px 4px 4px; border-radius:4px; background-color: #<?php echo $cap->bg_container_alt_color; ?>; margin:0 8px 12px -9px; padding:5px 10px;<?php 	
			        	break;
			        case 'transparent': ?>background: transparent;<?php	
			        	break;	
			        } ?>
			<?php if($cap->bg_widgettitle_color){?>
				background-color: #<?php echo $cap->bg_widgettitle_color?>;
			<?php } ?>
			<?php if($cap->bg_widgettitle_img){ ?>
				background-image:url(<?php echo $cap->bg_widgettitle_img?>);	
			<?php } ?>
			<?php switch ($cap->bg_widgettitle_img_repeat)
			        {
			        case 'no repeat': ?>background-repeat: no-repeat;<?php	
			        	break;
			        case 'x': ?>background-repeat: repeat-x;<?php	
			        	break;
			        case 'y': ?>background-repeat: repeat-y;<?php	
			        	break;
			        case 'x+y': ?>background-repeat: repeat;<?php	
			        	break;
			        } ?>
			}
			/* just for the left sidebar */
			#leftsidebar .widgettitle, 
			#leftsidebar .widgettitle a {
			<?php switch ($cap->bg_widgettitle_style) {
			        case 'angled': ?>-moz-border-radius:0 0 0 0; -webkit-border-radius:0; border-radius:0; margin:0 0 12px -20px; padding:5px 22px 5px 19px;<?php 	
			        	break;
			        case 'transparent': ?>background: transparent;<?php	
			        	break;	
			        } ?>
			}
		<?php endif; ?>
		
		<?php if($cap->widgettitle_font_size || $cap->widgettitle_font_color || $cap->widgettitle_font_style){?>
			/** sidebars: widget title font style, size and color **/ 
			.widgetarea .widgettitle, .widgetarea .widgettitle a {
				<?php if($cap->widgettitle_font_style != "") { ?>font-family: <?php echo $cap->widgettitle_font_style; } ?>;
				<?php if($cap->widgettitle_font_size != "") { ?>font-size: <?php echo $cap->widgettitle_font_size; } ?>px; 
				<?php if($cap->widgettitle_font_color != "") { ?>color: #<?php echo $cap->widgettitle_font_color; } ?>;
			}
		<?php } ?>
		
		<?php if($cap->capitalize_widgets_li == 'yes'){?>
			/** widgets: capitalize fonts in lists**/ 
			div.widget-title ul.item-list li a, div.widget ul li a { text-transform: uppercase; }
		<?php } ?>
		
		<?php if($cap->capitalize_widgettitles == 'yes'){?>
			/** widgets: capitalize widgettitles**/ 
			.widgettitle, .widgettitle a { text-transform: uppercase; }
		<?php } ?>
				
		<?php if($cap->bg_content_nav_color){?>
			/** BuddyPress sub navigation background colour  **/ 
			div.item-list-tabs ul li.selected a, div.item-list-tabs ul li.current a, 
			div.pagination, div#subnav.item-list-tabs {
				background-color: #<?php echo $cap->bg_content_nav_color?>;
			}
			div.item-list-tabs {
				border-bottom: 4px solid #<?php echo $cap->bg_content_nav_color?>;
			}
		<?php } ?>
				
		/** overwrite css area adding  **/ 
		<?php if( $cap->overwrite_css) echo $cap->overwrite_css; ?>
				  
	</style><?php
		 
	$inhalte = ob_get_contents();
	ob_end_clean();
	echo compress($inhalte);
} 

function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    /* remove spaces etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    return $buffer;
}

/* Some CSS functions to simplify long CSS :) 	:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */ 
			

// CSS3 background colour fade with the colour scheme colours. Hex codes. Just the number, the # will be added. 
function bg_fade($colortop, $colorbottom) {
	global $cap; 
	echo 'background: #'.$colorbottom.';';
		echo 'background: -webkit-gradient(linear, left top, left bottom, from(#'.$colortop.'), to(#'.$colorbottom.'));'; 
		echo 'background: -webkit-linear-gradient(top, #'.$colortop.', #'.$colorbottom.');'; 
		echo 'background:    -moz-linear-gradient(top, #'.$colortop.', #'.$colorbottom.');'; 
		echo 'background:      -o-linear-gradient(top, #'.$colortop.', #'.$colorbottom.');'; 
		echo 'background:         linear-gradient(to bottom, #'.$colortop.', #'.$colorbottom.');';
		echo "filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#".$colortop."', EndColorStr='#".$colorbottom."', GradientType=0);";
}

add_action('wp_head', 'dynamic_css'); 
?>