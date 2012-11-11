<?php 
// full_width_col = full width column
function full_width_col($atts,$content = null) { 
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent', 
        'radius'           => '0', 
        'shadow_color'     => 'transparent',
        'height'           => 'auto', 
        'background_image' => 'none',
        'hierarchical'     => 'off', 
    ), $atts)); 
    
    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; }
    
    $add=''; 
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:95.6%;'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="full_width_col"
                style="background-color:'.$background_color.'; 
                    border: 1px solid; border-color:'.$border_color.';
                    -moz-border-radius:'.$radius.'px; 
                    -webkit-border-radius:'.$radius.'px; 
                    border-radius:'.$radius.'px;
                    -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                    -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                    box-shadow: 2px 2px 2px '.$shadow_color.';
                    '.$add_bg.'height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div><div class="clear"></div>';
    }
    return $tmp;
}
add_shortcode('x2_full_width_col', 'full_width_col');

// [two_third_col = two third column, left floated]
function two_third_col($atts,$content = null) { 
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent', 
        'radius'           => '0', 
        'shadow_color'     => 'transparent',
        'height'           => 'auto',
        'background_image' => 'none',
        'hierarchical'     => 'off',
    ), $atts)); 
    
    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; } 
    
    $add=''; 
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:60.6%;'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="two_third_col" 
                style="background:'.$background_color.'; 
                        border: 1px solid; border-color:'.$border_color.';
                        -moz-border-radius:'.$radius.'px; 
                        -webkit-border-radius:'.$radius.'px; 
                        border-radius:'.$radius.'px;
                        -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                        -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                        box-shadow: 2px 2px 2px '.$shadow_color.';'.$add_bg.'
                                  height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div>';
    }
    return $tmp;
}
add_shortcode('x2_two_third_col', 'two_third_col');

// [two_third_col_right = two third column, right floated]
function two_third_col_right($atts,$content = null) { 
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent', 
        'radius'           => '0', 
        'shadow_color'     => 'transparent',
        'height'           => 'auto',
        'background_image' => 'none',
        'hierarchical'     => 'off',
    ), $atts));
    
    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; }
    
    $add=''; 
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:60.6%;'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="two_third_col_right" 
                style="background:'.$background_color.'; 
                        border: 1px solid; border-color:'.$border_color.';
                        -moz-border-radius:'.$radius.'px; 
                        -webkit-border-radius:'.$radius.'px; 
                        border-radius:'.$radius.'px;
                        -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                        -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                        box-shadow: 2px 2px 2px '.$shadow_color.';'.$add_bg.'
                        height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div><div class="clear"></div>';
    }
    return $tmp;
}
add_shortcode('x2_two_third_col_right', 'two_third_col_right'); 

?>