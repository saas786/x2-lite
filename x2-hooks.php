<?php

// header.php
add_action( 'bp_before_header', 'out_of_site_widget');
add_action( 'bp_before_header', 'body_badge');
add_action( 'bp_before_header', 'innerrim_before_header', 2 );
add_action( 'bp_first_inside_header', 'div_inner_start_inside_header');
add_action( 'bp_last_inside_header', 'div_inner_end_inside_header');	
add_action( 'bp_after_header', 'innerrim_after_header', 2 );
add_action( 'bp_before_access', 'menue_enable_search', 2 );
add_action( 'bp_before_access', 'header_logo', 2 );
add_action( 'bp_menu', 'add_home_to_nav', 1 );
add_action( 'bp_menu', 'bp_menu', 2 );
add_action( 'bp_after_header', 'x2_slideshow', 2 );
add_action( 'favicon', 'favicon', 2 );

// footer.php
add_action( 'bp_before_footer', 'innerrim_before_footer', 2 );
add_action( 'bp_first_inside_footer', 'div_inner_start_inside_footer');
add_action( 'bp_last_inside_footer', 'div_inner_end_inside_footer');
add_action( 'bp_after_footer', 'innerrim_after_footer', 2 );
add_action( 'bp_footer', 'footer_content', 2 );

// sidebars
add_action( 'sidebar_left', 'sidebar_left', 2 );
add_action( 'sidebar_right', 'sidebar_right', 2 );
add_action( 'bp_before_after_sidebar', 'login_sidebar_widget', 2 );

// home
add_action( 'bp_before_blog_home', 'home_featured_posts', 2 );

// groups I CAN NOT REMOVE THIS ACTION IN THE FUNCTIONS.PHP This needs to be reworked   --------> VERY IMPORTENT
add_action( 'bp_before_group_home_content', 'before_group_home_content', 2 );

// profile
add_action( 'bp_before_member_home_content', 'before_member_home_content', 2 );


// helper functions
add_action( 'blog_post_entry', 'excerpt_on', 2 );

// custom login
add_action('login_head', 'custom_login', 2 );

// Post and Pages

add_filter( 'x2_list_posts_on_page', 'list_posts_under_page' ); 
add_filter( 'x2_list_posts_on_post', 'list_posts_under_post' ); 


?>