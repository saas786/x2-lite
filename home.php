<?php
global $cap;

switch ($cap->homepage_style) {
	case 'default':
		  echo get_template_part('index');
        break;
	case 'magazine':
		  echo get_template_part('home','magazine');
        break;
	default:
		  echo get_template_part('home','magazine');
        break;
}

?>
