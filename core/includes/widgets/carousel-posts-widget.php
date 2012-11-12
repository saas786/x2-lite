<?php

/**
 *  Carousel posts widget
 *
 * @package x2
 * @since 2.0
 */ 

class x2_carousel_posts_widget extends WP_Widget {
    function x2_carousel_posts_widget() {
          //Constructor
            parent::WP_Widget(false, $name = 'x2 -> Carousel Posts', array(
                'description' => 'Carousel Posts'
            ));
    }
    
    function widget($args, $instance) {
        global $post;
        extract( $args );   
    
        $selected_category = esc_attr($instance['category']);
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        
        $listing_style = $instance['featured_posts_listing_style'];
    
        $selected_post_type = esc_attr($instance['featured_posts_post_type']);
        
        $featured_posts_order_by = $instance['featured_posts_order_by'];
        $featured_posts_order = $instance['featured_posts_order'];
        $featured_posts_show_sticky = $instance['featured_posts_show_sticky'];
        $featured_posts_show_pages_by_id = $instance['featured_posts_show_pages_by_id'];
        $featured_posts_amount = $instance['featured_posts_amount'];

        
        $tmp .= '<div style="height:'.$featured_posts_widget_height.'px;">';
        $tmp .= $before_widget;
        
        if ( ! empty( $title ) )
            $tmp .=  $before_title . $title . $after_title;
        
        $atts = array(
            'amount' => $featured_posts_amount,
            'category_name' => $selected_category,
            'img_position' => $listing_style,
            'page_id' => $featured_posts_show_pages_by_id,
            'post_type' => $selected_post_type,
            'featured_posts_show_sticky' => $featured_posts_show_sticky,
            'featured_id' => $widget_id,
            'orderby' => $featured_posts_order_by,
            'order' => $featured_posts_order
        );
        


        $tmp .= x2_carousel_loop($atts,$content = null);
    	$tmp .= $after_widget;
        $tmp .= '</div>';
        
        echo $tmp;
        wp_reset_query();
    }
    function update($new_instance, $old_instance) {
        //update and save the widget
        return $new_instance;
    }
    function form($instance) {

        //widgetform in backend
        $selected_category = esc_attr($instance['category']);
        $selected_post_type = esc_attr($instance['featured_posts_post_type']);
        $title = strip_tags($instance['title']);
        $listing_style = esc_attr($instance['featured_posts_listing_style']);
        
        
        $featured_posts_order_by = $instance['featured_posts_order_by'];
        $featured_posts_order = $instance['featured_posts_order'];
        $featured_posts_show_sticky = $instance['featured_posts_show_sticky'];
        $featured_posts_show_pages_by_id = $instance['featured_posts_show_pages_by_id'];
        $featured_posts_amount = $instance['featured_posts_amount'];
        
       // Get the existing categories and build a simple select dropdown for the user.

        $args = array('echo' => '0','hide_empty' => '0');
        $categories = get_categories($args);
        $cat_options[] = '<option value="all-categories">All categories</option>';  
        foreach($categories as $category) {
            $selected = $selected_category === $category->slug ? ' selected="selected"' : '';
            $cat_options[] = '<option value="' . $category->slug .'"' . $selected . '>' . $category->name . '</option>';    
        }
        
        $args=array(
          'public'   => true,
        ); 
        $output = 'names'; // names or objects, note names is the default
        $operator = 'and'; // 'and' or 'or'
        $post_types=get_post_types($args,$output,$operator); 
        foreach ($post_types  as $post_type ) {
        
            $selected = $selected_post_type === $post_type ? ' selected="selected"' : '';
            $post_type_options[] = '<option value="' . $post_type .'"' . $selected . '>' . $post_type . '</option>';    
        
        }?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">List posts listing style: </label>
            <select name="<?php echo $this->get_field_name('featured_posts_listing_style'); ?>" id="<?php echo $this->get_field_id('featured_posts_listing_style'); ?>">
            
            <?php
            $tkf->list_post_template_name = array('carousel','carousel caption', 'caption', "image left","image right","image top","image bottom","image only","widget style - with description", "widget style - no description")
            ?>
            
        <?php if(is_array($tkf->list_post_template_name)){  foreach ($tkf->list_post_template_name as $key => $value) { ?>
                <option <?php if($listing_style == $value){ ?> selected <?php } ?> value="<?php echo $value ?>"><?php echo $value ?></option>
        <?php } } ?>
        
             </select>
             
        </p>        
        
        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>">
                <?php _e('Include category (optional):', 'cc'); ?>
            </label>
            <select id="<?php echo $this->get_field_id('category'); ?>" class="widefat" name="<?php echo $this->get_field_name('category'); ?>">
                <?php echo implode('', $cat_options); ?>
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('featured_posts_order_by'); ?>">Order by: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('featured_posts_order_by'); ?>" name="<?php echo $this->get_field_name('featured_posts_order_by'); ?>" type="text" value="<?php echo esc_attr($featured_posts_order_by); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('featured_posts_order'); ?>">Order: </label><br />
            <select name="<?php echo $this->get_field_name('featured_posts_order'); ?>" id="<?php echo $this->get_field_id('featured_posts_order'); ?>">
                <option <?php if($featured_posts_order == 'ASC'){ ?> selected <?php } ?> value="ASC">Ascending</option>
                <option <?php if($featured_posts_order == 'DESC'){ ?> selected <?php } ?> value="DESC">Descending</option>
             </select>
        </p>    

        <p>
            <label for="<?php echo $this->get_field_id('featured_posts_show_sticky'); ?>">Show only sticky posts: </label><br />
            <input type="checkbox" id="<?php echo $this->get_field_id('featured_posts_show_sticky'); ?>" name="<?php echo $this->get_field_name('featured_posts_show_sticky'); ?>" value="on" <?php if(esc_attr($featured_posts_show_sticky) == 'on'){ ?> checked="checked" <?php } ?> /><br />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('featured_posts_post_type'); ?>">
                <?php _e('Include post type (optional):', 'cc'); ?>
            </label>
            <select id="<?php echo $this->get_field_id('featured_posts_post_type'); ?>" class="widefat" name="<?php echo $this->get_field_name('featured_posts_post_type'); ?>">
                <?php echo implode('', $post_type_options); ?>
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('featured_posts_show_pages_by_id'); ?>">Page IDs: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('featured_posts_show_pages_by_id'); ?>" name="<?php echo $this->get_field_name('featured_posts_show_pages_by_id'); ?>" type="text" value="<?php echo esc_attr($featured_posts_show_pages_by_id); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('featured_posts_amount'); ?>">Amount of posts: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('featured_posts_amount'); ?>" name="<?php echo $this->get_field_name('featured_posts_amount'); ?>" type="text" value="<?php echo esc_attr($featured_posts_amount); ?>" />
        </p>

         <p>
            <label for="<?php echo $this->get_field_id('featured_posts_widget_height'); ?>">Widget height: <br> for the best result of the jQuer effects we recoment to set a fixed hight. We can not do this for you, as we do not know how you configurate the widget.<br> just type in numbers without px</label>
            <input class="widefat" id="<?php echo $this->get_field_id('featured_posts_widget_height'); ?>" name="<?php echo $this->get_field_name('featured_posts_widget_height'); ?>" type="text" value="<?php echo esc_attr($featured_posts_widget_height); ?>" />
        </p>
      
        <?php
    }
}
register_widget('x2_carousel_posts_widget');
?>