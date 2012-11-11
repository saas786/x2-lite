<?php get_header() ?>

	<div id="content">
		<div class="padder">

		<?php do_action( 'bp_before_blog_home' ) ?>
		<div class="page" id="blog-latest">

            <?php $atts = array(
                'amount' => 0,
                'img_position' => 'bubble',
                'posts_per_page' => get_option('posts_per_page'),
                'featured_posts_show_pagination' => 'show',
                'featured_id' => 'defoult_home',
            );

            echo x2_list_posts($atts,$content = null); 
            ?>

		</div>

		<?php do_action( 'bp_after_blog_home' ) ?>

		</div><!-- .padder -->
	</div><!-- #content -->
	
<?php get_footer() ?>
