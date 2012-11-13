<?php
//
// CheezCap - Cheezburger Custom Administration Panel
// (c) 2008 - 2010 Cheezburger Network (Pet Holdings, Inc.)
// LOL: http://cheezburger.com
// Source: http://code.google.com/p/cheezcap/
// Authors: Kyall Barrows, Toby McKes, Stefan Rusek, Scott Porad
// License: GNU General Public License, version 2 (GPL), http://www.gnu.org/licenses/gpl-2.0.html
//

$themename = 'Theme'; // used on the title of the custom admin page
$req_cap_to_edit = 'edit_theme_options'; // the user capability that is required to access the CheezCap settings page

function cap_get_options() {
	$pages     = get_pages();
	$option    = Array();
	$option[0] = "All pages";
	$i         = 1;
	foreach ($pages as $pagg) {
		$option[$i] = $pagg->post_title;
		$i++;
	}
	$option_pages = $option;
	
	$args       = array('echo' => '0','hide_empty' => '0');
	$categories = get_categories($args);
	$option     = Array();
	$option[0]  = Array (
		            'name' => 'All categories',
		            'slug' => 'all-categories'
		        );
	$i = 1;
	foreach($categories as $category) {
		$option[$i]['name'] = $category->name;
		$option[$i]['slug'] = $category->slug;
		$i++;
	}

	$option_categories = $option;
    
	return array(
	new Group ("General", "general",
		array(
		new DropdownOption(
			"Colour scheme", 
			"Select a colour scheme for your website. <br>
			A color scheme is a set of 8 colors. Choose a color scheme as starting point. <br /> 
			Later you can change every single color - if you want to. <a href='http://support.themekraft.com/entries/22150567-color-scheme'>More.</a>", 
			"style_css", 
			apply_filters('cc_get_color_scheme', array( 'light', 'dark')), 
			'light'),
				
		new DropdownOption(
			"Sidebar position", 
			"Where do you like to have your sidebars? Define your default layout. <br>
			You can also use other sidebar layouts in your pages or for the groups or member profiles. <br>
			You can customize your sidebars in the sidebar tab. ", 
			"sidebar_position", 
			array('right', 'left and right', 'left', 'full-width'),
			'right'),
		new BooleanOption(
			"Use standard WordPress background settings", 
			"Enable this option, if you like to use the standard wordpress settings page.", 
			"wp_custom_background", 
			false,
			'start',
			'Background'),
			new ColorOption(
				"Background colour", 
				"Change your background colour", 
				"bg_body_color", 
				"",
				'',
				''),
			new FileOption(
				"Background image", 
				"Insert your own background image. Upload or insert url.", 
				"bg_body_img",
				'',
				false,
				''),
			new BooleanOption(
				"Fixed background image", 
				"Fix the position of your body background image", 
				"bg_body_img_fixed", 
				false,
				false,
				''),
			new DropdownOption(
				"Background position", 
				"Position of the background image: center, left, right", 
				"bg_body_img_pos", 
				array('center', 'left', 'right'),
				'',
				false,
				''),	
		new DropdownOption(
			"Background repeat", 
			"Repeat background image: x=horizontally, y=vertically", 
			"bg_body_img_repeat", 
			array('no repeat', 'x', 'y', 'x+y'),
			'',
			'end',
			''),
		)
	),
	new Group ("Home", "home",
		array(
		// Homepage style
		new DropdownOption(
			"Homepage style", 
			"Use the magazine homepage or the default homepage showing your latest posts.  <br> 
			IMPORTANT: This option only works if you have set 'your latest posts' in Settings -> Reading. <br>
			To select a page as your homepage, go to Settings -> Reading and select 'a static page'.", 
			"homepage_style", 
			array('magazine', 'default'),
			"default"),
		// Widgetized Homepage 
		new TextOption(
			"Widgetarea height", 
			"Set the height of the 3 sidebar columns so they have a fixed height when filled. <br>
			In px, Just enter a number. Per default the height is set to auto. <br>
			Note: Don't fix if you use elements with a dynamic height <br>
			(like the accordion) - then better use the options below..", 
			"widget_homepage_height", 
			"", 
			"",
			"start",
			"Widget homepage"),
		new DropdownOption(
			"Homepage widgetarea style", 
			"Choose a style for the homepage widgetareas. Default is 'boxes'.", 
			"widget_homepage_widgetarea_style", 
			array('boxes', 'simple'),
			"boxes",
			'end'),
		// Default homepage
		new DropdownOption(
			"Default homepage", 
			"Display latest 3 posts on top? <br> 
			Note: The look of your posts loop is defined in the blog section! ",
			"default_homepage_last_posts", 
			array('show', 'hide'),
			"show"),	
		)
	),
	new Group ("Blog", "blog", 
		array(
		// archive, tag and category views - (blog post listing)
		new DropdownOption(
			"Show / hide avatars", 
			"Show or hide the avatars in the post listing. <br> 
			This option is for the archive-, tag- and category-views of your blog.", 
			"posts_lists_hide_avatar", 
			array('show', 'hide'),
			"show",
			"start",
			"Archive view"),	
		new DropdownOption(
			"Post listing style", 
			"Select a style to display the latest posts in the archive-, tag- and category-views of your blog.", 
			"posts_lists_style", 
			array('default', 'bubbles'),
			"bubbles", 
			false),	
		new DropdownOption(
			"Show / hide date, category and author", 
			"Show or hide the date, category and author in the blog post listings.", 
			"posts_lists_hide_date", 
			array('show', 'hide'),
			"show",
			false),
		new TextOption(
			"Pagetitle for category views", 
			"Write your own pagetitle for the category views. The category name will be appended automatically. <br>
			By default the title is 'You are browsing the blog for CATEGORY-NAME.'<br>
			Write something fresh! ;)", 
			"category_pagetitle", 
			"", 
			"",
			'end'),
		// Single post view options
		new DropdownOption(
			"Show / hide avatar", 
			"Show or hide the avatar in the single post view.", 
			"single_post_hide_avatar", 
			array('show', 'hide'),
			"show",
			"start",
			"Single post view"),	
		new DropdownOption(
			"Show / hide date and category", 
			"Show or hide the date and category in the single post view.", 
			"single_post_hide_date", 
			array('show', 'hide'),
			"show", 
			false),
		new DropdownOption(
			"Show / hide tags", 
			"Show or hide the tags in the single post view.", 
			"single_post_hide_tags", 
			array('show', 'hide'),
			"show", 
			false),
		new DropdownOption(
			"Show / hide comment info", 
			"Show or hide the comment info in the single post view.", 
			"single_post_hide_comment_info", 
			array('show', 'hide'),
			"show", 
			'end'),		
		// excerpt options
		new DropdownOption(
			"Show excerpts", 
			"Use excerpts or show full content of your posts in category and archive views. ", 
			"excerpt_on", 
			array('content', 'excerpt'),
			"content",
			"start",
			"Excerpts"),
		new TextOption(
			"Excerpt length", 
			"Change the excerpt length, default is 30 words.", 
			"excerpt_length", 
			"","","end"),
		)
	),
	new Group ("Header", "header",
		array(
		new BooleanOption(
			"Standard WordPress header", 
			"Enable this option, if you like to use the standard wordpress custom image header settings page.", 
			"add_custom_image_header", 
			false),		
		new DropdownOption(
			"Show header text", 
			"Show header text or not?", 
			"header_text", 
			array('on', 'off'),
			'on', 
			'start', 
			'Header text'),
		new ColorOption(
			"Header text colour", 
			"Change header font colour", 
			"header_text_color", 
			"", 
			'end'),
		new FileOption(
			"Header logo", 
			"Insert your own Logo. It will be linked to your homepage and aligned left from default. Upload or insert url.", 
			"logo"),
		new DropdownOption(
			"Header width", 
			"Do you like the header in full width or as wide as your site?", 
			"header_width", 
			array('default', 'full-width'),
			'default'),
		new TextOption(
			"Header height", 
			"Your header height in px (and menu position from top at the same time). Just enter a number. <br>
			This is not your header image height, you can specify your header image separately in the fields below.", 
			"header_height", 
			""),
		new ColorOption(
			"Header background colour", 
			"Change header background colour.", 
			"header_bg_color", 
			"", 
			'start', 
			'Header background'),
		new FileOption(
			"Header image", 
			"Insert your own header image. Upload or insert url. <br>
			Default width is 1000px, the height (and full width option) can be adjusted above. <br>
			For no image write 'none'.", 
			"header_img",
			'',
			false),
		new DropdownOption(
			"Header image repeat", 
			"Repeat header image: x=horizontally, y=vertically", 
			"header_img_repeat", 
			array('no repeat', 'x', 'y', 'x+y'),
			"no repeat",
			false),		
		new DropdownOption(
			"Header image x-position", 
			"If header image is smaller, you can choose to align left, center or right.", 
			"header_img_x", 
			array('left', 'center', 'right'),
			"left",
			false),
		new TextOption(
			"Header image y-position", 
			"Distance from header image to top (in px), just enter a number.", 
			"header_img_y", 
			"",
			"",
			"end"),
		)
		),
	new Group ("Menu", "menu",
		array(
		new BooleanOption(
            "Stay on top by scroling", 
            "Keep the main navigation on top of the display when scrolling down?", 
            "menue_waypoints", 
            true),
        new BooleanOption(
            "Show 'Home'", 
            "You can disable the 'Home' menu item in the main navigation.", 
            "menue_disable_home", 
            false),
        new BooleanOption(
			"Show 'Community'", 
			"Enable a BuddyPress dropdown menu item in the main navigation.", 
			"menue_enable_community", 
			false),
		new DropdownOption(
			"Horizontal position", 
			"Align the menu left or right.", 
			"menu_x", 
			array('left', 'right'),
			'left'),
		new DropdownOption(
			"Menu style", 
			"Choose a menu style", 
			"bg_menu_style", 
			array('tab style', 'closed style', 'simple', 'bordered' ),
			'bordered'),
		new ColorOption(
			"Menu border", 
			"Would you like to underline your menu? Select a colour.", 
			"menu_underline", 
			""),
		new ColorOption(
			"Menu font colour", 
			"Change menu font colour.", 
			"menue_link_color", 
			"", 
			'start', 
			'Menu fonts'),
		new ColorOption(
			"Menu font colour &raquo; current and mouse over", 
			"Change menu font colour from currently displayed menu item <br>
			or when mouse moves over.", 
			"menue_link_color_current", 
			"", 
			'end'),
		new ColorOption(
			"Menu background colour", 
			"Change the menu bar's general background colour.", 
			"bg_menue_link_color", 
			"", 
			'start', 
			'Menu background'),
		new FileOption(
			"Menu background image", 
			"Insert your own background image for the menu bar. Upload or insert url.", 
			"bg_menu_img", 
			"",
			'',
			false),
		new DropdownOption(
			"Menu background repeat", 
			"Repeat background image: x=horizontally, y=vertically", 
			"bg_menu_img_repeat", 
			array('no repeat', 'x', 'y', 'x+y'),
			'no repeat', 
			'end'),
		new ColorOption(
			"Menu background colour &raquo; current", 
			"Change background colour from currently displayed menu item.", 
			"bg_menue_link_color_current", 
			"", 
			'start', 
			'Menu background &raquo; current'),
		new FileOption(
			"Menu background image &raquo; current", 
			"Background image of the currently displayed menu item. Upload or insert url.", 
			"bg_menu_img_current", 
			"", 
			'', 
			false),
		new DropdownOption(
			"Menu background image repeat &raquo current", 
			"Repeat background image: x=horizontally, y=vertically", 
			"bg_menu_img_current_repeat", 
			array('no repeat', 'x', 'y', 'x+y'),
			'no repeat', 
			'end'),
		new ColorOption(
			"Menu background colour &raquo; mouse over and drop down list", 
			"Change a menu item's background colour when mouse moves over it, <br>
			and drop down background colour", 
			"bg_menue_link_color_hover", 
			""),
		new ColorOption(
			"Menu background colour &raquo; drop down list &raquo; mouse over", 
			"Change background colour of HOVERED DROP DOWN menu item <br>
			(when the mouse moves over it).", 
			"bg_menue_link_color_dd_hover", 
			""),
		new DropdownOption(
			"Menu corner radius", 
			"Do you want your menu corners to be rounded?", 
			"menu_corner_radius", 
			array('not rounded', 'just the bottom ones', 'all rounded'),
			'not rounded'),
		)
		),
	new Group ("Content", "content", 
		array( 
		new ColorOption(
			"Content colour", 
			"Change the background colour of the content. <br>
			By default it is the same as the body background color.", 
			"bg_container_color", 
			"",
			"start",
			"Content"),
			new ColorOption(
				"Content Alternative Colour", 
				"Choose an alternative background colour for your content. Will be used for things as lines, widgettitles etc. ", 
				"bg_container_alt_color", 
				"",
				'',
				''),
			new DropdownOption(
				"Show / hide the vertical lines", 
				"The vertical lines that divide your content are shown by default. <br>
				Here you can disable them if you like.", 
				"bg_container_nolines", 
				array('show', 'hide'),
				"show",
				false),
			new FileOption(
				"Content background image", 
				"Change background image for the content. Upload or insert url.", 
				"bg_container_img", 
				"",
				false),
			new DropdownOption(
				"Content background repeat", 
				"Repeat background image: x=horizontally, y=vertically", 
				"bg_container_img_repeat", 
				array('no repeat', 'x', 'y', 'x+y'),
				"",
				false),
			new ColorOption(
				"Details colour", 
				"Change your details background colour", 
				"bg_details_color", 
				"",
				'',
				''),
			new ColorOption(
				"Details alternative colour", 
				"Change your details alternative/hover background colour", 
				"bg_details_hover_color", 
				"",
				'end'),
		new DropdownOption(
			"Title font style", 
			"Change the title font style (h1 and h2). Default is the Google Font 'Fjord One'.", 
			"title_font_style", 
			array('"Fjord One", serif', '"Ubuntu", Arial, sans-serif', 'Arial, sans-serif', 'Helvetica, Arial, sans-serif', 'Century Gothic, Avant Garde, Arial, sans-serif', 'Arial Black, Arial, sans-serif', 'Impact, Arial, sans-serif', 'Times New Roman, Times', 'Garamond, Times New Roman, Times'),
			'"Ubuntu", Arial, sans-serif', 
			"start",
			"Titles"),
			new TextOption(
				"Title size", 
				"Change the title font size (h1 and h2), default is 31px (for h2), just enter a number. <br>
				(h1 should only be used once for the site title)", 
				"title_size", 
				"",
				"",
				false),
			new DropdownOption(
				"Titles font weight", 
				"Do you want your titles bold or normal?", 
				"title_weight", 
				array('bold', 'normal'),
				"normal",
				false),
		new ColorOption(
			"Title colour", 
			"Change title colour.", 
			"title_color", 
			"","end"),
		new DropdownOption(
			"Subtitle font style", 
			"Change the subtitle font style (h3-h6).", 
			"subtitle_font_style", 
			array('"Fjord One", serif', '"Ubuntu", Arial, sans-serif', 'Arial, sans-serif', 'Helvetica, Arial, sans-serif', 'Century Gothic, Avant Garde, Arial, sans-serif', 'Arial Black, Arial, sans-serif', 'Impact, Arial, sans-serif', 'Times New Roman, Times', 'Garamond, Times New Roman, Times'),
			'"Ubuntu", Arial, sans-serif', 
			"start",
			"Subtitles"),
			new DropdownOption(
				"Subtitles font weight", 
				"Do you want your subtitles bold or normal?", 
				"subtitle_weight", 
				array('bold', 'normal'),
				"normal",
				false),
		new ColorOption(
			"Subtitle colour", 
			"Change subtitle colour", 
			"subtitle_color", 
			"","end"),
		new DropdownOption(
			"Font style", 
			"Change the font style.", 
			"font_style", 
			array('Arial, sans-serif', '"Fjord One", serif', '"Ubuntu", Arial, sans-serif', 'Helvetica, Arial, sans-serif', 'Century Gothic, Avant Garde, Arial, sans-serif', 'Times New Roman, Times', 'Garamond, Times New Roman, Times'),
			'"Ubuntu", Arial, sans-serif', 
			"start",
			"Fonts"),
		new TextOption(
			"Font size", 
			"Change the standard font size, default is 13px. Just enter a number.", 
			"font_size", 
			"","",
			false),
		new TextOption(
			"Smaller font size", 
			"Change the smaller alternative font size, default is 11px. Just enter a number.", 
			"font_alt_size", 
			"","",
			false),			
		new ColorOption(
			"Font colour", 
			"Change font colour", 
			"font_color", 
			"",
			'',
			''),
		new ColorOption(
			"Font alternative colour", 
			"Change the font alternative colour", 
			"font_alt_color", 
			"",
			'end'),
		new ColorOption(
			"Link colour", 
			"Change link colour. <br>
			Notes: You just need to change the link colour to have a nice effect on all link and button colours. <br>
			The hover colour will automatically be your font colour or the default font colour. <br>
			Optional, you can also choose a hover colour or if and when to underline.", 
			"link_color", 
			"",
			"start",
			"Links"),
		new ColorOption(
			"Link hover colour", 
			"Change link colour for mouse moves over.", 
			"link_color_hover", 
			"",
			false),
		new DropdownOption(
			"Link underline", 
			"Choose if (and when) to underline links.", 
			"link_underline", 
			array('never', 'always', 'just for mouse over', 'just when normal'),
			"never", 
			false),
		new DropdownOption(
			"BuddyPress subnavigation adapting", 
			"Use link hover colour for the BuddyPress subnav also? <br> 
			This is the submenu in member and group profiles. By default the subnav links adapts the link colour and link hover colour. <br>
			Sometimes the link hover colour can look ugly here and you don't want the subnav to adapt. <br>
			Then you can change the colour adapting here easily. ", 
			"link_color_subnav_adapt", 
			array('just the link colour', 'link colour and hover colour'),
			"link colour and hover colour", 
			'end'),	
		)
		),
	new Group ("Sidebars", "sidebars",
		array(
		new TextOption(
			"Left sidebar width", 
			"Change the left sidebar width - in pixel. Just enter a number. ", 
			"leftsidebar_width", 
			"225",
			"",
			"start",
			"Left sidebar"),
			new ColorOption(
				"Left sidebar background colour", 
				"Change background colour of the left sidebar. ", 
				"bg_leftsidebar_color", 
				"", 
				false),
			new FileOption(
				"Left sidebar background image", 
				"Your own background image for the left sidebar. Upload or insert url.", 
				"bg_leftsidebar_img", 
				"", 
				false),
		new DropdownOption(
			"Left sidebar background repeat", 
			"Repeat background image: x=horizontally, y=vertically", 
			"bg_leftsidebar_img_repeat", 
			array('no repeat', 'x', 'y', 'x+y'), 
			"no repeat",
			'end'),
		new TextOption(
			"Right sidebar width", 
			"Change the right sidebar width - in pixel. Just enter a number. ", 
			"rightsidebar_width", 
			"300",
			"",
			"start",
			"Right sidebar"),
			new ColorOption(
				"Right sidebar background colour", 
				"Change background colour of the right sidebar. ", 
				"bg_rightsidebar_color", 
				"", 
				false),
			new FileOption(
				"Right sidebar background image", 
				"Your own background image for the right sidebar. Upload or insert url.", 
				"bg_rightsidebar_img", 
				"", 
				false),
		new DropdownOption(
			"Right sidebar background repeat", 
			"Repeat background image: x=horizontally, y=vertically", 
			"bg_rightsidebar_img_repeat", 
			array('no repeat', 'x', 'y', 'x+y'), 
			"no repeat",
			'end'),		
		new DropdownOption(
			"Sidebar widget title style", 
			"Choose a style for the widget titles", 
			"bg_widgettitle_style", 
			array('angled', 'rounded', 'transparent'),
			'angled'),
		new DropdownOption(
			"Sidebar widget title font style", 
			"Change the widget title's font style.", 
			"widgettitle_font_style", 
			array('"Fjord One", serif', '"Ubuntu", Arial, sans-serif', 'Arial, sans-serif', 'Impact, sans-serif', 'Helvetica, Arial, sans-serif', 'Century Gothic, Avant Garde, Arial, sans-serif', 'Times New Roman, Times', 'Garamond, Times New Roman, Times'),
			'"Ubuntu", Arial, sans-serif', 
			"start",
			"Sidebar widget title fonts"),
			new TextOption(
				"Widget title font size", 
				"Font size of your widget titles in px, just enter a number, default=13", 
				"widgettitle_font_size", 
				"16",
				"", 
				false),
		new ColorOption(
			"Sidebar widget title font colour", 
			"Change font colour of the widget titles.", 
			"widgettitle_font_color", 
			"", 
			'end'),
		new ColorOption(
			"Sidebar widget title background colour", 
			"Change background colour of the widget titles.", 
			"bg_widgettitle_color", 
			"", 
			"start", 
			"Sidebar widget titles background",
			false),
		new FileOption(
			"Sidebar widget title background image", 
			"Your own background image for the widget title. Upload or insert url.", 
			"bg_widgettitle_img", 
			"", 
			false),
		new DropdownOption(
			"Sidebar widget title background repeat", 
			"Repeat background image: x=horizontally, y=vertically", 
			"bg_widgettitle_img_repeat", 
			array('no repeat', 'x', 'y', 'x+y'), 
			"no repeat",
			'end'),
		new DropdownOption(
			"Capitalizing in widgets", 
			"Capitalize lists in your widgets?", 
			"capitalize_widgets_li", 
			array('no', 'yes'), 
			"no",
			"start",
			"Capitalizing"),
		new DropdownOption(
			"Capitalizing the widget titles", 
			"Capitalize the titles in your widgets?", 
			"capitalize_widgettitles", 
			array('no', 'yes'),
			"no",
			'end'),
		new BooleanOption(
            "Turn off the flying widget effect?", 
            "Do you want the outer widget to follow you when scrolling? <br />
            The flying widget will be displayed if you add a widget AND if the screen's width is more than 1422px. <br />
            If you want the widget to be fixed instead of following, you can turn the flying effect off here.", 
            "out_of_content_widget", 
            false),
        				
		)
		),
	new Group ("Footer", "footer",
		array(
		new DropdownOption(
			"Footer width", 
			"Do you like the footer in full width or as wide as your site?", 
			"footer_width", 
			array('default', 'full-width'),
			"full-width"),
		new TextOption(
			"Footer height", 
			"Change the footer height, in px, just enter a number. <br>
			This option is not the footer WIDGET height, you can define that one below.", 
			"footerall_height", 
			""),
		new ColorOption(
			"Footer background colour", 
			"Change background colour of the footer. Write 'transparent' for no color.", 
			"bg_footerall_color", 
			"", 
			'start', 
			'Footer background'),
		new FileOption(
			"Footer background image", 
			"Background image for the footer background. Upload or insert url.", 
			"bg_footerall_img", 
			"", 
			'', 
			false),
		new DropdownOption(
			"Footer background image repeat", 
			"Repeat background image: x=horizontally, y=vertically", 
			"bg_footerall_img_repeat", 
			array('no repeat', 'x', 'y', 'x+y'),
			'no repeat', 
			false),	
		new BooleanOption(
			"Footer border top", 
			"Show or hide the top-border for the footer? <br>
			Container alternate color will be used. Define this color in the 'Content' tab.", 
			"bg_footer_border", 
			true, 
			'end'),
		new TextOption(
			"Footer widget height", 
			"Change the footer widgets height, in px, just enter a number. <br>
			This option is nice to have your footer widget areas all the same height.", 
			"footer_height", 
			"", 
			'',
			'start', 
			'Footer widgets'),	
		new ColorOption(
			"Footer widget background", 
			"Change background color of the footer widgets. By default they are transparent.", 
			"bg_footer_color", 
			"", 
			'',
			false),
		new FileOption(
			"Footer widget background image", 
			"Background image for the footer widgets background. Upload or insert url.", 
			"bg_footer_img", 
			"", 
			'', 
			false),
		new DropdownOption(
			"Footer widget background image repeat", 
			"Repeat background image: x=horizontally, y=vertically", 
			"bg_footer_img_repeat", 
			array('no repeat', 'x', 'y', 'x+y'),
			'no repeat', 
			false),
		new BooleanOption(
			"Footer widget border", 
			"Show or hide the border for footer widgets? <br>
			Container alternate color will be used. Define this color in the 'Content' tab.", 
			"bg_footer_widget_border", 
			false, 
			'end'),
		)
		),
	new Group ("BuddyPress", "buddypress",
		array(
		new DropdownOption(
			"Show groups header", 
			"Display group header, can be used as widget area.", 
			"bp_groups_header", 
			array('on', 'off'),
			'on', 
			'start', 
			'Groups'),
		new DropdownOption(
			"Groups header style", 
			"How much info do you want in your groups header? <br> 
			slim = just the stuff that's really needed. <br>
			full = all the info you might need. ", 
			"bp_groups_header_style", 
			array('slim', 'full'),
			'slim', 
			false),
		new DropdownOption(
			"Groups sidebars",
			"Where do you like to have your sidebars in groups? <br>
			default = the global settings and sidebars will be used<br>
			none = no sidebars, full width<br>
			left = left group sidebar, this will overwrite the global settings and display the left group sidebar<br>
			right = right group sidebar, this will overwrite the global settings and display the right group sidebar<br>
			left and right = this option will display the left and right group sidebars and overwrite the global settings<br>
			Note: all sidebars can be filled with widgets. Without widgets there will be the group avatar and information like in the group header.",
			"bp_groups_sidebars",
			 array('default', 'none', 'left', 'right', 'left and right'),
			 'default', 
			 false),
		new TextOption(
			"Groups avatar size", 
			"Define the size of the group avatar. Width and height is the same. <br>
			Just write a number, without px.", 
			"bp_groups_avatar_size", 
			"", 
			'',
			false),
		new TextOption(
			"Groups menu order", 
			"Change the menu order in the groups. Write the order in by slug, comma-separated. <br>
			Note: a slug is the name as it is written in the url, <br>
			means all letters in small, no symbols, ...", 
			"bp_groups_nav_order", 
			"",
			'', 
			'end'),
		new DropdownOption(
			"Show profile header", 
			"Display profile header, can be used as widget area.", 
			"bp_profile_header", 
			array('on', 'off'),
			'on', 
			'start',
			'Profiles'),
		new DropdownOption(
			"Profile header style", 
			"How much info do you want in your profile header? <br> 
			slim = just the stuff that's really needed. <br>
			full = all the info you might need. ", 
			"bp_profile_header_style", 
			array('slim', 'full'),
			'slim', 
			false),
		new DropdownOption(
			"Profile sidebars", 
			"Where do you like to have your sidebars in profiles? <br>
			default = the global settings and sidebars will be used<br>
			none = no sidebars, full width<br>
			left = left profile sidebar, this will overwrite the global settings and display the left profile sidebar<br>
			right = right profile sidebar, this will overwrite the global settings and display the right profile sidebar<br>
			left and right = This option will display the left and right profile sidebars and overwrite the global settings<br>
			Note: all sidebars can be filled with widgets. Without widgets there will be the user avatar and information like in the member header.", 
			"bp_profile_sidebars", 
			array('default', 'none', 'left', 'right', 'left and right'),
			'default', 
			false),
		new TextOption(
			"Profile avatar size", 
			"Define the size of the profile avatar. Width and height is the same.", 
			"bp_profiles_avatar_size", 
			"", 
			'', 
			false),
		new TextOption(
			"Profile menu order", 
			"Change the menu order in the profiles. Write the order in by slug, comma-separated. <br>
			Note: a slug is the name as it is written in the url, <br>
			means all letters in small, no symbols, ...", 
			"bp_profiles_nav_order", 
			"", 
			'',
			'end'),
		new BooleanOption(
			"Use BuddyPress sub-navigation", 
			"This sub-navigation is the secondary level navigation, <br>
			e.g. for profile it contains: [Public, Edit Profile, Change Avatar]<br>
			If you use the community navigation widget, you don't need this navigation. <br>
			If you want to use a horizontally sub-navigation - choose this one.", 
			"bp_default_navigation", 
			true, 
			'start', 
			'BuddyPress sub-navigation'),
		new ColorOption(
			"BuddyPress sub-navigation background colour", 
			"Change the background colour of the BuddyPress component sub navigation.", 
			"bg_content_nav_color", 
			"", 
			'end'),
		new BooleanOption(
			"Show search bar", 
			"Enable BuddyPress search bar in header.", 
			"menue_enable_search", 
			true, 
			'start', 
			'BuddyPress search'),
		new BooleanOption(
			"Use global Buddydev search instead of bp-search", 
			"Replace the BuddyPress search (which comes with dropdown menu) with the Buddydev search. <br>
			The Buddydev search is an easy one-field global search with nice result-listing.", 
			"buddydev_search", 
			true, 
			false),
		new DropdownOption(
			"Search bar horizontal position", 
			"If selected, you want the search bar left or right?", 
			"searchbar_x", 
			array('right', 'left'),
			'right', 
			false),
		new TextOption(
			"Search bar vertical position", 
			"Distance from search bar to top (in px), just enter a number.", 
			"searchbar_y", 
			"", 
			'',
			'end'),
		new DropdownOption(
			"Show login widget in sidebar", 
			"Turn auto BuddyPress login in the right sidebar on/off. <br>
			Note: You can also add the login as a widget into every widgetarea you like.", 
			"login_sidebar", 
			array('on', 'off'),
			'on', 
			'start', 
			'BuddyPress login'),
		new TextOption(
			"Login widget sidebar text", 
			"When logged out: what text should be displayed in the login sidebar?", 
			"bp_login_sidebar_text", 
			"", 
			'',
			'end'),
		)
		),
	new Group ("Slideshow", "slideshow",
		array(
		new DropdownOption(
			"Enable slideshow", 
			"Enable slideshow", 
			"enable_x2_slideshow", 
			array('home', 'off', 'all'),
			'home'),
		new DropdownCatOption(
			"Slideshow post categories", 
			"By default, the slideshow takes images, titles and text-excerpts of the last 4 posts.<br>
			You can select the category the posts should be taken from. ", 
			"slideshow_cat", 
			$option_categories,'',
			'start'),
		new DropdownOption(
            "Show only sticky posts", 
            "Show only sticky posts from all or a specific category", 
            "slideshow_show_sticky", 
            array('on', 'off'),
            'off',
            'end'),
		new DropdownOption(
			"Slideshow style", 
			"Select a type of slideshow. Default is the flux slider.", 
			"slideshow_style", 
			array('flux slider', 'nivo slider', 'full width', 'default'),
			"flux slider",
			'start'),
        new DropdownOption(
            "Effect", 
            "Select the slideshow effect. Default is random", 
            "slideshow_effect", 
            array( 'random','bars', 'blinds', 'blocks', 'blocks2', 'concentric', 'dissolve', 'slide', 'warp', 'zip', 'bars3d', 'blinds3d', 'cube', 'tiles3d', 'turn'), 
            'random',
            'end'),
        )
    ),
	new Group ("CSS", "overwrite",
		array(
		new TextOption(
			"Overwrite CSS", 
			"This is your place to overwrite existing CSS.<br>
			This way you are able to customize even the smallest CSS details. <br>
			If you know how to write, you can play around a bit!<br>
			<br>
			Here's an example how to change your body background picture:<br>
			<br>
			body {<br>
			background-image:url(url-to-your-picture);<br>
			}<br>
			<br>", 
			"overwrite_css", 
			"", 
			true,
			false),
		)
		),
		
		);
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_x2_page_';

    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    $options_categories['all-categories'] = 'All categories';
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->slug] = $category->cat_name;
    }
    
    // Pull all tags into an array
    $options_tags = array();
    $options_tags_obj = get_tags();
    foreach ( $options_tags_obj as $tag ) {
        $options_tags[$tag->term_id] = $tag->name;
    }


    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }
    $post_types = get_post_types();
    
    $meta_boxes[] = array(
        'id'         => 'x2_slideshow',
        'title'      => 'x2 SlideShow',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => apply_filters('cc_add_meta_fileds', 
                array(
                    array(
                          'name'    => 'Enable x2 slideshow',
                          'id'      => $prefix . 'enable_slideshow',
                          'type'    => 'select',
                          'options' => array(
                              array( 'name' => 'default', 'value' => 'default', ),
                              array( 'name' => 'off', 'value' => 'off', ),
                              array( 'name' => 'on', 'value' => 'on', ),
                          ),
                      ),
                      array(
                          'name'    => 'Slideshow post categories',
                          'desc'    => 'The slideshow  takes images, titles and text-excerpts of the last 4 posts.
                                          You can select the category the posts should be taken from.',
                          'id'      => $prefix . 'slideshow_cat',
                          'type'    => 'multicheck',
                          'options' => $options_categories
                          ,
                      ),
                      array(
                          'name'    => 'Slideshow style',
                          'desc'    => 'Select a type of slideshow.',
                          'id'      => $prefix . 'slideshow_style',
                          'type'    => 'select',
                          'options' => array(
                              array( 'name' => 'default', 'value' => 'default', ),
                              array( 'name' => 'nivo slider', 'value' => 'nivo slider', ),
                              array( 'name' => 'flux slider', 'value' => 'flux slider', ),
                          ),
                      ),
                      array(
                          'name'    => 'Slideshow effect',
                          'desc'    => 'Select the slideshow effect. Default is random.',
                          'id'      => $prefix . 'slideshow_effect_page',
                          'type'    => 'select',
                          'options' => array(
                              array( 'name' => 'random', 'value' => 'random', ),
                              array( 'name' => 'bars', 'value' => 'bars', ),
                              array( 'name' => 'blinds', 'value' => 'blinds', ),
                              array( 'name' => 'blocks', 'value' => 'blocks', ),
                              array( 'name' => 'blocks2', 'value' => 'blocks2', ),
                              array( 'name' => 'concentric', 'value' => 'concentric', ),
                              array( 'name' => 'dissolve', 'value' => 'dissolve', ),
                              array( 'name' => 'slide', 'value' => 'slide', ),
                              array( 'name' => 'warp', 'value' => 'warp', ),
                              array( 'name' => 'zip', 'value' => 'zip', ),
                              array( 'name' => 'bars3d', 'value' => 'bars3d', ),
                              array( 'name' => 'cube', 'value' => 'cube', ),
                              array( 'name' => 'tiles3d', 'value' => 'tiles3d', ),
                              array( 'name' => 'turn', 'value' => 'turn', ),
                          ),
                      ),
            ), 'x2_slideshow', $prefix, $post_types)
    );

    $meta_boxes[] = array(
        'id'         => 'list_posts',
        'title'      => 'List post under this page',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
       // 'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => apply_filters('cc_add_meta_fileds', 
                array(
                    array(
                        'name'    => 'Show / hide featured posts',
                        'desc'    => 'Display your featured posts?',
                        'id'      => $prefix . 'enable_featured_posts',
                        'type'    => 'select',
                        'options' => array(
                            array( 'name' => 'show', 'value' => 'show', ),
                            array( 'name' => 'hide', 'value' => 'hide', ),
                        ),
                    ),
                    array(
                        'name' => 'Amount',
                        'desc' => 'Define the amount of posts. 0 = all.',
                        'id'   => $prefix . 'featured_posts_amount',
                        'type' => 'text_small',
                    ),
                    array(
                        'name' => 'Posts per page',
                        'desc' => 'Define the amount of posts per page.',
                        'id'   => $prefix . 'featured_posts_posts_per_page',
                        'type' => 'text_small',
                    ),
                    array(
                        'name'    => 'Show pagination',
                        'id'      => $prefix . 'featured_posts_show_pagination',
                        'type'    => 'select',
                        'options' => array(
                            array( 'name' => 'show', 'value' => 'show', ),
                            array( 'name' => 'hide', 'value' => 'hide', ),
                            array( 'name' => 'use wp pagenavi plugin', 'value' => 'pagenavi', ),
                        ),
                    ),
        ), 'list_posts', $prefix, $post_types)
    );
    return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

     if ( ! class_exists( 'cmb_Meta_Box' ) )
         require_once( dirname(__FILE__) . '/metaboxes/init.php');

}

?>